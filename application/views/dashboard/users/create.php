			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">New User</li>
						</ul>
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div>

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div>
							</div>
						</div>
						<div class="page-header">
							<h1>
								Create New User
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php
									if (validation_errors()): ?>
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<i class="ace-icon fa fa-times"></i>
										Cek input data Anda kembali
										<br />
									</div>
								<?php
									endif;
									if ($this->session->flashdata('success') || $this->session->flashdata('error')):
								?>
									<div class="alert alert-<?=$this->session->flashdata('success') ? 'success' : 'danger'; ?>">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<i class="ace-icon fa fa-<?=$this->session->flashdata('success') ? 'check' : 'times'?>"></i>
										<?=$this->session->flashdata('success') ? $this->session->flashdata('success') : $this->session->flashdata('error')?>
									</div>
								<?php
									endif;
  									$attributes = array("id" => "regisform", "name" => "regisform", "class" => "form-horizontal");
  									echo form_open("users/create", $attributes);
  								?>
									<div class="form-group <?= form_error('full_name') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Nama Lengkap',
													'name'			=> 'full_name',
													'value'			=> !form_error('full_name') ? set_value('full_name') : '',
									            );
									            echo form_input($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('nick_name') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Panggilan </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Nama Panggilan',
													'name'			=> 'nick_name',
													'value'			=> !form_error('nick_name') ? set_value('nick_name') : '',
									            );
									            echo form_input($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('email') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Email',
													'name'			=> 'email',
													'value'			=> !form_error('email') ? set_value('email') : '',
									            );
									            echo form_input($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('password') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Password',
													'name'			=> 'password',
													'value'			=> !form_error('password') ? set_value('password') : '',
									            );
									            echo form_password($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('password') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Konfirmasi Password </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Konfirmasi Password',
													'name'			=> 'conf_password',
													'value'			=> !form_error('password') ? set_value('password') : '',
									            );
									            echo form_password($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('address') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Alamat',
													'name'			=> 'address',
													'value'			=> !form_error('address') ? set_value('address') : '',
									            );
									            echo form_input($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('date_of_birth') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>

										<div class="col-sm-9">
											<!-- <input class="date-picker col-xs-10 col-sm-5" placeholder="dd-mm-yyyy" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" /> -->
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'yyyy-mm-dd',
													'name'			=> 'date_of_birth',
													'value'			=> !form_error('date_of_birth') ? set_value('date_of_birth') : '',
									            );
									            echo form_input($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('phone') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nomor Handphone </label>

										<div class="col-sm-9">
											<?php
												$data = array(
													'class'			=> 'col-xs-10 col-sm-5',
													'placeholder' 	=> 'Handphone',
													'name'			=> 'phone',
													'value'			=> !form_error('phone') ? set_value('phone') : '',
									            );
									            echo form_input($data);
											?>
										</div>
									</div>

									<div class="form-group <?= form_error('cm_generation') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Angkatan Ke- </label>

										<div class="col-sm-9">
											<?php
												$options = array(
													'' => "--Pilih salah satu--",
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
										</div>
									</div>

									<div class="form-group <?= form_error('is_admin') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hak Akses </label>

										<div class="col-sm-9">
											<?php
												$options = array(
													'' => "--Pilih salah satu--",
													'1' => 'Administrator',
													'0' => 'User',
												);
												echo form_dropdown('is_admin', $options, !form_error('is_admin') ? set_value('is_admin') : '');
											?>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b> Data Universitas </b></label>
									</div>

									<div class="form-group <?= form_error('institution') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Universitas </label>
										<div class="col-sm-9">
										<?php
											$data = array(
												'class'			=> 'col-xs-10 col-sm-5',
												'placeholder' 	=> 'Nama Universitas',
												'name'			=> 'institution',
												'value'			=> !form_error('institution') ? set_value('institution') : '',
								            );
								            echo form_input($data);
										?>
										</div>
									</div>

									<div class="form-group <?= form_error('faculty') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Fakultas </label>
										<div class="col-sm-9">
										<?php
											$data = array(
												'class'			=> 'col-xs-10 col-sm-5',
												'placeholder' 	=> 'Nama Fakultas',
												'name'			=> 'faculty',
												'value'			=> !form_error('faculty') ? set_value('faculty') : '',
								            );
								            echo form_input($data);
										?>
										</div>
									</div>

									<div class="form-group <?= form_error('department') ? 'has-error' : '' ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jurusan </label>
										<div class="col-sm-9">
										<?php
											$data = array(
												'class'			=> 'col-xs-10 col-sm-5',
												'placeholder' 	=> 'Nama Jurusan',
												'name'			=> 'department',
												'value'			=> !form_error('department') ? set_value('department') : '',
								            );
								            echo form_input($data);
										?>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b> Data Pekerjaan Saat Ini </b></label>
									</div>

									<div class="form-group <?= form_error('company') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Perusahaan </label>
										<div class="col-sm-9">
										<?php
											$data = array(
												'class'			=> 'col-xs-10 col-sm-5',
												'placeholder' 	=> 'Nama Perusahaan',
												'name'			=> 'company',
												'value'			=> !form_error('company') ? set_value('company') : '',
								            );
								            echo form_input($data);
										?>
										</div>
									</div>

									<div class="form-group <?= form_error('occupation') ? 'has-error' : ''; ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
										<div class="col-sm-9">
										<?php
											$data = array(
												'class'			=> 'col-xs-10 col-sm-5',
												'placeholder' 	=> 'Detail Pekerjaan',
												'name'			=> 'occupation',
												'value'			=> !form_error('occupation') ? set_value('occupation') : '',
								            );
								            echo form_input($data);
										?>
										</div>
									</div>


									<div class="clearfix form-actions">
										<div class=".col-xs-12">
											<center>
												<button class="btn btn-app btn-warning btn-xs" type="reset">
													<i class="ace-icon fa fa-undo bigger-160"></i>
													Reset
												</button>
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-app btn-primary btn-xs radius-4" type="input">
													<i class="ace-icon fa fa-floppy-o bigger-160"></i>
													Submit
													<span class="badge badge-transparent">
														<i class="light-red ace-icon fa fa-asterisk"></i>
													</span>
												</button>
											</center>
										</div>
									</div>
								<?= form_close(); ?>

								<div class="hr hr-18 dotted hr-double"></div>
							</div><!-- /.col -->
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
