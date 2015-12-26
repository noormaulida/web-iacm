
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Dashboard</span>
							Web IACM &copy; 2015
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
		<script src="<?= base_url() ?>assets/admin/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?= base_url() ?>assets/admin/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url() ?>assets/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
		<script>window.tPrefix = '<?= base_url() ?>';</script>
		<?php
		if ($this->session->userdata('tab')=='dashboard-index'):
		?>
			<script src="<?= base_url() ?>assets/admin/js/jquery-ui.custom.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.ui.touch-punch.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.easypiechart.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.sparkline.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.flot.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.flot.pie.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.flot.resize.min.js"></script>
		<?php elseif ($this->session->userdata('tab')=='users-index'):?>
			<script src="<?= base_url() ?>assets/admin/js/jquery.dataTables.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.dataTables.bootstrap.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/dataTables.tableTools.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/dataTables.colVis.min.js"></script>
			<script type="text/javascript">
				jQuery(function($) {
					var oTable1 = 
					$('#dynamic-table')
					.dataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": false },
						  null, null, null, null, null,
						  { "bSortable": false }
						],
						"aaSorting": [],
				    } );
					TableTools.classes.container = "btn-group btn-overlap";
					TableTools.classes.print = {
						"body": "DTTT_Print",
						"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
						"message": "tableTools-print-navbar"
					}
					var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
						"sSwfPath": "<?= base_url() ?>assets/admin/swf/copy_csv_xls_pdf.swf",
						"sRowSelector": "td:not(:last-child)",
						"sRowSelect": "multi",
						"fnRowSelected": function(row) {
							try { $(row).find('input[type=checkbox]').get(0).checked = true }
							catch(e) {}
						},
						"fnRowDeselected": function(row) {
							try { $(row).find('input[type=checkbox]').get(0).checked = false }
							catch(e) {}
						},
						"sSelectedClass": "success",
				        "aButtons": [
							{
								"sExtends": "copy",
								"sToolTip": "Copy to clipboard",
								"sButtonClass": "btn btn-white btn-primary btn-bold",
								"sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
								"fnComplete": function() {
									this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
										<p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
										1500
									);
								}
							},
							{
								"sExtends": "csv",
								"sToolTip": "Export ke CSV",
								"sButtonClass": "btn btn-white btn-primary  btn-bold",
								"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
							},
							{
								"sExtends": "pdf",
								"sToolTip": "Export ke PDF",
								"sButtonClass": "btn btn-white btn-primary  btn-bold",
								"sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
							},
							{
								"sExtends": "print",
								"sToolTip": "Print view",
								"sButtonClass": "btn btn-white btn-primary  btn-bold",
								"sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
								"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
								"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
										  <p>Gunakan tombol Ctrl+P untuk\
										  print data ini.\
										  <br />Tekan <b>escape</b> untuk keluar.</p>",
							}
				        ]
				    } );
				    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
					setTimeout(function() {
						$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
							var div = $(this).find('> div');
							if(div.length > 0) div.tooltip({container: 'body'});
							else $(this).tooltip({container: 'body'});
						});
					}, 200);
					var colvis = new $.fn.dataTable.ColVis( oTable1, {
						"buttonText": "<i class='fa fa-search'></i>",
						"aiExclude": [0, 6],
						"bShowAll": true,
						"sAlign": "right",
						"fnLabel": function(i, title, th) {
							return $(th).text();
						}
					});
					$(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
					$(colvis.button())
					.prependTo('.tableTools-container .btn-group')
					.attr('title', 'Show/hide columns').tooltip({container: 'body'});
					$(colvis.dom.collection)
					.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
					.find('li').wrapInner('<a href="javascript:void(0)" />')
					.find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
					$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
					$('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
						var th_checked = this.checked;
						$(this).closest('table').find('tbody > tr').each(function(){
							var row = this;
							if(th_checked) tableTools_obj.fnSelect(row);
							else tableTools_obj.fnDeselect(row);
						});
					});
					$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
						var row = $(this).closest('tr').get(0);
						if(!this.checked) tableTools_obj.fnSelect(row);
						else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
					});
						$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
						e.stopImmediatePropagation();
						e.stopPropagation();
						e.preventDefault();
					});
				})
			</script>
		<?php elseif ($this->session->userdata('tab')=='news-create'):?>
			<script src="<?= base_url() ?>assets/admin/js/jquery-ui.custom.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.ui.touch-punch.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/markdown.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/bootstrap-markdown.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.hotkeys.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/bootstrap-wysiwyg.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/bootbox.min.js"></script>
			<script type="text/javascript">
				jQuery(function($){
				function showErrorAlert (reason, detail) {
					var msg='';
					if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
					else {
						//console.log("error uploading file", reason, detail);
					}
					$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
					 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
				}
				$('#editor1').ace_wysiwyg({
					toolbar:
					[
						'font',
						null,
						'fontSize',
						null,
						{name:'bold', className:'btn-info'},
						{name:'italic', className:'btn-info'},
						{name:'strikethrough', className:'btn-info'},
						{name:'underline', className:'btn-info'},
						null,
						{name:'insertunorderedlist', className:'btn-success'},
						{name:'insertorderedlist', className:'btn-success'},
						{name:'outdent', className:'btn-purple'},
						{name:'indent', className:'btn-purple'},
						null,
						{name:'justifyleft', className:'btn-primary'},
						{name:'justifycenter', className:'btn-primary'},
						{name:'justifyright', className:'btn-primary'},
						{name:'justifyfull', className:'btn-inverse'},
						null,
						{name:'createLink', className:'btn-pink'},
						{name:'unlink', className:'btn-pink'},
						null,
						{name:'insertImage', className:'btn-success'},
						null,
						'foreColor',
						null,
						{name:'undo', className:'btn-grey'},
						{name:'redo', className:'btn-grey'}
					],
					'wysiwyg': {
						fileUploadError: showErrorAlert
					}
				}).prev().addClass('wysiwyg-style2');
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					var toolbar = $('#editor1').prev().get(0);
					if(which >= 1 && which <= 4) {
						toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
						if(which == 1) $(toolbar).addClass('wysiwyg-style1');
						else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
						if(which == 4) {
							$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
						} else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
					}
				});
				if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {
					var lastResizableImg = null;
					function destroyResizable() {
						if(lastResizableImg == null) return;
						lastResizableImg.resizable( "destroy" );
						lastResizableImg.removeData('resizable');
						lastResizableImg = null;
					}

					var enableImageResize = function() {
						$('.wysiwyg-editor')
						.on('mousedown', function(e) {
							var target = $(e.target);
							if( e.target instanceof HTMLImageElement ) {
								if( !target.data('resizable') ) {
									target.resizable({
										aspectRatio: e.target.width / e.target.height,
									});
									target.data('resizable', true);
									if( lastResizableImg != null ) {
										lastResizableImg.resizable( "destroy" );
										lastResizableImg.removeData('resizable');
									}
									lastResizableImg = target;
								}
							}
						})
						.on('click', function(e) {
							if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
								destroyResizable();
							}
						})
						.on('keydown', function() {
							destroyResizable();
						});
				    }
					enableImageResize();
				}
				});
			</script>
			<script type="text/javascript">
				$("#title__input").on('input', function() {
					var value = { title: $(this).val() };
					$.get("<?= base_url() . 'news/generate-slug/' ?>", value,
						function(respon) {
							if(respon.status.toLowerCase()=="ok") {
								$("#slug__input").val(respon.slug);
								$("#seen__slug").html(respon.slug);
							}
					}, 'json');
				});
			</script>
		<?php endif; ?>

		<script src="<?= base_url() ?>assets/admin/js/ace-elements.min.js"></script>
		<script src="<?= base_url() ?>assets/admin/js/ace.min.js"></script>
	</body>
</html>
