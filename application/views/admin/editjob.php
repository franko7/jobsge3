<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Edit Application</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Application</li>
         </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/editjob/'.$currentJob->id);?>
                  <div class="row">
                     <div class="col-sm-12 col-md-6 mb-3">
                     <label for="fullname">Full name</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Full name" value="<?php echo $currentJob->fullname;?>">
                        <small style="color:red"><?php echo form_error('fullname'); ?></small>
                     </div>

                     <div class="col-sm-12 col-md-6 mb-3">
                        <label>Job type</label>
                        <div>
                        <select name="jobtype" class="form-control select2" id="jobtype">
                           <?php foreach($jobTypes as $jobType): ?>
                              <option value="<?php echo $jobType->id;?>" <?php echo $currentJob->job_type==$jobType->id ? 'selected':'';?> > 
                                 <?php echo $jobType->job_type_en;?> 
                              </option>
                           <?php endforeach; ?>
                        </select>
                        </div>
                        <small style="color:red"><?php echo form_error('jobtype'); ?></small>
                        <input type="hidden" name="hjobtype" id="hjobtype">
                     </div>
                     

                     <div class="col-sm-12 col-md-6 mb-3">
                     <label>Category</label>
                        <div>
                        <select name="category" id="category">
                           <?php foreach($categories as $category): ?>
                              <option value="<?php echo $category->id;?>" <?php echo $currentJob->category_id==$category->id ? 'selected':'';?>> 
                                 <?php echo $category->category_en;?> 
                              </option>
                           <?php endforeach; ?>
                        </select>
                        <small style="color:red"><?php echo form_error('category'); ?></small>
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-6 mb-3">
                        <label>Subcategory</label>
                        <div>
                           <select name="subcategory" id="subcategory">
                              <?php foreach($subcategories as $subcategory): ?>
                                 <option value="<?php echo $subcategory->id;?>" <?php echo $currentJob->subcategory_id==$subcategory->id ? 'selected':'';?>> 
                                    <?php echo $subcategory->subcategory_en;?> 
                                 </option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                        <small style="color:red"><?php echo form_error('subcategory'); ?></small>
                     </div>

                     <div class="col-sm-12 col-md-6 mb-3">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo isset($currentJob->company)?$currentJob->company:'';?>">
                        <small style="color:red"><?php echo form_error('company'); ?></small>
                     </div>

                     <div class="col-sm-12 col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone number" value="<?php echo $currentJob->phone;?>">
                        <small style="color:red"><?php echo form_error('phone'); ?></small>
                     </div>

                     <div class="col-sm-12 col-md-6 mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $currentJob->email;?>">
                        <small style="color:red"><?php echo form_error('email'); ?></small>
                     </div>


                     <div class="col-sm-12 col-md-6 mb-3"><!-- website -->
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $currentJob->website;?>">
                        <small style="color:red"><?php echo form_error('website'); ?></small>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3"><!-- location -->
                     <label>Location</label>
                        <div>
                           <select name="location" id="location">
                              <?php foreach($locations as $location): ?>
                                 <option value="<?php echo $location->id;?>" <?php echo $currentJob->location==$location->id ? 'selected':'';?>> 
                                    <?php echo $location->location;?>
                                 </option>
                              <?php endforeach; ?>
                           </select>
                           <small style="color:red"><?php echo form_error('location'); ?></small>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3"><!-- zip -->
                        <label>Zip code</label>
                        <input type="text" name="zip" class="form-control" placeholder="Zip code" value="<?php echo $currentJob->zipcode;?>">
                        <small style="color:red"><?php echo form_error('zip'); ?></small>
                     </div>
                     <div class="col-lg-12 mb-3"><!-- address -->
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $currentJob->address;?>">
                        <small style="color:red"><?php echo form_error('address'); ?></small>
                     </div>

                     <div class="col-lg-12 mb-3"><!-- short text en -->
                        <div class="form-group">
                           <label>Short text</label>
                           <div class="col-lg-12" style="padding:0">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="smtxen-tab" data-toggle="tab" href="#smtxen" role="tab" aria-controls="smtxen" aria-selected="true">English</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="smtxru-tab" data-toggle="tab" href="#smtxru" role="tab" aria-controls="smtxru" aria-selected="false">Russian</a>
                                 </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="smtxen" role="tabpanel" aria-labelledby="smtxen-tab">
                                    <input type="text" name="shorttexten" class="form-control" placeholder="Short text in English" value="<?php echo $currentJob->shorttext_en;?>">
                                    <small style="color:red"><?php echo form_error('shorttexten'); ?></small>
                                 </div>
                                 <div class="tab-pane fade" id="smtxru" role="tabpanel" aria-labelledby="smtxru-tab">
                                    <input type="text" name="shorttextru" class="form-control" placeholder="Short text in Russian" value="<?php echo $currentJob->shorttext_ru;?>">
                                    <small style="color:red"><?php echo form_error('shorttextru'); ?></small>
                                 </div>
                              </div>
                           </div>                              
                        </div>
                     </div>

                     <div class="col-lg-12 mb-3"><!-- Large text -->
                        <div class="form-group">
                           <label>Long text</label>
                           <div class="col-lg-12" style="padding:0">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="lgtxen-tab" data-toggle="tab" href="#lgtxen" role="tab" aria-controls="lgtxen" aria-selected="true">English</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="lgtxru-tab" data-toggle="tab" href="#lgtxru" role="tab" aria-controls="lgtxru" aria-selected="false">Russian</a>
                                 </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="lgtxen" role="tabpanel" aria-labelledby="lgtxen-tab">
                                    <textarea rows="6" name="largetexten" class="form-control notlbr" placeholder="Large text in English"> <?php echo $currentJob->largetext_en;?> </textarea>
                                    <small style="color:red"><?php echo form_error('largetexten'); ?></small>
                                 </div>
                                 <div class="tab-pane fade" id="lgtxru" role="tabpanel" aria-labelledby="lgtxru-tab">
                                    <textarea rows="6" name="largetextru" class="form-control notlbr" placeholder="Large text in Russian"> <?php echo $currentJob->largetext_ru;?> </textarea>
                                    <small style="color:red"><?php echo form_error('largetextru'); ?></small>
                                 </div>
                              </div>
                           </div>                              
                        </div>
                     </div>
                     <div>
                        <button type="submit" class="btn btn-primary"> Save </button>
                     </div>
                  </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div><!-- /.container-fluid -->
