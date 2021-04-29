<?php $data['title'] = lang('pageNotFound'); ?>
<?php $this->load->view('templates/header', $data);?>

<div class="page-content bg-white">
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename; ?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"><?php echo lang('pageNotFound');?></h1>
         </div>
      </div>
   </div>

   <div class="content-block">
      <div class="section-full content-inner overlay-white-middle">
         <div class="container mb-5">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 error-page text-center">
                  <h2 class="dz_error text-secondry">404</h2>
                  <h4 class="text-primary"><?php echo lang('pageNotFound');?></h4>
                  <a href="<?php echo site_url();?>" class="site-button"><?php echo lang('back2Home');?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer'); ?>