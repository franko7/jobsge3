<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Edit category</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit category</li>
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
               <?php echo form_open_multipart('admin/editcategory/'.$category->id);?>
               <div class="form-group row">
                  <label for="category_en" class="col-sm-3 col-form-label">Category text English</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="category_en" value="<?php echo $category->category_en;?>">
                     <small style="color:red"><?php echo form_error('category_en'); ?></small>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="category_ru" class="col-sm-3 col-form-label">Category text Russian</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="category_ru" value="<?php echo $category->category_ru;?>">
                     <small style="color:red"><?php echo form_error('category_ru'); ?></small>
                  </div>
               </div>               
               <div class="form-group row">
                  <label for="icon" class="col-sm-3 col-form-label">Category icon</label>
                  <div class="col-1">
                     <?php if($category->filename):?>
                        <img src="<?php echo $iconPath.$category->filename;?>" style="height:44px" alt="<?php echo $category->category_en;?>">
                     <?php endif; ?>
                  </div>
                  <div class="col-8 pl-3">
                     <input type="file" class="form-control" name="icon" >
                     <small style="color:red"><?php echo form_error('icon'); ?></small>
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
