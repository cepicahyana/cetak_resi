<?php 
$id=isset($data->id_level)?($data->id_level):'';
$code_level=isset($data->code_level)?($data->code_level):'';
$levelname=isset($data->levelname)?($data->levelname):'';
$direct=isset($data->direct)?($data->direct):'';
$ket=isset($data->ket)?($data->ket):'';
							
?>
			<input name="id_level" type="hidden" value="<?= $id ?>">
			<input name="code_level_b" type="hidden" value="<?= $code_level ?>">
			<input name="levelname_b" type="hidden" value="<?= $levelname ?>">

			<div class="form-group row">
				<label class="black col-md-3 control-label">Level Code</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[code_level]" value="<?= $code_level ?>" placeholder="">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="black col-md-3 control-label">Level Name</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[levelname]" value="<?= $levelname ?>" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Link Direct</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="f[direct]" value="<?= $direct ?>" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label class="black col-md-3 control-label">Keterangan</label>
				<div class="col-md-9">
					<input required type="text" class="form-control" name="f[ket]" value="<?= $ket ?>" placeholder="">
				</div>
			</div>