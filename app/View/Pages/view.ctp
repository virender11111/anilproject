<div class="page-banner"> <?php 
echo $this->Html->image('/assets/frontier/img/blog-banner.jpg', array( 'alt' => '')); ?>
</div>
</div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container">
        <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li class="first" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/', true); ?>"><span property="name">At a Glance</span></a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/blog', true); ?>"><span property="name">News and Blog</span></a>
            </li>
            <li class="last" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url(array('controller' => 'blog_posts', 'action' => 'view', 'slug' => $this->params['slug'], 'plugin' => 'blog')); ?>"><span property="name">Blog Detail</span></a>
            </li>
        </ul>
        <?php 
        // $this->Html->addCrumb('News and Blog', array('controller' => 'blog', 'action' => ''));
        // $this->Html->addCrumb('Blog Detail', array('controller' => 'blog_posts', 'action' => 'view', 'slug' => $this->params['slug'], 'plugin' => 'blog'));
        // echo $this->Html->getCrumbList(array(
        //     'class' => 'breadcrumb-ul',
        //     'separator' => false), array(
        //         'text' => 'At a Glance ',
        //         'url' => Router::url('/', true) . '',
        //         'escape' => false
        //     )
        // ); ?>
        <div class="breadcrumb-social"> <span>Follow us on :</span>
            <ul class="page-social sm34-page-social">
                <li><a href="<?php echo Configure::read("Social.facebook_url"); ?>" target="_blank" class="sprite fb-icon"></a></li>
                <li><a href="<?php echo Configure::read("Social.tweeter_url"); ?>" target="_blank" class="sprite twitter-icon"></a></li>
                <li><a href="<?php echo Configure::read("Social.gplus"); ?>" target="_blank" class="sprite g-plus-icon"></a></li>
                <li><a href="javascript:void(0)" class="sprite linkedin-icon"></a></li>
                <li><a href="javascript:void(0)" class="sprite mail-icon"></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="page-left">
                <div class="common-title">
                    <h3>Blog Detail</h3>
                </div>
                <div class="blog-row blog-detail-row margin-bot-30">
                    <div class="blog-post-row">
                        <div class="post-panel margin-bot-35">
                            <div class="row">
                                <div class="col-md-12 post-content">
                                    <div class="post-info">
                                        <h3><?php echo $blogPost['BlogPost']['title']?></h3>
                                        <div class="post-detail"> <span class="post-dd"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($blogPost['BlogPost']['created']));?></span>
                                        </div>
                                        <div class="post-peragraph">
                                            <?php echo $blogPost['BlogPost']['body'];?>
                                        </div>
                                        <div class="post-social">
                                            <div class="post-social-inner"> <span class="share-on-text">Share on :</span>
                                                <ul>
                                                    <li><span class='st_facebook_large' displayText='Facebook'></span></li>
                                                    <li><span class='st_twitter_large' displayText='Tweet'></span></li>
                                                    <li><span class='st_googleplus_large' displayText='Google +'></span></li>
                                                    <li><span class='st_pinterest_large' displayText='Pinterest'></span></li>
                                                    <li><span class='st_linkedin_large' displayText='LinkedIn'></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!--****** Blog Post all comments starts **************************--> <?php
                $all_comments = $blogPost['BlogPostComment'];
                $num_of_comments = count($all_comments);
                if($num_of_comments > 0) { ?>
                    <div class="num_of_comnt" style="margin-bottom: 10px;">
                        <b><?php echo $num_of_comments.' comments'; ?></b>
                    </div> <?php
                } 
                foreach($all_comments as $key => $value) { ?>
                    <div class="container" id="all-comment-section">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="user-cmnt-info">
                                    <h4><?php echo strtoupper($value['name']); ?> <small> <?php echo $value['created']; ?></small></h4>
                                </div>
                                <div class="user-cmnt">
                                    <p><?php echo $value['comment']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div> <?php
                } ?>
                <!--****** Blog Post all comments ends**************************-->

                <!--****** Blog Post Comment **************************-->
                <div id="blog-comment-section" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success hide successMessage">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> Your comment has been sent to Admin for approval.
                            </div>
                            <div class="alert alert-danger hide failureMessage">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Oops!</strong> An error occured during the process. Please try again.
                            </div>
                            <h4>Leave a comment</h4>
                        </div> <?php
                        echo $this->Form->create('BlogPostComment',  array(
                            'url' => array(
                                'action' => 'comment',
                                'plugin' => false
                            ),
                            'id' => 'blogPostCommentForm',
                            'type' => 'post',
                            'novalidate' => true
                        ));

                        echo $this->Form->input('Data.referer', array('value' => $referer, 'class' => 'form-control', 'type' => 'hidden')); ?>
                        <div class="comment-rq-field" style="">
                            <div class="col-md-6"> <?php
                                echo $this->Form->input('name', array(
                                    'placeholder' => '*Enter your name',
                                    'type' => 'text',
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control cname'
                                )); ?>
                                <span class="text text-danger nameError"></span>                
                            </div>
                            <div class="col-md-6"> <?php
                                echo $this->Form->input('email', array(
                                    'placeholder' => '*Enter your email',
                                    'type' => 'text',
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control cemail'
                                )); ?>
                                <span class="text text-danger emailError"></span>
                            </div>
                        </div>
                        <div class="col-md-12 comment-box" style=""> <?php
                            echo $this->Form->textarea('comment', array(
                                'rows' => 5,
                                'placeholder' => '*Enter your comment here...', 
                                'class' => 'form-control comment-box-field'
                            )); ?>
                            <span class="text text-danger commentError"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 comment-button"> <?php
                            echo $this->Form->input('blog_post_id', array('type' => 'hidden', 'value' => $blogPost['BlogPost']['id']));
                            echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'solid-red-btn radius-5px'));
                            echo $this->Form->end(); ?>
                            <i class="fa fa-refresh fa-spin load_image hide"></i>
                        </div>
                    </div>
                </div>
                <!--****** Blog Post Comment ends**************************-->
            </div>
        </div>
    <?php echo $this->element("blog_sidebar"); ?>
    </div>
</div>

<?php echo $this->start("footer_js"); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('submit', '#blogPostCommentForm', (function (event) {
            event.preventDefault();
            var status = true;
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            $(".nameError").text(''); $(".emailError").text(''); $(".commentError").text('');
            if(!$("#BlogPostCommentName").val()) {
                $(".nameError").text("Please enter your name");
                status = false;
            }
            if(!$("#BlogPostCommentEmail").val()) {
                $(".emailError").text("Please enter your email");
                status = false;
            } else if(!pattern.test($("#BlogPostCommentEmail").val())) {
                $(".emailError").text("Please enter a valid email");
                status = false;
            }
            if(!$("#BlogPostCommentComment").val()) {
                $(".commentError").text("Please enter your comment");
                status = false;
            }

            if(status) {
                $.ajax({url: $(this).attr("action"), data: $(this).serialize(), dataType: "json",
                method: "POST"}).done(function (response) {
                    $(".load_image").removeClass("hide");
                    if (response.status) {
                        $(".load_image").addClass("hide");
                        $(".successMessage").removeClass("hide");
                        $(".text").text('');
                        $("#blogPostCommentForm")[0].reset()
                    } else {
                        $(".load_image").addClass("hide");
                        $(".failureMessage").removeClass("hide");
                        $(".text").text('');
                    }
                })    
            }  
        }));
    });
</script>
<?php echo $this->end(); ?>