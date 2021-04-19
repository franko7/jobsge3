<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content bg-white">
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full bg-white p-t50 p-b20">
         <div class="container">
            <div class="row chat2" >
               <div class="col-xl-3 col-lg-4 m-b30 ">
                  <div class="tab chat-sidebar mb-2 py-1">
                     <ul id="chatusers">
                        <?php if(isset($toId)): ?>
                           <li class="new">
                              <button class="tablinks active" data-currentuser="<?php echo $toId;?>" onclick="openChat(event, 'tab-<?php echo $toId;?>')"> 
                                 <?php echo $toName; ?>
                              </button>
                           </li>
                        <?php endif;?>
                        <?php foreach ($chatUsers as $i=>$u):?>
                           <li class="guest">
                              <button class="tablinks <?php echo $i==0 && !isset($toId)?'active':'';?>"  data-currentuser="<?php echo $u['user'];?>" 
                                 onclick="openChat(event, 'tab-<?php echo $u['user'];?>')"> 
                                 <?php echo $u['name'];?> 
                                 <?php if($u['newMsg']&&$i!=0):?>
                                    <i class="fas fa-sms ml-2"></i>
                                 <?php endif; ?>
                              </button>
                           </li>
                        <?php endforeach;?>
                     </ul>                     
                  </div>
                  <div class="candidate-info company-info">
                     <ul>
                        <li>
                           <a href="<?php echo site_url('profile');?>" class="">
                              <i class="fas fa-arrow-circle-left"></i> 
                              <span> <?php echo lang('backToProfile')?> </span> 
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-8 m-b30">
                  <div class="job-bx submit-job" id="chat-container">
                     <div class="job-bx-title clearfix p-0 mb-4">
                        <h5 class="font-weight-700 pull-left text-uppercase"> <?php echo lang('chat')?> </h5>
                     </div>
                     <div class="card direct-chat direct-chat-primary chatbox" style="height: calc(100% - 62px)">
                        <div class="card-body p-0" >
                           <div id="chat" class="tabcontent">
                              <?php if(!isset($toId)): ?>
                                 <?php for($i=0; $i<count($chat); $i++): ?>
                                    <div class="direct-chat-msg mb-3 <?php echo $chat[$i]->from==$userId?'right':'';?>">
                                       <div class="direct-chat-text">
                                          <span>
                                          <?php echo $chat[$i]->message;?> 
                                          </span>
                                       </div>
                                       <span class="direct-chat-timestamp float-left tst">
                                          <?php echo $chat[$i]->sent_at;?>
                                       </span>
                                    </div>
                                 <?php endfor; ?>
                              <?php endif;?>
                           </div>
                        </div>
                        <div class="card-footer">
                           <?php echo form_open("#"); ?>
                              <div class="input-group">
                                 <input type="text" name="message" id="message" placeholder="<?php echo lang('typeMessage')?> ..." class="form-control" onkeypress="return searchKeyPress(event);">
                                 <span class="input-group-append">
                                 <button type="button" id="sendMsg" class="btn btn-primary" onclick="sendMessage()"> <?php echo lang('send')?> </button>
                                 </span>
                              </div>
                           <?php echo form_close();?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content END-->
<script>
var currentUser =  document.querySelector('.tab button.tablinks').dataset.currentuser;
document.getElementById("chat").scrollTop = document.getElementById("chat").scrollHeight;

setInterval(function(){
   refreshChat(currentUser);
}, 5000);

function searchKeyPress(e){
   e = e || window.event;
   if (e.keyCode == 13){
      document.getElementById('sendMsg').click();
      return false;
   }
   return true;
}

function openChat(evt, chatUser) {   
   if(currentUser != chatUser.replace("tab-", "")){
      var i, tabcontent, tablinks;
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) 
         tablinks[i].className = tablinks[i].className.replace(" active", "");
      evt.currentTarget.className += " active";
      currentUser = chatUser.replace("tab-", "");
      document.getElementById("chat").scrollTop = document.getElementById("chat").scrollHeight;      
      refreshChat(currentUser);
   }
}

function refreshChat(user){
   $.ajax({
      url:'<?=site_url("profile/refreshChat")?>',
      method: 'post',
      data: {csrf_token: $('input[name=csrf_token]').val(), user: user},
      dataType: 'json',
      success: function(response){
         $('input[name=csrf_token]').val(response.token);
         $('#chatusers li.guest').remove();
         // refresh user list
         response.chatUsers.forEach((item, index) =>{
            $('#chatusers').append(`
               <li class="guest">
                  <button class="tablinks " 
                     data-currentuser="` + (item.user) + `" 
                     onclick="openChat(event, 'tab-` + (item.user) + `')"
                  >` + 
                     item.name +
                     (item.newMsg?`<i class="fas fa-sms ml-2"></i>`:``) +
                  `</button>
               </li>
            `);
         });
         $('#chatusers button').removeClass("active");
         $('button[data-currentuser=' + response.lastUser + ']').addClass("active");
         // refresh chat area
         $('#chat').html('');
         if (response.chat.length){
            response.chat.forEach(item =>{
               $('#chat').append(`
                  <div class="direct-chat-msg mb-3 ` + (item.from==response.userId?'right':'') + `">
                     <div class="direct-chat-text"><span>`+
                           item.message +
                     `</span></div>
                     <span class="direct-chat-timestamp float-left tst">`+
                        item.sent_at +
                     `</span>
                  </div>`
               );            
            });
            $('#chatusers li.new').remove();
         }
         intervalToDatetime();
         document.getElementById("chat").scrollTop = document.getElementById("chat").scrollHeight;
      }
   });
}


function sendMessage(){
   var message = document.getElementById('message').value;
   if(message.length){
      $.ajax({
         url:'<?=site_url("profile/sendMessage")?>',
         method: 'post',
         data: {csrf_token: $('input[name=csrf_token]').val(), to: currentUser, msg: message},
         dataType: 'json',
         success: function(response){
            $('input[name=csrf_token]').val(response.token);
            $('#message').val('');
            $("#chat").append('<div class="direct-chat-msg mb-3 right"><div class="direct-chat-text"><span>' + 
               message +'</span></div><span class="direct-chat-timestamp float-left tstnew">' +
               Math.floor(Date.now()/1000) + '</span></div>');
            document.getElementById("chat").scrollTop = document.getElementById("chat").scrollHeight;
            $('.tstnew').text(localTime($('.tstnew').text()));
            $('.tstnew').removeClass('tstnew').addClass('tst');
         }
      });
   }
}

</script>
<?php $this->load->view('templates/footer');?>