<?php

namespace App\Controllers;

class Data_resi extends BaseController
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
            return view("data_resi/index", $data);
        } else {
            $data['content'] = "data_resi/index";
            $this->_template($data);
        }
    }
    function data_tables()
	{
		$list = $this->mdl->get_data_table();
		$data = array();
		$no = $this->request->getPost("start");
		$no =$no+1;
		foreach ($list as $dataDB) {

			$id=$dataDB->id??'';
			$kode_menu=$dataDB->kode_menu??'';
            $nama_menu=$dataDB->nama_menu??'';
			$kode_kategori=$dataDB->kode_kategori??'';
            $nama_kategori=$dataDB->nama_kategori??'';
			$deskripsi=$dataDB->deskripsi??'';
			$harga=$dataDB->harga??'';
            $diskon=$dataDB->diskon??'';
            $nourut=$dataDB->nourut??'';
            $_ctime=$dataDB->_ctime??'';
			$img=$dataDB->foto??'';
			if($img!=''){$img=$img;}else{$img='img_not.png';}
			$sts_publish=$dataDB->status??'';
			if($sts_publish=='Publish'){$sts='<span class="text-success">'.$sts_publish.'</span>';}else{$sts='<span class="text-danger">'.$sts_publish.'</span>';}

			$tombol='
					<button type="button" onclick="edit(`'.$id.'`)" class="btn btn-info btn-sm btn-border" title="Edit"><i class="fa fa-edit"></i></button>
					<button type="button" onclick="del(`'.$id.'`,`'.$nama_menu.'`)" class="btn btn-danger btn-sm btn-border" title="Delete"><i class="fa fa-trash"></i></button>
			';
			$row = array();
			$row[] = "<span class='size linehover'  >".$no++."</span>";
            $row[] = "<span class='size' >".$nourut."</span>";
            $row[] = "<span class='size linehover' > <img alt='Photo' class='img-responsive' width='50px' height='50px' src='".base_url()."/public/theme/images/menu/".$img."'> </img></span>";	
			$row[] = "<span class='size' >".$nama_menu."</span>";
            $row[] = "<span class='size' >".$nama_kategori."</span>";
			$row[] = "<span class='size' >".$harga."</span>";
			$row[] = "<span class='size' >  ".$diskon." </span>";	
			$row[] = "<span class='size text-center' >  ".$sts." </span>";			
			$row[] = $tombol ;
			//add html for action
			
			$data[] = $row;
			}
		$output = array(
			"draw" => $this->request->getPost("draw"),
			"recordsTotal" => $c=$this->mdl->count_data_table(),
			"recordsFiltered" =>$c,
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);

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
