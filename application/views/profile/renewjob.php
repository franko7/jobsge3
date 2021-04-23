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
                        <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $action;?></h5>
                     </div>

                     <div class="mb-2 ml-1"> Request Details </div>
                     <div class="table-responsive job-details mb-4">
                        <table class="table mb-0">                           
                           <tbody>
                              <tr>
                                 <td class="detais-header"><strong> Action </strong></td>
                                 <td> <?php echo $action;?></td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong> Fee </strong></td>
                                 <td> <?php echo $fee;?> $ </td>
                              </tr>
                              <tr>
                                 <td class="detais-header"><strong> Period </strong></td>
                                 <td> <?php echo $period/86400;?> Days </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                     <div id="paypal-button-container"></div>
                     <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $ClientID;?>&currency=USD"></script>
                     <script>
                        paypal.Buttons({
                           createOrder: function(data, actions) {
                              return actions.order.create({
                                 purchase_units: [{
                                    amount: { value: '<?php echo $fee; ?>' },
                                    description: "<?php echo $this->data['currentJob']->id; ?>"
                                 }]
                              });
                           },
                           onApprove: function(data, actions) {
                              return actions.order.capture().then(details => window.location.replace("<?php echo site_url('profile/validate_transaction/');?>" + details.purchase_units[0].payments.captures[0].id));
                           }
                        }).render('#paypal-button-container');
                     </script>               
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content END-->

<?php $this->load->view('templates/footer');?>