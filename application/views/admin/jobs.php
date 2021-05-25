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
         <div class="card-header">
            <!-- Alerts -->
            <?php if ($this->session->flashdata('editJobResult')):?>
               <div class="alert alert-<?php echo $this->session->flashdata('editJobResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                  <strong><?php echo $this->session->flashdata('editJobResult')['message'];?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif; ?> 
            <?php if ($this->session->flashdata('deleteJobResult')):?>
               <div class="alert alert-<?php echo $this->session->flashdata('deleteJobResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                  <strong><?php echo $this->session->flashdata('deleteJobResult')['message'];?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif; ?> 

            <form method="get" action="<?php echo base_url('admin/jobs?'); ?>">
               <div class="form-row">                 
                  <div class="form-group col-md-4">
                     <input type="text" class="form-control" id="keyword" name="keyword" placeholder="keyword" value="<?php echo isset($keyword)?$keyword:'';?>">
                  </div>
                  <div class="form-group col-md-2">
                     <select id="jobtype" name="jobtype" class="form-control">
                        <option value="0">-- All job types --</option>
                        <?php foreach($jobTypes as $jt):?>
                           <option value="<?php echo $jt->id;?>" <?php echo isset($jobtype)&&$jobtype==$jt->id?'selected':'';?>>
                              <?php echo $jt->job_type_en;?>
                           </option>    
                        <?php endforeach;?>                 
                     </select>
                  </div>
                  <div class="form-group col-md-2">
                     <select id="category" name="category" class="form-control">
                        <option value="0">-- All categories --</option>
                        <?php foreach($categories as $cat):?>                        
                           <option value="<?php echo $cat->id;?>" <?php echo isset($category)&&$category==$cat->id?'selected':'';?>>
                              <?php echo $cat->category_en;?>
                           </option>
                        <?php endforeach;?>
                     </select>
                  </div>
                  <div class="form-group col-md-2">
                     <select id="status" name="status" class="form-control">
                        <option value="0" <?php echo isset($status)&&$status==0?'selected':'';?>>-- All statuses --</option>
                        <option value="1" <?php echo isset($status)&&$status==1?'selected':'';?>>Inactive</option>
                        <option value="2" <?php echo isset($status)&&$status==2?'selected':'';?>>Active</option>
                     </select>
                  </div>
                  
                  <div class="form-group col-md-2">
                     <button class="btn btn-primary btn-block"><i class="fas fa-search mr-2"></i> Search</button>
                  </div>
               </div>
            </form>
         </div>
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
                        <td><?php echo $page+$index+1;?></td>
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
                           <?php if($job->status && $job->expiring_at>time()):?>
                              <small class="badge badge-success">Active</small>
                           <?php else:?>
                              <small class="badge badge-danger">Inactive</small>
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
                              <!-- <?php if($job->submitedrenewal):?>
                                 <button class="btn btn-sm btn-warning mr-1 data-toggle="tooltip" data-placement="top" title="Renew Application"">
                                 <i class="far fa-calendar-plus"></i>  
                                 </button>
                              <?php endif;?> -->

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

<?php $this->load->view('admin/templates/footer');?>
