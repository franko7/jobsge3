<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Edit Images</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Images</li>
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
               <?php echo form_open_multipart('admin/editimages/');?>

               <div class="form-group row">
                  <label for="logo" class="col-sm-3 col-form-label d-flex align-items-center"><?php echo $images[2]->description;?></label>
                  <div class="col-2 d-none d-md-block">
                     <?php if($images[2]->filename):?>
                        <img src="<?php echo $bgPath.$images[2]->filename;?>" style="width:70px" alt="<?php echo $images[2]->description;?>">
                     <?php endif; ?>
                  </div>
                  <div class="col-xs-12 col-md-7 pl-md-5 d-flex align-items-center">
                     <input type="file" class="form-control" name="logo" >
                     <small style="color:red"><?php echo form_error('logo'); ?></small>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="favicon" class="col-sm-3 col-form-label d-flex align-items-center"><?php echo $images[3]->description;?></label>
                  <div class="col-2 d-none d-md-block">
                     <?php if($images[3]->filename):?>
                        <img src="<?php echo $bgPath.$images[3]->filename;?>" style="width:60px" alt="<?php echo $images[3]->description;?>">
                     <?php endif; ?>
                  </div>
                  <div class="col-xs-12 col-md-7 pl-md-5 d-flex align-items-center">
                     <input type="file" class="form-control" name="favicon" >
                     <small style="color:red"><?php echo form_error('favicon'); ?></small>
                  </div>
               </div>
                           
               <div class="form-group row">
                  <label for="main" class="col-sm-3 col-form-label d-flex align-items-center"><?php echo $images[0]->description;?></label>
                  <div class="col-2 d-none d-md-block">
                     <?php if($images[0]->filename):?>
                        <img src="<?php echo $bgPath.$images[0]->filename;?>" style="width:140px" alt="<?php echo $images[0]->description;?>">
                     <?php endif; ?>
                  </div>
                  <div class="col-xs-12 col-md-7 pl-md-5 d-flex align-items-center">
                     <input type="file" class="form-control" name="main" >
                     <small style="color:red"><?php echo form_error('main'); ?></small>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="job" class="col-sm-3 col-form-label d-flex align-items-center"><?php echo $images[1]->description;?></label>
                  <div class="col-2 d-none d-md-block">
                     <?php if($images[1]->filename):?>
                        <img src="<?php echo $bgPath.$images[1]->filename;?>" style="width:140px" alt="<?php echo $images[1]->description;?>">
                     <?php endif; ?>
                  </div>
                  <div class="col-xs-12 col-md-7 pl-md-5 d-flex align-items-center">
                     <input type="file" class="form-control" name="job" >
                     <small style="color:red"><?php echo form_error('job'); ?></small>
                  </div>
               </div>

               <div class="form-group row">
                  <button type="submit" class="btn btn-success mt-3"> Edit category </button>
                  </div>
               </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>

<?php $this->load->view('admin/templates/footer');?>
