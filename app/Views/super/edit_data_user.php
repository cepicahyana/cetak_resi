<?php 
$id=isset($data->id_admin)?($data->id_admin):'';
$username=isset($data->username)?($data->username):'';
$gender=isset($data->gender)?($data->gender):'';
$profileimg=isset($data->profileimg)?($data->profileimg):'';	
$profilename=isset($data->profilename)?($data->profilename):'';		
$wa=isset($data->wa)?($data->wa):'';	
$email=isset($data->email)?($data->email):'';
$level=isset($data->level)?($data->level):'';
$sts=isset($data->sts_aktif)?($data->sts_aktif):'';
$img=$profileimg;
if($img!=''){
	$img_=''.base_url().'/public/theme/images/user/'.$img.'';
}else{
	$img_=''.base_url().'/public/theme/images/user/img_not.png';
}		
?>
			<input name="id_admin" type="hidden" value="<?= $id ?>">
			<input name="username_b" type="hidden" value="<?= $username ?>">
			<input name="profileimg_b" type="hidden" value="<?= $profileimg ?>">

			<div class="form-group row">
				<label class="black col-md-3 control-label">User Group</label>
				<div class="col-md-9">
					<?php
						$dataray=array();
						$dataray['']="=== Choose ===";
						foreach($dataLevel as $v)
						{
							$dataray[$v->code_level]='['.$v->code_level.'] - '.$v->levelname;
						}
						echo form_dropdown("f[level]",$dataray,$level,'class="form-control show-tick" required="required"');
					?>	
				</div>
			</div>
		
			<div class="form-group row">
				<label class="black col-md-3 control-label">Photo Profile</label>
				<div class="col-md-6">
					<input type="file" class="form-control" name="profileimg"  id="editProfileImg">
				</div>
				<div class="col-md-2">
					<img width="80px" height="80px" id="editPreviewImg" src="<?= $img_ ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Profile name</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[profilename]" value="<?= $profilename ?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Gender</label>
				<div class="col-md-9">
					<label class="form-radio-label">
						<input class="form-radio-input" type="radio" name="f[gender]" value="Male" <?php if($gender=='Male'){echo 'checked';} ?>>
						<span class="form-radio-sign">Male</span>
					</label>
					<label class="form-radio-label ml-3">
						<input class="form-radio-input" type="radio" name="f[gender]" value="Fimale" <?php if($gender=='Fimale'){echo 'checked';} ?>>
						<span class="form-radio-sign">Fimale</span>
					</label>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Wahtsapp</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[wa]" value="<?= $wa ?>" data-inputmask="'mask': ['9999 9999 9999']" data-mask placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Email</label>
				<div class="col-md-9">
					<input type="email" class="form-control" name="f[email]" value="<?= $email ?>" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Username</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[username]" value="<?= $username ?>" placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Password</label>
				<div class="col-md-9">
					<input type="password" class="form-control" name="password" placeholder="(hanya di isi untuk password baru)">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Status Aktif</label>
				<div class="col-md-9">
					<label class="form-radio-label">
						<input class="form-radio-input" type="radio" name="f[sts_aktif]" value="1" <?php if($sts==1){echo 'checked';} ?>>
						<span class="form-radio-sign">Aktif</span>
					</label>
					<label class="form-radio-label ml-3">
						<input class="form-radio-input" type="radio" name="f[sts_aktif]" value="2" <?php if($sts==2){echo 'checked';} ?>>
						<span class="form-radio-sign">Tidak Aktif</span>
					</label>
				</div>
			</div>
			
	
<script>
/* Fungsi imagePreview */
$('#editProfileImg').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editProfileImg').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editProfileImg.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editProfileImg.value = "";
		editPreviewImg.src = "";
		return false;
	}
	if (file) {
		editPreviewImg.src = URL.createObjectURL(file)
	}
});
</script>
<script>
  $(function () {
    $('[data-mask]').inputmask()
  });
</script>	
	