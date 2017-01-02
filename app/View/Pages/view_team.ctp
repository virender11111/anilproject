<div class="page-banner"> <?php
    echo $this->Html->image('/files/page/banner_image/'.$page_details['Page']['id'].'/'.$page_details['Page']['banner_image'],array('alt'=>'')); ?>
</div></div>
<div class="breadcrumb-row margin-bot-50">
    <div class="container"> <?php
        $this->Html->addCrumb('Who we are', array(
            'controller' => 'pages',
            'action' => 'who_we_are'
        ));
        $this->Html->addCrumb('Our Team', array(
            'controller' => 'pages',
            'action' => 'our_team'
        ));
        $this->Html->addCrumb('View', array(
            'controller' => 'pages',
            'action' => 'view_team'
        ));
        echo $this->Html->getCrumbList(array(
            'class' => 'breadcrumb-ul',
            'separator' => false), array(
                'text' => 'At a Glance ',
                'url' => Router::url('/', true) . '',
                'escape' => false
            )
        ); ?>
        <?php echo $this->element("frontier/social-icon"); ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="page-left">
                <div class="article-col">
                    <div class="common-title">
                        <h3><?php echo $team_name['Team']['title'];?></h3>
                    </div>
                </div>
                <div class="our-team-row"> <?php 
                    foreach($team_member_details as $key => $value) { ?>
                        <div class="team-panel margin-bot-30">
                            <div class="team-member"><?php
                                if(!empty($value['TeamMember']['picture'])) { ?>
                                    <figure><?php echo $this->Html->image('../files/team_member/picture/' . $value['TeamMember']['id'] . '/' . $value['TeamMember']['picture'],array('alt'=>'', 'class' => 'img img-circle'));?></figure> <?php
                                } else { ?>
                                    <figure><?php echo $this->Html->image('../uploads/team-menber.jpg',array('alt'=>'', 'class' => 'img img-circle'));?></figure> <?php
                                } ?>
                            </div>
                            <div class="team-desc">
                                <div class="team-desc-inner">
                                    <h3><?php echo $value['TeamMember']['name']; ?></h3>
                                    <?php echo $value['TeamMember']['description']; ?>
                                </div>
                            </div>
                        </div> <?php
                    } ?>
                </div>
            </div>
        </div>
        <aside class="col-md-4 col-sm-5 col-xs-12">
            <div class="page-sidebar"> 
                <?php echo $this->element("frontier/sidebar-about-us"); ?>
                <?php echo $this->element("frontier/our-services"); ?>
                <?php echo $this->element("frontier/quick-enquiry"); ?>
            </div>
        </aside>
    </div>
</div>