<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Social links</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Social links</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php if ($this->session->flashdata('socialResult')):?>
            <div class="alert alert-<?php echo $this->session->flashdata('socialResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->flashdata('socialResult')['message'];?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/socials');?>
               
                  <div class="form-group row">
                     <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="facebook" placeholder="Facebook link" value="<?php echo $socials->facebook;?>">
                        <small style="color:red"><?php echo form_error('facebook'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="instagram" placeholder="Instagram link" value="<?php echo $socials->instagram;?>">
                        <small style="color:red"><?php echo form_error('instagram'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin link" value="<?php echo $socials->linkedin;?>">
                        <small style="color:red"><?php echo form_error('linkedin'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="google" class="col-sm-3 col-form-label">Google+</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="google" placeholder="Google+ link" value="<?php echo $socials->google;?>">
                        <small style="color:red"><?php echo form_error('google'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="twitter" placeholder="Twitter link" value="<?php echo $socials->twitter;?>">
                        <small style="color:red"><?php echo form_error('twitter'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <button type="submit" class="btn btn-success mt-3"> Update links </button>
                  </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>

<?php $this->load->view('admin/templates/footer');?>
