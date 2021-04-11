<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?php echo lang('site_title')?></title>
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap413.min.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.min.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/summernote-bs4.min.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/template.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/venobox.min.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/skin.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/skin.css');?>">
   <!-- <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css');?>"> -->
   <link rel="shortcut icon" type="image/jpg" href="<?php echo $bgPath.$images[3]->filename;?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">   
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.3.1.1.min.js');?>"></script>
   
</head>
<body>

<div id="loading-area"></div>
<div class="page-wraper">
<!-- header -->
   <header class="site-header mo-left header fullwidth">
   <!-- main header -->
      <div class="sticky-header main-bar-wraper navbar-expand-lg">
         <div class="main-bar clearfix">
               <div class="container clearfix">
                  <!-- website logo -->
                  <div class="logo-header mostion">
                     <a href="<?php echo base_url();?>">
                        <img src="<?php echo $bgPath.$images[2]->filename;?>" class="logo" alt="">
                     </a>
                  </div>
                  <!-- nav toggle button -->
                  <!-- nav toggle button -->
                  <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                     <span></span>
                     <span></span>
                     <span></span>
                  </button>
                  <!-- extra nav -->
                  <!-- <div class="extra-nav">
                     <div class="extra-cell">
                           <a href="<?php echo base_url('profile/addjob');?>" title="Add application" class="site-button"><i class="fas fa-file-medical"></i> <?php echo lang('addApplication')?> </a>
                        <?php if ($this->session->userdata('logged_in')): ?>
                           <a href="<?php echo base_url('auth/logout');?>" title="Sign up" class="site-button"><i class="fa fa-sign-out-alt"></i> <?php echo lang('signOut')?> </a>
                        <?php else: ?>
                           <a href="<?php echo base_url('auth/register');?>" title="Sign up" class="site-button"><i class="fa fa-user"></i> <?php echo lang('register')?> </a>
                           <a href="<?php echo base_url('auth/login');?>" title="Log in" class="site-button"><i class="fa fa-lock"></i> <?php echo lang('login')?> </a>
                        <?php endif; ?>
                        <span>
                           <?php echo anchor($this->lang->switch_uri('en'),'EN');?>
                           <?php echo anchor($this->lang->switch_uri('ru'),'RU');?>
                        </span>
                     </div>
                  </div> -->
                  <!-- main nav -->
                  <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                     <ul class="nav navbar-nav">
                        <li>
                           <a href="<?php echo site_url($this->lang->lang());?>" class="site-button"> <?php echo lang('home')?> </a>                           
                        </li>
                        <li>
                           <a href="<?php echo site_url('about');?>" class="site-button"> <?php echo lang('aboutUs')?> </a>                           
                        </li>
                        <li>
                           <a href="<?php echo site_url('contact');?>" class="site-button"> <?php echo lang('contact')?> </a>                           
                        </li>
                        <li>
                           <a href="<?php echo site_url('profile/addjob');?>" title="Add application" class="site-button"><i class="fas fa-file-medical"></i> <?php echo lang('addApplication')?> </a>
                        </li>                        
                        <?php if ($this->session->userdata('logged_in')): ?>
                           <li>
                              <a href="<?php echo site_url('auth/logout');?>" title="Sign up" class="site-button"><i class="fa fa-sign-out-alt"></i> <?php echo lang('signOut')?> </a>
                           </li>
                        <?php else: ?>
                           <li>
                              <a href="<?php echo site_url('auth/register');?>" title="Sign up" class="site-button"><i class="fa fa-user"></i> <?php echo lang('register')?> </a>
                           </li>
                           <li>
                              <a href="<?php echo site_url('auth/login');?>" title="Log in" class="site-button"><i class="fa fa-lock"></i> <?php echo lang('login')?> </a>
                           </li>
                        <?php endif; ?>
                        <li class="lang"><?php echo anchor($this->lang->switch_uri('en'),'EN');?></li>
                        <li class="lang"><?php echo anchor($this->lang->switch_uri('ru'),'RU');?></li>
                     </ul>			
                  </div>
               </div>
         </div>
      </div>
      <!-- main header END -->
   </header>
   <!-- header END -->






   
