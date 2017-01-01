<div class="page-banner"> <?php echo $this->Html->image('/assets/frontier/img/blog-banner.jpg',array('alt' => 'blog -disability Support services')); ?></div></div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container">
        <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li class="first" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/', true); ?>" property="item" typeof="WebPage"><span property="name">At a Glance</span></a>
                <meta property="position" content="1">
            </li>
            <li class="last" property="itemListElement" typeof="ListItem">
                <a href="<?php echo Router::url('/blog/', true); ?>" property="item" typeof="WebPage"><span property="name">News and Blog</span></a>
                <meta property="position" content="2">
            </li>
        </ul>
        <?php
        // $this->Html->addCrumb('News and Blog', array('controller' => '', 'action' => ''));
        // echo $this->Html->getCrumbList(array('class' => 'breadcrumb-ul', 'separator' => false), array(
        //   'text' => 'At a Glance ',
        //   'url' => Router::url('/', true) . '',
        //   'escape' => false
        // )); ?>
        <div class="breadcrumb-social"> <span>Follow us on :</span>
            <ul class="page-social sm34-page-social">
                <li><a href="<?php echo Configure::read("Social.facebook_url"); ?>" target="_blank" class="sprite fb-icon"></a></li>
                <li><a href="<?php echo Configure::read("Social.tweeter_url"); ?>" target="_blank" class="sprite twitter-icon"></a></li>
                <li><a href="<?php echo Configure::read("Social.gplus"); ?>" target="_blank" class="sprite g-plus-icon"></a></li>
                <li><a href="<?php echo Configure::read("Social.linkedin"); ?>" target="_blank" class="sprite linkedin-icon"></a></li>
                <li><a href="<?php echo Configure::read("Social.youtube"); ?>" target="_blank" class="sprite youtube-icon"></a></li>
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
          <h3>News and Blog</h3>
        </div>
        <div class="blog-row blog-main-page margin-bot-30">
          <div class="blog-post-row margin-bot-45">
          <?php foreach($blogPosts as $posts){?>
            <div class="post-panel margin-bot-40">
              <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <figure>
                  <?php 
                  
                  echo $this->Html->image('/files/blog_post/image/'.$posts['BlogPost']['id'].'/'.$posts['BlogPost']['image'], array(
                  		"alt" => "",
                  		'url' => array('action' => 'view', 'slug' => $posts['BlogPost']['slug'])
                  ));
                  
                  ?>
                 </figure>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 post-content">
                  <div class="post-info">
                    <h3><?php echo $this->Html->link($posts['BlogPost']['title'], array('action' => 'view', 'slug' => $posts['BlogPost']['slug']), array('title' => $posts['BlogPost']['title'], 'rel' => 'bookmark')); ?></h3>
                    <div class="post-detail"> <span class="post-dd"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($posts['BlogPost']['created']));?></span> <!-- <span class="post-by"><i class="fa fa-user"></i> Posted By: admin</span> --> <!-- <span class="post-comment-value"><i class="fa fa-comment"></i></span>  --></div>
                    <div class="post-peragraph">
                      <?php
                      $contents = strip_tags($posts['BlogPost']['body'], '<p>');
                      $words = str_word_count($contents, 2);
                      $pos = array_keys($words);
                      $contents = substr($contents, 0, $pos[33]) . '...';
                      ?>
                      <p><?php echo $contents; ?></p>
                    </div>
                    <div class="post-social">
                    <p><?php echo $this->Html->link('read more', array('action' => 'view', 'slug' => $posts['BlogPost']['slug']), array('title' => $posts['BlogPost']['title'], 'rel' => 'bookmark')); ?></p>
                     
                       <div class="post-social-inner"> <span class="share-on-text">Share on :</span>
                        <ul>
                          <li><span class='st_facebook_large' displayText='Facebook' st_url='<?php echo Router::url("/", true). "blog/view/".$posts['BlogPost']['slug']; ?>'></span></li>
                          <li><span class='st_twitter_large' displayText='Tweet' st_url='<?php echo Router::url("/", true). "blog/view/".$posts['BlogPost']['slug']; ?>'></span></li>
                          <li><span class='st_googleplus_large' displayText='Google +' st_url='<?php echo Router::url("/", true). "blog/view/".$posts['BlogPost']['slug']; ?>'></span></li>
                         <!-- <li><span class='st_pinterest_large' displayText='Pinterest' st_url='<?php echo Router::url("/", true). "blog/view/".$posts['BlogPost']['slug']; ?>'></span></li>
                           <li><a href="javascript:void(0)" class="icon-5 full-radius"><i class="fa fa-youtube"></i></a></li> -->
                          <li><span class='st_linkedin_large' displayText='LinkedIn' st_url='<?php echo Router::url("/", true). "blog/view/".$posts['BlogPost']['slug']; ?>'></span></li>
                        </ul><!--
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                        <span class='st_pinterest_large' displayText='Pinterest'></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

          <div class="blog-pagination aligncenter">
          <?php //echo $this->element('categories'); ?>
          <?php //echo $this->element('archives'); ?>
                    <?php
					    $paging = $this->Paginator->params();
					    if ($paging['pageCount'] > 1){
					      ?>
					      <nav id="paging">
					        <?php
					        $this->Paginator->options(array('url' => $this->Blog->getPaginatorOptions()));
					        echo $this->Paginator->prev('Previous', null, null, array('class' => 'disabled'));
					       	echo "&nbsp;&nbsp;&nbsp;";
					        echo $this->Paginator->numbers();
					        echo "&nbsp;&nbsp;&nbsp;";
			        echo $this->Paginator->next('Next', null, null, array('class' => 'disabled'));
       			 ?>
      </nav>
    <?php } ?>
          <?php //echo $this->Html->image('/assets/frontier/img/pagination.jpg',array('alt'=>'')); ?></div>
        </div>
        
      </div>
    </div>
   
        
        <!--Quick Enquiry -->
         <?php echo $this->element("blog_sidebar"); ?>
        <?php //include("includes/blog-sidebar.php"); ?>
        <!--/Quick Enquiry --> 
        
     
  </div>
