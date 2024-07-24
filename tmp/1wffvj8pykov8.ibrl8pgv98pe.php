<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="description" content="">
    <meta name="keywords" content="Ogani, unica, creative, html"> -->
    <meta name="description" content="<?= ($SITE_DOMAIN) ?>"/>
    <meta property="og:url" content="https://mict.gov.la/">
    <meta property="og:title" content="Jointpharma Ceutical Lao"/>
    <meta property="og:image" content="<?= ($BASE) ?>/uploads/logo/logo.png"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ໜ້າຫຼັກ</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3311914409996817"
     crossorigin="anonymous"></script>
    <?php echo $this->render('frontend/inc/header.html',NULL,get_defined_vars(),0); ?>
</head>

<body>
    <?php echo $this->render('frontend/inc/nav.html',NULL,get_defined_vars(),0); ?>
    <section class="categories">
        <div class="container">
            <?php if (count($discountItems) > 0): ?>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="la-bold">ໂປໂມຊັນ</h2>
                                <br/>
                            </div>
                        </div>
                        <div class="product__discount__dashboard__slider owl-carousel">
                            <?php foreach (($discountItems?:[]) as $discountRow): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 joint-pharma-div">
                                    <div class="product__discount__item">
                                        <a href="<?= ($BASE) ?>/product/<?= ($discountRow['product_no']) ?>">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="<?= ($discountRow['image']) ?>">
                                                <div class="product__discount__percent">-<?= ($discountRow['percent']) ?>%</div>                                    
                                            </div>
                                        </a>
                                        
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12">
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="javascript:void(0)" product-no="<?= ($discountRow['product_no']) ?>"><i class="fa fa-heart text-joint-pharma" action="1"></i></a></li>
                                                    <li><a href="javascript:;" class="add-to-cart" product-no="<?= ($discountRow['product_no']) ?>" product-unit="<?= ($discountRow['unit_id']) ?>" product-price="<?= ($discountRow['price']-(($discountRow['price']*$discountRow['percent'])/100)) ?>" qty="1" action="all"><i class="fa fa-shopping-cart text-joint-pharma"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="product__discount__item__text">
                                            <h5 class="la"><a href="<?= ($BASE) ?>/product/<?= ($discountRow['product_no']) ?>"><?= ($discountRow['product_name']) ?></a></h5>
                                            <div class="product__item__price">฿<?= ($discountRow['price']-(($discountRow['price']*$discountRow['percent'])/100)) ?><span style="text-decoration: line-through;color: black;">฿<?= (number_format($discountRow['price'])) ?> </span></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                
            <?php endif; ?>
        </div>
    </section>
    <section class="featured spad" id="app">
        <div class="container">
            <div class="row" id="elementtoScrollToID">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="la-bold">ລາຍການສິນຄ້າ</h2>
                        <br/>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 la mb-3">
                    <span>ປະເພດສິນຄ້າ</span>
                    <select name="categid"  v-model="categid" v-on:change="getFIlter" class="categid" style="border: 1px solid #ebebeb; height: 47px; width: 100%;">
                        <option value="">ທັງໝົດ</option>
                        <?= ($custom->renderArraySelect($arrCateg,"categid"))."
