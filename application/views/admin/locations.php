<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Locations</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Locations</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <!-- /.card-header -->
         <div class="card-body p-0 table table-responsive">
            <table class="table table-striped table-sm">
               <thead>
                  <tr>
                     <th style="width: 10px">#</th>
                     <th>Location</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($locations as $index=>$location): ?>
                     <tr>
                        <td><?php echo $index+1;?></td>
                        <td>
                           <span><?php echo $location->location;?></span>
                        </td>
                        <td>
                           <div class="d-flex">
                              <a href="<?php echo base_url('admin/editlocation/'.$location->id);?>" class="btn btn-sm btn-info mr-3" data-toggle="tooltip" data-placement="top" title="Edit location">
                                 <i class="fas fa-pen"></i> 
                              </a>
                              <button class="btn btn-sm btn-danger mr-1 data-toggle="tooltip" data-placement="top" title="Delete location"  data-toggle="modal" data-target="#delLocModal<?php echo $location->id;?>">
                                 <i class="fas fa-trash-alt"></i>  
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="delLocModal<?php echo $location->id;?>" tabindex="-1" role="dialog" aria-labelledby="delLocModal<?php echo $location->id;?>" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                       </div>
                                       <div class="modal-body">
                                          Do you really want to delete location: <br>
                                          <strong> <?php echo $location->location;?> </strong>
                                       </div>
                                       <div class="modal-footer">
                                          <a href="<?php echo base_url('admin/deletelocation/'.$location->id);?>" class="btn btn-danger">Delete</a>
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
   </div>
</section>

<?php $this->load->view('admin/templates/footer');?>