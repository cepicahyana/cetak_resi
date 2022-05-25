<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class M_auth extends Model
{
    //table
    protected $admin = "admin";
    protected $main_level = "main_level";
    protected $main_log = "main_log";
    //libraries
    protected $tanggal;
    //modelexternal
    protected $M_reff;
    protected $M_konfig;
    //inconstruct
    protected $request;
    protected $db;
    protected $db_admin;
    protected $db_mlevel;
    protected $db_mlog;
    protected $security;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $request = \Config\Services::request();
        $this->request = $request;
        $security = \Config\Services::security();
        $this->security = $security;
        //deklarmodel
        $this->m_reff = new \App\Models\M_reff();
        $this->m_konfig = new \App\Models\M_konfig();
        //deklartabel
        $this->db_admin = $this->db->table($this->admin);
        $this->db_mlevel = $this->db->table($this->main_level);
        $this->db_mlog = $this->db->table($this->main_log);
        //deklarlibrary
        $this->tanggal = new \App\Libraries\Tanggal(); 
    }

    //--------------------------------------------------------------------
    public function cekLogin()
    {
        $var["validasi"] = false;
        $var["direct"] = false;
        $var["upass"] = true;
        $ip       = $this->request->getIPAddress();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $this->db_admin->where('username', $username);
        $qry_admin =  $this->db_admin->get();
        $tbl_admin_row = $qry_admin->getRow();

        if ($tbl_admin_row) {
            $profilename=$tbl_admin_row->profilename;
            $pass = $tbl_admin_row->password;
            if (md5($password) === $pass) {
                $var["cek"] = true;
                $dblevel = $this->getDataLevel($tbl_admin_row->level);
                $levelname = $dblevel->levelname;
                $code_level   = $dblevel->code_level;
                $ses_data = [
                    'id'          => $tbl_admin_row->id_admin,
                    'level'       => $code_level,
                    'levelname'   => strtoupper($levelname),
                    'pass'        => $pass
                ];
                session()->set($ses_data); //buat session
                $this->updateLoginAdmin($tbl_admin_row->id_admin,$ip); //update last_login
                $this->m_konfig->log("admin","Login",$profilename,$levelname); //update log
                $var["validasi"] = true;
                $var["direct"] = $this->m_konfig->directbylevel($levelname);
            } else {
                $var["validasi"] = false;
                $var["upass"] = false;
            }
        } else {
            $var["validasi"] = false;
            $var["upass"] = false;
        }
        return $var;
    }
    function getDataLevel($id)
    {
        $data = $this->db_mlevel->where('code_level', $id)->get()->getRow();
        return $data;
    }

    function updateLoginAdmin($id,$ip)
    {	
        $this->db_admin->set("ip",$ip);
    	$this->db_admin->set("last_login",date("Y-m-d H:i:s"));
    	$this->db_admin->where("id_admin",$id);
    	return	$this->db_admin->update();
    }


}