<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">About us Page</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">About us Page</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php if ($this->session->flashdata('aboutusResult')):?>
            <div class="alert alert-<?php echo $this->session->flashdata('aboutusResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->flashdata('aboutusResult')['message'];?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/aboutus');?>

                  <div class="form-group row">
                     <label for="aboutus_en" class="col-sm-2 col-form-label">Title English</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="title_en" placeholder="Title English" value="<?php echo $aboutUs->title_en;?>">
                        <small style="color:red"><?php echo form_error('title_en'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="subtitle_en" class="col-sm-2 col-form-label">Subtitle English</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="subtitle_en" placeholder="Subtitle English" value="<?php echo $aboutUs->subtitle_en;?>">
                        <small style="color:red"><?php echo form_error('subtitle_en'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="aboutus_en" class="col-sm-2 col-form-label">About us English </label>
                     <div class="col-sm-10">
                        <textarea class="form-control summernote" name="aboutus_en"><?php echo $aboutUs->aboutus_en;?></textarea>
                        <small style="color:red"><?php echo form_error('aboutus_en'); ?></small>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="title_ru" class="col-sm-2 col-form-label">Title Russian</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="title_ru" placeholder="Title English" value="<?php echo $aboutUs->title_ru;?>">
                        <small style="color:red"><?php echo form_error('title_ru'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="subtitle_ru" class="col-sm-2 col-form-label">Subtitle Russian</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="subtitle_ru" placeholder="Subtitle English" value="<?php echo $aboutUs->subtitle_ru;?>">
                        <small style="color:red"><?php echo form_error('subtitle_ru'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="aboutus_ru" class="col-sm-2 col-form-label">About us Russian </label>
                     <div class="col-sm-10">
                        <textarea class="form-control summernote" name="aboutus_ru"><?php echo $aboutUs->aboutus_ru;?></textarea>
                        <small style="color:red"><?php echo form_error('aboutus_ru'); ?></small>
                     </div>
                  </div>

                  <div class="form-group row">
                     <button type="submit" class="btn btn-success mt-3"> <i class="fas fa-save mr-2"></i> Save </button>
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


