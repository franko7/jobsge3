<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap413.min.css');?>">
</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-12 pt-5 d-flex flex-column align-items-start">
            <p><strong>Hello, <?php echo $username; ?></strong></p>
            <p class="mb-2">You have requested to recover password. Click link below to recover password</p>
            <a href="<?php echo base_url('auth/recover/'.$userid.'/'.$recoveryString);?>" class="btn btn-primary"> 
               Recover password 
            </a>
         </div>
      </div>
   </div>
</body>
</html>