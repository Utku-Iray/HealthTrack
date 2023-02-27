<?php
include "database/connection.php";
include "config.php";

include 'utility/api/get-contact-main-information.php';
include 'utility/api/get-treatments.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Health Track</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="icon" type="image/png" href="images/favicon.png" />

  <!--main file-->
  <link href="css/medical-guide.css" rel="stylesheet" type="text/css" />

  <!--Medical Guide Icons-->
  <link href="fonts/medical-guide-icons.css" rel="stylesheet" type="text/css" />

  <!-- Default Color-->
  <link href="css/default-color.css" rel="stylesheet" id="color" type="text/css" />

  <!--bootstrap-->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

  <!--Dropmenu-->
  <link href="css/dropmenu.css" rel="stylesheet" type="text/css" />

  <!--Sticky Header-->
  <link href="css/sticky-header.css" rel="stylesheet" type="text/css" />

  <!--revolution-->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/settings.css" rel="stylesheet" type="text/css" />
  <link href="css/extralayers.css" rel="stylesheet" type="text/css" />

  <!--Accordion-->
  <link href="css/accordion.css" rel="stylesheet" type="text/css" />

  <!--tabs-->
  <link href="css/tabs.css" rel="stylesheet" type="text/css" />

  <!--Owl Carousel-->
  <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
  	<!--FancyBox-->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">

  <!-- Mobile Menu -->
  <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />

  <!--PreLoader-->
  <link href="css/loader.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div id="wrap">
    <!--Start PreLoader-->
    <div id="preloader">
      <div id="status">&nbsp;</div>
      <div class="loader">


        <img src="images/giris-ekrani.gif" style="width: 25%;" type="video/gif">

      </div>
    </div>
    <!--End PreLoader-->


    <!--Start Top Bar-->
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <!-- <span>Yaşam Performans Yönetimi.</span> -->
          </div>

          <div class="col-md-7">
            <div class="get-touch">
              <ul>
                <li>
                  <a href="tel:05438400220"><i class="icon-phone4"></i><?= $contactMainPhone["contact_content"] ?></a>
                </li>
                <li>
                  <a href="mailto:<?= $contactMainEmail["contact_content"] ?>"><i class="icon-mail"></i> <?= $contactMainEmail["contact_content"] ?></a>
                </li>
              </ul>

              <ul class="social-icons">
                <li>
                  <a href="#." class="fb"><i class="icon-euro"></i> </a>
                </li>
                <li>
                  <a href="#." class="tw"><img src="images/youtube.png" alt=""> </a>
                </li>
                <li>
                  <a href="#." class="gp"><img src="images/instagram.png" alt=""></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Top Bar End-->

    <!--Start Header-->
    <style>
      .aytek {
        color: white !important;
        background-color: #3B919E;
        border: none;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        border-radius: 5px;
      }

      .aytek a {
        color: white !important;
      }

      .aytek::before {
        color: white !important;
      }

      .aytek:hover {
        border-radius: 12px !important;
      }
    </style>
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <a href="index.php" class="logo"><img style="position: relative;
    top: 50%;
    transform: translateY(-0%);" src="images/logo-4.png" alt="" /></a>
          </div>


          <div class="col-md-9">
            <nav class="menu-2">
              <ul class="nav wtf-menu">
                <li class="item-select parent"><a href="index.php">Anasayfa</a></li>

                <li class="parent">
                  <a href="#">Neden Biz?</a>
                  <ul class="submenu">
                    <!-- <li class="parent">
                        <a href="misyon-vizyon.php">Misyonumuz ve Vizyonumuz</a>
                      </li> -->

                    <li class="parent"><a href="ekip.php">Ekibimiz</a> </li>
                   </li>

                    <li class="parent"><a href="misyon-vizyon.php">Temel Değerlerimiz</a></li>
                  </ul>
                </li>

                <li class="parent">
                  <a href="tedaviler.php">Tedaviler</a>
                  <ul class="submenu">
                    <?php foreach ($treatmentsResult as $singleTreatment) { ?>
                      <li class="parent">
                        <a href="tedavi-detay.php?url=<?= $singleTreatment->url ?>"><?= $singleTreatment->name ?></a>
                      </li>
                    <?php  } ?>


                  </ul>
                </li>

           

                <li class="parent"><a href="saglikli-haber.php">Sağlıklı Haber</a></li>
                <li class="parent" >
              <a href="tedavi-detay.php?url=mobil-hizmetler">Mobil Hizmetler</a>

            </li>
                <li class="parent"><a href="#">Randevu Al</a></li>
                <li><a href="iletisim.php">İletişim</a></li>

                <!-- <li class="parent">
                  <a disabled><i class="icon-world" style="font-size: larger;"></i></a>
                  <ul class="submenu">
                    <li><a href="<?php
                                  $langQuery['lang'] = "tr";
                                  $query_result = http_build_query($langQuery);
                                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>">Türkçe</a>
                    </li>
                  </ul>
                </li> -->
                <!-- <li><a href="randevu.php">Randevu</a></li> -->


              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- Mobile Menu Start -->
    <div class="container">
      <div id="page">
        <header class="header">
          <a href="#menu"></a>
        </header>

        <nav id="menu">
          <ul class="nav wtf-menu">
            <li class="item-select parent"><a href="index.php">Anasayfa</a></li>

            <li class="parent">
              <a href="neden-biz.php">Neden Biz?</a>
              <ul class="submenu">
                <!-- <li class="parent">
                        <a href="misyon-vizyon.php">Misyonumuz ve Vizyonumuz</a>
                      </li> -->

                      <li class="parent"><a href="#">Değerlerimiz</a>
                    <ul class="submenu">
                        <li> <a href="ekip.php">Ekibimiz</a> </li>

                      </ul></li>

                <li class="parent"><a href="misyon-vizyon.php">Misyon Vizyon & Temel Değerler</a></li>
              </ul>
            </li>

            <li class="parent">
              <a href="tedaviler.php">Tedaviler</a>
              <ul class="submenu">
                <?php foreach ($treatmentsResult as $singleTreatment) { ?>
                  <li class="parent">
                    <a href="tedavi-detay.php?url=<?= $singleTreatment->url ?>"><?= $singleTreatment->name ?></a>
                  </li>
                <?php  } ?>
              </ul>
            </li>



            <li class="parent">
              <a href="saglikli-haber.php">Sağlıklı Haber</a>

            </li>
            <li class="parent" >
              <a href="tedavi-detay.php?url=mobil-hizmetler">Mobil Hizmetler</a>

            </li>

            <li><a href="iletisim.php">İletişim</a></li>
            <!-- <li><a href="randevu.php">Randevu</a></li> -->


            <!-- <li class="parent">
              <a disabled><i class="icon-world" style="font-size: larger;"></i></a>
              <ul class="submenu">
                <li><a href="<?php
                              $langQuery['lang'] = "tr";
                              $query_result = http_build_query($langQuery);
                              echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>">Türkçe</a>
                </li>
              </ul>
            </li> -->

          </ul>
        </nav>
      </div>
    </div>
    <!-- Mobile Menu End -->
    <div style="display: flex;justify-content: center;align-items: center;position: fixed;bottom: 15px;right: 15px;z-index: 999999;-webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);-moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);-ms-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);">

      <a target="_blank" href="https://api.whatsapp.com/send?phone=908508400220&amp;text=Hi!"><svg style="pointer-events:none;display:block;height: 55px;width: 55px;" width="50px" height="50px" viewBox="0 0 1024 1024">
          <defs>
            <path id="htwasqicona-chat" d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z"></path>
          </defs>
          <linearGradient id="htwasqiconb-chat" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
            <stop offset="0" stop-color="#61fd7d"></stop>
            <stop offset="1" stop-color="#2bb826"></stop>
          </linearGradient>
          <use xlink:href="#htwasqicona-chat" overflow="visible" fill="url(#htwasqiconb-chat)"></use>
          <g>
            <path fill="#FFF" d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z"></path>
          </g>
        </svg></a>
    </div>
    <!--End Header-->