</section>




<script>
   $(document).ready(function(){
      $('#jobtype, #category, #subcategory, #location').select2();
      getInitialPrice($('#jobtype').val());
      getSubcategories($('#category').val());
      $('#category').change(function(){
         getSubcategories($('#category').val());
      });
      $('#jobtype').change(function(){
         $('#hjobtype').val($('#jobtype').val());
         getInitialPrice($('#jobtype').val());
      });
   });
   function getSubcategories(categoryid){
      $.ajax({
         url:'<?=base_url()?>home/getSubcategories',
         method: 'post',
         data: {csrf_token: $('input[name=csrf_token]').val(), categoryid: categoryid},
         dataType: 'json',
         success: function(response){
            $('input[name=csrf_token]').val(response.token);
            $("#subcategory").empty();
            for (var i = 0; i<response['subcategories'].length; i++){
               var opt = document.createElement('option');
               opt.value = response['subcategories'][i]['id'];
               opt.innerHTML = response['subcategories'][i]['subcategory_en'];
               $("#subcategory").append(opt);
            }
            //$("#subcategory").selectpicker("refresh");               
         }
      });
   };

   function getInitialPrice(jobType){
      $.ajax({
         url:'<?=base_url()?>home/getInitialFeeByType',
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

<?php $this->load->view('admin/templates/footer');?>
