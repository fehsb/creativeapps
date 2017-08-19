<?php
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

$country = ip_info("Visitor", "Country Code"); // IN

if ( strcasecmp( $country, 'BR' ) == 0 ){

}
else {
  header("Location: http://creativeapps.com.br/US/index.php");
  die();
}
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt">
<!--<![endif]-->
<head>
<title>Creative Apps</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="software, mobile, portfolio, creativa,android, ios,clean, app, desenvolvimento, programas">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- FACEBOOK TAGS -->
<meta property="og:locale" content="pt">
<meta property="og:url" content="http://www.creativeapps.com.br">
<meta property="og:title" content="Seja Creative">
<meta property="og:site_name" content="Creative Apps">
<meta property="og:description" content="O tutorial para compartilhar o conteúdo do seu site de forma eficaz.">
<meta property="og:type" content="website">

<!-- END FACEBOOK TAGS -->

</head>

<body>
<!-- header section -->
<section class="banner" role="banner">
  <!--header navigation -->
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="#top"><img src="images/logo.png" alt=""></a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          <li><a href="#intro">O que é ser Creative?</a></li>
          <li><a href="#services">Por que ser Creative?</a></li>
          <li><a href="#contact">Seja Creative</a></li>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!--header navigation -->
  <!-- banner text -->
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="banner-text text-center">
        <h1><b>C</b>REATIVE</h1>
        <p>Agência Digital</p>
        <nav role="navigation"> <a href="#intro" class="btn btn-large">Descubra</a> </div></nav>
      </div>
      <!-- banner text -->
    </div>
  </div>
</section>
<!-- header section -->
<!-- about section -->
<section id="intro" class="section intro no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-6">
              <div class="avatar"> <img src="images/intro-img1.jpg" alt="" class="img-responsive"> </div>
            </div>
            <div class="col-md-6">
              <blockquote>
                <h3>A mudança é certa</h3>
                <p>O mundo está em uma constante transformação, a forma como pessoas interagem.
                  Dessa forma pensamos em soluções que coloque seus cliente em primeiro lugar em qualquer lugar. </p>
                  <p>Nós da Creative, entendemos que a única certeza no mundo é a mudança. Por isso impulsionamos empresas rumo à transformação de seus produtos e serviços na era digital.</p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- about section -->

<!-- services section -->
<section id="services" class="services service-section">
  <div class="col-md-8 col-md-offset-2 text-center">
    <h2>Por que ser Creative?</h2>
    <br>
    <br>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-md-4 col-sm-6 services"> <span class="icon icon-briefcase"></span>
        <div class="services-content">
          <h4>Criação de Identidade</h4>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services"> <span class="icon icon-tools"></span>
        <div class="services-content">
          <h4>Design e Desenvolvimento</h4>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services"> <span class="icon icon-megaphone"></span>
        <div class="services-content">
          <h4>Marketing Digital</h4>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- services section -->
<!-- Get a quote section -->
<section id="contact" class="section quote">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>Procurando melhorar sua empresa? Entre em contato</h3>
      <form  action="mail.php" method="post" class="cf">
          <div class="half left cf">
            <input type="text" id="input-name" placeholder="Nome" name="name" required>
            <input type="email" id="input-email" placeholder="Email address" name="email" required>
            <input type="text" id="input-subject" placeholder="Assunto" name="subject" required>
          </div>
          <div class="half right cf">
            <textarea name="message" type="text" id="input-message" placeholder="Mensagem" name="message" required></textarea>
          </div>
          <input type="submit" value="Submit" id="input-submit">
      </form>
    </div>
</section>
<!-- Get a quote section -->
<!-- Footer section -->
<footer class="footer">
  <div class="footer-top section">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-6">
          <h5>Estamos pelo Mundo</h5>
          <p>São Paulo/SP.<br>
            comunicacao@creativeapps.com.br</p>
          <p>Copyright © 2017 Creative Apps. All Rights Reserved.</p>
        </div>
        <div class="footer-col col-md-3">
          <h5>Nossos Serviços</h5>
          <p>
          <ul>
            <li><a href="#">Marketing Digital</a></li>
            <li><a href="#">Branding</a></li>
            <li><a href="#">Desenvolvimento Mobile</a></li>
            <li><a href="#">Desenvolvimento WEB</a></li>
            <li><a href="#">Chat Bot</a></li>
          </ul>
          </p>
        </div>
        <div class="footer-col col-md-3">
          <h5>Compartilhe</h5>
          <ul class="footer-share">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
        <div class="footer-col col-md-3">
          <h5>I live out Brazil</h5>
          <ul class="footer-share">
            <li><a href="http://creativeapps.com.br">
                  <img src="images/brazil.png"style="width:35px;height:23px;border:0;">
            </a></li>

            <li><a href="http://creativeapps.com.br/US/index.html">
                  <img src="images/usa.png"style="width:38px;height:38px;border:0;">
            </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- footer top -->

</footer>
<!-- Footer section -->
<!-- JS FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/main.js"></script>
<!-- CHAT BOT-->
<link href="https://api.motion.ai/sdk/webchat.css" rel="stylesheet" type="text/css">
<script src="https://api.motion.ai/sdk/webchat.js"></script>
<script>
   motionAI_Init('77004?color=5C45A5&sendBtn=Enviar&inputBox=Digitando.....&token=28a820313bd0801b915f79b474ace94f',true,400,470,'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Circle-icons-chat.svg/1024px-Circle-icons-chat.svg.png');
   /* You may also invoke motionAI_Open() to manually open the modal. */
</script>
</body>
</html>
