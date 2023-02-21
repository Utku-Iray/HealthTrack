<?php
include 'utility/header.php';

require_once 'utility/api/get-news.php';
require_once 'utility/api/get-homepage-translations.php';
require_once 'utility/api/get-slider.php';


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- <div class="container">
  <div class="time-table-sec">
    <ul id="accordion2" class="accordion2">
      <li>
        <ul class="submenu time-table">
          <li class="tit">
            <h5>Çalışma Saatleri</h5>
          </li>
          <li>
            <span class="day">Pazartesi - C.tesi</span>
            <span class="divider">-</span>
            <span class="time">9.00 - 19.00</span>
          </li>

          <li>
            <span class="day">Pazar</span> <span class="divider">-</span>
            <span class="time">Kapalı</span>
          </li>
        </ul>
        <div class="link">
          <a href="iletisim.php" target="_blank"><img class="time-tab" src="images/timetable-menu.png" alt="" /></a>
        </div>
      </li>
    </ul>
  </div>
</div> -->

<!--Start Banner-->

<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <!-- SLIDE  -->


      <?php foreach ($sliderResult as $singleSlider) { ?>

        <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
          <!-- MAIN IMAGE -->
          <img src="<?= $singleSlider->slider_image ?>" alt="<?= $singleSlider->title ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
          <!-- LAYERS -->

          <div class="tp-caption black_thin_34 black_thin_34_bold customin tp-resizeme rs-parallaxlevel-0" data-x="0" data-y="250" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="500" data-start="1400" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap; font-size: 52px;">
            <?= $singleSlider->title ?>
            <br>
            <h6 data-easing="Back.easeOut"><?= $singleSlider->content ?></h6>
            <a href="<?= $singleSlider->slider_link ?>" class="read-more" style="background-color:#10464e; line-height: initial; color: #fff; text-transform: uppercase; font-weight: 500; padding: 12px 36px; display: inline-block; font-size: 18px;">Daha Fazlası</a>
          </div>


        </li>
      <?php  } ?>
    </ul>
    <div class="tp-bannertimer"></div>
  </div>
</div>

<!--End Banner-->

<!--Start Make Appointment-->
<div class="make-appointment">
  <div class="container">
    <ul id="accordion" class="accordion">
      <li>
        <div class="link">
          <span class="appointment-title">Randevu Al</span><img class="icon-chevron-down" src="images/anasayfa.png" style="width: 30px; float:right; margin-right:20px;" alt="">
          <i class="icon-chevron-down"></i>
        </div>

        <section class="bgcolor-3">
          <p class="error" id="error" style="display: none"></p>
          <p class="success" id="success" style="display: none"></p>

          <form name="appointment_form" id="appointment_form" method="post" action="#" onSubmit="return false">
            <span class="input input--kohana">
              <input class="input__field input__field--kohana" type="text" id="input-29" name="input-29" />
              <label class="input__label input__label--kohana" for="input-29">
                <i class="icon-user6 icon icon--kohana"></i>
                <span class="input__label-content input__label-content--kohana">İsim Soyisim</span>
              </label>
            </span>
            <span class="input input--kohana">
              <input class="input__field input__field--kohana" type="text" id="input-30" name="input-30" />
              <label class="input__label input__label--kohana" for="input-30">
                <i class="icon-dollar icon icon--kohana"></i>
                <span class="input__label-content input__label-content--kohana">Email</span>
              </label>
            </span>
            <span class="input input--kohana last">
              <input class="input__field input__field--kohana" type="text" id="input-31" name="input-31" />
              <label class="input__label input__label--kohana" for="input-31">
                <i class="icon-phone5 icon icon--kohana"></i>
                <span class="input__label-content input__label-content--kohana">Telefon Numarası</span>
              </label>
            </span>

            <span class="input input--kohana">
              <input class="input__field input__field--kohana" type="text" id="datepicker" placeholder="Randevu Tarihi" onClick="" name="datepicker" />
            </span>

            <span class="input input--kohana message">
              <input class="input__field input__field--kohana" type="text" id="textarea" name="textarea" />
              <label class="input__label input__label--kohana" for="textarea">
                <i class="icon-new-message icon icon--kohana"></i>
                <span class="input__label-content input__label-content--kohana">Mesaj</span>
              </label>
            </span>

            <input name="submit" type="submit" value="Gönder" onClick="validateAppointment();" />
          </form>
        </section>
      </li>
    </ul>
  </div>
</div>
<!--End Make Appointment-->

