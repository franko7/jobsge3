<?php $this->load->view('admin/templates/header');?>

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1 class="m-0">Job types</h1>
         </div>
         <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Job types</li>
         </ol>
         </div>
      </div>
   </div>
</div>

<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php if ($this->session->flashdata('jobTypesResult')):?>
            <div class="alert alert-<?php echo $this->session->flashdata('jobTypesResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->flashdata('jobTypesResult')['message'];?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <div class="card card-danger">
            <div class="card-body">
               <?php echo form_open('admin/jobtypes');?>
               
                  <div class="form-group row mt-4">
                     <label class="col-sm-4 col-form-label">Standart Applications</label>
                     <div class="col-sm-4">
                        <label>Initial Period (days)</label>
                        <input type="text" class="form-control" name="stInitPeriod" placeholder="Facebook link" value="<?php echo $jobTypes[0]->initial_period/86400;?>">
                        <small style="color:red"><?php echo form_error('facebook'); ?></small>
                     </div>
                     <div class="col-sm-4">
                        <label>Initial Price</label>
                        <input type="text" class="form-control" name="stInitPrice" placeholder="Facebook link" value="<?php echo $jobTypes[0]->initial_price;?>">
                        <small style="color:red"><?php echo form_error('facebook'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-4 col-form-label"></label>
                     <div class="col-sm-4">
                        <label>Renewal Period (days)</label>
                        <input type="text" class="form-control" name="stRenPeriod" value="<?php echo $jobTypes[0]->renewal_period/86400;?>">
                        <small style="color:red"><?php echo form_error('stRenPeriod'); ?></small>
                     </div>
                     <div class="col-sm-4">
                        <label>Renewal Price</label>
                        <input type="text" class="form-control" name="stRenPrice" value="<?php echo $jobTypes[0]->renewal_price;?>">
                        <small style="color:red"><?php echo form_error('stRenPrice'); ?></small>
                     </div>
                  </div>

                  <div class="form-group row mt-4">
                     <label class="col-sm-4 col-form-label">Silver Applications</label>
                     <div class="col-sm-4">
                        <label>Initial Period (days)</label>
                        <input type="text" class="form-control" name="silInitPeriod" value="<?php echo $jobTypes[1]->initial_period/86400;?>">
                        <small style="color:red"><?php echo form_error('silInitPeriod'); ?></small>
                     </div>
                     <div class="col-sm-4">
                        <label>Initial Price</label>
                        <input type="text" class="form-control" name="silInitPrice" value="<?php echo $jobTypes[1]->initial_price;?>">
                        <small style="color:red"><?php echo form_error('silInitPrice'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-4 col-form-label"></label>
                     <div class="col-sm-4">
                        <label>Renewal Period (days)</label>
                        <input type="text" class="form-control" name="silRenPeriod" value="<?php echo $jobTypes[1]->renewal_period/86400;?>">
                        <small style="color:red"><?php echo form_error('silRenPeriod'); ?></small>
                     </div>
                     <div class="col-sm-4">
                        <label>Renewal Price</label>
                        <input type="text" class="form-control" name="silRenPrice" value="<?php echo $jobTypes[1]->renewal_price;?>">
                        <small style="color:red"><?php echo form_error('silRenPrice'); ?></small>
                     </div>
                  </div>

                  <div class="form-group row mt-4">
                     <label class="col-sm-4 col-form-label">Gold Applications</label>
                     <div class="col-sm-4">
                        <label>Initial Period (days)</label>
                        <input type="text" class="form-control" name="golInitPeriod" value="<?php echo $jobTypes[2]->initial_period/86400;?>">
                        <small style="color:red"><?php echo form_error('golInitPeriod'); ?></small>
                     </div>
                     <div class="col-sm-4">
                        <label>Initial Price</label>
                        <input type="text" class="form-control" name="golInitPrice" value="<?php echo $jobTypes[2]->initial_price;?>">
                        <small style="color:red"><?php echo form_error('golInitPrice'); ?></small>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-4 col-form-label"></label>
                     <div class="col-sm-4">
                        <label>Renewal Period (days)</label>
                        <input type="text" class="form-control" name="golRenPeriod" value="<?php echo $jobTypes[2]->renewal_period/86400;?>">
                        <small style="color:red"><?php echo form_error('golRenPeriod'); ?></small>
                     </div>
                     <div class="col-sm-4">
                        <label>Renewal Price</label>
                        <input type="text" class="form-control" name="golRenPrice" value="<?php echo $jobTypes[2]->renewal_price;?>">
                        <small style="color:red"><?php echo form_error('golRenPrice'); ?></small>
                     </div>
                  </div>

                  <div class="form-group row">
                     <button type="submit" class="btn btn-success mt-3"> Save </button>
                  </div>
               <?php echo form_close();?>
            </div>            
         </div>
      </div>
   </div>
</section>

<?php $this->load->view('admin/templates/footer');?>
