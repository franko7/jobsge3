<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Edit subcategory</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit subcategory</li>
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
               <?php echo form_open_multipart('admin/editsubcategory/'.$subcategory->id);?>
               <div class="form-group row">
                  <label for="category_en" class="col-sm-3 col-form-label">Select category</label>
                  <div class="col-sm-9">
                     <select name="category" id="category">
                        <?php foreach($categories as $category): ?>
                           <option value="<?php echo $category->id;?>" <?php echo $subcategory->category_id==$category->id ? 'selected':'';?>>
                              <?php echo $category->category_en;?> 
                           </option>
                        <?php endforeach; ?>
                     </select>
                     <small style="color:red"><?php echo form_error('category'); ?></small>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="subcategory_en" class="col-sm-3 col-form-label">Subcategory text English</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="subcategory_en" value="<?php echo $subcategory->subcategory_en;?>">
                     <small style="color:red"><?php echo form_error('subcategory_en'); ?></small>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="subcategory_ru" class="col-sm-3 col-form-label">Subcategory text Russian</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" name="subcategory_ru" value="<?php echo $subcategory->subcategory_ru;?>">
                     <small style="color:red"><?php echo form_error('subcategory_ru'); ?></small>
                  </div>
               </div>               
               <div class="form-group row">
                  <button type="submit" class="btn btn-success mt-3"> Edit subcategory </button>
                  </div>
               </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>
<script>
   $(document).ready(function(){
      $('#category').select2();
   });
</script>
<?php $this->load->view('admin/templates/footer');?>
