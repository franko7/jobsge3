<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content bg-white">
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full bg-white p-t50 p-b20">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 m-b30">               
                  <?php $data['activeitem'] = 2; $this->load->view('profile/profilesidebar', $data);?> 
               </div>
               <div class="col-xl-9 col-lg-8 m-b30">
                  <div class="job-bx submit-job">
                     <div class="job-bx-title clearfix">
                        <h5 class="font-weight-700 pull-left text-uppercase"> <?php echo lang('AddNewApp')?> </h5>
                     </div>
                     <div class="col-lg-12 mb-3 d-md-flex p-0 appbuttons <?php echo validation_errors()?'displaynone':'';?>" >
                        <button id="addJobSeeker" class="m-1 w-100 showJobAdd ">
                           <span class="title"> <?php echo lang('addJobSeekApp')?> </span>
                           <span> <?php echo lang('youCanAddJobSeekApp')?> </span>
                        </button>
                        <button id="addSGApp" class="m-1 w-100 showJobAdd ">
                           <span class="title"> <?php echo lang('addSilverGoldApp')?> </span>
                           <span> <?php echo lang('youCanAddSilverGoldApp')?> </span>
                        </button>
                     </div>
                     <div id="formwrapper" class="<?php echo validation_errors()?'':'displaynone';?>">
                        <?php echo form_open_multipart('profile/addjob', array('class' => 'tab-pane active', 'id' => 'addjob')); ?>
                           <div class="row m-b30">                        
                              <div class="<?php echo (validation_errors() && $this->input->post('hjobtype')==1)?'col-lg-12':'col-lg-6 col-md-6';?>" id="fullnamewrapper"><!-- firstname -->
                                 <div class="form-group">
                                    <label> <?php echo lang('fullname')?> </label>
                                    <input type="text" name="fullname" class="form-control" placeholder="<?php echo lang('fullname')?>" value="<?php echo set_value('fullname') ? set_value('fullname') : $this->session->userdata('full_name');?>">
                                    <small style="color:red"><?php echo form_error('fullname'); ?></small>
                                 </div>
                              </div>
                              <div class="<?php echo (validation_errors() && $this->input->post('hjobtype')==1)?'displaynone':'col-lg-6 col-md-6';?>" id="jobtypewrapper"><!-- job type -->
                                 <div class="form-group">
                                    <label> <?php echo lang('jobType')?> </label>
                                    <select name="jobtype" id="jobtype">
                                       <?php foreach($jobTypes as $jobType): ?>
                                          <?php if($jobType->id > 1): ?>
                                             <option value="<?php echo $jobType->id;?>" <?php echo set_value('jobtype')==$jobType->id ? 'selected':'';?> > 
                                                <?php echo $jobType->job_type_en;?> 
                                             </option>
                                          <?php endif;?>
                                       <?php endforeach; ?>
                                    </select>
                                    <small style="color:red"><?php echo form_error('jobtype'); ?></small>
                                    <input type="hidden" name="hjobtype" id="hjobtype">
                                 </div>
                              </div>                       
                              <div class="col-lg-6 col-md-6"><!-- category -->
                                 <div class="form-group">
                                    <label> <?php echo lang('category')?> </label>
                                    <select name="category" id="category" data-live-search="true">
                                       <?php foreach($categories as $category): ?>
                                          <option value="<?php echo $category->id;?>" <?php echo set_value('category')==$category->id ? 'selected':'';?>> 
                                             <?php echo $category->category_en;?> 
                                          </option>
                                       <?php endforeach; ?>
                                    </select>
                                    <small style="color:red"><?php echo form_error('category'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- subcategory -->
                                 <div class="form-group">
                                    <label> <?php echo lang('subcategory')?> </label>
                                    <select name="subcategory" id="subcategory" data-live-search="true">                                 
                                    </select>
                                    <small style="color:red"><?php echo form_error('subcategory'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- phone -->
                                 <div class="form-group">
                                    <label> <?php echo lang('company')?> </label>
                                    <input type="text" name="company" class="form-control" placeholder="<?php echo lang('company')?>" value="<?php echo set_value('company');?>">
                                    <small style="color:red"><?php echo form_error('company'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- phone -->
                                 <div class="form-group">
                                    <label> <?php echo lang('phone')?> </label>
                                    <input type="text" name="phone" class="form-control" placeholder="<?php echo lang('phone')?>" value="<?php echo set_value('phone');?>">
                                    <small style="color:red"><?php echo form_error('phone'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- email -->
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ? set_value('email') : $this->session->userdata('user_email');?>">
                                    <small style="color:red"><?php echo form_error('email'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- website -->
                                 <div class="form-group">
                                    <label> <?php echo lang('website')?> </label>
                                    <input type="text" name="website" class="form-control" placeholder="<?php echo lang('website')?>" value="<?php echo set_value('website');?>">
                                    <small style="color:red"><?php echo form_error('website'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- location -->
                                 <div class="form-group">
                                    <label> <?php echo lang('location')?> </label>
                                    <select name="location" data-live-search="true">
                                       <?php foreach($locations as $location): ?>
                                          <option value="<?php echo $location->id;?>"> <?php echo $location->location;?> </option>
                                       <?php endforeach; ?>
                                    </select>
                                    <small style="color:red"><?php echo form_error('location'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6"><!-- zip -->
                                 <div class="form-group">
                                    <label> <?php echo lang('zipCode')?> </label>
                                    <input type="text" name="zip" class="form-control" placeholder="<?php echo lang('zipCode')?>" value="<?php echo set_value('zip');?>">
                                    <small style="color:red"><?php echo form_error('zip'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-12"><!-- address -->
                                 <div class="form-group">
                                    <label> <?php echo lang('address')?> </label>
                                    <input type="text" name="address" class="form-control" placeholder="<?php echo lang('address')?>" value="<?php echo set_value('address');?>">
                                    <small style="color:red"><?php echo form_error('address'); ?></small>
                                 </div>
                              </div>
                              <div class="col-lg-12"><!-- short text en -->
                                 <div class="form-group">
                                    <label> <?php echo lang('shortDescription')?> </label>
                                    <div class="col-lg-12" style="padding:0">
                                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item">
                                             <a class="nav-link active" id="smtxen-tab" data-toggle="tab" href="#smtxen" role="tab" aria-controls="smtxen" aria-selected="true">English</a>
                                          </li>
                                          <li class="nav-item">
                                             <a class="nav-link" id="smtxru-tab" data-toggle="tab" href="#smtxru" role="tab" aria-controls="smtxru" aria-selected="false">Russian</a>
                                          </li>
                                       </ul>
                                       <div class="tab-content p-2" id="myTabContent">
                                          <div class="tab-pane fade show active" id="smtxen" role="tabpanel" aria-labelledby="smtxen-tab">
                                             <input type="text" name="shorttexten" class="form-control" placeholder="<?php echo lang('shortTxtEng')?>" value="<?php echo set_value('shorttexten');?>">
                                             <small style="color:red"><?php echo form_error('shorttexten'); ?></small>
                                          </div>
                                          <div class="tab-pane fade" id="smtxru" role="tabpanel" aria-labelledby="smtxru-tab">
                                             <input type="text" name="shorttextru" class="form-control" placeholder="<?php echo lang('shortTxtRus')?>" value="<?php echo set_value('shorttextru');?>">
                                             <small style="color:red"><?php echo form_error('shorttexten'); ?></small>
                                          </div>
                                       </div>
                                    </div>                              
                                 </div>
                              </div>
                              <div class="col-lg-12"><!-- Large text -->
                                 <div class="form-group">
                                    <label> <?php echo lang('longDescription')?> </label>
                                    <div class="col-lg-12" style="padding:0">
                                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item">
                                             <a class="nav-link active" id="lgtxen-tab" data-toggle="tab" href="#lgtxen" role="tab" aria-controls="lgtxen" aria-selected="true">English</a>
                                          </li>
                                          <li class="nav-item">
                                             <a class="nav-link" id="lgtxru-tab" data-toggle="tab" href="#lgtxru" role="tab" aria-controls="lgtxru" aria-selected="false">Russian</a>
                                          </li>
                                       </ul>
                                       <div class="tab-content p-2" id="myTabContent">
                                          <div class="tab-pane fade show active" id="lgtxen" role="tabpanel" aria-labelledby="lgtxen-tab">
                                             <textarea name="largetexten" class="form-control summernote" placeholder="<?php echo lang('largeTxtEng')?>"> <?php echo set_value('largetexten');?> </textarea>
                                             <small style="color:red"><?php echo form_error('largetexten'); ?></small>
                                          </div>
                                          <div class="tab-pane fade" id="lgtxru" role="tabpanel" aria-labelledby="lgtxru-tab">
                                             <textarea name="largetextru" class="form-control summernote" placeholder="<?php echo lang('largeTxtRus')?>"> <?php echo set_value('largetextru');?> </textarea>
                                             <small style="color:red"><?php echo form_error('largetextru'); ?></small>
                                          </div>
                                       </div>
                                    </div>                              
                                 </div>
                              </div>
                              <div class="col-lg-12"><!-- images -->
                                 <div class="form-group">
                                    <label> <?php echo lang('images')?> </label>
                                    <input type="file" name="file1" class="form-control" placeholder="Zip code">
                                    <small style="color:red"><?php echo form_error('file1'); ?></small>
                                 </div>
                                 <div id="images4" class="displaynone">
                                    <div class="form-group">
                                       <input type="file" name="file2" class="form-control" placeholder="Zip code">
                                       <small style="color:red"><?php echo form_error('file2'); ?></small>
                                    </div>
                                    <div class="form-group">
                                       <input type="file" name="file3" class="form-control" placeholder="Zip code">
                                       <small style="color:red"><?php echo form_error('file3'); ?></small>
                                    </div>
                                    <div class="form-group">
                                       <input type="file" name="file4" class="form-control" placeholder="Zip code">
                                       <small style="color:red"><?php echo form_error('file4'); ?></small>
                                    </div>
                                    <div class="form-group">
                                       <input type="file" name="file5" class="form-control" placeholder="Zip code">
                                       <small style="color:red"><?php echo form_error('file5'); ?></small>
                                    </div>
                                 </div>
                              </div>
                              <!-- payment -->
                              <div class="col-lg-12 displaynone" id="payment">                                 
                                 <input type="text" name="paypaltoken" value="abcdefgh123545">
                                 <button> <?php echo lang('payWithPP')?> </button>
                              </div>
                           </div>
                           <button type="submit" class="site-button m-b30"> <?php echo lang('addApplication')?> </button>
                        <?php echo form_close(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content END-->

<script type='text/javascript'>
   $(document).ready(function(){
      $('#category').change(function(){
         getSubcategories($('#category').val());
         
      });
      $('#jobtype').change(function(){
         $('#hjobtype').val($('#jobtype').val());
         getInitialPrice($('#jobtype').val());
      });
      $('#addJobSeeker').click(function(){
         $('#jobtypewrapper').addClass('displaynone');  
         $('#fullnamewrapper').removeClass('col-lg-6 col-md-6');
         $('#fullnamewrapper').addClass('col-lg-12');
         $('.appbuttons').addClass('displaynone');
         $('#formwrapper').removeClass('displaynone');
         $('#hjobtype').val(1);
      });
      $('#addSGApp').click(function(){
         $('.appbuttons').addClass('displaynone');
         $('#formwrapper').removeClass('displaynone');
         $('#images4').removeClass('displaynone');
         $('#hjobtype').val($('#jobtype').val());
      });
      getInitialPrice($('#jobtype').val());
      getSubcategories($('#category').val());

      $('#category').selectpicker();
      
      $('.summernote').summernote({
        tabsize: 3,
        height: 150,
        toolbar: [
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
   });

   

   function getSubcategories(categoryid){
      $.ajax({
         url:'<?=site_url("profile/getSubcategories")?>',
         method: 'post',
         data: {csrf_token: $('input[name=csrf_token]').val(), categoryid: categoryid},
         dataType: 'json',
         success: function(response){
            $('input[name=csrf_token]').val(response.token);
            $("#subcategory").empty();
            for (var i = 0; i<response['subcategories'].length; i++){
               var opt = document.createElement('option');
               opt.value = response['subcategories'][i]['id'];
               opt.innerHTML = response['subcategories'][i]['subcategory_<?php echo $this->lang->lang();?>'];
               $("#subcategory").append(opt);
            }
            $("#subcategory").selectpicker("refresh");               
         }
      });
   };

   function getInitialPrice(jobType){
      $.ajax({
         url:'<?=site_url("profile/getInitialFeeByType")?>',
         method: 'post',
         data: {csrf_token: $('input[name=csrf_token]').val(), jobtype: jobType},
         dataType: 'json',
         success: function(response){
            $('input[name=csrf_token]').val(response.token);
            if(response['jobtype'][0]['initial_price'] > 0){
               $('#payment').removeClass('displaynone');
            }else{
               $('#payment').addClass('displaynone');
            }       
         }
      });
   };
</script>
<?php $this->load->view('templates/footer');?>