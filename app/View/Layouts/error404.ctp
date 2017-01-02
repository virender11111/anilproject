<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
<meta name="description" content='<?php echo $page_details['Meta']['description']; ?>'>
<meta name="keywords" content='<?php echo $page_details['Meta']['keywords']; ?>'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(array(
    '/assets/frontier/css/reset.css',
    '/assets/frontier/bootstrap/css/bootstrap.css',
    '/assets/frontier/plugins/owl-carousel-2.0/assets/owl.carousel.css',
    '/assets/frontier/plugins/jquery.bxslider/jquery.bxslider.css',
    '/assets/frontier/plugins/li-scroller/li-scroller.css',
    '/assets/frontier/plugins/slicknav-master/slicknav.css',
    '/assets/frontier/css/style.css',
    '/assets/frontier/css/responsive.css'
)); ?>
<?php echo $this->Html->css('jquery.cookiebar.css'); ?>
<title><?php echo Configure::read('Site.title') . ' | Error'; ?></title>
<style>
	div#error-page {
    	padding: 180px 0 100px 0;
	}
	div#error-page h1 {
	    font-size: 72px;
	    text-align: center;
	    margin-bottom: 30px;
	}
	div#error-page .alignright {
	    float: right;
	}
	.error-content p {
	    font-size: 18px;
	    line-height: 30px;
	    width: 700px;
	    max-width: 100%;
	    padding: 50px 0px 0 0;
	}
	.error-content strong {
	    font-size: 36px;
	    font-weight: normal;
	    font-family: 'latoRegular';
	    display: block;
	    margin: 0 0 30px 0;
	}
	.error-content p a {
	    display: inline-block;
	    margin: 20px 0;
	    padding: 0 15px;
	    border: solid 2px #333;
	    clear: both;
	    height: 56px;
	    line-height: 54px;
	    text-transform: uppercase;
	    color: #333;
	}
</style>
</head>
<body>


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
        <?php //echo $this->fetch('content'); ?>
        <div class="page-container">
            <div id="error-page">
                <div class="container">
                    <h1>OOPS, ERROR 404!!</h1>
                    <div class="error-content">
                        <img src="<?php echo Router::url("/", true); ?>img/error-img.jpg" alt="Error" class="alignright">
                        <p>
                            <strong>Something went wrong, Page Not Found.</strong>
                            We can't seem to find the page you are looking for. Get back to our home page to continue your search.<br/>
                            <a href="<?php echo Router::url("/", true); ?>">Visit to our main page</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('frontier/footer'); ?>

<!--script start -->
<!--/*<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
*/-->
<script src="<?php echo $this->webroot; ?>assets/frontier/js/lib/jquery-1.11.3.min.js"></script> 
<script src="<?php echo $this->webroot; ?>assets/frontier/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/owl-carousel-2.0/owl.carousel.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/jquery.bxslider/jquery.bxslider.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/sticky/jquery.sticky.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/li-scroller/jquery.li-scroller.1.0.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/accordion/jquery.accordion.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/slicknav-master/jquery.slicknav.js"></script>
<script src="<?php echo $this->webroot; ?>assets/frontier/plugins/simply-scroll.js"></script>

<script src="<?php echo $this->webroot; ?>assets/frontier/js/functions.js"></script>
<?php echo $this->Html->script('jquery.cookiebar.js'); ?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "af574cb1-c8d1-456e-983c-4fcac8797a90", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

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
