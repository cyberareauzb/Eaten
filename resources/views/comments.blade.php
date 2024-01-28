@extends('layouts.dashmain')
@section('content')

  <div class="utf_dashboard_content"> 
      <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Fikrlar va Izohlar</h2>
           
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
			<div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing Review" class="utf_chosen_select_single">
                    <option>Hammasi</option>
				    <option>Samsacha</option>
				    <option>Urgutda tushlik</option>
                  </select>
                </div>
            </div>
			<h4><i class="sl sl-icon-star"></i> E'lonlar haqida fikrlar</h4>
            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
              <div class="small_dialog_header">
                <h3>Javob qaytarish</h3>
              </div>
              <div class="utf_message_reply_block margin-top-0">
                <textarea cols="40" rows="3" placeholder="Sizning javobingiz..."></textarea>
                <button class="button">Javobni yuborish</button>
              </div>
            </div>
            <ul>
              <li>
                <div class="comments utf_listing_reviews dashboard_review_item">
                  <ul>
                    <li>
                      <div class="avatar"><img src="images/client-avatar1.jpg" alt=""></div>
                      <div class="utf_comment_content">
                        <div class="utf_arrow_comment"></div>
                        <div class="utf_by_comment">John Smith
                          <div class="utf_by_comment-listing">| E'lon <a href="#">Somsacha</a></div>
                          <span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                          <div class="utf_star_rating_section" data-rating="5"></div>
						  <a href="#small-dialog" class="rate-review popup-with-zoom-anim">Javob qaytarish <i class="fa fa-reply"></i></a> 
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.</p>						
					  </div>
                    </li>
                  </ul>
                </div>
              </li>
             		  
            </ul>
          </div>          
          <div class="clearfix"></div>
          <div class="utf_pagination_container_part margin-top-30 margin-bottom-30">
            <nav class="pagination">
              <ul>
			    <li><a href="#"><i class="sl sl-icon-arrow-left"></i></a></li>
                <li><a href="#" class="current-page">1</a></li>
                <li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
                <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
              </ul>
            </nav>
          </div>                   
        </div> 
	
	
      </div>
    </div>
  
@endsection
