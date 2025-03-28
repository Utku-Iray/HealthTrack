 <!--Start Footer-->
 <footer class="footer" id="footer">
   <div class="container">
     <!-- <div class="row">
            <div class="col-md-12">
              <div class="emergency">
                <i class="icon-phone5"></i>
                <span class="text">Bize Ulaşabilirsiniz</span>
                <span class="number">+90 850 840 02 20</span>
                <img src="images/emergency-divider.png" alt="" />
              </div>
            </div>
          </div> -->
     <style>
       .dropbtn {

         color: white;
         padding: 16px;
         font-size: 16px;
         border: none;
       }

       .dropdown {
         position: relative;
         display: inline-block;
       }

       .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f1f1f1;
         min-width: 160px;
         box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
         z-index: 1;
         border-radius: 5px;
       }

       .dropdown-content a {
         color: black;
         padding: 12px 16px;
         text-decoration: none;
         display: block;
       }

       .dropdown-content a:hover {
         background-color: #3b919e;
         color: white;
       }

       .dropdown:hover .dropdown-content {
         display: block;
       }

       .dropdown:hover .dropbtn {
         background-color: #3e8e41;
       }
     </style>
     <div class="main-footer">
       <div class="row">
         <div class="col-md-3">
           <div class="useful-links">
             <div class="title">
               <h5>HEALTHTRACK</h5>
             </div>

             <div class="detail">
               <ul>
                 <li><a href="/"><?php echo $lang['homepage'] ?></a></li>
                 <li><a href="hakkimizda.php"><?php echo $lang['ourTeam'] ?></a></li>
                 <li><a href="iletisim.php"><?php echo $lang['contact'] ?></a></li>
                 <li><a href="randevu.php"><?php echo $lang['appointment'] ?></a></li>
                 <li><a href="video-gallery.php"><?php echo $lang['videos'] ?></a></li>
               </ul>
             </div>
           </div>
         </div>
         <div class="col-md-3">
           <div class="useful-links">
             <div class="title">
               <h5><?php echo $lang['treatmentsFooter'] ?></h5>
             </div>

             <div class="detail">
               <ul style="display: grid;width:400px">
                 <?php foreach ($treatmentsResult as $singleTreatment) { ?>
                   <li>
                     <a href="tedavi-detay.php?url=<?= $singleTreatment->url ?>"><?= $singleTreatment->name ?></a>
                   </li>
                 <?php  } ?>
               </ul>
             </div>
           </div>
         </div>
         <div class="col-md-3">
           <div class="newsletter">
             <div class="title">
               <h5><?php echo $lang['letsMeet'] ?></h5>
             </div>

             <div class="detail">
               <!-- <div class="signup-text">
                 <i class="icon-dollar"></i>
                 <span></span>
               </div> -->

               <div class="form">
                 <p class="subscribe_success" id="subscribe_success" style="display: none"></p>
                 <p class="subscribe_error" id="subscribe_error" style="display: none"></p>

                 <form  method="POST" action="mail/footer-mail.php">
                   <input type="text" data-delay="300" placeholder="<?php echo $lang['nameSurname'] ?>" name="name"  class="input" required="" />
                   <input type="text" data-delay="300" placeholder="<?php echo $lang['eMail'] ?>" name="email"  class="input" required="" />
                   <input type="text" data-delay="300" placeholder="<?php echo $lang['phone'] ?>" name="phone"   class="input" required="" />
                   <input name="Subscribe" type="submit" value="<?php echo $lang['send'] ?>" />
                 </form>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-3">
           <div class="get-touch">
             <div class="title">
               <h5><?php echo $lang['contactUs'] ?></h5>
             </div>

             <div class="detail">
               <div class="get-touch">
                 <span class="text"></span>

                 <ul>
                   <li style="display: flex;">
                     <i class="icon-location"></i>
                     <p style="color: white; line-height:18px;"><?= $contactMainAddress["contact_content"] ?>
                     </p>
                   </li>
                   <li>
                     <i class="icon-phone4"></i>
                     <a href="tel:<?= $contactMainPhone["contact_content"] ?>"><?= $contactMainPhone["contact_content"] ?></a>
                   </li>
                   <li>
                     <a href="#."><i class="icon-dollar"></i>
                       <a href="mailto:<?= $contactMainEmail["contact_content"] ?>"><?= $contactMainEmail["contact_content"] ?></a></a>
                   </li>
                 </ul>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="footer-bottom">
     <div class="container">
       <div class="row">
         <div class="col-md-6">
           <span class="copyrights">Copyright &copy; 2022 Fikirbuzz. <?php echo $lang ["butunHaklariGizlidir"] ?>.
             <div style="padding-top: 5px;"> <a href="gizlilik-politikasi.php"><?php echo $lang ["gizlilikPolitikasi"] ?></a> | <?php if ($selectedLang=="tr") {?>
              <a href="kvkk-metni.php"> <?php echo $lang ["kvkk"] ?>|  </a>  <?php }   ?>  <a href="tedavi-onayi.php"><?php echo $lang ["tedaviOnayi"] ?></a></div>
           </span>
         </div>

         <div class="col-md-6">
           <div class="social-icons">
             <a href="https://www.facebook.com/healthtrackclinic" class="fb"><i class="icon-euro"></i></a>
             <a href="https://www.linkedin.com/company/healthtrack-clinic/" class="tw"><i class="icon-linkedin3"></i></a>
             <a href="https://www.instagram.com/healthtrackclinic/" class="gp"><i class="icon-instagram"></i></a>

           </div>
         </div>
       </div>
     </div>
   </div>
 </footer>
 <!--End Footer-->

 <a href="#0" class="cd-top"></a>
 </div>

 <script type="text/javascript" src="js/jquery.js"></script>

 <!-- SMOOTH SCROLL -->
 <script type="text/javascript" src="js/scroll-desktop.js"></script>
 <script type="text/javascript" src="js/scroll-desktop-smooth.js"></script>

 <!-- START REVOLUTION SLIDER -->
 <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
 <script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>

 <!-- Date Picker and input hover -->
 <script type="text/javascript" src="js/classie.js"></script>
 <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>

 <!-- Date Picker and input hover -->
 <script type="text/javascript" src="js/jquery.fancybox.js"></script>
 <script type="text/javascript" src="js/jquery.fancybox-media.js"></script>

 <!-- Fun Facts Counter -->
 <script type="text/javascript" src="js/counter.js"></script>

 <!-- Welcome Tabs -->
 <script type="text/javascript" src="js/tabs.js"></script> 


 <!-- All Carousel -->
 <script type="text/javascript" src="js/owl.carousel.js"></script>

 <!-- Mobile Menu -->
 <script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>

 <!-- All Scripts -->
 <script type="text/javascript" src="js/custom.js"></script>
 <script>
   // Fancybox 

   /*
   *
   Simple
   image
   gallery.
   Uses
   default
   settings
   */
   $('.fancybox').fancybox();
   /*
   *
   Different
   effects
   */
   $(document).ready(function() {
     $('.fancybox-media').fancybox({
       openEffect: 'none',
       closeEffect: 'none',
       helpers: {
         media: {}
       }
     });
   });
 </script>
 <!-- Revolution Slider -->
 <script>
  var height = $(window).height() ;
 </script>
 <script type="text/javascript">
   jQuery(".tp-banner")
     .show()
     .revolution({
       dottedOverlay: "none",
       delay: 16000,
       startwidth: 1170,
       startheight: height-140,
       hideThumbs: 200,

       thumbWidth: 100,
       thumbHeight: 50,
       thumbAmount: 5,

       navigationType: "nexttobullets",
       navigationArrows: "solo",
       navigationStyle: "preview",

       touchenabled: "on",
       onHoverStop: "on",

       swipe_velocity: 0.7,
       swipe_min_touches: 1,
       swipe_max_touches: 1,
       drag_block_vertical: false,

       parallax: "mouse",
       parallaxBgFreeze: "on",
       parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

       keyboardNavigation: "off",

       navigationHAlign: "center",
       navigationVAlign: "bottom",
       navigationHOffset: 0,
       navigationVOffset: 20,

       soloArrowLeftHalign: "left",
       soloArrowLeftValign: "center",
       soloArrowLeftHOffset: 20,
       soloArrowLeftVOffset: 0,

       soloArrowRightHalign: "right",
       soloArrowRightValign: "center",
       soloArrowRightHOffset: 20,
       soloArrowRightVOffset: 0,

       shadow: 0,
       fullWidth: "on",
       fullScreen: "off",

       spinner: "spinner4",

       stopLoop: "off",
       stopAfterLoops: -1,
       stopAtSlide: -1,

       shuffle: "off",

       autoHeight: "off",
       forceFullWidth: "off",

       hideThumbsOnMobile: "off",
       hideNavDelayOnMobile: 1500,
       hideBulletsOnMobile: "off",
       hideArrowsOnMobile: "off",
       hideThumbsUnderResolution: 0,

       hideSliderAtLimit: 0,
       hideCaptionAtLimit: 0,
       hideAllCaptionAtLilmit: 0,
       startWithSlide: 0,
       videoJsPath: "rs-plugin/videojs/",
       fullScreenOffsetContainer: "",
     });
 </script>
 </body>

 </html>