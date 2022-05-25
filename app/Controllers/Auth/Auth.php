<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

//use Config\Services;


class Auth extends BaseController
{
    /*tabel*/
    //protected $admin           = 'admin';
    /*model*/
    protected $M_auth;
    /*tabel*/
    //protected $db_damin;

    private $db;
    public function __construct()
    {
        $this->mdl = new \App\Models\M_auth();
        //$this->validation = Services::validation();
        $this->db = \Config\Database::connect();
        //$this->db_admin = $this->db->table($this->admin);
    }


    public function index()
    {
        $data['konfig'] = $this->m_konfig->konfig_applogin();
        $data['content'] = "auth/index";
        return view('temp_login/content', $data);
    }

    function cekLogin()
	{
		$hasil=$this->mdl->cekLogin();
		echo json_encode($hasil);
	}

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}