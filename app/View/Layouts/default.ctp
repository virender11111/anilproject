<!DOCTYPE HTML>
<html lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
<meta name="description" content='<?php echo $page_details['Meta']['description']; ?>'>
<meta name="keywords" content='<?php echo $page_details['Meta']['keywords']; ?>'>
<meta name="msvalidate.01" content="C07A541A77A2B308E0F1C39DD26AC976" />
<!-- Facebook OG Tags: -->
<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo Inflector::humanize($page_details['Meta']['title']); ?>" />
<?php
if(isset($this->params["plugin"]) && $this->params["plugin"] == "blog" && $this->params["action"] != "index") {
preg_match_all('/<img[^>]+>/i',$blogPost['BlogPost']['body'], $imageResult);
preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $imageResult[0][0] , $imageResultt);
$imageSrc = $imageResultt[1];
?>
<meta property="og:image" content='<?php echo $imageSrc; ?>' /> <?php
} else { ?>
<meta property="og:image" content="http://www.frontiersupport.co.uk/assets/frontier/img/FLOOGOO.png" /> <?php
}
?>
<meta property="og:description" content="<?php echo $page_details['Meta']['description']; ?>" />
<meta property="og:url" content="<?php echo Router::url($this->here, true); ?>" />
<!-- Twitter Card: -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?php echo $page_details['Meta']['description']; ?>" />
<meta name="twitter:title" content="<?php echo Inflector::humanize($page_details['Meta']['title']); ?>" />
<?php
if(isset($this->params["plugin"]) && $this->params["plugin"] == "blog" && $this->params["action"] != "index") { ?>
<meta name="twitter:image" content="<?php echo $imageSrc ?>" /> <?php
} else { ?>
<meta name="twitter:image" content="http://www.frontiersupport.co.uk/assets/frontier/img/FLOOGOO.png" /> <?php
}
?>

<?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(array(
    '/assets/frontier/css/reset.css',
    '/assets/frontier/bootstrap/css/bootstrap.min.css',
    '../plugins/font-awesome/css/font-awesome.min.css',
    '/assets/frontier/plugins/owl-carousel-2.0/assets/owl.carousel.min.css',
    '/assets/frontier/plugins/li-scroller/li-scroller.min.css',
    '/assets/frontier/plugins/slicknav-master/slicknav.min.css',
    '/assets/frontier/css/style.css',
    '/assets/frontier/css/responsive.css'
)); ?>
<?php echo $this->Html->css('jquery.cookiebar.css'); ?>
<title><?php echo Inflector::humanize($page_details['Meta']['title']); ?></title>
<?php
if(isset($this->params["plugin"]) && $this->params["plugin"] == "blog") { ?>
    <link rel="canonical" href="http://www.frontiersupport.co.uk/blog/" /> <?php
} else { ?>
    <link rel="canonical" href="<?php echo Router::url( $this->here, true ); ?>" /> <?php
}
?>
<link rel="alternate" type="application/rss+xml" title=" &raquo; Feed" href="http://www.frontiersupport.co.uk/feed.xml" />
</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M7CWN3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M7CWN3');</script>
<!-- End Google Tag Manager -->

<?php
    $action = $this->params['action'];
    $controller = $this->params['controller'];
	if($action == 'index' && $controller == 'pages'){
		$class = 'home-page-top';
	}else{
		$class = 'inner-page-top';
   } ?>
    <div class="page-top <?php echo $class;?>">
        <div class="site-header">
            <?php echo $this->element('frontier/header-top'); ?>
            <?php echo $this->element('frontier/header'); ?>
        </div>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('frontier/footer'); ?>

<!--script start -->
<!--/*<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
*/-->
<script src="<?php echo $this->webroot; ?>assets/frontier/js/lib/jquery-1.11.3.min.js"></script> 
<script src="<?php echo $this->webroot; ?>assets/frontier/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/owl-carousel-2.0/owl.carousel.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/sticky/jquery.sticky.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/li-scroller/jquery.li-scroller.1.0.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/accordion/jquery.accordion.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/slicknav-master/jquery.slicknav.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/simply-scroll.min.js"></script>

<script src="<?php echo $this->webroot; ?>assets/frontier/js/functions.js"></script>
<?php echo $this->Html->script('jquery.cookiebar.min.js'); ?>

<?php echo $this->fetch('footer_js'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        //font change script
        $('#increaseFont').click(function(){
            size = 16;
            $('body').css("font-size", size);
            $('a').css("font-size", size);
            $('p').css("font-size", size);
            $('span').css("font-size", size);
            $('li').css("font-size", size);
            $('#fontSize').css("font-size", 16);
            $('#increaseFont').css("font-size", 16);
            $('#decreaseFont').css("font-size", 16);
            $('#dincreaseFont').css("font-size", 16);
            $('#resetFont').css("font-size", 16);
        });
        $('#decreaseFont').click(function(){
            size = 12;
            $('body').css("font-size", size);
            $('a').css("font-size", size);
            $('p').css("font-size", size);
            $('span').css("font-size", size);
            $('li').css("font-size", size);
            $('#fontSize').css("font-size", 16);
            $('#increaseFont').css("font-size", 16);
            $('#decreaseFont').css("font-size", 16);
            $('#dincreaseFont').css("font-size", 16);
            $('#resetFont').css("font-size", 16);
        });
        $('#dincreaseFont').click(function(){
            size = 18;
            $('body').css("font-size", size);
            $('a').css("font-size", size);
            $('p').css("font-size", size);
            $('span').css("font-size", size);
            $('li').css("font-size", size);
            $('#fontSize').css("font-size", 16);
            $('#increaseFont').css("font-size", 16);
            $('#decreaseFont').css("font-size", 16);
            $('#dincreaseFont').css("font-size", 16);
            $('#resetFont').css("font-size", 16);
        });
        $('#resetFont').click(function(){
            location.reload();
        });
    });

    //load full content of case studies on specialist services page
    $(document).ready(function() {
        $('div.fullContent').hide();
        $('div.faq-content a').click(function() {
            var id = $(this).attr('id');
            var asas = 'loadFaqContent' + id;
            var fcon = $('#con'+id).text();
            $('#'+asas).find('p').remove();
            $('#'+asas).append(fcon);
            $('#'+id).hide();
        });
    });

    $(document).ready(function() {
        $('div.support-work-col a.jd').click(function() {
            var id = $(this).attr('id');
            var fcon = $('#jcon'+id).html();
            $('#job-modal').find('.modal-body').append(fcon);
        });
    });

    //empty job detail modal after close
    $(document).ready(function() {
        $('#job-modal').on("hidden.bs.modal", function (e) {
            $('#job-modal').find('.modal-body').empty();
        });
    });

    //cookie policy
    $(document).ready(function() {
        $.cookieBar({
            declineButton: true
        });
    });
</script>

</body>
</html>
