<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class M_super extends Model
{
    //table
    protected $admin = "admin";
    protected $main_menu = "main_menu";
    protected $main_level = "main_level";
    protected $main_log = "main_log";
	protected $main_konfig = "main_konfig";
    //nexttable
    protected $db_admin;
    protected $db_level;
    protected $db_menu;
    protected $db_log;
	protected $db_konfig;
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
        $this->db_admin=$this->db->table($this->admin);
        $this->db_level=$this->db->table($this->main_level);
        $this->db_menu=$this->db->table($this->main_menu);
        $this->db_log=$this->db->table($this->main_log);
		$this->db_konfig=$this->db->table($this->main_konfig);
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

    //dashboard--------------------------------------
    function count_level()
	{	
		$this->db_level->get();
		return $this->db_level->countAllResults();
	}
	function count_user($id)
	{	
		if($id>=1){
			$this->db_admin->where('sts_aktif',$id);
		}
		return $this->db_admin->countAllResults();
	}
	
	function count_log()
	{	
		return $this->db_log->countAllResults();
	}

    //manajemen--------------------------------------
	function insert_UG()
	{
		$var=array();

		$idu=$this->idu();
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$levelname=$this->request->getPost("f[levelname]");
		$code_level=$this->request->getPost("f[code_level]");
		
        $this->db_level->where("levelname",$levelname);
		$cek=$this->db_level->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, levelname already exists.";
			return $var;
		}
		
        $this->db_level->where("code_level",$code_level);
		$cek2=$this->db_level->countAllResults();
		if($cek2)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code level already exists.";
			return $var;
		}

        $ctime=date("Y-m-d H:i:s"); 
        $cid=$idu;
        
        $this->db_level->set("_ctime",$ctime);
        $this->db_level->set("_cid",$cid);
        $this->db_level->set($datainputan);
        $this->db_level->insert();
        return $var; 	 
	}
	function edit_UG()
	{
		$id=$this->request->getPost("id");
		$this->db_level->where('id_level',$id);
		$query = $this->db_level->get();
		return $query->getRow();
	}
	function update_UG()
	{
		$var=array();

		$idu=$this->idu();
		$id=$this->request->getPost("id_level");
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$levelname=$this->request->getPost("f[levelname]");
		$levelname_b=$this->request->getPost("levelname_b");
		$code_level=$this->request->getPost("f[code_level]");
		$code_level_b=$this->request->getPost("code_level_b");

		$this->db_level->where("levelname!=",$levelname_b);
        $this->db_level->where("levelname",$levelname);
        $cek=$this->db_level->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, levelname already exists.";
			return $var;
		}
		
        $this->db_level->where("code_level!=",$code_level_b);
        $this->db_level->where("code_level",$code_level);
        $cek2=$this->db_level->countAllResults();
		if($cek2)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code level already exists.";
			return $var;
		}
		
        $utime=date("Y-m-d H:i:s"); 
        $uid=$idu;
       
        $this->db_level->set("_utime",$utime);
        $this->db_level->set("_uid",$uid);
        $this->db_level->set($datainputan);  
        $this->db_level->where("id_level",$id);
        $this->db_level->update();
        return $var;

	}
	function delete_UG()
	{
		$var=array();
		$id=$this->request->getPost("id");
		$level=$this->request->getPost("level");
		$cekmenu=$this->db->table('main_menu')->where('hak_akses',$level)->countAllResults();
		if($cekmenu){
			$this->db_menu->where("hak_akses",$level);
			$this->db_menu->delete();
		}
		$this->db_level->where("id_level",$id);
		$this->db_level->delete();
		return $var;
	}


    //menu--------------------------------------
    function dataMenuLevel($id)
	{
		$this->db_menu->where("hak_akses",$id);
		$this->db_menu->orderBy("id_menu","ASC");
		$query = $this->db_menu->get();
		return $query->getResult();
	}
	function insert_Menu()
	{
		$var=array();

		$idu=$this->idu();
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$level=$this->request->getPost("f[level]");
		$main=$this->request->getPost("main");
		$name=$this->request->getPost("f[nama]");
		$hak=$this->request->getPost("f[hak_akses]");

        $this->db_menu->where("nama",$name);
        $this->db_menu->where("hak_akses",$hak);
		$cek=$this->db_menu->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or name already exists.";
			return $var;
		}

        $ctime=date("Y-m-d H:i:s"); 
        $cid=$idu;
        if($level=='2'){
            $this->db_menu->set("dropdown","yes");  
            $this->db_menu->where("id_menu",$main);
            $this->db_menu->update();
            $this->db_menu->set("id_main",$main);
        }
        $this->db_menu->set("_ctime",$ctime);
        $this->db_menu->set("_cid",$cid);
        $this->db_menu->set("dropdown","no");
        $this->db_menu->set($datainputan);
        $this->db_menu->insert();
        return $var; 	 
	}
	function edit_Menu()
	{
		$id=$this->request->getPost("id");
		$this->db_menu->where('id_menu',$id);
		$query = $this->db_menu->get();
		return $query->getRow();
	}
	function update_Menu()
	{
		$var=array();

		$idu=$this->idu();
		$id=$this->request->getPost("id_menu");
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$level=$this->request->getPost("f[level]");
		$dropdown=$this->request->getPost("f[dropdown]");
		$hak_akses=$this->request->getPost("f[hak_akses]");
		$main=$this->request->getPost("main");
		$name=$this->request->getPost("f[nama]");
		$name_b=$this->request->getPost("nama_b");
		$main_b=$this->request->getPost("main_b");

		$this->db_menu->where("nama!=",$name_b);
		$this->db_menu->where('nama',$name);
		$this->db_menu->where('hak_akses',$hak_akses);
		$cek=$this->db_menu->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, code or name already exists.";
			return $var;
		}
		
        $utime=date("Y-m-d H:i:s"); 
        $uid=$idu;
        if($level=='1'){
            $this->db_menu->set("dropdown",$dropdown); 
            $this->db_menu->set("id_main",0);
            $this->db_menu->set("_utime",$utime);
            $this->db_menu->set("_uid",$uid);
            $this->db_menu->set($datainputan);  
            $this->db_menu->where("id_menu",$id);
            $this->db_menu->update();
        }elseif($level=='2'){
            $this->db_menu->set("dropdown",$dropdown); 
            $this->db_menu->set("id_main",$main);
            $this->db_menu->set("_utime",$utime);
            $this->db_menu->set("_uid",$uid);
            $this->db_menu->set($datainputan);  
            $this->db_menu->where("id_menu",$id);
            $this->db_menu->update();
			if($main!=$main_b){
				if($main_b){
					$this->db_menu->set("dropdown","no"); 
					$this->db_menu->where("id_menu",$main_b);
					$this->db_menu->update();
				}
				if($main){
					$this->db_menu->set("dropdown","yes"); 
					$this->db_menu->where("id_menu",$main);
					$this->db_menu->update();
				}
			}
        }
        return $var;
	}
	function delete_Menu()
	{
		$var=array();
		$id=$this->request->getPost("id");
		$level=$this->request->getPost("level");
		$getmain=$this->db_menu->where('id_menu',$id)->get()->getRow();
		$main=$getmain->id_main??'';

		$sub=$this->db_menu->where('id_main',$id)->get()->getResult();
		$jmlsub=$this->db_menu->where('id_main',$id)->countAllResults();

		if($jmlsub>0){
			foreach($sub as $submenu)
			{
			$this->db_menu->set("level","1");
			$this->db_menu->set("id_main","0");	
			$this->db_menu->where("id_menu",$submenu->id_menu);
			$this->db_menu->update();
			}
		}else{
			$this->db_menu->set("dropdown","no");	
			$this->db_menu->where("id_menu",$main);
			$this->db_menu->update();
		}
		
		$this->db_menu->where("id_menu",$id);
		$this->db_menu->delete();
		return $var;
		
	}


	//data user--------------------------------------
	function get_data_user()
	{
		$this->_get_datatables_user();
		if($this->request->getPost("length") != -1) 
		$this->db_admin->limit($this->request->getPost("length"),$this->request->getPost("start"));
		$query = $this->db_admin->get();
        return $query->getResult();
	}
	function _get_datatables_user()
	{	
		$f1=$this->request->getPost('f1');
		if($f1){
			$this->db_admin->where('level',$f1); 
		}
		$this->db_admin->where('level!=',1); 
		$column_order = array('','level'); //field yang ada di table user
    	$column_search = array('profilename','username');
		$order = array('_ctime' => 'desc');

		$i = 0;
        foreach ($column_search as $item) // looping awal
        {
            if ($this->request->getPost('search')['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $this->db_admin->groupStart();
                    $this->db_admin->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->db_admin->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($column_search) - 1 == $i)
                    $this->db_admin->groupEnd();
            }
            $i++;
        }
		$post_order = $this->request->getPost('order');
        if (isset($post_order)) {
            $this->db_admin->orderBy($column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db_admin->orderBy(key($order), $order[key($order)]);
        }
	}
	function count_data_user()
	{		
		$this->_get_datatables_user();
        return $this->db_admin->countAllResults();
	}

	function insert_User()
	{
		$var=array();
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$username=$this->request->getPost("f[username]");
		$password=md5($this->request->getPost("password"));
		//cek dulu
		$this->db_admin->where("username",$username);
		$cek=$this->db_admin->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, username already exists.";
			return $var;
		}

		///
		$img=$this->m_reff->upload_file("profileimg","public/theme/images/user/","fileadmin","JPG,JPEG,PNG","1000000",null);
        if ($img!=null) {
            if ($img['validasi']==true) {
                $this->db_admin->set("profileimg", $img['name']);
            }
        }
		$this->db_admin->set("password",$password);
		$this->db_admin->set($datainputan);
		$this->db_admin->insert();
		$var['table']=true;
		return $var; 
				 
	}
	function edit_User()
	{
		$id=$this->request->getPost("id");
		$this->db_admin->where('id_admin',$id);
		$query = $this->db_admin->get();
		return $query->getRow();
	}
	function update_User()
	{
		$var=array();
		$id=$this->request->getPost("id_admin");
		$input=$this->request->getPost("f");
		//$datainputan=$this->security->xss_clean($input);
		$datainputan=$input;
		
		$username=$this->request->getPost("f[username]");
		$username_b=$this->request->getPost("username_b");
		$profileimg_b=$this->request->getPost("profileimg_b");
		$password=$this->request->getPost("password");
		$passwordconvert=md5($password);

		$this->db_admin->where("username!=",$username_b);
		$this->db_admin->where('username',$username);
		$cek=$this->db_admin->countAllResults();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, Username already exists.";
			return $var;
		}
		///
		$img=$this->m_reff->upload_file("profileimg","public/theme/images/user/","fileadmin","JPG,JPEG,PNG","1000000",$profileimg_b);
		if($img!=null){
			if($img['validasi']==true){
				$this->db_admin->set("profileimg",$img['name']);
			}
		}
		$this->db_admin->set($datainputan); 
		if($password!=''){$this->db_admin->set("password",$passwordconvert);}
		$this->db_admin->where("id_admin",$id);
		$this->db_admin->update();
		$var['table']=true;

		return $var;
	}
	function delete_User()
	{
		$var=array();
	    $id=$this->request->getPost("id");
	    $level=$this->request->getPost("level");
		
		$this->db_admin->where("id_admin",$id);
		$del=$this->db_admin->get()->getRow();
		$image=isset($del->profileimg)?($del->profileimg):'';
		if($image!=null){
			$structure = './public/theme/images/user/'.$image.'';
			if(file_exists($structure)){
				unlink($structure);
			}
		}
		if($del)
		{
			$this->db_admin->where("id_admin",$id);
			$this->db_admin->delete();
			$var['table']=true;
		}
		return $var;
	}


	//data log--------------------------------------
	function get_data_log()
	{
		$this->_get_datatables_log();
		if($this->request->getPost("length") != -1) 
		$this->db_log->limit($this->request->getPost("length"),$this->request->getPost("start"));
		$query = $this->db_log->get();
        return $query->getResult();
	}
	function _get_datatables_log()
	{	
		$f1=$this->request->getPost('f1');
		if($f1){
			$this->db_log->where('level',$f1); 
		}
		$column_order = array('','nama_user','level','','','tgl'); //field yang ada di table user
    	$column_search = array('nama_user','levelname');
		$order = array('tgl' => 'desc');

		$i = 0;
        foreach ($column_search as $item) // looping awal
        {
            if ($this->request->getPost('search')['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $this->db_log->groupStart();
                    $this->db_log->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->db_log->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($column_search) - 1 == $i)
                    $this->db_log->groupEnd();
            }
            $i++;
        }
		$post_order = $this->request->getPost('order');
        if (isset($post_order)) {
            $this->db_log->orderBy($column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db_log->orderBy(key($order), $order[key($order)]);
        }
	}
	function count_data_log()
	{		
		$this->_get_datatables_log();
        return $this->db_log->countAllResults();
	}
	function delete_Log()
	{
		$var=array();
		$id=$this->request->getPost("id");
		$this->db_log->where("id_log",$id);
		$this->db_log->delete();
		$var['table']=true;
		return $var;
	}



	//config app--------------------------------------
	function update_Config()
	{
		$time=date('His');
		
		$var=array();
		$loggo=$this->request->getPost("loggo");
		$loggo_b=$this->request->getPost("loggo_b");
		$fav=$this->request->getPost("fav");
		$fav_b=$this->request->getPost("fav_b");
		$loggo_login=$this->request->getPost("loggo_login");
		$loggo_login_b=$this->request->getPost("loggo_login_b");
		$loggo_admin=$this->request->getPost("loggo_admin");
		$loggo_admin_b=$this->request->getPost("loggo_admin_b");
        if (isset($_FILES['loggo']['tmp_name'])) {
            $img=$this->m_reff->upload_file("loggo", "public/theme/images/", "file_a", "JPG,JPEG,PNG", "1000000", $loggo_b);
            if ($img!=null) {
                if ($img['validasi']==true) {
                    $data=array("value"=>$img['name']);
                    $this->db_konfig->where("id_konfig", "1");
                    $this->db_konfig->update($data);
                } else {
                    $var["info"]  = $file["info"];
                    return $var;
                }
            }
        }
        if (isset($_FILES['fav']['tmp_name'])) {
            $img2=$this->m_reff->upload_file("fav", "public/theme/images/", "file_b", "ICO,PNG", "1000000", $fav_b);
            if ($img2!=null) {
                if ($img2['validasi']==true) {
                    $data2=array("value"=>$img2['name']);
                    $this->db_konfig->where("id_konfig", "2");
                    $this->db_konfig->update($data2);
                } else {
                    $var["info"]  = $file["info"];
                    return $var;
                }
            }
        }
        if (isset($_FILES['loggo_login']['tmp_name'])) {
            $img3=$this->m_reff->upload_file("loggo_login", "public/theme/images/", "file_c", "JPG,JPEG,PNG", "1000000", $loggo_login_b);
            if ($img3!=null) {
                if ($img3['validasi']==true) {
                    $data3=array("value"=>$img3['name']);
                    $this->db_konfig->where("id_konfig", "3");
                    $this->db_konfig->update($data3);
                } else {
                    $var["info"]  = $file["info"];
                    return $var;
                }
            }
        }
		if(isset($_FILES['loggo_admin']['tmp_name'])){
			$img4=$this->m_reff->upload_file("loggo_admin","public/theme/images/","file_d","JPG,JPEG,PNG","1000000",$loggo_admin_b);
            if ($img4!=null) {
                if ($img4['validasi']==true) {
                    $data4=array("value"=>$img4['name']);
                    $this->db_konfig->where("id_konfig", "4");
                    $this->db_konfig->update($data4);
                }else{
					$var["info"]  = $file["info"];
 					return $var; 
				}
            }
		}
		////////////////////
		for($i=5;$i<=14;$i++)
		{
			$input=$this->request->getPost("input".$i);
			$array=array("value"=>$input);
			$this->db_konfig->where("id_konfig",$i);
			$this->db_konfig->update($array);
		}
		return $var;
		
	}



    
    

    


    
}

