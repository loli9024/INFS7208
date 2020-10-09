<?php 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web System YouTuBe</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
         <link href="<?php echo base_url('assets/css/style.css'); ?>" type="text/css" rel="stylesheet" />
        
        <script src="<?php echo base_url('assets/js/commonAction.js'); ?>"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
        <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
        <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    
</head>
    <body>
    <div id="pageContainer">
        <div id="mastHeadContainer">
            <button class="navShowHide">
                <img src="<?php echo base_url('assets/images/menu3.png'); ?>">
            </button>

            <a class="logoContainer" href="<?php echo base_url('welcome'); ?>">
                <img src="<?php echo base_url('assets/images/youtube2.png'); ?>">
                VideoPlay
            </a>

            <div class=" container searchBarContainer">
                <form action="search" method="GET">
                <div id="prefetch">
                    <input type="text" name="search" i class="searchClass typeahead" placeholder="Search Here" />
                </div>
                   <button class="searchButton">
                      <img src="<?php echo base_url('assets/images/search.png'); ?>">
                </form>    
            </div>
            
             
            <div class="notification">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('assets/images/notification.png'); ?>">
                    <span class="badge"><?php $notification=$this->session->userdata('notification'); echo sizeof($notification)  ?></span> </a>
                    <ul class="dropdown-menu">
                            <li>
                                    <!-- Inner Menu: contains the notifications -->
                                <ul class="menu" id="notif_ul">
                                    <?php
                                     $notification=$this->session->userdata('notification');
                                    if(sizeof($notification)>0){
                                        foreach($notification as $row)
                                    {
                                        $url=base_url('watch/watchNotification?id='.$row->videoId);
                                    echo '<li>
                                          <a href="'.$url.'">
                                            <i class="fa fa-users text-aqua"></i>'.$row->message.'
                                          </a>
                                     </li>';
                                    }
                                    }
                                    else{
                                        echo '<li>
                                          <i class="fa fa-users text-aqua"></i>
                                        You do not have notification
                                        </li>';    

                                    }
                                    
                                    ?>
                    
                                </ul>
                            </li>

                        </ul>  
                        </li>

                        </ul>  
                        </div>
                        &nbsp;
                        &nbsp;               
                <div class="rightIcons">
                <a href="<?php echo base_url('upload'); ?>">
                <img src="<?php echo base_url('assets/images/upload.png'); ?>">
                </a>
                <a href="<?php echo base_url("profile?username=".$userLogged); ?>" >
                <img src='<?php echo base_url($this->session->userdata('picture')); ?>'>
                </a>
            </div>

        </div>
        <div id="sideNavContainer" style="display:none;">
            <div class="navigationItems">
                    <div class="navigationItem">
                        <a href="<?php echo base_url('welcome'); ?>">
                            <img src="<?php echo base_url('assets/images/home.png'); ?>">
                            <span>Home</span>
                        </a>
                    </div>  
                    <div class="navigationItem">
                        <a href="<?php echo base_url('welcome?option=2'); ?>">
                            <img src="<?php echo base_url('assets/images/liked.png'); ?>">
                            <span>Liked videos</span>
                        </a>
                    </div> 
                    <div class="navigationItem">
                        <a href="<?php echo base_url('welcome?option=3'); ?>">
                            <img src="<?php echo base_url('assets/images/subscribed.png'); ?>">
                            <span>Subscribers</span>
                        </a>
                    </div> 
                    <div class="navigationItem">
                        <a href="<?php echo base_url('stadistics'); ?>">
                            <img src="<?php echo base_url('assets/images/trends.png'); ?>">
                            <span>Stadistics</span>
                        </a>
                    </div> 
                    <div class="navigationItem">
                        <a href="<?php echo base_url('welcome?option=4'); ?>">
                            <img src="<?php echo base_url('assets/images/history.png'); ?>">
                            <span>History</span>
                        </a>
                    </div> 
                    <div class="navigationItem">
                        <a href="<?php echo base_url('welcome/logout'); ?>">
                            <img src="<?php echo base_url('assets/images/logout.png'); ?>">
                            <span>Log Out</span>
                        </a>
                    </div> 

                    <div class='navigationItems'>
                    <span class='heading'>Subscriptions</span>
                    <?php
                    $subscriptions=$this->session->userdata('subscriptions');
                        foreach($subscriptions as $row)
                        {
                        $link=base_url('profile?username='.$row->userTo);  
                        $img= base_url('assets/images/maleuser.png'); 
                        
                        echo  '<div class='."navigationItem".'>
                        <a href="'.$link.'"><span>'.$row->userTo.'</span></a> </div> ';
                        }
                    ?>
                    </div> 

            </div>
            
        </div>  



        <div id="mainSectionContainer">

        <div id="mainContentContainer">

