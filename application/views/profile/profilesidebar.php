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
         <li><a href="<?php echo site_url('profile/myjobs');?>" class="<?php echo $activeitem==1?'active':'';?>">
            <i class="fa fa-file-alt" aria-hidden="true"></i> 
            <span>My applications</span></a></li>
         <li><a href="<?php echo site_url('profile/addjob');?>" class="<?php echo $activeitem==2?'active':'';?>">
            <i class="fas fa-file-medical" aria-hidden="true"></i> 
            <span>Add application</span></a></li>
         <li><a href="<?php echo site_url('profile/changepassword');?>" class="<?php echo $activeitem==3?'active':'';?>">
            <i class="fa fa-key" aria-hidden="true"></i> 
            <span>Change Password</span></a></li>
         <li><a href="<?php echo site_url('auth/logout');?>" class="<?php echo $activeitem==4?'active':'';?>">
            <i class="fa fa-sign-out-alt" aria-hidden="true"></i> 
            <span>Log Out</span></a></li>
      </ul>
   </div>
</div>