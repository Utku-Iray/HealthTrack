<?php
include 'header.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container">
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
</div>

<!--Start Banner-->

<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <!-- SLIDE  -->

      <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
        <img src="images/slides/slider-1.jpeg" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />

     
        

        <!-- <div
                class="tp-caption small-title tp-resizeme rs-parallaxlevel-0 fade start"
                data-x="670"
                data-y="255"
                data-speed="1000"
                data-start="1800"
                data-easing="Power3.easeInOut"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.1"
                data-endelementdelay="0.1"
                data-endspeed="300"
                style="
                  z-index: 5;
                  max-width: auto;
                  max-height: auto;
                  white-space: nowrap;
                "
              >
                Lorem IPSUM
              </div> -->

     
      </li>


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
              <img src="images/icon-8.png" alt="">
            </a>

          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              Dİnlİyoruz
            </h5>
          </div>
          <p class="step__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/icon-8.png" alt="">
            </a>
          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              İncelİyoruz
            </h5>
          </div>
          <p class="step__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/icon-8.png" alt="">
            </a>
          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              Planlıyoruz
            </h5>
          </div>
          <p class="step__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="step">
          <div class="step__image">
            <a href="hizmetler.php">
              <img src="images/icon-8.png" alt="">
            </a>
          </div>
          <div class="step__title">
            <h5 style="font-weight: 400;">
              İzlİyoruz
            </h5>
          </div>
          <p class="step__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat</p>
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
              <h5>Bütüncül Yaklaşım </h5>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Est, excepturi optio tempore voluptatum temporibus
                sapiente quisquam fugit eligendi quo nemo?
              </p>
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
              <h5>Multidisipliner Bakış Açısı </h5>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Eligendi rem minus tenetur nesciunt quae cum mollitia eius
                eveniet repudiandae enim!
              </p>
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
              <h5>Güvenilir Kanıta Dayalı Tedavi </h5>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat
                explicabo quo, nobis earum consequatur.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div id="demo">
            <div class="span12">
              <div id="services-slide" class="owl-carousel">
                <div class="item">
                  <img src="images/cancer-img.jpg" alt="" />
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
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae, soluta maxime! Quaerat modi doloremque
              cupiditate mollitia officia officiis pariatur repellendus.
            </p>
          </div>
        </div>
      </div>

      <div id="tabbed-nav">
        <ul>
          <li><a>Hücresel Sağlık </a></li>
          <li><a>Mental Sağlık</a></li>
          <li><a>Bedensel Sağlık</a></li>
          <!-- <li><a>Kozmetik Terapi</a></li> -->
        </ul>

        <div>
          <div>
            <div class="row">
              <div class="col-md-6">
                <div class="welcome-serv-img">
                  <img src="images/cancer-img.jpg" alt="" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="detail" style="padding-top: 30px">
                  <h4>Lorem Ipsum Dolor Sit</h4>
                  <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. A consequuntur eius reiciendis veniam officia
                    adipisci consequatur ut culpa quos fugit!
                  </p>
                  <a href="#">Lorem İpsum</a>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div class="row">
              <div class="col-md-6">
                <div class="welcome-serv-img">
                  <img src="images/cancer-img.jpg" alt="" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="detail" style="padding-top: 30px">
                  <h4>Lorem Ipsum Dolor</h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Modi facere accusantium asperiores nam assumenda
                    labore animi unde, veniam praesentium non!
                  </p>
                  <a href="#">Lorem İpsum</a>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div class="row">
              <div class="col-md-6">
                <div class="welcome-serv-img">
                  <img src="images/cancer-img.jpg" alt="" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="detail" style="padding-top: 30px">
                  <h4>Lorem Ipsum</h4>
                  <p>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat
                  </p>
                  <a href="#">Lorem İpsum</a>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div class="row">
              <div class="col-md-6">
                <div class="welcome-serv-img">
                  <img src="images/cancer-img.jpg" alt="" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="detail" style="padding-top: 30px">
                  <h4>Lorem Ipsum</h4>
                  <p>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Explicabo, architecto alias! Nemo dolorem aliquam fugiat
                  </p>
                  <a href="#">Lorem İpsum</a>
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
  <!--Start Specialists-->

  <!--End Specialists-->

  <!--Start Doctor Quote-->
  <div class="dr-quote">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span class="quote">Healthtrack Clinic’te kişiselleştirilmiş bütüncül bir yaklaşım ile tanışacaksınız.
            Danışanlarımız her birinin optimal sağlığını hedefleyerek kendilerine özel planladığımız yaklaşımımızın bizi farklılaştırdığını düşünüyor.
            Tıpkı bir denizatı gibi sakin ve kendinden emin ilerleyeceğimiz,
            sağlıklı ve iyi olma yolculuğunuz için hazır mısınız?
          </span>
          <span class="name">- Healthtrack Clinic</span>
        </div>
      </div>
    </div>
  </div>
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
  <!--  -->




  <div class="latest-news dark-yeni">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main-title">
            <h2><span>Lorem Ipsum</span> Blog</h2>
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
                <div class="post item">
                  <img class="lazyOwl" src="images/blog-4.jpg" alt="" />
                  <div class="detail">
                    <img src="images/bloglar-ana-kapak.jpg" alt="" />
                    <h4 style="font-weight: 500; padding-bottom:10px;"><a href="#"></a>Lorem ipsum dolor sit amet.</h4>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, dicta soluta quos repudiandae possimus expedita corporis minima reprehenderit saepe doloremque.
                    </p>
                    <div style="padding-top: 18px;">
                    <button class="btn" style="background-color: #3B919E; color:white;">Devamını Okuyun</button>
                    </div>
                    <!-- <span><i class="icon-clock3"></i> Apr 22, 2016</span>
                            <span class="comment"><a href="#"><i class="icon-icons206"></i> 5 Comments</a></span> -->
                  </div>
                </div>
                <div class="post item">
                  <img class="lazyOwl" src="images/blog-5.jpg" alt="" />
                  <div class="detail">
                    <img src="images/bloglar-ana-kapak.jpg" alt="" />
                    <h4 style="font-weight: 500; padding-bottom:10px;">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h4>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem expedita facilis natus incidunt voluptatum fugiat saepe quos quo nemo odio.
                    </p>
                    <div style="padding-top: 18px;">
                    <button class="btn" style="background-color: #3B919E; color:white;">Devamını Okuyun</button>
                    </div>
                    <!-- <span><i class="icon-clock3"></i> Apr 09, 2016</span>
                        <span class="comment"><a href="#"><i class="icon-icons206"></i> 3 Comments</a></span> -->
                  </div>
                </div>

                <div class="post item">
                  <img class="lazyOwl" src="images/blog-6.jpg" alt="" />
                  <div class="detail">
                    <img src="images/bloglar-ana-kapak.jpg" alt="" />
                    <h4 style="font-weight: 500; padding-bottom:10px;">
                      <a href="#">Lorem ipsum dolor sit amet.</a>
                    </h4>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem expedita facilis natus incidunt voluptatum fugiat saepe quos quo nemo odio.
                    </p>
                    <div style="padding-top: 18px;">
                    <button class="btn" style="background-color: #3B919E; color:white;">Devamını Okuyun</button>
                    </div>
                    <!-- <span><i class="icon-clock3"></i> Mar 28, 2016</span>
                        <span class="comment"><a href="#"><i class="icon-icons206"></i> 0 Comments</a></span> -->
                  </div>
                </div>

                <!-- <div class="post item">
                    <img class="lazyOwl" src="images/news-img4.jpg" alt="">
                    <div class="detail">
                        <img src="images/news-dr2.jpg" alt="">
                        <h4><a href="#">Child Birth</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eros...</p>
                        <span><i class="icon-clock3"></i> Mar 15, 2016</span>
                        <span class="comment"><a href="#"><i class="icon-icons206"></i> 0 Comments</a></span>
                    </div>
                </div>
                
                <div class="post item">
                    <img class="lazyOwl" src="images/news-img5.jpg" alt="">
                    <div class="detail">
                        <img src="images/news-dr2.jpg" alt="">
                        <h4><a href="#">Special Treatment</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eros...</p>
                        <span><i class="icon-clock3"></i> Mar 04, 2016</span>
                        <span class="comment"><a href="#"><i class="icon-icons206"></i> 11 Comments</a></span>
                    </div>
                </div>     -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Latest News-->

  <!--Start Testimonials-->
  <div class="patients-testi dark-testi">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main-title main-title2">
            <h2><span>Çok iddialı gelebilir size, ancak Healthtrack Clinic olarak 
sunduğumuz bütüncül sağlık desteği ve çözümleri ile 
öncelikle sağlığınızı koruyacak ve hastalıkların oluşmasını engelleyeceğiz. <br>
</span> - Uzm. Dr. Kadir Doğruer</h2>
          </div>
        </div>
      </div>

      <div id="testimonials">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="span12">
                <div id="owl-demo2" class="owl-carousel">
                  <div class="testi-sec">
                    <img src="images/blog-7.png" alt="" />
                    <div class="height10"></div>
                    <!-- <span class="name">Aytekin Işıklı</span>
                          <span class="patient">Yazılım Mühendisi</span>
                          <div class="height30"></div>
                          <p>
                            İlk başta çok fazla beklentim yoktu ancak bütün
                            değerlerime bakıldıktan sonra başlanılan tedavi ile
                            şu an mükemmel durumdayım teşekkürler Health Track
                            ailesi.
                          </p> -->
                    <!-- <div class="height35"></div> -->
                  </div>
                  <!-- <div class="testi-sec">
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
                        </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--End Testimonials-->
</div>
<!--End Content-->

<?php include 'footer.php'; ?>