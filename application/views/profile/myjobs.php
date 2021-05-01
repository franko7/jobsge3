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
                  <?php $data['activeitem'] = 1; $this->load->view('profile/profilesidebar', $data);?> 
               </div>
               <div class="col-xl-9 col-lg-8 m-b30">
                  <div class="job-bx table-job-bx clearfix">
                     <div class="job-bx-title clearfix">
                        <h5 class="font-weight-700 pull-left text-uppercase">
                           <?php echo lang('myApplications')?>
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
                     <!-- delete job message -->
                     <?php if ($this->session->flashdata('deleteJobResult')):?>
                        <div class="alert alert-<?php echo $this->session->flashdata('deleteJobResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                           <strong><?php echo $this->session->flashdata('deleteJobResult')['message'];?></strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     <?php endif; ?>
                     <!-- Payment process message -->
                     <?php if ($this->session->flashdata('transProcessResult')):?>
                        <div class="alert alert-<?php echo $this->session->flashdata('transProcessResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                           <strong><?php echo $this->session->flashdata('transProcessResult')['message'];?></strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     <?php endif; ?>
                     <!-- end messages -->
                     <?php if(count($myJobs)): ?>                     
                        <table class="table-responsive">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th><?php echo lang('title')?></th>
                                 <th><?php echo lang('category')?></th>
                                 <th><?php echo lang('expiryDate')?></th>
                                 <th><?php echo lang('status')?></th>
                                 <th><?php echo lang('actions')?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($myJobs as $index=>$myjob): ?>
                                 <tr>
                                    <td class="order-id text-primary"><?php echo $page+$index+1; ?></td>
                                    <td class="job-name">
                                       <a href="<?php echo site_url('jobs/job/'.$myjob->id.'/'.$myjob->slug);?>" target="_blank">
                                          <?php echo strlen($myjob->shorttext_en)>50?substr($myjob->shorttext_en, 0, 50).'...':$myjob->shorttext_en; ?>
                                       </a>
                                    </td>
                                    <td class="amount text-primary"><?php echo $myjob->category_en;?> <?php echo $myjob->subcategory_en;?></td>
                                    <td class="date tst"><?php echo $myjob->expiring_at;?></td>
                                    <td class="jobstatus <?php echo $myjob->jobStatus===1?'active':($myjob->jobStatus===2?'pending':'text-danger');?>">
                                       <?php echo $myjob->jobStatus===1?'active':($myjob->jobStatus===2?'pending':'inactive');?>
                                       <?php if ($myjob->jobStatus===1):?>
                                          <div style="display:flex; flex-direction:column">
                                             <div style="width:80px; height:6px; border-radius:2px; background-color:#6ddaaf; position: relative">
                                                <div style="width:<?php echo intval($myjob->activePassed);?>%; height:100%; background-color: #f84141;border-radius:2px;">   
                                                </div>
                                             </div>
                                          </div>
                                       <?php endif;?>
                                    </td>
                                    <td class="job-links">                                       
                                       <a href="<?php echo base_url('profile/editjob/').$myjob->id;?>" alt="Edit"><i class="fa fa-pencil-alt edit"></i></a>
                                       <a href="javascript:void(0);"><i class="fa fa-trash-alt delete" alt="Delete" data-toggle="modal" data-target="#deleteModal<?php echo $myjob->id;?>"></i></a>
                                       <a href="<?php echo base_url('profile/renewjob/').$myjob->id;?>"><i class="fas fa-dollar-sign renew" alt="Renew"></i></a>                                       
                                       <!-- Modal -->
                                       <div class="modal fade modal-bx-info" id="deleteModal<?php echo $myjob->id;?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?php echo $myjob->id;?>" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                <div class="modal-body">
                                                   <p><?php echo lang('confirmDeleteJob')?> "<?php echo $myjob->shorttext_en;?>"?</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <a href="<?php echo site_url('profile/deletejob/').$myjob->id;?>" class="btn btn-danger">Delete</a>
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
                        <strong> No jobs were found.</strong>
                     <?php endif; ?>
                     <?php if (isset($links)) echo $links; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
         <!-- Browse Jobs END -->
   </div>
</div>
<!-- Content END-->


<?php $this->load->view('templates/footer');?>