<?php require __DIR__ . "/../sistema/config/config.php";
$amigavel = "radioceara";

if ( $_GET['radio'] ) {
	$amigavel = $_GET['radio'];
}

$sql = $mysqli->query( "SELECT id_associado, nome_associado, amigavel, servidor1, status FROM radios WHERE amigavel='$amigavel' AND status='sim'" );
$row = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo "$i[site]"; ?>/radio/">
    <title><?php echo "$i[titulo_da_pagina]"; ?></title>
    <meta name="description" content="<?php echo "$i[slogan]"; ?>">
    <meta NAME="keywords" content="<?php echo "$i[tags]"; ?>">
    <meta name="autor" content="JMultimídia - Johannes Nogueira">
    <meta name="reply-to" content="suporte@jmultimidia.com.br">
    <meta property="og:title" content="<?php echo "$i[titulo_da_pagina]"; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo "$i[site]"; ?>"/>
    <meta property="og:image" content="assets/images/logo-emocoesfm.jpg"/>
    <meta property="og:site_name" content="<?php echo "$i[dominio]"; ?>"/>
    <meta property="og:description" content="<?php echo "$i[slogan]"; ?>"/>
    <link href="assets/images/logo-talkindoor.jpg" rel="image_src"/>
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,900,700,400italic,300,700italic" rel="stylesheet"
          type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/icons.css?v=1.0.1">
    <link href="assets/css/player.css?v=1" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logomarca wow fadeInDown"><img class="img-responsive center-block"
                                                           alt="<?php echo "$i[titulo_da_pagina]"; ?>"
                                                           src="assets/images/logo-radio-tolkindoor.png"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tocador wow zoomIn">
                    <section id="audio-player-radio" class="jp-radioPlayer"
                             data-radio-url="<?php echo "$row[servidor1]"; ?>/;stream/1"
                             data-title="<?php echo "$i[titulo_da_pagina]"; ?>">
                        <div class="container">
                            <div id="player-instance-radio" class="jp-jplayer"></div>
                            <div class="controls jp-controls-holder">
                                <div class="play-pause jp-play pc-play"></div>
                                <div class="play-pause jp-pause fa pc-pause" style=" display:none"></div>
                            </div>
                            <div class="jp-volume-controls">
                                <button class="sound-control pc-volume jp-mute"></button>
                                <button class="sound-control pc-mute jp-unmute"></button>
                                <div class="jp-volume-bar" style="display: none;">
                                    <div class="jp-volume-bar-value" style="width: 1.4737%;"></div>
                                </div>
                            </div>
                            <!--<h5 class="jp-title"></h5>-->
                            <!--<h5 id="tocando"></h5>-->
                            <!--<div class="music_pseudo_bars hidden-xs">-->
                            <div class="music_pseudo_bars">
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                                <div class="music_pseudo_bar"></div>
                            </div>
                        </div>
                    </section>
                    <div id="tocando" class="wow pulse" data-wow-iteration="infinite" data-wow-duration="3500ms"
                         data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="social">
                <div class="col-md-12"><a href="<?php echo "$i[facebook]"; ?>" target="_blank"
                                          class="facebook">facebook</a>
                </div>
            </div>
        </div>
        -->
        <div class="row">
            <div class="col-md-12">
                <div class="infos wow flipInY" data-wow-duration="2s">
                    <p><i class="fa fa-wifi"
                          aria-hidden="true"></i><?php echo "$row[nome_associado]"; ?><br>
                        <i class="fa fa-microphone" aria-hidden="true"></i><?php echo "$i[titulo_da_pagina] - $i[slogan]"; ?><br>
                        <i class="fa fa-phone" aria-hidden="true"></i><?php echo "$i[fone]"; ?> / <i
                                class="fa fa-mobile"
                                aria-hidden="true"></i><?php echo "$i[fone2]"; ?>
                        <br>
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>WhatsApp: <?php echo "$i[whatsapp]"; ?><br>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo "$i[email_principal]";
						if ( ! empty( $i['email_destino'] ) ) {
							echo " / $i[email_destino]";
						} ?><br>
                        © <?php echo date( "Y" ) ?> - Todos os direitos reservados.<br>
                        <i class="fa fa-terminal" aria-hidden="true"></i> <a href="<?php echo "$i[dominio]"; ?>"
                                                                             target="_blank"><?php echo "$i[titulo_da_pagina]"; ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/828d26cde1.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/wow.min.js"></script>
<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();
</script>
<script type="text/javascript" src="assets/js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="assets/js/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".various").fancybox({
            maxWidth: 500,
            maxHeight: 600,
            fitToView: false,
            width: 400,
            height: 580,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });
    });
</script>
<script src="assets/js/ajaxify.min.js"></script>
<script src="assets/js/jplayer/jquery.jplayer.min.js"></script>
<script src="assets/js/jquery.flexslider-min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/main.js?v=1.0.1"></script>
<script>
    function loadDivs() {
        $("#tocando").fadeOut("slow").load("<?php echo "$i[site]"."/tocando/$row[amigavel]";?>").fadeIn("slow");
    }
    $(function () {
        loadDivs();
        setInterval(function () {
            loadDivs();
        }, 20000);
    });
</script>
<script type="text/javascript" src="assets/js/lib/jquery-ui-slider-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="assets/js/lib/modernizr-2.5.3-custom.min.js"></script>
</body>
</html>