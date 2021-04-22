<?php $this->load->view('templates/header'); ?>

<div class="page-content bg-white">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename; ?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Contact Us</h1>
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang()); ?>">Home</a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li> <?php echo lang('aboutUs') ?> </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- inner page banner END -->
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full content-inner overlay-white-middle">
         <div class="container">
            <div class="row align-items-center m-b50">
               <div class="col-lg-12 m-b20">
                  <h2 class="m-b5">About Us</h2>
                  <h3 class="fw4">We create unique experiences</h3>
                  <p class="m-b15">
                     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                     since the 1500s, when an unknown printer took a galley of type and. It is a long established fact that a reader will be distracted by 
                     the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.
                  </p>
                  <p class="m-b15">
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point 
                     of using Lorem Ipsum is that it has a more-or-less.
                  </p>
               </div>               
            </div>
         </div>
      </div>
   <!-- contact area  END -->
   </div>
</div>

















<?php $this->load->view('templates/footer'); ?>

