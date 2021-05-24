<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Users</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
         </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">

      <div class="card">
         <!-- /.card-header -->
         <div class="card-body p-0">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th style="width: 10px">#</th>
                     <th>Fullname</th>
                     <th>Email</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($users as $index=>$user): ?>
                     <tr>
                        <td><?php echo $page+$index+1;?></td>
                        <td><?php echo $user->fullname;?></td>
                        <td><?php echo $user->email;?></td>
                        <td>
                           <?php echo $user->status?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>';?>
                        </td>
                        <td>
                           <?php if($user->status):?>
                              <a href="<?php echo base_url('admin/deactivateuser/'.$user->id);?>" class="btn btn-danger btn-sm">Make Inactive</button>
                           <?php else:?>
                              <a href="<?php echo base_url('admin/activateuser/'.$user->id);?>" class="btn btn-success btn-sm">Make Active</button>
                           <?php endif;?>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
      <?php if (isset($links)) echo $links; ?>

   </div><!-- /.container-fluid -->
</section>


<?php $this->load->view('admin/templates/footer');?>