<style>
.fc-grid .fc-event-time{color:#ed1d25}
.fc-grid .fc-event-title{color:#ed1d25}
.side_calendar .fc .fc-header {
    display: block;
    margin-top: 13px;
    margin-left: 3px;
}
</style>
<aside class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="buzz-sidebar">
        <div class="buzz-sidebar-inner">
            <ul class="buzz-menu margin-bot-60"> <?php
            $var = $this->params['action']; ?>  
                <li<?php if($var=='buzz_hub'){?> class="active"<? }?>><a href="<?php echo Router::url('/buzz-hub/', true);?>" class="yellow-btn radius-5px">BUZZZ Hub</a></li>
                <li<?php if($var=='buzz_team'){?> class="active"<? }?>><a href="<?php echo Router::url('/buzz-team/', true);?>" class="yellow-btn radius-5px">BUZZZ Team</a></li> <?php /*
                <li<?php if($var=='buzz_membership'){?> class="active"<? }?>><a href="<?php echo Router::url('/pages/buzz_membership', true);?>" class="yellow-btn radius-5px">BUZZZ Membership</a></li> */ ?>
                <?php /*
                <li<?php if($var=='buzz_brokerage'){?> class="active"<? }?>><a href="<?php echo Router::url('/buzz-brokerage/', true);?>" class="yellow-btn radius-5px">BUZZZ Brokerage</a></li>
                */ ?>
            </ul>
            <?php /*
            <div class="buzz-timetable-panel">
                <h2>BUZZZ Hub Timetable</h2>
                <div class="buzz-timetable-col">
                    <div class="dd-mm-label"> <span><?php //echo date('F Y'); ?> </div>
                    <div class="buzz-timetable">
                        <div class="buzz-calendar-col">
                            <div class="buzz-calendar margin-bot-5">
                                <div class="Calendar index side_calendar">
                                    <!-- <a href="<?php //echo Router::url('/pages/calendar', true);?>"> -->
                                        <div id="calendar1"></div>
                                    <!-- </a> -->
                                </div>
                            </div>
                            <div class="buzz-calendar-desc text-center" style="margin: 8px 0px;">
                                <a href="<?php echo Router::url('/calendar/', true);?>" class="red-btn radius-5px">View Calendar</a>
                                <?php //echo $this->Html->link("View Calendar", array("controller" => "pages", "action" => "calendar"), array("class" => "red-btn radius-5px")); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            */ ?>
        </div>
    </div>
</aside>