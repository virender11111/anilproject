<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler"></div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search " action="" method="POST"></form>
            </li> <?php
            $action = $this->params['action'];
            $activeClass = ($controller == 'dashboard') ? "active" : "";
            $openClass = ($controller == 'dashboard') ? "open" : "";
            $selectedClass = ($controller == 'dashboard') ? "selected" : "";
            $title = '<i class="' . $this->Admin->icons('Dashboard') . '"></i><span class="title"> Dashboard</span><span class="' . $selectedClass . '"></span>'; ?>
            <li class="<?php echo $activeClass . ' ' . $openClass; ?>"> <?php
                echo $this->Html->link($title, array('plugin' => false, 'controller' => 'dashboard'), array('escape' => false)); ?>
            </li>
            
            <!-- -------------------- Pages Manager Start -------------------- -->
       <?php /*     <li class="<?php echo ( $controller == 'pages') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-file-text-o"></i> 
                    <span class="title">CMS Pages</span>
                    <span class="arrow <?php echo ($controller == 'pages') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'pages' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/pages"; ?>">Pages</a>
                    </li>
                    
                    <li class="<?php echo ( $controller=='pages' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/pages/add";?>">Add Pages</a>
                    </li>
                  
                </ul>
            </li>   */ ?>
            <!-- -------------------- Pages Manager End -------------------- -->

            
            <!-- -------------------- Users Manager Start -------------------- -->  
            <?php /*?>
            <li class="<?php echo ( $controller == 'users') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">User Manager</span>
                    <span class="arrow <?php echo ($controller == 'users') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'users' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/users"; ?>">Users</a>
                    </li>
                    <li class="<?php echo ( $controller=='pages' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/users/add";?>">Add User</a>
                    </li>
                </ul>
            </li> 
            
            <?php */?>
            
            <li class="<?php echo ( $controller == 'areas') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">SubCategory manager</span>
                    <span class="arrow <?php echo ($controller == 'sitelinks') ? "open" : ""; ?>"></span>
                </a>
                 <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'sitelinks' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/sitelinks"; ?>">Sub Category</a>
                    </li>
                </ul>
            </li> 
            
            <li class="<?php echo ( $controller == 'cities') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">Category manager</span>
                    <span class="arrow <?php echo ($controller == 'categories') ? "open" : ""; ?>"></span>
                </a>
                 <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'categories' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/categories"; ?>">Categories</a>
                    </li>
                </ul>
            </li> 
            <?php /*?>
            <li class="<?php echo ( $controller == 'countries') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">Country manager</span>
                    <span class="arrow <?php echo ($controller == 'countries') ? "open" : ""; ?>"></span>
                </a>
                 <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'countries' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/countries"; ?>">Countries</a>
                    </li>
                </ul>
            </li>
            <?php */?>
          <!-- -------------------- Brand Manager Start -------------------- -->
            <li class="<?php echo ( ($controller == 'Brands')) ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-btc"></i> 
                    <span class="title">Images Manager</span>
                    <span class="arrow <?php echo ($controller == 'Brands') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'Brands' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/Brands"; ?>">Images</a>
                    </li>
                    <li class="<?php echo ( $controller=='Brands' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/Brands/add";?>">Add Image</a>
                    </li>
                </ul>
            </li>
            <!-- -------------------- Brand Manager End -------------------- -->
            <!-- -------------------- Pages Manager End -------------------- -->
         
<!-- -------------------- Buzz Manager Start -------------------- -->
            <?php /*?>
            <li class="<?php echo ( ($controller == 'buzz_teams' || $controller == 'buzz_sessions' || $controller == "FullCalendar" || $controller == "events")) ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-btc"></i> 
                    <span class="title">Buzzz Manager</span>
                    <span class="arrow <?php echo ($controller == 'buzz_teams' || $controller == 'buzz_sessions' || $controller == "FullCalendar" || $controller == "events") ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'FullCalendar' || $controller == 'events') ? "active open" : ""; ?>" >
                        <a href="javascript:;">
                            <i class=""></i> 
                            <span class="title">Buzzz Timetable</span>
                            <span class="arrow <?php echo ($controller == 'full_calendar' || $controller == 'events') ? "open" : ""; ?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php echo ( $controller == 'FullCalendar') ? "active" : ""; ?>">
                                <a href="<?php echo SITEURL . "admin/full_calendar/FullCalendar"; ?>">Calendar</a>
                            </li>
                             <li class="<?php echo ( $controller == 'events' && $action == 'admin_index') ? "active" : ""; ?>">
                                <a href="<?php echo SITEURL . "admin/full_calendar/events"; ?>">Events</a>
                            </li>
                            <li class="<?php echo ( $controller == 'events' && $action == 'admin_add') ? "active" : ""; ?>">
                                <a href="<?php echo SITEURL . "admin/full_calendar/events/add"; ?>">Add Event</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo ( $controller == 'buzz_teams' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/buzz_teams"; ?>">Buzzz Teams</a>
                    </li>
                    <li class="<?php echo ( $controller=='buzz_teams' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/buzz_teams/add";?>">Add Buzzz Team</a>
                    </li>
                    <li class="<?php echo ( $controller == 'buzz_sessions' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/buzz_sessions"; ?>">Buzzz Sessions</a>
                    </li>
                    <li class="<?php echo ( $controller=='buzz_sessions' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/buzz_sessions/add";?>">Add Buzzz Session</a>
                    </li>

                </ul>
            </li>
            <?php */?>
            <!-- -------------------- Buzz Manager End -------------------- -->

            <!-- -------------------- Calender Manager Start -------------------- -->  
