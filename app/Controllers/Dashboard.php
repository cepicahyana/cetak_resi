<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    /*model*/
    protected $M_super;
    protected $M_profile;
    /*db*/
    protected $db;
    
    public function __construct()
    {
        $this->super = new \App\Models\M_super();
        $this->profile = new \App\Models\M_profile();
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
		$data['ttl_level']=$this->super->count_level();
		$data['ttl_useraktif']=$this->super->count_user(1);
		$data['ttl_usernonaktif']=$this->super->count_user(2);
		$data['ttl_user']=$this->super->count_user(0);
		$data['ttl_log']=$this->super->count_log();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("dashboard/index", $data);
        } else {
            $data['content'] = "dashboard/index";
            $this->_template($data);
        }
    }

    
    
}
