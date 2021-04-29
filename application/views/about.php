<?php $data['title'] = lang('aboutUs'); ?>
<?php $this->load->view('templates/header', $data);?>

<div class="page-content bg-white">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename; ?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"><?php echo lang('aboutUs') ?></h1>
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang()); ?>"><?php echo lang('home');?></a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li> <?php echo lang('aboutUs') ?> </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- inner page banner END -->
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full content-inner overlay-white-middle">
         <div class="container">
            <div class="row align-items-center m-b50">
               <div class="col-lg-12 m-b20">
                  <h2 class="m-b5 mb-4"><?php echo $aboutUs->{'title_'.$this->lang->lang()};?></h2>
                  <h3 class="fw4"><?php echo $aboutUs->{'subtitle_'.$this->lang->lang()};?></h3>
                  <p class="m-b15"><?php echo $aboutUs->{'aboutus_'.$this->lang->lang()};?></p>
               </div>               
            </div>
         </div>
      </div>
   <!-- contact area  END -->
   </div>
</div>

<?php $this->load->view('templates/footer'); ?>

