<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
            <div class="dez-bnr-inr-entry">
               <h1 class="text-white"> <?php echo lang('register')?> </h1>
         <!-- Breadcrumb row -->
         <div class="breadcrumb-row">
            <ul class="list-inline">
               <li><a href="<?php echo site_url($this->lang->lang());?>"><?php echo lang('home')?></a></li>
               <li><i class="fas fa-angle-right"></i></li>               
               <li> <?php echo lang('register')?> </li>
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
                  
                  <?php echo form_open('auth/register_process', array('class' => 'tab-pane active col-12 p-a0', 'id' => 'login')); ?>
                     <h4 class="font-weight-700 m-b5"> <?php echo lang('register')?> </h4>
                        <div class="form-group">
                           <label class="font-weight-700"> <?php echo lang('fullname')?> *</label>
                           <input name="fullname" class="form-control" placeholder="<?php echo lang('fullname')?>" type="text" value="<?= set_value('fullname');?>">
                           <small style="color:red"><?php echo form_error('fullname'); ?></small>
                        </div>
                        <div class="form-group">
                           <label class="font-weight-700">E-MailL *</label>
                           <input name="email" class="form-control" placeholder="Email" type="email" value="<?= set_value('email');?>">
                           <small style="color:red"><?php echo form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                           <label class="font-weight-700"> <?php echo lang('password')?> *</label>
                           <input name="password" class="form-control " placeholder="<?php echo lang('password')?>" type="password">
                           <small style="color:red"><?php echo form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                           <label class="font-weight-700"> <?php echo lang('confPassword')?> *</label>
                           <input name="cpassword" class="form-control " placeholder="<?php echo lang('confPassword')?>" type="password">
                           <small style="color:red"><?php echo form_error('cpassword'); ?></small>
                        </div>
                        <div class="form-check form-group">
                           <input class="form-check-input position-static" type="checkbox" name="terms" value="termscb">
                           <?php echo lang('IAgree')?> <a href="#"><?php echo lang('termsConditions')?></a>.
                           <small style="color:red"><?php echo form_error('terms'); ?></small>
                        </div>
                        <div class="text-left">
                           <button class="site-button button-lg outline outline-2"> <?php echo lang('createAccount')?> </button>
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