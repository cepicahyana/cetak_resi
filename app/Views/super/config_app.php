<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Config App</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="<?= site_url('super/dashboard')?>">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Config App</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<div class="d-md-inline-block">
						<h4 class="card-title">Config App</h4>
						</div>
						<!--a href="javascript:input()" class="btn btn-primary d-none d-sm-inline-block">
							<i class="fa fa-plus-circle fa-lg"></i> Add User
						</a-->
					</div>
				</div>
				<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')" method="post" enctype="multipart/form-data">
				<div class="card-body">
					<div id="area_lod">
					<div class="row" >
					<div class="col-md-6">
					
						<div class="form-group row">
							<label class="black col-md-4 control-label">Aplication Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input7" value="<?= $konfig['app_name'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-4 control-label">Client Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input6" value="<?= $konfig['client_name'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-4 control-label">Project Date</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input5" value="<?= $konfig['project_date'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-4 control-label">Product by</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input8" value="<?= $konfig['product_by'];?>"placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-4 control-label">Copyright</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input9" value="<?= $konfig['copyright'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-4 control-label">Version App</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input11" value="<?= $konfig['version'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-4 control-label">Record Log</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input10" value="<?= $konfig['record_log'];?>" placeholder="">
							</div>
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="black col-md-3 control-label">Loggo</label>
							<div class="col-md-5">
								<input type="file" class="form-control" name="loggo" id="editLogo">
								<input type="hidden" name="loggo_b" value="<?= $konfig['logo'];?>">
								<small><i class="text-muted">*Max size 1MB</i></small>
							</div>
							<div class="col-md-3">
								<?php $img1=$konfig['logo'];
								if($img1!=''){
									$img_1=''.base_url().'/public/theme/images/'.$img1.'';
								}else{
									$img_1=''.base_url().'/public/theme/images/no-image.png';
								}
								?>
								<img width="80px" height="80px" id="previewLogo" src="<?= $img_1;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-3 control-label">Favicon</label>
							<div class="col-md-5">
								<input type="file" class="form-control" name="fav" id="editFav">
								<input type="hidden" name="fav_b" value="<?= $konfig['favicon'];?>">
								<small><i class="text-muted">*Max size 1MB</i></small>
							</div>
							<div class="col-md-3">
								<?php $img2=$konfig['favicon'];
								if($img2!=''){
									$img_2=''.base_url().'/public/theme/images/'.$img2.'';
								}else{
									$img_2=''.base_url().'/public/theme/images/no-image.png';
								}
								?>
								<img width="50px" height="50px" id="previewFav" src="<?= $img_2;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-3 control-label">Loggo Login</label>
							<div class="col-md-5">
								<input type="file" class="form-control" name="loggo_login" id="editLogoLogin" >
								<input type="hidden" name="loggo_login_b" value="<?= $konfig['logo_login'];?>">
								<small><i class="text-muted">*Max size 1MB</i></small>
							</div>
							<div class="col-md-3">
								<?php $img3=$konfig['logo_login'];
								if($img3!=''){
									$img_3=''.base_url().'/public/theme/images/'.$img3.'';
								}else{
									$img_3=''.base_url().'/public/theme/images/no-image.png';
								}
								?>
								<img width="100%" id="previewLogoLogin" src="<?= $img_3;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-3 control-label">Loggo Admin</label>
							<div class="col-md-5">
								<input type="file" class="form-control" name="loggo_admin" id="editLogoAdmin">
								<input type="hidden" name="loggo_admin_b" value="<?= $konfig['logo_admin'];?>">
								<small><i class="text-muted">*Max size 1MB</i></small>
							</div>
							<div class="col-md-3">
								<?php $img4=$konfig['logo_admin'];
								if($img4!=''){
									$img_4=''.base_url().'/public/theme/images/'.$img4.'';
								}else{
									$img_4=''.base_url().'/public/theme/images/no-image.png';
								}
								?>
								<img width="100%" id="previewLogoAdmin" src="<?= $img_4;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-3 control-label">Title Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input13" value="<?= $konfig['title'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="black col-md-3 control-label">Header Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="input14" value="<?= $konfig['header_name'];?>" placeholder="">
							</div>
						</div>
					</div>
					</div>
					</div>
				</div>
				<div class="card-footer">
				<button  title="Save" onclick="submitForm('formSubmit_edit')" class="btn btn-primary"><i id="msg_formSubmit_edit"></i>&nbsp;&nbsp;<i class='fa fa-save'></i> Save changes</button>
				</div>
				</form>
			</div>
		</div>
		
	</div>
</div>


<script>
/* Fungsi imagePreview */
$('#editLogo').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editLogo').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editLogo.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editLogo.value = "";
		previewLogo.src = "";
		return false;
	}
	if (file) {
		previewLogo.src = URL.createObjectURL(file)
	}
});

$('#editFav').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editFav').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editFav.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editFav.value = "";
		previewFav.src = "";
		return false;
	}
	if (file) {
		previewFav.src = URL.createObjectURL(file)
	}
});

$('#editLogoLogin').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editLogoLogin').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editLogoLogin.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editLogoLogin.value = "";
		previewLogoLogin.src = "";
		return false;
	}
	if (file) {
		previewLogoLogin.src = URL.createObjectURL(file)
	}
});

$('#editLogoAdmin').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editLogoAdmin').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editLogoAdmin.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editLogoAdmin.value = "";
		previewLogoAdmin.src = "";
		return false;
	}
	if (file) {
		previewLogoAdmin.src = URL.createObjectURL(file)
	}
});
</script>
<script>
  $(function () {
    //$('[data-mask]').inputmask();
	$("#formSubmit_edit").attr("url","<?= base_url("super/update_Config");?>");
  });
</script>			
