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
                  <div class="job-bx table-job-bx clearfix">

                     <div class="job-bx-title clearfix">
                        <h5 class="font-weight-700 pull-left text-uppercase">
                           <?php echo lang('addSubscription')?>
                        </h5>
                     </div>
                     <!-- add job message -->
                     <?php if ($this->session->flashdata('addJobResult')):?>
                        <div class="alert alert-<?php echo $this->session->flashdata('addJobResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                           <strong><?php echo $this->session->flashdata('addJobResult')['message'];?></strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     <?php endif; ?>
                     <!-- edit job message -->
                     <?php if ($this->session->flashdata('editJobResult')):?>
                        <div class="alert alert-<?php echo $this->session->flashdata('editJobResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                           <strong><?php echo $this->session->flashdata('editJobResult')['message'];?></strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     <?php endif; ?>
                     <!-- end messages -->

                     <!-- Add subscription section -->
                     <?php echo form_open_multipart('profile/subscriptions', array('class' => 'tab-pane active', 'id' => 'addjob')); ?>
                        <div class="row">                                               
                           <div class="col-lg-6 col-md-6"><!-- category -->
                              <div class="form-group">
                                 <label> <?php echo lang('category')?> </label>
                                 <select name="category" id="category" data-live-search="true">
                                    <?php foreach($categories as $category): ?>
                                       <option value="<?php echo $category->id;?>" <?php echo set_value('category')==$category->id ? 'selected':'';?>> 
                                          <?php echo $category->{'category_'.$this->lang->lang()};?> 
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
                        </div>
                        <div class="row m-b50">
                           <div class="col-lg-6 col-md-6">
                              <button type="submit" name="addCategory" class="site-button m-b10"> <?php echo lang('addCategory')?> </button>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <button type="submit" name="addSubcategory" class="site-button m-b10"> <?php echo lang('addSubcategory')?> </button>
                           </div>
                        </div>                        
                     <?php echo form_close();?>

                     <!-- My subscriptions section -->
                     <?php if(count($subscriptions)): ?>
                        <div class="job-bx-title clearfix">
                           <h5 class="font-weight-700 pull-left text-uppercase">
                              <?php echo lang('mySubscriptions')?>
                           </h5>
                        </div>                     
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th><?php echo lang('category')?></th>
                                 <th><?php echo lang('action')?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($subscriptions as $index=>$subs): ?>
                                 <tr>
                                    <td class="order-id text-primary"><?php echo $index+1; ?></td>                                    
                                    <td>
                                       <i class="fas fa-align-left mr-1"></i> <?php echo $subs->{'category_'.$this->lang->lang()};?>
                                       <?php echo $subs->c_sc==2?'<i class="fas fa-angle-right ml-2 mr-1"></i>'.$subs->{'subcategory_'.$this->lang->lang()}:'';?>                                       
                                    </td>
                                    <td class="job-links">                                       
                                       <a href="javascript:void(0);"><i class="fa fa-trash-alt delete" alt="Delete" data-toggle="modal" data-target="#deleteModal<?php echo $subs->id;?>"></i></a>
                                       <!-- Modal -->
                                       <div class="modal fade modal-bx-info" id="deleteModal<?php echo $subs->id;?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?php echo $subs->id;?>" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                <div class="modal-body">
                                                   <p>
                                                      <?php echo lang('confirmDeleteJob').' ' .lang('subscription')?> <br>
                                                      <strong>
                                                         <?php echo $subs->{'category_'.$this->lang->lang()};?>
                                                         <?php echo $subs->c_sc==2?', '.$subs->{'subcategory_'.$this->lang->lang()}:'';?>?
                                                      </strong>                                                      
                                                   </p>
                                                </div>
                                                <div class="modal-footer">
                                                   <a href="<?php echo site_url('profile/deletesubscription/').$subs->id;?>" class="btn btn-danger">Delete</a>
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Modal End -->                                                                              
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     <?php else: ?>
                        <strong> <?php echo lang('noSubscriptions')?> </strong>
                     <?php endif; ?>
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
      getSubcategories($('#category').val());      
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
</script>

<?php $this->load->view('templates/footer');?>