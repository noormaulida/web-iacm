
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
		

		<script src="<?= base_url() ?>assets/admin/js/ace-elements.min.js"></script>
		<script src="<?= base_url() ?>assets/admin/js/ace.min.js"></script>
		<?php
		if ($this->session->userdata('tab')=="dashboard-index"):
		?>
			<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery-ui.custom.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.ui.touch-punch.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.easypiechart.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.sparkline.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.flot.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.flot.pie.min.js"></script>
			<script src="<?= base_url() ?>assets/admin/js/jquery.flot.resize.min.js"></script>
		<?php endif; ?>
		<?php
		if ($this->session->userdata('tab')=="users-index"):
		?>
			<script src="assets/js/jquery.dataTables.min.js"></script>
			<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
			<script src="assets/js/dataTables.tableTools.min.js"></script>
			<script src="assets/js/dataTables.colVis.min.js"></script>
			<script type="text/javascript">
				jQuery(function($) {
					//initiate dataTables plugin
					var oTable1 = 
					$('#dynamic-table')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.dataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": false },
						  null, null,null, null, null,
						  { "bSortable": false }
						],
						"aaSorting": [],
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				    } );
					//oTable1.fnAdjustColumnSizing();
				
				
					//TableTools settings
					TableTools.classes.container = "btn-group btn-overlap";
					TableTools.classes.print = {
						"body": "DTTT_Print",
						"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
						"message": "tableTools-print-navbar"
					}
				
					//initiate TableTools extension
					var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
						"sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",
						
						"sRowSelector": "td:not(:last-child)",
						"sRowSelect": "multi",
						"fnRowSelected": function(row) {
							//check checkbox when row is selected
							try { $(row).find('input[type=checkbox]').get(0).checked = true }
							catch(e) {}
						},
						"fnRowDeselected": function(row) {
							//uncheck checkbox
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
								"sToolTip": "Export to CSV",
								"sButtonClass": "btn btn-white btn-primary  btn-bold",
								"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
							},
							
							{
								"sExtends": "pdf",
								"sToolTip": "Export to PDF",
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
										  <p>Please use your browser's print function to\
										  print this table.\
										  <br />Press <b>escape</b> when finished.</p>",
							}
				        ]
				    } );
					//we put a container before our table and append TableTools element to it
				    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
					
					//also add tooltips to table tools buttons
					//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
					//so we add tooltips to the "DIV" child after it becomes inserted
					//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
					setTimeout(function() {
						$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
							var div = $(this).find('> div');
							if(div.length > 0) div.tooltip({container: 'body'});
							else $(this).tooltip({container: 'body'});
						});
					}, 200);
					
					
					
					//ColVis extension
					var colvis = new $.fn.dataTable.ColVis( oTable1, {
						"buttonText": "<i class='fa fa-search'></i>",
						"aiExclude": [0, 6],
						"bShowAll": true,
						//"bRestore": true,
						"sAlign": "right",
						"fnLabel": function(i, title, th) {
							return $(th).text();//remove icons, etc
						}
						
					}); 
					
					//style it
					$(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
					
					//and append it to our table tools btn-group, also add tooltip
					$(colvis.button())
					.prependTo('.tableTools-container .btn-group')
					.attr('title', 'Show/hide columns').tooltip({container: 'body'});
					
					//and make the list, buttons and checkboxed Ace-like
					$(colvis.dom.collection)
					.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
					.find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
					.find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
				
				
					
					/////////////////////////////////
					//table checkboxes
					$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
					
					//select/deselect all rows according to table header checkbox
					$('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
						var th_checked = this.checked;//checkbox inside "TH" table header
						
						$(this).closest('table').find('tbody > tr').each(function(){
							var row = this;
							if(th_checked) tableTools_obj.fnSelect(row);
							else tableTools_obj.fnDeselect(row);
						});
					});
					
					//select/deselect a row when the checkbox is checked/unchecked
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
					
					
					//And for the first simple table, which doesn't have TableTools or dataTables
					//select/deselect all rows according to table header checkbox
					var active_class = 'active';
					$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
						var th_checked = this.checked;//checkbox inside "TH" table header
						
						$(this).closest('table').find('tbody > tr').each(function(){
							var row = this;
							if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
							else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
						});
					});
					
					//select/deselect a row when the checkbox is checked/unchecked
					$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
						var $row = $(this).closest('tr');
						if(this.checked) $row.addClass(active_class);
						else $row.removeClass(active_class);
					});
				
					
				
					/********************************/
					//add tooltip for small view action buttons in dropdown menu
					$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
					
					//tooltip placement on right or left
					function tooltip_placement(context, source) {
						var $source = $(source);
						var $parent = $source.closest('table')
						var off1 = $parent.offset();
						var w1 = $parent.width();
				
						var off2 = $source.offset();
						//var w2 = $source.width();
				
						if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
						return 'left';
					}
				
				})
			</script>
		<?php endif; ?>

		<!--<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>-->
	</body>
</html>
