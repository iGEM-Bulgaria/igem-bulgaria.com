<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);

  $questions = array(
    "who" => "Кой си ти?",
    "birthday" => "Кога сте роден?",
    "email" => "Твоя email адрес?",
    "whyus" => "Защо избра нас?",
    "whyyou" => "Защо ние да изберем теб?",
    "idea" => "Опиши твоята идея за супер-проект за състезанието iGEM?",
    "sortable" => "Подреди по важност (от най-важно към най-малко важно)"
  );
  $sortables = array(
    "Лична изява",
    "Да се зачита мнението ми",
    "Да работя в екип",
    "Да научавам нови неща",
    "Да работя в България",
    "iGEM България да успее",
    "Да се забавлявам докато работя"
  );
  $invalid = array();
  $success = false;
  $message = "";

  // echo "<pre>" . var_export($_POST, true) . "</pre>";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (array_keys($questions) as $questionId) {
      if (!isset($_POST[$questionId]) || !$_POST[$questionId]) {
        $invalid[] = $questionId;
      }
      else {
        if ($questionId != "sortable") {
          $message .= $questions[$questionId] . ":\n\n" . $_POST[$questionId] . "\n\n";
        }
        else {
          $message .= $questions[$questionId] . ":\n";
          foreach (explode(",", $_POST["sortable"]) as $idx) {
            $message .= "\t" . $sortables[$idx] . "\n";
          }
        }
      }
    }
    if (empty($invalid)) {
      $success = true;

      $to      = "team@igem-bulgaria.com";
      $subject = "=?UTF-8?B?".base64_encode("Ново членче - " . $_POST["email"])."?=";
      $headers = array();
      $headers[] = "MIME-Version: 1.0";
      $headers[] = "Content-Type: text/plain; charset=UTF-8";
      $headers[] = "From: Join iGEM Bulgaria <join@igem-bulgaria.com>";
      mail($to, $subject, $message, implode("\r\n", $headers));
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>iGEM България търси биолози</title>
    <meta name="description" content="" >
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- icon fonts font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/join.css" rel="stylesheet">

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
    <section id="page-top" class="section-style" data-background-image="assets/images/background/top.jpg">
      <div class="pattern height-resize">
        <div class="container">
          <?php if(!$success): ?>
            <h1 class="text-center">Ти си биолог?</h1>
            <h2 class="text-center">Искаш да станеш част от iGEM Bulgaria?</h1>
            <br>
            <p class="text-justify">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>

            <form role="form" id="join-form" method="POST" action="/join">
              <div class="form-group <?=in_array("who", $invalid) ? "has-error" : "" ?>">
                <label for="who" class="control-label"><?=$questions["who"]?></label>
                <textarea class="form-control" rows="5" id="who" name="who" form="join-form"><?=$_POST["who"]?></textarea>
              </div>
              <div class="form-group <?=in_array("birthday", $invalid) ? "has-error" : "" ?>">
                <label for="birthday"><?=$questions["birthday"]?></label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="<?=$_POST['birthday']?>">
              </div>
              <div class="form-group <?=in_array("email", $invalid) ? "has-error" : "" ?>">
                <label for="email" class="control-label"><?=$questions["email"]?></label>
                <input type="email" class="form-control" name="email" id="email" value="<?=$_POST["email"]?>">
              </div>
              <div class="form-group <?=in_array("whyus", $invalid) ? "has-error" : "" ?>">
                <label for="whyus"><?=$questions["whyus"]?></label>
                <textarea class="form-control" rows="5" id="whyus" name="whyus" form="join-form"><?=$_POST["whyus"]?></textarea>
              </div>
              <div class="form-group <?=in_array("whyyou", $invalid) ? "has-error" : "" ?>">
                <label for="whyyou"><?=$questions["whyyou"]?></label>
                <textarea class="form-control" rows="5" id="whyyou" name="whyyou" form="join-form"><?=$_POST["whyyou"]?></textarea>
              </div>
              <div class="form-group <?=in_array("idea", $invalid) ? "has-error" : "" ?>">
                <label for="idea"><?=$questions["idea"]?></label>
                <textarea class="form-control" rows="5" id="idea" name="idea" form="join-form"><?=$_POST["idea"]?></textarea>
              </div>
              <div class="form-group">
                <label for="sortable"><?=$questions["sortable"]?></label>
                <input type="hidden" id="sortable-array" name="sortable" value="">
                <ul id="sortable">
                    <?php foreach($sortables as $idx => $priority): ?>
                      <li data-id="<?=$idx?>"><span class="drag-handle">☰</span><?=$priority?></li>
                    <?php endforeach;?>
                </ul>
              </div>
              <input type="submit" class="btn btn-default" value="Изпрати">
            </form>
          <?php else: ?>
            <h2 class="text-center">Благодарим ти! Ще се свържем с теб!</h2>
            <br>
            <a href="/">
              <img src="/assets/images/logo_small.png" class="img img-responsive" id="logo">
            </a>
          <?php endif;?>
        </div>
      </div>
    </section>


    <!-- jQuery Library -->
    <script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
    <!-- Modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr-2.8.0.min.js"></script>
    <!-- Plugins -->
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <!-- Custom JavaScript Functions -->
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <!-- Custom JavaScript Functions -->
    <script type="text/javascript" src="assets/js/sortable.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        var sortable = Sortable.create(document.getElementById('sortable'));
        <?php if($_POST["sortable"]): ?>
          sortable.sort(<?="[".$_POST["sortable"]."]"?>);
        <?php endif;?>

        $("#join-form").submit(function(e) {
          $('#sortable-array').val(sortable.toArray());
        });
      });
    </script>
  </body>
</html>