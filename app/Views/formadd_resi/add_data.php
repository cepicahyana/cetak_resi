			<input type="hidden" name="f[nama_kategori]">
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kategori Menu</label>
				<div class="col-md-9">
					<select class="form-control show-tick" name="f[kode_kategori]" data-live-search="true" onchange="getnamesel1(this)">
						<option value="">=== Choose ===</option>
						<?php 
					    foreach($kategoriMenu as $val){
						   echo "<option value='".$val->kode."'>".$val->nama."</option>";
					    }
					    ?>
				    </select>
				</div>
			</div>
		
			<div class="form-group row">
				<label class="black col-md-3 control-label">Image</label>
				<div class="col-md-4">
					<input type="file" class="form-control" name="foto" id="inputImgMenu">
				</div>
				<div class="col-md-4">
					<img width="200px" height="auto" id="inputPreviewImg">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">No Urut</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[nourut]" placeholder="">
				</div>
			</div>	
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kode Menu</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[kode_menu]" placeholder="">
				</div>
			</div>			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama Menu</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[nama_menu]" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Harga</label>
				<div class="col-md-9">
					<input type="number" class="form-control" name="f[harga]" placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Diskon</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[diskon]" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Deskripsi</label>
				<div class="col-md-9">
					<textarea class="form-control" name="f[deskripsi]" rows="3"></textarea>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tayang</label>
				<div class="col-md-9">
					<label class="form-radio-label">
						<input class="form-radio-input" type="radio" name="f[status]" value="Publish" checked>
						<span class="form-radio-sign">Publish</span>
					</label>
					<label class="form-radio-label ml-3">
						<input class="form-radio-input" type="radio" name="f[status]" value="No">
						<span class="form-radio-sign">No</span>
					</label>
				</div>
			</div>
			
			<!-- <div class="form-group row">
				<label class="black col-md-3 control-label">Wahtsapp</label>
				<div class="col-md-9">
					<input type="text" class="form-control" data-inputmask="'mask': ['9999 9999 9999']" data-mask name="f[wa]" placeholder="">
				</div>
			</div> -->
			
			
<script>
/* Fungsi imagePreview */
$('#inputImgMenu').on('change',function(e){
	var ol =  e.target;
	var extension = $('#inputImgMenu').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			inputImgMenu.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		inputImgMenu.value = "";
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
  function getnamesel1(ini){
  	var thisvaltex = $(ini).find("option:selected").text();
	if(thisvaltex!="=== Choose ==="){
		$("[name='f[nama_kategori]']").val(thisvaltex);
	}else{
		$("[name='f[nama_kategori]']").val("");
	}
  }
</script>			