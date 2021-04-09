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
                     <!-- <th style="width: 40px">Label</th> -->
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($users as $index=>$user): ?>
                     <tr>
                        <td><?php echo $page+$index+1;?></td>
                        <td><?php echo $user->fullname;?></td>
                        <td><?php echo $user->email;?></td>
                        <!-- <td><span class="badge bg-danger">55%</span></td> -->
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