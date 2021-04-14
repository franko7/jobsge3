<?php $this->load->view('templates/header');?>

<!-- Content -->
<div class="page-content bg-white">
   <!-- contact area -->
   <div class="content-block">
      <div class="section-full bg-white p-t50 p-b20">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 m-b30">               
                  <?php $data['activeitem'] = 2; $this->load->view('profile/profilesidebar', $data);?> 
               </div>
               <div class="col-xl-9 col-lg-8 m-b30">
                  <div class="job-bx submit-job" id="chat-container">
                     <div class="card direct-chat direct-chat-primary chatbox h-100">


                        <div class="card-header chat-to ui-sortable-handle p-1 d-flex">
                           <button id="btn-add-tab" type="button" class="btn btn-primary pull-right">Add Tab</button>
                           <!-- Nav tabs -->
                           <ul id="tab-list" class="nav nav-tab chat-users" role="tablist">
                              <li>
                                 <a href="#tab1" role="tab" data-toggle="tab" class="active show" aria-selected="true">
                                    <span>Tab 1</span>
                                    <span class="glyphicon glyphicon-pencil text-muted edit"></span>
                                    <button class="close" type="button" title="Remove this page">×</button>
                                 </a>
                              </li>
                           </ul>
                           <!-- Tab panes -->
                        </div>
                        <!-- /.card-header -->


                        <div class="card-body p-0">
                           <div id="tab-content" class="tab-content">         

                              <div class="tab-pane fade active show" id="tab1" > 
                                 <div class="msg-container" style="height: 100%; width: 100%; overflow:auto"> 

                                    <div class="direct-chat-msg right mb-3">
                                       <div class="direct-chat-text"><span>You better believe it!</span></div>
                                       <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>                                       
                                    </div>

                                    <!-- Received message -->
                                    <div class="direct-chat-msg mb-3">
                                       <div class="direct-chat-text"><span>Is this template really for free? That's unbelievable!</span></div>
                                       <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>

                                    <div class="direct-chat-msg right mb-3">
                                       <div class="direct-chat-text"><span>You better believe it!</span></div>
                                       <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>                                       
                                    </div>

                                    <!-- Received message -->
                                    <div class="direct-chat-msg mb-3">
                                       <div class="direct-chat-text"><span>Is this template really for free? That's unbelievable!</span></div>
                                       <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>


                                    <div class="direct-chat-msg right mb-3">
                                       <div class="direct-chat-text"><span>You better believe it!</span></div>
                                       <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>                                       
                                    </div>

                                    <!-- Received message -->
                                    <div class="direct-chat-msg mb-3">
                                       <div class="direct-chat-text"><span>Is this template really for free? That's unbelievable!</span></div>
                                       <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>

                                    <div class="direct-chat-msg right mb-3">
                                       <div class="direct-chat-text"><span>You better believe it!</span></div>
                                       <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>                                       
                                    </div>

                                    <!-- Received message -->
                                    <div class="direct-chat-msg mb-3">
                                       <div class="direct-chat-text"><span>Is this template really for free? That's unbelievable!</span></div>
                                       <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>

                                    <div class="direct-chat-msg right mb-3">
                                       <div class="direct-chat-text"><span>You better believe it!</span></div>
                                       <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>                                       
                                    </div>

                                    <!-- Received message -->
                                    <div class="direct-chat-msg mb-3">
                                       <div class="direct-chat-text"><span>Is this template really for free? That's unbelievable!</span></div>
                                       <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>

                                 </div>
                                 <div class="card-footer">
                                    <form action="#" method="post">
                                       <div class="input-group">
                                          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                          <span class="input-group-append">
                                          <button type="button" class="btn btn-primary">Send</button>
                                          </span>
                                       </div>
                                    </form>
                                 </div>
                              </div>

                           </div>                           
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

<script type='text/javascript'>
   
   var button='<button class="close" type="button" title="Remove this page">×</button>';
   var tabID = 1;
   function resetTab(){
      var tabs=$("#tab-list li:not(:first)");
      var len=1
      $(tabs).each(function(k,v){
         len++;
         $(this).find('a').html('Tab ' + len + button);
      })
      tabID--;
   }

   $(document).ready(function() {
      $('#btn-add-tab').click(function() {
         tabID++;
         $('#tab-list').append($('<li><a href="#tab' + tabID + '" role="tab" data-toggle="tab"><span>Tab ' + tabID + '</span> <span class="glyphicon glyphicon-pencil text-muted edit"></span> <button class="close" type="button" title="Remove this page">×</button></a></li>'));
         $('#tab-content').append($('<div class="tab-pane fade" id="tab' + tabID + '">Tab ' + tabID + ' content</div>'));
         $(".edit").click(editHandler);
      });
      
      $('#tab-list').on('click', '.close', function() {
         var tabID = $(this).parents('a').attr('href');
         $(this).parents('li').remove();
         $(tabID).remove();

         //display first tab
         var tabFirst = $('#tab-list a:first');
         resetTab();
         tabFirst.tab('show');
      });

      var list = document.getElementById("tab-list");
   });

   var editHandler = function() {
   var t = $(this);
   t.css("visibility", "hidden");
   $(this).prev().attr("contenteditable", "true").focusout(function() {
      $(this).removeAttr("contenteditable").off("focusout");
      t.css("visibility", "visible");
   });
   };

   $(".edit").click(editHandler);

</script>
<?php $this->load->view('templates/footer');?>