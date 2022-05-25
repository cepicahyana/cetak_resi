<?php

namespace App\Models;

use CodeIgniter\Model;

class M_konfig extends Model
{
    //modelexternal
    protected $M_reff;
    //inconstruct
    protected $request;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $request = \Config\Services::request();
        $this->request = $request;
        //deklarmodel
        $this->m_reff = new \App\Models\M_reff();
    }

    //log-------------------------------------------------
    function log($tabel,$aksi,$nama=null,$levelname=null)
	{	
		$data=array(
            "id_admin"=>session('id'),
            "nama_user"=>$nama,
            "level"=>session('level'),
            "levelname"=>$levelname,
            "table_updated"=>$tabel,
            "ip"=>$this->request->getIPAddress(),
            "aksi"=>$aksi,
            "tgl"=>date('Y-m-d H:i:s')
		);
		return $this->db->table("main_log")->insert($data);
	}

    //Role------------------------------------------------
    function levelResult()
    {
        return $this->db->table("main_level")->orderBy("code_level", "ASC")->get()->getResult();
    }
    function idLevel($id) //id_level
    {
        $db = $this->db->table("main_level")->where('levelname', $id)->get()->getRow();
        return $db->id_level ?? '';
    }
    function namaLevel($id)
    {
        $db = $this->db->table("main_level")->where('code_level', $id)->get()->getRow();
        return $db->levelname ?? '';
    }
    function directbylevel($namalevel)
    {
        $db = $this->db->table("main_level")->where('levelname', $namalevel)->get()->getRow();
        return $db->direct ?? "dashboard";
    }
    function validasi_session($id)
    {
        //$this->m_konfig->validasi_session(["superadmin","admin","quality"]);
        $sesi = session()->get("level");
        $db = $this->db->table("main_level")->whereNotIn("levelname", $id)->get()->getResult();
        foreach ($db as $data) {
            if (strtolower($sesi) == strtolower($data->levelname)) {
                return redirect()->to(base_url($data->direct));
            }
        }
        if (!$sesi) {
            return  redirect()->to(base_url("logout"));
        };
    }
    //User Profile--------------------------------------------------
    function dataProfile($id,$level=null)
    {
        return $this->db->table("admin")->getWhere(array("id_admin" => $id))->getRow();
        /*if($level==3){ for user per group
			return $this->db->get_where("data_kri",array("id"=>$id))->row();
		}*/
    }
    //konfig app-------------------------------------------------
    function konfig_applogin(){
        $data = [
            //konfigtemp
            'logo' => $this->konfigurasi(1),
            'favicon' => $this->konfigurasi(2),
            'logo_login' => $this->konfigurasi(3),
            'logo_admin' => $this->konfigurasi(4),
            'project_date' => $this->konfigurasi(5),
            'client_name' => $this->konfigurasi(6),
            'app_name' => $this->konfigurasi(7),
            'product_by' => $this->konfigurasi(8),
            'copyright' => $this->konfigurasi(9),
            'record_log' => $this->konfigurasi(10),
            'version' => $this->konfigurasi(11),
            'power' => $this->konfigurasi(12),
            'title' => $this->konfigurasi(13),
            'header_name' => $this->konfigurasi(14),
            //userprofile
            'levelname' => session("levelname"),
            //responsive
            'mobile' => $this->m_reff->mobile()
        ];
        return $data;
    }
    function konfig_app(){
        $data = [
            //konfigtemp
            'logo' => $this->konfigurasi(1),
            'favicon' => $this->konfigurasi(2),
            'logo_login' => $this->konfigurasi(3),
            'logo_admin' => $this->konfigurasi(4),
            'project_date' => $this->konfigurasi(5),
            'client_name' => $this->konfigurasi(6),
            'app_name' => $this->konfigurasi(7),
            'product_by' => $this->konfigurasi(8),
            'copyright' => $this->konfigurasi(9),
            'record_log' => $this->konfigurasi(10),
            'version' => $this->konfigurasi(11),
            'power' => $this->konfigurasi(12),
            'title' => $this->konfigurasi(13),
            'header_name' => $this->konfigurasi(14),
            //userprofile
            'dataProfile' => $this->dataProfile(session("id")),
            'levelname' => session("levelname"),
            //responsive
            'mobile' => $this->m_reff->mobile(),
            //menusidebar
            'sidebar_menu' =>  $this->menusidebar()
        ];
        return $data;
    }
    function konfigurasi($id)
    {
        $db = $this->db->table("main_konfig")->where('id_konfig', $id)->get()->getRow();
        return $db->value ?? '';
    }
    
    //menu template 
    function menusidebar()
    {
        $link = "";
        $aktif = "";
        $uri1 = $this->request->uri->getSegment(1);
        $uri2 = $this->request->uri->getSegment(2);
        $uri = $uri1 . "/" . $uri2;
        $sa="";
        $sb=""; 

        $menu = $this->db->table("main_menu")->where(['hak_akses' => session("level"), 'level' => 1])->orderBy("id_menu", "ASC")->get();
        $li = "";
        foreach ($menu->getResult() as $level1) {
            $id_main1=$level1->id_main??'';
            $id_menu1=$level1->id_menu??'';
            $level1link=$level1->link??'';
            $level1level=$level1->level??'';
            $level1dropdown=$level1->dropdown??'';
            $level1icon=$level1->icon??'';
            $level1nama=$level1->nama??'';
            /*if($level1->link==$uri1 || $level1->link==$uri){ 
                $aktif="active";
                $sa="submenu";
                $sb="show"; 
            }*/
            $slashLink = explode("/", $level1link);
            $jmlslash = count($slashLink);
            if ($jmlslash > 1) {
                if ($level1link == $uri) {
                    $aktif = "active";
                } else {
                    $aktif = "";
                };
            } else {
                if ($level1link == $uri1) {
                    $aktif = "active";
                } else {
                    $aktif = "";
                };
            }

            if ($level1level==1 && $level1dropdown=='no') {
                if($level1->target=='newtab'){$target='target="_blank"';}else{$target='';}
                $li .= "
                <li class='nav-item ".$level1link."  ".$aktif."' >
                    <a class='menuclick' href='".base_url()."/".$level1link."' ".$target.">
                    <i class='".$level1icon."'></i>
                    <p>".$level1nama."</p>
                    </a>
                </li>
                ";
            }
            if ($level1level==1 && $level1dropdown=='yes') {
                $li.="
                <li class='nav-item ".$level1link." ".$sa." ".$aktif."'>
                    <a data-toggle='collapse' href='#nu".$id_menu1."'>
                    <i class='".$level1icon."'></i>
                    <p>".$level1nama."</p>
                    <span class='caret'></span>
                    </a>
                    <div class='collapse ".$level1link." ".$sb."' id='nu".$id_menu1."'>
                        <ul class='nav nav-collapse'>";
                        $menu2=$this->db->table("main_menu")->where(['hak_akses' => session("level"), 'level' => 2, 'id_main'=>$id_menu1])->orderBy("id_menu", "ASC")->get();
                        foreach($menu2->getResult() as $level2){
                        if($level2->target=='newtab'){$target='target="_blank"';}else{$target='';}
                        $li.="
                        <li class='nav-sub ".$level2->link." ".$sa." ".$aktif."'>
                        <a style='padding-left:48px' class='menuclick' href='".base_url().$level2->link."' ".$target.">
                        <span class='sub-item'>".$level2->nama."</span>
                        </a>
                        </li>";
                        }
                        $li.="	
                        </ul>
                    </div>
                </li>";
            }
        }
        return $li;
    }


    
    
}
