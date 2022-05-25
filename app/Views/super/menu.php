<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Menu</h4>
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
				<a href="#">Menu</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<div class="d-md-inline-block">
							<h4 class="card-title">Menu</h4>
						</div>
						<div class="d-none d-sm-inline-block">
							<a href="javascript:input()" class="btn btn-primary">
								<i class="fa fa-plus-circle fa-lg"></i> Add Menu
							</a>
							<a href="<?= site_url('super/manajemen')?>"
								class="menuclick btn btn-primary btn-border">
								<i class="fa fa-chevron-left fa-lg"></i> Back
							</a>
						</div>
					</div>
				</div>

				<div class="card-body">

					<div id="area_lod">
						<h5 class="mb-4">Manajemen menu level <b><?= $Menu ?></b>
						</h5>
						<div id="area_lod">
							<div class="row">
								<div class="col-md-9">
									<ul class="list-group">
									<?= $listMenu ?>
									</ul>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>

	</div>
</div>



<script>
	function input() {
		var uri = '<?= $uri ?>';
		$("#title_mdl_input").html("INPUT DATA");
		$("#mdl_formSubmit_input").modal({
			backdrop: 'static',
			keyboard: false
		});
		$("#add_page").html('<center>Please wait..</center>');
		$("#formSubmit_input").attr("url",
			"<?= base_url("super/insert_Menu");?>");
		$.post("<?= site_url("super/input_Menu"); ?>", {
			uri: uri
		}, function(data) {
			$("#add_page").html(data);
			$("#formSubmit_input")[0].reset();
			$(".menuInduk").hide();
		});
	}

	function edit(id) {
		$("#title_mdl_edit").html("EDIT DATA");
		$("#mdl_formSubmit_edit").modal({
			backdrop: 'static',
			keyboard: false
		});
		$("#edit_page").html('<center>Please wait..</center>');
		$("#formSubmit_edit").attr("url",
			"<?= base_url("super/update_Menu");?>");
		$.post("<?= site_url("super/edit_Menu"); ?>", {
			id: id
		}, function(data) {
			$("#edit_page").html(data);
		});
	}

	function del(id, name, level) {
	    swal({
			title: 'Delete data ?',
			text: name,
			type: 'warning',
			buttons:{
				cancel: {
					visible: true,
					text : 'batal',
					className: 'btn btn-danger'
				},        			
				confirm: {
					text : 'Ya',
					className : 'btn btn-success'
				}
			}
		}).then((willDelete) => {
			if (willDelete) {
				swal("data "+name+" telah dihapus", {
					icon: "success",
					buttons : {
						confirm : {
							className: 'btn btn-success'
						}
					}
				});
				var url   = "<?= site_url("super/delete_Menu"); ?>";
				var param = {id:id,level: level};
				$.ajax({
					type: "POST",dataType: "json", data: param, url: url,
					success: function(val){
						setTimeout(reload_content(), 500);
					}
				});		
			}  
		});
	}

	function radioLevel(id, val) {
		if (id != 1) {
			$(".menuInduk").show();
		} else {
			$("#Induk").val('');
			$(".menuInduk").hide();
		}
	}
</script>


<!-- modal -->
<div class="modal fade" id="mdl_formSubmit_input">
	<div class="modal-dialog" id="area_formSubmit_input">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="title_mdl_input">Default Modal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form-horizontal" id="formSubmit_input" action="javascript:submitForm('formSubmit_input')"
				method="post">
				<div class="modal-body">
					<div id="add_page"></div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button title="Save" id="submit" onclick="submitForm('formSubmit_input')" class="btn btn-primary"><i
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
	<div class="modal-dialog" id="area_formSubmit_edit">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="title_mdl_edit">Default Modal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form-horizontal" id="formSubmit_edit" action="javascript:submitForm('formSubmit_edit')"
				method="post">
				<div class="modal-body">
					<div id="edit_page"></div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button title="Save" id="submit" onclick="submitForm('formSubmit_edit')" class="btn btn-primary"><i
							id="msg_formSubmit_edit"></i>&nbsp;&nbsp;<i class='fa fa-save'></i> Save changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->