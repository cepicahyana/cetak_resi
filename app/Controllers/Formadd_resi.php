<?php

namespace App\Controllers;

class Formadd_resi extends BaseController
{
    /*model*/
    protected $M_super;
    protected $M_profile;
    protected $M_data_resi;
    /*db*/
    protected $db;
    
    public function __construct()
    {
        $this->super = new \App\Models\M_super();
        $this->profile = new \App\Models\M_profile();
        $this->mdl = new \App\Models\M_data_resi();
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
        $data['kategoriMenu']=$this->mdl->kategorimenu();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("formadd_resi/index", $data);
        } else {
            $data['content'] = "formadd_resi/index";
            $this->_template($data);
        }
    }

    function input_data()
	{
        $data['kategoriMenu']=$this->mdl->kategorimenu();
		echo view("data_resi/add_data",$data);
	}
    function insert_data()
	{
		$data=$this->mdl->insert_data();
		echo json_encode($data);
	}
	function edit_data()
	{
		$data['kategoriMenu']=$this->mdl->kategorimenu();
		$data["dataDB"]=$this->mdl->edit_data();
		echo view("data_resi/edit_data",$data);
	}
	function update_data() 
	{
		$data=$this->mdl->update_data();
	 	echo json_encode($data);
	}
	function delete_data()
	{	
		$data=$this->mdl->delete_data();
		echo json_encode($data);
	}

    
    
}
