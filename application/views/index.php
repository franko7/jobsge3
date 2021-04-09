<?php $this->load->view('templates/header');?>

<div class="page-content">
   <!-- Section Banner -->
   <div class="dez-bnr-inr dez-bnr-inr-md position-relative" style="background-image:url(<?php echo $bgPath.$images[0]->filename;?>);background-position: center center">
      <div class="container z-index5">
         <div class="dez-bnr-inr-entry align-m">
            <div class="find-job-bx">
               <!-- <a href="error-404.html" class="site-button button-sm">Find Jobs, Employment & Career Opportunities</a> -->
               <h2><?php echo lang('searchMoreThen')?><br/> <span class="text-sitecolor">50,000</span> <?php echo lang('openListings')?>.</h2>               
               <form method="get" action="<?php echo site_url($this->lang->lang().'/jobs/search');?>" class="dezPlaceAni">
                  <div class="row">
                     <div class="col-lg-5 ">
                        <div class="form-group">
                           <label><?php echo lang('JobTitleKeywordPhrase')?></label>
                           <div class="input-group">
                              <input type="text" name="keyword" class="form-control" placeholder="">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="fa fa-search"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5 ">
                        <div class="form-group">
                           <select name="location" id="location" data-live-search="true" class="selectpicker">
                              <option value="0"><?php echo lang('selectLocation')?></option>
                              <?php foreach($locations as $location): ?>
                                 <option value="<?php echo $location->id;?>"> <?php echo $location->location;?> </option>
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
   </div>
   <!-- Section Banner END -->
   <div class="section-full bg-white p-b50">
      <div class="container pt-5">
         <!-- <div class="job-bx-title clearfix">
            <h5 class="font-weight-700 pull-left text-uppercase">2269 Applications Found</h5>
         </div> -->
         <ul class="post-job-bx browse-job-grid row">
            <?php foreach($categoriesCount as $cc): ?>
               <li class="col-lg-4 col-md-6 d-flex">                     
                  <div class="category-image">
                     <img src="<?php echo $iconPath.$categories[$cc['category']-1]->filename;?>" alt="<?php echo $categories[$cc['category']-1]->category_en;?>">
                  </div>
                  <div class="cat-subcat">
                     <h5 class="d-inline">
                        <a href="<?php echo site_url('jobs/category/'.$categories[$cc['category']-1]->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$categories[$cc['category']-1]->category_en))); ?>">
                           <?php echo $categories[$cc['category']-1]->{'category_'.$this->lang->lang()};?>                        
                        </a>
                     </h5>
                     <small class="text-muted"><?php echo ' - '. $cc['num_jobs']; ?></small>                        
                     <ul>
                        <?php foreach($subcategoriesCount as $scc): ?>
                           <?php if($scc['category'] == $cc['category']): ?>
                              <li>
                                 <a href="<?php echo  site_url('jobs/subcategory/'.$subcategories[$scc['subcategory']-1]->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$subcategories[$scc['subcategory']-1]->subcategory_en))); ?>">
                                    <?php echo $subcategories[$scc['subcategory']-1]->{'subcategory_'.$this->lang->lang()}; ?>
                                 </a>
                                 <small class="text-muted"><?php echo ' - '. $scc['num_jobs']; ?></small>  
                              </li>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     </ul>
                  </div>
               </li>
            <?php endforeach; ?>                      
         </ul>
      </div>
   </div>
</div>
<!-- Content END-->

<?php $this->load->view('templates/footer');?>