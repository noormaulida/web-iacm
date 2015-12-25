<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Web IACM</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/admin/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/datepicker.min.css" />
		<script src="<?= base_url() ?>assets/admin/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Web IACM
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="<?= base_url() ?>assets/admin/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?= base_url() ?>assets/admin/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?= base_url() ?>assets/admin/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?= base_url() ?>assets/admin/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?= base_url() ?>assets/admin/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?= base_url() ?>assets/uploads/avatar/default.png" />
								<span class="user-info">
									<small>Welcome,</small>
                                    <?php
                                    $session_data = $this->session->userdata('logged_in');
                                    echo $session_data['nick_name'];
                                    ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url() . "users/logout"; ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
			</script>
			<ul class="nav nav-list">
				<li class="<?= $this->session->userdata('tab')=="dashboard-index" ? 'active':'' ?>">
					<a href="<?= base_url() ?>dashboard/">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="<?= (strpos($this->session->userdata('tab'),'users')!==false) ? 'active open':'' ?>">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-desktop"></i>
						<span class="menu-text">
							User
						</span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="<?= $this->session->userdata('tab')=="users-index" ? 'active':'' ?>">
							<a href="<?= base_url() ?>users/">
								<i class="menu-icon fa fa-caret-right"></i>
								All Registration
							</a>
							<b class="arrow"></b>
						</li>

						<li class="<?= $this->session->userdata('tab')=="users-create" ? 'active':'' ?>">
							<a href="<?= base_url() ?>users/create">
								<i class="menu-icon fa fa-caret-right"></i>
								Create New User
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-pencil-square-o"></i>
						<span class="menu-text"> News </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="form-elements.html">
								<i class="menu-icon fa fa-caret-right"></i>
								Create News
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="form-elements-2.html">
								<i class="menu-icon fa fa-caret-right"></i>
								Show All News
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="calendar.html">
						<i class="menu-icon fa fa-calendar"></i>

						<span class="menu-text">
							Agenda
							<span class="badge badge-transparent tooltip-error" title="2 Important Events">
								<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
							</span>
						</span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="gallery.html">
						<i class="menu-icon fa fa-picture-o"></i>
						<span class="menu-text"> Photos </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-tag"></i>
						<span class="menu-text"> Videos </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-tag"></i>
						<span class="menu-text"> Hashtag </span>
					</a>

					<b class="arrow"></b>
				</li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>

			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
			</script>
		</div>