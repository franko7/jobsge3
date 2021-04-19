<div class="sticky-top">
   <div class="candidate-info company-info">
      <div class="candidate-detail text-center">                        
         <div class="candidate-title my-3">
            <h4 class="m-b5">
               <?php echo $this->session->userdata('full_name');?>
            </h4>
         </div>
      </div>
      <ul>
         <li>
            <a href="<?php echo site_url('profile/myjobs');?>" class="<?php echo $activeitem==1?'active':'';?>">
               <i class="fa fa-file-alt" aria-hidden="true"></i> 
               <span> <?php echo lang('myApplications');?> </span>
            </a>
         </li>
         <li>
            <a href="<?php echo site_url('profile/addjob');?>" class="<?php echo $activeitem==2?'active':'';?>">
               <i class="fas fa-file-medical" aria-hidden="true"></i> 
               <span>
                  <?php echo lang('addApplication');?>
               </span>
            </a>
         </li>
         <li>
            <a href="<?php echo site_url('profile/subscriptions');?>" class="<?php echo $activeitem==3?'active':'';?>">
               <i class="fas fa-file-signature" aria-hidden="true"></i>
               <span>
                  <?php echo lang('subscriptions');?>
               </span>
            </a>
         </li>
         <li>
            <a href="<?php echo site_url('profile/chat');?>" >
               <i class="fas fa-sms" aria-hidden="true"></i>
               <span>
                  <?php echo lang('chat'); ?>
                  <?php echo isset($chatCout)&&$chatCout>0?'<span class="badge badge-pill badge-info">'.$chatCout.'</span>':''; ?> 
               </span>
            </a>
         </li>
         <li>
            <a href="<?php echo site_url('profile/changepassword');?>" class="<?php echo $activeitem==4?'active':'';?>">
               <i class="fa fa-key" aria-hidden="true"></i> 
               <span>
                  <?php echo lang('changePassword');?>
               </span>
            </a>
         </li>
         <li>
            <a href="javascript:void(0);" alt="Delete" data-toggle="modal" data-target="#deleteAccModal">
               <i class="fa fa-trash-alt text-danger" aria-hidden="true"></i> 
               <span class="text-danger">
                  <?php echo lang('deleteAccount');?>
               </span>
            </a>            
         </li>
         <li>
            <a href="<?php echo site_url('auth/logout');?>" class="<?php echo $activeitem==5?'active':'';?>">
               <i class="fa fa-sign-out-alt" aria-hidden="true"></i> 
               <span>
                  <?php echo lang('signOut');?>
               </span>
            </a>
         </li>
      </ul>
   </div>
</div>
<!-- Modal -->
<div class="modal fade modal-bx-info" id="deleteAccModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccModal" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <p><?php echo lang('confDelAccount');?>?</p>
         </div>
         <div class="modal-footer">
            <a href="<?php echo site_url('profile/deleteprofile');?>" class="btn btn-danger"> 
               <?php echo lang('delete')?>
            </a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
               <?php echo lang('close')?>
            </button>
         </div>
      </div>
   </div>
</div>
<!-- Modal End --> 