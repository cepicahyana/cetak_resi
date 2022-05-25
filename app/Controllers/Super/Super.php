<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;


class Super extends BaseController
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
        $this->dashboard();
    }

    /* dashboard */
    function dashboard()
	{ 	
        $data['konfig'] = $this->m_konfig->konfig_app();
		$data['ttl_level']=$this->super->count_level();
		$data['ttl_useraktif']=$this->super->count_user(1);
		$data['ttl_usernonaktif']=$this->super->count_user(2);
		$data['ttl_user']=$this->super->count_user(0);
		$data['ttl_log']=$this->super->count_log();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("super/dashboard", $data);
        } else {
            $data['content'] = "super/dashboard";
            $this->_template($data);
        }
		
	}
    /* manajemen */
    function manajemen()
	{
        $data['konfig'] = $this->m_konfig->konfig_app();
        $data['dataGroup']=$this->m_konfig->levelResult();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("super/manajemen", $data);
        } else {
            $data['content'] = "super/manajemen";
            $this->_template($data);
        }
	}
	function input_UG()
	{
		echo view("super/add_manajemen");
	}
	function insert_UG()
	{
		$data=$this->super->insert_UG();
		echo json_encode($data);
	}
	function edit_UG()
	{
		$data["data"]=$this->super->edit_UG();
		echo view("super/edit_manajemen",$data);
	}
	function update_UG()
	{
		$data=$this->super->update_UG();
	 	echo json_encode($data);
	}
	function delete_UG()
	{	
        $data=$this->super->delete_UG();
	 	echo json_encode($data);
	}


    /* manajemen */
    function menu($id)
	{
        $data['konfig'] = $this->m_konfig->konfig_app();
		$dataMenu=$this->super->dataMenuLevel($id);
        $list="";
        foreach ($dataMenu as $level1) {
            if ($level1->level==1 && $level1->dropdown=='no') {
            $list.="    
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <div class='pull-left'>
                    <span class='btn-sm btn-info mr-3'>
                        <i class='".$level1->icon."'></i>
                    </span>
                    [".$level1->id_menu."] ".$level1->nama."
                </div>
                <div class='pull-right'>
                    <a href='javascript:void(0);'
                        onclick='edit(`".$level1->id_menu."`)'
                        class='btn btn-sm btn-primary btn-border'><i class='fa fa-edit'></i></a>

                    <a href='javascript:void(0);'
                        onclick='del(`".$level1->id_menu."`,`".$level1->nama."`)'
                        class='btn btn-sm btn-danger btn-border'><i
                            class='fa fa-trash'></i></a>
                </div>
            </li>";
            } elseif ($level1->level==1 && $level1->dropdown=='yes') { 
            $list.="    
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <div class='pull-left'>
                    <span class='btn-sm btn-info mr-3'>
                        <i class='".$level1->icon."'></i>
                    </span>
                    [".$level1->id_menu."] ".$level1->nama."
                </div>
                <div class='pull-right'>
                    <a href='javascript:void(0);' onclick='edit(`".$level1->id_menu."`)' class='btn btn-sm btn-primary btn-border'><i class='fa fa-edit'></i></a>

                    <a href='javascript:void(0);' onclick='del(`".$level1->id_menu."`,`".$level1->nama."`,`".$level1->level."`)' class='btn btn-sm btn-danger btn-border'><i class='fa fa-trash'></i></a>
                </div>
            </li>
            <ul>";

                $uri=$this->request->uri->getSegment(3);
                $dbmenu2=$this->db->table('main_menu');
                $dbmenu2->orderBy('id_menu', 'ASC');
                $dbmenu2->where('hak_akses', $uri);
                $dbmenu2->where('level', '2');
                $dbmenu2->where('id_main', $level1->id_menu);
                $menu2=$dbmenu2->get();
                foreach ($menu2->getResult() as $level2) {
                $list.="
                <li
                    class='ml-3 list-group-item d-flex justify-content-between align-items-center'>
                    <div class='pull-left'>
                        <span class='btn-sm btn-info mr-3'>
                            <i class='fas fa-minus'></i>
                        </span>
                        [".$level2->id_menu."] ".$level2->nama."
                    </div>
                    <div class='pull-right'>
                        <a href='javascript:void(0);'
                            onclick='edit(`".$level2->id_menu."`)'
                            class='btn btn-sm btn-primary btn-border'><i class='fa fa-edit'></i></a>

                        <a href='javascript:void(0);'
                            onclick='del(`".$level2->id_menu."`,`".$level2->nama."`,`".$level2->level."`)'
                            class='btn btn-sm btn-danger btn-border'><i class='fa fa-trash'></i></a>
                    </div>
                </li>";
                }
                $list.=" 
            </ul>
            </li>";
            } 
        }
        $data['listMenu']=$list;
        $data['uri']=$this->request->uri->getSegment(3);
		$data['Menu']=$this->m_konfig->namaLevel($id);
		$ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("super/menu", $data);
        } else {
            $data['content'] = "super/menu";
            $this->_template($data);
        }
	}
	function input_Menu()
	{
        $data['menuInduk'] = $this->db->table("main_menu")->where(array('level'=>1,'hak_akses'=>$this->request->getPost("uri")))->get()->getResult();
		$data["uri"]=$this->request->getPost("uri");
		echo view("super/add_menu",$data);
	}
	function insert_Menu()
	{
		$data=$this->super->insert_Menu();
		echo json_encode($data);
	}
	function edit_Menu()
	{
        $db=$this->super->edit_Menu();
        $id=isset($db->id_menu)?($db->id_menu):'';
        $role=isset($db->hak_akses)?($db->hak_akses):'';
        $data['countMain']=$this->db->query("SELECT COUNT(id_main) AS a FROM main_menu WHERE level='2' AND id_main='".$id."'")->getRow();
        $data['menuInduk']=$this->db->table("main_menu")->where(['hak_akses'=>$role,'level'=>1,'id_menu!='=>$id])->orderBy("id_menu","asc")->get()->getResult();
		$data["data"]=$this->super->edit_Menu();
		echo view("super/edit_menu",$data);
	}
	function update_Menu() //belumselesai
	{
		$data=$this->super->update_Menu();
	 	echo json_encode($data);
	}
	function delete_Menu()
	{	
        $data=$this->super->delete_Menu();
	 	echo json_encode($data);
	}


    /* data user */
    function data_user()
	{
        $data['konfig'] = $this->m_konfig->konfig_app();
        $data['dataLevel']=$this->db->table('main_level')->where('code_level>',1)->orderBy("code_level","asc")->get()->getResult();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("super/data_user", $data);
        } else {
            $data['content'] = "super/data_user";
            $this->_template($data);
        }
	}
	function data_tables_user()
	{
		$list = $this->super->get_data_user();
		$data = array();
		$no = $this->request->getPost("start");
		$no =$no+1;
		foreach ($list as $dataDB) {

			$id=isset($dataDB->id_admin)?($dataDB->id_admin):'';
			$level=isset($dataDB->level)?($dataDB->level):'';
			$ug=$this->m_konfig->namaLevel($level);
			$profilename=isset($dataDB->profilename)?($dataDB->profilename):'';
			$username=isset($dataDB->username)?($dataDB->username):'';
			$img=isset($dataDB->profileimg)?($dataDB->profileimg):'';
			if($img!=''){$img=$img;}else{$img='img_not.png';}
			$sts_aktif=isset($dataDB->sts_aktif)?($dataDB->sts_aktif):'';
			if($sts_aktif=='1'){$sts='<i>Aktif</i>';}else{$sts='<i>Tidak Aktif</i>';}

			$tombol='
					<button type="button" onclick="edit(`'.$id.'`)" class="btn btn-info btn-sm btn-border" title="Edit"><i class="fa fa-edit"></i></button>
					<button type="button" onclick="del(`'.$id.'`,`'.$level.'`,`'.$username.'`)" class="btn btn-danger btn-sm btn-border" title="Delete"><i class="fa fa-trash"></i></button>
			';
			$row = array();
			$row[] = "<span class='size linehover'  >".$no++."</span>";	
			$row[] = "<span class='size' >".$ug."</span>";
			$row[] = "<span class='size' >".$profilename."</span>";
			$row[] = "<span class='size linehover' > <img alt='Photo' class='img-responsive' width='50px' height='50px' src='".base_url()."/public/theme/images/user/".$img."'>  </img></span>";
			$row[] = "<span class='size' >  ".$username." </span>";	
			$row[] = "<span class='size text-center' >  ".$sts." </span>";			
			$row[] = $tombol ;
			//add html for action
			
			$data[] = $row;
			}
		$output = array(
			"draw" => $this->request->getPost("draw"),
			"recordsTotal" => $c=$this->super->count_data_user(),
			"recordsFiltered" =>$c,
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);

	}
	function input_User()
	{
        $data['dataLevel']=$this->db->table('main_level')->where('code_level>',1)->orderBy("code_level","asc")->get()->getResult();
		echo view("super/add_data_user",$data);
	}
	function insert_User()
	{
		$data=$this->super->insert_User();
		echo json_encode($data);
	}
	function edit_User()
	{
        $data['dataLevel']=$this->db->table('main_level')->where('code_level>',1)->orderBy("code_level","asc")->get()->getResult();
		$data["data"]=$this->super->edit_User();
		echo view("super/edit_data_user",$data);
	}
	function update_User() 
	{
		$data=$this->super->update_User();
	 	echo json_encode($data);
	}
	function delete_User()
	{	
		$data=$this->super->delete_User();
		echo json_encode($data);
	}


    /* data log */
    function data_log()
	{
        $data['konfig'] = $this->m_konfig->konfig_app();
        $data['dataLevel']=$this->db->table('main_level')->where('code_level>',1)->orderBy("code_level","asc")->get()->getResult();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("super/data_log", $data);
        } else {
            $data['content'] = "super/data_log";
            $this->_template($data);
        }
	}
	function data_tables_log()
	{
		$list = $this->super->get_data_log();
		$data = array();
		$no = $this->request->getPost("start");
		$no =$no+1;
		foreach ($list as $dataDB) {

			$id=isset($dataDB->id_log)?($dataDB->id_log):'';
			$nama_user=isset($dataDB->nama_user)?($dataDB->nama_user):'';
            $levelname=isset($dataDB->levelname)?($dataDB->levelname):'';
			$table_update=isset($dataDB->table_updated)?($dataDB->table_updated):'';
			$aksi=isset($dataDB->aksi)?($dataDB->aksi):'';
            $ip=isset($dataDB->ip)?($dataDB->ip):'';
			$tgl=isset($dataDB->tgl)?($dataDB->tgl):'';
			$tombol='
				<button type="button" onclick="del(`'.$id.'`,`'.$nama_user.' '.$aksi.' '.$tgl.'`)" class="btn btn-danger btn-sm btn-border" title="Delete"><i class="fa fa-trash"></i></button>
			';
			$row = array();
			$row[] = "<span class='size linehover'  >".$no++."</span>";	
			$row[] = "<span class='size' >".$nama_user."</span>";
            $row[] = "<span class='size' >".$levelname."</span>";
			$row[] = "<span class='size' >".$table_update."</span>";
			$row[] = "<span class='size' >".$aksi."</span>";
			$row[] = "<span class='size' >  ".$tgl." </span>";
            $row[] = "<span class='size' >  ".$ip." </span>";			
			$row[] = $tombol ;
			//add html for action
			
			$data[] = $row;
			}
		$output = array(
			"draw" => $this->request->getPost("draw"),
			"recordsTotal" => $c=$this->super->count_data_log(),
			"recordsFiltered" =>$c,
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}
	function delete_Log()
	{	
        $data=$this->super->delete_Log();
		echo json_encode($data);
	}

    /* config app */
    function config_app()
	{
        $data['konfig'] = $this->m_konfig->konfig_app();
        $data['dataLevel']=$this->db->table('main_level')->where('code_level>',1)->orderBy("code_level","asc")->get()->getResult();
        $ajax = $this->request->getPost("ajax");
        if ($ajax == "yes") {
            return view("super/config_app", $data);
        } else {
            $data['content'] = "super/config_app";
            $this->_template($data);
        }
	}
    function update_Config() 
	{
		$data=$this->super->update_Config();
	 	echo json_encode($data);
	}

    


    
}
