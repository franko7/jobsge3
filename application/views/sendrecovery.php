<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
            <div class="dez-bnr-inr-entry">
               <h1 class="text-white"><?php echo lang('recoverPwd')?></h1>
         <!-- Breadcrumb row -->
         <div class="breadcrumb-row">
            <ul class="list-inline">
               <li><a href="<?php echo site_url($this->lang->lang());?>"><?php echo lang('home')?></a></li>
               <li><i class="fas fa-angle-right"></i></li>               
               <li><?php echo lang('recoverPwd')?></li>
            </ul>
         </div>
         <!-- Breadcrumb row END -->
            </div>
      </div>
   </div>
   <!-- inner page banner END -->
  <div class="section-full content-inner browse-job shop-account">
      <div class="container">
         <div class="row">
            <div class="col-md-12 m-b30">
               <div class="p-a30 job-bx max-w500 radius-sm bg-white m-auto">
                  <div class="tab-content">

                     <?php if ($this->session->flashdata('sendRecoveryResult')):?>
                        <div class="alert alert-<?php echo $this->session->flashdata('sendRecoveryResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                           <strong><?php echo $this->session->flashdata('sendRecoveryResult')['message'];?></strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     <?php endif; ?>                     

                     <?php echo form_open('auth/sendrecovery_process', array('class' => 'tab-pane active', 'id' => 'login')); ?>
                        <h4 class="font-weight-700 m-b5"> <?php echo lang('recoverPwd')?> </h4>                        
                        <div class="form-group">
                           <label class="font-weight-700">E-mail *</label>
                           <input name="email" class="form-control" placeholder="Email" type="email" value="<?= set_value('email');?>">
                           <small style="color:red"><?php echo form_error('email'); ?></small>
                        </div>
                        <div class="text-left">
                           <button class="site-button button-lg"><?php echo lang('sendRecovEmail')?></button>
                        </div>
                     <?php echo form_close(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content END-->

<?php $this->load->view('templates/footer');?>