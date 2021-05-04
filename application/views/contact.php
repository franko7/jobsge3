<?php $data['title'] = lang('contact'); ?>
<?php $this->load->view('templates/header', $data);?>


<div class="page-content bg-white">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"><?php echo lang('contact');?></h1>
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang());?>"><?php echo lang('home')?></a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li><?php echo lang('contact');?></li>
               </ul>
            </div>

         </div>
      </div>
   </div>
   <!-- inner page banner END -->
   <!-- contact area -->
   <div class="section-full content-inner bg-white contact-style-1">
      <div class="container">
          <div class="row">
            <!-- right part start -->
            <div class="col-lg-4 col-md-5 d-lg-flex d-md-flex">
               <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
                  <h4 class="m-b10"><?php echo lang('quickContact');?></h4>
                  <p><?php echo lang('useContact');?></p>
                  <ul class="no-margin">

                     <?php if ($contacts->{'addr_'.$this->lang->lang()}):?>
                        <li class="icon-bx-wraper left m-b30">
                           <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="fas fa-map-marker-alt"></i></a> </div>
                           <div class="icon-content">
                              <h6 class="text-uppercase m-tb0 dez-tilte"><?php echo lang('address');?>:</h6>
                              <p><?php echo $contacts->{'addr_'.$this->lang->lang()};?></p>
                           </div>
                        </li>
                     <?php endif;?>

                     <?php if ($contacts->email):?>
                        <li class="icon-bx-wraper left  m-b30">
                           <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="far fa-envelope"></i></a> </div>
                           <div class="icon-content">
                              <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
                              <p><?php echo $contacts->email;?></p>
                           </div>
                        </li>
                     <?php endif;?>

                  <?php if ($contacts->phone):?>
                     <li class="icon-bx-wraper left">
                        <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="fas fa-phone"></i></a> </div>
                        <div class="icon-content">
                           <h6 class="text-uppercase m-tb0 dez-tilte"><?php echo lang('phone');?></h6>
                           <p><?php echo $contacts->phone;?></p>
                        </div>
                     </li>
                  <?php endif;?>

                  </ul>
                  <div class="m-t20">
                     <ul class="dez-social-icon dez-social-icon-lg">

                        <?php if ($socials->facebook):?>
                           <li><a href="<?php echo $socials->facebook;?>" class="bg-primary" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <?php endif;?>
                        <?php if ($socials->google):?>
                           <li><a href="<?php echo $socials->google;?>" class="bg-primary" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                        <?php endif;?>
                        <?php if ($socials->linkedin):?>
                           <li><a href="<?php echo $socials->linkedin;?>" class="bg-primary" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <?php endif;?>
                        <?php if ($socials->instagram):?>
                           <li><a href="<?php echo $socials->instagram;?>" class="bg-primary" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <?php endif;?>
                        <?php if ($socials->twitter):?>
                           <li><a href="<?php echo $socials->twitter;?>" class="bg-primary" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <?php endif;?> 
                     </ul>
                  </div>
               </div>
            </div>
            <!-- right part END -->
            <!-- Left part start -->
            <div class="col-lg-8 col-md-7">
               <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
                  <h4><?php echo lang('sendMsgUs');?></h4>
                  <div class="dzFormMsg"></div>
                  <?php echo form_open('contact/index', array("class"=>"dzForm")); ?>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <div class="input-group">
                                 <input name="guestName" id="guestName" type="text" required="" class="form-control" placeholder="<?php echo lang('yourName');?>">
                              </div>
                              <small style="color:red"><?php echo form_error('guestName'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <div class="input-group"> 
                                 <input name="guestEmail" id="guestEmail" type="email" class="form-control" required="" placeholder="<?php echo lang('yourEmail');?>">
                              </div>
                              <small style="color:red"><?php echo form_error('guestEmail'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <div class="input-group">
                                 <textarea name="guestMessage" id="guestMessage" rows="7" class="form-control" required="" placeholder="<?php echo lang('yourMessage');?>"></textarea>
                              </div>
                              <small style="color:red"><?php echo form_error('guestMessage'); ?></small>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <button type="submit" class="site-button "> <span><?php echo lang('submit');?></span> </button>
                        </div>
                     </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
            <?php if ($contacts->location):?>
               <div class="col-lg-12 col-md-12 d-lg-flex m-b30">
                  <iframe src="<?php echo $contacts->location;?>" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:350px;" allowfullscreen=""></iframe>
               </div>
            <?php endif;?>
         </div>
      </div>
   </div>
   <!-- contact area  END -->
</div>


<?php $this->load->view('templates/footer');?>