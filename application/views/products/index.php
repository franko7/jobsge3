<!DOCTYPE html>
<html>

<head>
   <title>Paypal Payment Gateway In Codeigniter - Tutsmake.com</title>
   <!-- Latest CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>
   <div class="container">
      <h2 class="mt-3 mb-3">Products</h2>
      <div class="row">
         <?php if (!empty($products)) : foreach ($products as $product) : ?>
               <div class="thumbnail mr-4">
                  <img src="<?php echo base_url() . 'assets/images/' . $product['image']; ?>" alt="">
                  <div class="caption">
                     <h4 class="pull-right">$<?php echo $product['price']; ?> USD</h4>
                     <br>
                     <h4><a href="javascript:void(0);"><?php echo $product['name']; ?></a></h4>
                     <br>
                  </div>
                  <a href="<?php echo site_url() . 'products/buyProduct/' . $product['id']; ?>"> BUY </a>
               </div>
            <?php endforeach;
         endif; ?>
      </div>

      <div class="row">
      <script src="https://www.paypal.com/sdk/js?client-id=AcY319h0dZyAPR6qcDnBtPkmiDdKrGlxzQ3imTgGOvHTZSA7SsJNl55Qr-9TsC14UPOe9L13-UwXi6ha"> </script>

         <div id="paypal-button-container"></div>

         <script>
            paypal.Buttons({
               createOrder: function(data, actions) {
                  // This function sets up the details of the transaction, including the amount and line item details.
                  return actions.order.create({
                     purchase_units: [{
                        amount: {
                           value: '1.09'
                        },
                        reference_id: "PUHF",
                        description: "Sporting Goods",
                        custom_id: "CUST-HighFashions",
                        soft_descriptor: "HighFashions",
                     }]
                  });
               },
               // onApprove: function(data, actions) {
               //    // This function captures the funds from the transaction.
               //    return actions.order.capture().then(function(details) {
               //    // This function shows a transaction success message to your buyer.
               //    console.log(details);
               //    });
               // }
               onApprove: function(data, actions) {
                  return actions.order.capture().then(function(details) {
                     console.log('Transaction completed by ' + details.payer.name.given_name)
                     // Call your server to save the transaction
                     return fetch('<?php echo base_url();?>/api/api/index2', {
                        method: 'post',
                        headers: {
                           'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                           orderID: data.orderID
                        })
                     })
                  })
               }
            }).render('#paypal-button-container');
         </script>
      </div>
   </div>
</body>

</html>


