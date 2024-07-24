<!-- Js Plugins -->
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery-3.3.1.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/bootstrap.min.js"></script>
<!-- <script src="<?= ($BASE) ?>/ui/frontend/js/$.nice-select.min.js"></script> -->
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery.fancybox.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery-ui.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/bootstrap-datepicker.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery.slicknav.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/mixitup.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/owl.carousel.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/main.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/toastr.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/axios.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $('.member-link-copy').on('click',function(){
            const text = $('.member-link-text');
            text.select();
            document.execCommand("copy");
            $(".member-link-copied").removeClass('hide');
        });

        $('.member-link').on('click',function(){
            $("#member-link").modal('show');
        });
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        $( '#select-field' ).select2()
        .on("change", function (e) {
            // $('.input-shop-name').val($(this).val());
            var data = $(this).select2('data');
            $('.input-shop-name').val(data[0].text);
        });
        function callShopName(){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/shop-name',
                success:function(data){
                    var items = data.items;
                    var last_shops = data.lastItems;
                    var last_tr = "";
                    $.each(last_shops,function(index,val){
                        last_tr += '<tr>';
                        last_tr += '<td>'+val.shop_name+'</td>';
                        last_tr += '<td>'+val.address+'</td>';
                        last_tr += '<td>'+val.shop_phone+'</td>';
                        last_tr += '<td style="text-align:center"><button type="button" item_id ="'+val.id+'" class="btn btn-white btn-getshopName"> <i class="fa fa-edit"></i></button></td>';
                        last_tr += '</tr>';
                    });
                    $('#staff-shop-area').after(last_tr);
                    var option = "<option value=''>-- ເລືອກຮ້ານ --</option>";
                    $.each(items,function(index,val){
                        option += "<option value='"+val.id+"' "+val.selected+">"+val.shop_name+"</option>";
                        if(val.selected == 'selected'){
                            $('.input-shop-name').val(val.shop_name);
                        }
                        $('.geo-village').val(data.village);
                        $('.geo-address').val(data.address);
                        $('.input-shop-phone').val(data.shop_phone);
                        $('.input-shop-email').val(data.shop_email);
                        if(data.check == 'checkin')
                        {
                            $('#checkin').prop('checked',true);
                            $('#checkout').prop('checked',false);
                        } else {
                            $('#checkin').prop('checked',false);
                            $('#checkout').prop('checked',true);
                        }
                    });
                    $('#locationModal .geo-shop-name').html(option);

                    var province = data.province;
                    var proOption = "<option value=''>-- ເລືອກແຂວງ --</option>";
                    $.each(province,function(index,val){
                        proOption += "<option value='"+val.id+"' "+val.selected+">"+val.value+"</option>";
                    });
                    $('#locationModal .geo-province').html(proOption);
                    $('#addShopModal .geo-province').html(proOption);

                    var district = data.district;
                    var disOption = "<option value=''>-- ເລືອກເມືອງ --</option>";
                    $.each(district,function(index,val){
                        disOption += "<option value='"+val.id+"' "+val.selected+">"+val.district_name+"</option>";
                    });
                    $('#locationModal .geo-district').html(disOption);
                    $('#addShopModal .geo-district').html(disOption);
                }
            });
        }
        $(document).on('click','.btn-getshopName',function(){
           var obj = $(this);
           var uri = obj.attr('item_id')
           $.ajax({
                type:'GET',
                url:'<?= ($BASE) ?>/shop-name-update/'+uri, 
                success:function (data) {
                    if(data.success == true){
                        $('.shop-id').val(data.id);
                        $('.input-add-shop-name').val(data.shop_name);
                        $('.geo-province').val(data.province_id);
                        $('.geo-district').val(data.district_id);
                        $('.shop-village').val(data.village);
                        $('.address').val(data.address);
                        $('.shop-phone').val(data.shop_phone);
                        $('.shop-email').val(data.shop_email);

                        var province = data.province;
                        var proOption = "<option value=''>-- ເລືອກແຂວງ --</option>";
                        $.each(province,function(index,val){
                            proOption += "<option value='"+val.id+"' "+val.selected+">"+val.value+"</option>";
                        });
                        $('#locationModal .geo-province').html(proOption);
                        $('#addShopModal .geo-province').html(proOption);

                        var district = data.district;
                        var disOption = "<option value=''>-- ເລືອກເມືອງ --</option>";
                        $.each(district,function(index,val){
                            disOption += "<option value='"+val.id+"' "+val.selected+">"+val.district_name+"</option>";
                        });
                        $('#locationModal .geo-district').html(disOption);
                        $('#addShopModal .geo-district').html(disOption);

                    }
                }
           })
        });
        $(document).on('change','.geo-shop-name',function(){
            handleShopData($(this).val());
        });
        function handleShopData(id){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/shop-phone/'+id,
                success:function(data){
                    if(data.success){
                        $('.input-shop-id').val(data.id);
                        $('.input-shop-name').val(data.shop_name);
                        $('.input-shop-phone').val(data.shop_phone);
                        $('.input-shop-email').val(data.shop_email);
                        $('.geo-village').val(data.village);
                        $('.geo-address').val(data.address);
                        if(data.check == 'checkin'){
                            $('#checkin').prop('checked',true);
                            $('#checkout').prop('checked',false);
                        } else {
                            $('#checkin').prop('checked',false);
                            $('#checkout').prop('checked',true);
                        }

                        var province = data.province;
                        var proOption = "<option value=''>-- ເລືອກແຂວງ --</option>";
                        $.each(province,function(index,val){
                            proOption += "<option value='"+val.id+"' "+val.selected+">"+val.value+"</option>";
                        });
                        $('#locationModal .geo-province').html(proOption);

                        var district = data.district;
                        var disOption = "<option value=''>-- ເລືອກເມືອງ --</option>";
                        $.each(district,function(index,val){
                            disOption += "<option value='"+val.id+"' "+val.selected+">"+val.district_name+"</option>";
                        });
                        $('#locationModal .geo-district').html(disOption);
                    }
                }
            });
        }
        $(document).on('change','.geo-province',function(){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/district/'+$(this).val(),
                success:function(data)
                {
                    if(data.success)
                    {
                        var items = data.data;
                        var disOption = "<option value=''>-- ເລືອກເມືອງ --</option>";
                        $.each(items,function(index,val){
                            disOption += "<option value='"+val.id+"'>"+val.district_name+"</option>";
                        });
                        $('#locationModal .geo-district').html(disOption);
                        $('#addShopModal .geo-district').html(disOption);
                    }
                }
            });
        });
        callShopName();
        function getLocation(){
            if (navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position){
            if(position.coords.latitude > 0 && position.coords.longitude)
            {
                $('#input-latitude').val(position.coords.latitude);
                $('#input-longitude').val(position.coords.longitude);
                $('#locationModal').modal('show');
            }
        }
        $('.geo-location').on('click',function(){
            // getLocation();
            $( "#locationModal" ).modal('show');
        });

        $('.geo-add-shop').on('click',function(){
            // getLocation();
            $( "#addShopModal" ).modal('show');
        });

        $( "#locationModal" ).on('shown.bs.modal', function(){
            getLocation();
        });

        $('.btn-submit-geo').on('click',function(){
            var latitude = $('#input-latitude').val();
            var longitude = $('#input-longitude').val();
            var shop_name = $('.input-shop-name').val();
            if(latitude > 0 && longitude > 0 && shop_name != ''){
                $.ajax({
                    type:'post',
                    url:'<?= ($BASE) ?>/goe-location',
                    data:$('#geo-location-form').serialize(),
                    success:function(data){
                        if(data.success){
                            Swal.fire({title:'ສຳເລັດ!',text:data.message,type:'success',timer:1000});
                            $('#locationModal').modal('hide');
                        } else {
                            Swal.fire('ຜິດພາດ!',data.message,'error');
                        }
                    },
                    error:function(){
                        Swal.fire('ຜິດພາດ!','ກະລຸນາລອງໃໝ່','error');
                    }
                });
            } else {
                Swal.fire('ຜິດພາດ!','ໃສ່ຂໍ້ມູນໃຫ້ຄົບກ່ອນ','error');
            }
        });

        $('.btn-submit-add-shop').on('click',function(){
            var shop_name = $('.input-add-shop-name').val();
            if(shop_name != ''){
                $.ajax({
                    type:'post',
                    url:'<?= ($BASE) ?>/goe-add-shop',
                    data:$('#geo-add-shop-form').serialize(),
                    success:function(data){
                        if(data.success){
                            Swal.fire({title:'ສຳເລັດ!',text:data.message,type:'success',timer:1000});
                            handleShopData(data.id);
                            $('#addShopModal').modal('hide');
                            $('#locationModal').modal('show');
                        } else {
                            Swal.fire('ຜິດພາດ!',data.message,'error');
                        }
                    },
                    error:function(){
                        Swal.fire('ຜິດພາດ!','ກະລຸນາລອງໃໝ່','error');
                    }
                });
            } else {
                Swal.fire('ຜິດພາດ!','ໃສ່ຂໍ້ມູນໃຫ້ຄົບກ່ອນ','error');
            }
        });

        $('.member-no').hide();
        $('.check-staff').on('change',function(){
            if($(this).val()=='member_staff'){
                $('.member-no').show();
            } else {
                $('.member-no').hide();
            }
        });

        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: "linked",
            autoclose: true,
        });

        $('#login-modal').on('shown.bs.modal', function (){
            $('#register-modal').modal('hide');
            $('#forgot-password-modal').modal('hide');
        });
        $('#register-modal').on('shown.bs.modal', function (){
            $('#login-modal').modal('hide');
            $('#forgot-password-modal').modal('hide');
        });
        $('#forgot-password-modal').on('shown.bs.modal', function (){
            $('#login-modal').modal('hide');
            $('#register-modal').modal('hide');
        });

        $('.login-modal').on('click',function(){
            $('#login-modal').modal('show');
        });
        $('.register-modal').on('click',function(){
            $('#register-modal').modal('show');
        });
        $('.forgot-password-modal').on('click',function(){
            $('#forgot-password-modal').modal('show');
        });
        var urlParams = new URLSearchParams(window.location.search); //get all parameters
        var login = urlParams.get('login');
        if(login){
            $('#login-modal').modal('show');
        }

        $(document).on('click','.add-to-cart',function(){
            var obj = $(this);
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/add-to-cart/'+obj.attr('product-no')+'/'+obj.attr('product-unit')+'/'+obj.attr('product-price')+'/'+obj.attr('qty'),
                success:function(data){
                    if(data.success == true){
                        if(obj.attr('action') == 'item'){
                            window.location.href='<?= ($BASE) ?>/cart';
                        } else {
                            getBaseCart();
                            $('.sticky-toolbar').addClass('order-cart-event');
                            toastr["success"]('ເພີ່ມເຂົ້າກະຕ໋າສຳເລັດແລ້ວ');
                            setTimeout(function(){
                                $('.sticky-toolbar').removeClass('order-cart-event');
                            },2000)
                        }
                    } else {
                        Swal.fire('ຜິດພາດ!',data.message,'error');
                    }
                },
                error:function(){
                    Swal.fire('ຜິດພາດ!','ກະລຸນາລອງໃໝ່','error');
                }
            });
        });
        getBaseCart();
        function getBaseCart(){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/base-cart',
                success:function(data){
                    if(data.success == true){
                        $('.base-total-qty').text(data.total_qty);
                        $('.base-total-amount').text('₭'+data.total_amount);
                    }
                }
            });
        }

        $('.logout').on('click',function(){
            Swal.fire({
                title: 'ອອກຈາກລະບົບແທ້ບໍ່?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed){
                    $.ajax({
                        type:'get',
                        url:'<?= ($BASE) ?>/logout',
                        success:function(data){
                            if(data.success == true)
                            {
                                location.reload();
                            }
                        }
                    });
                }
            })
        });

        $('.province-id').on('change',function(){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/district/'+$(this).val(),
                success:function(data){
                    if(data.success == true){
                        var label = "<option value=''>-- ເລືອກເມືອງ --</option>";
                        var items = data.data;
                        $.each(items,function(index,item){
                            label += "<option value='"+item.id+"'>"+item.district_name+"</option>";
                        });
                        $('.district-id').html(label);
                    }
                }
            });
        });

        $('.btn-login').on('click',function(){
            var logon_type = $(this).closest('form').find('input[name="logon_type"]:checked');
            var email = $(this).closest('form').find('input[name="email"]');
            var password = $(this).closest('form').find('input[name="password"]');
            var label = $(this).closest('form').find('.password-invalid');
            if(email.val() != '' && password.val() != ''){
                $.ajax({
                    type:'post',
                    url:'<?= ($BASE) ?>/login',
                    data:{'logon_type':logon_type.val(),'email':email.val(),'password':password.val()},
                    success:function(data){
                        if(data.success == true){
                            location.reload();
                        } else {
                            label.removeClass('hide');
                        }
                    },
                    error:function(){
                        Swal.fire("ຜິດພາດ!", "ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
                    }
                });
            }
        });

        $('.btn-register').on('click',function(){
            var registerType = $("select[name='register_type']");
            var LOGON_MEMBER_ID = '<?= ($LOGON_MEMBER_ID) ?>';
            if(LOGON_MEMBER_ID > 0){
                var LOGON_MEMBER_ROLE = '<?= ($LOGON_MEMBER_ROLE) ?>';
                var uri = LOGON_MEMBER_ROLE == 'staff' ? 'action-register-staff' : 'action-register-member';
            } else {
                var uri = registerType.val() == 'staff' ? 'action-register-staff' : 'action-register-member';
            }
            var formData = new FormData(document.getElementById("register-form"));
            if($("#register-form").valid()){
                $.ajax({
                    type: 'post',            
                    url: '<?= ($BASE) ?>/'+uri, 
                    data: formData,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,  
                    beforeSend: function(){
                        $("button.btn-register").prop('disabled', true);
                        $('button.btn-register').css('cursor','not-allowed');
                        $('button.btn-register i.fa').addClass( "fa-refresh fa-spin" );
                    },  
                    success: function(data){
                        if (data.success == true){
                            if(registerType.val() == 'staff'){
                                Swal.fire("ສະໝັກສຳເລັດແລ້ວ!", data.message, "success");
                                $('button.btn-register i.fa').removeClass( "fa-refresh fa-spin" );
                                $('button.btn-register').removeAttr('style');
                                $("button.btn-register").prop('disabled', false);
                                $('form#register-form').trigger("reset"); 
                                $('#register-modal').modal('hide');
                            } else {
                                location.reload();
                            }
                        } else {
                            Swal.fire("ຜິດພາດ!", data.message, "error");
                            $('button.btn-register i.fa').removeClass( "fa-refresh fa-spin" );
                            $('button.btn-register').removeAttr('style');
                            $("button.btn-register").prop('disabled', false);
                            //$('form#submit-form').trigger("reset"); 
                        }
                    },
                    error: function (){
                        Swal.fire("ຜິດພາດ!", "ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
                        $('button.btn-register i.fa').removeClass( "fa-refresh fa-spin" );
                        $('button.btn-register').removeAttr('style');
                        $("button.btn-register").prop('disabled', false);
                    },
                });
            }
        });

        var LOGON_MEMBER_ID = '<?= ($LOGON_MEMBER_ID ?? 0) ?>';
        $("#register-form").validate({
            rules: {
                image: {
                    required: LOGON_MEMBER_ID > 0 ? false : true
                },
                role: {
                    required: true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                gender: {
                    required: true
                },
                dob: {
                    required: true
                },
                province_id: {
                    required: true
                },
                district_id: {
                    required: true
                },
                village_name: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                }
            },
            messages: {
                role: {
                    required: "ກະລຸນາເລືອກສະຖານະ.",
                },
                image: {
                    required: "ກະລຸນາເລືອກຮູບກ່ອນ.",
                },
                first_name: {
                    required: "ກະລຸນາໃສ່ຊື່.",
                },
                last_name: {
                    required: "ກະລຸນາໃສ່ນາມສະກຸນ.",
                },
                gender: {
                    required: "ກະລຸນາໃສ່ເພດ.",
                },
                dob: {
                    required: "ກະລຸນາໃສ່ວັນເດືອນປີເກີດ.",
                },
                province_id: {
                    required: "ກະລຸນາໃສ່ແຂວງ.",
                },
                district_id: {
                    required: "ກະລຸນາໃສ່ເມືອງ.",
                },
                village_name: {
                    required: "ກະລຸນາໃສ່ບ້ານ.",
                },
                address: {
                    required: "ກະລຸນາໃສ່ທີ່ຢູ່.",
                },
                phone: {
                    required: "ກະລຸນາໃສ່ເບີໂທ.",
                },
                email: {
                    required: "ກະລຸນາໃສ່ອີເມວ.",
                    email: "ກະລຸນາໃສ່ອີເມວ."
                },
                password: {
                    required: "ກະລຸນາໃສ່ລະຫັດຜ່ານ.",
                },
                confirm_password: {
                    required: "ກະລຸນາຢືນຢັນລະຫັດຜ່ານ.",
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest('div.form-group').find('div.error'));
            },
            success: function(label) {
                label.remove();
            },
            highlight: function(element, errorClass) {
                $(element).parent().next().find("." + errorClass).removeClass("checked");
            }
        });

        $('.btn-forgot-password').on('click',function(){
            var email = $(this).closest('form').find('input[name=email]');
            var label = $(this).closest('form').find('.email-invalid');
            if(email.val() != '')
            {
                $.ajax({
                    type:'post',
                    url:'<?= ($BASE) ?>/forgot-password',
                    data:{'email':email.val()},
                    success:function(data)
                    {
                        if(data.success == true)
                        {
                            window.location.href="<?= ($BASE) ?>/forgot-password?message="+data.message+'&email='+data.email;
                        } else {
                            label.removeClass('hide');
                        }
                    },
                    error:function()
                    {
                        Swal.fire("ຜິດພາດ!", "ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
                    }
                });
            }
        });

        $('.btn-subscribe').on('click',function(){
            var reg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            var email = $(this).closest('form').find('input[type=email]').val();
            if (reg.test(email))
            {
                $.ajax({
                    type:'post',
                    url:'<?= ($BASE) ?>/subscribe',
                    data:{'email':email},
                    beforeSend: function(){
                        $("button.btn-subscribe").prop('disabled', true);
                        $('button.btn-subscribe').css('cursor','not-allowed');
                        $('button.btn-subscribe i.fa').addClass( "fa-refresh fa-spin" );
                    },
                    success:function(data)
                    {
                        if(data.success == true)
                        {
                            Swal.fire('ຂອບໃຈ!',data.message,'success');
                            $('button.btn-subscribe i.fa').removeClass( "fa-refresh fa-spin" );
                            $('button.btn-subscribe').removeAttr('style');
                            $("button.btn-subscribe").prop('disabled', false);
                        } else {
                            Swal.fire('ຜິດພາດ!',data.message,'error');
                            $('button.btn-subscribe i.fa').removeClass( "fa-refresh fa-spin" );
                            $('button.btn-subscribe').removeAttr('style');
                            $("button.btn-subscribe").prop('disabled', false);
                        }
                    },
                    error:function()
                    {
                        Swal.fire('ຜິດພາດ!','ກະລຸນາລອງໃໝ່ອີກຄັ້ງ','error');
                        $('button.btn-subscribe i.fa').removeClass( "fa-refresh fa-spin" );
                        $('button.btn-subscribe').removeAttr('style');
                        $("button.btn-subscribe").prop('disabled', false);
                    }
                });
            } else {
                Swal.fire('ກະລຸນາປ້ອນອີເມວໃຫ້ຖືກຕ້ອງ');
            }
        });

        $(document).on('click','.fa-heart,.icon_heart_alt',function(){
            heart($(this),$(this).attr('action'));
        });

        function heart(obj,att){
            if(att==1){
                var product_no = obj.closest('li').find('a').attr('product-no');
            } else {
                var product_no = obj.attr('product-no');
            }
            $.ajax({
                type:'post',
                url:'<?= ($BASE) ?>/heart',
                data:{'product_no':product_no},
                success:function(data){
                    obj.removeClass('text-joint-pharma');
                    obj.addClass('text-danger');
                }
            });
        }

        function getStaff(){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/get-staff',
                success:function(data)
                {
                    if(data.success == true)
                    {
                        var label = "<option value=''>-- ເລືອກເຊວ --</option>";
                        $.each(data.items,function(index,value){
                            label += "<option value='"+value.staff_no+"'>"+value.staff_name+"</option>";
                        });
                        $('.register-staff-no').html(label);
                    }
                }
            });
        }
        getStaff();

        $('.profile').on('click',function(){
            $.ajax({
                type:'get',
                url:'<?= ($BASE) ?>/profile',
                success:function(data)
                {
                    if(data.success == true)
                    {
                        var form = $('#register-form');
                        var id = form.find('input[name="id"]').val(data.id);
                        var staff_no = form.find('input[name="staff_no"]').val(data.staff_no);
                        var first_name = form.find('input[name="first_name"]').val(data.first_name);
                        var last_name = form.find('input[name="last_name"]').val(data.last_name);
                        var gender = form.find('select[name="gender"] option');
                        var currency = form.find('select[name="currency_id"] option');
                        currency.each(function(index,item){
                            if(data.currency_id==$(this).attr('value'))
                            {
                                $(this).prop('selected',true);
                            } else {
                                $(this).prop('selected',false);
                            }
                        });
                        gender.each(function(index,item){
                            if(data.gender==$(this).attr('value'))
                            {
                                $(this).prop('selected',true);
                            } else {
                                $(this).prop('selected',false);
                            }
                        });
                        var dob = form.find('input[name="dob"]').val(data.dob);
                        var province_id = form.find('select[name="province_id"] option');
                        province_id.each(function(index,item){
                            if(data.province_id==$(this).val())
                            {
                                $(this).prop('selected',true);
                            } else {
                                $(this).prop('selected',false);
                            }
                        });

                        var label = "<option value=''>-- ເລືອກເມືອງ --</option>";
                        $.each(data.arrDis,function(index,item){
                            if(data.district_id==item.id)
                            {
                                label += "<option value='"+item.id+"' selected>"+item.district_name+"</option>";
                            } else {
                                label += "<option value='"+item.id+"'>"+item.district_name+"</option>";
                            }
                        });
                        $('.district-id').html(label);

                        var village_name = form.find('input[name="village_name"]').val(data.village_name);
                        var address = form.find('textarea[name="address"]').val(data.address);
                        var phone = form.find('input[name="phone"]').val(data.phone);
                        var email = form.find('input[name="email"]').val(data.email);
                        $('#register-modal').modal('show');
                    }
                }
            });
        });

        $('.add-commas').keyup(function(event){
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function(index, value)
            {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        });
    })
    function goto_chat(livechat_enabled)
    {
        if($('.btn-chat-container .btn-chat').hasClass('selected')){
            $('.btn-chat-container .btn-chat').removeClass('selected');$('.btn-chat-container .social-button').removeClass('show');
        } else {
            $('.btn-chat-container .btn-chat').addClass('selected');
            $('.btn-chat-container .btn-chat .text').remove();
            $('.btn-chat-container .social-button').addClass('show');
        }
    }
</script>