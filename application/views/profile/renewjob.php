<?php $this->load->view('templates/header');?>
<!-- Content -->
<div class="page-content bg-white">
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full bg-white p-t50 p-b20">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 m-b30">               
                  <?php $data['activeitem'] = 99; $this->load->view('profile/profilesidebar', $data);?> 
               </div>
               <div class="col-xl-9 col-lg-8 m-b30">
                  <div class="job-bx submit-job">
                     <div class="job-bx-title clearfix">
                        <h5 class="font-weight-700 pull-left text-uppercase">Renew Application</h5>
                     </div>                     
                     <?php echo form_open('profile/renewjob/'.$currentJob->id); ?>
                        <div class="row m-b30">
                           <!-- payment -->
                           <div class="col-lg-12" id="payment">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="cardpay-tab" data-toggle="tab" href="#cardpay" role="tab" aria-controls="cardpay" aria-selected="true">Enter card details</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link " id="paypalpay-tab" data-toggle="tab" href="#paypalpay" role="tab" aria-controls="paypalpay" aria-selected="false">Pay with PayPal</a>
                                 </li>
                              </ul>
                              <div class="tab-content" id="myTabContent"> 
                                 <div class="tab-pane fade show active" id="cardpay" role="tabpanel" aria-labelledby="cardpay-tab"><!-- card details -->
                                    <div class="form-row pt-2">
                                       <div class="form-group col-md-6">
                                          <label for="cardholder">Name on card</label>
                                          <input type="text" id="cardholder" name="cardholder" class="form-control" placeholder="Cardholder name" value="<?php echo set_value('cardholder');?>">
                                          <small style="color:red"><?php echo form_error('cardholder'); ?></small>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label for="cardnumber">Card number</label>
                                          <input type="text" id="cardnumber" name="cardnumber" class="form-control" placeholder="Card number" value="<?php echo set_value('cardnumber');?>">
                                          <small style="color:red"><?php echo form_error('cardnumber'); ?></small>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="cardmonth">Month</label>
                                          <select name="cardmonth" id="cardmonth">
                                             <?php for($m=1; $m<=12; $m++): ?>
                                                <option value="<?php echo $m;?>"> <?php echo $m<10?'0'.$m:$m;?> </option>
                                             <?php endfor; ?>
                                          </select>
                                          <small style="color:red"><?php echo form_error('cardmonth'); ?></small>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="cardyear">Year</label>
                                          <select name="cardyear" id="cardyear">
                                             <?php for($y=date("Y"); $y<date("Y")+11; $y++): ?>
                                                <option value="<?php echo $y;?>"> <?php echo $y;?> </option>
                                             <?php endfor; ?>
                                          </select>
                                          <small style="color:red"><?php echo form_error('cardyear'); ?></small>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="cardcvv">CVV</label>
                                          <input type="text" id="cardcvv" name="cardcvv" class="form-control" placeholder="CCV" value="<?php echo set_value('cardcvv');?>">
                                          <small style="color:red"><?php echo form_error('cardcvv'); ?></small>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade" id="paypalpay" role="tabpanel" aria-labelledby="paypalpay-tab">
                                    <input type="text" name="paypaltoken" value="abcdefgh123545">
                                    <button>Pay with paypal</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="site-button m-b30">Update Setting</button>
                     <?php echo form_close(); ?>                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content END-->

<?php $this->load->view('templates/footer');?>