<?php 
$id=$dataDB->id??'';
$kode_menu=$dataDB->kode_menu??'';
$nama_menu=$dataDB->nama_menu??'';
$kode_kategori=$dataDB->kode_kategori??'';
$nama_kategori=$dataDB->nama_kategori??'';
$deskripsi=$dataDB->deskripsi??'';
$harga=$dataDB->harga??'';
$diskon=$dataDB->diskon??'';
$nourut=$dataDB->nourut??'';
$_ctime=$dataDB->_ctime??'';
$img=$dataDB->foto??'';
$sts_publish=$dataDB->status??'';
if($img!=''){
	$img_=''.base_url().'/public/theme/images/menu/'.$img.'';
}else{
	$img_=''.base_url().'/public/theme/images/menu/img_not.png';
}		
?>
			<input name="id" type="hidden" value="<?= $id ?>">
			<input name="f[nama_kategori]" type="hidden" value="<?= $nama_kategori ?>">
			<input name="foto_b" type="hidden" value="<?= $img ?>">
			<input name="kode_menu_b" type="hidden" value="<?= $kode_menu ?>">

			<div class="form-group row">
				<label class="black col-md-3 control-label">Kategori Menu</label>
				<div class="col-md-9">
					<?php
						$dataray=array();
						$dataray['']="=== Choose ===";
						foreach($kategoriMenu as $v)
						{
							$dataray[$v->kode]=$v->nama;
						}
						echo form_dropdown("f[kode_kategori]",$dataray,$kode_kategori,'class="form-control show-tick" required="required" onchange="getnamesel1(this)"');
					?>	
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Image</label>
				<div class="col-md-4">
					<input type="file" class="form-control" name="foto" id="editImgMenu">
				</div>
				<div class="col-md-4">
					<img width="200px" height="auto" id="editPreviewImg" src="<?= $img_ ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">No Urut</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[nourut]" value="<?= $nourut ?>" placeholder="">
				</div>
			</div>	
			<div class="form-group row">
				<label class="black col-md-3 control-label">Kode Menu</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[kode_menu]" value="<?= $kode_menu ?>" placeholder="">
				</div>
			</div>			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Nama Menu</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[nama_menu]" value="<?= $nama_menu ?>" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Harga</label>
				<div class="col-md-9">
					<input type="number" class="form-control" name="f[harga]" value="<?= $harga ?>" placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label class="black col-md-3 control-label">Diskon</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[diskon]" value="<?= $diskon ?>" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Deskripsi</label>
				<div class="col-md-9">
					<textarea class="form-control" name="f[deskripsi]" rows="3"><?= $deskripsi ?></textarea>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Tayang</label>
				<div class="col-md-9">
					<label class="form-radio-label">
						<input class="form-radio-input" type="radio" name="f[status]" value="Publish" <?php if($sts_publish=='Publish'){echo 'checked';} ?>>
						<span class="form-radio-sign">Publish</span>
					</label>
					<label class="form-radio-label ml-3">
						<input class="form-radio-input" type="radio" name="f[status]" value="No" <?php if($sts_publish=='No'){echo 'checked';} ?>>
						<span class="form-radio-sign">No</span>
					</label>
				</div>
			</div>


<script>
/* Fungsi imagePreview */
$('#editImgMenu').on('change',function(e){
	var ol =  e.target;
	var extension = $('#editImgMenu').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			editImgMenu.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		editImgMenu.value = "";
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
  function getnamesel1(ini){
  	var thisvaltex = $(ini).find("option:selected").text();
	if(thisvaltex!="=== Choose ==="){
		$("[name='f[nama_kategori]']").val(thisvaltex);
	}else{
		$("[name='f[nama_kategori]']").val("");
	}
  }
</script>	
	