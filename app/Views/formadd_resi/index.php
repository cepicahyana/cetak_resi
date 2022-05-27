		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Form Add Resi</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a
							href="<?= site_url('dashboard')?>">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Add Resi</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
					<div id="area_lod">
						<div class="card-header">
							<div class="d-flex justify-content-between">
								<div class="d-md-inline-block">
									<h4 class="card-title">Form tambah resi baru</h4>
								</div>
								<div class="text-right">
									<small class="text-muted">Total biaya</small>
									<h2 class="text-primary font-weight-bold">Rp.100.0000</h2>
								</div>
								
							</div>
						</div>
						<div class="card-body">
							<form class="form-horizontal" id="formSubmit_input" url="<?= site_url("formsatu/insert_data");?>" action="javascript:submitForm1('formSubmit_input')" method="post">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group bg-light">
										<label class="black control-label">Nomor Account</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[no_pelanggan]"
												data-inputmask="'mask': ['9999999999999999']" data-mask
												placeholder="Nomor Account">
										</div>

										<label class="black control-label">Nomor Reff</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[no_pelanggan]"
												data-inputmask="'mask': ['9999999999999999']" data-mask
												placeholder="Nomor Reff">
										</div>

										<label class="black control-label">Kota asal*</label>
										<div class="pb-3">
											<select class="form-control select2" style="width:100%"
												onchange="reload_table()">
												<option value="">=== All ===</option>
												<?php
												foreach ($kategoriMenu as $val) {
													echo "<option value='".$val->kode."'>".$val->nama."</option>";
												}
												?>
											</select>
										</div>

										<label class="black control-label">Kota besar tujuan*</label>
										<div class="pb-3">
											<select class="form-control select2" style="width:100%"
												onchange="reload_table()">
												<option value="">=== All ===</option>
												<?php
												foreach ($kategoriMenu as $val) {
													echo "<option value='".$val->kode."'>".$val->nama."</option>";
												}
												?>
											</select>
										</div>

										<label class="black control-label">Kota tujuan*</label>
										<div class="pb-3">
											<select class="form-control select2" style="width:100%"
												onchange="reload_table()">
												<option value="">=== All ===</option>
												<?php
												foreach ($kategoriMenu as $val) {
													echo "<option value='".$val->kode."'>".$val->nama."</option>";
												}
												?>
											</select>
										</div>

										<label class="black control-label">Keterangan Isi</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[nama_barang]"
												placeholder="Keterangan Isi">
										</div>
									</div>
							
									<div class="form-group bg-info">
										<label class="text-white control-label">Tanggal Pickup</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="tgl_input" data-inputmask="'mask': ['99/99/9999']" data-mask  placeholder="DD/MM/YYY" required>
										</div>	

										<label class="text-white control-label">Dipickup oleh</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[nama_barang]"
												placeholder="Dipickup oleh">
										</div>
									</div>

									<!-- <div class="form-group">
										<label class="black control-label">Dimensi (Panjang, Lebar, Tinggi)</label>
										<div>
											<div class="input-group mb-3">
												<input type="number" class="form-control" name="f[jml_barang]" placeholder="P">
												<input type="number" class="form-control" name="f[jml_barang]" placeholder="L">
												<input type="number" class="form-control" name="f[jml_barang]" placeholder="T">
											</div>
										</div>
									</div> -->

								</div>
								<div class="col-md-5">
									<div class="form-group bg-primary">
										<label class="text-white control-label">Nama Pengirim</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[nama_pengirim]"
												placeholder="Nama Pengirim">
										</div>

										<label class="text-white control-label">HP Pengirim</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[hp_pengirim]"
												placeholder="No HP Pengirim">
										</div>

										<label class="text-white control-label">Alamat Legkap Pengirim</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[alamat_pengirim]"
												placeholder="Alamat Legkap Pengirim">
										</div>
										<hr class="border-white">
										<label class="text-white control-label">Nama Penerima</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[nama_penerima]"
												placeholder="Nama Penerima">
										</div>

										<label class="text-white control-label">HP Penerima</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[hp_penerima]"
												placeholder="No HP Penerima">
										</div>

										<div class="row">
											<div class="col-md-6">
												<label class="text-white control-label">Provinsi*</label>
												<div class="pb-3">
													<select class="form-control select2" style="width:100%"
														onchange="reload_table()">
														<option value="">=== All ===</option>
														<?php
														foreach ($kategoriMenu as $val) {
															echo "<option value='".$val->kode."'>".$val->nama."</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<label class="text-white control-label">Kabupaten*</label>
												<div class="pb-3">
													<select class="form-control select2" style="width:100%"
														onchange="reload_table()">
														<option value="">=== All ===</option>
														<?php
														foreach ($kategoriMenu as $val) {
															echo "<option value='".$val->kode."'>".$val->nama."</option>";
														}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label class="text-white control-label">Kecamatan*</label>
												<div class="pb-3">
													<select class="form-control select2" style="width:100%" 
														onchange="reload_table()">
														<option value="">=== All ===</option>
														<?php
														foreach ($kategoriMenu as $val) {
															echo "<option value='".$val->kode."'>".$val->nama."</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<label class="text-white control-label">Kelurahan*</label>
												<div class="pb-3">
													<select class="form-control select2" style="width:100%" 
														onchange="reload_table()">
														<option value="">=== All ===</option>
														<?php
														foreach ($kategoriMenu as $val) {
															echo "<option value='".$val->kode."'>".$val->nama."</option>";
														}
														?>
													</select>
												</div>
											</div>
										</div>

										<label class="text-white control-label">Alamat Legkap Penerima</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[alamat_penerima]"
												placeholder="Alamat Legkap Penerima">
										</div>

										<label class="text-white control-label">Up Nama Penerima</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[nama_penerima]"
												placeholder="Up Nama Penerima">
										</div>

										<label class="text-white control-label">Diterima oleh</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="f[nama_barang]"
												placeholder="Diterima oleh">
										</div>

										<label class="text-white control-label">Tanggal Terima</label>
										<div class="pb-3">
											<input type="text" class="form-control" name="tgl_input" data-inputmask="'mask': ['99/99/9999']" data-mask  placeholder="DD/MM/YYY" required>
										</div>	
									</div>


								</div>
								<div class="col-md-4">
									<div class="form-group bg-warning">
										<label class="black control-label">Service</label>
										<div class="pb-3">
											<select class="form-control select2"  style="width:100%"
												onchange="reload_table()">
												<option value="">=== All ===</option>
												<?php
												foreach ($kategoriMenu as $val) {
													echo "<option value='".$val->kode."'>".$val->nama."</option>";
												}
												?>
											</select>
										</div>

										<label class="black control-label">Retail</label>
										<div class="pb-3">
											<select class="form-control select2" style="width:100%"
												onchange="reload_table()">
												<option value="">=== All ===</option>
												<?php
												foreach ($kategoriMenu as $val) {
													echo "<option value='".$val->kode."'>".$val->nama."</option>";
												}
												?>
											</select>
										</div>

										<label class="black control-label">Carter</label>
										<div class="pb-3">
											<select class="form-control select2" style="width:100%"
												onchange="reload_table()">
												<option value="">=== All ===</option>
												<?php
												foreach ($kategoriMenu as $val) {
													echo "<option value='".$val->kode."'>".$val->nama."</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group bg-success">
										<label class="black control-label">Biaya Pengiriman</label>
										<div class="pb-3">
											<input type="text" class="form-control text-right" name="f[nama_penerima]"
												placeholder="Rp.">
										</div>

										<label class="black control-label">Biaya Packing</label>
										<div class="pb-3">
											<input type="text" class="form-control text-right" name="f[nama_penerima]"
												placeholder="Rp.">
										</div>

										<label class="black control-label">Biaya Asuransi</label>
										<div class="pb-3">
											<input type="text" class="form-control text-right" name="f[nama_penerima]"
												placeholder="Rp.">
										</div>

										<label class="black control-label">Biaya Tax</label>
										<div class="pb-3">
											<input type="text" class="form-control text-right" name="f[nama_penerima]"
												placeholder="Rp.">
										</div>

										<label class="black control-label">TOTAL BIAYA</label>
										<div class="pb-3">
											<h4 class="text-white text-right">Rp.100.0000</h4>
										</div>
								
									</div>
									<div class="form-group">
									<button class="btn btn-primary btn-block" onclick="submitForm1('formSubmit_input')"><i id="msg_formSubmit_input"></i>&nbsp;<i class="fa fa-save"></i> Simpan</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
					</div>
				</div>

			</div>
		</div>



		<script>
			$(function () {
				//$("#formSubmit_input")[0].reset();
				$('[data-mask]').inputmask();
				$('.select2').select2({
				theme: 'bootstrap'
				});
			});
			function input() {
				$("#title_mdl_input").html("INPUT DATA MENU");
				$("#mdl_formSubmit_input").modal({
					backdrop: 'static',
					keyboard: false
				});
				$("#add_page").html('<center>Please wait..</center>');
				$("#formSubmit_input").attr("url",
					"<?= base_url("data_resi/insert_data");?>");
				$.post("<?= site_url("data_resi/input_data"); ?>",
					function(data) {
						$("#add_page").html(data);
						$("#formSubmit_input")[0].reset();
						$("#inputPreviewImg").attr("src",
							'<?= base_url()?>/public/theme/images/menu/img_not.png'
							);
					});

			}

			function edit(id) {
				$("#title_mdl_edit").html("EDIT DATA MENU");
				$("#mdl_formSubmit_edit").modal({
					backdrop: 'static',
					keyboard: false
				});
				$("#edit_page").html('<center>Please wait..</center>');
				$("#formSubmit_edit").attr("url",
					"<?= base_url("data_resi/update_data");?>");
				$.post("<?= site_url("data_resi/edit_data"); ?>", {
					id: id
				}, function(data) {
					$("#edit_page").html(data);
				});
			}

			function del(id, level, name) {
				alertify.confirm("Delete", "<center>Delete data <b>Name : " + name + "</b>?</center>", function() {
					$.ajax({
						url: '<?= site_url("data_resi/delete_data"); ?>',
						data: 'id=' + id + '&level=' + level,
						method: "POST",
						dataType: "JSON",
						success: function(data) {
							if (data["table"] == true) {
								reload_table();
								toastr['success']("Successfully deleted permanently");
							} else {
								notif("<b>Delete Failed!!</b>");
							}
						}
					})
				}, function() {});
			}
		</script>


		<!-- modal -->
		<div class="modal fade" id="mdl_formSubmit_input">
			<div class="modal-dialog modal-lg" id="area_formSubmit_input">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="title_mdl_input">Default Modal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="form-horizontal" id="formSubmit_input" action="javascript:submitForm('formSubmit_input')"
						method="post" enctype="multipart/form-data">
						<div class="modal-body">

							<div id="add_page"></div>

						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button title="Save" onclick="submitForm('formSubmit_input')" class="btn btn-primary"><i
									id="msg_formSubmit_input"></i>&nbsp;&nbsp;<i class='fa fa-save'></i> Save changes</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->


		<!-- modal -->
		<div class="modal fade" id="mdl_formSubmit_edit">
			<div class="modal-dialog modal-lg" id="area_formSubmit_edit">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="title_mdl_edit">Default Modal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')"
						method="post" enctype="multipart/form-data">
						<div class="modal-body">

							<div id="edit_page"></div>

						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button title="Save" onclick="submitForm('formSubmit_edit')" class="btn btn-primary"><i
									id="msg_formSubmit_edit"></i>&nbsp;&nbsp;<i class='fa fa-save'></i> Save changes</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->