<?php /*            
<li class="<?php echo ( $controller == 'FullCalendar' || $controller == 'events') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-calendar"></i> 
                    <span class="title">Buzzz Timetable</span>
                    <span class="arrow <?php echo ($controller == 'full_calendar' || $controller == 'events') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'FullCalendar') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/full_calendar/FullCalendar"; ?>">Calendar</a>
                    </li>
                     <li class="<?php echo ( $controller == 'events' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/full_calendar/events"; ?>">Events</a>
                    </li>
                    <li class="<?php echo ( $controller == 'events' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/full_calendar/events/add"; ?>">Add Event</a>
                    </li>
                </ul>
            </li> */ ?>
            <!-- -------------------- Pages Manager End -------------------- -->


            <!-- -------------------- Blog Manager Start -------------------- -->
            <?php /* ?>
            <li class="<?php echo ( $controller == 'BlogPosts' || $controller == 'BlogPostTags' || $controller == 'BlogPostCategories' || $controller == 'BlogSettings') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-book"></i> 
                    <span class="title">Blog Manager</span>
                    <span class="arrow <?php echo ($controller == 'BlogPosts' || $controller == 'BlogPostTags' || $controller == 'BlogPostCategories' || $controller == 'BlogSettings') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'BlogPosts' && $action =='admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/blog/BlogPosts"; ?>">Blog Posts</a>
                    </li>
                    <li class="<?php echo ( $controller == 'BlogPosts' && $action =='admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/blog/BlogPosts/add"; ?>">Add Blog Post</a>
                    </li>
                    <li class="<?php echo ( $controller=='BlogPostCategories' && $action =='admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/blog/BlogPostCategories";?>">Blog Post Categories</a>
                    </li>
                    <li class="<?php echo ( $controller=='BlogPostCategories' && $action =='admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/blog/BlogPostCategories/add";?>">Add Blog Post Category</a>
                    </li>
                </ul>
            </li>  
            <?php */ ?>
            <!-- -------------------- Blog Manager End -------------------- -->


            <!-- -------------------- Blog Comment Manager Start -------------------- -->
            <?php /*?>
            <li class="<?php echo ( $controller == 'BlogPostComments') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-comments"></i> 
                    <span class="title">Blog Comment Manager</span>
                    <span class="arrow <?php echo ($controller == 'BlogPostComments') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'BlogPostComments' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/BlogPostComments"; ?>">Blog Comments</a>
                    </li>
                </ul>
            </li> 
            <?php */ ?>
            <!-- -------------------- Blog Comment Manager End -------------------- -->
            
            
            <!-- -------------------- Service Manager Start -------------------- -->
            <?php /*?>
            <li class="<?php echo ( $controller == 'services') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">What We Do</span>
                    <span class="arrow <?php echo ($controller == 'services') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'services' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/services"; ?>">Services</a>
                    </li>
                    <li class="<?php echo ( $controller=='services' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/services/add";?>">Add Service</a>
                    </li>
                </ul>
            </li> 
            <?php */?>
            <!-- -------------------- Service Manager End -------------------- -->


            <!-- -------------------- Enquiry Manager Start -------------------- -->
            <?php /* ?>
            <li class="<?php echo ( $controller == 'jobs') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-phone"></i> 
                    <span class="title">Enquiry Manager</span>
                    <span class="arrow <?php echo ($controller == 'jobs') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'jobs' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/jobs"; ?>">Enquiry</a>
                    </li>
                </ul>
            </li> 
            <!-- -------------------- Enquiry Manager End -------------------- -->


            <!-- -------------------- Job Manager Start -------------------- -->
            <li class="<?php echo ( $controller == 'jobUploads') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-user-md"></i> 
                    <span class="title">Job Manager</span>
                    <span class="arrow <?php echo ($controller == 'jobUploads') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'jobUploads' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/jobUploads"; ?>">Jobs</a>
                    </li>
                    <li class="<?php echo ( $controller=='jobUploads' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/jobUploads/add";?>">Add Jobs</a>
                    </li>
                </ul>
            </li>
            <!-- -------------------- Job Manager End -------------------- -->
            

            <!-- -------------------- Team Manager Start -------------------- -->
            <li class="<?php echo ( ($controller == 'Teams') || ($controller == 'teamMembers')) ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-weixin"></i> 
                    <span class="title">Team Manager</span>
                    <span class="arrow <?php echo ($controller == 'Teams') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'Teams' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/Teams"; ?>">Teams</a>
                    </li>
                    <li class="<?php echo ( $controller=='Teams' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/Teams/add";?>">Add Team</a>
                    </li>
                    <li class="<?php echo ( $controller == 'teamMembers' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/teamMembers"; ?>">Team Members</a>
                    </li>
                    <li class="<?php echo ( $controller=='teamMembers' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/teamMembers/add";?>">Add Team Member</a>
                    </li>
                </ul>
            </li>
            <!-- -------------------- Team Manager End -------------------- -->


           

 
            <!-- -------------------- Testimonial Manager Start -------------------- -->
            <li class="<?php echo ( $controller == 'testimonials') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-comments-o"></i> 
                    <span class="title">Testimonials Manager</span>
                    <span class="arrow <?php echo ($controller == 'testimonials') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'testimonials' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/testimonials"; ?>">Testimonials</a>
                    </li>
                    <li class="<?php echo ( $controller=='testimonials' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/testimonials/add";?>">Add Testimonials</a>
                    </li>
                </ul>
            </li>
            <!-- -------------------- Testimonial Manager End -------------------- -->

            
            <!-- -------------------- Roles Manager Start -------------------- -->
            <li class="<?php echo ( $controller == 'roles') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-plus"></i> 
                    <span class="title">Roles Manager</span>
                    <span class="arrow <?php echo ($controller == 'roles') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'roles' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/roles"; ?>">Roles</a>
                    </li>
                    <li class="<?php echo ( $controller=='roles' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/roles/add";?>">Add Roles</a>
                    </li>
                </ul>
            </li> 
            <!-- -------------------- Roles Manager End -------------------- -->


            <!-- -------------------- FAQ Manager Start -------------------- -->
            <li class="<?php echo ( $controller == 'faqs') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-question-circle"></i> 
                    <span class="title">FAQ's </span>
                    <span class="arrow <?php echo ($controller == 'faqs') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'faqs' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/faqs"; ?>">FAQ's</a>
                    </li>
                    <li class="<?php echo ( $controller=='faqs' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/faqs/add";?>">Add FAQ</a>
                    </li>
                </ul>
            </li>
            <!-- -------------------- FAQ Manager End -------------------- -->
    
    
            <!-- -------------------- Setting Manager Start -------------------- --> 
            <li class="<?php echo ( $controller == 'settings') ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="icon-settings"></i> 
                    <span class="title">Settings Manager</span>
                    <span class="arrow <?php echo ($controller == 'settings') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'settings' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/settings"; ?>">Settings</a>
                    </li>
                    <li class="<?php echo ( $controller=='roles' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/settings/add";?>">Add Settings</a>
                    </li>
                </ul>
            </li>
            <?php */ ?>
            <!-- -------------------- Setting Manager End -------------------- -->
            

            <!-- -------------------- Buzz Manager Start -------------------- -->
            <?php /* <li class="<?php echo ( ($controller == 'buzz_teams' || $controller == 'buzz_sessions')) ? "active open" : ""; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-btc"></i> 
                    <span class="title">Buzz Manager</span>
                    <span class="arrow <?php echo ($controller == 'buzz_teams' || $controller == 'buzz_sessions') ? "open" : ""; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ( $controller == 'buzz_teams' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/buzz_teams"; ?>">Buzz Teams</a>
                    </li>
                    <li class="<?php echo ( $controller=='buzz_teams' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/buzz_teams/add";?>">Add Buzz Team</a>
                    </li>
                    <li class="<?php echo ( $controller == 'buzz_sessions' && $action == 'admin_index') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL . "admin/buzz_sessions"; ?>">Buzz Sessions</a>
                    </li>
                    <li class="<?php echo ( $controller=='buzz_sessions' && $action == 'admin_add') ? "active" : ""; ?>">
                        <a href="<?php echo SITEURL."admin/buzz_sessions/add";?>">Add Buzz Session</a>
                    </li>
                </ul>
            </li> */ ?>
            <!-- -------------------- Buzz Manager End -------------------- -->

        </ul>
    </div>
</div>
