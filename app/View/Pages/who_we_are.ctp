<div class="page-banner">
  <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'], array('alt' => 'disability support providers')); ?>
</div>
</div>
<div class="breadcrumb-row margin-bot-50">
  <div class="container">
    <ul class="breadcrumb-ul" vocab="http://schema.org/" typeof="BreadcrumbList">
      <li class="first" property="itemListElement" typeof="ListItem"> <a href="<?php echo Router::url('/', true); ?>" property="item" typeof="WebPage"><span property="name">At a Glance</span></a>
        <meta property="position" content="1">
      </li>
      <li class="last" property="itemListElement" typeof="ListItem"> <a href="<?php echo Router::url('/who-we-are/', true); ?>" property="item" typeof="WebPage"><span property="name">Who We Are</span></a>
        <meta property="position" content="2">
      </li>
    </ul>
    <?php
        // $this->Html->addCrumb('Who We Are', array('controller' => 'pages', 'action' => 'who_we_are'));
        // echo $this->Html->getCrumbList(array(
        //     'class' => 'breadcrumb-ul',
        //     'separator' => false), array(
        //         'text' => 'At a Glance ',
        //         'url' => Router::url('/', true) . '',
        //         'escape' => false
        //     )
        // );
        echo $this->element("frontier/social-icon"); ?>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-7 col-xs-12">
      <div class="page-left">
        <div class="common-title">
          <h3><?php echo $page_details['Page']['title']; ?></h3>
        </div>
        <p><?php echo $page_details['Page']['description']; ?></p>
      </div>
      <br/>
    <div class="chart-container">  <div class="row">
        <div class="circle-outer"> 
          <div class="circle circle-blue"> <span>Board</span> </div>
         
          <div class="custom-arrow-wrap">
            <div class="custom-arrow"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="circle-outer circle-yellow-outer"> <a href="javascript:void(0)">
          <div class="circle circle-yellow"> <span>Rob Anscomb<br>
            Gates (CEO)</span> </div>
          </a>
          <div class="mbl-arrowgroup1">
            <div class="custom-arrow-wrap">
              <div class="custom-arrow"></div>
            </div>
            <div class="custom-arrow-wrap">
              <div class="custom-arrow"></div>
            </div>
          </div>
        </div>
        <div class="div div-left">
          <div class="circle-outer circle-woody-outer"> <a href="javascript:void(0)">
            <div class="circle circle-woody"> <span>Phil Coffey<br>
              Head of Operations</span> </div>
            </a>
            <div class="custom-arrow-wrap yellow-arrow">
              <div class="custom-arrow my-arrow"></div>
            </div>
            <div class="mbl-arrowgroup1 mbl-arrowgroup1-jr ">
              <div class="custom-arrow-wrap">
                <div class="custom-arrow"></div>
              </div>
              <div class="custom-arrow-wrap">
                <div class="custom-arrow"></div>
              </div>
            </div>
          </div>
          <div class="div-inner div-inner-right">
            <div class="circle-outer"> <a href="javascript:void(0)">
              <div class="circle circle-light-blue"> <span>Manpower/HR <br>
                Mark Daniel,<br>
                Zane Lazdane,<br>
                Amy Butler</span> </div>
              </a> </div>
          </div>
          <div class="div-inner div-inner-left">
            <div class="circle-outer"> <a href="javascript:void(0)">
              <div class="circle circle-pink"> <span>Tracy Crockford<br>
                Project Manager</span> </div>
              </a>
              <div class="custom-arrow-wrap ">
                <div class="custom-arrow red "></div>
              </div>
            </div>
          </div>
          <div class="workers">
            <div class="support support-list-left">
              <ul>
                <li><a href="javascript:void(0)">Ahmad Kashiri CM</a></li>
                <li><a href="javascript:void(0)">Aiden Redmond CM</a></li>
                <li><a href="javascript:void(0)">Tom Beah CM</a></li>
                <li><a href="javascript:void(0)">Beverley Murray CM</a></li>
                <li><a href="javascript:void(0)">Paulette Rowe CM</a></li>
              </ul>
            </div>
            <div class="support support-list-right">
              <div class="support-workers"> <span>}</span>
                <div class="text">Support Workers</div>
              </div>
              <div class="support-workers support-workers-outreach "> <span>}</span>
                <div class="text">Outreach<br>
                  Support Workers</div>
              </div>
            </div>
          </div>
        </div>
        <div class="div div-right">
          <div class="circle-outer circle-hotpink-outer"> <a href="javascript:void(0)">
            <div class="circle circle-hotpink "> <span>Lee Elkin<br>
              Clinical Lead</span> </div>
            </a>
            <div class="custom-arrow-wrap yellow-arrow ">
              <div class="custom-arrow"></div>
            </div>
          </div>
          <div class="circle-outer green-circle-outer circle-hotpink-outer">
            <div class="circle-inner"> <a href="javascript:void(0)">
              <div class="circle circle-green"> <span>Clara Burfutt<br>
                Clinical Lead</span> </div>
              </a>
              <div class="custom-arrow-wrap wrap-green">
                <div class="custom-arrow green"></div>
              </div>
              <div class="text-wrap">Practice Leaders</div>
            </div>
          </div>
        </div>
      </div></div>
    </div>
    <aside class="col-md-4 col-sm-5 col-xs-12">
      <div class="page-sidebar">
        <?php
                echo $this->element("frontier/sidebar-about-us");
                echo $this->element("frontier/our-services");
                echo $this->element("frontier/quick-enquiry"); ?>
      </div>
    </aside>
  </div>
</div>
