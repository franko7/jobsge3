<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Applications</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Applications</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card p-2">
         <div class="card-body p-0 table table-responsive">
            <table class="table table-striped table-sm" id="appsTable">
               <thead>
                  <tr>
                     <th style="width: 10px"></th>
                     <th>Fullname</th>
                     <th>Email</th>
                     <th>Job type</th>
                     <th>Category</th>
                     <th>Subcategory</th>
                     <th>Title</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($jobs as $index=>$job): ?>
                     <tr>
                        <td><?php echo $index+1;?></td>
                        <td>
                           <span class="text-success"><?php echo $job->fullname;?></span>
                              <br>
                           <span class="text-secondary"><?php echo $job->user_fullname;?></span>
                        </td>
                        <td>
                           <span class="text-success"><?php echo $job->email;?></span>
                           <br>
                           <span class="text-secondary"><?php echo $job->user_email;?></span>
                        </td>
                        <td><?php echo $job->job_type_en;?></td>
                        <td><?php echo $job->category_en;?></td>
                        <td><?php echo $job->subcategory_en;?></td>
                        <td>
                           <a href="<?php echo base_url('jobs/job/'.$job->id.'/'.$job->slug);?>" target="_blank">
                              <?php echo strlen($job->shorttext_en)>50?substr($job->shorttext_en, 0, 50).'...':$job->shorttext_en; ?>                        
                           </a>
                        </td>
                        <td>
                           <?php if($job->status):?>
                              <small class="badge badge-success">Active</small>
                           <?php else:?>
                              <small class="badge badge-danger">Inactive</small>
                           <?php endif;?>
                           <?php if($job->submitedrenewal):?>
                              <small class="badge badge-warning">Pending</small>
                           <?php endif;?>
                        </td>
                        <td>
                           <div class="d-flex">
                              <a href="<?php echo base_url('admin/editjob/'.$job->id);?>" class="btn btn-sm btn-info mr-1" data-toggle="tooltip" data-placement="top" title="Edit Application">
                                 <i class="fas fa-pen"></i> 
                              </a>
                              <button class="btn btn-sm btn-danger mr-1 data-toggle="tooltip" data-placement="top" title="Delete Application"  data-toggle="modal" data-target="#delJobModal<?php echo $job->id;?>">
                                 <i class="fas fa-trash-alt"></i>  
                              </button>
                              <?php if($job->submitedrenewal):?>
                                 <button class="btn btn-sm btn-warning mr-1 data-toggle="tooltip" data-placement="top" title="Renew Application"">
                                 <i class="far fa-calendar-plus"></i>  
                                 </button>
                              <?php endif;?>

                              <!-- Modal -->
                              <div class="modal fade" id="delJobModal<?php echo $job->id;?>" tabindex="-1" role="dialog" aria-labelledby="delJobModal<?php echo $job->id;?>" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                       </div>
                                       <div class="modal-body">
                                          Do you really want to delete Application: <br>
                                          <strong> <?php echo $job->shorttext_en;?> </strong>
                                       </div>
                                       <div class="modal-footer">
                                          <a href="<?php echo base_url('admin/deletejob/'.$job->id);?>" class="btn btn-danger">Delete</a>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
      <?php if (isset($links)) echo $links; ?>
   </div>
</section>
<script>
   $(document).ready(function() {
      $('#appsTable').DataTable({ "dom": '<"top"lf>rt<"bottom"ip><"clear">' } ); 
      });
</script>
<?php $this->load->view('admin/templates/footer');?>
