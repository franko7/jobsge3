<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Change Admin Password</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Change password</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php if ($this->session->flashdata('pwdChng')):?>
            <div class="alert alert-<?php echo $this->session->flashdata('pwdChng')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->flashdata('pwdChng')['message'];?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/changepassword_process');?>
                  <div class="form-group row">
                     <label for="oldPassword" class="col-sm-3 col-form-label">Old password</label>
                     <div class="col-sm-9">
                        <input type="password" class="form-control" name="oldPassword" placeholder="Old password">
                        <small style="color:red"><?php echo form_error('oldPassword'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="newPassword" class="col-sm-3 col-form-label">New password</label>
                     <div class="col-sm-9">
                        <input type="password" class="form-control" name="newPassword" placeholder="New password">
                        <small style="color:red"><?php echo form_error('newPassword'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="confPassword" class="col-sm-3 col-form-label">Confirm password</label>
                     <div class="col-sm-9">
                        <input type="password" class="form-control" name="confPassword" placeholder="Confirm password">
                        <small style="color:red"><?php echo form_error('confPassword'); ?></small>
                     </div>
                  </div>                  
                  <div class="form-group row">
                     <button type="submit" class="btn btn-success mt-3"> Update password </button>
                     </div>
                  </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>

<?php $this->load->view('admin/templates/footer');?>
