<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="<?= ($BASE) ?>/"><img src="<?= ($BASE) ?>/uploads/logo/logo.png" alt="" style="max-width: 100px;"></a>
                    </div>
                    <ul>
                        <!-- <li>Address: 60-49 Road 11378 New York</li> -->
                        <li class="la">ບໍລິສັດ ຮ່ວມພັດທະນາການຢາ ຂາອອກ - ຂາເຂົ້າ ຈຳກັດ ຕັ້ງຢູ່ບ້ານໄຊສະຫວ່າງ ຖະໜົນເລກ 10(ວົງວຽນດອນໜູນ ຕໍ່ໜ້າຫ້ອງການໄຟຟ້າເມືອງໄຊທານີ), ເມືອງໄຊທານີ ນະຄອນຫຼວງວຽງຈັນ.
                            ຈຳໜ່່າຍຢາ, ອຸປະກອນການແພດ, ເຄື່ອງສຳອາງ ແລະ ຜະລິດຕະພັນເສີມອາຫານ.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget la">
                    <h6 class="la-bold">ທາງລັດ</h6>
                    <ul>
                        <li><a href="<?= ($BASE) ?>/">ໜ້າຫຼັກ</a></li>
                        <li><a href="<?= ($BASE) ?>/product">ສິນຄ້າ</a></li>
                        <li><a href="<?= ($BASE) ?>/about">ກ່ຽວກັບ</a></li>
                        <li><a href="<?= ($BASE) ?>/activity">ກິດ​ຈະ​ກໍາ​</a></li>
                        <li><a href="<?= ($BASE) ?>/vacancies">ສະໝັກວຽກ</a></li>
                        <li><a href="<?= ($BASE) ?>/contact">ຕິດຕໍ່</a></li>
                    </ul>
                    <!-- <ul>
                        <li><a href="<?= ($BASE) ?>/​blog">ບຼອກສິນຄ້າ</a></li>
                    </ul> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6 class="la-bold">ສະໝັກອີເມວ</h6>
                    <p class="la">ສະໝັກອີເມວເພື່ອຮັບຂໍ້ມູນໃໝ່ໆຈາກພວກເຮົາ.</p>
                    <form>
                        <input type="email" placeholder="ອີເມວ" class="la">
                        <button type="button" class="site-btn btn-subscribe la">ຕົກລົງ <i class="fa"></i></button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="https://www.facebook.com/jointdevelopmentpharma" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=85602056877778&text=" target="_blank"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Joint Pharma
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <!-- <div class="footer__copyright__payment"><img src="<?= ($BASE) ?>/ui/frontend/img/payment-item.png" alt=""></div> -->
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Login Modal -->
<div class="modal" id="login-modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
            <button type="button" class="close text-danger" data-dismiss="modal" style="margin-top: -15px; margin-right: -7px;">&times;</button>
            <br/>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="text-fresh-dee la-bold">ເຂົ້າສູ່ລະບົບ</h3>
                    <br/>
                </div>
                <div class="col-md-12">
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="la"><input type="radio" name="logon_type" value="member" checked>&nbsp;ຂ້ອຍແມ່ນສະມາຊິກ</label>&nbsp;&nbsp;
                                <label class="la"><input type="radio" name="logon_type" value="staff">&nbsp;ຂ້ອຍແມ່ນເຊວ</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="email" class="form-control la" placeholder="ອີເມວ" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input type="password" name="password" class="form-control la" placeholder="ລະຫັດຜ່ານ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-danger password-invalid hide la">ອີເມວ/ລະຫັດຜ່ານ ບໍ່ຖືກຕ້ອງ</div>
                        </div> 
                        <div class="form-group">
                            <button type="button" class="btn btn-fresh-dee btn-block btn-login la">ຕົກລົງ</button>
                        </div>
                        <?php if ($LOGON_MEMBER_STATUS==false): ?>
                            
                                <p class="text-right">
                                    <a href="javascript:void(0)" class="text-danger forgot-password-modal la">ລື່ມລະຫັດຜ່ານ?</a>&nbsp;
                                    <a href="javascript:void(0)" class="text-info la register-modal">ສະໝັກສະມາຊິກ</a>
                                </p>
                            
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<!-- member link Modal -->
  <div class="modal fade bd-example-modal-lg" id="member-link" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title la" id="exampleModalLongTitle">ລິ້ງເພີ່ມສະມາຊິກ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="input-group">																
                    <input type="text" class="form-control member-link-text" value="https://jointpharmalaos.com/staff/add-staff/<?= ($LOGON_STAFF_NO) ?>" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-primary member-link-copy" type="button">Copy</button>
                    </div>
                </div>
                <br>
                <div class="form-group text-center member-link-copied hide">
                    <p class="alert alert-success">ລິ້ງສະມາຊິກຖືກກອບປີແລ້ວ</p>
                </div>

            </div>
            <div class="modal-footer"></div>
          </div>
    </div>
  </div>


  <!-- Register Modal -->
    <div class="modal" id="register-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-fresh-dee la-bold">ຟອມສະໝັກສະມາຊິກ / ພະນັກງານຂາຍ</h4>
                    <button type="button" class="close text-danger" data-dismiss="modal" style="margin-top: -33px; margin-right: -25px;">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="register-form">
                        <input name="id" hidden="true" type="text" value=""/>
                        <div class="row">
                            <?php if ($LOGON_MEMBER_NO == null): ?>
                                
                                    <div class="col-md-6">
                                        <div class="form-group la">
                                            <label>ຈຸດປະສົງການສະໝັກ</label>
                                            <select name="register_type" class="form-control check-staff">
                                                <option value="member">ເປັນສະມາຊິກທົ່ວໄປ</option>
                                                <option value="member_staff">ເປັນສະມາຊິກໃຕ້ການດູແລຂອງເຊວ</option>
                                                <option value="staff">ເປັນເຊວ</option>
                                            </select>
                                        </div>
                                    </div>
                                
                            <?php endif; ?>
                            
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ອອກບິນດ້ວຍສະກຸນເງິນ</label>
                                    <select name="currency_id" class="form-control">
                                        <option value="1">₭</option>
                                        <option value="2">฿</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ຮູບໃບໜ້າ/ຮູບໃບວິສະຫະກິດ/ຮູບໜ້າຮ້ານ</label>
                                    <input name="image" class="form-control" type="file">
                                    <div class="error"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 member-no">
                                <div class="form-group la">
                                    <label>ເລືອກເຊວ</label>
                                    <select name="staff_no" class="form-control register-staff-no">
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ຊື່</label>
                                    <input name="first_name" class="form-control" placeholder="ຊື່" type="text">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ນາມສະກຸນ</label>
                                    <input name="last_name" class="form-control" placeholder="ນາມສະກຸນ" type="text">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ເພດ</label>
                                    <select name="gender" class="form-control">
                                        <option value="">-- ເລືອກເພດ --</option>
                                        <option value="male">ຊາຍ</option>
                                        <option value="female">ຍິງ</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ວັນເດືອນປີເກີດ</label>
                                    <input name="dob" type="text" placeholder="yyyy-mm-dd" autocomplete="off" class="form-control date-picker"/>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ແຂວງ</label>
                                    <select name="province_id" class="form-control province-id">
                                        <option value="">-- ເລືອກແຂວງ --</option>
                                        <?= ($custom->renderArraySelect($custom->province(),''))."
