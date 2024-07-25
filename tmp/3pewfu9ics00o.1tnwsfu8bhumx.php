
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title><?= ($SITE_NAME) ?></title>
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
			<a href="<?= ($BASE) ?>/admin">
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
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/unit.svg-->
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
									<div class="d-flex align-items-baseline flex-wrap mr-5"></div>
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
								<div class="card card-custom" id="app">
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title la">
											<h3 class="card-label"><?= ($strPage)."
" ?>
										</div>
									</div>
									<div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ລະຫັດນັກສຶກສາ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input style="height: 50px; border-color: aqua;border-style: dotted;background-color: #ffffff;" class="form-control form-control-solid form-control-lg student-no" name="student_no" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ຊື່​ແທ້</label>
                                                            <div class="col-lg-4">
                                                                <input class="form-control first-name form-control-solid form-control-lg" readonly name="first_name" type="text" />
                                                            </div>
                                                             <label class="col-lg-1 col-form-label">ນາມ​ສະ​ກຸນ</label>
                                                            <div class="col-lg-4">
                                                                <input class="form-control last-name form-control-solid form-control-lg" readonly name="last_name" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ວັນເດືອນປີເກີດ</label>
                                                            <div class="col-lg-4">
                                                                <input class="form-control dob form-control-solid form-control-lg" readonly name="first_name" type="text"/>
                                                            </div>
                                                             <label class="col-lg-1 col-form-label">ປີຮຽນ</label>
                                                            <div class="col-lg-4">
                                                                <input class="form-control year form-control-solid form-control-lg" readonly name="last_name" type="text"  />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center border-top pt-10 mt-15">
                                                        <input type="hidden" name="student_no" class="post-student-no">
                                                        <div class="text-center">
                                                            <button type="button" class="btn btn-success font-weight-bolder px-9 py-4 btn-submit">Submit <i class="fa"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
					</div>
					<?php echo $this->render('backend/inc/footer.html',NULL,get_defined_vars(),0); ?>
				</div>
			</div>
		</div>
        <?php echo $this->render('backend/inc/panel.html',NULL,get_defined_vars(),0); ?>
		<?php echo $this->render('backend/inc/script.html',NULL,get_defined_vars(),0); ?>
		<script type="text/javascript">
            $(document).ready(function(){
                $(".student-no").keydown(function (e) {
                    if (e.keyCode == 13) {
                        $('.post-student-no').val($(this).val())
                        $.ajax({
                            url:'<?= ($BASE) ?>/get-registered/'+$(this).val(),
                            type:'GET',
                            success:function(data){
                                if(data.success == true){
                                    $('.first-name').val(data.first)
                                    $('.last-name').val(data.last)
                                    $('.dob').val(data.dob)
                                    $('.year').val(data.year)
                                }else{
                                    Swal.fire('Waring',data.message,'warning')
                                }
                            }
                        })
                    }
                });

                $(".btn-submit").click(function(){
                    if($(".post-student-no").val()==''){
                        Swal.fire({
                            icon: 'warning',
                            title: 'ຄຳເຕືອນ',
                            text:'ກະລຸນາເລືອກລະຫັດນັກສຶືກສາ',
                            showConfirmButton: true,
                        })
                    }else{
                         Swal.fire({
                            icon: 'warning',
                            title: 'ຄຳເຕືອນ',
                            text:'ກະລຸນາກວດເບີີ່ງຂໍ້ມູນໃຫ້ຖືກຕ້ອງ',
                            showCancelButton: true,
                            showConfirmButton: true,
                        }).then((result)=>{
                            if (result.isConfirmed) {
                            $.ajax({
                                    url:'<?= ($BASE) ?>/update/oldstudent/'+$(".post-student-no").val(),
                                    type:'POST',
                                    success:function(data){
                                        if(data.success == true){
                                            Swal.fire('ຂໍສະແດງຄວາມຍີນດີ',data.message,'success');
                                            $(".student-no").val('');
                                        }else{
                                            Swal.fire('ຄຳເຕືອນ',data.message,'warning');
                                            $(".student-no").val('');
                                        }
                                    }
                                })
                            }
                        });
                    }
                })
            });
      </script>
	</body>
</html>