" ?>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 mb-3 la">
                    <span>ຄົ້ນຫາສິນຄ້າ</span>
                    <div class="hero__search__form">
                        <form>                                          
                            <input type="text" name="filter" v-model="filter" v-on:keyup="getFIlter"  class="filter" placeholder="ຄົ້ນຫາສິນຄ້າ">
                            <button type="button" class="site-btn btn-filter">ຄົ້ນຫາ</button>
                        </form>
                    </div>
                </div>
            </div>
            <br/><br/>

            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat joint-pharma-div mb-3" v-for="item in items">
                    <div class="featured__item">
                        <a v-bind:href="'<?= ($BASE) ?>/product/'+item.product_no" class="la">
                            <div class="product__discount__item__pic set-bg" :style="{ backgroundImage: 'url(' + item.image + ')' }"></div>
                        </a>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="javascript:void(0)" v-bind:product-no="item.product_no"><i class="fa fa-heart text-joint-pharma" action="1"></i></a></li>
                                    <template v-if="item.percent > 0">
                                        <li><a href="javascript:;" class="add-to-cart" v-bind:product-no="item.product_no" v-bind:product-unit="item.unit_id"  v-bind:product-price="item.price-((item.price*item.percent)/100)" v-bind:qty="1" action="all"><i class="fa fa-shopping-cart text-joint-pharma"></i></a></li>
                                    </template>
                                    <template v-else>
                                        <li><a href="javascript:;" class="add-to-cart" v-bind:product-no="item.product_no" v-bind:product-unit="item.unit_id"  v-bind:product-price="item.price" v-bind:qty="1" action="all"><i class="fa fa-shopping-cart text-joint-pharma"></i></a></li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div class="featured__item__text">
                            <h6><a v-bind:href="'<?= ($BASE) ?>/product/'+item.product_no" class="la">{{ item.product_name }}</a></h6>
                            <template>
                                <h5>฿{{ Number(item.price).toLocaleString() }} </h5>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row featured__filter">
                <div class="col-lg-12">
                    <div class="product__pagination">
                        <a href="#" aria-label="Previous" v-if="pagination.current_page > 1" @click.prevent="changePage(1)">
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </a>
                
                        <a href="#" aria-label="Previous" v-if="pagination.current_page > 1" @click.prevent="changePage(pagination.current_page - 1)">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                
                        <a href="#" v-for="page in pagesStaffNumber" v-bind:class="[ page == isStaffActived ? 'active' : '']" 
                        @click.prevent="changePage(page)">{{ page }}</a>
                        
                        <a href="#" class="disabled" v-if="pagination.current_page < pagination.pages">
                            <span>...</span>
                        </a>
                        <a href="#" aria-label="Next" v-if="pagination.current_page < pagination.pages" @click.prevent="changePage(pagination.pages)">
                            {{pagination.pages}}
                        </a>
                
                        <a href="#" aria-label="Next" v-if="pagination.current_page < pagination.pages" 
                        @click.prevent="changePage(formatNumber(pagination.current_page) + 1)">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    
                        <a href="#" aria-label="Next" v-if="pagination.current_page < pagination.pages" @click.prevent="changePage(pagination.pages)">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>
    </section>


    <section class="from-blog spad">
        <div class="container"  style="width: auto;height: auto;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <img src="<?= ($BASE) ?>/uploads/images/bcelone.jpg" class="" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2 class="la-bold">ນະໂຍບາຍ</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h5 class="la">ການຈັດສົ່ງຫາກເກີນ 7 km ມີຄ່າສົ່ງ 10,000 kip / 1kg</h5><br/>
                    <ol class="la">
                        <li>ເມື່ອເລືອກສິນຄ້າຕາມສະເປັກແລ້ວແລະເບິ່ງລາຍລະອຽດສິນຄ້າແລ້ວກະລຸນາສັງຊື້ຕາມຈຳນວນ ແລະລາຄາ</li>
                        <li>ເມື່ອລູກຄ້າສັ່ງຊື້ ຊຳລະເງິນແລ້ວຖືວ່າການສັ່ງຊື້ສຳເລັດພ້ອມລໍຮັບສິນຄ້າ</li>
                        <li>ເມື່ອສັ່ງຊື້ແລະໂອນເງິນແລ້ວບໍ່ສາມາດຍົກເລີກໄດ້</li>
                        <li>ເມື່ອສິນຄ້າຫາກຖືກເລືອກຊື້ດ້ວຍຕົວເອງແລະຮັບເຄື່ອງແລ້ວຖ້າບໍ່ຖືກໃຈກະລຸນາໂທ: 020 2221 1231 ຫຼື ພົວພັນຂົນສົ່ງ ເວລາມອບຮັບ ຫຼື ຫາກສົ່ງເຄື່ອງຄືນ ຄ່າຂົນສົ່ງ ທາງ ຜູ້ຮັບສົ່ງຈະບໍ່ສົ່ງຄືນ</li>
                        <li>ຊຳລະເງິນດ້ວຍຊ່ອງທາງການໂອນຜ່ານທະນາຄານ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <?php echo $this->render('frontend/inc/footer.html',NULL,get_defined_vars(),0); ?>
    <!-- Footer Section End -->
    <?php echo $this->render('frontend/inc/script.html',NULL,get_defined_vars(),0); ?>
    <script type="text/javascript">
        const App = new Vue({
            el:"#app",
            data:{
                items:[],
                pagination: {
                    total: 0,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 5,
                per_page: 52,
                categid:"",
                filter:""
            },
            methods:{
                getFIlter:function(){
                    this.fetchData()
                },
                fetchData:function(){
                    axios.get('<?= ($BASE) ?>/home/product?page='+this.pagination.current_page+'&limit='+this.per_page+'&filter='+this.filter+'&categid='+this.categid)
                    .then(response => {
                        this.items = response.data.data;
                        this.pagination = response.data.pagination;
                    })
                },
                formatNumber(txt) {
                    return parseInt(txt)
                },
                changePage (page) {
                    this.pagination.current_page = page;
                    this.fetchData();
                },
            },
            computed:{
                isStaffActived: function () {
                    return this.pagination.current_page;
                },
                pagesStaffNumber: function () {
                    if (!this.pagination.to){
                        return [];
                    }
                    var from = this.pagination.current_page - this.offset;
                    if (from < 1){
                        from = 1;
                    }
                    var to = from + (this.offset * 2);
                    if (to >= this.pagination.pages){
                        to = this.pagination.pages;
                    }
                    var pagesArray = [];
                    while (from <= to) {
                        pagesArray.push(from);
                        from++;
                    }
                    return pagesArray;
                },
            },
            created(){
                this.fetchData('','');
            },
        })
    </script>
</body>
</html>