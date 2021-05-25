<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Terms and Conditions</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Terms and Conditions</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php if ($this->session->flashdata('termsResult')):?>
            <div class="alert alert-<?php echo $this->session->flashdata('termsResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->flashdata('termsResult')['message'];?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/terms');?>

                  <ul class="nav nav-tabs" id="termsTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="terms_english-tab" data-toggle="tab" href="#terms_english" role="tab" aria-controls="terms_english" aria-selected="true">Terms in English</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="terms_russian-tab" data-toggle="tab" href="#terms_russian" role="tab" aria-controls="terms_russian" aria-selected="false">Terms in Russian</a>
                     </li>
                  </ul>
                  <div class="tab-content" id="termsTabContent">
                     <div class="tab-pane fade show active" id="terms_english" role="tabpanel" aria-labelledby="terms_english-tab">
                        <textarea class="form-control summernote" name="terms_en"><?php echo $terms->terms_en;?></textarea>
                        <small style="color:red"><?php echo form_error('terms_en'); ?></small>
                     </div>
                     <div class="tab-pane fade" id="terms_russian" role="tabpanel" aria-labelledby="terms_russian-tab">
                        <textarea class="form-control summernote" name="terms_ru"><?php echo $terms->terms_ru;?></textarea>
                        <small style="color:red"><?php echo form_error('terms_ru'); ?></small>
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
      height: 800,
      fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '28'],
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