<!--Start Content-->
<div class="content">

  <div class="container steps padding-top-bottom">
    <div class="home-title">
      <h2 class="baslik">İyİ Olma Yolculuğunuza Hazır mısınız?</h2>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/dinliyoruz.png" alt="">
            </a>

          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              <?= $generalInfoService1["title"] ?>
            </h5>
          </div>
          <p class="step__text"> <?= $generalInfoService1["description"] ?></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/inceliyoruz.png" alt="">
            </a>
          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              <?= $generalInfoService2["title"] ?>
            </h5>
          </div>
          <p class="step__text"> <?= $generalInfoService2["description"] ?></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/planliyoruz.png" alt="">
            </a>
          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              <?= $generalInfoService3["title"] ?>
            </h5>
          </div>
          <p class="step__text"> <?= $generalInfoService3["description"] ?></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/izliyoruz.png" alt="">
            </a>
          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              <?= $generalInfoService4["title"] ?>
            </h5>
          </div>
          <p class="step__text"> <?= $generalInfoService4["description"] ?></p>
        </div>
      </div>
    </div>
  </div>

  <!--Start Services-->
  <div class="services-two">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="service-sec">
            <div class="icon" style="background-color: #f4911c;">
              <img src="images/deneme.jpg" alt="">
              <!-- <img
                      style="width: 70%; padding-top: 12px; background-color:#02adc6;"
                      src="images/icon-1.png"
                      alt=""
                    /> -->
            </div>

            <div class="detail">
              <h5> <?= $generalInfoPrinciple1["title"] ?></h5>
              <?= $generalInfoPrinciple1["description"] ?>
            </div>
          </div>
          <div class="service-sec">
            <div class="icon" style="background-color: #c2185f;">
              <img src="images/deneme-2.jpg" alt="">
              <!-- <img
                      style="width: 70%; padding-top: 12px"
                      src="images/icon-2.png"
                      alt=""
                    /> -->
            </div>

            <div class="detail">
              <h5><?= $generalInfoPrinciple2["title"] ?></h5>
              <?= $generalInfoPrinciple2["description"] ?>
            </div>
          </div>
          <div class="service-sec">
            <div class="icon" style="background-color: #39919d;">
              <img src="images/deneme-3.jpg" alt="">
              <!-- <img
                      style="width: 70%; padding-top: 12px"
                      src="images/icon-3.png"
                      alt=""
                    /> -->
            </div>

            <div class="detail">
              <h5><?= $generalInfoPrinciple3["title"] ?></h5>
              <?= $generalInfoPrinciple3["description"] ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div id="demo">
            <div class="span12">
              <div id="services-slide" class="owl-carousel">
                <div class="item">
                  <img src="images/health.png" alt="" />
                </div>
                <!-- <div class="item">
                  <img src="images/iv-terapi-2.jpg" alt="" />
                </div> -->
                <!-- <div class="item"><img src="images/service-two-img3.jpg" alt=""></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Services-->

  <!--Start Welcome-->
  <div class="welcome dark-backk">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main-title">
            <h2 style="font-size: 39px; padding-bottom:10px;">Optimal Sağlığı Korumak için <span> Temel Bakım</span></h2>
            <p>
            İyi olma süreciniz için karar vermenizle birlikte temel hedeflerinizi belirlemeniz önemli. Bu hedefler kısa vadeli ve ulaşılabilir olmalı. Ancak bu hedeflere ulaşmanız ve daha büyük hedeflere ilerlemeniz için vücudunuz hazır mı?
            </p>
          </div>
        </div>
      </div>

      <div id="tabbed-nav">
        <ul>
          <?php foreach ($treatmentsResultForHome as $singleTreatmentForHome) { ?>
            <li><a><?= $singleTreatmentForHome->name ?></a></li>
          <?php  } ?>


        </ul>

        <div>

          <?php foreach ($treatmentsResultForHome as $singleTreatmentForHome) { ?>
            <div>
              <div class="row">
                <div class="col-md-6">
                  <div class="welcome-serv-img">
                    <img style="width: 576px; height:504px;" src="<?= $singleTreatmentForHome->treatment_main_img ?>" alt="" />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="detail" style="padding-top: 30px">
                    <h4><?= $singleTreatmentForHome->name ?></h4>
                    <p> <?= $singleTreatmentForHome->short_content ?></p>
                    <a href="tedavi-detay.php?url=<?= $singleTreatmentForHome->url ?>">DEVAMINI OKU</a>
                  </div>
                </div>

              </div>
            </div>
          <?php  } ?>




        </div>
      </div>
    </div>
  </div>
  <div class="patients-testi dark-back dr-quote">
    <div class="container">


      <div id="testimonials ">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="span12">

                <div id="owl-demo2" class="owl-carousel">

                  <div class="testi-sec">
                    <div class="height30"></div>
                    <h5 style="line-height: 30px;color:white"><?= $generalInfoBanner1["description"] ?></h5>
                    <div class="height20"></div>

                    <span class="name" style="color: white;"><?= $generalInfoBanner1["title"] ?></span>

                    <div class="height35"></div>


                  </div>
                  <div class="testi-sec">
                    <div class="height30"></div>
                    <h4 style="line-height: 30px;color:white"><?= $generalInfoBanner2["description"] ?></h4>
                    <div class="height20"></div>

                    <span class="name" style="color: white;"><?= $generalInfoBanner2["title"] ?></span>

                    <div class="height35"></div>


                  </div>


                </div>

              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <!--End Welcome-->
  <!-- <section class="vitamin-bag container text-center">
    <h2 class="home-title mb-0 baslik">KİŞİYE ÖZEL TEDAVİ PAKETLERİ</h2>
    <div class="row" style="display: flex;">
       <div class="col-lg-4 d-flex align-items-center">
        <div class="vitamins-wrapper1">
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">B12</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              B12 Vitamini
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">B</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              B Vitamini Kompleksi
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">T</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Taurin
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Zn</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Çinko
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">AL</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Anti-inflamatuar İlaç
            </div>
          </div>
          
        </div>
      </div> 
      <div class="col-lg-4">
        <img style="width: 217px; height:536px" src="images/serum.jpg" alt="">
      </div>
      <div class="col-lg-4">
        <img style="width: 217px; height:536px" src="images/serum-1.jpg" alt="">
       
      </div>
      <div class="col-lg-4">
        <img style="width: 217px; height:536px" src="images/serum-2.jpg" alt="">
      </div>
      
       <div class="col-lg-4 d-flex align-items-center">
        <div class="vitamins-wrapper1">
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">C</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              C Vitamini
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Mg</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Magnezyum
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">GSH</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Glutatyon
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Bir</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Bulantı Önleyici İlaç
            </div>
          </div>
          <div class="vitamin-block">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-plus plus-sign mr-2"></i>
              <span class="vitamin-sign" data-toggle="tooltip" data-placement="top" title="" data-original-title="A powerhouse for the body, helping make DNA, nerve and blood cells. Your metabolism cannot function without it and no metabolism, no energy">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Ah</font>
                </font>
              </span>
            </div>
            <div class="vitamin-title">
              Mide Yanması Karşı İlaç
            </div>
          </div>
          
        </div>
      </div> 
    </div>
  </section> -->

  <!--Start Doctor Quote-->
  
  <!--End Doctor Quote-->
  <!-- <div class="meet-specialists">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main-title">
            <h2>Ekibimizle<span>Tanışın</span></h2>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Soluta ad perferendis aperiam fugiat velit blanditiis alias
              vitae consequatur rem quae.
            </p>
          </div>
        </div>
      </div>

      <div id="demo">
        <div class="container">
          <div class="row">
            <div class="span12">
              <div id="owl-demo4" class="owl-carousel">
               
                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>Cem GÜÇLÜ</h6>
                    <span>Başkan</span>
                    <p>
                      Dil bilimci, ama yatırımcı ve iş geliştirici olarak yaşamayı tercih etmiş. Yaşama sevgi gözlüğüyle bakarken, gerçekçiliği ve akılcılığı öncelikli prensip olarak kabul ediyor.
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>
                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>Kadir DOĞRUER</h6>
                    <span>Medikal Direktör</span>
                    <p>
                      Anesteziyoloji ve Reanimasyon uzmanı. Yoğun bakımcı ve de ülkemizde iyi tanınan bir yoğun bakımcı. Biraz yaş almış. Gönülden işine bağlı. İşini hep sevgiyle yaptı ve yapmaya devam ediyor. Sağlık sektöründe ileri teknolojilerle ilgileniyor.
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>

                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>Ömer ERSÖZ</h6>
                    <span>İşletme Direktörü</span>
                    <p>
                      Bilgisayar mühendisi. Teknoloji ondan sorulur. Küresel tüm teknik çözümlere hakim olup, bunu ülkesinde başarıyla ticari bir platforma taşımış. Bilişim teknolojilerinde güven odaklı çalışmalar yürütüyor, projeler geliştiriyor. Tüm ekipten genç.
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>

                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>Tamer BALKAS</h6>
                    <span>Mali İşler Direktörü</span>
                    <p>
                      İnşaat mühendisi. Beton döküp duruyor, inşa ediyor. Müteahhitlik yapıyor. İş planlama ve bütçe yönetiminde yüksek yeteneğe sahip. Güven ve akılcılık en önemli prensipleri.
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>
                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>H. Esra GÜMÜŞ</h6>
                    <span>Dahiliye Uzmanı</span>
                    <p>
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>
                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>Deniz ÖZDEMİR</h6>
                    <span>Diyetetik & İnovasyon</span>
                    <p>
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>
                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="detail">
                    <h6>Evrim KEKLİK</h6>
                    <span>Hemşirelik Hizmetleri Direktörü & Klinik Direktörü</span>
                    <p>
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>
                </div>
                <div class="post item">
                  <div class="gallery-sec">
                    <div class="image-hover img-layer-slide-left-right">
                      <img src="images/ekip-2.jpg" alt="" />
                      <div class="layer">
                        <a href="#."><i class="icon-euro"></i></a>
                        <a href="#."><i class="icon-yen"></i></a>
                        <a href="#."><i class="icon-caddieshoppingstreamline"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="detail">
                    <h6>Yağmur AKAR</h6>
                    <span>İşletme Direktör Yardımcısı</span>
                    <p>
                    </p>
                    <a href="#">- Profil Detay</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!--Start Latest News-->
  <div class="latest-news dark-yeni">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main-title">
            <h2><span>Sağlıklı</span> Haber</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Similique aut rerum atque molestiae, quos sequi.
            </p>
          </div>
        </div>
      </div>

      <div id="latest-news">
        <div class="container">
          <div class="row">
            <div class="span12">
              <div id="owl-demo" class="owl-carousel">
                <?php foreach ($newsResult  as $singleNews) { ?>
                  <div class="post item">
                    <a href="saglikli-haber-detay.php?url=<?= $singleNews->url ?>">
                      <img class="lazyOwl" style="object-fit:contain !important;" src="<?= $singleNews->news_image ?>" alt="" />
                      <div class="detail">
                        <img src="images/bloglar-ana-kapak.jpg" alt="" />
                        <h4 style="font-weight: 500; padding-bottom:10px;"><?= $singleNews->title ?></h4>
                        <p>
                          <?= $singleNews->short_content ?>
                        </p>
                        <div style="padding-top: 18px;">
                          <a href="saglikli-haber-detay.php?url=<?= $singleNews->url ?>" class="btn" style="background-color: #3B919E; color:white;">Devamını Okuyun</a>
                        </div>
                        <span><i class="icon-clock3"></i> <?= $singleNews->created_at ?></span>
                        <!-- <span class="comment"><a href="#"><i class="icon-icons206"></i> 5 Comments</a></span> -->
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Latest News-->

  <!--Start Testimonials-->
  <!-- <div class="patients-testi dark-testi">
    <div class="container">
     

      <div id="testimonials">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="span12">
                <div id="owl-demo2" class="owl-carousel">
                  <div class="testi-sec">
                    <img src="images/blog-7.png" alt="" />
                    <div class="height10"></div>
                    <span class="name">Aytekin Işıklı</span>
                          <span class="patient">Yazılım Mühendisi</span>
                          <div class="height30"></div>
                          <p>
                            İlk başta çok fazla beklentim yoktu ancak bütün
                            değerlerime bakıldıktan sonra başlanılan tedavi ile
                            şu an mükemmel durumdayım teşekkürler Health Track
                            ailesi.
                          </p>
                    <div class="height35"></div>
                  </div>
                  <div class="testi-sec">
                          <img src="images/yorumlar-asil-logo.jpg" alt="" />
                          <div class="height10"></div>
                          <span class="name">İlker Sakallı</span>
                          <span class="patient">3D Artist</span>
                          <div class="height30"></div>
                          <p>
                            Yoğun geçen günler, sabah toplantı akşam iş
                            yemekleri derken kendime ayıracak vaktim yoktu
                            uyumaya bile zaman bulamıyordum ancak uygun tedaviyi
                            uyguladığım zaman gençleşmiş gibi hissediyordum.
                          </p>
                        </div>
                        <div class="testi-sec">
                          <img src="images/yorumlar-asil-logo.jpg" alt="" />
                          <div class="height10"></div>
                          <span class="name">Kaan Sıddık</span>
                          <span class="patient">Tüpçü</span>
                          <div class="height30"></div>

                          <p>
                            Tüpçülük zor meslektir sürekli sırtında 20 kilo ile
                            in çık yaparsın ve vücut gereğinden fazla yorulur.
                            Ancak tedaviyi uygulamaya başladıktan sonra sanki
                            sırtımda 5 kilo taşımaya başlamışım gibi
                            hissediyordum
                          </p>
                          <div class="height35"></div>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!--End Testimonials-->
</div>
<!--End Content-->

<?php include 'utility/footer.php'; ?>