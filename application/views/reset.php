<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
            <div class="dez-bnr-inr-entry">
               <h1 class="text-white"><?php echo lang('resetPassword')?></h1>
         <!-- Breadcrumb row -->
         <div class="breadcrumb-row">
            <ul class="list-inline">
               <li><a href="<?php echo site_url($this->lang->lang());?>">Home</a></li>
               <li><i class="fas fa-angle-right"></i></li>               
               <li><?php echo lang('resetPassword')?></li>
            </ul>
         </div>
         <!-- Breadcrumb row END -->
            </div>
      </div>
   </div>
   <!-- inner page banner END -->
   <!-- contact area -->
   <div class="section-full content-inner-2 shop-account">
      <!-- Product -->
      <div class="container">
         <div class="max-w500 m-auto bg-white m-b30">
            <div class="p-a30 job-bx browse-job radius-sm seth">
               <div class="tab-content nav">

                  <?php if ($this->session->flashdata('resetResult')):?>
                     <div class="alert alert-<?php echo $this->session->flashdata('resetResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata('resetResult')['message'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php endif; ?>
                  
                  <?php echo form_open('auth/reset_process', array('class' => 'tab-pane active col-12 p-a0', 'id' => 'reset')); ?>
                     <h4 class="font-weight-700 m-b5"><?php echo lang('resetPassword')?></h4>                        
                        <div class="form-group">
                           <label class="font-weight-700"><?php echo lang('password')?> *</label>
                           <input name="password" class="form-control" placeholder="<?php echo lang('password')?>" type="password">
                           <small style="color:red"><?php echo form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                           <label class="font-weight-700"><?php echo lang('confPassword')?> *</label>
                           <input name="confirmPassword" class="form-control" placeholder="<?php echo lang('confPassword')?>" type="password">
                           <small style="color:red"><?php echo form_error('confirmPassword'); ?></small>
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $user_id;?>">
                        <input type="hidden" name="recstr" value="<?php echo $recstr;?>">
                        <div class="text-left">
                           <button class="site-button button-lg outline outline-2"><?php echo lang('resetPassword')?></button>
                        </div>
                  <?php echo form_close(); ?>                  
               </div>
            </div>
         </div>
      </div>
      <!-- Product END -->
   </div>
   <!-- contact area  END -->
</div>
<!-- Content END-->

<?php $this->load->view('templates/footer');?>