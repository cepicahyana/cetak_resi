<input type="hidden" value="n" id="modaltype">	
<?php 
$username=isset($data->username)?($data->username):'';
$gender=isset($data->gender)?($data->gender):'';
$profileimg=isset($data->profileimg)?($data->profileimg):'';	
$profilename=isset($data->profilename)?($data->profilename):'';		
$wa=isset($data->wa)?($data->wa):'';	
$email=isset($data->email)?($data->email):'';
$profileaddress=isset($data->profileaddress)?($data->profileaddress):'';	
$idlevel=isset($data->level)?($data->level):'';
$level=$namaLevel;

if($profileimg!=''){
	$img_1=''.base_url().'/public/theme/images/user/'.$profileimg.'';
}else{
	$img_1=''.base_url().'/public/theme/images/no-image.png';
}				
?>
				<div class="page-inner">
					<h4 class="page-title">User Profile</h4>
					<div id="area_lod" >
					<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitFormRefresh('formSubmit_edit')" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
							
							<input name="username_b" type="hidden" value="<?= $username ?>">
							<input name="profileimg_b" type="hidden" value="<?= $profileimg ?>">
								<div class="card-header">
									<div class="row row-nav-line">
										<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
											<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" aria-selected="true">Profile</a> </li>
											<!--li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li-->
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Profile Name</label>
												<input type="text" class="form-control" name="f[profilename]" placeholder="Profile Name" value="<?= $profilename ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Email</label>
												<input type="email" class="form-control" name="f[email]" placeholder="name@mail.com" value="<?= $email ?>">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Whatsapp</label>
												<input type="text" class="form-control" name="f[wa]" data-inputmask="'mask': ['9999 9999 9999']" data-mask placeholder="Profile Name" value="<?= $wa ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Username</label>
												<input type="text" class="form-control" name="f[username]" placeholder="Username" value="<?= $username ?>">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Address</label>
												<input type="text" class="form-control" name="f[profileaddress]" value="<?= $profileaddress ?>" name="address" placeholder="Address">
											</div>
										</div>
									</div>
									<div class="text-right mt-3 mb-3">
										<button  title="Save" onclick="submitFormRefresh('formSubmit_edit')" class="btn btn-primary"><i id="msg_formSubmit_edit"></i>&nbsp;&nbsp;<i class='fa fa-save'></i> Save changes</button>
										<!--button class="btn btn-danger">Reset</button-->
									</div>
								</div>
							
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('<?= base_url()?>/public/theme/atlantis/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img id="previewImg" src="<?= $img_1;?>" alt="Avatar" class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name"><?= $profilename;?></div>
										<div class="job">Group User : <?= $level;?></div>
										<div class="mt-3">
										<input type="file" class="form-control form-control-file btn btn-primary btn-round btn-lg" id="editprofileimg" name="profileimg" >
										</div>
									</div>
								</div>
								<!--div class="card-footer">
									<div class="row user-stats text-center">
										<div class="col">
											<div class="number">125</div>
											<div class="title">Post</div>
										</div>
										<div class="col">
											<div class="number">25K</div>
											<div class="title">Followers</div>
										</div>
										<div class="col">
											<div class="number">134</div>
											<div class="title">Following</div>
										</div>
									</div>
								</div-->
							</div>
						</div>
						
					</div>
					</form>
					</div>
				</div>





<script>
$('#editprofileimg').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editprofileimg').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editprofileimg.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editprofileimg.value = "";
		previewImg.src = "";
		return false;
	}
	if (file) {
		previewImg.src = URL.createObjectURL(file)
	}
});
</script>
<script>
  $(function () {
    $('[data-mask]').inputmask();
	$("#formSubmit_edit").attr("url","<?= site_url("profile/update_Profile");?>");
  });
</script>			
