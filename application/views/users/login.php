<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace-rtl.min.css" />
	</head>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<a href="<?php echo base_url(); ?>"><i class="ace-icon fa fa-leaf green"></i></a>
								</h1>
								<h4 class="blue" id="id-company-text"></h4>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box widget-box no-border <?= $this->session->userdata('tab')=='login' ? 'visible' : '' ?>">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Login
											</h4>
											<div class="space-6"></div>
											<?php
												if ($this->session->flashdata('success_register') || $this->session->flashdata('error_register')): ?>
												<p class="alert alert-<?= $this->session->flashdata('success_register') ? 'success' : 'danger' ?>">
													<?= $this->session->flashdata('success_register') ? $this->session->flashdata('success_register') : $this->session->flashdata('error_register') ?>
												</p>
											<?php
												endif;
												if ($this->session->flashdata('error_login') || validation_errors()): ?>
												<p class="alert alert-danger">
													<?= $this->session->flashdata('error_login') ? $this->session->flashdata('error_login') : 'Cek input data Anda kembali' ?>
												</p>
											<?php
												endif;
          									$attributes = array("id" => "loginform", "name" => "loginform");
          									echo form_open("users/login", $attributes);?>
												<fieldset>
													<input type="hidden" name="login_hidden" value="login">
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<?php
																$data = array(
																	'class'			=> "form-control <?= form_error('email_login') ? 'has-error' : ''; ?>",
																	'placeholder' 	=> 'Email',
																	'name'			=> 'email_login',
																	'value'			=> !form_error('email_login') ? set_value('email_login') : '',
													            );
													            echo form_input($data);
															?>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<?php
																$data = array(
																	'class'			=> "form-control <?= form_error('password_login') ? 'has-error' : ''; ?>",
																	'placeholder' 	=> 'Password',
																	'name'			=> 'password_login',
																	'value'			=> !form_error('password_login') ? set_value('password_login') : '',
													            );
													            echo form_password($data);
															?>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											<?php echo form_close(); ?>
										</div>
										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													Lupa password
												</a>
											</div>
											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													Registrasi disini
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div id="forgot-box" class="forgot-box widget-box no-border <?= $this->session->userdata('tab')=='forgot' ? 'visible' : '' ?>">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Fasilitas Lupa Password
											</h4>

											<div class="space-6"></div>
											<p>
												Masukkan Email untuk Reset Ulang Password
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Kirim Email</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Kembali ke Login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div id="signup-box" class="signup-box widget-box no-border <?= $this->session->userdata('tab')=='register' ? 'visible' : '' ?>">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Registrasi User
											</h4>
											<div class="space-6"></div>
											<?php
												if (validation_errors()):
											?>
												<p class="alert alert-danger">Cek input data Anda kembali</p>
											<?php
												endif;
			  									$attributes = array("id" => "regisform", "name" => "regisform", "class" => "form-horizontal");
			  									echo form_open("users/login", $attributes);
			  								?>
												<fieldset>
													<input type="hidden" name="registration_hidden" value="registration">
													<div class="<?= form_error('full_name') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<!-- <input type="email" class="form-control" placeholder="Email" /> -->
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Nama Lengkap',
																		'name'			=> 'full_name',
																		'value'			=> !form_error('full_name') ? set_value('full_name') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('nick_name') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Nama Panggilan',
																		'name'			=> 'nick_name',
																		'value'			=> !form_error('nick_name') ? set_value('nick_name') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('email_regis') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Email',
																		'name'			=> 'email_regis',
																		'value'			=> !form_error('email_regis') ? set_value('email_regis') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-envelope"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('password_regis') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Password',
																		'name'			=> 'password_regis',
																		'value'			=> !form_error('password_regis') ? set_value('password_regis') : '',
														            );
														            echo form_password($data);
																?>
																<i class="ace-icon fa fa-lock"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('password_regis') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Konfirmasi Password',
																		'name'			=> 'conf_password',
																		'value'			=> !form_error('password_regis') ? set_value('password_regis') : '',
														            );
														            echo form_password($data);
																?>
																<i class="ace-icon fa fa-lock"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('address') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Alamat',
																		'name'			=> 'address',
																		'value'			=> !form_error('address') ? set_value('address') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-home"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('phone') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'No Handphone',
																		'name'			=> 'phone',
																		'value'			=> !form_error('phone') ? set_value('phone') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-phone"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('date_of_birth') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Tanggal Lahir',
																		'name'			=> 'date_of_birth',
																		'value'			=> !form_error('date_of_birth') ? set_value('date_of_birth') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-calendar-o"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('cm_generation') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$options = array(
																		'' => "--Angkatan Ke--",
																		'1' => '01',
																		'2' => '02',
																		'3' => '03',
																		'4' => '04',
																		'5' => '05',
																		'6' => '06',
																		'7' => '07',
																		'8' => '08',
																	);
																	echo form_dropdown('cm_generation', $options, !form_error('cm_generation') ? set_value('cm_generation') : '');
																?>
															</span>
														</label>
													</div>

													<div class="<?= form_error('university') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Nama Universitas',
																		'name'			=> 'university',
																		'value'			=> !form_error('university') ? set_value('university') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-graduation-cap"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('faculty') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Nama Fakultas',
																		'name'			=> 'faculty',
																		'value'			=> !form_error('faculty') ? set_value('faculty') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-graduation-cap"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('department') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Nama Jurusan',
																		'name'			=> 'department',
																		'value'			=> !form_error('department') ? set_value('department') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-graduation-cap"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('company') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Perusahaan Tempat Bekerja Saat Ini',
																		'name'			=> 'company',
																		'value'			=> !form_error('company') ? set_value('company') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-suitcase"></i>
															</span>
														</label>
													</div>

													<div class="<?= form_error('occupation') ? 'has-error' : '' ?>">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<?php
																	$data = array(
																		'class'			=> 'form-control',
																		'placeholder' 	=> 'Pekerjaan Saat Ini',
																		'name'			=> 'occupation',
																		'value'			=> !form_error('occupation') ? set_value('occupation') : '',
														            );
														            echo form_input($data);
																?>
																<i class="ace-icon fa fa-suitcase"></i>
															</span>
														</label>
													</div>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											<?= form_close(); ?>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Kembali ke Login
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/admin/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');
				$(target).addClass('visible');
			 });
			});
		</script>
	</body>
</html>
