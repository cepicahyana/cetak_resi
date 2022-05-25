<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class M_data_resi extends Model
{
    //table
    protected $data_menu = "data_menu";
	protected $tm_kategorimenu = "tm_kategorimenu";
    //nexttable
    protected $db_data_menu;
	protected $db_kategorimenu;
    //libraries
    protected $tanggal;
    //modelexternal
    protected $M_reff;
    //inconstruct
    protected $request;
    protected $db;
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
        //deklartable
        $this->db_data_menu=$this->db->table($this->data_menu);
		$this->db_kategorimenu=$this->db->table($this->tm_kategorimenu);
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
        return session("id_level");
    }

	//referensi--------------------------------------
	function kategorimenu()
	{
		$query = $this->db_kategorimenu->get();
		return $query->getResult();
	}

	//data menu--------------------------------------
	function get_data_table()
	{
		$this->_get_datatables();
		if($this->request->getPost("length") != -1) 
		$this->db_data_menu->limit($this->request->getPost("length"),$this->request->getPost("start"));
		$query = $this->db_data_menu->get();
        return $query->getResult();
	}
	function _get_datatables()
	{	
		$f1=$this->request->getPost('f1');
		// if($f1){
		// 	$this->db_data_menu->where('kode_kategori',$f1); 
		// }
		//$this->db_data_menu->where('level!=',1); 
		$column_order = array('','nourut'); //field yang ada di table
    	$column_search = array('nama_menu','nama_kategori');
		$order = array('_ctime' => 'desc');

		$i = 0;
        foreach ($column_search as $item) // looping awal
        {
            if ($this->request->getPost('search')['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $this->db_data_menu->groupStart();
                    $this->db_data_menu->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->db_data_menu->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($column_search) - 1 == $i)
                    $this->db_data_menu->groupEnd();
            }
            $i++;
        }
		$post_order = $this->request->getPost('order');
        if (isset($post_order)) {
            $this->db_data_menu->orderBy($column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db_data_menu->orderBy(key($order), $order[key($order)]);
        }
	}
	function count_data_table()
	{		
		$this->_get_datatables();
        return $this->db_data_menu->countAllResults();
	}

	function insert_data()
	{
		$var=array();
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$userid=$this->idu();
		$date=date('Y-m-d h:i:s');
		$kode_menu=$this->request->getPost("f[kode_menu]");
		//cek dulu
		$this->db_data_menu->where("kode_menu",$kode_menu);
		$cek=$this->db_data_menu->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, kode menu already exists.";
			return $var;
		}

		///
		$img=$this->m_reff->upload_file("foto","public/theme/images/menu/","filemenu","JPG,JPEG,PNG","1000000",null);
        if ($img!=null) {
            if ($img['validasi']==true) {
                $this->db_data_menu->set("foto", $img['name']);
            }
        }
		$this->db_data_menu->set($datainputan);
		$this->db_data_menu->set('_cid',$userid);
		$this->db_data_menu->set('_ctime',$date);
		$this->db_data_menu->set('_uid',$userid);
		$this->db_data_menu->set('_utime',$date);
		$this->db_data_menu->insert();
		$var['table']=true;
		return $var; 
				 
	}
	function edit_data()
	{
		$id=$this->request->getPost("id");
		$this->db_data_menu->where('id',$id);
		$query = $this->db_data_menu->get();
		return $query->getRow();
	}
	function update_data()
	{
		$var=array();
		$id=$this->request->getPost("id");
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$userid=$this->idu();
		$date=date('Y-m-d h:i:s');
		$kode_menu=$this->request->getPost("f[kode_menu]");
		$kode_menu_b=$this->request->getPost("kode_menu_b");
		$menuimg_b=$this->request->getPost("foto_b");

		$this->db_data_menu->where("kode_menu!=",$kode_menu_b);
		$this->db_data_menu->where('kode_menu',$kode_menu);
		$cek=$this->db_data_menu->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, kode menu already exists.";
			return $var;
		}
		///
		$img=$this->m_reff->upload_file("foto","public/theme/images/menu/","filemenu","JPG,JPEG,PNG","1000000",$menuimg_b);
		if($img!=null){
			if($img['validasi']==true){
				$this->db_data_menu->set("foto",$img['name']);
			}
		}
		$this->db_data_menu->set($datainputan); 
		$this->db_data_menu->set('_uid',$userid);
		$this->db_data_menu->set('_utime',$date);
		$this->db_data_menu->where("id",$id);
		$this->db_data_menu->update();
		$var['table']=true;

		return $var;
	}
	function delete_data()
	{
		$var=array();
	    $id=$this->request->getPost("id");
		
		$this->db_data_menu->where("id",$id);
		$del=$this->db_data_menu->get()->getRow();
		$image=$del->foto??'';
		if($image!=null){
			$structure = './public/theme/images/menu/'.$image.'';
			if(file_exists($structure)){
				unlink($structure);
			}
		}
		if($del)
		{
			$this->db_data_menu->where("id",$id);
			$this->db_data_menu->delete();
			$var['table']=true;
		}
		return $var;
	}


	


    
}

