			<div class="form-group row">
				<label class="black col-md-3 control-label">User Group</label>
				<div class="col-md-9">
					<select class="form-control show-tick" name="f[level]" data-live-search="true">
						<option value="">=== Choose ===</option>
						<?php 
					    foreach($dataLevel as $val){
						   echo "<option value='".$val->code_level."'>[".$val->code_level."] - ".$val->levelname."</option>";
					    }
					    ?>
				    </select>
				</div>
			</div>
		
			<div class="form-group row">
				<label class="black col-md-3 control-label">Photo Profile</label>
				<div class="col-md-6">
					<input type="file" class="form-control" name="profileimg" id="inputProfileImg">
				</div>
				<div class="col-md-2">
					<img width="80px" height="90px" id="inputPreviewImg">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Profile name</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[profilename]" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Gender</label>
				<div class="col-md-9">
					<label class="form-radio-label">
						<input class="form-radio-input" type="radio" name="f[gender]" value="Male">
						<span class="form-radio-sign">Male</span>
					</label>
					<label class="form-radio-label ml-3">
						<input class="form-radio-input" type="radio" name="f[gender]" value="Fimale">
						<span class="form-radio-sign">Fimale</span>
					</label>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Wahtsapp</label>
				<div class="col-md-9">
					<input type="text" class="form-control" data-inputmask="'mask': ['9999 9999 9999']" data-mask name="f[wa]" placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Email</label>
				<div class="col-md-9">
					<input type="email" class="form-control" name="f[email]" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Username</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[username]" placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Password</label>
				<div class="col-md-9">
					<input required type="password" class="form-control" name="password" placeholder="">
				</div>
			</div>
			
<script>
/* Fungsi imagePreview */
$('#inputProfileImg').on('change',function(e){
	var ol =  e.target;
	var extension = $('#inputProfileImg').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			inputProfileImg.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		inputProfileImg.value = "";
		inputPreviewImg.src = "";
		return false;
	}
	if (file) {
		inputPreviewImg.src = URL.createObjectURL(file)
	}
});

</script>
<script>
  $(function () {
    $('[data-mask]').inputmask()
  });
</script>			