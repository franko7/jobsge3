<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Manage Categories</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
               <div class="row">
                  <div class="table table-responsive">
                     <table class="table table-condensed category-table" style="border-collapse:collapse;">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Subcategories</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Categories -->
                           <?php foreach($categories as $i=>$cc): ?> 
                              <tr data-toggle="collapse" data-target="#categ<?php echo $i;?>" class="accordion-toggle category-row">                                 
                                 <td>
                                    <?php echo $i+1;?>
                                 </td>
                                 <td>
                                    <?php echo $cc['category_en']; ?>
                                 </td>
                                 <td>
                                    <?php echo count($cc['subcategories']); ?>
                                 </td>
                                 <td>
                                    <a href="<?php echo base_url('admin/editcategory/'.$cc['id']);?>" class="btn btn-sm btn-info mr-1" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                       <i class="fas fa-pen"></i> 
                                    </a>
                                    <button class="btn btn-sm btn-danger mr-1 data-toggle="tooltip" data-placement="top" title="Delete Category"  data-toggle="modal" data-target="#delCatModal<?php echo $cc['id'];?>">
                                       <i class="fas fa-trash-alt"></i>  
                                    </button>
                                    <a href="<?php echo base_url('admin/addsubcategory/'.$cc['id']);?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Add Subcategory">
                                       <i class="fas fa-plus-square"></i> 
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delCatModal<?php echo $cc['id'];?>" tabindex="-1" role="dialog" aria-labelledby="delCatModal<?php echo $cc['id'];?>" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                             </div>
                                             <div class="modal-body font-weight-normal">
                                                Do you really want to delete Category: <br>
                                                <strong> <?php echo $cc['category_en'];?> </strong>
                                             </div>
                                             <div class="modal-footer">
                                                <a href="<?php echo base_url('admin/deletecategory/'.$cc['id']);?>" class="btn btn-danger">Delete</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>                                 
                              </tr>
                              <!-- Subategories --> 
                              <?php $k=0; foreach($cc['subcategories'] as $scc): ?>                              
                                 <tr class="subcategory-row">
                                    <td class="hiddenRow">
                                       <div class="accordian-body collapse enum" id="categ<?php echo $i;?>"> 
                                          <?php $k++; echo $k;?> 
                                       </div>
                                    </td>
                                    <td class="hiddenRow">
                                       <div class="accordian-body collapse" id="categ<?php echo $i;?>">
                                          <?php echo $scc['subcategory_en']; ?>
                                       </div>
                                    </td>
                                    <td class="hiddenRow">
                                       <div class="accordian-body collapse" id="categ<?php echo $i;?>">
                                          
                                       </div>
                                    </td>
                                    <td class="hiddenRow">
                                       <div class="accordian-body collapse" id="categ<?php echo $i;?>">
                                          <a href="<?php echo base_url('admin/editsubcategory/'.$scc['id']);?>" class="btn btn-sm btn-info mr-1" data-toggle="tooltip" data-placement="top" title="Edit Subcategory">
                                             <i class="fas fa-pen"></i> 
                                          </a>
                                          <button class="btn btn-sm btn-danger mr-1 data-toggle="tooltip" data-placement="top" title="Delete Subcategory"  data-toggle="modal" data-target="#delSubcatModal<?php echo $scc['id'];?>">
                                             <i class="fas fa-trash-alt"></i>  
                                          </button>
                                          <!-- Modal -->
                                          <div class="modal fade" id="delSubcatModal<?php echo $scc['id'];?>" tabindex="-1" role="dialog" aria-labelledby="delSubcatModal<?php echo $scc['id'];?>" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                   </button>
                                                   </div>
                                                   <div class="modal-body font-weight-normal">
                                                      Do you really want to delete Subcategory: <br>
                                                      <strong> <?php echo $scc['subcategory_en'];?> </strong>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <a href="<?php echo base_url('admin/deletesubcategory/'.$scc['id']);?>" class="btn btn-danger">Delete</a>
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                 </tr>                                 
                              <?php endforeach; ?>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
                  <div>
                     <a href="<?php echo base_url('admin/addcategory');?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add category </a>
                  </div>
               </div>
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