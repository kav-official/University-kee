
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
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
                                        <div class="table-responsive-xl" id="app">
                                            <table class="table">
                                                <thead>
                                                    <tr style="font-family: NotoSerifLao;">
                                                        <th>ລຳດັບ</th>
                                                        <th>ລະຫັດ</th>
                                                        <th>ຊື່​ເຕັມ</th>
                                                        <th>ຫ້ອງສອນ</th>
                                                        <th>ເພດ</th>
                                                        <th>ວັນເດືອນປີເກີດ</th>
                                                        <th>ແຂວງ</th>
                                                        <th>ເມືອງ</th>
                                                        <th>ບ້ານ</th>
                                                        <th>ເບີໂທ</th>
                                                        <th>ຄະແນນ</th>
                                                        <th class="text-center">ປ້ອນຄະແນນ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $ctr=0; foreach (($items?:[]) as $row): $ctr++; ?>
                                                        <?php $district=$help->getTitle('DistrictServices',['id = ?',$row['district_id']],'district_name'); ?>
                                                        <?php $score=$help->getByOne('ScoreServices',['student_no = ? AND semester = ?',$row['student_no'],$row['semester']]); ?>
                                                        <tr id="item-<?= ($row['id']) ?>">
                                                            <td><?= ($ctr) ?></td>
                                                            <td><?= ($row['student_no']) ?></td>
                                                            <td><?= ($row['first_name']) ?> <?= ($row['last_name']) ?></td>
                                                            <td><?= ($arrClass[$row['class']]) ?></td>
                                                            <td><?= ($row['gender']) ?></td>
                                                            <td><?= ($row['dob']) ?></td>
                                                            <td><?= ($province[$row['province_id']]) ?></td>
                                                            <td><?= ($district) ?></td>
                                                            <td><?= ($row['village']) ?></td>
                                                            <td><?= ($row['phone']) ?></td>
                                                            <td class="score-<?= ($row['student_no']) ?>"><?= ($score->score ?? '-') ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group action-tooltip">
                                                                    <button class="btn-primary btn btn-sm" data-toggle="tooltip" 
                                                                    v-on:click="addScore('<?= ($row['student_no']) ?>','<?= ($row['first_name']) ?>','<?= ($row['last_name']) ?>','<?= ($row['class']) ?>','<?= ($arrClass[$row['class']]) ?>','<?= ($row['semester']) ?>')"><i class="fa fa-graduation-cap" aria-hidden="true"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>       
                                                </tbody>
                                            </table>
                                            <!-- Modal -->
                                            <div class="modal fade" id="scoreModal" tabindex="-1" role="dialog" aria-labelledby="scoreModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content" style="font-family: NotoSerifLao;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title la" id="scoreModalLabel">ເພີ່ມຄະແນນ</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="score-form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="la-normal">ສົກຮຽນ</label>
                                                                            <input type="text" name="semester" class="form-control" v-model="semester" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="la-normal">ຫ້ອງຮຽນ</label>
                                                                            <input type="text" name="class_no" class="form-control" v-model="class_no" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label class="la-normal">ລະຫັດ</label>
                                                                            <input type="text" name="student_no" class="form-control" v-model="student_no" readonly>
                                                                            <input type="hidden" name="class_id" v-model="class_id">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label class="la-normal">ຊື່</label>
                                                                            <input type="text" name="first_name" class="form-control" v-model="first_name" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label class="la-normal">ນາມສະກຸນ</label>
                                                                            <input type="text" name="last_name" class="form-control" v-model="last_name" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="la-normal">ຄະແນນ</label>
                                                                            <input type="text" name="score" class="form-control" v-model="score">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary la-normal" v-on:click="handleSubmit()">ບັນທຶກ</button>
                                                            <button type="button" class="btn btn-danger la-normal" data-dismiss="modal">ປິດ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                    student_no:'',
                    first_name:'',
                    last_name:'',
                    class_id:'',
                    class_no:'',
                    semester:'',
                    score:'',
				},
				methods:{
                    handleSubmit:function(){
                        axios.post('<?= ($BASE) ?>/student-score',$('#score-form').serialize())
                        .then(res => {
                            var data = res.data;
                            if(data.success){
                                $('.score-'+this.student_no).text(data.score);
                                $('#scoreModal').modal('hide');
                                Swal.fire('ສຳເລັດ!',data.message,'success');
                            } else {
                                Swal.fire('ຜິດພາດ!',data.message,'error');
                            }
                        })
                    },
                    addScore:function(student_no,first_name,last_name,class_id,class_no,semester){
                        var score = $('.score-'+student_no).text();
                        this.student_no = student_no;
                        this.first_name = first_name;
                        this.last_name = last_name;
                        this.class_id = class_id;
                        this.class_no = class_no;
                        this.semester = semester;
                        this.score = score != '-' ? score : '';
                        $('#scoreModal').modal('show');
                    }
				}
			})
		</script>
	</body>
	<!--end::Body-->
</html>