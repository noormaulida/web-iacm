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
							<li class="active">Create News</li>
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
								Create News
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group <?= form_error('full_name') ? 'has-error' : ''; ?>">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Judul </label>

									<div class="col-sm-9">
										<?php
											$data = array(
												'class'			=> 'form-control',
												'placeholder' 	=> 'Judul',
												'name'			=> 'title',
												'value'			=> !form_error('title') ? set_value('title') : '',
												'id'			=> 'title__input'
								            );
								            echo form_input($data);
										?>
									</div>
								</div>
								<br /><br />
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Slug </label>

									<div class="col-sm-9">
										<p id="hidden__slug" hidden></p><p id="seen__slug">-</p>
									</div>
								</div>
							</div>
						</div>
						<div class="hr hr-16 hr-dotted"></div>
						<div class="row">
							<div class="col-xs-12">
								<div class="wysiwyg-editor" id="editor1"></div>

								<div class="hr hr-double dotted"></div>

								<div class="clearfix form-actions">
									<div class=".col-xs-12">
										<center>
											<button id="draft__news" class="btn btn-app btn-warning btn-xs radius-4" type="input">
												<i class="ace-icon fa fa-floppy-o bigger-160"></i>
												Draft
												<span class="badge badge-transparent">
													<i class="light-red ace-icon fa fa-asterisk"></i>
												</span>
											</button>
											&nbsp; &nbsp;
											<button id="submit__news" class="btn btn-app btn-primary btn-xs radius-4" type="input">
												<i class="ace-icon fa fa-globe bigger-160"></i>
												Publish
												<span class="badge badge-transparent">
													<i class="light-red ace-icon fa fa-asterisk"></i>
												</span>
											</button>
										</center>
									</div>
								</div>

								<script type="text/javascript">
									var $path_assets = "dist";
								</script>

							</div>
						</div>
					</div>
				</div>
			</div>
