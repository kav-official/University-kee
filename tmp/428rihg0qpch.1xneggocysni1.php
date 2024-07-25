<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Local Data | Keenthemes</title>
		<meta name="description" content="Child datatable from local data" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<?php echo $this->render('backend/inc/header.html',NULL,get_defined_vars(),0); ?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
			<!--begin::Logo-->
			<a href="<?= ($BASE) ?>/">
				<img alt="Logo" src="<?= ($BASE) ?>/ui/backend/assets/media/logos/logo-letter-9.png" class="max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/category.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header flex-column header-fixed">
						<!--begin::Top-->
                        <?php echo $this->render('backend/inc/topnav.html',NULL,get_defined_vars(),0); ?>
						<!--end::Top-->
						<!--begin::Bottom-->
						<?php echo $this->render('backend/inc/nav.html',NULL,get_defined_vars(),0); ?>
						<!--end::Bottom-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<!--begin::Page Title-->
										
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title la">
											<h3 class="card-label"><?= ($strPage) ?> (<?= ($entrycount) ?>)
											<span class="d-block text-muted pt-2 font-size-sm"><?= ($strAction) ?></span></h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											<div class="dropdown dropdown-inline mr-2 la">
												<a href="<?= ($BASE) ?>/fee/edit" class="btn btn-light-primary font-weight-bolder">
												<span class="svg-icon svg-icon-md">
													<i class="fa fa-plus"></i>
												</span>ເພີ່ມໃໝ່</a>
											</div>
											<!--end::Dropdown-->
										</div>
									</div>
									<div class="card-body">
										<form class="form-horizontal" method="put" id="order-form">
											<div class="table-responsive-xl">
												<table class="table">
													<thead>
														<tr style="font-family: NotoSerifLao;">
															<th>ລຳດັບ</th>
															<th>ຫ້ອງຮຽນ</th>
															<th>ຈຳນວນເງີນ</th>
															<th>ວັນທີ່ສ້າງ</th>
															<th class="text-center" colspan="2">ຈັດການ</th>
														</tr>
													</thead>
													<tbody>
														<?php $ctr=0; foreach (($items?:[]) as $row): $ctr++; ?>
															<tr id="item-<?= ($row['id']) ?>">
																<td><?= ($ctr) ?></td>
																<td><?= ($arrClass[$row['class']]) ?></td>
																<td><?= (number_format($row['price'])) ?></td>
																<td><?= ($row['created_at']) ?></td>
																<td class="text-center">
																	<div class="btn-group action-tooltip">
																		<a class="btn-white btn btn-sm" data-toggle="tooltip" data-placement="top" href="<?= ($BASE) ?>/fee/edit/<?= ($row['id']) ?>" title="Delete"><i class="fa fa-edit"></i></a>
																		<button class="btn-white btn btn-sm ajax-delete" data-toggle="tooltip" data-placement="top" id="<?= ($row['id']) ?>" url="<?= ($BASE) ?>/fee" title="Delete"><i class="fa fa-trash"></i></button>
																	</div>
																</td>
															</tr>
														<?php endforeach; ?>  
													</tbody>
												</table>
											</div>
										</form>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php echo $this->render('backend/inc/footer.html',NULL,get_defined_vars(),0); ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<?php echo $this->render('backend/inc/panel.html',NULL,get_defined_vars(),0); ?>
		<?php echo $this->render('backend/inc/script.html',NULL,get_defined_vars(),0); ?>
		<script type="text/javascript">
			$(document).ready(function(){
			  $('#order-form').submit(function(e){
				var form = $(e.target);
				if(form.is("#order-form")){ // check if this is the form that you want (delete this check to apply this to all forms)
				  e.preventDefault();
					$.ajax({
					  type: form.attr("method"),              
					  url: '<?= ($BASE) ?>/admin/category/order-num',                     
					  data: form.serialize(), // serializes the form's elements.  
					  enctype: 'multipart/form-data',           
					  beforeSend: function()
					  {
						$("button.btn-submit").prop('disabled', true);
						$('button.btn-submit').css('cursor','not-allowed');
						$('button.btn-submit i.fa').addClass( "fa-refresh fa-spin" );
					  },  
					  success: function(data)
					  {
						if(data.success == true)
						{
							Swal.fire("ສຳເລັດ", data.message, "success");
						  setTimeout(function(){ window.location.reload(); }, 1000);
						} else {
							Swal.fire("ຜິດພາດ", "ກະລຸນາລອງໃໝ່", "error");
						  $('button.btn-submit i.fa').removeClass( "fa-refresh fa-spin" );
						  $('button.btn-submit').removeAttr('style');
						  $("button.btn-submit").prop('disabled', false);
						}
					  },
					  error: function (){
						Swal.fire("ຜິດພາດ", "ກະລຸນາລອງໃໝ່", "error");
						$('button.btn-submit i.fa').removeClass( "fa-refresh fa-spin" );
						$('button.btn-submit').removeAttr('style');
						$("button.btn-submit").prop('disabled', false);
					  },
				  });
				}
			  });
			});
		  </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>