<script src="<?= ($BASE) ?>/ui/backend/assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/scripts.bundle.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/jquery.validate.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/jquery.fancybox.min.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/pages/crud/forms/editors/tinymce.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="<?= ($BASE) ?>/ui/backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?= ($BASE) ?>/ui/backend/assets/js/pages/widgets.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/pages/crud/forms/widgets/select2.js"></script>
<!-- Vue -->
<script src="<?= ($BASE) ?>/ui/backend/assets/js/axios.min.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/vue.min.js"></script>
<!-- Dropzone -->
<script src="<?= ($BASE) ?>/ui/backend/assets/js/dropzone.js"></script>
<!-- Vue Validate -->
<script src="<?= ($BASE) ?>/ui/backend/assets/js/vee-validate.min.js"></script>
<script src="<?= ($BASE) ?>/ui/backend/assets/js/rules.umd.js"></script>
<!-- <script>
    Vue.component('validation-observer', VeeValidate.ValidationObserver);
    Vue.component('validation-provider', VeeValidate.ValidationProvider);
</script>
<script>
    Object.keys(VeeValidateRules).forEach(rule => {
      VeeValidate.extend(rule, VeeValidateRules[rule]);
    });
</script> -->
<!--end::Page Scripts-->
<script type="text/javascript">
    $(document).ready(function(){
        $( "button.ajax-delete" ).click(function(event) {
            event.preventDefault();
            var obj = $(this);
            Swal.fire({
                title: "ທ່ານແນ່ໃຈ?",
                text: "ທ່ານຕ້ອງການລຶບລາຍການນີ້ແທ້ບໍ່?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#0BB783",
                confirmButtonText: "Yes",
                closeOnConfirm: false
                }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                    type    : 'DELETE',
                    url     : obj.attr('url')+'/'+obj.attr('id'),
                    success : function(data) {
                        if (data.success == true) {
                            $('#item-'+obj.attr('id')).hide();
                            Swal.fire("ສຳເລັດ!", data.message, "success");
                        } else {
                            Swal.fire("ຜິດພາດ!", data.message, "error");
                        }
                    },
                    error: function(request,msg,error) {
                        Swal.fire("ຜິດພາດ!", "ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
                    }
                    });
                }
            })
        });
        
        $('.sign-out').on('click',function(){
            Swal.fire({
                title: "ອອກຈາກລະບົບແທ້ບໍ່?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    window.location.href='<?= ($BASE) ?>/logout';
                }
            });
        });

        $('.add-commas').keyup(function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                ;
            });
        });

        $('.lightBoxGallery a').fancybox({
            fitToView : true,
            width   : '90%',
            height    : '90%',
            autoSize  : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none',
            pixelRatio: 2,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    });
</script>