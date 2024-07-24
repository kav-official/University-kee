<!-- <div id="preloder">
    <div class="loader"></div>
</div> -->
<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="<?= ($BASE) ?>/"><img src="<?= ($BASE) ?>/uploads/logo/logo.png" alt="LOGO" style="max-width: 80px;"></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
            <li><a href="<?= ($BASE) ?>/cart"><i class="fa fa-shopping-bag"></i> <span class="base-total-qty">0</span></a></li>
        </ul>
        <div class="header__cart__price">ລາຄາ: <span class="base-total-price">₭0</span></div>
    </div>
    <div class="humberger__menu__widget la">
        <!-- <div class="header__top__right__language">
            <img src="<?= ($BASE) ?>/ui/frontend/img/Laos.png" alt="">
            <div>ລາວ</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">ລາວ</a></li>
                <li><a href="#">ອັງກິດ</a></li>
            </ul>
        </div> -->
        <?php if ($LOGON_MEMBER_STATUS): ?>
            
                <div class="header__top__right__language">
                    <i class="fa fa-user"></i>
                    <div><?= ($LOGON_MEMBER_NAME) ?></div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="javascript:void(0)" class="profile">ໂປຣໄຟ</a></li>
                        <li><a href="javascript:void(0)"  class="logout">ອອກລະບົບ</a></li>
                    </ul>
                </div>
            
            <?php else: ?>
                <div class="header__top__right__auth">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user"></i> ເຂົ້າສູ່ລະບົບ</a>
                </div>
            
        <?php endif; ?>
    </div>
    <nav class="humberger__menu__nav mobile-menu la-bold">
        <ul>
            <li class="<?= ($nav=='home' ? 'active la' : 'la') ?>"><a href="<?= ($BASE) ?>/">ໜ້າຫຼັກ</a></li>
            <li class="<?= ($nav=='product' ? 'active la' : 'la') ?>"><a href="<?= ($BASE) ?>/product">ສິນຄ້າ</a></li>
            <!-- <li class="<?= ($nav=='pages' ? 'active' : '') ?>"><a href="#">ເພສ໌</a>
                <ul class="header__menu__dropdown">
                    <li class="<?= ($subnav=='product-detail' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/product-detail">Product Detail</a></li>
                    <li class="<?= ($subnav=='cart' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/cart">Cart</a></li>
                    <li class="<?= ($subnav=='shoping-cart' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/checkout">Check Out</a></li>
                    <li class="<?= ($subnav=='blog-details' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/blog-details">Blog Details</a></li>
                </ul>
            </li> -->
            <li class="<?= ($nav=='activity' ? 'active la' : 'la') ?>"><a href="<?= ($BASE) ?>/activity">ກິດຈະກຳ</a></li>            
            <li class="<?= ($nav=='vacancies' ? 'active la' : 'la') ?>"><a href="<?= ($BASE) ?>/vacancies">ສະໝັກວຽກ</a></li>
            <li class="<?= ($nav=='about' ? 'active la' : 'la') ?>"><a href="<?= ($BASE) ?>/about">ກ່ຽວກັບ</a></li>
            <li class="<?= ($nav=='contact' ? 'active la' : 'la') ?>"><a href="<?= ($BASE) ?>/contact">ຕິດຕໍ່</a></li>
            <?php if ($LOGON_MEMBER_STATUS == true && $LOGON_MEMBER_TYPE == 'staff'): ?>
                
                    <li class="<?= ($nav=='staff' ? 'active' : '') ?>"><a href="#">ຂໍ້ມູນພ/ງ</a>
                        <ul class="header__menu__dropdown">
                            <li><a class="member-link la" style="cursor: pointer;">ລິ້ງເພີ່ມສະມາຊິກ <i class="fa fa-users" aria-hidden="true"></i></a></li>
                            <li><a class="geo-location la" style="cursor: pointer;">ປັກມຸດ <i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
                            <li><a class="geo-add-shop la" style="cursor: pointer;">ເພີ່ມຮ້ານ <i class="fa fa-shop" aria-hidden="true"></i></a></li>
                            <li><a href="<?= ($BASE) ?>/orders/staff" class="la">ສັ່ງຊື້</a></li>
                            <li><a href="<?= ($BASE) ?>/price-list/staff" class="la">ເບິ່ງລາຍການ Price list</a></li>
                            <li><a href="<?= ($BASE) ?>/orders/history" class="la">ປະຫວັດການສັ່ງຊື້</a></li>
                            <li><a href="<?= ($BASE) ?>/orders/report" class="la">ສະຫຼຸບຍອດ</a></li>
                            <?php if ($LOGON_MEMBER_TYPE == 'staff' && $LOGON_MEMBER_ROLE == 3): ?>
                                
                                    <li><a href="<?= ($BASE) ?>/products/<?= ($LOGON_STAFF_NO) ?>/<?= ($LOGON_MEMBER_NAME) ?>" class="la">ສິນຄ້າ</a></li>
                                
                            <?php endif; ?>
                        </ul>
                    </li>
                
            <?php endif; ?>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="https://www.facebook.com/jointdevelopmentpharma" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://api.whatsapp.com/send?phone=85602056877778&text=" target="_blank"><i class="fa fa-whatsapp"></i></a>
        <!-- <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a> -->
    </div>
    <div class="humberger__menu__contact la">
        <ul>
            <li><i class="fa fa-envelope"></i> jointpharma@gmail.com</li>
            <li>ຄ່າຂົນສົ່ງຟຣີໃນ 7 km</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header shadow mb-10">
    <div class="header__top" style="background-color: #059862;">
        <div class="container">
            <div class="row la">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li style="color: #ffffff;"><i class="fa fa-envelope" style="color: #ffffff;"></i> jointpharma@gmail.com</li>
                            <li style="color: #ffffff;">ຄ່າຂົນສົ່ງຟຣີໃນ 7 km</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/jointdevelopmentpharma"><i class="fa fa-facebook" style="color: #ffffff;"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=85602056877778&text=" target="_blank"><i class="fa fa-whatsapp" style="color: #ffffff;"></i></a>
                        </div>
                        
                        <?php if ($LOGON_MEMBER_STATUS): ?>
                            
                                <div class="header__top__right__language">
                                    <i class="fa fa-user" style="color: #ffffff;"></i>
                                    <div style="color: #ffffff;"><?= ($LOGON_MEMBER_NAME) ?></div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="javascript:void(0)" class="profile">ໂປຣໄຟ</a></li>
                                        <li><a href="javascript:void(0)"  class="logout">ອອກລະບົບ</a></li>
                                    </ul>
                                </div>
                            
                            <?php else: ?>
                                <div class="header__top__right__auth">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login-modal" style="color: #ffffff;"><i class="fa fa-user" style="color: #ffffff;"></i> ເຂົ້າສູ່ລະບົບ</a>
                                </div>
                            
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="<?= ($BASE) ?>/"><img src="<?= ($BASE) ?>/uploads/logo/logo.png" alt="LOGO" style="max-width: 80px;"></a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="header__menu la-bold">
                    <ul>
                        <li class="<?= ($nav=='home' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/">ໜ້າຫຼັກ</a></li>
                        <li class="<?= ($nav=='product' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/product">ສິນຄ້າ</a></li>
                        <li class="<?= ($nav=='activity' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/activity">ກິດຈະກຳ</a></li>            
                        <li class="<?= ($nav=='vacancies' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/vacancies">ສະໝັກວຽກ</a></li>
                        <li class="<?= ($nav=='about' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/about">ກ່ຽວກັບ</a></li>
                        <li class="<?= ($nav=='contact' ? 'active' : '') ?>"><a href="<?= ($BASE) ?>/contact">ຕິດຕໍ່</a></li>
                        <?php if ($LOGON_MEMBER_STATUS == true && $LOGON_MEMBER_TYPE == 'staff'): ?>
                            
                                <li class="<?= ($nav=='staff' ? 'active' : '') ?>"><a href="#">ຂໍ້ມູນພ/ງ</a>
                                    <ul class="header__menu__dropdown">
                                        <li><a class="member-link la" style="cursor: pointer;">ລິ້ງເພີ່ມສະມາຊິກ <i class="fa fa-users" aria-hidden="true"></i></a></li>
                                        <li><a class="geo-location la" style="cursor: pointer;">ປັກມຸດ <i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
                                        <li><a class="geo-add-shop la" style="cursor: pointer;">ເພີ່ມຮ້ານ <i class="fa fa-shop" aria-hidden="true"></i></a></li>
                                        <li><a href="<?= ($BASE) ?>/orders/staff" class="la">ສັ່ງຊື້</a></li>
                                        <li><a href="<?= ($BASE) ?>/price-list/staff" class="la">ເບິ່ງລາຍການ Price list</a></li>
                                        <li><a href="<?= ($BASE) ?>/orders/history" class="la">ປະຫວັດການສັ່ງຊື້</a></li>
                                        <li><a href="<?= ($BASE) ?>/orders/report" class="la">ສະຫຼຸບຍອດ</a></li>
                                        <?php if ($LOGON_MEMBER_TYPE == 'staff' && $LOGON_MEMBER_ROLE == 3): ?>
                                            
                                                <li><a href="<?= ($BASE) ?>/products/<?= ($LOGON_STAFF_NO) ?>/<?= ($LOGON_MEMBER_NAME) ?>" class="la">ສິນຄ້າ</a></li>
                                            
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header__cart la">
                    <ul>
                        <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                        <li><a href="<?= ($BASE) ?>/cart"><i class="fa fa-shopping-bag"></i> <span class="base-total-qty">0</span></a></li>
                    </ul>
                    <div class="header__cart__price">ລາຄາ: <span class="base-total-amount">₭0</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<?php if ($nav=='home'): ?>
    
    <!-- Hero Section Begin -->
        <!-- <section class="hero hero-normal">
            <div class="container">
                <br/>
                <div class="row">
                    <div class="col-lg-12 text-center banner-img-social">
                        <a  href="https://line.me/ti/p/@jrh5425j" target="_blank"><img src="<?= ($BASE) ?>/uploads/images/line.png"/></a>
                        <a href="tel:02022211231"><img src="<?= ($BASE) ?>/uploads/images/call.png"/></a>
                        <a href="https://api.whatsapp.com/send?phone=85602056877778&text=" target="_blank"><img src="<?= ($BASE) ?>/uploads/images/whatsapp.png"/></a>
                        <a href="https://www.facebook.com/jointdevelopmentpharma" target="_blank"><img src="<?= ($BASE) ?>/uploads/images/fb.png"/></a>
                    </div>
                </div>
                <br/>
            </div>
        </section> -->
        <br/>
        <br/>
    
<?php endif; ?>
<!-- Hero Section Begin -->