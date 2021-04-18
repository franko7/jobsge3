<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content bg-white">
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full bg-white p-t50 p-b20">
         <div class="container">
            <div class="row chat2" >
               <div class="col-xl-3 col-lg-4 m-b30" style="max-height:250px; overflow:auto">
                  <div class="tab">
                     <ul>
                        <?php foreach ($chatUsers as $i=>$u):?>
                           <li>
                           <button class="tablinks <?php echo $i==0?'active':'';?>" 
                              data-currentuser="<?php echo $u['user']-$userId;?>" 
                              onclick="openChat(event, 'tab-<?php echo $u['user']-$userId;?>')"
                           > 
                              <?php echo $users[$u['user']-$userId-1]->fullname;?> 
                           </button>
                           </li>
                        <?php endforeach;?>
                     </ul>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-8 m-b30">
                  <div class="job-bx submit-job" id="chat-container">
                     <div class="card direct-chat direct-chat-primary chatbox h-100">
                        <div class="card-body p-0">
                           <?php foreach ($chatUsers as $u): ?>                                 
                              <div id="tab-<?php echo $u['user']-$userId;?>" class="tabcontent">
                                 <?php foreach($chats[$u['user']] as $x=>$c): ?>
                                    <div class="direct-chat-msg mb-3 <?php echo $c['fromid']==$userId?'right':'';?>">
                                       <div class="direct-chat-text">
                                          <span>
                                             <?php echo $c['msg'];?>
                                          </span>
                                       </div>
                                       <span class="direct-chat-timestamp float-left tst">
                                          <?php echo $c['time'];?>
                                       </span>
                                    </div>
                                 <?php endforeach; ?>                                 
                              </div>                                    
                           <?php endforeach; ?>           
                        </div>
                        <div class="card-footer">
                           <?php echo form_open("#"); ?>
                              <div class="input-group">
                                 <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control" onkeypress="return searchKeyPress(event);">
                                 <span class="input-group-append">
                                 <button type="button" id="sendMsg" class="btn btn-primary" onclick="sendMessage()">Send</button>
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
var currentUser = document.querySelector('.tab button.tablinks').dataset.currentuser;
document.getElementById("tab-"+currentUser).scrollTop = document.getElementById("tab-"+currentUser).scrollHeight;
var lastUpdate = Math.floor(Date.now()/1000);

setInterval(function(){
   $.ajax({
      url:'<?=site_url("profile/getMessages")?>',
      method: 'post',
      data: {csrf_token: $('input[name=csrf_token]').val(), lastUpd: lastUpdate},
      dataType: 'json',
      success: function(response){
         $('input[name=csrf_token]').val(response.token);
         lastUpdate = Math.floor(Date.now()/1000);
         response.newMessages.forEach(appendItems);
      }
   });
}, 5000);

function searchKeyPress(e){
   e = e || window.event;
   if (e.keyCode == 13){
      document.getElementById('sendMsg').click();
      return false;
   }
   return true;
}

function appendItems(item){
   console.log(item.from, item.message);
   document.getElementById("tab-"+item.from).innerHTML += '<div class="direct-chat-msg mb-3"><div class="direct-chat-text"><span>' + 
      item.message +'</span></div><span class="direct-chat-timestamp float-left tstnew">' +
      item.sent_at + '</span></div>';
   document.getElementById("tab-"+item.from).scrollTop = document.getElementById("tab-"+item.from).scrollHeight;
   $('.tstnew').text(localTime($('.tstnew').text()));
   $('.tstnew').removeClass('tstnew').addClass('tst');
}

function openChat(evt, chatUser) {   
   if(currentUser != chatUser.replace("tab-", "")){
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(chatUser).style.display = "block";
      evt.currentTarget.className += " active";
      currentUser = chatUser.replace("tab-", "");
      document.getElementById("tab-"+currentUser).scrollTop = document.getElementById("tab-"+currentUser).scrollHeight;
   }
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
            document.getElementById('message').value = '';
            document.getElementById("tab-"+currentUser).innerHTML += '<div class="direct-chat-msg mb-3 right"><div class="direct-chat-text"><span>' + 
               message +'</span></div><span class="direct-chat-timestamp float-left tstnew">' +
               Math.floor(Date.now()/1000) + '</span></div>';
            document.getElementById("tab-"+currentUser).scrollTop = document.getElementById("tab-"+currentUser).scrollHeight;
            $('.tstnew').text(localTime($('.tstnew').text()));
            $('.tstnew').removeClass('tstnew').addClass('tst');
         }
      });
   }
}
</script>
<?php $this->load->view('templates/footer');?>