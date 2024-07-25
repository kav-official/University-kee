
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>ຜູ້ໃຊ້ | Joint Pharma</title>
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
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/user.svg-->
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
												<a href="<?= ($BASE) ?>/user/edit" class="btn btn-light-primary font-weight-bolder">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>ເພີ່ມໃໝ່</a>
											</div>
											<!--end::Dropdown-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
                                        <div class="table-responsive-xl" id="app">
                                            <table class="table">
                                                <thead>
                                                    <tr style="font-family: NotoSerifLao;">
                                                        <th >ຮູບ</th>
                                                        <th>ຊື່​ເຕັມ</th>
                                                        <th>ຫ້ອງສອນ</th>
                                                        <th>ເພດ</th>
                                                        <th>ວັນເດືອນປີເກີດ</th>
                                                        <th>ແຂວງ</th>
                                                        <th>ເມືອງ</th>
                                                        <th>ບ້ານ</th>
                                                        <th>ເບີໂທ</th>
                                                        <th>ອີ​ເມວ</th>
                                                        <th>ຕຳແໜ່ງ</th>
                                                        <th>ວັນທີສ້າງ</th>
                                                        <th class="text-center">ຈັດການ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach (($items?:[]) as $row): ?>
                                                        <tr id="item-<?= ($row['id']) ?>">
														<td>
															<?php if ($row['profile_avatar'] != ''): ?>
															  
																<div class="lightBoxGallery"><a href="<?= ($row['profile_avatar']) ?>"><img src="<?= ($row['profile_avatar']) ?>" width="100" class="img-thumbnail"></a></div>
															  
															  <?php else: ?><div class="lightBoxGallery"><img src="<?= ($BASE) ?>/uploads/user/empty.jpg" width="100" class="img-thumbnail"></a></div>
															<?php endif; ?>
														</td>
                                                        <td><?= ($row['first_name']) ?> <?= ($row['last_name']) ?></td>
                                                        <td><?= ($arrClass[$row['class']]) ?></td>
                                                        <td><?= ($row['gender']) ?></td>
                                                        <td><?= ($row['dob']) ?></td>
                                                        <td><?= ($arrProvince[$row['province_id']]) ?></td>
                                                        <td><?= ($row['district']) ?></td>
                                                        <td><?= ($row['village']) ?></td>
                                                        <td><?= ($row['phone']) ?></td>
                                                        <td><?= ($row['email']) ?></td>
                                                        <td><?= ($row['role']) ?></td>
                                                        <td><?= (date('d-m-Y H:i:s',$row['created_at'])) ?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group action-tooltip">
                                                                <a class="btn-white btn btn-sm" data-toggle="tooltip" data-placement="top" href="<?= ($BASE) ?>/user/edit/<?= ($row['id']) ?>" title="Delete"><i class="fa fa-edit"></i></a>
                                                                <button class="btn-white btn btn-sm ajax-delete" data-toggle="tooltip" data-placement="top" id="<?= ($row['id']) ?>" url="<?= ($BASE) ?>/user" title="Delete"><i class="fa fa-trash"></i></button>
																<?php if ($row['active']== '1'): ?>
																	
																		<a href="javascript:void(0)" class="btn btn-icon btn-light btn-hover-success btn-sm" id="access-<?= ($row['id']) ?>" v-on:click="getStatus(<?= ($row['id']) ?>,<?= ($row['active']) ?>)"><i class="fas fa-toggle-on text-success"></i></a>
																	
																	<?php else: ?>
																		<a href="javascript:void(0)" class="btn btn-icon btn-light btn-hover-success btn-sm" id="access-<?= ($row['id']) ?>" v-on:click="getStatus(<?= ($row['id']) ?>,<?= ($row['active']) ?>)"><i class="fas fa-toggle-off"></i></a>
																	
																<?php endif; ?>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    <?php endforeach; ?>       
                                                    </tbody>
													<tfoot>
														<tr>
															<td colspan="6" class="footable-visible text-right">
																<div class="d-flex justify-content-between align-items-center flex-wrap">
																	<div class="d-flex flex-wrap py-2 mr-3 text-right">
																		<a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="<?= ($BASE) ?>/user?pg=1&limit=<?= ($limit) ?>" aria-label="Previous">
																			<span aria-hidden="true">&laquo;</span>
																			<span class="sr-only">Previous</span>
																		</a>
																		
																		<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($singlePrevious['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($singlePrevious['pg'] ?? '') ?>&limit=<?= ($limit) ?>">&#8249;</a>
												
																		<?php if (count($PreviousStart)>0): ?>
																			
																				<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($PreviousStart['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($PreviousStart['pg'] ?? '') ?>&limit=<?= ($limit) ?>"><?= ($PreviousStart['pg']) ?></a>
																				<a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="#">...</a>
																			
																		<?php endif; ?>
												
																		<?php foreach (($arrPagination?:[]) as $paginationRow): ?>
																			<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($paginationRow['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($paginationRow['pg'] ?? '') ?>&limit=<?= ($limit) ?>"><?= ($paginationRow['pg']) ?></a>
																		<?php endforeach; ?>
												
																		<?php if (count($singleNexPage)>0): ?>
																			
																				<a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="#">...</a>
																				<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($doubleNexPage['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($doubleNexPage['pg'] ?? '') ?>&limit=<?= ($limit) ?>"><?= ($doubleNexPage['pg']) ?></a>
																				<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($singleNexPage['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($singleNexPage['pg'] ?? '') ?>&limit=<?= ($limit) ?>">&#8250;</a>
																			
																			<?php else: ?>
																				<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($singleNexPage['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($singleNexPage['pg'] ?? '') ?>&limit=<?= ($limit) ?>">&#8250;</a>
																			
																		<?php endif; ?>
												
																		<a class="btn btn-icon btn-sm btn-light mr-2 my-1 <?= ($doubleNexPage['class'] ?? '') ?>" href="<?= ($BASE) ?>/user?pg=<?= ($doubleNexPage['pg'] ?? '') ?>&limit=<?= ($limit) ?>" aria-label="Next">
																			<span aria-hidden="true">&raquo;</span>
																			<span class="sr-only">Next</span>
																		</a>
																	</div>
																</div>
															</td>
														</tr>
													</tfoot>
                                            </table>
                                          </div>
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
		<?php echo $this->render('backend/inc/panel.html',NULL,get_defined_vars(),0); ?>
		<?php echo $this->render('backend/inc/script.html',NULL,get_defined_vars(),0); ?>
		<!--end::Page Scripts-->
		<script type="text/javascript">
			new Vue({
				el:"#app",
				data:{
					baseUrl:"<?= ($BASE) ?>/",
				},
				methods:{
					getStatus:function(id,status)
					{
						axios.put(this.baseUrl+'user/publish-status/'+id+'/'+status)
						.then(respone=>{
							var data = respone.data;
							if(data.success == true){
								if(status == 1){
									$('#access-'+id).html("<i class='fas fa-toggle-off'></i>");
									window.location.reload();
								}else{
									$('#access-'+id).html("<i class='fas fa-toggle-on text-info'></i>");
									window.location.reload();
								}
							}
						})
					}
				}
			})
		</script>
	</body>
	<!--end::Body-->
</html>