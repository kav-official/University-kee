
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
											<span class="d-block text-muted pt-2 font-size-sm"><?= ($strAction) ?></span></h3>
										</div>
									</div>
									<div class="card-body">
                                      <!--begin::Wizard Form-->
                                        <form id="submit-form" method="<?= ($method) ?>" action="<?= ($BASE) ?>/student">
                                            <input type="hidden" name="id" value="<?= ($id) ?>">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10 la">ລາຍລະອຽດໂປຣໄຟລ໌ຂອງຜູ້ໃຊ້</h5>

                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ລະຫັດນັກສຶກສາ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="student_no" type="text" value="<?= ($item->student_no ?? '') ?>"  />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ຊື່​ແທ້</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="first_name" type="text" value="<?= ($item->first_name ?? '') ?>"  />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ນາມ​ສະ​ກຸນ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="last_name" type="text" value="<?= ($item->last_name ?? '') ?>"  />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ເພດ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select name="gender" class="form-control">
                                                                    <option value="">- Select Gender -</option>
                                                                    <option value="M">ເພດຊາຍ</option>
                                                                    <option value="F">ເພດຍີງ</option>
                                                                    <option value="O">ອື່ນໆ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ວັນເດືອນປີເກີດ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->dob ?? '') ?>"  name="dob" type="date" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ແຂວງ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select name="province_id" class="form-control">
                                                                    <?= ($custom->renderArraySelect($arrProvince,$item->province_id ?? '' ))."
" ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ເມືອງ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->district ?? '') ?>"  name="district" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ບ້ານ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->village ?? '') ?>"  name="village" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ເບີໂທ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->phone ?? '') ?>"  name="phone" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ສາສະໜາ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->region ?? '') ?>"  name="region" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ຊົນເຜົ່າ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->ethnicity ?? '') ?>"  name="ethnicity" type="text" />
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ຫ້ອງຮຽນ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select name="class" class="form-control">
                                                                    <?= ($custom->renderArraySelect($arrClass,$item->class ?? '' ))."
" ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row la">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">ປີ</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" value="<?= ($item->year ?? '') ?>" name="year" type="text" />
                                                            </div>
                                                        </div>
                                                      

                                                    </div>
                                                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                        <div class="mr-2"></div>
                                                        <div>
                                                            <a href="<?= ($BASE) ?>/student" class="btn btn-default font-weight-bolder px-9 py-4">Cancel <i class="fa"></i></a>
                                                            <button type="submit" class="btn btn-success font-weight-bolder px-9 py-4 btn-submit">Submit <i class="fa"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
		<script type="text/javascript">
            $(document).ready(function(){
             $('#submit-form').submit(function(event){
                event.preventDefault();
                if ($("#submit-form").valid()) {
                    $.ajax({
                        type: $("#submit-form").attr("method"),            
                        url: $("#submit-form").attr("action"), 
                        data: $("#submit-form").serialize(),             
                        beforeSend: function() {
                            $("button.btn-submit").prop('disabled', true);
                            $('button.btn-submit').css('cursor','not-allowed');
                            $('button.btn-submit i.fa').addClass( "fa-refresh fa-spin" );
                        },  
                        success: function(data) {
                            if (data.success == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((result)=>{
                                    window.location.href="<?= ($BASE) ?>/student";
                                });
                            } else {
                                Swal.fire("Error!", data.message, "error");
                                $('button.btn-submit i.fa').removeClass( "fa-refresh fa-spin" );
                                $('button.btn-submit').removeAttr('style');
                                $("button.btn-submit").prop('disabled', false);
                            }
                        },
                        error: function () {
                            Swal.fire("Error!", "Error during proccessing!", "error");
                            $('button.btn-submit i.fa').removeClass( "fa-refresh fa-spin" );
                            $('button.btn-submit').removeAttr('style');
                            $("button.btn-submit").prop('disabled', false);
                        },
                    });
                }
            });
            $("#submit-form").validate({
            rules: {
                unit_name: {
                    required: true
                }
            },
            messages: {
                unit_name: {
                    required: "Please enter user name.",
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest('div.form-group').find('div.error'));
            },
          });
        });
		
      </script>
	</body>
</html>