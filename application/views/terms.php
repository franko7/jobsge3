<?php $data['title'] = lang('termsAndCond'); ?>
<?php $this->load->view('templates/header', $data);?>


<div class="page-content bg-white">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"><?php echo lang('termsAndCond');?></h1>
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang());?>"><?php echo lang('home')?></a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li><?php echo lang('termsAndCond');?></li>
               </ul>
            </div>

         </div>
      </div>
   </div>
   <!-- inner page banner END -->
   <!-- contact area -->
   <div class="section-full content-inner bg-white contact-style-1">
      <div class="container">
          <div class="row">
            <div class="col-12">
               <?php echo $terms->{'terms_'.$this->lang->lang()};?>
            </div>
         </div>
      </div>
   </div>
   <!-- contact area  END -->
</div>


<?php $this->load->view('templates/footer');?>