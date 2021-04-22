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
                     
                     <div id="paypal-button-container"></div>

                     <!-- Include the PayPal JavaScript SDK -->
                     <script src="https://www.paypal.com/sdk/js?client-id=AcY319h0dZyAPR6qcDnBtPkmiDdKrGlxzQ3imTgGOvHTZSA7SsJNl55Qr-9TsC14UPOe9L13-UwXi6ha&currency=USD"></script>
                     <script>
                        // Render the PayPal button into #paypal-button-container
                        paypal.Buttons({
                           // Call your server to set up the transaction
                           createOrder: function(data, actions) {
                              return actions.order.create({
                                 purchase_units: [{
                                    amount: {
                                       value: '<?php echo $fee; ?>'
                                    },
                                    reference_id: "76",
                                    description: "<?php echo $this->data['currentJob']->id; ?>"
                                 }]
                              });
                           },

                           // Finalize the transaction
                           onApprove: function(data, actions) {
                              return actions.order.capture().then(function(details) {
                                 // Show a success message to the buyer
                                 alert('Transaction completed by ' + details.payer.name.given_name + '!');
                              });
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