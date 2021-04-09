<?php $this->load->view('templates/header');?>

HELLO

<div class="tst">1616065658</div>
<div class="tst">1616065668</div>
<div class="tst">1616065678</div>
<div class="tst">1616065688</div>
2021.03.18 11:07:38

<?php 
   var_dump($tests);
   print_r('timestamp: '. $tests[0]->ts .'<br>');
   print_r('time(): '. time() .'<br>');
   print_r('timestamp -> time(): '. date('Y.m.d H:i:s', time()) .'<br>');
?>

<script>
   console.log(`${Math.floor(Date.now() / 1000)}`);
   var myDate = new Date();
   console.log(myDate.getTimezoneOffset());
   console.log('2021.03.18 10:42:28');

</script>

<?php $this->load->view('templates/footer');?>