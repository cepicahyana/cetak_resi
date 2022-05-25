<!--?php $con=new konfig(); ?-->
<?php 

$dprofile=$konfig['dataProfile'];
$profilename=isset($dprofile->profilename)?($dprofile->profilename):'';
$profileimg=isset($dprofile->profileimg)?($dprofile->profileimg):'';
$levelname=$konfig['levelname'];
?>   

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2" >			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
                        <?php $img2=$profileimg;
                        if($img2!=''){
                        $img_2=''.base_url().'/public/theme/images/user/'.$img2.'';
                        }else{
                        $img_2=''.base_url().'/public/theme/images/user/img_not.png';
                        }
                        ?>
                        <div class="avatar-sm float-left mr-2">
							<img src="<?= $img_2;?>" alt="Logo" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a href="javascript:void(0)" aria-expanded="true">
								<span>
                  					<?= $profilename;?> 
									<span class="user-level"><?= $levelname;?></span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
                        <?= $konfig['sidebar_menu'] ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->