<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'PV-Radar';
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;


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
                            <?= Html::img('@web/images/backgrounds/bg1.jpg',['class' => 'ls-bg' , 'style' => 'width: 100%' , 'alt' => 'Slide background']); ?>


                            <!-- Center paragraph -->
                            <p class="ls-l text-standard text-center c-white" style="width: 900px; top: 50%; left: 50%;" data-ls="offsetxin:-250;offsetyin:-;durationin:1000;delayin:1000;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">

                                <?= Html::img('@web/images/logos/pvRadarLogo.png',['class' => 'img-responsive','alt' => 'PV-Radar artimis logo']) ?>


                            </p>

                            <?= Html::a('Login',Url::toRoute(['site/login']),['class' => 'btn btn-lg btn-b-red ls-l' ,  'style' => "top: 70%; left: 40%;" ,'data-ls' =>"offsetxin: 0; offsetyin: 250; durationin: 1000; delayin: 1000; offsetxout: 0; offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;"]); ?>

                            <a href="#section-7" class="btn btn-lg btn-base-1  ls-l scroll-me" style="top: 70%; left: 55%;" data-ls="offsetxin: 0; offsetyin: 250; durationin: 1000; delayin: 1000; offsetxout: 0; offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" onclick="setTimeout(function() {$('#email').focus()},100);">
                              <?= Yii::t('app','Request Quotation') ?>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- SECTION 1 -->
                <section class="slice sct-color-2 bb">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 block2">
                                <div class="block block-arrow ">
                                    <div class="block-icon-wrapper-ovverride scroll-on bounceInDown" data-wow-duration="1s">
                                        <p class="circle2">
                                            <span><?= Yii::t('app','PV-Radar Software');?></span>
                                        </p>
                                    </div>
                                    <div class="block-body scroll-on fadeIn" data-wow-duration="1s">
                                         <p class="text-center">
                                            <?= Yii::t('app','ICSRs E2B reporting support')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','XML validated ICSRs')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Null case ICSR support')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Duplication check')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Signal detection')?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 block2">
                                <div class="block block-arrow ">
                                    <div class="block-icon-wrapper-ovverride scroll-on bounceInDown" data-wow-duration="1s">
                                        <p class="circle2 blue-light-color">
                                            <span><?= Yii::t('app','PV-Radar Regulatory Services');?></span>
                                        </p>
                                    </div>
                                    <div class="block-body scroll-on fadeIn" data-wow-duration="1s">

                                         <p class="text-center">
                                           <?= Yii::t('app','Preparation & submission of PSMF')?>
                                        </p>

                                        <p class="text-center">
                                            <?= Yii::t('app','Risk Management Plan (RMP) production,review and harmonization')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Periodic Benefit Risk Evaluation Reports (PBRERs)')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Individual case safety report (ICSR) full processing')?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 block2">
                                <div class="block block-arrow ">
                                    <div class="block-icon-wrapper-ovverride scroll-on bounceInDown" data-wow-duration="1s">
                                        <p class="circle2 red-strong-color">
                                            <span><?= Yii::t('app','PV-Radar Outsourcing Services');?></span>

                                        </p>
                                    </div>
                                    <div class="block-body scroll-on fadeIn" data-wow-duration="1s">
                                         <p class="text-center">
                                            <?= Yii::t('app','Outsourcing of Qualified Person for Pharmacovigilance(QPPV)')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','PV-Radar is responsible for all PV task')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Subscription to PV-Radar software is included')?>
                                        </p>
                                        <p class="text-center">
                                            <?= Yii::t('app','Automated weekly report updates')?>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </section>
                <!-- SECTION 3 -->
                <section class="slice sct-color-2 bb" style="display: none;">
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
                                <span><?= Yii::t('app','4 plans are available (Contracts for minimum 2 years)')?></span>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-3 scroll-on slideInLeft" data-wow-duration=".5s" data-wow-offset="200">
                                <div class="block block-pricing style-1 bg-base-1 mt-20">
                                    <div class="block-header">
                                        <h3 class="pricing-title"><?= Yii::t('app' ,'Plan I')?></h3>
                                        <span class="pricing-subtitle"></span>
                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a>< 10 <?= Yii::t('app','Products')?></a></li>
                                            <li><a>1 <?= Yii::t('app','User')?></a></li>
                                            <li><a><?= Yii::t('app','Unlimited ICSRs Storage')?></a></li>
                                            <li><a><?=Yii::t('app','E2B Compliant')?> </a></li>
                                            <li><a><?=Yii::t('app','Duplication Detection')?></a></li>
                                        </ul>

                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-1 scroll-me" onclick="$('#request-message').val('i would like to request Plan I'); setTimeout(function() {$('#email').focus()},100);">Request</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 scroll-on zoomIn" data-wow-duration=".5s" data-wow-delay=".5s" data-wow-offset="100">
                                <div class="block block-pricing style-1 bg-base-2">
                                    <div class="block-header">
                                        <h3 class="pricing-title"><?= Yii::t('app','Plan II')?></h3>
                                        <span class="pricing-subtitle"></span>
                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a>10-50 <?= Yii::t('app','Products')?></a></li>
                                            <li><a>2 <?= Yii::t('app','Users')?></a></li>
                                            <li><a><?= Yii::t('app','Unlimited ICSRs Storage')?></a></li>
                                            <li><a><?=Yii::t('app','E2B Compliant')?> </a></li>
                                            <li><a><?=Yii::t('app','Duplication Detection')?></a></li>
                                        </ul>
                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-2 scroll-me" onclick="$('#request-message').val('i would like to request Plan II'); setTimeout(function() {$('#email').focus()},100);">Request</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 scroll-on slideInRight" data-wow-duration=".5s" data-wow-offset="200">
                                <div class="block block-pricing style-1 bg-base-1 mt-20">
                                    <div class="block-header">
                                        <h3 class="pricing-title"><?= Yii::t('app','Plan III')?></h3>

                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a>51-150 <?= Yii::t('app','Products') ?></a></li>
                                            <li><a>3 <?= Yii::t('app','Users')?></a></li>
                                            <li><a><?= Yii::t('app','Unlimited ICSRs Storage')?></a></li>
                                            <li><a><?=Yii::t('app','E2B Compliant')?> </a></li>
                                            <li><a><?=Yii::t('app','Duplication Detection')?></a></li>
                                        </ul>

                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-1 scroll-me" onclick="$('#request-message').val('i would like to request Plan III'); setTimeout(function() {$('#email').focus()},100);">Request</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3 scroll-on slideInRight" data-wow-duration=".5s" data-wow-offset="200">
                                <div class="block block-pricing style-1 bg-base-1 mt-20">
                                    <div class="block-header">
                                        <h3 class="pricing-title"><?= Yii::t('app','Plan IV')?></h3>

                                    </div>
                                    <div class="block-body">
                                        <ul>
                                            <li><a>> 150 <?= Yii::t('app','Products') ?></a></li>
                                            <li><a>5 <?= Yii::t('app','Users')?></a></li>
                                            <li><a><?= Yii::t('app','Unlimited ICSRs Storage')?></a></li>
                                            <li><a><?=Yii::t('app','E2B Compliant')?> </a></li>
                                            <li><a><?=Yii::t('app','Duplication Detection')?></a></li>
                                        </ul>

                                    </div>
                                    <div class="block-footer">
                                        <a href="#request-form" class="btn btn-lg btn-base-1 scroll-me" onclick="$('#request-message').val('i would like to request Plan IV'); setTimeout(function() {$('#email').focus()},100);">Request</a>
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
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/logos/hygint.jpg',['class' => 'img-responsive','alt' => 'PV-Radar hygint logo']) ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".15s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/logos/pharma.jpg',['class' => 'img-responsive','alt' => 'PV-Radar pharma logo']) ?>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".30s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/logos/artimis.png',['class' => 'img-responsive','alt' => 'PV-Radar artimis logo']) ?>

                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".60s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/logos/haier.png',['class' => 'img-responsive','alt' => 'PV-Radar haier logo']) ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 scroll-on rotateInDownLeft" data-wow-duration=".15s" data-wow-delay=".75s" data-wow-offset="250">
                                <div class="client-logo style-1 block-shadow">
                                    <?= Html::img('@web/images/logos/bravo-pharma.png',['class' => 'img-responsive','alt' => 'PV-Radar bravo logo']) ?>

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
                                        <small class="section-subtitle"><?= Yii::t('app','Building 5A, block 4, Manteqat El-Cinema, Nasr city, Cairo, Egypt')?></small>
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
                                        <input id="email" name="email" type="email" class="form-control input-lg" placeholder="Your email">
                                    </div>

                                    <div class="form-group">
                                        <input name="number" type="text" class="form-control input-lg" placeholder="Your phone number">
                                    </div>

                                    <div class="form-group">
                                        <textarea id="request-message" name="message" class="form-control" rows="5" placeholder="Enter you message here ..."></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-lg btn-block btn-base-1">Send Request</button>
                                <?php ActiveForm::end()?>
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
                                        <p> <?= Yii::t('app','Building 5A, block 4, Manteqat El-Cinema, Nasr city, Cairo, Egypt')?> </p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="block style-5 v3 mb-10">
                                    <div class="block-icon">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="block-content">
                                        <h3 class="block-title-2">Email</h3>
                                        <p>pv@emcoegypt.org </p>
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

                            </div>
                        </div>
                    </div>
                </section>

                <!-- FOOTER -->
                <div class="copyright style-3">
                    <div class="container">
                        <div class="div-table v-middle">
                            <div class="cell">
                                All rights reserved. Copyright &copy; <?= date('Y') ?> <span class="company-rights"><?= Yii::t('app','PV-Radar')?></span>

                                <?php if (file_exists(Yii::getAlias('@webroot').'/test-check.txt'))
                                {
                                    echo "<p>".file_get_contents(Yii::getAlias('@webroot').'/test-check.txt')."</p>";
                                }
                                ?>
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
<?php $this->registerCssFile('@web/landing-page/custom.css');?>
