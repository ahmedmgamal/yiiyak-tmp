<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'PV-Radar';

?>

<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <div class="st-pusher">
        <div class="st-content">
            <div class="st-content-inner">

                <!-- FULL SCREEN SLIDER -->
                <section id="slider-wrapper" class="layer-slider-wrapper layer-slider-fullsize">
                    <div id="layerslider" style="width:100%; ">
                        <!-- Slide 1 -->
                        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
                            <!-- Slide background -->
                            <?= Html::img('@web/images/backgrounds/full-bg-7.jpg',['class' => 'ls-bg' , 'style' => 'width: 100%' , 'alt' => 'Slide background']); ?>
                            <!-- Center title -->
                            <h3 class="ls-l title-lg c-white text-uppercase text-center strong-700" style="width:100%; top:35%; left:50%;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                              <?= Yii::t('app','  No worries, we follow up'); ?>
                            </h3>

                            <!-- Center paragraph -->
                            <p class="ls-l text-standard text-center c-white" style="width: 900px; top: 50%; left: 50%;" data-ls="offsetxin:-250;offsetyin:-;durationin:1000;delayin:1000;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                             <?= Yii::t('app',' Sometimes when you innovate, you make mistakes. It is best to admit them quickly, <br>
                                and get on with improving your other innovations.')?>
                            </p>

                            <?= Html::a('Login',Url::toRoute(['site/login']),['class' => 'btn btn-lg btn-base-1 ls-l' ,  'style' => "top: 70%; left: 40%;" ,'data-ls' =>"offsetxin: 0; offsetyin: 250; durationin: 1000; delayin: 1000; offsetxout: 0; offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;"]); ?>

                            <a href="#section-7" class="btn btn-lg btn-b-white ls-l scroll-me" style="top: 70%; left: 55%;" data-ls="offsetxin: 0; offsetyin: 250; durationin: 1000; delayin: 1000; offsetxout: 0; offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
                              <?= Yii::t('app','Request Quotation') ?>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- SECTION 1 -->
                <section class="slice sct-color-2 bb">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="block block-arrow arrow-down">
                                    <div class="block-icon-wrapper scroll-on bounceInLeft" data-wow-duration="1s">
                                        <div class="block-icon">
                                            <?= Html::img('@web/images/icons/svg/set-1/calendar.svg',['class' => 'img-responsive img-center']) ?>
                                        </div>
                                    </div>
                                    <div class="block-body scroll-on fadeIn" data-wow-duration="1s">
                                        <h1 class="block-title">RADAR software ICSR collectiont</h1>
                                        <p class="text-center">
                                          <?= Yii::t('app','Pellentesquemattis arcu malesuada in. Donec urna sem, rutrum sit amet pellentesque vel, suscipit at metus.') ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="block block-arrow arrow-down">
                                    <div class="block-icon-wrapper scroll-on bounceInDown" data-wow-duration="1s">
                                        <div class="block-icon">
                                            <?= Html::img('@web/images/icons/svg/set-1/book.svg',['class' => 'img-responsive img-center']) ?>
                                        </div>
                                    </div>
                                    <div class="block-body scroll-on fadeIn" data-wow-duration="1s">
                                        <h1 class="block-title"> follow-up </h1>
                                        <p class="text-center">
                                           <?= Yii::t('app','Pellentesquemattis arcu malesuada in. Donec urna sem, rutrum sit amet pellentesque vel, suscipit at metus.')?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="block block-arrow arrow-down">
                                    <div class="block-icon-wrapper scroll-on bounceInRight" data-wow-duration="1s">
                                        <div class="block-icon">
                                            <?= Html::img('@web/images/icons/svg/set-1/chat.svg',['class' => 'img-responsive img-center']) ?>
                                        </div>
                                    </div>
                                    <div class="block-body scroll-on fadeIn" data-wow-duration="1s">
                                        <h1 class="block-title"><?= Yii::t('app',' assessment and reporting')?></h1>
                                        <p class="text-center">
                                        <?= Yii::t('app','Pellentesquemattis arcu malesuada in. Donec urna sem, rutrum sit amet pellentesque vel, suscipit at metus.')?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 2 -->
                <section class="slice sct-color-1 bb">
                    <div class="container">
                        <div class="section-title-wrapper style-1 v1 scroll-on bounceInDown" data-wow-duration="1s" data-wow-offset="100">
                            <h3 class="section-title center">
                                <span><?= Yii::t('app','Pharmacovigilance Pre and post authorization services')?></span>
                            </h3>
                            <div class="section-title-text text-center">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 scroll-on bounceInUp" data-wow-duration="2s" data-wow-offset="100">
                                <div class="big-promo-img-wrapper text-center mt-40">
                                    <?= Html::img('@web/images/prv/other/img-promo-1.png') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 3 -->
                <section class="slice sct-color-2 bb">
                    <div class="container">
                        <!-- MILESTONE COUNTER -->
                        <div class="row">
                            <div class="col-md-3 scroll-on zoomIn" data-wow-duration=".5s">
                                <div class="milestone-counter">
                                    <div class="milestone-count c-base-2" data-from="0" data-to="5518" data-speed="3000" data-refresh-interval="100"></div>
                                    <h4 class="milestone-info c-base-4"><?= Yii::t('app','Clients')?></h4>
                                </div>
                            </div>
                            <div class="col-md-3 scroll-on zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
                                <div class="milestone-counter">
                                    <div class="milestone-count c-base-2" data-from="0" data-to="154" data-speed="5000" data-refresh-interval="50"></div>
                                    <h4 class="milestone-info c-base-4"><?= Yii::t('app','Successful projects')?></h4>
                                </div>
                            </div>
                            <div class="col-md-3 scroll-on zoomIn" data-wow-duration=".5s" data-wow-delay="1s">
                                <div class="milestone-counter">
                                    <div class="milestone-count c-base-2" data-from="0" data-to="33" data-speed="5000" data-refresh-interval="80"></div>
                                    <h4 class="milestone-info c-base-4"><?= Yii::t('app','Awards') ?></h4>
                                </div>
                            </div>
                            <div class="col-md-3 scroll-on zoomIn" data-wow-duration=".5s" data-wow-delay="1.5s">
                                <div class="milestone-counter">
                                    <div class="milestone-count c-base-2" data-from="0" data-to="1230" data-speed="5000" data-refresh-interval="80"></div>
                                    <h4 class="milestone-info c-base-4"><?= Yii::t('app','Great ideas')?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 4 -->
                <section class="slice sct-color-1 bb">
                    <div class="container">
                        <div class="section-title-wrapper style-1 v1 scroll-on bounceInDown" data-wow-duration="1s" data-wow-offset="100">
                            <h3 class="section-title center">
                                <span><?= Yii::t('app','3 packages are available (Contracts for 2 years only)')?></span>
                                <span class="section-subtitle"><?= Yii::t('app','To be the best means to make each customer your friend and give him what he needs')?></span>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4 scroll-on slideInLeft" data-wow-duration=".5s" data-wow-offset="200">
                                <div class="block block-pricing style-1 bg-base-1 mt-20">
                                    <div class="block-header">
                                        <h3 class="pricing-title">Package 1</h3>
                                        <span class="pricing-subtitle">< 10 products</span>
                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a href="#">25 Projects</a></li>
                                            <li><a href="#">50 GB Storage</a></li>
                                            <li><a href="#">with 1 Domain</a></li>
                                            <li><a href="#">10 Users</a></li>
                                            <li><a href="#">Unlimited bandwidth</a></li>
                                        </ul>
                                        <h3 class="price-tag text-center">6,99$<span>/m</span></h3>
                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-1 scroll-me" onclick="$('#request-message').val('i would like to request package 1');">Request</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 scroll-on zoomIn" data-wow-duration=".5s" data-wow-delay=".5s" data-wow-offset="100">
                                <div class="block block-pricing style-1 bg-base-2">
                                    <div class="block-header">
                                        <h3 class="pricing-title">Package 2</h3>
                                        <span class="pricing-subtitle">10-50 products</span>
                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a href="#">25 Projects</a></li>
                                            <li><a href="#">50 GB Storage</a></li>
                                            <li><a href="#">with 1 Domain</a></li>
                                            <li><a href="#">10 Users</a></li>
                                            <li><a href="#">Unlimited bandwidth</a></li>
                                        </ul>
                                        <h3 class="price-tag text-center">9,99$<span>/m</span></h3>
                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-2 scroll-me" onclick="$('#request-message').val('i would like to request package 2');">Request</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 scroll-on slideInRight" data-wow-duration=".5s" data-wow-offset="200">
                                <div class="block block-pricing style-1 bg-base-1 mt-20">
                                    <div class="block-header">
                                        <h3 class="pricing-title">Package 3</h3>
                                        <span class="pricing-subtitle"> 51-100 products</span>
                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a href="#">25 Projects</a></li>
                                            <li><a href="#">50 GB Storage</a></li>
                                            <li><a href="#">with 1 Domain</a></li>
                                            <li><a href="#">10 Users</a></li>
                                            <li><a href="#">Unlimited bandwidth</a></li>
                                        </ul>
                                        <h3 class="price-tag text-center">12,99$<span>/m</span></h3>
                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-1 scroll-me" onclick="$('#request-message').val('i would like to request package 3');">Request</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 5 -->

                <section class="slice sct-color-2 bb">
                    <div class="container">
                        <div class="section-title-wrapper style-1 v1 scroll-on bounceInDown" data-wow-duration="1s" data-wow-offset="100">
                            <h3 class="section-title center">
                                <span><?= Yii::t('app','Companies we work with')?></span>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/prv/clients/client-1.png',['class' => 'img-responsive']) ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".15s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/prv/clients/client-2.png',['class' => 'img-responsive']) ?>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".30s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/prv/clients/client-3.png',['class' => 'img-responsive']) ?>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".45s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/prv/clients/client-4.png',['class' => 'img-responsive']) ?>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".60s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/prv/clients/client-5.png',['class' => 'img-responsive']) ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".75s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/prv/clients/client-6.png',['class' => 'img-responsive']) ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- SECTION 6 -->
                <section class="slice bg-base-2 scroll-on">
                    <div class="container">
                        <div id="owlDemo-1" class="owl-carousel-single" data-owl-loop="false" data-owl-items="1" data-owl-nav="false" data-owl-dots="true" data-owl-item-margin="0">
                            <div class="item">
                                <div class="testimonial-fluid mb-20">
                                    <p class="testimonial-text">
                                     <?= Yii::t('app',' Periodic benefit risk evaluation report (PBRER) scheduling, production and submission')?>
                                    </p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="testimonial-fluid">
                                    <p class="testimonial-text">
                                        <?= Yii::t('app','Risk management system(s) and monitoring of the outcome of risk minimisation measures')?>
                                    </p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="testimonial-fluid">
                                    <p class="testimonial-text">
                                        <?= Yii::t('app','Pharmacovigilance system master file(PSMF)')?>
                                    </p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="testimonial-fluid">
                                    <p class="testimonial-text">
                                        <?= Yii::t('app','Outsourcing of QPPV')?>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- SECTION 7 -->
                <section id="section-7" class="slice relative" style="background: url('<?php echo Yii::getAlias('@web');?>/images/patterns/subway-lines.png') repeat;">
                    <div class="mask mask-3 v1"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 scroll-on bounceInLeft" data-wow-duration=".5s" data-wow-offset="100">
                                <!-- Section title with subtitle -->
                                <div class="section-title-wrapper style-1 v1 v2 mb-40">
                                    <h3 class="section-title section-title-sm left">
                                        <span><?= Yii::t('app','Our office')?></span>
                                        <small class="section-subtitle">زهراء مدينة نصر  </small>
                                    </h3>

                                </div>

                                <span class="clearfix"></span>

                                <!-- Map canvas - Used to load google map -->

                                <section id="google-map">
                                    <!-- #google-container will contain the map  -->
                                    <div id="mapCanvas" class="map-canvas mt-20" style="height: 368px;"></div>
                                    <!-- #cd-zoom-in and #zoom-out will be used to create our custom buttons for zooming-in/out -->
                                    <div id="map-zoom-in"></div>
                                    <div id="map-zoom-out"></div>
                                    <address>86-90 Paul Street, London, EC2A 4NE</address>
                                </section>
                            </div>
                            <div class="col-md-6 scroll-on bounceInRight" data-wow-duration=".5s" data-wow-offset="100">
                                <!-- Section title with subtitle -->
                                <div class="section-title-wrapper style-1 v1 v2 mb-40">
                                    <h3 class="section-title section-title-sm left">
                                        <span>Request Quotation</span>
                                        <small class="section-subtitle">We are here to help you</small>
                                    </h3>
                                </div>
                                <span class="clearfix"></span>

                                <!-- Contact form -->
                                    <?php  $form= ActiveForm::begin(['action' => ['site/send-mail'],'options' => ['id' => 'request-form','class'=> 'form-base-1 form-opaque mt-20']]) ?>
                                    <div class="form-group">
                                        <input type="text" name="userName" class="form-control input-lg" placeholder="Your name">

                                    </div>
                                    <div class="form-group">
                                        <input name="company" type="text" class="form-control input-lg" placeholder="Your company">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control input-lg" placeholder="Your email">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="request-message" name="message" class="form-control" rows="5" placeholder="Enter you message here ..."></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-lg btn-block btn-base-1">Send Request</button>
                                <? ActiveForm::end()?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 8 -->
                <section class="slice sct-color-2 bb">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 scroll-on rollIn" data-wow-duration=".3s" data-wow-offset="100">
                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">Our Office</h3>
                                        <p> زهراء مدينة نصر </p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">Email</h3>
                                        <p>pv@emcoegypt.com </p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">This is a title3</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit eiusmod.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 scroll-on rollIn" data-wow-duration=".3s" data-wow-delay=".3s">
                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">Company</h3>
                                        <p> Egyptian medicine company(EMCO)</p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">This is a title2</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit eiusmod.
                                        </p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">This is a title</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit eiusmod.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 scroll-on rollIn" data-wow-duration=".3s" data-wow-delay=".6s">
                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">Phone Numbers</h3>
                                        <p>+201144222092 - 01100145097</p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">This is a title</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit eiusmod.
                                        </p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">This is a title</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit eiusmod.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FOOTER -->
                <div class="copyright style-3">
                    <div class="container">
                        <div class="div-table v-middle">
                            <div class="cell">
                                All rights reserved. Copyright &copy; 2015 <span class="company-rights">Pv-Raddar</span>
                            </div>
                            <div class="cell">
                                <div class="social-media style-2 v4 text-right">
                                    <a href="#" class="facebook">
                                        <i class="fa fa-facebook "></i>
                                    </a>
                                    <a href="#" class="google-plus">
                                        <i class="fa fa-google-plus "></i>
                                    </a>
                                    <a href="#" class="pinterest">
                                        <i class="fa fa-pinterest "></i>
                                    </a>
                                    <a href="#" class="twitter">
                                        <i class="fa fa-twitter "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><!-- END: st-pusher -->
</div><!-- END: body-wrap -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8qj-3E6nRcvPyJP9DwpAZ3Xr_iSq_ot8&v=3.exp&amp;sensor=false"></script>