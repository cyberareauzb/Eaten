@extends('layouts.dashmain')
@section('content')

   <div class="utf_dashboard_content"> 
 
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
                    
			<div class="utf_messages_block_inner"> 
              <div class="utf_user_messages_block">
                <ul>
                  <li class="active-message"> 
					<a href="/messages">
						<div class="utf_message_user online"><img src="images/user_avatar_01.jpg" alt="user_avatar"></div>
						<div class="utf_message_headline_item">
						  <div class="utf_message_headline_text">
							<h5>John Doe <i>Yangi</i></h5>
							<span><i class="fa fa-clock-o"></i> Yanvar 05, 2023 - 8:52</span>  
						  </div>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
						</div>
                    </a> 
				  </li>
                  <li> 
					<a href="/messages">
						<div class="utf_message_user online"><img src="images/user_avatar_02.jpg" alt="user_avatar"></div>
						<div class="utf_message_headline_item">
						  <div class="utf_message_headline_text">
							<h5>John Doe <i>Yangi</i></h5>
							<span><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>  
						  </div>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
						</div>
					</a> 
				  </li>
                           
                </ul>
              </div>
              
              <div class="utf_message_content_part">
                <div class="utf_message_content_item">
                  <div class="utf_message_user"><img src="images/user_avatar_01.jpg" alt="user_avatar"></div>
                  <div class="utf_message_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                  </div>
                </div>
                <div class="utf_message_content_item send_user">
                  <div class="utf_message_user"><img src="images/user_message.jpg" alt="user_message"></div>
                  <div class="utf_message_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                  </div>
                </div>
                <div class="utf_message_content_item send_user">
                  <div class="utf_message_user"><img src="images/user_message.jpg" alt="user_message"></div>
                  <div class="utf_message_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                  </div>
                </div>
                <div class="utf_message_content_item">
                  <div class="utf_message_user"><img src="images/user_avatar_01.jpg" alt="user_avatar"></div>
                  <div class="utf_message_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                  </div>
                </div>
                <div class="utf_message_content_item send_user">
                  <div class="utf_message_user"><img src="images/user_message.jpg" alt="user_message"></div>
                  <div class="utf_message_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                  </div>
                </div>                
                <div class="clearfix"></div>
                <div class="utf_message_reply_block">
                  <textarea cols="50" rows="4" placeholder="Your Message..."></textarea>
                  <button class="button">Send Message</button>
                </div>
              </div>
            </div>
          </div>
        </div>        
       
      </div>
    </div>
@endsection
