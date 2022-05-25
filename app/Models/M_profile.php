<?php

namespace App\Models;

use CodeIgniter\Model;

class M_profile extends Model
{
    //table
    protected $admin = "admin";
    //libraries
    protected $tanggal;
    //modelexternal
    protected $M_reff;
    //inconstruct
    protected $request;
    protected $db;
    protected $db_admin;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $request = \Config\Services::request();
        $this->request = $request;
        //deklarmodel
        $this->m_reff = new \App\Models\M_reff();
        //deklartabel
        $this->db_admin = $this->db->table($this->admin);
        //deklarlibrary
        $this->tanggal = new \App\Libraries\Tanggal();
    }
    //library
    function idu()
    {
        return session("id");
    }
    function codeLevel()
    {
        return session("level");
    }

    //---------------------------------------------------------
    function get_Profile()
	{
		$idu=$this->idu();
		$this->db_admin->where('id_admin',$idu);
		$query = $this->db_admin->get();
		return $query->getRow();
	}
	
	function update_Profile()
	{
		$var=array();
		$code_level=$this->codeLevel();
		$idu=$this->idu();
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
        $datainputan=$input;
		
		$username=$this->request->getPost("f[username]");
		$username_b=$this->request->getPost("username_b");
		$profileimg_b=$this->request->getPost("profileimg_b");

		//cek dulu
		$this->db_admin->where("username!=",$username_b);
		$this->db_admin->where('username',$username);
		$cek=$this->db_admin->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, username already exists.";
			return $var;
		}

		///
        if (isset($_FILES['profileimg']['tmp_name'])) {
            $img1=$this->m_reff->upload_file("profileimg", "public/theme/images/user/", "fileadmin", "JPG,JPEG,PNG", "1000000", $profileimg_b);
            if ($img1!=null) {
                if ($img1['validasi']==true) {
                    $this->db_admin->set("profileimg", $img1['name']);
                }else{
                    $var["gagal"] = false;
                    $var["info"]  = $file["info"];
                    return $var; 
                }
            }
            
        }else{
            $var["gagal"] = false;
			$var["info"]  = "silahkan upload file yang sesuai";
			return $var; 
        }   

        $this->db_admin->set($datainputan);
        $this->db_admin->where("id_admin", $idu);
        $this->db_admin->update();
		return $var;
	}
	

	function update_Password()
	{
		$var=array();
		$code_level=$this->codeLevel();
		$idu=$this->idu();
		$userDB=$this->m_konfig->dataProfile($idu,$code_level);
		$password = $userDB->password;
		$passold = md5($this->request->getPost('passold'));
		$passnew = $this->request->getPost('passnew');
		$retpass = $this->request->getPost('retpass');
		if($passold=='' || $passnew=='' || $retpass==''){
			$var['gagal']=false;
			$var['info']="Make sure all fields are filled";
			return $var;
		}elseif($passold != $password){
			$var['gagal']=false;
			$var['info']="The old password is not suitable";
			return $var;
		}elseif($passnew != $retpass){
			$var['gagal']=false;
			$var['info']="Please repeat the password correctly";
			return $var;
		}else{
			$this->db_admin->set("password",md5($passnew));
			$this->db_admin->where("id_admin",$idu);
			$this->db_admin->update($this->admin);
			return $var;
		}
	}
}
