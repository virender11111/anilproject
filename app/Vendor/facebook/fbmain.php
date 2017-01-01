<?php
/*
 * @author: Mahmud Ahsan (http://thinkdiff.net)
 */
    //facebook application
    $fbconfig['appid' ]     = "172806063083001";
    $fbconfig['secret']     = "6902fdb1544115a36a74574b1695fca1";
    $fbconfig['baseurl']    = "http://dothejob.in/frontier/blog"; //"http://thinkdiff.net/demo/newfbconnect1/php/sdk3/index.php";

    //
    if (isset($_GET['request_ids'])){
        //user comes from invitation
        //track them if you need
    }
    
    $user            =   null; //facebook user uid
    try{
        include_once "facebook.php";
    }
    catch(Exception $o){
        error_log($o);
    }
    // Create our Application instance.
    $facebook = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));

    //Facebook Authentication part
    $user       = $facebook->getUser();
    
    // We may or may not have this data based 
    // on whether the user is logged in.
    // If we have a $user id here, it means we know 
    // the user is logged into
    // Facebook, but we don’t know if the access token is valid. An access
    // token is invalid if the user logged out of Facebook.
    
    
    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope'         => 'email,publish_actions,user_birthday,user_location,user_work_history,user_about_me,user_hometown',
                'redirect_uri'  => $fbconfig['baseurl']
            )
    );
    
    $logoutUrl  = $facebook->getLogoutUrl();
   

    if ($user) {
      try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me?fields=public_profile,user_friends,email,user_about_me,user_actions.books,user_actions.fitness,user_actions.music,user_actions.news,user_actions.video,user_actions:{app_namespace},user_birthday,user_education_history,user_events,user_games_activity,user_hometown,user_likes,user_location,user_managed_groups,user_photos,user_posts,user_relationships,user_relationship_details,user_religion_politics,user_tagged_places,user_videos,user_website,user_work_history,read_custom_friendlists,read_insights,read_audience_network_insights,read_page_mailboxes,manage_pages,publish_pages,publish_actions,rsvp_event,pages_show_list,pages_manage_cta,ads_read,ads_management');
      } catch (FacebookApiException $e) {
        //you should use error_log($e); instead of printing the info on browser
        d($e);  // d is a debug function defined at the end of this file
        $user = null;
      }
    }
   
    
    //if user is logged in and session is valid.
    if ($user){
        //get user basic description
        $userInfo           = $facebook->api("/$user");
        
        //Retriving movies those are user like using graph api
        try{
            $movies = $facebook->api("/$user/movies");
        }
        catch(Exception $o){
            d($o);
        }
        
        //update user's status using graph api
        //http://developers.facebook.com/docs/reference/dialogs/feed/
        if (isset($_GET['publish'])){
            try {
                $publishStream = $facebook->api("/$user/feed", 'post', array(
                    'message' => "this is a testing message",
                    'link'    => 'http://192.168.100.96/vineet/registration/other/pro/',
                    'picture' => 'http://www.gettyimages.in/gi-resources/images/CreativeImages/Hero-527920799.jpg', /*  required  */
                    'name'    => 'SOCIAL APP',
                    'description'=> 'THIS IS A TESTING APP FOR SOCIAL POST'
                    )
                );
                //as $_GET['publish'] is set so remove it by redirecting user to the base url 
            } catch (FacebookApiException $e) {
                d($e);
            }
            $redirectUrl     = $fbconfig['baseurl'] . '/index.php?success=1';
            header("Location: $redirectUrl");
        }

    }
    
    function d($d){
        /* echo '<pre>';
        print_r($d);
        echo '</pre>'; */
    }
?>
