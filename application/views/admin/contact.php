<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Contact us Page</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Contact us Page</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php if ($this->session->flashdata('contactusResult')):?>
            <div class="alert alert-<?php echo $this->session->flashdata('contactusResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->flashdata('contactusResult')['message'];?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/contact');?>

                  <div class="form-group row">
                     <label for="address_en" class="col-sm-2 col-form-label">Address English</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="address_en" name="address_en" placeholder="Address English" value="<?php echo $contacts->addr_en;?>">
                        <small style="color:red"><?php echo form_error('address_en'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="address_ru" class="col-sm-2 col-form-label">Address Russian</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="address_ru" name="address_ru" placeholder="Address Russian" value="<?php echo $contacts->addr_ru;?>">
                        <small style="color:red"><?php echo form_error('address_ru'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-sm-2 col-form-label">Email</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $contacts->email;?>">
                        <small style="color:red"><?php echo form_error('email'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $contacts->phone;?>">
                        <small style="color:red"><?php echo form_error('phone'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="location" class="col-sm-2 col-form-label">Map URL</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="location" name="location" placeholder="location" value="<?php echo $contacts->location;?>">
                        <small style="color:red"><?php echo form_error('location'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <button type="submit" class="btn btn-success mt-3"> Save </button>
                  </div>

               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>
<script>
$(document).ready(function(){
   $('.summernote').summernote({
      tabsize: 3,
      height: 200,
      toolbar: [
      ['style', ['style']],
      ['fontsize', ['fontsize']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
});
</script>
<?php $this->load->view('admin/templates/footer');?>


