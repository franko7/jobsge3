<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content bg-white">
   <!-- inner page banner -->
   <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">
      <div class="container">
         <div class="dez-bnr-inr-entry">
            <h1 class="text-white"><?php echo lang('browseJobsList')?></h1>
            <div class="breadcrumb-row">
               <ul class="list-inline">
                  <li><a href="<?php echo site_url($this->lang->lang());?>">Home</a></li>
                  <li><i class="fas fa-angle-right"></i></li>
                  <li><?php echo lang('browseJobsList')?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- Filters Search -->
   <div class="section-full browse-job-find">
      <div class="container">
         <div class="find-job-bx">
         <form method="get" action="<?php echo site_url('jobs/search');?>" class="dezPlaceAni">
               <div class="row">
                  <div class="col-lg-5 ">
                     <div class="form-group" id="searchwrapper">
                        <label><?php echo lang('JobTitleKeywordPhrase')?></label>
                        <div class="input-group">
                           <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo isset($keyword)?$keyword:'';?>">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fa fa-search"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5 ">
                     <div class="form-group">
                        <select name="location" id="location" data-live-search="true">
                           <option value="0"><?php echo lang('selectLocation')?></option>
                           <?php foreach($locations as $loc): ?>
                              <option value="<?php echo $loc->id;?>" <?php echo isset($location) && $loc->id==$location?'selected':'';?> >
                                 <?php echo $loc->location;?>
                              </option>
                           <?php endforeach;?>
                        </select>                        
                     </div>
                  </div>
                  <div class="col-lg-2 mb-xs-2 mb-3">
                     <button type="submit" href="error-404.html" class="site-button btn-block"><?php echo lang('search')?></button>
                  </div>
               </div>               
            </form>
         </div>
      </div>
   </div>
   <!-- Filters Search END -->
   <div class="content-block">
      <!-- Browse Jobs -->
      <div class="section-full browse-job p-b50">
         <div class="container">
            <div class="row">
               <div class="col-xl-9 col-lg-8 col-md-7">
                  <div class="job-bx-title clearfix">
                     <h5 class="font-weight-700 pull-left text-uppercase"> 
                        <?php echo lang('found')?> <?php echo $numSearchResult;?> <?php echo lang('applications')?>
                     </h5>
                  </div>
                  <ul class="post-job-bx">
                     <?php if(!$jobs):?> <?php echo lang('noJobsWereFound')?> <?php endif;?>
                     <?php foreach($jobs as $job): ?>
                     <li>
                        <div class="post-bx" style="border-left: 5px solid <?php echo $job->job_type==3?'#FFD700':($job->job_type==2?'#C0C0C0':'#e1e7ff');?>">
                           <div class="d-flex m-b30">
                              <div class="job-post-company">
                                 <a href="javascript:void(0);">
                                    <span>
                                       <img alt="" src="<?php echo base_url($uploadFolder.$job->imgfilename1);?>" alt="<?php echo $job->shorttext_en;?>"/>
                                    </span>
                                 </a>
                              </div>
                              <div class="job-post-info">
                                 <h4>
                                    <a href="<?php echo site_url('jobs/job/'.$job->id.'/'.$job->slug);?>">
                                       <?php if($job->{'shorttext_'.$this->lang->lang()}) : ?>
                                          <?php echo strlen($job->{'shorttext_'.$this->lang->lang()})>80?substr($job->{'shorttext_'.$this->lang->lang()},0,80).'...':$job->{'shorttext_'.$this->lang->lang()};?>
                                       <?php else: ?>
                                          <?php echo strlen($job->shorttext_en)>80?substr($job->shorttext_en,0,80).'...':$job->shorttext_en;?>
                                       <?php endif;?>
                                    </a>
                                 </h4>
                                 <ul class="mt-2">
                                    <li class="mr-2">
                                       <a href="<?php echo site_url('jobs/category/'.$job->category_id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$job->category_en)));?>">
                                          <i class="fas fa-align-left"></i>
                                          <?php echo $job->{'category_'.$this->lang->lang()};?>
                                       </a>
                                    </li>
                                    <li class="mr-2">
                                       <a href="<?php echo site_url('jobs/subcategory/'.$job->subcategory_id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $job->subcategory_en)));?>">
                                          <i class="fas fa-angle-right "></i> 
                                          <?php echo $job->{'subcategory_'.$this->lang->lang()};?>
                                       </a>
                                    </li>
                                    <li class="mr-2">
                                       <a href="<?php echo site_url('jobs/location/'.$job->location_id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$job->location)));?>"> 
                                          <i class="fa fa-map-marker"></i>
                                          <?php echo $job->location;?> 
                                       </a>
                                    </li>                                    
                                    <li>
                                       <i class="far fa-calendar-alt"></i>
                                       <span class="tstd"><?php echo $job->created_at;?></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="d-flex">
                              <div class="mr-auto">
                                 <span class="rating pl-1"><?php echo $job->rateCount?$job->averageRate:0;?></span>
                              </div>
                              <div class="job-time salary-bx">
                                 <a href="<?php echo site_url('jobs/job/'.$job->id.'/'.$job->slug);?>"><span><?php echo lang('details')?></span></a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <?php endforeach; ?>
                  </ul>
                  <?php if (isset($links)) echo $links; ?>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-5">
                  <div class="sticky-top">
                     <img src="<?php echo base_url('assets/uploads/covers/banner.png');?>">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Browse Jobs END -->
   </div>
</div>
<!-- Content END-->
<script>
   
   $('.rating').each(function(index, el) {
      var rating = $(el).text();
      $(el).text('');
      $(el).html(getStars(rating));
   });

   function getStars(rating) {
      rating = Math.round(rating * 2) / 2;
      let output = [];
      for (var i = rating; i >= 1; i--)
         output.push('<i class="fas fa-star" aria-hidden="true" style="color:#a68500;"></i>');
      if (i == .5) output.push('<i class="fas fa-star-half-alt" aria-hidden="true" style="color:#a68500;"></i>');
      for (let i = (5 - rating); i >= 1; i--)
         output.push('<i class="far fa-star" aria-hidden="true" style="color:#a68500;"></i>');
      return output.join('');
   }
      
   if($("#keyword").val().length>0){
      $("#searchwrapper").addClass("focused");
      $("#keyword").addClass("filled");
   };
       
</script>

<?php $this->load->view('templates/footer');?>