" ?>
                                    </select>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ເມືອງ</label>
                                    <select name="district_id" class="form-control district-id">
                                        <option value="">-- ເລືອກເມືອງ --</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ບ້ານ</label>
                                    <input type="text" name="village_name" class="form-control" placeholder="ບ້ານ">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ທີ່ຢູ່</label>
                                    <textarea name="address" class="form-control" placeholder="ທີ່ຢູ່"></textarea>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ເບີໂທ</label>
                                    <input name="phone" class="form-control" placeholder="ເບີໂທ" type="text">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ອີເມວ</label>
                                    <input name="email" class="form-control" placeholder="ອີເມວ" type="email">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ລະຫັດຜ່ານ</label>
                                    <input type="text" name="password" class="form-control" placeholder="ລະຫັດຜ່ານ">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group la">
                                    <label>ຢືນຢັນລະຫັດຜ່ານ</label>
                                    <input type="text" name="confirm_password" class="form-control" placeholder="ຢືນຢັນລະຫັດຜ່ານ">
                                    <div class="error"></div>
                                </div>
                            </div>
                            <?php if ($LOGON_MEMBER_STATUS==false): ?>
                                
                                    <div class="col-md-12">
                                        <p class="text-right">
                                            <a href="javascript:void(0)" class="text-info la login-modal">ເຂົ້າສູ່ລະບົບ</a>
                                        </p>
                                    </div>
                                
                            <?php endif; ?>                            
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-fresh-dee btn-register la">ຕົກລົງ <i class="fa"></i></button>
                    <button type="button" class="btn btn-secondary la" data-dismiss="modal">ປິດ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal" id="forgot-password-modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close text-danger" data-dismiss="modal" style="margin-top: -15px; margin-right: -7px;">&times;</button>
                    <br/>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="text-fresh-dee la-bold">ລື່ມລະຫັດຜ່ານ</h3>
                            <br/>
                        </div>
                        <div class="col-md-12">
                            <form>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope-o" aria-hidden="true"></i> </span>
                                        </div>
                                        <input name="email" class="form-control la" placeholder="ອີເມວ" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text-danger email-invalid hide la">ບໍ່ພົບໝາຍເລກອີເມວນີ້</div>
                                </div> 
                                <div class="form-group">
                                    <button type="button" class="btn btn-fresh-dee btn-block btn-forgot-password la">ຕົກລົງ</button>
                                </div>
                                <p class="text-right">
                                    <a href="javascript:void(0)" class="text-danger login-modal la">ເຂົ້າສູ່ລະບົບ</a>&nbsp;
                                    <a href="javascript:void(0)" class="text-info la register-modal">ສະໝັກສະມາຊິກ</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal" id="locationModal">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content div-geo">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close text-danger" data-dismiss="modal" style="margin-top: -15px; margin-right: -7px;">&times;</button>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="text-fresh-dee la-bold">ປັກມຸດ</h3><br/>
                        </div>
                        <div class="col-md-12">
                            <form id="geo-location-form">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <input type="text" name="latitude" id="input-latitude" class="form-control" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="longitude" id="input-longitude" class="form-control" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <select class="geo-shop-name" name="base_shop_id" id="select-field" style="width: 100%;"></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="hidden" name="shop_id" class="input-shop-id">
                                            <input type="text" name="shop_name" class="form-control input-shop-name" placeholder="ຊື່ຮ້ານ" autocomplete="off" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="geo-province form-control" name="province_id" style="width: 100%;"></select>
                                        </td>
                                        <td>
                                            <select class="geo-district form-control" name="district_id" style="width: 100%;"></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="village" class="geo-village form-control" placeholder="ບ້ານ">
                                        </td>
                                        <td>
                                            <input type="text" name="address" class="geo-address form-control" placeholder="ລາຍລະອຽດທີ່ຢູ່">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="shop_phone" class="form-control input-shop-phone" placeholder="ເບີໂທຮ້ານ" autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text" name="shop_email" class="form-control input-shop-email" placeholder="ອີເມວ" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="checkin"><input type="radio" name="geolocation" id="checkin" value="checkin" checked>&nbsp;Check In</label>&nbsp;&nbsp;
                                            <label for="checkout"><input type="radio" name="geolocation" id="checkout" value="checkout">&nbsp;Check Out</label>
                                        </td>
                                        <td class="text-right">
                                            <label for="get-item"><input type="checkbox" name="get_item" id="get-item" value="YES">&nbsp;ໄດ້ລາຍການ</label>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-fresh-dee btn-submit-geo la">ຕົກລົງ <i class="fa"></i></button>
                    <button type="button" class="btn btn-danger la" data-dismiss="modal">ປິດ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal" id="addShopModal">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content div-geo">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close text-danger" data-dismiss="modal" style="margin-top: -15px; margin-right: -7px;">&times;</button>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="text-fresh-dee la-bold">ເພີ່ມຮ້ານຄ້າ</h3><br/>
                        </div>
                        <div class="col-md-12">
                            <form id="geo-add-shop-form">
                                <input type="hidden" class="shop-id" name="id">
                                <table class="table">
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" name="shop_name" class="form-control input-add-shop-name" placeholder="ຊື່ຮ້ານ" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control geo-province" name="province_id" style="width: 100%;"></select>
                                        </td>
                                        <td>
                                            <select class="form-control geo-district" name="district_id" style="width: 100%;"></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="village" class="form-control shop-village" placeholder="ບ້ານ">
                                        </td>
                                        <td>
                                            <input type="text" name="address" class="form-control address" placeholder="ລາຍລະອຽດທີ່ຢູ່">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="shop_phone" class="form-control shop-phone" placeholder="ເບີໂທຮ້ານ" autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text" name="shop_email" class="form-control shop-email" placeholder="ອີເມວ" autocomplete="off">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-striped">
                                    <thead>
                                        <tr id="staff-shop-area" class="la-bold">
                                            <th>ຊື່ຮ້ານ</th>
                                            <th>ທີ່ຢູ່</th>
                                            <th>ເບີໂທ</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-fresh-dee btn-submit-add-shop la">ຕົກລົງ <i class="fa"></i></button>
                    <button type="button" class="btn btn-danger la" data-dismiss="modal">ປິດ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="side-btn-wrap-join">
        <a class="side-btn-join scrollto-join" href="<?= ($BASE) ?>/cart">
            <span class="registerForm-join transitionCls-join">
                <i class="fa fa-shopping-bag"></i>
            </span>
            <p class="base-total-qty footer-card">0</p>
        </a>
    </div> -->

    <div class="btn-chat-container">
        <div class="btn btn-chat">
            <div class="close-icon" onclick="goto_chat();"></div>
            <div class="icon"></div>
        </div>
        <ul class="social-button">
            <li class="btn btn-email">
                <a href="mailto:jointdevelopmentpharma@gmail.com" target="_blank">
                    <div class="icon"></div>
                    <div class="text">jointdevelopmentpharma@gmail.com</div>
                </a>
            </li>
            <!-- <li class="btn btn-youtube">
                <a target="_blank" href="https://www.youtube.com/itvalu">
                    <div class="icon"></div>
                    <div class="text">itvalu</div>
                </a>
            </li> -->
            <li class="btn btn-facebook">
                <a href="https://www.facebook.com/jointdevelopmentpharma" target="_blank">
                    <div class="icon"></div>
                    <div class="text">Jointpharma Ceutical Lao</div>
                </a>
            </li>
            <li class="btn btn-line">
                <a href="https://line.me/ti/p/@jrh5425j" target="_blank">
                    <div class="icon"></div>
                    <div class="text">@jrh5425j</div>
                </a>
            </li>
            <li class="btn btn-mobile">
                <a href="tel:02022211231" target="_blank">
                    <div class="icon"></div>
                    <div class="text">020 22211231</div>
                </a>
            </li>
            <li class="btn btn-whatsapp">
                <a href="https://api.whatsapp.com/send?phone=85602056877778&text=" target="_blank">
                    <div class="icon"></div>
                    <div class="text">020 56877778</div>
                </a>
            </li>
        </ul>
    </div>

    <ul class="sticky-toolbar nav flex-column pl-2 pr-1 pt-1">
        <!--begin::Item-->
        <li class="nav-item mb-2 side-btn-wrap-join" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos">
            <a class="side-btn-join scrollto-join" href="<?= ($BASE) ?>/cart">
                <span class="registerForm-join transitionCls-join">
                    <i class="fa fa-shopping-bag"></i>
                </span>
                <span class="base-total-qty footer-card">0</span>
            </a>
        </li>
    </ul>