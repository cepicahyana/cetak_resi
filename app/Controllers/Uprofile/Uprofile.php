<?php

namespace App\Controllers\Uprofile;

use App\Controllers\BaseController;


class Uprofile extends BaseController
{
    /*model*/
    protected $M_profile;
    /*db*/
    protected $db;
    
    public function __construct()
    {
        $this->mdl = new \App\Models\M_profile();
        //$this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }

    function _template($data)
    {
        echo view('temp_back/content', $data);
    }

    public function index()
    {
        $data['konfig'] = $this->m_konfig->konfig_app();
		$data['data'] = $this->mdl->get_Profile();
		$data['namaLevel'] = $this->m_konfig->namaLevel(session('level'));
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("uprofile/index", $data);
        } else {
            $data['content'] = "uprofile/index";
            $this->_template($data);
        }
    }
	function update_Profile()
	{
		$data=$this->mdl->update_Profile();
	 	echo json_encode($data);
	}
	
	
	public function new_password()
	{
		$data['konfig'] = $this->m_konfig->konfig_app();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("uprofile/new_password", $data);
        } else {
            $data['content'] = "uprofile/new_password";
            $this->_template($data);
        }
	}
	function update_Password()
	{
		$data=$this->mdl->update_Password();
		echo json_encode($data);
	}
    
    


    
}
