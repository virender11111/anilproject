<div class="heading-line">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="heading_main inner-marg-top">
                    <h1>Testimonials</h1>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-home clearfix marg-cont-top">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">

            </div>
            <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="content-main">
                    <div class="inner-comtaint-art">
                        <div class="questions-list-containt">
                            <?php echo $category = null; ?>
                            <?php
                            foreach ($testimonials as $single) {
                                ?>
                                <div class="custometitle-bar">
                                    <span class="custometitle-bar-inner">
                                        <h4><?php echo $single["Testimonial"]["name"]; ?></h4>
                                    </span>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-sm-12 question-containt faq-line"> 


                                    <div class="faqq"><a class="faq" href="javascript:void(0);"><?php echo $single["Testimonial"]["name"]; ?></a></div>
                                    <p id="hidefaq"><?php echo $single["Testimonial"]["description"]; ?></p>

                                </div>
                                <?php
                                $category = $single["Testimonial"]["name"];
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <!--<div class="brn-col"> <a href="#" class="btn mb50 mt50 loadArchive" data-date="1404213470">SHOW ARCHIVE</a> </div>-->
            </div>
        </div>
    </div>
</div>
<?php $this->start('footer_js'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.faq-line #hidefaq').hide();
        $(".faqq").click(function () {
            $(this).next('#hidefaq').slideToggle(500);
            $(this).toggleClass("expanded");

        });
    });
</script>
<?php $this->end(); ?>	
