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
               <?php $data['activeitem'] = 99; $this->load->view('profile/profilesidebar', $data);?> 
            </div>
            <div class="col-xl-9 col-lg-8 m-b30">
               <div class="job-bx submit-job">
                  <div class="job-bx-title clearfix">
                     <h5 class="font-weight-700 pull-left text-uppercase">Edit application</h5>
                  </div>
                  <?php echo form_open_multipart('profile/editjob/'.$currentJob->id, array('class' => 'tab-pane active', 'id' => 'editjob')); ?>
                     <div class="row m-b30">                        
                        <div class="col-lg-12 col-md-12"><!-- firstname -->
                           <div class="form-group">
                              <label><?php echo lang('fullname')?></label>
                              <input type="text" name="fullname" class="form-control" placeholder="Full name" value="<?php echo $currentJob->fullname;?>">
                              <small style="color:red"><?php echo form_error('fullname'); ?></small>
                           </div>
                        </div>
                        <!-- job type -->
                        <!-- <div class="col-lg-6 col-md-6">
                           <div class="form-group">
                              <label><?php echo lang('jobType')?></label>
                              <select name="jobtype" id="jobtype">
                                 <?php foreach($jobTypes as $jobType): ?>
                                    <option value="<?php echo $jobType->id;?>" <?php echo $currentJob->job_type==$jobType->id ? 'selected':'';?> > 
                                       <?php echo $jobType->job_type_en;?> 
                                    </option>
                                 <?php endforeach; ?>
                              </select>
                              <small style="color:red"><?php echo form_error('jobtype'); ?></small>
                           </div>
                        </div>    -->
                        <div class="col-lg-6"><!-- category -->
                           <div class="form-group">
                              <label><?php echo lang('category')?></label>
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
                        <div class="col-lg-6"><!-- subcategory -->
                           <div class="form-group">
                              <label><?php echo lang('subcategory')?></label>
                              <select name="subcategory" id="subcategory">
                                 <?php foreach($subcategories as $subcategory): ?>
                                    <option value="<?php echo $subcategory->id;?>" <?php echo $currentJob->subcategory_id==$subcategory->id ? 'selected':'';?>> 
                                       <?php echo $subcategory->subcategory_en;?> 
                                    </option>
                                 <?php endforeach; ?>
                              </select>
                              <small style="color:red"><?php echo form_error('subcategory'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-6"><!-- company -->
                           <div class="form-group">
                              <label><?php echo lang('company')?></label>
                              <input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo isset($currentJob->company)?$currentJob->company:'';?>">
                              <small style="color:red"><?php echo form_error('company'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-6"><!-- phone -->
                           <div class="form-group">
                              <label><?php echo lang('phone')?></label>
                              <input type="text" name="phone" class="form-control" placeholder="Phone number" value="<?php echo $currentJob->phone;?>">
                              <small style="color:red"><?php echo form_error('phone'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-6"><!-- email -->
                           <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $currentJob->email;?>">
                              <small style="color:red"><?php echo form_error('email'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-6"><!-- website -->
                           <div class="form-group">
                              <label><?php echo lang('website')?></label>
                              <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $currentJob->website;?>">
                              <small style="color:red"><?php echo form_error('website'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-6"><!-- location -->
                           <div class="form-group">
                              <label><?php echo lang('location')?></label>
                              <select name="location">
                                 <?php foreach($locations as $location): ?>
                                    <option value="<?php echo $location->id;?>" <?php echo $currentJob->location==$location->id ? 'selected':'';?>> 
                                       <?php echo $location->location;?>
                                    </option>
                                 <?php endforeach; ?>
                              </select>
                              <small style="color:red"><?php echo form_error('location'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6"><!-- zip -->
                           <div class="form-group">
                              <label><?php echo lang('zipCode')?></label>
                              <input type="text" name="zip" class="form-control" placeholder="Zip code" value="<?php echo $currentJob->zipcode;?>">
                              <small style="color:red"><?php echo form_error('zip'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12"><!-- address -->
                           <div class="form-group">
                              <label><?php echo lang('address')?></label>
                              <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $currentJob->address;?>">
                              <small style="color:red"><?php echo form_error('address'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12"><!-- short text en -->
                           <div class="form-group">
                              <label><?php echo lang('shortDescription')?></label>
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
                        <div class="col-lg-12"><!-- Large text -->
                           <div class="form-group">
                              <label><?php echo lang('longDescription')?></label>
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
                                       <textarea name="largetexten" class="form-control summernote" placeholder="Large text in English"> <?php echo $currentJob->largetext_en;?> </textarea>
                                       <small style="color:red"><?php echo form_error('largetexten'); ?></small>
                                    </div>
                                    <div class="tab-pane fade" id="lgtxru" role="tabpanel" aria-labelledby="lgtxru-tab">
                                       <textarea name="largetextru" class="form-control summernote" placeholder="Large text in Russian"> <?php echo $currentJob->largetext_ru;?> </textarea>
                                       <small style="color:red"><?php echo form_error('largetextru'); ?></small>
                                    </div>
                                 </div>
                              </div>                              
                           </div>
                        </div>
                        <div class="col-lg-12"><!-- images -->
                           <div class="form-group">
                              <label><?php echo lang('images')?></label>
                              <div class="imgupload">
                                 <div class="<?php echo $currentJob->imgfilename1?'imgwrapper':'displaynone';?>">
                                    <img src="<?php echo base_url('assets/uploads/'.$currentJob->imgfilename1);?>">    
                                 </div>
                                 <div class="fileinpwrapper">
                                    <input type="file" name="file1" class="form-control" >
                                    <small style="color:red"><?php echo form_error('file1'); ?></small>
                                 </div>
                              </div>
                           </div>
                           <div id="images4" class="displaynone">
                              <div class="form-group">
                                 <div class="imgupload">
                                    <div class="imgwrapper">
                                       <?php if($currentJob->imgfilename2):?>
                                          <img src="<?php echo base_url('assets/uploads/'.$currentJob->imgfilename2);?>">
                                       <?php endif;?>
                                    </div>
                                    <div class="fileinpwrapper">
                                       <input type="file" name="file2" class="form-control" >
                                       <small style="color:red"><?php echo form_error('file2'); ?></small>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="imgupload">
                                    <div class="imgwrapper">
                                       <?php if($currentJob->imgfilename3):?>
                                          <img src="<?php echo base_url('assets/uploads/'.$currentJob->imgfilename3);?>">
                                       <?php endif;?>   
                                    </div>
                                    <div class="fileinpwrapper">
                                       <input type="file" name="file3" class="form-control" >
                                       <small style="color:red"><?php echo form_error('file3'); ?></small>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="imgupload">
                                    <div class="imgwrapper">
                                       <?php if($currentJob->imgfilename4):?>
                                          <img src="<?php echo base_url('assets/uploads/'.$currentJob->imgfilename4);?>">
                                       <?php endif;?>   
                                    </div>
                                    <div class="fileinpwrapper">
                                       <input type="file" name="file4" class="form-control" >
                                       <small style="color:red"><?php echo form_error('file4'); ?></small>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="imgupload">
                                    <div class="imgwrapper">
                                       <?php if($currentJob->imgfilename5):?>
                                          <img src="<?php echo base_url('assets/uploads/'.$currentJob->imgfilename5);?>">
                                       <?php endif;?>   
                                    </div>
                                    <div class="fileinpwrapper">
                                       <input type="file" name="file5" class="form-control" >
                                       <small style="color:red"><?php echo form_error('file5'); ?></small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- payment -->
                           <!-- <div class="col-lg-12 displaynone" id="payment">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="cardpay-tab" data-toggle="tab" href="#cardpay" role="tab" aria-controls="cardpay" aria-selected="true">Enter card details</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="paypalpay-tab" data-toggle="tab" href="#paypalpay" role="tab" aria-controls="paypalpay" aria-selected="false">Pay with PayPal</a>
                                 </li>
                              </ul>
                              <div class="tab-content p-2" id="myTabContent">
                                 <div class="tab-pane fade show active" id="cardpay" role="tabpanel" aria-labelledby="cardpay-tab">
                                    <div class="form-row pt-2">
                                       <div class="form-group col-md-6">
                                          <label for="cardholder">Name on card</label>
                                          <input type="text" id="cardholder" name="cardholder" class="form-control" placeholder="Cardholder name" value="<?php echo set_value('cardholder');?>">
                                          <small style="color:red"><?php echo form_error('cardholder'); ?></small>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label for="cardnumber">Card number</label>
                                          <input type="text" id="cardnumber" name="cardnumber" class="form-control" placeholder="Card number" value="<?php echo set_value('cardnumber');?>">
                                          <small style="color:red"><?php echo form_error('cardnumber'); ?></small>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="cardmonth">Month</label>
                                          <select name="cardmonth" id="cardmonth">
                                             <?php for($m=1; $m<=12; $m++): ?>
                                                <option value="<?php echo $m;?>"> <?php echo $m<10?'0'.$m:$m;?> </option>
                                             <?php endfor; ?>
                                          </select>
                                          <small style="color:red"><?php echo form_error('cardmonth'); ?></small>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="cardyear">Year</label>
                                          <select name="cardyear" id="cardyear">
                                             <?php for($y=date("Y"); $y<date("Y")+11; $y++): ?>
                                                <option value="<?php echo $y;?>"> <?php echo $y;?> </option>
                                             <?php endfor; ?>
                                          </select>
                                          <small style="color:red"><?php echo form_error('cardyear'); ?></small>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="cardcvv">CVV</label>
                                          <input type="text" id="cardcvv" name="cardcvv" class="form-control" placeholder="CCV" value="<?php echo set_value('cardcvv');?>">
                                          <small style="color:red"><?php echo form_error('cardcvv'); ?></small>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade" id="paypalpay" role="tabpanel" aria-labelledby="paypalpay-tab">
                                    <input type="text" name="paypaltoken" value="abcdefgh123545">
                                    <button>Pay with paypal</button>
                                 </div>
                              </div>
                           </div> -->
                        </div>
                     </div>
                     <button type="submit" class="site-button m-b30"><?php echo lang('updateApp')?></button>
                  <?php echo form_close(); ?>
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
         getSubcategories($('#category').val());
      });
      $('#jobtype').change(function(){
         displayImageFields();
         // getInitialPrice($('#jobtype').val());
      });
      displayImageFields();
      //getInitialPrice($('#jobtype').val());

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

   function displayImageFields(){
      var jobtype = $('#jobtype').val();
      if(jobtype>1){
         $('#images4').removeClass('displaynone');
      }else{
         $('#images4').addClass('displaynone');
      }
   };

   // function getInitialPrice(jobType){
   //    $.ajax({
   //       url:'<?=base_url()?>profile/getInitialFeeByType',
   //       method: 'post',
   //       data: {csrf_token: $('input[name=csrf_token]').val(), jobtype: jobType},
   //       dataType: 'json',
   //       success: function(response){
   //          $('input[name=csrf_token]').val(response.token);
   //          if(response['jobtype']['initial_price'] > 0){
   //             $('#payment').removeClass('displaynone');
   //          }else{
   //             $('#payment').addClass('displaynone');
   //          }       
   //       }
   //    });
   // };
   
   
</script>
<?php $this->load->view('templates/footer');?>