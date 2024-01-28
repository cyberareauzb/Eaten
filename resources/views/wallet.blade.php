@extends('layouts.dashmain')
@section('content')

 <div class="utf_dashboard_content"> 
	  <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Xamyon</h2>
            
          </div>
        </div>
      </div>
	  
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="margin-top-0">
            <div class="row"> 
			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-1">
				  <div class="utf_dashboard_ic_stat"><i class="fa fa-money"></i></div>	
				  <div class="utf_dashboard_content_part utf_wallet_totals_item">
					<h4>$ 1260.08</h4>
					<span>Jami tushum</span>					
				  </div>				  
				</div>
			  </div>

			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-2">
				  <div class="utf_dashboard_ic_stat"><i class="sl sl-icon-wallet"></i></div>
				  <div class="utf_dashboard_content_part utf_wallet_totals_item">
				    <h4>$ 680.26</h4>
					<span>To'lab berilgan</span>					
				  </div>				  
				</div>
			  </div>
			  
			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-3">
				  <div class="utf_dashboard_ic_stat"><i class="sl sl-icon-list"></i></div>
				  <div class="utf_dashboard_content_part">
				    <h4>$ 115</h4>
					<span>Komissiya sifatida qaytarilgan</span>					
				  </div>				  
				</div>
			  </div>
			  
			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-4">
				  <div class="utf_dashboard_ic_stat"><i class="sl sl-icon-basket"></i></div>
				  <div class="utf_dashboard_content_part">
				    <h4>$ 228</h4>
					<span>Kutilayotgan to'lov</span>					
				  </div>				  
				</div>
			  </div>
			</div>

			<div class="row"> 
			  <div class="col-lg-6 col-md-12">
				<div class="utf_dashboard_list_box invoices with-icons margin-top-20">
				  <h4>Amalga oshirilgan to'lovlar</h4>
				  <ul>
					<li><i class="utf_list_box_icon sl sl-icon-basket-loaded"></i> <strong>Urgut tog'lari bag'rida tushlik <span class="list_hotel">Milliy taomlar</span></strong>
					  <ul>
						<li><span>Sana:-</span> 12 Dekabr 2023</li>
						<li><span>Buyurtma raqami:-</span> 00403128</li>
						<li class="paid"><span>To'lov:-</span> $178.00</li>												
					  </ul>
					</li>
			
				  </ul>
				</div>
			  </div>
			  
			  <div class="col-lg-6 col-md-12">
				<div class="utf_dashboard_list_box invoices with-icons margin-top-20">
				  <h4>Tugallangan to'lovlar</h4>
				  <ul>
					  <li><i class="utf_list_box_icon fa fa-paste"></i> <strong>$122  <span class="paid">To'lab berilgan</span></strong>
						<ul>
						  <li><span>Buyurtma raqami:-</span> 004128641</li>
						  <li><span>Sana:-</span> 12 Yanvar 2023</li>
						</ul>
						<div class="buttons-to-right"> <a href="/wallet" class="button gray"><i class="sl sl-icon-printer"></i> To'lov varaqasi</a> </div>
					  </li>
					</ul>
				</div>
			  </div>
			</div>
          </div>		  
        </div>

      </div>
    </div>
  
@endsection