</div>
<?php /* ?>

<div id="content">

  <?php if ($this->Blog->filtered()) : ?>
    <p>Showing posts <?php echo $this->Blog->filterDescription(); ?>, <?php echo $this->Html->link(__('Show all', true), array('action' => 'index')); ?></p>
  <?php endif; ?>

  <?php if (!empty($blogPosts)) : ?>

    <?php foreach ($blogPosts as $blogPost) : ?>

      <article<?php if ($blogPost['BlogPost']['sticky']) {echo ' class="sticky"';} ?>>

        <header class="clearfix">
          <h2><?php echo $this->Html->link($blogPost['BlogPost']['title'], array('action' => 'view', 'slug' => $blogPost['BlogPost']['slug']), array('title' => $blogPost['BlogPost']['title'], 'rel' => 'bookmark')); ?></h2>
          <time pubdate datetime="<?php echo date('c', $createdTimestamp = strtotime($blogPost['BlogPost']['created'])); ?>">
              <?php echo date($blogSettings['published_format_on_post_index'], $createdTimestamp); ?>
          </time>
          <?php if (strtolower($blogSettings['use_disqus']) == 'yes') : ?>
            <?php echo $this->Html->link(__('View comments'), $this->Blog->permalink($blogPost) . '#disqus_thread', array('data-disqus-identifier' => 'blog-post-' . $blogPost['BlogPost']['id'])); ?>
          <?php endif; ?>
          
        </header>

        <?php if (strtolower($blogSettings['use_summary_or_body_on_post_index']) == 'summary') : ?>
          <p class="summary"><?php echo $blogPost['BlogPost']['summary']; ?></p>
        <?php else : ?>
          <div class="post">
            <?php echo $blogPost['BlogPost']['body']; ?>
          </div>
        <?php endif; ?>

      </article>

    <?php endforeach; ?>

    <?php
    $paging = $this->Paginator->params();
    if ($paging['pageCount'] > 1) :
      ?>
      <nav id="paging">
        <?php
        $this->Paginator->options(array('url' => $this->Blog->getPaginatorOptions()));
        echo $this->Paginator->prev('« Newer posts', null, null, array('class' => 'disabled'));
        echo $this->Paginator->next('Older posts »', null, null, array('class' => 'disabled'));
        ?>
      </nav>
    <?php endif; ?>

  <?php else : ?>

    <p><?php echo __('Sorry, there are no blog posts.'); ?></p>

  <?php endif; ?>

</div>

<div id="sidebar">

  <?php //echo $this->element('rss'); ?>
  <?php echo $this->element('archives'); ?>
  <?php echo $this->element('categories'); ?>
  <?php //echo $this->element('tag_cloud'); ?>

</div>

<?php if (strtolower($blogSettings['use_disqus']) == 'yes') : ?>

  <script type="text/javascript">
    
    var disqus_shortname = '<?php echo $blogSettings['disqus_shortname']; ?>'; // required: replace example with your forum shortname

    <?php if (strtolower($blogSettings['disqus_developer']) == 'yes') : ?>
      var disqus_developer = 1;
    <?php endif; ?>

    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
  </script>

<?php endif; ?>

<?php

// Set the meta title, description and keywords according to the default
// settings or the filtered category or tag.

switch ($this->Blog->filtered()) {
  case 'category':
    $this->set('title_for_layout', $category['BlogPostCategory']['meta_title']);
    $this->set('metaDescription', $category['BlogPostCategory']['meta_description']);
    $this->set('metaKeywords', $category['BlogPostCategory']['meta_keywords']);
    break;
  case 'tag':
    $this->set('title_for_layout', $tag['BlogPostTag']['meta_title']);
    $this->set('metaDescription', $tag['BlogPostTag']['meta_description']);
    $this->set('metaKeywords', $tag['BlogPostTag']['meta_keywords']);
    break;
  default:
    $this->set('title_for_layout', $blogSettings['meta_title']);
    $this->set('metaDescription', $blogSettings['meta_description']);
    $this->set('metaKeywords', $blogSettings['meta_keywords']);
    break;
}
<?php */?>

<?php echo $this->start("footer_js"); ?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "af574cb1-c8d1-456e-983c-4fcac8797a90", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php echo $this->end(); ?>