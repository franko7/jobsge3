<?php $this->load->view('templates/header');?>


<div class="page-content bg-white">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Contact Us</h1>
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang());?>">Home</a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li> <?php echo lang('contact')?> </li>
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
                  <h4 class="m-b10">Quick Contact</h4>
                  <p>If you have any questions simply use the following contact details.</p>
                  <ul class="no-margin">
                     <li class="icon-bx-wraper left m-b30">
                        <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="fas fa-map-marker-alt"></i></a> </div>
                        <div class="icon-content">
                           <h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
                           <p>123 West Street, Melbourne Victoria 3000 Australia</p>
                        </div>
                     </li>
                     <li class="icon-bx-wraper left  m-b30">
                        <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="far fa-envelope"></i></a> </div>
                        <div class="icon-content">
                           <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
                           <p>info@example.com</p>
                        </div>
                     </li>
                     <li class="icon-bx-wraper left">
                        <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="fas fa-phone"></i></a> </div>
                        <div class="icon-content">
                           <h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
                           <p>+61 3 8376 6284</p>
                        </div>
                     </li>
                  </ul>
                  <div class="m-t20">
                     <ul class="dez-social-icon dez-social-icon-lg">
                        <li><a href="javascript:void(0);" class="bg-primary"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:void(0);" class="bg-primary"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0);" class="bg-primary"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:void(0);" class="bg-primary"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="javascript:void(0);" class="bg-primary"><i class="fab fa-google-plus-g"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- right part END -->
            <!-- Left part start -->
            <div class="col-lg-8 col-md-7">
               <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
                  <h4>Send Message Us</h4>
                  <div class="dzFormMsg"></div>
                  <form method="post" class="dzForm" action="https://job-board.dexignzone.com/xhtml/script/contact.php">
                  <input type="hidden" value="Contact" name="dzToDo">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <div class="input-group">
                                 <input name="dzName" type="text" required="" class="form-control" placeholder="Your Name">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <div class="input-group"> 
                                 <input name="dzEmail" type="email" class="form-control" required="" placeholder="Your Email Address">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <div class="input-group">
                                 <textarea name="dzMessage" rows="4" class="form-control" required="" placeholder="Your Message..."></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="recaptcha-bx">
                              <div class="input-group">
                                 <div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                 <input class="form-control d-none" style="display:none;" data-recaptcha="true" required="" data-error="Please complete the Captcha">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                              <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span> </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-12 col-md-12 d-lg-flex m-b30">
               <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15058.589362154346!2d69.237869691562!3d34.565949602311285!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ska!2s!4v1617985142631!5m2!1ska!2s" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:350px;" allowfullscreen=""></iframe>
                  
            </div>
         </div>
      </div>
   </div>
   <!-- contact area  END -->
</div>


<?php $this->load->view('templates/footer');?>