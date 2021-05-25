<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Add locoation</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Add locoation</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/addlocation');?>
               <div class="form-group row">
                  <label for="location" class="col-sm-3 col-form-label">Location</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="location" placeholder="Location">
                     <small style="color:red"><?php echo form_error('location'); ?></small>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                     <button type="submit" class="btn btn-success mt-3"> <i class="fas fa-save mr-2"></i> Add location </button>
                  </div>
               </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>

<?php $this->load->view('admin/templates/footer');?>
