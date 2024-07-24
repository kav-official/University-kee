<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ກ່ຽວກັບ</title>
    <?php echo $this->render('frontend/inc/header.html',NULL,get_defined_vars(),0); ?>
</head>

<body>
    <!-- Page Preloder -->
    <?php echo $this->render('frontend/inc/nav.html',NULL,get_defined_vars(),0); ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= ($BASE) ?>/ui/frontend/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 class="la-bold">404</h2>
                        <div class="breadcrumb__option la">
                            <a href="<?= ($BASE) ?>/">ໜ້າຫຼັກ</a>
                            <span>404</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <h2 class="la-bold text-danger">
                        <strong>404 ບໍ່ພົບໜ້າເວັບ</strong>
                    </h2>
                    <div class="la">
                        <a href="<?= ($BASE) ?>/" class="btn btn-primary"><i class="fa fa-home"></i> ກັບໄປໜ້າຫຼັກ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section Begin -->
    <?php echo $this->render('frontend/inc/footer.html',NULL,get_defined_vars(),0); ?>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <?php echo $this->render('frontend/inc/script.html',NULL,get_defined_vars(),0); ?>
</body>
</html>