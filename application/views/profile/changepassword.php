<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content bg-white">
   <!-- contact area -->
   <div class="content-block">
   <!-- Browse Jobs -->
   <div class="section-full bg-white p-t50 p-b20">
      <div class="container">
         <div class="row">
            <div class="col-xl-3 col-lg-4 m-b30">               
               <?php $data['activeitem'] = 3; $this->load->view('profile/profilesidebar', $data);?> 
            </div>
            <div class="col-xl-9 col-lg-8 m-b30">
               <div class="job-bx submit-job">
                  <div class="job-bx-title clearfix">
                     <h5 class="font-weight-700 pull-left text-uppercase">
                        <?php echo lang('changePassword')?>
                     </h5>
                  </div>
                  <?php if ($this->session->flashdata('profPwdChng')):?>
                     <div class="alert alert-<?php echo $this->session->flashdata('profPwdChng')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata('profPwdChng')['message'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php endif; ?> 
                  <?php echo form_open('profile/changepassword_process', array('class' => 'tab-pane active', 'id' => 'changepassword')); ?>
                     <div class="row m-b30">                        
                        <div class="col-lg-12"><!-- firstname -->
                           <div class="form-group">
                              <label> <?php echo lang('oldPassword')?> </label>
                              <input type="password" name="oldpassword" class="form-control" placeholder="<?php echo lang('oldPassword')?>">
                              <small style="color:red"><?php echo form_error('oldpassword'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12"><!-- lastname -->
                           <div class="form-group">
                              <label> <?php echo lang('newPassword')?> </label>
                              <input type="password" name="newpassword" class="form-control" placeholder="<?php echo lang('newPassword')?>">
                              <small style="color:red"><?php echo form_error('newpassword'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12"><!-- lastname -->
                           <div class="form-group">
                              <label> <?php echo lang('confPassword')?> </label>
                              <input type="password" name="confpassword" class="form-control" placeholder="<?php echo lang('confPassword')?>">
                              <small style="color:red"><?php echo form_error('confpassword'); ?></small>
                           </div>
                        </div>
                     </div>
                     <button type="submit" class="site-button m-b30"> <?php echo lang('updPassword')?> </button>
                  <?php echo form_close();?>
               </div>
            </div>
         </div>
      </div>
   </div>
      <!-- Browse Jobs END -->
</div>
</div>
<!-- Content END-->

<script type='text/javascript'>
   $(document).ready(function(){
      $('#category').change(function(){
         var categoryid = $(this).val();
         $.ajax({
            url:'<?=base_url()?>profile/getSubcategories',
            method: 'post',
            data: {categoryid: categoryid},
            dataType: 'json',
            success: function(response){
               $("#subcategory").empty();
               for (var i = 0; i<response.length; i++){
                  var opt = document.createElement('option');
                  opt.value = i+1;
                  opt.innerHTML = response[i]['subcategory_en'];
                  $("#subcategory").append(opt);
               }
               $("#subcategory").selectpicker("refresh");               
            }
         });
      });
   });
</script>
<?php $this->load->view('templates/footer');?>