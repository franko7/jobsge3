<?php $data['title'] = lang('login'); ?>
<?php $this->load->view('templates/header', $data);?>

<!-- Content -->
<div class="page-content">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"><?php echo lang('login')?></h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang());?>"><?php echo lang('home')?></a></li>
                  <li><i class="fas fa-angle-right"></i></li>               
                  <li> <?php echo lang('login')?> </li>
               </ul>
            </div>
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

                  <?php if ($this->session->flashdata('loginResult')):?>
                     <div class="alert alert-<?php echo $this->session->flashdata('loginResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                     <strong><?php echo $this->session->flashdata('loginResult')['message'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('registerResult')):?>
                     <div class="alert alert-<?php echo $this->session->flashdata('registerResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata('registerResult')['message'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('resetResult')):?>
                     <div class="alert alert-<?php echo $this->session->flashdata('resetResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata('resetResult')['message'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php endif; ?>                  
                  
                  <?php echo form_open('auth/login', array('class' => 'tab-pane active col-12 p-a0', 'id' => 'login')); ?>
                     <h4 class="font-weight-700"> <?php echo lang('login')?> </h4>
                     <div class="form-group">
                        <label class="font-weight-700">E-mail *</label>
                        <input name="email" class="form-control" placeholder="Email" type="email" value="<?= set_value('email');?>">
                        <small style="color:red"><?php echo form_error('email'); ?></small>
                     </div>
                     <div class="form-group">
                        <label class="font-weight-700"> <?php echo lang('password')?>  *</label>
                        <input name="password" class="form-control " placeholder="<?php echo lang('password')?>" type="password">
                        <small style="color:red"><?php echo form_error('password'); ?></small>
                     </div>
                     <div class="text-left">
                        <button class="site-button m-r5 button-lg">  <?php echo lang('login')?>  </button>
                        <a href="<?php echo site_url('auth/sendrecovery');?>" class="m-l5 m-t15 forget-pass float-right">
                        <i class="fa fa-unlock-alt"></i> <?php echo lang('forgotPwd')?> </a> 
                     </div>
                  <?php echo form_close(); ?>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content END-->

<?php $this->load->view('templates/footer');?>