jQuery( document ).ready(function() {
	jQuery('.summernote').summernote({
		height: 100,
		minHeight: null,
		maxHeight: null, 
		focus: true
	});

	jQuery('.currency').blur(function(){
			this.value = parseFloat(this.value.replace(/,/g, ""))
			.toFixed(2)
			.toString()
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	});
	// jQuery('.auto').autoNumeric('init', { aSep: '.', aDec: ',', mDec: 0, vMax: '10000000000' });
	var str_rand = Math.random().toString(36).substring(7);
	// jQuery(".zoom_05").elevateZoom({ tint:true, cursor: 'pointer', tintOpacity:0.5});
	
	if ($("#datepicker").length){
		$("#datepicker").kendoDatePicker({format: "yyyy-MM-dd"});
	}
	//** Plugin Datepicker **//
	jQuery('.onlydate').datetimepicker({ format: 'yyyy-MM-DD' });
	jQuery('.onlydate2').datetimepicker({ format: 'YYYY-MM-DD' });
	jQuery('.datetimepicker').datetimepicker({ format: 'YYYY-MM-DD HH:mm' });
	jQuery('.date-picker').datepicker({ orientation: "top auto", autoclose: true, format: 'yyyy-mm-dd', });
	jQuery(function() {
		var start = moment().subtract(29, 'days');
		var end = moment();
		jQuery('input[name="daterange"]').daterangepicker({
			locale: { format: 'YYYY/MM/DD' },
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()], 
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
				"alwaysShowCalendars": true,
				"drops": "up"
		}, function(start, end, label) {
			console.log("New date range selected: " + start.format('YYYY-MM-DD') + " to " + end.format('YYYY-MM-DD') + " (predefined range: " + label + ")");
			delay(function(){
				var keyword = jQuery('input[name="daterange"]').val();
				var tbl = jQuery('input[name="daterange"]').attr('tbl');
				var data = {type: 'created', keyword: keyword, str_rand: str_rand};
				if (tbl == 'invoices') {
					search_invoices(data, str_rand);
				} else {
					search_stocks(data, str_rand);
				}
			}, 100 );
		}
	);
	
	jQuery(function(){
		jQuery('#inner-content-div').slimScroll({
			color: '#00f',
			size: '5px',
			height: '350px',
			railVisible: true,
			alwaysVisible: true
		});
	});

	function getIndexById(id) {
		var idx,
			l = sampleData.length;
		for (var j=0; j < l; j++) {
			if (sampleData[j].ProductID == id) {
				return j;
			}
		}
		return null;
	}

	if ($("#grid").length){
		var sampleData = jQuery('#grid').data('room');
		var sampleDataNextID = sampleData.length + 1;
		function getIndexById(id) {
			var idx,
				l = sampleData.length;

			for (var j=0; j < l; j++) {
				if (sampleData[j].ProductID == id) {
					return j;
				}
			}
			return null;
		}
		var dataSource = new kendo.data.DataSource({
			transport: {
				read: function (e) {
					e.success(sampleData);
				},
				create: function (e) {
					e.data.ProductID = sampleDataNextID++;
					e.success(e.data);	
				},
				update: function (e) {
					// locate item in original datasource and update it
					sampleData[getIndexById(e.data.ProductID)] = e.data;
					e.success();
					var type = jQuery('.profit-percent-inquiries').attr('type');
					jQuery.ajax({
						url: '/inquiries/update_inquiries',
						type: 'POST',
						data: {"data":e.data,'type': type},
						dataType: 'html',
						cache: false,
						beforeSend: function(){
							jQuery("#loader").fadeIn();
						},
						success: function(response){
							jQuery("#loader").fadeOut();
							return false;
						}
					});
					// on failure
					// e.error("XHR response", "status code", "error message");
				},
				destroy: function (e) {
					// locate item in original datasource and remove it
					sampleData.splice(getIndexById(e.data.ProductID), 1);
					// on success
					e.success();
					// console.log(e.data);
					jQuery.ajax({
						url: '/inquiries/destroy_inq',
						type: 'POST',
						data: {"data":e.data},
						dataType: 'html',
						cache: false,
						beforeSend: function(){jQuery("#loader").fadeIn();},
						success: function(response){
							jQuery("#loader").fadeOut();
							e.success();
							console.log(response);return;
						}
					});
					// on failure
					//e.error("XHR response", "status code", "error message");
				}
			},
			error: function (e) {
				// handle data operation error
				alert("Status: " + e.status + "; Error message: " + e.errorThrown);
			},
			pageSize: 30,
			batch: false,
			schema: {
				model: {
					id: "ProductID",
					fields: {
						choose: {editable: false},
						ProductID: { editable: false, nullable: true },
						no: {editable: false},
						name: {},
						maker_type_ref: {},
						partno:  {},
						unit: {},
						quantity: {},
						remark: {},
					}
				}
			}
		});

		var grid = $("#grid").kendoGrid({
			dataSource: dataSource,
			navigatable: true,
			sortable: { mode: "single", allowUnsort: false },
			pageable: true,
			toolbar: ["save", "cancel",{ template: '<button class="k-button" id="btn-delete-kendo"><span class="k-icon k-i-close"></span>Delete</button>' }],
			columns: [
				{ field: "choose",editable: false, nullable: true, title: "Choose", width: "30px" , template: "<input type='checkbox' class='checkbox' />" },
				{ field: "no",editable: false, nullable: true, title: "S.No", width: "35px" },
				{ field: "name", title: "Description", width: "270px" },
				{ field: "maker_type_ref", title: "Maker/Type Ref" , width: "100px" },
				{ field: "partno", title: "PartNo" , width: "100px" },
				{ field: "unit", title:"Units", width: "70px" },
				{ field: "quantity",title:"Quantity", width: "70px" },
				{ field: "remark",title:"Remark", width: "270px" },
			],
			editable: true
		}).data("kendoGrid");
		grid.table.on("click", ".checkbox" , selectRow);

		$("#btn-delete-kendo").bind("click", function () {
			
			var inquiry_id = jQuery("#grid").attr("inquiry_id");
			var checked = [];
			for(var i in checkedIds){
				if(checkedIds[i]){
					checked.push(i);
				}
			}
			jQuery.ajax({
				url: '/inquiries/delete_item_products',
				type: 'POST',
				data: {"data":checked, 'inquiriesdetails':'inquiriesdetails',"inquiry_id":inquiry_id},
				dataType: 'json',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					// console.log(response);return;
					var grid = $('#grid').data("kendoGrid");
					grid.dataSource.data(response);
					grid.dataSource.refresh;
					return false;
				}
			});
		});

		var checkedIds = {};


		//on click of the checkbox:
		function selectRow() {
			var checked = this.checked,
			row = $(this).closest("tr"),
			grid = $("#grid").data("kendoGrid"),
			dataItem = grid.dataItem(row);
			checkedIds[dataItem.id] = checked;
			if (checked) {
				//-select the row
				row.addClass("k-state-selected");
			} else {
				//-remove selection
				row.removeClass("k-state-selected");
			}
		}

		//on dataBound event restore previous selected rows:
		
	}

	if ($("#grid_quotation").length){
		var sampleData = jQuery('#grid_quotation').data('room');
		// console.log(sampleData);
		var sampleDataNextID = sampleData.length + 1;
		function getIndexById(id) {
			var idx,
				l = sampleData.length;

			for (var j=0; j < l; j++) {
				if (sampleData[j].ProductID == id) {
					return j;
				}
			}
			return null;
		}
		var dataSource = new kendo.data.DataSource({
			transport: {
				read: function (e) {
					// on success
					e.success(sampleData);
					// on failure
					//e.error("XHR response", "status code", "error message");
				},
				create: function (e) {
					e.data.ProductID = sampleDataNextID++;
					e.success(e.data);	
				},
				update: function (e) {
					// locate item in original datasource and update it
					sampleData[getIndexById(e.data.ProductID)] = e.data;
					e.data.f_total = e.data.u_p*e.data.quantity;
					// alert("ok");
					// // on success
					e.success();
					var type = jQuery('.profit-percent-inquiries').attr('type');
					jQuery.ajax({
						url: '/inquiries/update_inquiries',
						type: 'POST',
						data: {"data":e.data,'type': type},
						dataType: 'html',
						cache: false,
						beforeSend: function(){
							jQuery("#loader").fadeIn();
						},
						success: function(response){
							jQuery("#loader").fadeOut();

							var result = jQuery.parseJSON(response);
							jQuery("#sub-total-inquiries").val(result.total);
							jQuery("#sub-total-inquiries").attr('value',result.total);
							var grid = $('#grid_quotation').data("kendoGrid");
							grid.dataSource.data(result.data);
							grid.dataSource.refresh;
							return false;
						}
					});
					// on failure
					// e.error("XHR response", "status code", "error message");
				},
				destroy: function (e) {
					// locate item in original datasource and remove it
					sampleData.splice(getIndexById(e.data.ProductID), 1);
					// on success
					e.success();
					// console.log(e.data);
					jQuery.ajax({
						url: '/inquiries/destroy_inq',
						type: 'POST',
						data: {"data":e.data},
						dataType: 'html',
						cache: false,
						beforeSend: function(){jQuery("#loader").fadeIn();},
						success: function(response){
							jQuery("#loader").fadeOut();
							e.success();
							console.log(response);return;
						}
					});
					// on failure
					//e.error("XHR response", "status code", "error message");
				}
			},
			error: function (e) {
				// handle data operation error
				alert("Status: " + e.status + "; Error message: " + e.errorThrown);
			},
			pageSize: 30,
			batch: false,
			schema: {
				model: {
					id: "ProductID",
					fields: {
						ProductID: { editable: false, nullable: true },
						choose: {editable: false},
						no: {editable: false},
						name: {editable: false},
						unit: {editable: false},
						quantity: {editable: true},

						supplier: {editable: false},

						supp_u_p: {editable: false},
						supp_u_p_usd: {editable: false},

						profit: {},

						u_p: {editable: false},
						u_p_usd: {editable: false},

						f_total: {editable: false},
						f_total_usd: {editable: false},

						del_time: {editable: false},
						del_time_final: {editable: false},
						remark: {},
					}
				}
			}
		});

		var grid = $("#grid_quotation").kendoGrid({
			dataSource: dataSource,
			navigatable: true,
			sortable: { mode: "single", allowUnsort: false },
			pageable: true,
			toolbar: ["save", "cancel",{ template: '<button class="k-button" id="btn-delete-kendo"><span class="k-icon k-i-close"></span>Delete</button>' }],
			columns: [
				{ field: "choose",editable: false, nullable: true, title: "Choose", width: "65px" , template: "<input type='checkbox' class='checkbox' />" },
				{ field: "no",editable: false, nullable: true, title: "S.No", width: "45px" },
				{ field: "name", title: "Description", width: "200px" },
				{ field: "unit", title:"Units", width: "70px" },
				{ field: "quantity",title:"Quantity", width: "70px" },

				{ field: "supplier",title:"Supplier", width: "120px" },

				{ field: "supp_u_p",title:"Supp.U/P", width: "90px" },
				{ field: "supp_u_p_usd",title:"Supp.U/P(USD)", width: "110px"},

				{ field: "profit",title:"P(%)", width: "50px" },

				{ field: "u_p",title:"U/Price", width: "70px" },
				{ field: "u_p_usd",title:"U/Price(USD)", width: "110px" },

				{ field: "f_total",title:"Final total", width: "90px" },
				{ field: "f_total_usd",title:"Final total(USD)", width: "120px" },
				{ field: "del_time",title:"Delivery Time(day)", width: "130px" },
				{ field: "del_time_final",title:"Final Delivery Time", width: "130px" },
				{ field: "remark",title:"Remark", width: "170px" },


				// { command: ["destroy"], title: "&nbsp;", width: "100px" }
			],
			editable: true
		}).data("kendoGrid");

		grid.table.on("click", ".checkbox" , selectRow);

		$("#btn-delete-kendo").bind("click", function () {
			var type = jQuery("#grid_quotation").attr("data-type");
			var inquiry_id = jQuery("#grid_quotation").attr("inquiry_id");
			var checked = [];
			for(var i in checkedIds){
				if(checkedIds[i]){
					checked.push(i);
				}
			}
			jQuery.ajax({
				url: '/inquiries/delete_item_products',
				type: 'POST',
				data: {"data":checked, "type":type,"inquiry_id":inquiry_id},
				dataType: 'json',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					var grid = $('#grid_quotation').data("kendoGrid");
					grid.dataSource.data(response);
					grid.dataSource.refresh;
					console.log(response);
					return false;
				}
			});
		});

		var checkedIds = {};


		//on click of the checkbox:
		function selectRow() {
			var checked = this.checked,
			row = $(this).closest("tr"),
			grid = $("#grid_quotation").data("kendoGrid"),
			dataItem = grid.dataItem(row);
			checkedIds[dataItem.id] = checked;
			if (checked) {
				//-select the row
				row.addClass("k-state-selected");
				} else {
				//-remove selection
				row.removeClass("k-state-selected");
			}
		}

		//on dataBound event restore previous selected rows:
		function onDataBound(e) {
			var view = this.dataSource.view();
			for(var i = 0; i < view.length;i++){
				if(checkedIds[view[i].id]){
					this.tbody.find("tr[data-uid='" + view[i].uid + "']")
					.addClass("k-state-selected")
					.find(".checkbox")
					.attr("checked","checked");
				}
			}
		}
	} //end if length

	Number.prototype.format_currency = function(n, x, s, c) {
		 var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
			 num = this.toFixed(Math.max(0, ~~n));
		
		return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ''));
	};

	jQuery('.profit-percent-inquiries').change(function(){
		var percent 	= jQuery(this).val();
		var type 		= jQuery(this).attr('type');
		var arrid 		= jQuery('#ArrID').attr('value');
		var inquiry_id 	= jQuery('#ArrID').attr('inquiry_id');

		jQuery.ajax({
			url: '/inquiries/set_profit_inquiries',
			type: "POST",
			data: {"percent": percent,"arrid": arrid,"inquiry_id": inquiry_id,'type': type},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				var result = jQuery.parseJSON(response);
				var grid = $('#grid_quotation').data("kendoGrid");
				grid.dataSource.data(result.data);
				grid.dataSource.refresh;

				var total = result.total;
				total = total.format(2, 3, '', '');
				jQuery("#sub-total-inquiries").attr('value',total);
				// commission
				var c = jQuery("#commission-inquiry").val();
				var com = (total*c)/100; com = com.format(2, 3, '', '');
				jQuery("#amount-commission").attr('value',com);
				// add_commission
				var a_c = jQuery("#add-commission-inquiry").val();
				var a_com = (total*a_c)/100;  a_com = a_com.format(2, 3, '', '');
				jQuery("#amount-add-commission").attr('value',a_com);
				// discount
				var d = jQuery("#discount-inquiry").val();
				var dc = (total*d)/100; dc = dc.format(2, 3, '', '');
				jQuery("#amount-discount").attr('value',dc);
				var t = 0;
				jQuery.each(jQuery('.excost'), function(i, v) {
					var cost = jQuery(this).html();
					t = parseInt(t) + parseInt(cost);
				});
				var grand = parseFloat(total)+parseFloat(t)+parseFloat(com)+parseFloat(a_com)-parseFloat(dc);
				jQuery("#grand_total_inquiries").attr('value',grand.format(2, 3, '', ''));
				return;
			},
			error:function(res) {
				alert('Error!');
				jQuery("#loader").fadeOut();
			}
		}); // end ajax
		
	});

	// if ($("#grid_quotation2").length){
	// 	var sampleData = jQuery('#grid_quotation2').data('room');
	// 	var sampleDataNextID = sampleData.length + 1;
	// 	var dataSource = new kendo.data.DataSource({
	// 		transport: {
	// 			read: function (e) {
	// 				e.success(sampleData);
	// 			},
	// 			update: function (e) {
	// 				sampleData[getIndexById(e.data.ProductID)] = e.data;
	// 				e.success();
	// 				jQuery.ajax({
	// 					url: '/inquiries/update_inq2',
	// 					type: 'POST',
	// 					data: {"data":e.data},
	// 					dataType: 'html',
	// 					cache: false,
	// 					beforeSend: function(){
	// 						jQuery("#loader").fadeIn();
	// 					},
	// 					success: function(response){
	// 						sampleData = jQuery.parseJSON(response);
	// 						var grid = $('#grid_quotation2').data("kendoGrid");
	// 						grid.dataSource.read();
	// 						grid.dataSource.refresh;
	// 						jQuery("#loader").fadeOut();
	// 						return false;
	// 					}
	// 				});
	// 			},
	// 			destroy: function (e) {
	// 				sampleData.splice(getIndexById(e.data.ProductID), 1);
	// 				e.success();
	// 				jQuery.ajax({ 
	// 					url: '/inquiries/destroy_inq',
	// 					type: 'POST',
	// 					data: {"data":e.data},
	// 					dataType: 'html',
	// 					cache: false,
	// 					beforeSend: function(){jQuery("#loader").fadeIn();},
	// 					success: function(response){
	// 						jQuery("#loader").fadeOut();
	// 						e.success();
	// 						console.log(response);return;
	// 					}
	// 				});
	// 			}
	// 		},
	// 		error: function (e) {
	// 			// handle data operation error
	// 			alert("Status: " + e.status + "; Error message: " + e.errorThrown);
	// 		},
	// 		pageSize: 30,
	// 		batch: false,
	// 		schema: {
	// 			model: {
	// 				id: "ProductID",
	// 				fields: {
	// 					ProductID: { editable: false, nullable: true },
	// 					no: {editable: false},
	// 					name: {editable: false},
	// 					unit: {editable: false},
	// 					quantity: {editable: true},
	// 					supplier: {editable: false},
	// 					supp_u_p:  {editable: false},
	// 					supp_u_p_usd:  {editable: false},
	// 					profit:  {},
	// 					u_p:  {editable: false},
	// 					u_p_usd:  {editable: false},
	// 					f_total:  {editable: false},
	// 					f_total_usd:  {editable: false},
	// 					del_time: {editable: false},
	// 					del_time_final: {editable: false},
	// 					remark: {},
	// 				}
	// 			}
	// 		}
	// 	});

	// 	$("#grid_quotation2").kendoGrid({
	// 		dataSource: dataSource,
	// 		navigatable: true,
	// 		pageable: true,
	// 		toolbar: ["save", "cancel"],
	// 		columns: [
	// 			{ field: "no",editable: false, nullable: true, title: "S.No", width: "45px" },
	// 			{ field: "name", title: "Description", width: "200px" },
	// 			{ field: "unit", title:"Units", width: "70px" },
	// 			{ field: "quantity",title:"Quantity", width: "70px" },
	// 			{ field: "supplier",title:"Supplier", width: "120px" },
	// 			{ field: "supp_u_p",title:"Supp.U/P", width: "90px" },
	// 			{ field: "supp_u_p_usd",title:"Supp.U/P(USD)", width: "110px" },
	// 			{ field: "profit",title:"P(%)", width: "50px" },
	// 			{ field: "u_p",title:"U/Price", width: "70px" },
	// 			{ field: "u_p_usd",title:"U/Price(USD)", width: "110px" },
	// 			{ field: "f_total",title:"Final total", width: "90px" },
	// 			{ field: "f_total_usd",title:"Final total(USD)", width: "120px" },
	// 			{ field: "del_time",title:"Delivery Time(day)", width: "130px" },
	// 			{ field: "del_time_final",title:"Final Delivery Time", width: "130px" },
	// 			{ field: "remark",title:"Remark", width: "170px" },
	// 			{ command: ["destroy"], title: "&nbsp;", width: "100px" }
	// 		],
	// 		editable: true
	// 	});
	// }

	// jQuery('.btn-set-profit').click(function(){
	// 	var percent = jQuery('.profit2-percent-inquiries').val();
	// 	var arrid = jQuery('#ArrID').attr('value');
	// 	var inquiry_id = jQuery('#ArrID').attr('inquiry_id');
	// 	jQuery.ajax({ 
	// 		url: '/inquiries/set_profit_inquiry',
	// 		type: 'POST',
	// 		data: {"percent":percent,"arrid":arrid,"inquiry_id":inquiry_id},
	// 		dataType: 'html',
	// 		cache: false,
	// 		beforeSend: function(){jQuery("#loader").fadeIn();},
	// 		success: function(response){
	// 			jQuery("#loader").fadeOut();
	// 			var data = jQuery.parseJSON(response);
	// 			sampleData = data;
	// 			var grid = $('#grid_quotation2').data("kendoGrid");
	// 			grid.dataSource.read();
	// 			grid.dataSource.refresh;
	// 			toastr.success('Set profit successfully!');
	// 			return;
	// 		}
	// 	});
	// });

	// Plugin Fancybox
	jQuery('.fancyboxs').click(function(){
		var id = jQuery(this).attr('id');
		jQuery('.fancybox-thumbs-'+id).fancybox({
			nextClick 	: true,
			openEffect 	: 'elastic',
			openSpeed  	: 250,
			closeEffect : 'elastic',
			closeSpeed  : 250,
			helpers : {
				thumbs : {
					width  : 50,
					height : 50
				},
				overlay: {
					locked: false
				}
			}
		});
	});
	// Plugin Chosen
	// var config = {'.chosen-select': {}}
	// for (var selector in config) {
	// 	jQuery(selector).chosen(config[selector]);
	// }
	///

	});
	// Plugin icheck
	jQuery('input.icheck').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
		increaseArea: '20%'
	});

	jQuery('input.CheckboxAll').on('ifChecked', function(event){
		jQuery('input.Checkbox').iCheck('check');
		jQuery('table tbody').find("tr.row-cz").addClass('bg-table-row');
	}).on('ifUnchecked', function(event){
		jQuery('input.Checkbox').iCheck('uncheck');
		jQuery('table tbody').find("tr.row-cz").removeClass('bg-table-row');
	});

	jQuery('input.Checkbox').on('ifChecked', function(event){
		jQuery(this).iCheck('check');
		jQuery(this).parent().parent().parent().parent().parent().addClass('bg-table-row');
	}).on('ifUnchecked', function(event){
		jQuery(this).iCheck('uncheck');
		jQuery(this).parent().parent().parent().parent().parent().removeClass('bg-table-row');
	});

	// End Plugin icheck
	
	if (jQuery('.success, .error').length > 0) {
		setTimeout(function() {
			jQuery('.success, .error').fadeOut();
		}, 7000);
	}

	jQuery(".btn-trash-image").click(function(){
		jQuery('#ProductFile-input').val('');
		jQuery('#list').empty();
	});

	function ShowMyPictures(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			console.log(input);
			for (var i = 0, f; f = input.files[i]; i++) {
				// Only process image files.
				if (!f.type.match('image.*')) {	continue; }
				var reader = new FileReader();
				// Closure to capture the file information.
				reader.onload = (function(theFile) {
					return function(e) {
						// Render thumbnail.
						var span = document.createElement('span');
						span.innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
						jQuery('#list'+input.id).append(span);
						// document.getElementById(id1).insertBefore(span, null);
					};
				})(f);
				// Read in the image file as a data URL.
				reader.readAsDataURL(f);
			}
		}
	}

	jQuery("#imgInp, #ProductFile").change(function(){
		jQuery("#listProductFile").empty();
		ShowMyPictures(this);
	});

	jQuery('.row-cz td.text-center').click(function(){
		jQuery(this).parent().next().toggleClass('hidden');
	});

	//stop jumping to top of page in jQuery
	jQuery('ul.pagination a').click(function(e){
		e.preventDefault();
	});
	
	// ######   default_cz  ###### //

	jQuery('.chbox-actived-controller').click(function(){
		var id = jQuery(this).attr('aco_id');
		var checked = (jQuery(this).is(':checked') == true)? "1": "0";
		jQuery.ajax({
			url: "/Users/ActiveControler",
			type: "POST",
			data: {id: id, checked: checked},
			dataType: "html",
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				alert(response);
			},
			error:function() {
				alert('The will never work');
			}
		}); // end ajax
	});
	
	jQuery('.ChboxPA').click(function(){
		var aco_id  = jQuery(this).attr('aco_id');
		var aro_id  = jQuery(this).attr('aro_id');
		var checked = (jQuery(this).is(':checked') == true)? "1": "-1";
		jQuery.ajax({
			url: "/Users/permission",
			type: "POST",
			data: {aco_id: aco_id, aro_id: aro_id, checked: checked},
			dataType: "html",
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				alert(response);
			},
			error:function() {
				alert('The will never work');
			}
		}); // end ajax
	});

	jQuery('button.btn-add-group').click(function(){
		var name = jQuery('#AddGroupName').val();
		if (name != '') {
			jQuery.ajax({
				url: "/groups/add",
				type: "POST",
				data: {name: name},
				dataType: "html",
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					// console.log(response);
					var data = jQuery.parseJSON(response);
					if (data.status == true) {
						jQuery('select#UserGroupId').append("<option value='"+data.id+"'>"+name+"</option>"); 
						toastr.success(data.message);
						jQuery('#myModal2').modal('toggle');
					} else {
						toastr.error(data.message);
					}
				},
				error:function(res) {
					alert('Error!');
				}
			}); // end ajax
		} else {
			toastr.error('Please fill to fields!');
		}
	});

	jQuery('#btn-add-categories').click(function(){
		var name 	  = jQuery('#category-name').val();
		var parent_id = jQuery('#category-parent').val();
		jQuery.ajax({
			url: '/categories/add',
			type: 'POST',
			data: {name: name, parent_id: parent_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				var data = jQuery.parseJSON(response);
				if(data.status == true){
					jQuery( '#PCategorie_Id' ).append(new Option(name, data.id));
					jQuery( '#PCategorie_Id' ).val(data.id);
					jQuery('#myModal2').modal('toggle');
					toastr.success(data.message);
				}else {
					toastr.error(data.message);
				}
			}
		});
	});

	jQuery('#btn-add-outlet').click(function(){
		// Add Outlet or Supplier in Product/index 
		var name = jQuery('#outlet-name').val();
		var tel = jQuery('#outlet-tel').val();
		var address = jQuery('#outlet-address').val();
		jQuery.ajax({
			url: '/products/addsomething',
			type: 'POST',
			data: {key: 'outlet', name: name,tel: tel,address: address},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				var data = jQuery.parseJSON(response);
				if(data.status == true){
					jQuery( '#POutlet_Id' ).append(new Option(name, data.id));
					jQuery( '#POutlet_Id' ).val(data.id);
					jQuery( '#myModalOutlet' ).modal('toggle');
					toastr.success(data.message);
				}else {
					toastr.error(data.message);
				}
			}
		});
	});

	jQuery('#btn-add-supplier').click(function(){
		var name = jQuery('#supplier-name').val();
		var code = jQuery('#supplier-code').val();
		if (code != '') {
			jQuery.ajax({
				url: '/products/addsomething',
				type: 'POST',
				data: {key: 'supplier', code: code, name: name},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					var data = jQuery.parseJSON(response);
					if(data.status == true){
						jQuery( '#PSupplier_Id' ).append(new Option(name, data.id));
						jQuery( '#PSupplier_Id' ).val(data.id);
						jQuery('#myModalSupplier').modal('toggle');
						toastr.success(data.message);
					}else {
						toastr.error(data.message);
					}
				}
			});
		} else {
			alert('code empty');
		}
	});
	
	jQuery("#search-sku").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var sku = jQuery("#search-sku").val();
			var page = 1;
			var data = {type: 'sku', value: sku, str_rand: str_rand, page: page};
			search_product(data, str_rand, page);
		}
	});

	jQuery("#search-product-name").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var sku = jQuery("#search-product-name").val();
			var page = 1;
			var data = {type: 'product_name', value: sku, str_rand: str_rand, page: page};
			search_product(data, str_rand, page);
		}
	});  

	jQuery('input[name="demo-radio"]').on('ifClicked', function (event) {
		var id = jQuery(this).attr('cid');
		var page = 1;
		var data = {type: 'categories', value:'categories' , id: id, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	jQuery('input[name="price-radio"]').on('ifClicked', function (event) {
		var price = jQuery('#range_03').val();
		var type = jQuery(this).attr('rel');
		var page = 1;
		var data = {type: type, value:'radio', price: price, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});
	jQuery('#range_03').change(function(){
		//retail_price
		delay(function(){
			var price = jQuery('#range_03').val();
			// var type = 'retail_price';
			var page = 1;
			var data = {type: 'retail_price', value:'radio', price: price, str_rand: str_rand, page: page};
			console.log(data);
			search_product(data, str_rand, page);
		}, 100 );
	});

	jQuery("#search-users").change(function(){
		var user_id = jQuery(this).val();
		var page = 1;
		var data = {type: 'user_id', value:'radio', user_id: user_id, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	jQuery("#search-suppliers").change(function(){
		var supplier_id = jQuery(this).val();
		var page = 1;
		var data = {type: 'supplier_id', value:'radio', supplier_id: supplier_id, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	jQuery("#search-active").change(function(){

		var actived = jQuery(this).val();
		var page = 1;
		var data = {type: 'actived', value:'actived', actived: actived, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	function search_product(data, str_rand) {
		jQuery.ajax({
			url: '/products/search_product',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('tbody#products-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	}

	jQuery('.products-pagination').click(function(e){
		e.preventDefault();
		var page = jQuery(this).text();
		var limit = jQuery('ul.pagination').attr('limit');
		jQuery('ul.pagination li').removeClass('active');
		jQuery('.pages-'+page).addClass('active');
		var data = {page: page, limit: limit, str_rand: str_rand};
		jQuery.ajax({
			url: '/products/pagination_products',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				// console.log('response');
				jQuery("#loader").fadeOut();
				jQuery('tbody#products-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	});

	jQuery('.deletePI').click(function(){
		var id = jQuery(this).attr('id');
		jQuery.ajax({
			url: '/products/delete_image',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				jQuery('.show-image-'+id).fadeOut();
			}
		});
	});

	jQuery('.deactive-product').click(function(){
		var id = jQuery(this).attr('id');
		var actived = jQuery(this).attr('actived');
		if (actived == 1) {
			jQuery(this).attr('actived',0).removeClass('btn-info').addClass('btn-primary').empty().append('<i class="fa fa-lock" aria-hidden="true"></i> Dective');
			jQuery('.actived-product-'+id).html('<span class="label label-primary">Active</span>');
		} else {
			jQuery(this).attr('actived',1).removeClass('btn-primary').addClass('btn-info').empty().append('<i class="fa fa-unlock" aria-hidden="true"></i> Active');
			jQuery('.actived-product-'+id).html('<span class="label label-danger">Deactive</span>');
		}
		jQuery.ajax({
			url: '/products/deactive_product',
			type: 'POST',
			data: {actived: actived, id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				var data = jQuery.parseJSON(response);
				if (data.actived == true) {
					toastr.success(data.message);
				} else {
					toastr.error(data.message);
				}
			}
		});
	});

	jQuery(".customer-search").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var tbl = jQuery(this).attr('tbl');
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '/customers/search',
				type: 'POST',
				data: {key: key, tbl: tbl, str_rand: str_rand},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					// console.log(response);
					jQuery('tbody#customers-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		}
	});

	jQuery(".suppliers-search").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var tbl = jQuery(this).attr('tbl');
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '/suppliers/search',
				type: 'POST',
				data: {key: key, tbl: tbl, str_rand: str_rand},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					// console.log(response);
					jQuery('tbody#suppliers-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		}
	});

	jQuery(".partner-delivery-search").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var tbl = jQuery(this).attr('tbl');
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '/PartnerDeliverys/search',
				type: 'POST',
				data: {key: key, tbl: tbl, str_rand: str_rand},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					// console.log(response);
					jQuery('tbody#partnerDeliverys-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		}
	});
	
	jQuery('#date-range').click(function(e) {  
		var keyword = jQuery('input[name="daterange"]').val();
	});

	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	jQuery('input[name="search-product-stock"]').keyup(function() { 
		var deny = new Array();
		jQuery.each(jQuery('.sku-product-stocks'), function(i, v) {
			var id = jQuery(this).attr('id');
			deny.push(id);
		});
		var keyword = jQuery(this).val();
		delay(function(){
			jQuery.ajax({
				url: '/products/search_stocks',
				type: 'POST',
				data: {keyword: keyword, deny: deny},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
					jQuery('#slimtest1').empty();
					jQuery('.result-search-stock').show();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.result-search-stock').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						stock_products();
					});
				}
			}); // Ajax
		}, 300 );
	});

	jQuery('#DiscountOnOrder').change(function(){
		var discount = jQuery(this).val();
		var viewprice = jQuery('#ViewPrice').html();
		var result = (parseInt(discount) / 100) * parseInt(viewprice);
		var pay_for_supplier = parseInt(viewprice-result);
		jQuery('#PayRefund').html(pay_for_supplier);
	});

	jQuery('#btn-add-product-stock').click(function(){
		var product_name = jQuery('#name-product-stock').val(); 
		var categorie_id = jQuery('#categorie-product-stock').val(); 
		var supply_price = jQuery('#retail-price-product-stock').val(); 
		jQuery.ajax({
			url: '/products/addsomething',
			type: 'POST',
			data: {key: 'products', product_name: product_name, categorie_id: categorie_id,supply_price	: supply_price	},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				var data = jQuery.parseJSON(response);
				if (data.status == true) {
					jQuery('#stocks-details').append('<tr class="cursor-pointer product-stock-order" id="'+data.id+'" pid="'+data.pid+'"><td style="width:1px;" class="text-center delete-sp">X</td><td class="text-center"><span class="sku-product-stocks" id="'+data.pid+'">P.'+data.sku+'</td><td class="text-center">'+product_name+'</td><td class="text-center ISKA1"><input type="number" value="'+supply_price+'" id="'+data.id+'" class="form-control price-product price-product-'+data.id+'" name=""></td><td class="text-center ISKA"><input type="number" value="1" id="'+data.id+'" class="form-control quantity-product-'+data.id+' quantity-product" name=""></td><td class="text-center ISKA"><input type="number" value="0" id="'+data.id+'" class="form-control discount-product-'+data.id+' discount-product" name=""></td><td class="text-center width200px"><span class="total-price total-'+data.id+'">'+supply_price+'</td></tr>')
					jQuery.getScript('/js/show_action.js',function(){
						add_product_stocks(data.id);
					});
					jQuery( '#AddSP' ).modal('toggle');
					jQuery('#name-product-stock, #retail-price-product-stock').val('');
					toastr.success(data.message);
				} else {
					toastr.error(data.message);
				}
			}
		});
	});
	
	jQuery('#btn-complete-stock').click(function(){
		var stocks			= new Array();
		var products		= new Array();
		var supplier		= jQuery('#supplier').val();
		var payment 		= jQuery('#payment').val();
		var users			= jQuery('#users').val();
		var create			= jQuery('#create').val();
		var TotalQuantity 	= jQuery("#TotalQuantity").html();
		var ViewPrice		= jQuery("#ViewPrice").html();
		var DiscountOnOrder = jQuery('#DiscountOnOrder').val();
		var TotalPrice		= jQuery("#PayRefund").html();
		jQuery.each(jQuery('.product-stock-order'), function(i, v) {
			var id			= jQuery( this ).attr('id');
			var pid 		= jQuery( this ).attr('pid');
			var price		= jQuery('.price-product-'+id).val();
			var quantity	= jQuery('.quantity-product-'+id).val();
			var discount	= jQuery('.discount-product-'+id).val();
			products.push({'id':pid,'price':price,'quantity':quantity,'discount':discount});
		});
		stocks.push({'supplier_id':supplier, 'payment':payment, 'user_id':users, 'created':create, 'total_quantity':TotalQuantity, 'total_price':ViewPrice, 'discount_stock':DiscountOnOrder, 'final_price':TotalPrice });
		jQuery.ajax({
			url: '/stocks/add_stocks',
			type: 'POST',
			data: {products: products, stocks: stocks},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				console.log(response);return;
				window.location.href = "/stocks";
			}
		});
	});

	// jQuery('button#btn-date-range').click(function(){
	// 	var keyword = jQuery('input[name="daterange"]').val();
	// 	var data = {type: 'created', keyword: keyword, str_rand: str_rand};
	// 	search_stocks(data, str_rand);
	// });

	jQuery('#saveInvoice').click(function(){
		var invoices		= new Array();
		var products		= new Array();
		var customer_id 	= jQuery('#customers').val();
		var user_id 		= jQuery('#users').val();
		var note 			= jQuery('#note').val();
		var total 			= format_cal(jQuery('#total-bill').html());
		var discount 		= jQuery('.discount-bill').val();
		var customers_paid 	= format_cal(jQuery('#customers-paid').html());
		var return_money 	= format_cal(jQuery('#return-money').html());
		var money 			= format_cal(jQuery('.money').val());
		var radio 			= jQuery('input[name="billradio"]:checked').attr('cid');
		jQuery.each(jQuery('.product-order'), function(i, v) {
			var product_id	= jQuery( this ).attr('id');
			var quantity	= jQuery(this).find('.qty-item').val();
			var price 		= jQuery('.price-item-'+product_id).attr('rel');
			products.push({'product_id':product_id,'quantity': quantity,'price': price});
		});
		invoices.push({'status':1,'customer_id':customer_id,'user_id': user_id,'total': total,'discount':discount,'customers_paid': customers_paid, 'money': money,'return_money': return_money,'radio': radio });
		jQuery.ajax({
			url: '/invoices/add',
			type: 'POST',
			data: {products: products, invoices: invoices},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				window.location.href = "/invoices";
			}
		});
	});
	// ## Search Stock ##//
	jQuery(".stock-search-sl").change(function(){
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		var data = {type: type, keyword: keyword, str_rand: str_rand};
		search_stocks(data, str_rand);
	});

	jQuery(".stock-search").bind('blur keyup',function(e) {  
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		if (e.type == 'blur' || e.keyCode == '13') {
			var data = {type: type, keyword: keyword, str_rand: str_rand};
			search_stocks(data, str_rand);
		}
	});

	function search_stocks(data, str_rand) {
		jQuery.ajax({
			url: '/stocks/search_stocks',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				jQuery('tbody#stocks-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	}
	// ## End Search Stock ## //
	// ## Search Invoice ## //
	jQuery(".invoice-search-sl").change(function(){
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		var data = {type: type, keyword: keyword, str_rand: str_rand};
		search_invoices(data, str_rand);
	});

	jQuery(".invoice-search").bind('blur keyup',function(e) {  
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		if (e.type == 'blur' || e.keyCode == '13') {
			var data = {type: type, keyword: keyword, str_rand: str_rand};
			search_invoices(data, str_rand);
		}
	});

	function search_invoices(data, str_rand) {

		jQuery.ajax({
			url: '/invoices/search_invoices',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				jQuery('tbody#invoices-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	}
	// ## End Search Invoice ## //

	jQuery("#range_stocks").ionRangeSlider({
		type: "double",
		grid: true,
		min: 0,
		max: 10000000,
		from: 100,
		to: 1000,
		prefix: "$",
		onChange: function ( obj ) {
			delay(function(){
				var str_rand = Math.random().toString(36).substring(7);
				var data = {type: 'final_price', keyword_s: obj.from,keyword_e: obj.to, str_rand: str_rand};
				search_stocks(data, str_rand);
				console.log(data);
			}, 500 );
		}
	});

	jQuery("#range_invoices").ionRangeSlider({
		type: "double",
		grid: true,
		min: 0,
		max: 10000000,
		from: 100,
		to: 1000,
		prefix: "$",
		onChange: function ( obj ) {
			delay(function(){
				var str_rand = Math.random().toString(36).substring(7);
				var data = {type: 'total', keyword_s: obj.from,keyword_e: obj.to, str_rand: str_rand};
				search_invoices(data, str_rand);
				console.log(data);
			}, 500 );
		}
	});

	jQuery('.stocks-detail').click(function() {
		var id = jQuery(this).attr('id');
		var pid = jQuery(this).attr('pid');
		jQuery.ajax({
			url: '/stocks/stocks_detail',
			type: 'POST',
			data: {id: id, pid: pid},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery.getScript('/js/assets/plugins/autoNumeric/autoNumeric.js');
				jQuery('.modal-Stocks').html(response);
				jQuery('#modalStocks').modal('show'); 
			}
		});
	});

	jQuery('.invoices-detail').click(function() {
		var id = jQuery(this).attr('id');
		jQuery.ajax({
			url: '/invoices/invoice_detail',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery.getScript('/js/assets/plugins/autoNumeric/autoNumeric.js');
				jQuery('.modal-Stocks').html(response);
				jQuery('#modalStocks').modal('show'); 
			}
		});
	});
	function format_show(num) {
		var num = num.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
		return num;
	}
	
	function format_cal(num) {
		var num = parseInt(num.replace(/\,/g , ""));
		return num;
	}
	function final_money(argument) {
		var price = 0;
		jQuery.each(jQuery('.total-price-item'), function(i, v) {
			price = format_cal(jQuery(this).html())+parseInt(price);
		});
		var dB 	= jQuery('.discount-bill').val();
		var total = parseInt(price - price_discount(dB, price));
		var final_price 	= format_show(price);
		var customers_paid 	= format_show(total);
		jQuery('#customers-paid').html(customers_paid);	
		jQuery('#total-bill').html(final_price);
		jQuery('.money').val(customers_paid);	
		jQuery('#return-money').html('0');
	}

	function price_discount(percent, price) {
		var result = (parseInt(percent) / 100) * parseInt(price);
		return result;
	}
	
	var myarr = new Array();
	jQuery.each(jQuery('.product-order'), function(i, v) {
		var id	= jQuery( this ).attr('id');
		if (jQuery.inArray(id, myarr) < 0) {
			myarr.push(id);
		}
	});
	function zeroFill( number, width ){
		width -= number.toString().length;
		if ( width > 0 ){
			return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
		}
		return number + "";
	}

	jQuery('li.item-products').click(function(){
		var id 				= jQuery(this).attr('id');
		var sku 			= zeroFill(id,5);
		var price 			= format_cal((jQuery(this).find('.products-price').html()));
		var price_show 		= format_show(price);
		var product_name 	= jQuery(this).find('.title-product-sale span').html();
		if (jQuery.inArray(id, myarr) < 0) {
			myarr.push(id);
			jQuery('#list-items').append('<tr class="product-order" product_name="'+product_name+'" id="'+id+'"><td class="width1 delete-item cursor-pointer">x</td><td class="sku-item">SP.'+sku+'</td><td class="product_name">'+product_name+'</td><td class="width20"><span class="price-item-'+id+'" rel="'+price+'">'+price_show+'</span></td><td class="width10"><input type="number" class="form-control width90 qty-item" id="'+id+'" value="1"></td><td class="width15"><span class="text-center total-price-item total-price-item-'+id+'">'+price_show+'</span></td></tr>');
		}
		final_money();
		jQuery('.qty-item').change(function(){
			var id_item 	= jQuery(this).attr('id');
			var qty 		= jQuery(this).val();
			var price_item 	= format_cal(jQuery('.price-item-'+id_item).html());
			var total 		= format_show(parseInt(price_item*qty));
			jQuery('.total-price-item-'+id_item).html(total);
			final_money();
		});
		jQuery('.delete-item').click(function(){
			jQuery(this).parent().remove().fadeOut();
			final_money();SaveInvoiceInfo();
		});
		SaveInvoiceInfo();
	});

	jQuery('.delete-item').click(function(){
		jQuery(this).parent().remove().fadeOut();
		final_money();SaveInvoiceInfo();
	});

	jQuery('input.discount-bill').change(function(){
		final_money();
		SaveInvoiceInfo();
	});

	function SaveInvoiceInfo(argument) {
		var invoices		= new Array();
		var products		= new Array();
		var customer_id 	= jQuery('#customers').val();
		var user_id 		= jQuery('#users').val();
		var note 			= jQuery('#note').val();
		var total 			= format_cal(jQuery('#total-bill').html());
		var discount 		= jQuery('.discount-bill').val();
		var customers_paid 	= format_cal(jQuery('#customers-paid').html());
		var return_money 	= format_cal(jQuery('#return-money').html());
		var money 			= format_cal(jQuery('.money').val());
		var radio 			= jQuery('input[name="billradio"]:checked').attr('cid');
		jQuery.each(jQuery('.product-order'), function(i, v) {
			var product_id	= jQuery( this ).attr('id');
			var product_name= jQuery( this ).attr('product_name');
			var quantity	= jQuery(this).find('.qty-item').val();
			var price 		= jQuery('.price-item-'+product_id).attr('rel');
			products.push({'product_id':product_id,'product_name':product_name,'quantity': quantity,'price': price});
		});
		invoices.push({'status':1,'customer_id':customer_id,'user_id': user_id,'total': total,'discount':discount,'customers_paid': customers_paid, 'money': money,'return_money': return_money,'radio': radio });
		jQuery.ajax({
			url: '/invoices/save_info_invoices',
			type: 'POST',
			data: {products: products, invoices: invoices},
			dataType: 'html',
			cache: false,
		});
	}
	jQuery(".money").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var pain = format_cal(jQuery('#customers-paid').html());
			var money =  format_cal(jQuery(this).val());
			var rm = format_show(parseInt(pain) - parseInt(money));
			jQuery('#return-money').html(rm);
			SaveInvoiceInfo();
		}
	});

	jQuery("#AddCustomerSales").on('submit',(function(event) {
		event.preventDefault();
		var name = jQuery("#CustomersName").val();
		jQuery.ajax({
			url: '/customers/add',
			type: 'POST',
			data: {name: name},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery( '#customers' ).append(new Option(name, response));
				jQuery( '#customers' ).val(response);
				jQuery( '#myModal2' ).modal('toggle');
				toastr.success(response);
				// console.log(response);
			}
		});
	}));

	jQuery('.link').click(function(){
		var id = jQuery(this).attr('id');
		jQuery('.popUpShow-'+id).toggleClass('block');
	});

	jQuery('.del-stockproducts').click(function(){
		var id = jQuery(this).attr('sid');
		var stockproducts = new Array();
		jQuery.each(jQuery('.sp-chbox-'+id), function(i, v) {
			if (jQuery(this).is(':checked') == true) {
				var stock_product_id = jQuery( this ).attr('spid');
				stockproducts.push({'stock_product_id':stock_product_id});
				jQuery('.stock_products_'+stock_product_id).fadeOut().remove();
			}
		});
		jQuery.ajax({
			url: '/stocks/delete_stock_product',
			type: 'POST',
			data: {stockproducts: stockproducts, id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				toastr.success('The stock has been deleted.');
				window.location.href = "/stocks";
				// console.log(response);
			}
		});
	});
	
	jQuery('.del-invoice-products').click(function(){
		var invoice_id = jQuery(this).attr('invoice_id');
		var invoice_products = new Array();
		jQuery.each(jQuery('.invoice-product-chbox-'+invoice_id), function(i, v) {
			if (jQuery(this).is(':checked') == true) {
				var invoice_product_id = jQuery( this ).attr('invoice-product-id');
				invoice_products.push({'invoice_product_id':invoice_product_id});
				jQuery('.stock_products_'+invoice_product_id).fadeOut().remove();
			}
		});
		jQuery.ajax({
			url: '/invoices/delete_invoice_product',
			type: 'POST',
			data: {invoice_products: invoice_products, invoice_id: invoice_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				toastr.success('The Invoices has been deleted.');
				window.location.href = "/invoices";
				// console.log(response);
			}
		});
	});
	
	jQuery('.live-search-box').change(function(){
		var key = jQuery(this).val();
		var searchTerm = jQuery(this).val().toLowerCase();
		if (searchTerm == '0') {
			jQuery('.active-categories-0').removeClass('hidden');
			jQuery('.active-categories-1').addClass('hidden');
		} else if(searchTerm == '1') {
			jQuery('.active-categories-1').removeClass('hidden');
			jQuery('.active-categories-0').addClass('hidden');
		} else {
			jQuery('.active-categories-0').removeClass('hidden');
			jQuery('.active-categories-1').removeClass('hidden');
		}
	}); // end class
	$('#search-ignore').hideseek({
		highlight: true,
		ignore: '.ignore'
	});
	// jQuery("#search-menu-name").bind('blur keyup',function(e) {  
	// 	if (e.type == 'blur' || e.keyCode == '13')  {
	// 		var keyword = jQuery(this).val();

	// 		jQuery.ajax({
	// 			url: '/categories/search_categories',
	// 			type: 'POST',
	// 			data: {keyword: keyword},
	// 			dataType: 'html',
	// 			cache: false,
	// 			beforeSend: function(){
	// 				jQuery("#loader").fadeIn();
	// 			},
	// 			success: function(response){
	// 				jQuery("#loader").fadeOut();
	// 				jQuery('#categories-result').html(response);
	// 				// jQuery.getScript('/js/show_action.js',function(){
	// 				// 	stock_products();
	// 				// });
	// 			}
	// 		}); // Ajax
	// 	}
	// });
	jQuery('.btn-remove-invp').click(function(){
		var id = jQuery(this).attr('product_id');
		var r = confirm("Press a button!");
		if (r == true) {
			jQuery(this).parent().parent().fadeOut();
			jQuery.ajax({
				url: '/invoices/del_items',
				type: 'POST',
				data: {id: id},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
				}
			});
		}
	});

	jQuery('.show-detail-product').click(function(){
		var product_id = jQuery(this).attr('id');
		jQuery.ajax({
			url: '/products/get_detail_products',
			type: 'POST',
			data: {product_id: product_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				jQuery( '.modal-x' ).html('').append(response);
				jQuery( '#ModalX' ).modal('toggle');
			}
		}); // Ajax
	});

	jQuery('.profit-jobs').change(function(){
		var id 				= jQuery(this).attr('id');
		var price 			= jQuery('.cart-price-'+id).attr('price');
		var delivery_cost 	= jQuery('.delivery_cost_'+id).val();
		var packing_cost 	= jQuery('.packing_cost_'+id).val();
		var insurance_cost 	= jQuery('.insurance_cost_'+id).val();
		var cp 				= parseFloat(price)+ parseFloat(delivery_cost)+parseFloat(packing_cost)+ parseFloat(insurance_cost);
		var profit 			= parseFloat(jQuery(this).val()).toFixed(2);
		var pp 				= (parseFloat(price) * profit)/100 ;
		var total 			= parseFloat(cp)+ parseFloat(pp);
		var f_pp 			= format_show(pp);
		var f_total 		= format_show(total);
		jQuery('.price-profit-'+id).html(pp);
		jQuery('.total-price-'+id).html(total);
	});

	jQuery('.delivery_cost').change(function(){
		var id 		= jQuery(this).attr('id');
		var price 	= jQuery('.cart-price-'+id).attr('price');
		var delivery_cost 	= jQuery(this).val();
		var packing_cost 	= jQuery('.packing_cost_'+id).val();
		var insurance_cost 	= jQuery('.insurance_cost_'+id).val();
		var cp = parseFloat(price)+ parseFloat(delivery_cost)+parseFloat(packing_cost)+ parseFloat(insurance_cost);
		// alert(price+"__"+delivery_cost+"__"+packing_cost+"__"+insurance_cost);return;
		var profit 	= parseFloat(jQuery('.profit-jobs-'+id).val()).toFixed(2);
		var pp 		= (parseFloat(price) * profit)/100 ;
		var total 	= parseFloat(cp)+ parseFloat(pp);
		var f_total = format_show(total);
		jQuery('.total-price-'+id).html(total);
	});

	jQuery('input[name="del-cost"]').on('ifClicked', function (event) {
		var index = jQuery(this).attr('tabindex');
		var id 				= jQuery(this).attr('id');
		if (index == '2002') {
			jQuery('.delivery_cost_'+id).removeClass('hidden');
			// jQuery('.remark_delivery_'+id).removeClass('hidden');
		} else {
			jQuery('.delivery_cost_'+id).addClass('hidden');
			// jQuery('.remark_delivery_'+id).addClass('hidden');
		}
		var price 			= jQuery('.cart-price-'+id).attr('price');
		// var delivery_cost 	= jQuery(this).attr('value');
		var delivery_cost 	= jQuery(this).val();
		var packing_cost 	= jQuery('.packing_cost_'+id).val();
		var insurance_cost 	= jQuery('.insurance_cost_'+id).val();
		var cp = parseFloat(price)+ parseFloat(delivery_cost)+parseFloat(packing_cost)+ parseFloat(insurance_cost);
		// alert(price+"__"+delivery_cost+"__"+packing_cost+"__"+insurance_cost);return;
		var profit 	= parseFloat(jQuery('.profit-jobs-'+id).val()).toFixed(2);
		var pp 		= (parseFloat(price) * profit)/100 ;
		var total 	= parseFloat(cp)+ parseFloat(pp);
		var f_total = format_show(total);
		jQuery('.total-price-'+id).html(total);
		jQuery('.delivery_cost_'+id).val(delivery_cost);
		
	});

	jQuery('.packing_cost').change(function(){
		var id 		= jQuery(this).attr('id');
		var price 	= jQuery('.cart-price-'+id).attr('price');
		var delivery_cost 	= jQuery('.delivery_cost_'+id).val();
		var packing_cost 	= jQuery(this).val();
		var insurance_cost 	= jQuery('.insurance_cost_'+id).val();
		var cp = parseFloat(price)+ parseFloat(delivery_cost)+parseFloat(packing_cost)+ parseFloat(insurance_cost);
		// alert(price+"__"+delivery_cost+"__"+packing_cost+"__"+insurance_cost);return;
		var profit 	= parseFloat(jQuery('.profit-jobs-'+id).val()).toFixed(2);
		var pp 		= (parseFloat(price) / 100) * profit;
		var total 	= parseFloat(cp)+ parseFloat(pp);
		var f_total = format_show(total);
		jQuery('.total-price-'+id).html(total);
	});

	jQuery('.insurance_cost').change(function(){
		var id 		= jQuery(this).attr('id');
		var price 	= jQuery('.cart-price-'+id).attr('price');
		var delivery_cost 	= jQuery('.delivery_cost_'+id).val();
		var packing_cost 	= jQuery('.packing_cost_'+id).val();
		var insurance_cost 	= jQuery(this).val();
		var cp = parseFloat(price)+ parseFloat(delivery_cost)+parseFloat(packing_cost)+ parseFloat(insurance_cost);
		// alert(price+"__"+delivery_cost+"__"+packing_cost+"__"+insurance_cost);return;
		var profit 	= parseFloat(jQuery('.profit-jobs-'+id).val()).toFixed(2);
		var pp 		= (parseFloat(price) / 100) * profit;
		var total 	= parseFloat(cp)+ parseFloat(pp);
		var f_total = format_show(total);
		jQuery('.total-price-'+id).html(total);
	});

	jQuery('.update-invoices').click(function(){
		var id 		= jQuery(this).attr('id');
		var delivery_cost 	= jQuery('.delivery_cost_'+id).val();
		var packing_cost 	= jQuery('.packing_cost_'+id).val();
		var insurance_cost 	= jQuery('.insurance_cost_'+id).val();
		var profit 			= jQuery('.profit-jobs-'+id).val();
		var note 			= jQuery('.remark_delivery_'+id).val();
		var price 			= jQuery('.cart-price-'+id).html();
		jQuery.ajax({
			url: '/invoices/update-invoices',
			type: 'POST',
			data: {id: id, profit: profit, delivery_cost: delivery_cost,packing_cost: packing_cost,insurance_cost: insurance_cost,note: note,price:price},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				location.reload();
				// toastr.success(response);
			}
		}); // Ajax
	});

	jQuery('.send-invoices-supplier').click(function(){
		var id 	= jQuery(this).attr('id');
		var user = jQuery(this).attr('user');
		jQuery.ajax({
			url: '/invoices/send-invoices-supplier',
			type: 'POST',
			data: {id: id, user: user},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				toastr.success(response);
			}
		}); // Ajax
	});

	function roundUp(n, l) {
		var newnumber = Math.round(n * Math.pow(10, l)) / Math.pow(10, l);
		return newnumber;
	}

	jQuery('.percent-commission-lx').change(function(){
		var total_price = jQuery('.grand-total').val();
		var percent = jQuery(this).val();
		var pc = roundUp((parseFloat(total_price) * percent)/ 100, 2);
		var pp = jQuery('.price-profit-lx').val();
		var pd = jQuery('.price-discount-lx').val();
		var fp = roundUp((parseFloat(pc) + parseFloat(total_price) + parseFloat(pp)) - parseFloat(pd),2);
		jQuery('.final-price').val(fp);
		jQuery('.price-commission-lx').val(pc);
	});

	jQuery('.price-commission-lx').change(function(){
		var total_price = jQuery('.grand-total').val();
		var price = jQuery(this).val();
		var pc = roundUp((parseFloat(price) / parseFloat(total_price))* 100, 2);
		var pp = jQuery('.price-profit-lx').val();
		var pd = jQuery('.price-discount-lx').val();
		var fp = roundUp((parseFloat(price) + parseFloat(total_price) + parseFloat(pp)) - parseFloat(pd),2);
		jQuery('.final-price').val(fp);
		jQuery('.percent-commission-lx').val(pc);
	});

	jQuery('.percent-discount-lx').change(function(){
		var total_price = jQuery('.grand-total').val();
		var percent = jQuery(this).val();
		var pd = roundUp((parseFloat(total_price) * percent)/ 100, 2);
		var pp = jQuery('.price-profit-lx').val();
		var pc = jQuery('.price-commission-lx').val();
		var fp = roundUp((parseFloat(pc) + parseFloat(total_price) + parseFloat(pp)) - parseFloat(pd),2);
		jQuery('.final-price').val(fp);
		jQuery('.price-discount-lx').val(pd);
	});

	jQuery('.price-discount-lx').change(function(){
		var total_price = jQuery('.grand-total').val();
		var price = jQuery(this).val();
		var pd = roundUp((parseFloat(price) / parseFloat(total_price))* 100, 2);
		var pp = jQuery('.price-profit-lx').val();
		var pc = jQuery('.price-commission-lx').val();
		var fp = roundUp((parseFloat(pc) + parseFloat(total_price) + parseFloat(pp)) - parseFloat(price),2);
		jQuery('.final-price').val(fp);
		jQuery('.percent-discount-lx').val(pd);
	});

	jQuery('.percent-profit-lx').change(function(){
		var total_price = jQuery('.grand-total').val();
		var percent = jQuery(this).val();
		var pp = roundUp((parseFloat(total_price) * percent)/ 100, 2);
		var pc = jQuery('.price-commission-lx').val();
		var pd = jQuery('.price-discount-lx').val();
		var fp = roundUp((parseFloat(pc) + parseFloat(total_price) + parseFloat(pp)) - parseFloat(pd),2);
		jQuery('.final-price').val(fp);
		jQuery('.price-profit-lx').val(pp);
	});

	jQuery('.price-profit-lx').change(function(){
		var total_price = jQuery('.grand-total').val();
		var price = jQuery(this).val();
		var pp = roundUp((parseFloat(price) / parseFloat(total_price))* 100, 2);
		var pd = jQuery('.price-discount-lx').val();
		var pc = jQuery('.price-commission-lx').val();
		var fp = roundUp((parseFloat(price) + parseFloat(total_price) + parseFloat(pc)) - parseFloat(pd),2);
		jQuery('.final-price').val(fp);
		jQuery('.percent-profit-lx').val(pp);
	});
	
	jQuery(".DeleteInqSupplier").click(function(event){
		var r = confirm("Are you sure you want to delete?");
		if (r == true) {
			var id_supp = jQuery(this).attr('id');
			jQuery('.myrowaxn-'+id_supp).remove();
			jQuery.ajax({
				url: '/inquiries/del_inq_supplier',
				type: 'POST',
				data: {"id": id_supp},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					// jQuery("#loader").fadeIn();
				},
				success: function(response){
					// jQuery("#loader").fadeOut();
					
				}
			}); // Ajax
		}
	});

	function kendo_ui_grid() {
		jQuery('#choose-all-inquiries').on('click',(function(event){
			var inquiry_id = jQuery(this).attr('inquiry');
			var supplier_id = jQuery(this).attr('supplier');
			jQuery.ajax({
				url: '/inquiries/choose_all',
				type: 'POST',
				data: {inquiry_id: inquiry_id,supplier_id:supplier_id},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.panel-supplier-details').removeClass('hidden');
					jQuery('.panel-supplier-details').html(response);
					kendo_ui_grid();
					jQuery('#presentation1').removeClass('active');
					jQuery('#presentation2').addClass('active');
					jQuery('#tab1').removeClass('active').removeClass('in');
					jQuery('#tab2').addClass('active').addClass('in');
					jQuery("#count-product-of-supp-"+supplier_id).html(jQuery("#inqSuppliers").attr('count'));
					
				}
			}); // Ajax
		}));
		
		jQuery('#form-choose-main').on('submit',(function(event) {
			event.preventDefault();
			var inquiry_id 	= jQuery(this).attr('inquiry');
			var supplier_id = jQuery(this).attr('supplier');
			var main 		= jQuery('#main').val();
			jQuery.ajax({
				url: '/inquiries/choose_main',
				type: 'POST',
				data: {inquiry_id: inquiry_id,supplier_id: supplier_id,main: main},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.panel-supplier-details').removeClass('hidden');
					jQuery('.panel-supplier-details').html(response);
					kendo_ui_grid();
					jQuery('#presentation1').removeClass('active');
					jQuery('#presentation2').addClass('active');
					jQuery('#tab1').removeClass('active').removeClass('in');
					jQuery('#tab2').addClass('active').addClass('in');
					jQuery("#count-product-of-supp-"+supplier_id).html(jQuery("#inqSuppliers").attr('count'));
				}
			}); // Ajax
		}));

		jQuery('#form-choose-number').on('submit',(function(event) {
			event.preventDefault();
			var inquiry_id 	= jQuery(this).attr('inquiry');
			var supplier_id = jQuery(this).attr('supplier');
			var num 		= jQuery('#num').val();
			jQuery.ajax({
				url: '/inquiries/choose_main',
				type: 'POST',
				data: {inquiry_id: inquiry_id,supplier_id: supplier_id,num: num},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.panel-supplier-details').removeClass('hidden');
					jQuery('.panel-supplier-details').html(response);
					kendo_ui_grid();
					jQuery('#presentation1').removeClass('active');
					jQuery('#presentation2').addClass('active');
					jQuery('#tab1').removeClass('active').removeClass('in');
					jQuery('#tab2').addClass('active').addClass('in');
					jQuery("#count-product-of-supp-"+supplier_id).html(jQuery("#inqSuppliers").attr('count'));
				}
			}); // Ajax
		}));

		jQuery("#SuppsInfo").on('submit',(function(event) {
				event.preventDefault();
				var name = jQuery("#supplier-pic-id option:selected").text();	
				var id = jQuery("#inqSuppliers").attr('val');	
				var currency = jQuery("#currency option:selected").text();
				var supplier_pic = jQuery("#supplier-pic-id option:selected").text();
				jQuery("#s_pic_"+id).html(supplier_pic);
				jQuery('#currency-'+id).html(currency);
				jQuery.ajax({
					url: "/inquiries/update_inquirie_supplier",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					beforeSend: function(){
						jQuery("#loader").fadeIn();
					},
					success: function(response){
						jQuery(".s_pic_"+id).html(name);
						jQuery("#loader").fadeOut();
						toastr.success(response);
						console.log(response);return;
					},
					error: function(response, status){
						jQuery("#loader").fadeOut();
					}
				});
		}));

		// console.log(response);
		jQuery('.delete-items').click(function(){
			jQuery(this).parent().parent().remove().fadeOut();
			var id = jQuery(this).attr('id');
			jQuery.ajax({
				url: '/inquiries/delete_item_supplier',
				type: 'POST',
				data: {id: id},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
				}
			}); // Ajax
		});

		if ($("#grid_inquiries_supplier").length){
			var sampleData = jQuery('#grid_inquiries_supplier').data('room');
			// console.log(sampleData);
			var sampleDataNextID = sampleData.length + 1;
			function getIndexById(id) {
				var idx,
				l = sampleData.length;
				for (var j=0; j < l; j++) {
					if (sampleData[j].ProductID == id) {
						return j;
					}
				}
				return null;
			}
			var dataSource = new kendo.data.DataSource({
				transport: {
					read: function (e) { e.success(sampleData);	},
					create: function (e) { e.data.ProductID = sampleDataNextID++; e.success(e.data); },
					update: function (e) {
							sampleData[getIndexById(e.data.ProductID)] = e.data;
							e.success();
							var id = jQuery('#inquiries').attr('inq');
							jQuery.ajax({
								url: '/inquiries/update_supplier_product',
								type: 'POST',
								data: {"data":e.data, "inquiry_id": id},
								dataType: 'html',
								cache: false,
								beforeSend: function(){
									jQuery("#loader").fadeIn();
								},
								success: function(response){
									jQuery("#loader").fadeOut();
									var grid = $('#grid_inquiries_supplier').data("kendoGrid");
									grid.dataSource.read();
									grid.dataSource.refresh;
									var data = jQuery.parseJSON(response);
									delay(function(){
										jQuery('#supps-total-'+data.id).html(data.total);
										jQuery('.supps-total-'+data.id).val(data.total);
									}, 300 );
									
								}
							});
							e.data.total_price = e.data.price*e.data.quantity;
					},
					
				},
				error: function (e) {
					alert("Status: " + e.status + "; Error message: " + e.errorThrown);
				},
				pageSize: 30,
				batch: false,
				schema: {
					model: {
						id: "ProductID",
						fields: {
							ProductID: { editable: false, nullable: true },
							choose: {editable: false},
							no: {},
							name: {},
							maker_type_ref: {},
							partno: {},
							unit: {editable: false},
							quantity: {},
							price: {},
							total_price: {editable: false},
							delivery_time: {},
							remark: {},
						}
					}
				}
			});

			var grid = $("#grid_inquiries_supplier").kendoGrid({
				dataSource: dataSource,
				navigatable: true,
				sortable: { mode: "single", allowUnsort: false },
				pageable: true,
				toolbar: ["save",{ template: '<button class="k-button" id="btn-delete-kendo"><span class="k-icon k-i-close"></span>Delete</button>' }],
				columns: [
					{ field: "choose",editable: false, nullable: true, title: "Choose", width: "35px" , template: "<input type='checkbox' class='checkbox' />" },
					{ field: "no", title: "#", width: "45px" , footerTemplate: CountItem},
					{ field: "name", title: "Description", width: "250px" },
					{ field: "maker_type_ref", title: "Maker/Type Ref", width: "150px" },
					{ field: "partno", title: "PartNo", width: "120px" },
					{ field: "unit", title:"Units", width: "70px" },
					{ field: "quantity",title:"Quantity", width: "70px" , footerTemplate: CountQty},
					{ field: "price",title:"Price", width: "70px",format: "{0:n}" , },
					{ field: "total_price",title:"T/Price", width: "70px",format: "{0:n}",footerTemplate: CountTotalPrice },
					{ field: "delivery_time",title:"Delivery Time(day)", width: "130px" },
					{ field: "remark",title:"Remark", width: "150px" },
					// { command: ["destroy"], title: "&nbsp;", width: "100px" }
				],
				editable: true
			}).data("kendoGrid");

			grid.table.on("click", ".checkbox" , selectRow);
			function CountItem() {
				var sum = sampleData.length;
				return sum;
			}
			function CountQty() {
				var qty = 0;
				for(var i in sampleData){
					qty = qty + parseInt(sampleData[i].quantity);
				}
				return qty;
			}
			function CountTotalPrice() {
				var total_price = 0;
				for(var i in sampleData){
					total_price = parseFloat(total_price) + parseFloat(sampleData[i].total_price);
				}
				return total_price;
			}

			$("#btn-delete-kendo").bind("click", function () {
				var ids = [];
				for(var i in checkedIds){ if(checkedIds[i]){ ids.push(i); }}
				jQuery.ajax({
					url: '/inquiries/delete_item_supplier',
					type: 'POST',
					data: {ids: ids},
					dataType: 'json',
					cache: false,
					beforeSend: function(){
						jQuery("#loader").fadeIn();
					},
					success: function(response){
						jQuery("#loader").fadeOut();
						console.log(response);
						var grid = $('#grid_inquiries_supplier').data("kendoGrid");
						grid.dataSource.data(response);
						grid.dataSource.refresh;
						return false;
					}
				}); // Ajax
			});
			var checkedIds = {};
			//on click of the checkbox:
			function selectRow() {
				var checked = this.checked,
				row = $(this).closest("tr"),
				grid = $("#grid_inquiries_supplier").data("kendoGrid"),
				dataItem = grid.dataItem(row);
				checkedIds[dataItem.id] = checked;
				if (checked) {
					//-select the row
					row.addClass("k-state-selected");
				} else {
					//-remove selection
					row.removeClass("k-state-selected");
				}
			}

			//on dataBound event restore previous selected rows:
			function onDataBound(e) {
				var view = this.dataSource.view();
				for(var i = 0; i < view.length;i++){
					if(checkedIds[view[i].id]){
						this.tbody.find("tr[data-uid='" + view[i].uid + "']")
						.addClass("k-state-selected")
						.find(".checkbox")
						.attr("checked","checked");
					}
				}
			}
		} //end if length
	}

	jQuery("#inquiries-details tr .main").click(function(){
		jQuery('.panel-supplier-details').addClass('hidden');
		jQuery("#inquiries-details tr").removeClass('tr-actived');
		jQuery(this).parent().addClass('tr-actived');
		var id = jQuery(this).parent().attr('id');
		jQuery.ajax({
			url: '/inquiries/get_supplier_details',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('.panel-supplier-details').removeClass('hidden');
				jQuery('.panel-supplier-details').html(response);
				kendo_ui_grid();
				jQuery(".close-id").click(function(){
					jQuery(this).parent().parent().toggleClass('hidden');
				});
			}
		}); // Ajax
	});
	
	jQuery("#purchase-order tr .main").click(function(){
		jQuery('.panel-supplier-details').addClass('hidden');
		jQuery("#purchase-order tr").removeClass('tr-actived');
		jQuery(this).parent().addClass('tr-actived');
		var id = jQuery(this).parent().attr('id');
		jQuery.ajax({
			url: '/inquiries/get_purchase_order',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('.panel-supplier-details').removeClass('hidden');
				jQuery('.panel-supplier-details').html(response);
				
				kendo_ui_grid();

			}
		}); // Ajax
	});
	
	jQuery("#purchase-order tr .available").click(function(){
		jQuery('.panel-supplier-details').addClass('hidden');
		jQuery("#purchase-order tr").removeClass('tr-actived');
		jQuery(this).parent().addClass('tr-actived');
		var id = jQuery(this).parent().attr('id');
		var inquiry_id = jQuery("#inquiries").attr("inq");
		jQuery.ajax({
			url: '/inquiries/get_purchase_order_available',
			type: 'POST',
			data: {id: id, inquiry_id: inquiry_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('.panel-supplier-details').removeClass('hidden');
				jQuery('.panel-supplier-details').html(response);
				
				kendo_ui_grid();

			}
		}); // Ajax
	});
	
	jQuery('.inquiry-suppliers').click(function(){
		var id = jQuery(this).attr('id');
		jQuery('.supplier-quotation-details').addClass('hidden');
		jQuery.ajax({
			url: '/inquiries/supplier_quotation_details',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('.supplier-quotation-details').removeClass('hidden');
				jQuery('.supplier-quotation-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					grid();
				});
			}
		}); // Ajax

	});

	jQuery('.rdo-price').click(function(){
		var inquirie_product_id = jQuery(this).attr('inquirie_product_id');
		var id = jQuery(this).attr('id');
		jQuery.ajax({
			url: '/inquiries/set_choose',
			type: 'POST',
			data: {id: id, inquirie_product_id: inquirie_product_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();	
				console.log(response);			
			}
		}); // Ajax
	});

	jQuery('#form-quotation').on('submit',(function(event) {
		event.preventDefault();
		
		jQuery.ajax({
			url: '/inquiries/update_quotations',
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				toastr.success(response);
				console.log(response);
				jQuery("#loader").fadeOut();
			},
			error: function(response, status){
				jQuery("#loader").fadeOut();
			}
		});
	}));

	jQuery('#form-inquiries-info').on('submit',(function(event) {
		event.preventDefault();
		
		jQuery.ajax({
			url: '/inquiries/update_inquiries_info',
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				// console.log(response);
				toastr.success(response);
				jQuery("#loader").fadeOut();
			},
			error: function(response, status){
				jQuery("#loader").fadeOut();
			}
		});
	}));

	jQuery('#extra-cost').on('submit',(function(event) {
		event.preventDefault();
		var cost = jQuery('#extra-cost').find("#cost").val();
		if (cost != "") {
			jQuery.ajax({
				url: '/inquiries/extra_cost',
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(response){
				
					jQuery('#table-cost-price').append('<tr class="tr-cost-price-'+response+'"><td>'+jQuery('#extra-cost #name').val()+'</td><td class="excost">'+jQuery('#extra-cost #cost').val()+'</td><td>'+jQuery('#extra-cost #profit').val()+'</td><td>'+jQuery('#extra-cost #final').val()+'</td><td><span class="btn btn-primary margin-right5 waves-effect waves-button waves-red" data-toggle="modal" data-target="#myModalEdit'+response+'"><i class="fa fa-pencil"></i></span><div class="modal fade" id="myModalEdit'+response+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"><div class="modal-dialog modal-sm modal-center"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title" id="myModalLabel">Extra Cost</h4> </div><div class="modal-body"> <form method="post" accept-charset="utf-8" class="edit-extra-cost edit-extra-cost-'+response+'" id="edit-extra-cost" role="form" action="/inquiries/quotations/112"><div style="display:none;"><input type="hidden" name="_method" class="form-control" value="POST"></div><div class="form-group text"><input type="text" name="inquiryid" class="form-control hidden" id="id" value="'+response+'"></div><div class="form-group text"><label class="control-label" for="name">Name</label><input type="text" name="name" class="form-control" id="name" value="'+jQuery('#extra-cost #name').val()+'"></div><div class="form-group text"><label class="control-label" for="cost">Cost</label><input type="text" name="cost" class="form-control" id="cost" value="'+jQuery('#extra-cost #cost').val()+'"></div><div class="form-group text"><label class="control-label" for="profit">Profit</label><input type="text" name="profit" class="form-control" id="profit" value="'+jQuery('#extra-cost #profit').val()+'"></div><div class="form-group text"><label class="control-label" for="final">Final</label><input type="text" name="final" class="form-control" value="'+jQuery('#extra-cost #final').val()+'" id="final"></div></form></div><div class="modal-footer"> <button class="btn btn-success btn-edit-cost-'+response+'" type="submit">Submit</button> </div></div></div></div><span class="btn btn-primary waves-effect waves-button waves-red delete-extras cursor-pointer" value="'+response+'"><i class="fa fa-trash"></i></span></td></tr>');
					editcost(response);
					jQuery('#extra-cost').find("#name").val('');
					jQuery('#extra-cost').find("#cost").val('');
					jQuery('#extra-cost').find("#profit").val('');
					jQuery('#extra-cost').find("#final").val('');
					jQuery('#myModal').modal('toggle');
					//## Delete 
					jQuery('.delete-extras').on('click',(function(event){
						var id = jQuery(this).attr('value');
						jQuery('.tr-cost-price-'+id).fadeOut().remove();
						sum_extra();
						jQuery.ajax({
							url: '/inquiries/extra_delete',
							type: 'POST',
							data: {id: id},
							dataType: 'html',
							cache: false,
							success: function(response){
								toastr.success(response);
								
							}
						}); // Ajax
					}));
					//## End delete
				},
				error: function(response, status){}
			});
		}else {
			toastr.success('cost empty');
		}
	}));
	
	jQuery('.edit-extra-cost').on('submit',(function(event) {
		event.preventDefault();
		var cost = jQuery(this).find("#cost").val();
		if (cost != "") {
			jQuery.ajax({
				url: '/inquiries/extra_edit',
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(response){
					
					jQuery('.tr-cost-price-'+response).html('<td>'+jQuery('.edit-extra-cost-'+response+' #name').val()+'</td><td class="excost">'+jQuery('.edit-extra-cost-'+response+' #cost').val()+'</td><td>'+jQuery('.edit-extra-cost-'+response+' #profit').val()+'</td><td>'+jQuery('.edit-extra-cost-'+response+' #final').val()+'</td><td><span class="btn btn-primary margin-right5 waves-effect waves-button waves-red" data-toggle="modal" data-target="#myModalEdit'+response+'"><i class="fa fa-pencil"></i></span><div class="modal fade" id="myModalEdit'+response+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"><div class="modal-dialog modal-sm modal-center"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title" id="myModalLabel">Extra Cost</h4> </div><div class="modal-body"> <form method="post" accept-charset="utf-8" class="edit-extra-cost edit-extra-cost-'+response+'" role="form" action="/inquiries/quotations/112"><div style="display:none;"><input type="hidden" name="_method" class="form-control" value="POST"></div><div class="form-group text"><input type="text" name="id" class="form-control hidden" id="id" value="'+response+'"></div><div class="form-group text"><label class="control-label" for="name">Name</label><input type="text" name="name" class="form-control" id="name" value="'+jQuery('.edit-extra-cost-'+response+' #name').val()+'"></div><div class="form-group text"><label class="control-label" for="cost">Cost</label><input type="text" name="cost" class="form-control" id="cost" value="'+jQuery('.edit-extra-cost-'+response+' #cost').val()+'"></div><div class="form-group text"><label class="control-label" for="profit">Profit</label><input type="text" name="profit" class="form-control" id="profit" value="'+jQuery('.edit-extra-cost-'+response+' #profit').val()+'"></div><div class="form-group text"><label class="control-label" for="final">Final</label><input type="text" name="final" class="form-control" value="'+jQuery('.edit-extra-cost-'+response+' #final').val()+'" id="final"></div></form></div><div class="modal-footer"> <button class="btn btn-success btn-edit-cost-'+response+'" type="submit">Submit</button> </div></div></div></div><span class="btn btn-primary waves-effect waves-button waves-red delete-extras cursor-pointer" value="'+response+'"><i class="fa fa-trash"></i></span></td>');
					jQuery('.fade ').removeClass('modal-backdrop');
					editcost(response);
					//## Delete 
					jQuery('.delete-extras').on('click',(function(event){
						var id = jQuery(this).attr('value');
						jQuery('.tr-cost-price-'+id).fadeOut().remove();
						sum_extra();
						jQuery.ajax({
							url: '/inquiries/extra_delete',
							type: 'POST',
							data: {id: id},
							dataType: 'html',
							cache: false,
							success: function(response){
								toastr.success(response);
							}
						}); // Ajax
					}));
					//## End delete
				},
				error: function(response, status){}
			});
		}else {
			toastr.success('cost empty');
		}

		return;
	}));
	
	function editcost (id) {
		sum_extra();

		jQuery('.btn-edit-cost-'+id).click(function(){
			var extra_id 	= jQuery('.edit-extra-cost-'+id+' #id').val();
			var cost 		= jQuery('.edit-extra-cost-'+id+' #cost').val();
			var name 		= jQuery('.edit-extra-cost-'+id+' #name').val();
			var final_cost 	= jQuery('.edit-extra-cost-'+id+' #final').val();
			var profit 		= jQuery('.edit-extra-cost-'+id+' #profit').val();
			
			jQuery.ajax({
				url: '/inquiries/extra_edit',
				type: "POST",
				data: {"id": extra_id, "name": name, "cost": cost, "profit": profit, "final": final_cost},
				dataType: "html",
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.tr-cost-price-'+response).html('<td>'+jQuery('.edit-extra-cost-'+response+' #name').val()+'</td><td class="excost">'+jQuery('.edit-extra-cost-'+response+' #cost').val()+'</td><td>'+jQuery('.edit-extra-cost-'+response+' #profit').val()+'</td><td>'+jQuery('.edit-extra-cost-'+response+' #final').val()+'</td><td><span class="btn btn-primary margin-right5 waves-effect waves-button waves-red" data-toggle="modal" data-target="#myModalEdit'+response+'"><i class="fa fa-pencil"></i></span><div class="modal fade" id="myModalEdit'+response+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"><div class="modal-dialog modal-sm modal-center"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title" id="myModalLabel">Extra Cost</h4> </div><div class="modal-body"> <form method="post" accept-charset="utf-8" class="edit-extra-cost edit-extra-cost-'+response+'" role="form" action="/inquiries/quotations/112"><div style="display:none;"><input type="hidden" name="_method" class="form-control" value="POST"></div><div class="form-group text"><input type="text" name="id" class="form-control hidden" id="id" value="'+response+'"></div><div class="form-group text"><label class="control-label" for="name">Name</label><input type="text" name="name" class="form-control" id="name" value="'+jQuery('.edit-extra-cost-'+response+' #name').val()+'"></div><div class="form-group text"><label class="control-label" for="cost">Cost</label><input type="text" name="cost" class="form-control" id="cost" value="'+jQuery('.edit-extra-cost-'+response+' #cost').val()+'"></div><div class="form-group text"><label class="control-label" for="profit">Profit</label><input type="text" name="profit" class="form-control" id="profit" value="'+jQuery('.edit-extra-cost-'+response+' #profit').val()+'"></div><div class="form-group text"><label class="control-label" for="final">Final</label><input type="text" name="final" class="form-control" value="'+jQuery('.edit-extra-cost-'+response+' #final').val()+'" id="final"></div></form></div><div class="modal-footer"> <button class="btn btn-success btn-edit-cost-'+response+'" type="submit">Submit</button> </div></div></div></div><span class="btn btn-primary waves-effect waves-button waves-red delete-extras cursor-pointer" value="'+response+'"><i class="fa fa-trash"></i></span></td>');
					jQuery('.fade ').removeClass('modal-backdrop');
					editcost(response);
					//## Delete 
					jQuery('.delete-extras').on('click',(function(event){
						var id = jQuery(this).attr('value');
						jQuery('.tr-cost-price-'+id).fadeOut().remove();
						sum_extra();
						jQuery.ajax({
							url: '/inquiries/extra_delete',
							type: 'POST',
							data: {id: id},
							dataType: 'html',
							cache: false,
							success: function(response){
								toastr.success(response);
							}
						}); // Ajax
					}));
					//## End delete
				},
				error:function() {
					alert('Error!');
				}
			}); // end ajax
			
		});
	}

	jQuery('.delete-extras').on('click',(function(event){
		var id = jQuery(this).attr('value');
		jQuery('.tr-cost-price-'+id).fadeOut().remove();
		sum_extra();
		jQuery.ajax({
			url: '/inquiries/extra_delete',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			success: function(response){
				toastr.success(response);
						
			}
		}); // Ajax
	}));

	function format_num_currency(num) {
		var number = num.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1');
		return number;
	}

	function format_currency_num (num) {
		var number = Number(num.replace(/[^0-9\.]+/g,""));
		return number;
	}

	function sum_extra() {
		var t = 0;
		jQuery.each(jQuery('.excost'), function(i, v) {
			var cost = jQuery(this).html();
			t = parseInt(t) + parseInt(cost);
		});
		jQuery("#ArrID").attr('cost',t);
		var com = jQuery("#amount-commission").val();
		var a_com = jQuery("#amount-add-commission").val();
		var dc = jQuery("#amount-discount").val();
		var sub_total = jQuery("#sub-total-inquiries").val();
		var total = parseFloat(sub_total)+parseFloat(t)+parseFloat(com)+parseFloat(a_com)-parseFloat(dc);
		jQuery("#grand_total_inquiries").attr('value',format_num_currency(total));
	}

	jQuery('#AddInqSupplier').on('submit',(function(event) {
		event.preventDefault();
		
		jQuery.ajax({
			url: '/inquiries/add-inq-supplier',
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response){
				var data = jQuery.parseJSON(response);
				if (data.status == true) {
					jQuery('#inquiries-details').append(data.result);
					jQuery('#myModal').modal('toggle');
					
					jQuery("#inquiries-details tr .main").click(function(){
						jQuery('.panel-supplier-details').addClass('hidden');
						jQuery("#inquiries-details tr").removeClass('tr-actived');
						jQuery(this).parent().addClass('tr-actived');
						var id = jQuery(this).parent().attr('id');
						jQuery.ajax({
							url: '/inquiries/get_supplier_details',
							type: 'POST',
							data: {id: id},
							dataType: 'html',
							cache: false,
							beforeSend: function(){
								jQuery("#loader").fadeIn();
							},
							success: function(response){
								jQuery("#loader").fadeOut();
								jQuery('.panel-supplier-details').removeClass('hidden');
								jQuery('.panel-supplier-details').html(response);
								kendo_ui_grid();
							}
						}); // Ajax
					});

					jQuery(".DeleteInqSupplier").click(function(event){
						var r = confirm("Are you sure you want to delete?");
						if (r == true) {
							var id_supp = jQuery(this).attr('id');
							jQuery('.myrowaxn-'+id_supp).remove();
							jQuery.ajax({
								url: '/inquiries/del_inq_supplier',
								type: 'POST',
								data: {"id": id_supp},
								dataType: 'html',
								cache: false,
								beforeSend: function(){
									// jQuery("#loader").fadeIn();
								},
								success: function(response){
									// jQuery("#loader").fadeOut();
								}
							}); // Ajax
						}
					});

				} else {
					toastr.success(data.result);
				}
			},
			error: function(response, status){}
		});
	})); // End
	
	jQuery('.remove-file-att').click(function(){
		var id = jQuery(this).attr("id");
		jQuery.ajax({
			url: '/inquiries/remove_file_attachment',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('#attachments-'+id).remove();
				toastr.success(response);
				console.log(response);
			}
		}); // Ajax
	});
	
	jQuery('#AddSupplierPic').on('submit',(function(event) {
		event.preventDefault();
		var supplier_id = jQuery("#supplier_id").val();
		var name = jQuery("#new_suppliers").val();
		jQuery.ajax({
			url: '/suppliers/add-supplier-pic',
			type: "POST",
			data: {supplier_id: supplier_id, name: name},
			dataType: 'json',
			cache: false,
			success: function(response){
				if (response.status == true) {
					jQuery("select#supplier-pic").html(response.html);
				} else {
					alert("error");
				}
				jQuery('#myModal2').modal('toggle');
			},
			error: function(response, status){
			}
		}); // ajax
	})); // End

	jQuery("#supplier_id").change(function(){
		var id = jQuery(this).val();
		jQuery.ajax({
			url: '/suppliers/select-supplier-pic',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				// jQuery("#loader").fadeIn();
			},
			success: function(response){
				// jQuery("#loader").fadeOut();
				jQuery("select#supplier-pic-id").html(response);
				console.log(response);
			},
			error: function(response){

			}
		}); // ajax
	});
	if ($("#fe-search-inq").length){
		jQuery("#fe-search-inq").click(function(){
			jQuery('#fe-search-inq-info').slideToggle(1000);
			 $("i", this).toggleClass("fa fa-chevron-up fa fa-chevron-down");
		});
	}
	jQuery("#add-mtd-prd").click(function(){
		console.log('ok');
		jQuery(".menthod-product").append('<div class="mth-prd"><span class="col-md-6"><input type="text" placeholder="Label" name="" class="label123 form-control"></span>	<span class="col-md-5"><input type="text" placeholder="Value" name="" class="value123 form-control"></span><span class="col-md-1 remove-jtfd"><i class="fa fa-trash-o margin-top10"></i></span></div><br/>');
		jQuery('.remove-jtfd').click(function(){
			jQuery(this).parent().remove();
		});
	});
	jQuery('.remove-jtfd').click(function(){
		jQuery(this).parent().remove();
	});
}); // jQuery document
