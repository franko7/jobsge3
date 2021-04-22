<?php $this->load->view('templates/header');?>

<div class="page-content bg-white">
   <!-- Banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $bgPath . $images[1]->filename;?>);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"> <?php echo lang('jobDetails')?> </h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang());?>">Home</a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li> <?php echo lang('jobDetails')?> </li>
               </ul>
            </div>      
         </div>
      </div>
   </div>

   <!-- Content -->
   <div class="content-block">
      <div class="section-full content-inner-1">
         <div class="container">
            <div class="row">
               <div class="col-lg-4">
                  <div class="sticky-top">
                     <div class="row">
                        <div class="col-lg-12 col-md-6 mb-4">
                           <div class="m-b30">
                              <img src="<?php echo base_url($uploadFolder).$jobDetails->imgfilename1;?>" alt="<?php echo $jobDetails->shorttext_en;?>">
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                           <img src="<?php echo base_url($uploadFolder.'covers/banner.png');?>">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 mb-5">
                  <div class="job-info-box">
                     <h3 class="m-t0 m-b10 font-weight-700 title-head">                        
                        <?php echo $jobDetails->{'shorttext_'.$this->lang->lang()} ? $jobDetails->{'shorttext_'.$this->lang->lang()} : $jobDetails->shorttext_en;?>                        
                     </h3>
                     <ul class="job-info">
                        <li>
                           <strong><i class="fas fa-align-left"></i></strong> 
                           <?php echo $jobDetails->{'category_'.$this->lang->lang()};?>
                           <i class="fas fa-angle-right"></i>
                           <?php echo $jobDetails->{'subcategory_'.$this->lang->lang()};?>
                        </li>
                        <li>
                           <strong><i class="fas fa-map-marker-alt"></i></strong>                              
                           <?php echo $jobDetails->location;?>
                        </li>
                        <li>
                           <strong><i class="far fa-calendar-alt"></i></strong>                              
                           <span class="tstd"><?php echo $jobDetails->created_at;?></span>
                        </li>
                     </ul>
                     <!-- Social share -->
                     <div class="p-t20 mb-5 social-share-links">                        
                        <a href="https://www.facebook.com/sharer.php?u=<?php echo site_url('jobs/job/'.$jobDetails->id.'/'.$jobDetails->slug);?>" target="_blank" title="Share on Facebook">
                           <div class="facebook">
                              <i class="fab fa-facebook-f"></i>
                           </div>   
                        </a>
                        <a href="https://twitter.com/share?url=<?php echo site_url('jobs/job/'.$jobDetails->id.'/'.$jobDetails->slug);?>&text=<?php echo $jobDetails->shorttext_en;?>" target="_blank" title="Share on Twitter">
                           <div class="twitter">
                              <i class="fab fa-twitter"></i>
                           </div>   
                        </a>                        
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo site_url('jobs/job/'.$jobDetails->id.'/'.$jobDetails->slug);?>&title=<?php echo $jobDetails->shorttext_en;?>" target="_blank" title="Share on LinkedIn">
                           <div class="linkedin">
                              <i class="fab fa-linkedin-in"></i>
                           </div>   
                        </a>
                        <a href="https://api.whatsapp.com/send?text=<?php echo $jobDetails->shorttext_en;?> <?php echo site_url('jobs/job/'.$jobDetails->id.'/'.$jobDetails->slug);?>" target="_blank" title="Share on Whatsapp">
                           <div class="whatsapp">
                              <i class="fab fa-whatsapp"></i>
                           </div>   
                        </a>
                     </div>
                     <!-- Job details -->
                     <p class="p-t20 mb-5">
                        <?php echo $jobDetails->{'largetext_'.$this->lang->lang()} ? $jobDetails->{'largetext_'.$this->lang->lang()} : $jobDetails->largetext_en;?>
                     </p>
                     <h5 class="font-weight-600"> <?php echo lang('appDetails')?> </h5>
                     <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>
                     <div class="table-responsive job-details mb-5">
                        <table class="table mb-0">                           
                           <tbody>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-user"></i> <?php echo lang('fullname')?> </strong></td>
                                 <td><?php echo $jobDetails->fullname;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-tools"></i> <?php echo lang('jobType')?> </strong></td>
                                 <td><?php echo $jobDetails->{'job_type_'.$this->lang->lang()};?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-map-marked-alt"></i> <?php echo lang('address')?> </strong></td>
                                 <td><?php echo $jobDetails->address;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="far fa-envelope"></i> Email </strong></td>
                                 <td><?php echo $jobDetails->email;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-phone"></i> <?php echo lang('phone')?> </strong></td>
                                 <td><?php echo $jobDetails->phone;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-globe"></i> <?php echo lang('website')?> </strong></td>
                                 <td><?php echo $jobDetails->website;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-eye"></i> <?php echo lang('views')?> </strong></td>
                                 <td><?php echo $jobDetails->viewCount;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong><i class="fas fa-star"></i> <?php echo lang('rating')?> </strong></td>
                                 <td>                                    
                                    <span class="rating <?php echo $jobDetails->rateCount?'':'displaynone';?>" id="rating"><?php echo $jobDetails->averageRate;?></span>
                                    <span class="rating-details text-info ml-2 <?php echo $jobDetails->rateCount?'':'displaynone';?>">
                                       <?php echo lang('average')?>
                                       <span id="average"><?php echo number_format($jobDetails->averageRate, 1, '.', ',');?></span>
                                       <?php echo lang('pointsOf')?>
                                       <span id="numVotes"><?php echo $jobDetails->rateCount;?></span>
                                       <?php echo lang('votes')?>.
                                    </span>                                    
                                    <span class="norating text-danger <?php echo $jobDetails->rateCount?'displaynone':'';?>"> <?php echo lang('noRatingYet')?>. </span>
                                 </td>
                              </tr>        
                           </tbody>
                        </table>
                     </div>                     
                     <!-- Rating -->
                     <h5 class="font-weight-600 mt-5"> <?php echo lang('rating')?> </h5>
                     <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>
                     <div class="container d-flex p-0">
                        <?php if($usersRate): ?>
                           <div class="rating-label"><span class="mr-2"><?php echo lang('yourRate')?>: </span> <span id="userrate"><?php echo $usersRate;?></span></div>
                        <?php else: ?>
                           <?php echo form_open(base_url(), array('class'=>'d-flex')); ?>
                              <div class="rating-label"><span> <?php echo lang('rateUser')?> </span></div>
                              <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">                              
                                 <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                 <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                 <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                 <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                 <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                              </div>
                           <?php echo form_close(); ?>
                        <?php endif; ?>
                     </div>
                     <!-- Lightbox -->
                     <h5 class="font-weight-600 mt-5"> <?php echo lang('imgGallery')?> </h5>
                     <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                     <div class="parent-container">
                        <?php for ($i=1; $i<=5; $i++):?>
                           <?php if($jobDetails->{'imgfilename'.$i}) :?>
                              <a class="venobox" data-gall="myGallery" href="<?php echo base_url($uploadFolder.$jobDetails->{'imgfilename'.$i});?>" >
                                 <img src="<?php echo base_url($uploadFolder.$jobDetails->{'imgfilename'.$i});?>" class="img-thumbnail"/>
                              </a>
                           <?php endif; ?>                           
                        <?php endfor;?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Job Detail -->
   </div>
