<!-- Sidebar -->
<div class="sidebar">
   <!-- Sidebar Menu -->
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
         <!-- Dashboard -->
         <!-- <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard');?>" class="nav-link <?php echo $pageN==1?'active':'';?>">
               <i class="fas fa-chart-line mr-1"></i>
               <p class="ml-1"> Dashboard </p>
            </a>
         </li> -->
         <!-- Users -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/users');?>" class="nav-link <?php echo $pageN==2?'active':'';?>">
               <i class="fas fa-user mr-1"></i> 
               <p class="ml-1"> Users </p>
            </a>
         </li>
         <!-- Applications -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/jobs');?>" class="nav-link <?php echo $pageN==3?'active':'';?>">
               <i class="fa fa-file-alt mr-1"></i> 
               <p class="ml-1"> Applications </p>
            </a>
         </li>
         <!-- Categories/Subcategories -->
         <li class="nav-item <?php echo $pageN==4||$pageN==5||$pageN==6?'menu-open':'';?>">
            <a href="#" class="nav-link">
            <i class="fas fa-align-left mr-1"> </i> 
               <p>
                  <i class="right fas fa-angle-left"></i>
                  Categories
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="<?php echo base_url('admin/categories');?>" class="nav-link <?php echo $pageN==4?'active':'';?>">
                  <i class="fas fa-eye"></i>
                  <p class="ml-1"> View categories </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?php echo base_url('admin/addcategory');?>" class="nav-link <?php echo $pageN==5?'active':'';?>">
                  <i class="fas fa-plus"></i>
                  <p class="ml-1"> Add category </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?php echo base_url('admin/addsubcategory');?>" class="nav-link <?php echo $pageN==6?'active':'';?>">
                  <i class="fas fa-plus"></i>
                  <p class="ml-1"> Add subcategory </p>
                  </a>
               </li>
            </ul>
         </li>
         <!-- Locations -->
         <li class="nav-item <?php echo $pageN==7||$pageN==8?'menu-open':'';?>">
            <a href="#" class="nav-link">
            <i class="fas fa-map-marker-alt mr-1"> </i> 
               <p>
                  <i class="right fas fa-angle-left"></i>
                  Locations
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="<?php echo base_url('admin/locations');?>" class="nav-link <?php echo $pageN==7?'active':'';?>">
                  <i class="fas fa-eye"></i>
                  <p class="ml-1"> View locations </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?php echo base_url('admin/addlocation');?>" class="nav-link <?php echo $pageN==8?'active':'';?>">
                  <i class="fas fa-plus"></i>
                  <p class="ml-1"> Add location </p>
                  </a>
               </li>
            </ul>
         </li>
         <!-- Images -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/editimages');?>" class="nav-link <?php echo $pageN==9?'active':'';?>" class="nav-link">
               <i class="fas fa-images"></i>
               <p class="ml-1"> Images </p>
            </a>
         </li>
         <!-- Job types -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/jobtypes');?>" class="nav-link <?php echo $pageN==11?'active':'';?>" class="nav-link">
               <i class="far fa-file-alt"></i>
               <p class="ml-1"> Application types </p>
            </a>
         </li>
         <!-- Socials -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/socials');?>" class="nav-link <?php echo $pageN==10?'active':'';?>" class="nav-link">
               <i class="fab fa-facebook-square"></i>
               <p class="ml-1"> Socials </p>
            </a>
         </li>
         <!-- About us -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/aboutus');?>" class="nav-link <?php echo $pageN==12?'active':'';?>" class="nav-link">
               <i class="far fa-question-circle"></i>
               <p class="ml-1"> About us </p>
            </a>
         </li>
         <!-- Contact us -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/contact');?>" class="nav-link <?php echo $pageN==13?'active':'';?>" class="nav-link">
               <i class="fas fa-envelope-open-text"></i>
               <p class="ml-1"> Contact us </p>
            </a>
         </li>
         <!-- Terms -->
         <li class="nav-item">
            <a href="<?php echo base_url('admin/terms');?>" class="nav-link <?php echo $pageN==14?'active':'';?>" class="nav-link">
               <i class="far fa-file-alt"></i>
               <p class="ml-1"> Terms & Conditions </p>
            </a>
         </li>
         <li class="nav-item">
            <a href="<?php echo base_url('admin/changepassword');?>" class="nav-link <?php echo $pageN==20?'active':'';?>" class="nav-link">
               <i class="fas fa-key"></i>
               <p class="ml-1"> Change password </p>
            </a>
         </li>
         <li class="nav-item">
            <a href="<?php echo base_url('auth/logout');?>" class="nav-link <?php echo $pageN==21?'active':'';?>" class="nav-link">
               <i class="fas fa-sign-out-alt"></i>
               <p class="ml-1"> Logout </p>
            </a>
         </li>
      </ul>
   </nav>
   <!-- /.sidebar-menu -->
</div>