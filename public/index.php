<?php
  require '../vendor/autoload.php';

  $i18n = new i18n();
  $i18n->setCachePath('../lang/langcache/');
  $i18n->setFilePath('../lang/lang_{LANGUAGE}.json');
  $i18n->setFallbackLang('bg');

  if ($_GET["lang"]) {
    if ($_GET["lang"] === "en") {
      $i18n->setForcedLang('en');
    }
    else {
      header('Location: /');
      exit();
    }
  }
  else {
    $i18n->setForcedLang('bg');
  }

  $i18n->init();

  $currentLang = $i18n->getAppliedLang();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=L::head_title?></title>
    <meta name="description" content="<?=L::head_description?>" >
    <meta name="keywords" content="<?=L::head_keywords?>">
    <meta name="author" content="<?=L::head_author?>">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <meta property="og:url"           content="<?=L::head_url?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=L::head_title?>" />
    <meta property="og:description"   content="<?=L::head_description?>" />
    <meta property="og:image"         content="http://igem-bulgaria.com/assets/images/logo_small.png" />

    <!-- Bootstrap  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- icon fonts font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/jquery.flipster.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="assets/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="assets/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="assets/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="assets/images/favicons/manifest.json">
    <link rel="mask-icon" href="assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="assets/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-TileImage" content="assets/images/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="assets/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-76150554-1', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=132172073594220";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Preloader -->
    <div id="preloader">
      <div id="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="lading"></div>
      </div>
    </div><!-- /#preloader -->
    <!-- Preloader End-->

    <!-- Main Menu -->
    <div id="main-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <!-- responsive navigation -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?=L::menu_toggle?></span>
          <i class="fa fa-bars"></i>
        </button> <!-- /.navbar-toggle -->

      <ul id="headerlanguage" class="nav navbar-nav text-left">
        <li>
          <?php if ($currentLang == "bg"): ?>
            <a href="/en">
              <strong class="language-long">
                <i class="fa fa-fw fa-globe"></i>English
              </strong>
              <strong class="language-short">
                <i class="fa fa-fw fa-globe"></i>EN
              </strong>
            </a>
          <?php else:?>
            <a href="/">
              <strong class="language-long">
                <i class="fa fa-fw fa-globe"></i>Български
              </strong>
              <strong class="language-short">
                <i class="fa fa-fw fa-globe"></i>БГ
              </strong>
            </a>
          <?php endif;?>
        </li>
      </ul>
      </div> <!-- /.navbar-header -->

      <nav class="collapse navbar-collapse">
        <img id="logo" src="assets/images/logo_small.png">
        <!-- Main navigation -->
        <ul id="headernavigation" class="nav navbar-nav">
          <li class="active"><a href="#page-top"><i class="fa fa-fw fa-home"></i><?=L::menu_home?></a></li>
          <li><a href="#team"><i class="fa fa-fw fa-users"></i><?=L::menu_team?></a></li>
          <li><a href="#about"><i class="fa fa-fw fa-question"></i><?=L::menu_about?></a></li>
          <li><a href="#donations"><i class="fa fa-fw fa-usd"></i><?=L::menu_donations?></a></li>
          <li><a href="#contact"><i class="fa fa-fw fa-phone"></i><?=L::menu_contact?></a></li>
          <li>
            <div class="fb-like" data-href="https://facebook.com/iGEMBg" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
          </li>
        </ul> <!-- /.nav .navbar-nav -->
      </nav> <!-- /.navbar-collapse  -->
    </div><!-- /#main-menu -->
    <!-- Main Menu End -->

    <!-- Page Top Section -->
    <section id="page-top" class="section-style" data-background-image="assets/images/background/top.jpg">
      <div class="pattern height-resize">
        <div class="container">
          <h3 class="section-name">
            <span>
              <?=L::home_section_name?>
            </span>
          </h3><!-- /.section-name -->

          <h1 class="site-title">
            <span><?=L::home_section_title?></span>
          </h1><!-- /.site-title -->

          <p class="section-description">
            <span><?=L::home_section_description?></span>
          </p>

          <div class="social-btn-container">
            <span class="social-btn-box">
              <a href="https://www.facebook.com/iGEMbg/" target="_blank" class="facebook-btn"><i class="fa fa-facebook"></i></a>
            </span><!-- /.social-btn-box -->

            <span class="social-btn-box">
              <a href="https://twitter.com/iGEMBulgaria" target="_blank" class="twitter-btn"><i class="fa fa-twitter"></i></a>
            </span><!-- /.social-btn-box -->

            <span class="social-btn-box">
              <a href="https://www.linkedin.com/company/igem-bulgaria" target="_blank" class="linkedin-btn"><i class="fa fa-linkedin"></i></a>
            </span><!-- /.social-btn-box -->

            <span class="social-btn-box">
              <a href="https://plus.google.com/116744626821448627789" target="_blank" class="google-plus-btn"><i class="fa fa-google-plus"></i></a>
            </span><!-- /.social-btn-box -->

            <span class="social-btn-box">
              <a href="https://github.com/iGEM-Bulgaria" target="_blank" class="github-btn"><i class="fa fa-github"></i></a>
            </span><!-- /.social-btn-box -->

            <span class="social-btn-box">
              <a href="mailto:team@igem-bulgaria.com" target="_blank" class="email-btn"><i class="fa fa-envelope"></i></a>
            </span><!-- /.social-btn-box -->
          </div>

          <div class="next-section">
            <a class="go-to-team"><span></span></a>
          </div><!-- /.next-section -->

        </div><!-- /.container -->
      </div><!-- /.pattern -->    
    </section><!-- /#page-top -->
    <!-- Page Top Section  End -->


    <!-- Team Section -->
    <section id="team" class="section-style" data-background-image="assets/images/background/team.jpg">
      <div class="pattern height-resize"> 
        <div class="container">
          <h3 class="section-name">
            <span>
              <?=L::team_section_name?>
            </span>
          </h3><!-- /.section-name -->
          <h2 class="section-title">
            <?=L::team_section_title?>
          </h2><!-- /.Section-title  -->
          <p class="section-description">
            <?=L::team_section_description?>
          </p><!-- /.section-description -->
          <!-- Team Slider -->
          <div id="carousel">
              <ul class="flip-items">
                  <li class = "team-photos" data-flip-title="Team5" data-flip-category="Purples">
                      <img src="assets/images/team/team5.jpg">
                  </li>
                  <li class = "team-photos" data-flip-title="Team6" data-flip-category="Purples">
                      <img src="assets/images/team/team4.jpg">
                  </li>
                  <li class = "team-photos" data-flip-title="Team3" data-flip-category="Purples">
                      <img src="assets/images/team/team6.jpg">
                  </li>
                  <li class = "team-photos" data-flip-title="Team1" data-flip-category="Yellows">
                      <img src="assets/images/team/team.jpg">
                  </li>
                  <li class = "team-photos" data-flip-title="Team2" data-flip-category="Purples">
                      <img src="assets/images/team/team2.jpg">
                   </li>
                  <li class = "team-photos" data-flip-title="Team4" data-flip-category="Purples">
                      <img src="assets/images/team/team3.jpg">
                   </li>
              </ul>
          </div>

          <div class="next-section">
            <a class="go-to-about"><span></span></a>
          </div><!-- /.next-section -->

        </div><!-- /.container -->
      </div><!-- /.pattern -->
    </section><!-- /#team -->
    <!-- Team Section End -->



    <!-- about Section -->
    <section id="about" class="section-style" data-background-image="assets/images/background/about.jpg">
      <div class="pattern height-resize">
        <div class="container">
          <h3 class="section-name">
            <span>
              <?=L::about_section_name?>
            </span>
          </h3><!-- /.section-name -->
          <h2 class="section-title">
            <?=L::about_section_title?>
          </h2><!-- /.Section-title  -->

          <p class="text-justify">
            <?=L::about_textp1?>
          </p>
          <p class="text-justify">
            <?=L::about_textp2?>
          </p>

          <div class="next-section">
            <a class="go-to-donations"><span></span></a>
          </div><!-- /.next-section -->

        </div><!-- /.container -->
      </div><!-- /.pattern -->
    </section><!-- /#about -->
    <!-- about Section End -->

    <!-- donations Section -->
    <section id="donations" class="section-style" data-background-image="assets/images/background/donations.jpg">
      <div class="pattern height-resize">
        <div class="container">
          <h3 class="section-name">
            <span>
              <?=L::donations_section_name?>
            </span>
          </h3><!-- /.section-name -->
          <h2 class="section-title">
            <?=L::donations_section_title?>
          </h2><!-- /.Section-title  -->

          <div >
            <ul id="donation-list">            
               <div class="col-md-4 donationStep" id="done"><i class="fa fa-fw fa-check"></i>2. <?=L::donations_list1?></div>
               <div class="col-md-4 donationStep" id ="inProgress"><i class="fa fa-fw fa-question"></i>3. <?=L::donations_list2?><br><a href="https://onedrive.live.com/view.aspx?resid=53D1B28ED215AEBC!697&ithint=file%2cxlsx&app=Excel&authkey=!AM1Y2PwjkpWWCCU"><?=L::donations_budjet?></a></div>
               <div class="col-md-4 donationStep" id="incomming"><i class="fa fa-fw fa-times"></i>4. <?=L::donations_list3?></div>
            </ul>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-4">
            <div id="donation-progress-wrapper" class="dark">
              <div id="donation-registration" class="donations-circle">
                <strong></strong>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div id="donation-progress-wrapper" class="dark">
              <div id="donation-materials" class="donations-circle">
                <strong></strong>
              </div>
            </div>
          </div>          
          <div class="col-md-4">
            <div id="donation-progress-wrapper" class="dark">
              <div id="donation-travel" class="donations-circle">
                <strong></strong>
              </div>
            </div>
          </div>


          <div class="clearfix"></div>

          <p class="donation-title text-center dark">
            <strong><?=L::donations_weare_title?></strong>
          </p>
          <p class="text-center">
            <strong>
              <?=L::donations_weare_text?>
            </strong>
          </p>

          <div class="clearfix"></div>

          <div class="col-md-8">
            <strong>
              <p class="donation-title text-center dark">
                <?=L::donations_bank_title?>
              </p>

              <p>
                <?=L::donations_bank_details?>
              </p>
              <p class="donation-reason bg-primary text-danger text-center dark">
                <?=L::donations_bank_reason?>
              </p>
            </strong>
          </div>

          <div class="col-md-4">
            <p class="donation-title text-center dark">
              <strong>
               <?=L::donations_paypal_title?>
              </strong>
            </p>

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center" id="paypal-form">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="748H3LUV52FLE">
              <input type="image" src="assets/images/paypal_button.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" width="220">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>

          <div class="clearfix"></div>

          <div class="next-section">
            <a class="go-to-contact"><span></span></a>
          </div><!-- /.next-section -->

        </div><!-- /.container -->
      </div><!-- /.pattern -->
    </section><!-- /#donations -->
    <!-- donations Section End -->

    <!-- Contact Section -->
    <section id="contact" class="section-style" data-background-image="assets/images/background/contact.jpg">
      <div class="pattern height-resize">
        <div class="container">
          <h3 class="section-name">
            <span>
              <?=L::contact_section_name?>
            </span>
          </h3><!-- /.section-name -->
          <h2 class="section-title">
            <?=L::contact_section_title?>
          </h2><!-- /.Section-title  -->
          <p class="section-description">
            <?=L::contact_section_description?>
            <?=L::contact_address?>
          </p><!-- /.section-description -->

          <div class="team-container container">
            <div class="row">
              <div class="col-sm-6">
                <div class="team-member">
                  <figure>
                    <img src="assets/images/team/mario.jpg" alt="<?=L::contact_members_mario_name?>">
                    <figcaption>
                      <p class="member-name"><?=L::contact_members_mario_name?></p>
                      <p class="designation">
                        <?=L::contact_members_mario_role?><br>
                        <i class="fa fa-phone"></i>&nbsp;&nbsp;<a href="tel:+359885940323">+359885940323</a>
                      </p><!-- /.designation -->
                    </figcaption>
                  </figure>
                  <div class="social-btn-container">
                    <div class="team-socail-btn">
                      <span class="social-btn-box phone-btn-container">
                        <a href="tel:+359885940323" class="phone-btn">
                          <i class="fa fa-phone"></i>
                        </a><!-- /.phone-btn -->
                      </span><!-- /.social-btn-box -->

                      <span class="social-btn-box google-plus-btn-container">
                        <a href="#" class="google-plus-btn">
                          <i class="fa fa-google-plus"></i>
                        </a><!-- /.google-plus-btn -->
                      </span><!-- /.social-btn-box -->

                      <span class="social-btn-box linkedin-btn-container">
                        <a href="https://www.linkedin.com/in/mario-markov-0ba7666a" class="linkedin-btn">
                          <i class="fa fa-linkedin"></i>
                        </a><!-- /.linkedin-btn -->
                      </span><!-- /.social-btn-box -->

                      <span class="social-btn-box email-btn-container">
                        <a href="mailto:mario@igem-bulgaria.com" class="email-btn">
                          <i class="fa fa-envelope"></i>
                        </a><!-- /.email-btn -->
                      </span><!-- /.social-btn-box -->
                    </div><!-- /.team-socail-btn -->
                  </div><!-- /.social-btn-container -->
                </div><!-- /.team-member -->
              </div><!-- /.col-sm-6 -->

              <div class="col-sm-6">
                <div class="team-member boris">
                  <figure>
                    <img src="assets/images/team/borko.jpg" alt="<?=L::contact_members_boris_name?>">
                    <figcaption>
                      <p class="member-name"><?=L::contact_members_boris_name?></p>
                      <p class="designation">
                        <?=L::contact_members_boris_role?><br>
                        <i class="fa fa-phone"></i>&nbsp;&nbsp;<a href="tel:+359889604145">+359889604145</a>
                      </p><!-- /.designation -->
                    </figcaption>
                  </figure>
                  <div class="social-btn-container">
                    <div class="team-socail-btn">
                      <span class="social-btn-box phone-btn-container">
                        <a href="tel:+359889604145" class="phone-btn">
                          <i class="fa fa-phone"></i>
                        </a><!-- /.phone-btn -->
                      
                      </span><!-- /.social-btn-box -->
                       <span class="social-btn-box email-btn-container">
                        <a href="mailto:mario@igem-bulgaria.com" class="email-btn">
                          <i class="fa fa-envelope"></i>
                        </a><!-- /.email-btn -->
                      </span><!-- /.social-btn-box -->

                    </div><!-- /.team-socail-btn -->
                  </div><!-- /.social-btn-container -->
                </div><!-- /.team-member -->
              </div><!-- /.col-sm-6 -->
            </div>
          </div><!-- /.team-container -->
          <div class="container text-center">
            <div class="fb-page" data-href="https://www.facebook.com/iGEMbg" data-tabs="timeline" data-width="500" data-height="700" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/iGEMbg"><a href="https://www.facebook.com/iGEMbg">IGEM Bulgaria</a></blockquote></div></div>
          </div>

          <div class="next-section">
            <a class="go-to-page-top"><span></span></a>
          </div><!-- /.next-section -->

        </div><!-- /.container -->
      </div><!-- /.pattern -->

    </section><!-- /#contact -->
    <!-- Contact Section End -->

    <!-- Footer Section -->
    <footer id="footer-section">
      <p class="copyright">
        &copy; <a href="http://igem-bulgaria.com/"><?=L::head_title?></a> 2015-<?=date("Y")?>, <?=L::foot_copyright?></a>
      </p>
    </footer>
    <!-- Footer Section End -->


    <!-- jQuery Library -->
    <script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
    <!-- Modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr-2.8.0.min.js"></script>
    <!-- Plugins -->
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <!-- Custom JavaScript Functions -->
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <!-- Custom JavaScript Functions -->
    <script type="text/javascript" src="assets/js/circle-progress.js"></script>
    <!-- Slider Javascript Functions -->
    <script type="text/javascript" src="assets/js/jquery.flipster.min.js"></script>

    <script>
      // Team photo slider
      var carousel = $("#carousel").flipster({
          style: 'carousel',
          spacing: -0.5,
          nav: true,
          buttons:   true,
      });

      // registration counter
      var currentAmmount = 5000;
      var goal = 5000;
      $('#donation-registration').circleProgress({
          value: (currentAmmount / goal),
          size: 120,
          fill: {
            gradient: ["#11653B", "#2DB36E"]
          }
      }).on('circle-animation-progress', function(event, progress, stepValue) {
          $(this).find('strong').text("$" + String((stepValue * goal).toFixed(0)));
      });
      // materials counter
      var materialAmmount = 120;
      var materialGoal = 35000;
      $('#donation-materials').circleProgress({
          value: (materialAmmount/materialGoal),
          size: 120,
          fill: {
            gradient: ["#DFC92D", "#DFC92D"]
          }
      }).on('circle-animation-progress', function(event, progress, stepValue) {
          $(this).find('strong').text("$" + String((stepValue * materialGoal).toFixed(0)));
      });
      // travel costs counter
      var travelCost = 1400;
      var travelCostGoal = 10000;
      $('#donation-travel').circleProgress({
          value: (travelCost / travelCostGoal),
          size: 120,
          fill: {
            gradient: ["#EE3B38", "#DFC92D"]
          }
      }).on('circle-animation-progress', function(event, progress, stepValue) {
          $(this).find('strong').text("$" + String((stepValue * travelCostGoal).toFixed(0)));
      });
      
    </script>
  </body>
</html>
