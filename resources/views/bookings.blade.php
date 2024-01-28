@extends('layouts.dashmain')
@section('content')

      <div class="utf_dashboard_content"> 
	  <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Buyurtmalar</h2>
          </div>
        </div>
      </div>
	  
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
			<div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing" class="utf_chosen_select_single">
                    <option>Hammasi</option>
				    <option>Samsacha</option>
				    <option>Urgut tog'lari bag'rida tushlik</option>
                
                  </select>
                </div>
            </div>
			<h4 style="color: #323232">So'nggi buyurtmalar</h4>
			<ul>			  
			  @foreach($books as $book)
			  <li class="utf_pending_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>{{$book->firstname}} {{$book->lastname}} <span class="utf_booking_listing_status pending">{{$book->status}}</span></h3>
					 
					  <div class="utf_inner_booking_listing_list">
						<h5>Mexmon kelish vaqti:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">{{$book->datetime}}</li>
						</ul>
					  </div>
					
					  <div class="utf_inner_booking_listing_list">
						<h5>Mexmonlar soni:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">{{$book->guestcount}} kishi</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">{{$book->email}}</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Telefon:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">{{$book->phone}}</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>To'lov miqdori:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ {{$book->summ}}</li>
						</ul>
					  </div>					  					  
					  <div class="utf_inner_booking_listing_list">
						<h5>Soliq uchun qaytariladigan summa:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ {{$book->tax}}</li>
						</ul>
					  </div>					  					  
					  <div class="utf_inner_booking_listing_list">
						<h5>Jami to'lov miqdori:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ {{$book->summ + $book->tax}}</li>
						</ul>
					  </div>					  					  
					  <div class="utf_inner_booking_listing_list">
						<h5>To'lov Uslubi:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">{{($book->paymethod == 'cach') ? "Naqd pul borganda beriladi" : 'Karta yordamida tizim qabul qiladi'}}</li>
						</ul>
					  </div>					  					  
					  <div class="utf_inner_booking_listing_list">
						<h5>To'lov holati:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted"> {{($book->paystatus == 'unpaid') ? "To'lanmagan" : "To'langan"}}</li>
						</ul>
					  </div>					  					  
					  <div class="utf_inner_booking_listing_list">
						<h5>Gaplashadigan tili:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted"> {{$book->language}}</li>
						</ul>
					  </div>					  					  
					  <div class="utf_inner_booking_listing_list">
						<h5>Qo'shimcha talablar:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted"> {{$book->desire}}</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Bekor qilamiz</a> <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Kutaman</a> </div>
			  </li>
			  @endforeach
			</ul>
          </div>		  
        </div>
	
        
      </div>
    </div>

@endsection