</div>



<script>
   $(function() {
      $('.rating').each(function(index, el) {
         var rating = $(el).text();
         $(el).html(getStars(rating));
      });

      function getStars(rating) {
         rating = Math.round(rating * 2) / 2;
         let output = [];
         for (var i = rating; i >= 1; i--)
            output.push('<i class="fas fa-star" aria-hidden="true" style="color:#ecbe03;"></i>');
         if (i == .5) output.push('<i class="fas fa-star-half-alt" aria-hidden="true" style="color:#ecbe03;"></i>');
         for (let i = (5 - rating); i >= 1; i--)
            output.push('<i class="far fa-star" aria-hidden="true" style="color:#ecbe03;"></i>');
         return output.join('');
      }

      function getFullStars(rating) {       
         let output = [];
         for (var i = rating; i >= 1; i--)
            output.push('<i class="fas fa-star mr-1" aria-hidden="true" style="color:#ecbe03;"></i>');
         return output.join('');
      }

      $('.starrating label').click(function(index, el){
         var stars = parseInt(index.target.title);
         $.ajax({
            url:'<?=site_url("jobs/trackRating")?>',
            method: 'post',
            data: {csrf_token: $('input[name=csrf_token]').val(), star: stars, jobId: <?php echo $jobDetails->id;?>},
            dataType: 'json',
            success: function(response){
               var averageRate =  <?php echo $jobDetails->averageRate?$jobDetails->averageRate:0;?> ;
               var numRates = <?php echo $jobDetails->rateCount?$jobDetails->rateCount:0;?>;
               var newRate = (averageRate * numRates + stars) / (numRates + 1);
               $('#rating').html(getStars(newRate));
               $('#average').text(newRate.toFixed(1));
               $('#numVotes').text(numRates + 1);
               $('.rating, .rating-details').removeClass('displaynone');
               $('.norating').addClass('displaynone');
            }
         });
      });

      $('#userrate').each(function(index, el) {
         var stars = $(el).text();
         $(el).html(getFullStars(stars));
      });

      $('.venobox').venobox();

   });
</script>

<?php $this->load->view('templates/footer');?>