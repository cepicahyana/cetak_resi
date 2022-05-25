			<div class="panel-header" style=" background: rgb(7,2,84);
background: -moz-linear-gradient(260deg, rgba(7,2,84,1) 0%, rgba(2,29,153,1) 100%);
background: -webkit-linear-gradient(260deg, rgba(7,2,84,1) 0%, rgba(2,29,153,1) 100%);
background: linear-gradient(260deg, rgba(7,2,84,1) 0%, rgba(2,29,153,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #070254",endColorstr="#021d99" ,GradientType=1); ">
					<div class=" page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2">Welcome to app <?= $konfig['app_name']; ?>
						</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
						<!--a href="#" class="btn btn-secondary btn-round">Add Customer</a-->
					</div>
				</div>
			</div>
			</div>
			<div class="page-inner mt--5">
				<div class="row mt--2">
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-user-2 text-warning"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">Level User</p>
											<h4 class="card-title"><?= isset($ttl_level)?($ttl_level):'0';?>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-users text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">Total Users</p>
											<h4 class="card-title"><?= isset($ttl_user)?($ttl_user):'0';?>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-success text-info"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">User Aktif</p>
											<h4 class="card-title"><?= isset($ttl_useraktif)?($ttl_useraktif):'0';?>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-close text-danger"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">User Non Aktif</p>
											<h4 class="card-title"><?= isset($ttl_usernonaktif)?($ttl_usernonaktif):'0';?>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-user text-primary"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">Log User</p>
											<h4 class="card-title"><?= isset($ttl_log)?($ttl_log):'0';?>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>