@extends('layouts.sitemain')
@php
//$orditems = json_encode($items)
@endphp
@section('content')

    <div class="container">
        <div class="blog-page">
            <div class="row">

           <form id="checkout">
{{--               @dd(auth()->user())--}}
           @csrf
           <input hidden value="{{auth()->user()->id}}" name="user_id">
           <input hidden value="{{$listing->id}}" name="listing_id">
           <input hidden value="{{$datetime}}" name="datetime">
           <input hidden value="{{$guest_count}}" name="guestcount">
           <input hidden name="items" class="orditems">
           <input hidden name="summ" class="summinp">
           <input hidden name="tax" class="taxinp">
    <div class="container margin-bottom-75">
      <div class="row">
        <div class="col-lg-8 col-md-8 utf_listing_payment_section">
          <div class="utf_booking_listing_section_form margin-bottom-40">
            <h3><i class="sl sl-icon-paper-plane"></i> Billing Information</h3>
            <div class="row">
              <div class="col-md-6">
                <label>First Name</label>
                <input type="text" value="{{auth()->user()->firstname}}" name="firstname" placeholder="First Name">
              </div>
              <div class="col-md-6">
                <label>Last Name</label>
                <input type="text" value="{{auth()->user()->lastname}}" name="lastname" placeholder="Last Name">
              </div>
              <div class="col-md-6">
                <div class="medium-icons">
                  <label>E-Mail</label>
                  <input type="email" value="{{auth()->user()->email}}" name="email"  placeholder="Email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="medium-icons">
                  <label>Phone</label>
                  <input type="tel" value="{{auth()->user()->phone}}" name="phone" placeholder="Phone">
                </div>
              </div>
               <div class="col-md-12">
                <div class="medium-icons">
                  <label>Language</label>
                  <input type="text" value="" name="language" placeholder="What language do you speak">
                </div>
              </div>
               <div class="col-md-12">
                <div class="medium-icons">
                  <label>Desire</label>
                  <textarea type="text" value="" name="desire" placeholder="What additional amenities would you like to have?"></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="utf_booking_payment_option_form">
            <h3><i class="sl sl-icon-credit-card "></i> Payment Method</h3>
            <div class="payment">
              <div class="utf_payment_tab_block utf_payment_tab_block_active">
                <div class="utf_payment_trigger_tab">
                  <input checked="true" id="cach" name="paymethod" type="radio" value="cach">
                  <label for="cach">Paywith CASH</label>
                  <img class="utf_payment_logo paypal" src="images/cash.png" alt="">
                </div>
                <div class="utf_payment_tab_block_content">
                  <p>If you want to pay on arrival.</p>
                </div>
              </div>
              <div class="utf_payment_tab_block">
                <div class="utf_payment_trigger_tab">
                  <input id="uzcard" name="paymethod" type="radio" value="uzcard">
                  <label for="uzcard">Paywith CLICK / USCARD</label>
                  <img class="utf_payment_logo stripe" style="height:28px" src="images/uzcard.png" alt="">
                </div>

                <div class="utf_payment_tab_block_content">
                    <span style="color: red">Card payment is temporarily unavailable</span>
                   <div class="row">
                    <div class="col-md-12">
                      <div class="card-label">
                        <label for="uzcardNumber">Card Number</label>
                        <input disabled id="uzcardnumber" name="uzcardnumber" placeholder="0000  0000  0000  0000"
                          type="text">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card-label">
                        <label for="uzexpirynDate">Expiry Month</label>
                        <input disabled id="uzexpiryDate" placeholder="MM" name="uzmonth" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card-label">
                        <label for="uzexpiryDate">Expiry Year</label>
                        <input disabled id="uzexpirynDate" name="uzyear" placeholder="YYYY" type="text">
                      </div>
                    </div>

                  </div>
                </div>
              </div>



              <div class="utf_payment_tab_block ">
                <div class="utf_payment_trigger_tab">
                  <input type="radio" name="paymethod" id="visa" value="creditCard">
                  <label for="visa">Paywith VISA / MASTERCARD</label>
                  <img class="utf_payment_logo" src="images/pay_icon.png" alt="">
                </div>
                <div class="utf_payment_tab_block_content">
                    <span style="color: red">Card payment is temporarily unavailable</span>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card-label">
                        <label for="cardNumber">Card Number</label>
                        <input disabled id="cardnumber" name="cardNumber" placeholder="0000  0000  0000  0000" required=""
                          type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card-label">
                        <label  for="nameOnCard">Card Holder Name</label>
                        <input disabled id="cardname" name="cardName" placeholder="Card Holder Name" required="" type="text">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-label">
                        <label for="expirynDate">Expiry Month</label>
                        <input disabled id="expiryDate" placeholder="MM" required="" type="text">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-label">
                        <label for="expiryDate">Expiry Year</label>
                        <input disabled id="expirynDate" placeholder="YYYY" required="" type="text">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-label">
                        <label for="cvv">CVV Code</label>
                        <input id="cvv" disabled required="" placeholder="***" type="text">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit"
              class="button utf_booking_confirmation_button margin-top-20 margin-bottom-10">Confirm Now</button>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 margin-top-0 utf_listing_payment_section">
          <div class="utf_booking_listing_item_container compact utf_order_summary_widget_section">
            <div class="listing-item"> <img src="{{$listing->img}}" alt="">
              <div class="utf_listing_item_content">
                <h3>{{$listing->nameuz}}</h3>
                <span><i class="fa fa-map-marker"></i> {{$listing->addressuz}}</span>
                <span><i class="fa fa-phone"></i> {{$listing->phone}}</span>
                <div class="utf_star_rating_section" data-rating="{{$listing->rating ?? 0}}">

                </div>
              </div>
            </div>
          </div>
          <div class="boxed-widget opening-hours summary margin-top-0">
            <h3><i class="fa fa-calendar-check-o"></i> Booking Summary</h3>
            <ul>
              <li>Appearing <span>{{$datetime}}</span></li>
              <li>Guests <span>{{$guest_count}} person</span></li>
              <li>Price <span class="summ"> </span></li>
              <li>V.A.T <span class="vat"></span></li>
              <!--<li class="total-costs">Sub Total <span>$248.00</span></li>-->
              <!--<li class="total-costs">-->
              <!--  <div class="col-md-8">-->
              <!--    <input id="couponCode" placeholder="Have a coupon enter here..." required="" type="text">-->
              <!--  </div>-->
              <!--  <div class="col-md-4">-->
              <!--    <input type="submit" class="coupon_code" value="Apply">-->
              <!--  </div>-->
              <!--  <div class="clearfix"></div>-->
              <!--</li>-->
              <li class="total-costs">Total Cost <span class="total">$ </span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</form>

            </div>
        </div>
    </div>

    <script>
        let checkout = document.querySelector('#checkout')
        let orderData = JSON.parse(localStorage.getItem('orderdata'))
        let vat = Math.round((orderData.summ/100*12) * 100) / 100
        let total = Number(orderData.summ) + Number(vat)
        document.querySelector('.summ').innerHTML = orderData.summ + ' $'
        document.querySelector('.vat').innerHTML = '$ ' + vat + '  (12%)'
        document.querySelector('.summinp').value = orderData.summ
        document.querySelector('.taxinp').value = vat
        document.querySelector('.orditems').value = JSON.stringify(orderData.orderitems)
        document.querySelector('.total').innerHTML = total + '  $'
        console.log(orderData)



        checkout.addEventListener('submit', (e)=>{
            e.preventDefault()
            // orderData.listing_id = orderData.listingid
            // orderData.guestcount = orderData.guest_count
            // orderData.tax = vat
            // orderData.firstname = checkout.firstname.value
            // orderData.lastname = checkout.lastname.value
            // orderData.email = checkout.email.value
            // orderData.phone = checkout.phone.value
            // orderData.language = checkout.language.value
            // orderData.desire = checkout.desire.value
            // orderData.desire = checkout.desire.value



            fetch('/checkout', {
                method: 'POST',
                body: new FormData(checkout)
            }).then(data=>data.json(data)).then(data=>{
                localStorage.removeItem('orderItems')
                localStorage.removeItem('orderdata')
                localStorage.removeItem('sf')
                Swal.fire({
                  title: 'GOOD!',
                  text: data.message,
                  icon: 'success',
                  confirmButtonText: 'OK'
                })
                setTimeout(window.location.href = '/', 3000);
            })
        })
    </script>

    @endsection
