
<!-- Footer -->
   <footer class="site-footer">
      <div class="footer-top">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  <div class="widget">
                     
                     <h5 class="m-b30 text-white"> <?php echo lang('ourSocials')?> </h5>
                     <ul class="list-inline mb-4">
                        <li><a href="javascript:void(0);" class="site-button white facebook circle "><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:void(0);" class="site-button white google-plus circle "><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="javascript:void(0);" class="site-button white linkedin circle "><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:void(0);" class="site-button white instagram circle "><i class="fab fa-instagram"></i></a></li>
                        <li><a href="javascript:void(0);" class="site-button white twitter circle "><i class="fab fa-twitter"></i></a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
                  <div class="widget border-0">
                     <h5 class="mb-3 text-white"> <?php echo lang('usefulLinks')?> </h5>
                     <ul class="list-2 mb-0">
                        <li><a href="<?php echo base_url();?>"> <?php echo lang('home')?> </a></li>
                        <li><a href="<?php echo base_url('about');?>"> <?php echo lang('aboutUs')?> </a></li>
                        <li><a href="<?php echo base_url('contact');?>"> <?php echo lang('contact')?> </a></li>
                     </ul>
                  </div>
               </div>
               <!-- <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                  <div class="widget border-0">
                     <h5 class="m-b30 text-white">Find Jobs</h5>
                     <ul class="list-2 w10 list-line">
                        <li><a href="javascript:void(0);">US Jobs</a></li>
                        <li><a href="javascript:void(0);">Canada Jobs</a></li>
                        <li><a href="javascript:void(0);">UK Jobs</a></li>
                        <li><a href="javascript:void(0);">Emplois en Fnce</a></li>
                        <li><a href="javascript:void(0);">Jobs in Deuts</a></li>
                     </ul>
                  </div>
               </div> -->
            </div>
         </div>
      </div>      
   </footer>
   <!-- Footer END -->
   <!-- scroll top button -->
   <button class="scroltop fa fa-chevron-up" ></button>
</div>

<script src="<?= base_url('assets/js/combining.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/main.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/venobox.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/bootstrap-select.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/summernote-bs4.min.js'); ?>" type="text/javascript"></script>
<script>
   $('.tst').each(function(index, el) {
      $(el).text(localTime($(el).text()));
   });
   $('.tstd').each(function(index, el) {
      $(el).text(localTime($(el).text()).substring(0, 10));
   });

   function localTime(t){
      var date = new Date(t * 1000);
      var year = date.getFullYear();
      var month = "0" + (date.getMonth()+1);
      var day = "0" + date.getDate();
      var hours = "0" + date.getHours();
      var minutes = "0" + date.getMinutes();
      var seconds = "0" + date.getSeconds();
      var formattedTime = month.substr(-2) +'/'+ day.substr(-2) +'/'+ year +' '+ hours.substr(-2) + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
      return formattedTime;
   }
</script>
</body>
</html>