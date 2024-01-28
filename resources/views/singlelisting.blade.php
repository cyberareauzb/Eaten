@extends('layouts.sitemain')

@section('content')

    <div id="utf_listing_gallery_part" class="utf_listing_section">
        <!--<div class="utf_listing_slider utf_gallery_container margin-bottom-0">-->
        <!--        @foreach($list->galer as $img)-->
        <!--            <img src="{{$img}}" style="object-fit: cover" class="item utf_gallery">-->
        <!--        @endforeach-->
        <!--</div>-->
        <div class="container">
            <div class="zoom-gallery" style="
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        gap: 15px;
        height: 400px;
        ">
                @foreach($list->galer as $img)
                    <!--<a href="{{$img}}" data-source="{{$img}}" title="" style="width:193px;height:125px;">-->
                    <img src="{{$img}}" class="singLisGalery" style="object-fit: cover; border-radius: 15px">
                    <!--</a>-->
                @endforeach
            </div>
        </div>


    </div>

    <div class="container">
        <div class="row utf_sticky_main_wrapper">
            <div class="col-lg-8 col-md-8">

                <div id="titlebar" class="utf_listing_titlebar">
                    <div class="utf_listing_titlebar_title">
                        <h2>@if($lang == 'uz')
                                {{$list->nameuz}}
                            @elseif($lang == 'ru')
                                {{$list->nameru}}
                            @else
                                {{$list->nameen}}
                            @endif <span class="listing-tag">{{$list->StatusName}}</span></h2>
                        <span> <a href="#utf_listing_location" class="listing-address"> <i
                                    class="sl sl-icon-location"></i> {{$list->regionName}}. @if($lang == 'uz')
                                    {{$list->addressuz}}
                                @elseif($lang == 'ru')
                                    {{$list->addressru}}
                                @else
                                    {{$list->addressen}}
                                @endif </a> </span>
                        <span class="call_now"><i class="sl sl-icon-phone"></i> {{$list->phone}}</span>
                        <div class="utf_star_rating_section" data-rating="{{$list->rating}}">
                            <div class="utf_counter_star_rating">({{$list->rating}})</div>
                        </div>
                        {{--                        @dd($list)--}}
                        <ul class="listing_item_social">
                            <li><a href="#"><i class="fa fa-heart"></i>
                                    @if($lang == 'uz')
                                        Obuna bo'lish
                                    @elseif($lang == 'ru')
                                        Избранная
                                    @else
                                        Bookmark
                                    @endif

                                </a></li>
                            <li><a href="#addreview"><i class="fa fa-star"></i>
                                    @if($lang == 'uz')
                                        Fikr bildirish
                                    @elseif($lang == 'ru')
                                        Добавить отзыв
                                    @else
                                        Add Review
                                    @endif

                                </a></li>
                        </ul>
                    </div>
                    <div class="reviews-container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div id="review_summary">
                                    @if($comInfo->count != 0)
                                        <strong>{{$list->rating}}</strong>

                                        <small>
                                            @if($lang == 'uz')
                                                Jami {{$comInfo->count}} fikr
                                            @elseif($lang == 'ru')
                                                Всего {{$comInfo->count}} отзывов
                                            @else
                                                Out of {{$comInfo->count}} Reviews
                                            @endif
                                        </small>
                                    @endif
                                    @if($comInfo->count == 0)
                                        <strong>0</strong>

                                        <small>
                                            @if($lang == 'uz')
                                                Jami {{$comInfo->count}} fikr
                                            @elseif($lang == 'ru')
                                                Всего {{$comInfo->count}} отзывов
                                            @else
                                                Out of {{$comInfo->count}} Reviews
                                            @endif
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-2 review_progres_title"><small><strong>
                                                @if($lang == 'uz')
                                                    Sifat
                                                @elseif($lang == 'ru')
                                                    Качество
                                                @else
                                                    Quality
                                                @endif
                                            </strong></small>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{($comInfo->count != 0) ? intval($comInfo->total_quality/$comInfo->count/5*100): 1}}%"
                                                 aria-valuenow="{{($comInfo->count != 0) ? intval($comInfo->total_quality/$comInfo->count/5*100): 1}}"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 review_progres_title">
                                        <small><strong>{{($comInfo->count != 0) ? intval($comInfo->total_quality/$comInfo->count/5*100) : 1}}</strong></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 review_progres_title"><small><strong>
                                                @if($lang == 'uz')
                                                    Maydon
                                                @elseif($lang == 'ru')
                                                    Пространство
                                                @else
                                                    Space
                                                @endif
                                            </strong></small>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{($comInfo->count != 0) ? intval($comInfo->total_space/$comInfo->count/5*100) : 1}}%"
                                                 aria-valuenow="{{($comInfo->count != 0) ? intval($comInfo->total_space/$comInfo->count/5*100) : 1}}"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 review_progres_title">
                                        <small><strong>{{($comInfo->count != 0) ? intval($comInfo->total_space/$comInfo->count/5*100) : 1}}</strong></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 review_progres_title"><small><strong>
                                                @if($lang == 'uz')
                                                    Narx
                                                @elseif($lang == 'ru')
                                                    Цена
                                                @else
                                                    Price
                                                @endif
                                            </strong></small>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{($comInfo->count != 0) ? intval($comInfo->total_price/$comInfo->count/5*100) : 1}}%"
                                                 aria-valuenow="{{($comInfo->count != 0) ? intval($comInfo->total_price/$comInfo->count/5*100) : 1}}"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 review_progres_title">
                                        <small><strong>{{($comInfo->count != 0) ? intval($comInfo->total_price/$comInfo->count/5*100) : 1}}</strong></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 review_progres_title"><small><strong>
                                                @if($lang == 'uz')
                                                    Xizmat
                                                @elseif($lang == 'ru')
                                                    Услуга
                                                @else
                                                    Service
                                                @endif
                                            </strong></small>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{($comInfo->count != 0) ? intval($comInfo->total_service/$comInfo->count/5*100) : 1}}%"
                                                 aria-valuenow="{{($comInfo->count != 0) ? intval($comInfo->total_service/$comInfo->count/5*100) : 1}}"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 review_progres_title">
                                        <small><strong>{{($comInfo->count != 0) ? intval($comInfo->total_service/$comInfo->count/5*100) : 1}}</strong></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 review_progres_title"><small><strong>
                                                @if($lang == 'uz')
                                                    Joylashuv
                                                @elseif($lang == 'ru')
                                                    Локация
                                                @else
                                                    Location
                                                @endif
                                            </strong></small>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{($comInfo->count != 0) ? intval($comInfo->total_location/$comInfo->count/5*100) : 1}}%"
                                                 aria-valuenow="{{($comInfo->count != 0) ? intval($comInfo->total_location/$comInfo->count/5*100) : 1}}"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 review_progres_title">
                                        <small><strong>{{($comInfo->count != 0) ? intval($comInfo->total_location/$comInfo->count/5*100) : 1}}</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="utf_listing_overview" class="utf_listing_section">
                    <h3 class="utf_listing_headline_part margin-top-30 margin-bottom-30">
                        @if($lang == 'uz')
                            Batafsil ma'lumot
                        @elseif($lang == 'ru')
                            Подробнее информация
                        @else
                            Description
                        @endif
                    </h3>
                    <p>@if($lang == 'uz')
                            {{$list->descriptionuz}}
                        @elseif($lang == 'ru')
                            {{$list->descriptionru}}
                        @else
                            {{$list->descriptionen}}
                        @endif</p>

                    <div class="social-contact">
                        <a href="#" class="facebook-link"><i class="fa fa-facebook"></i> Facebook</a>
                        <a href="#" class="twitter-link"><i class="fa fa-twitter"></i> Twitter</a>
                        <a href="#" class="instagram-link"><i class="fa fa-instagram"></i> Instagram</a>
                        <a href="#" class="linkedin-link"><i class="fa fa-linkedin"></i> Linkedin</a>
                        <a href="#" class="youtube-link"><i class="fa fa-youtube-play"></i> Youtube</a>
                    </div>
                </div>

                <div class="utf_listing_section">

                    <div class="">
                        <div class="utf_pricing_list_section">
                            <h4>
                                @if($lang == 'uz')
                                    Taomlar
                                @elseif($lang == 'ru')
                                    Блюды
                                @else
                                    Foods
                                @endif
                            </h4>
                            {{--                            @dd($menu)--}}
                            <ul>
                                @foreach($menu as $food)
                                    <li>

                                        <h5>{{$food->name}}</h5>
                                        <div style="display: grid; grid-template-columns: 150px 1fr 20px; gap: 20px">
                                            <img style="width: 150px" src="{{$food->foodimg}}">
                                            <p style="height: 120px; overflow: auto">{{$food->description}}</p>

                                            <span style="cursor: pointer" data-fooId="{{$food->id}}">${{$food->price}}
                                        <input type="checkbox" value="{{$food->foodid}}" class="selectFood"
                                               style="height: 20px">

                                        </span>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="utf_listing_amenities" class="utf_listing_section">
                    <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">
                        @if($lang == 'uz')
                            Qulayliklar
                        @elseif($lang == 'ru')
                            Удобствы
                        @else
                            Conveniences
                        @endif

                    </h3>
                    <ul class="utf_listing_features checkboxes margin-top-0">
                        @foreach($udob as $ud)
                            <li>{{$ud->nameuz}}</li>
                        @endforeach
                    </ul>
                </div>

                <div id="utf_listing_location" class="utf_listing_section">
                    <h3 class="utf_listing_headline_part margin-top-60 margin-bottom-40">
                        @if($lang == 'uz')
                            Joylashuv
                        @elseif($lang == 'ru')
                            Локация
                        @else
                            Location
                        @endif
                    </h3>
                    <div id="utf_single_listing_map_block">
                        <div id="map"
                             data-lat="{{$list->lat}}"
                             data-long="{{$list->long}}"></div>
                    </div>
                </div>
                <div id="utf_listing_reviews" class="utf_listing_section">
                    <h3 class="utf_listing_headline_part margin-top-75 margin-bottom-20">

                        @if($lang == 'uz')
                            Fikrlar
                        @elseif($lang == 'ru')
                            Отзивы
                        @else
                            Reviews
                        @endif
                        <span>({{count($comments) ?? 0}})</span></h3>
                    <div class="clearfix"></div>

                    <div class="comments utf_listing_reviews">
                        <ul>

                            @foreach($comments as $comment)
                                <li>
                                    <div class="avatar"><img
                                            src="https://eaten.uz/upload/user/{{$comment->img ?? 'mountain.png1700397534.png'}}"
                                            alt=""></div>
                                    <div class="utf_comment_content">
                                        <div class="utf_arrow_comment"></div>
                                        <div class="utf_star_rating_section" data-rating="4.5"></div>
                                        <div class="utf_by_comment">{{$comment->name}}<span class="date"><i
                                                    class="fa fa-clock-o"></i> {{$comment->created_at}}</span></div>
                                        <p>{{$comment->comment}}.</p>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="utf_pagination_container_part margin-top-30">

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="addreview" id="utf_add_review" class="utf_add_review-box">
                    <h3 class="utf_listing_headline_part margin-bottom-20">
                        @if($lang == 'uz')
                            Fikringizni yozib qoldiring
                        @elseif($lang == 'ru')
                            Добавьте свой отзыв
                        @else
                            Add Your Review
                        @endif

                    </h3>

                    <form id="utf_add_comment" class="utf_add_comment" action="/addreview" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="listing_id" value="{{$id}}">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="clearfix">
                                    @if($lang == 'uz')
                                        Sifat
                                    @elseif($lang == 'ru')
                                        Качество
                                    @else
                                        Quality
                                    @endif
                                </div>
                                <div class="utf_leave_rating">
                                    <input type="radio" name="quality" id="quality-1" value="1">
                                    <label for="quality-1" class="fa fa-star"></label>
                                    <input type="radio" name="quality" id="quality-2" value="2">
                                    <label for="quality-2" class="fa fa-star"></label>
                                    <input type="radio" name="quality" id="quality-3" value="3">
                                    <label for="quality-3" class="fa fa-star"></label>
                                    <input type="radio" name="quality" id="quality-4" value="4">
                                    <label for="quality-4" class="fa fa-star"></label>
                                    <input type="radio" name="quality" id="quality-5" value="5">
                                    <label for="quality-5" class="fa fa-star"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="clearfix">
                                    @if($lang == 'uz')
                                        Joylashuv
                                    @elseif($lang == 'ru')
                                        Локация
                                    @else
                                        Location
                                    @endif
                                </div>
                                <div class="utf_leave_rating">
                                    <input type="radio" name="location" id="location-1" value="1">
                                    <label for="location-1" class="fa fa-star"></label>
                                    <input type="radio" name="location" id="location-2" value="2">
                                    <label for="location-2" class="fa fa-star"></label>
                                    <input type="radio" name="location" id="location-3" value="3">
                                    <label for="location-3" class="fa fa-star"></label>
                                    <input type="radio" name="location" id="location-4" value="4">
                                    <label for="location-4" class="fa fa-star"></label>
                                    <input type="radio" name="location" id="location-5" value="5">
                                    <label for="location-5" class="fa fa-star"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="clearfix">
                                    @if($lang == 'uz')
                                        Maydon
                                    @elseif($lang == 'ru')
                                        Пространство
                                    @else
                                        Space
                                    @endif
                                </div>
                                <div class="utf_leave_rating">
                                    <input type="radio" name="space" id="space-1" value="1">
                                    <label for="space-1" class="fa fa-star"></label>
                                    <input type="radio" name="space" id="space-2" value="2">
                                    <label for="space-2" class="fa fa-star"></label>
                                    <input type="radio" name="space" id="space-3" value="3">
                                    <label for="space-3" class="fa fa-star"></label>
                                    <input type="radio" name="space" id="space-4" value="4">
                                    <label for="space-4" class="fa fa-star"></label>
                                    <input type="radio" name="space" id="space-5" value="5">
                                    <label for="space-5" class="fa fa-star"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="clearfix">
                                    @if($lang == 'uz')
                                        Xizmat
                                    @elseif($lang == 'ru')
                                        Услуга
                                    @else
                                        Service
                                    @endif
                                </div>
                                <div class="utf_leave_rating">
                                    <input type="radio" name="service" id="service-1" value="1">
                                    <label for="service-1" class="fa fa-star"></label>
                                    <input type="radio" name="service" id="service-2" value="2">
                                    <label for="service-2" class="fa fa-star"></label>
                                    <input type="radio" name="service" id="service-3" value="3">
                                    <label for="service-3" class="fa fa-star"></label>
                                    <input type="radio" name="service" id="service-4" value="4">
                                    <label for="service-4" class="fa fa-star"></label>
                                    <input type="radio" name="service" id="service-5" value="5">
                                    <label for="service-5" class="fa fa-star"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="clearfix">
                                    @if($lang == 'uz')
                                        Narx
                                    @elseif($lang == 'ru')
                                        Цена
                                    @else
                                        Price
                                    @endif
                                </div>
                                <div class="utf_leave_rating">
                                    <input type="radio" name="price" id="price-1" value="1">
                                    <label for="price-1" class="fa fa-star"></label>
                                    <input type="radio" name="price" id="price-2" value="2">
                                    <label for="price-2" class="fa fa-star"></label>
                                    <input type="radio" name="price" id="price-3" value="3">
                                    <label for="price-3" class="fa fa-star"></label>
                                    <input type="radio" name="price" id="price-4" value="4">
                                    <label for="price-4" class="fa fa-star"></label>
                                    <input type="radio" name="price" id="price-5" value="5">
                                    <label for="price-5" class="fa fa-star"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>

                        <fieldset>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>
                                        @if($lang == 'uz')
                                            FISH
                                        @elseif($lang == 'ru')
                                            ФИО
                                        @else
                                            Fullname
                                        @endif
                                        :</label>
                                    <input type="text" placeholder="Name" name="name" value="">
                                </div>
                                <div class="col-md-4">
                                    <label>Email:</label>
                                    <input type="text" placeholder="Email" name="email" value="">
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        @if($lang == 'uz')
                                            Mavzu
                                        @elseif($lang == 'ru')
                                            Тема
                                        @else
                                            Subject
                                        @endif

                                        :</label>
                                    <input type="text" placeholder="Subject" name="subject" value="">
                                </div>
                            </div>
                            <div>
                                <label>
                                    @if($lang == 'uz')
                                        Fikr matni
                                    @elseif($lang == 'ru')
                                        Отзыв
                                    @else
                                        Review
                                    @endif

                                    :</label>
                                <textarea cols="40" placeholder="Your Message..." name="comment" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="add-review-photos margin-bottom-30">
                                    <div class="photoUpload">
                                    <span>
                                        @if($lang == 'uz')
                                            Rasmni yuklash
                                        @elseif($lang == 'ru')
                                            Загрузить фото
                                        @else
                                            Upload
                                        @endif
                                        <i class="sl sl-icon-arrow-up-circle"></i>
                                    </span>
                                        <input name="img" type="file" class="upload">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <button class="button">
                            @if($lang == 'uz')
                                Yuborish
                            @elseif($lang == 'ru')
                                Отправить
                            @else
                                Send
                            @endif
                        </button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-4 margin-top-75 sidebar-search">
                @guest()
                    <div class="utf_box_widget booking_widget_box" >
                        <h3><i class="fa fa-calendar"></i>
                            @if($lang == 'uz')
                                Buyurtma berish
                            @elseif($lang == 'ru')
                                Заказать
                            @else
                                Booking
                            @endif
                            <div class="price">

                            </div>
                        </h3>
                        <div class="row with-forms margin-top-0">
                            <h4>Buyurtma qilish uchun avval tizimda ro'yxatdan o'ting</h4>
                        </div>
                        <!--<button class="like-button add_to_wishlist"><span class="like-icon"></span> Add to Wishlist</button>-->
                        <div class="clearfix"></div>
                    </div>
                @endguest

                @auth()
                <div class="utf_box_widget booking_widget_box">
                    <h3><i class="fa fa-calendar"></i>
                        @if($lang == 'uz')
                            Buyurtma berish
                        @elseif($lang == 'ru')
                            Заказать
                        @else
                            Booking
                        @endif
                        <div class="price">
                            <span class="itog">0</span> $
                        </div>
                    </h3>
                    <div class="row with-forms margin-top-0">
                        <form action="/booking" class="sendBooking">

                            <input name="listingid" hidden="true" value="{{$list->id}}">
                            <input name="orderitems" hidden="true" class="ordItems">
                            <div class="col-lg-12">
                                <div class="panel-dropdown">
                                    <label>Guest Count</label>
                                    <input type="number" name="guest_count" required value="1" placeholder="Guest count"
                                           id="guesCount">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 select_date_box">
                                <label>Visit Date</label>
                                <input type="datetime-local" name="datetime" required placeholder="Select Date">
                                <!--<i class="fa fa-calendar"></i>-->
                            </div>
                            <div class="row" style="padding: 35px">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Food</th>
                                        <th>Count</th>
                                        <th>Summ</th>
                                    </tr>
                                    </thead>
                                    <tbody class="orderFoods">
                                    <tr>

                                    </tr>
                                    </tbody>

                                </table>

                            </div>


                            <button type="button" class="utf_progress_button button fullwidth_block margin-top-5 formSubmitbtn">
                                @if($lang == 'uz')
                                    Buyurtma berish
                                @elseif($lang == 'ru')
                                    Заказать
                                @else
                                    Booking
                                @endif
                            </button>
                        </form>
                    </div>
                    <!--<button class="like-button add_to_wishlist"><span class="like-icon"></span> Add to Wishlist</button>-->
                    <div class="clearfix"></div>
                </div>
                @endauth
                <div class="utf_box_widget margin-top-35">
                    <h3><i class="sl sl-icon-phone"></i>
                        @if($lang == 'uz')
                            Xonadon egasi
                        @elseif($lang == 'ru')
                            Владелец дома
                        @else
                            The owner of the apartment
                        @endif
                    </h3>
                    <div class="utf_hosted_by_user_title"><a href="#" class="utf_hosted_by_avatar_listing"><img
                                src="/images/dashboard-avatar.jpg" alt=""></a>
                        <h4>
                            <a href="#">{{ $userInfo->firstname ?? 'Uncknown'}} {{ $userInfo->lastname ?? 'Uncknown'}}</a>
                            <span><i
                                    class="sl sl-icon-location"></i> {{$userInfo->address ?? 'Region not found'}}</span>
                        </h4>
                    </div>

                    <ul class="utf_listing_detail_sidebar">
                        <li><i class="sl sl-icon-map"></i> {{$userInfo->address2 ?? 'District not found'}}</li>
                        <li><i class="sl sl-icon-phone"></i> {{$userInfo->phone ?? 'Phone not found'}}</li>
                        <li><i class="fa fa-envelope-o"></i> <a
                                href="mailto:{{$userInfo->email ?? ''}}">{{$userInfo->email ?? 'Email not found'}}</a>
                        </li>
                    </ul>
                </div>

                <div class="utf_box_widget opening-hours margin-top-35">
                    <h3><i class="sl sl-icon-envelope-open"></i>
                        @if($lang == 'uz')
                            Shikoyat yo'llash
                        @elseif($lang == 'ru')
                            Форма жалобы
                        @else
                            Disput form
                        @endif
                    </h3>
                    <form id="contactform" method="post" action="/adddisput">
                        @csrf
                        <div class="row">


                            <input name="listing_id" type="number" value="{{$list->id}}" style="display:none">
                            <div class="col-md-12">
                                <input name="fullname" type="text" placeholder="Name" required="">
                            </div>
                            <div class="col-md-12">
                                <input name="email" type="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12">
                                <input name="phone" type="text" placeholder="Phone" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea name="disput" cols="40" rows="2" id="comments" placeholder="Your Message"
                                          required=""></textarea>
                            </div>
                        </div>


                        <button type="submit" class="submit button">
                            @if($lang == 'uz')
                                Yuborish
                            @elseif($lang == 'ru')
                                Отправить
                            @else
                                Send
                            @endif
                        </button>
                    </form>
                </div>

                <div class="utf_box_widget listing-share margin-top-35 margin-bottom-40 no-border" id="sharebox">
                    <h3><i class="sl sl-icon-share"></i>
                        @if($lang == 'uz')
                            Ulashish
                        @elseif($lang == 'ru')
                            Поделиться
                        @else
                            Share
                        @endif
                    </h3>
                    <ul class="utf_social_icon rounded margin-top-35">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        {{--        @dd($menu)--}}
    </div>
    <script src="/scripts/leaflet.js"></script>
    <script>

        let sFood = document.querySelectorAll('.selectFood')
        let orderFoods = document.querySelector('.orderFoods')
        let gusCount = document.querySelector('#guesCount')
        let fds = {!!$menu!!};
        let selectedFoods;
        let sfStatus = localStorage.getItem('sf') ? JSON.parse(localStorage.getItem('sf')).length : 0
        if (sfStatus <= 0) {
            localStorage.setItem('sf', JSON.stringify([]))
            selectedFoods = JSON.parse(localStorage.getItem('sf'))
        } else {
            selectedFoods = JSON.parse(localStorage.getItem('sf'))
        }

        sFood.forEach(f => {
            f.addEventListener('change', (e) => {
                selectedFoods.push(e.target.value)
                localStorage.setItem('sf', JSON.stringify(selectedFoods))
                let selFoods = JSON.parse(localStorage.getItem('sf')) ?? []

                let n = selFoods.map(f => {
                    let q = fds.find(s => s.foodid == f)
                    q.count = 1
                    q.description = ''
                    return q
                })
                localStorage.setItem('orderItems', JSON.stringify(n))
                SelFoodRender()
            })
        })


        function SelFoodRender() {
            let n = JSON.parse(localStorage.getItem('orderItems')) ?? []
            console.log(n)
            orderFoods.innerHTML = ''
            n = n.sort((a, b) => a.id - b.id)
            n.forEach(l => {
                let tr = document.createElement('tr')

                tr.innerHTML = `
                      <td>${l.name} - ${l.price} $</td>
                      <td width="80px"><input class="foodcount" style="height: 35px; margin-bottom: 0; padding: 0; padding-left: 15px" data-food="${l.id}" type="number" value="${l.count}"></td>
                      <td style="display: flex; align-items: center">${l.price * l.count} $</td>
            `
                orderFoods.append(tr)
            })
            document.querySelector('.itog').innerHTML = n.reduce((a, b) => (a + (b.count * b.price)), 0)
            document.querySelectorAll('.foodcount').forEach(ef => {
                ef.addEventListener('change', localDataconstructor)
            })
        }

        function localDataconstructor(e) {
            console.log(e.target.dataset.food)
            let n = JSON.parse(localStorage.getItem('orderItems'))
            let a = n.filter(l => l.id != e.target.dataset.food)
            let b = n.find(m => m.id == e.target.dataset.food)
            b.count = e.target.value

            let f = [b, ...a].sort((a, b) => a.id - b.id)

            localStorage.setItem('orderItems', JSON.stringify(f))
            SelFoodRender()

        }

        SelFoodRender()

        gusCount.addEventListener('change', () => {
            SelFoodRender()
        })


        let sendBookingForm = document.querySelector('.sendBooking')
        document.querySelector('.formSubmitbtn').addEventListener('click', () => {
            // e.preventDefault()
            console.log('asdasd')
            let orderData = {
                listingid: {!! $list->id !!},
                datetime: sendBookingForm.datetime.value,
                guest_count: sendBookingForm.guest_count.value,
                orderitems: JSON.parse(localStorage.getItem('orderItems')),
                summ: document.querySelector('.itog').innerText
            }

            console.log(orderData)
            localStorage.setItem('orderdata', JSON.stringify(orderData))
            // let fd = new FormData(sendBookingForm)
            // sendBookingForm.setFormData(fd)
            // setTimeout(() => {
            //     sendBookingForm.submit()
            // }, 100)
        })


        let mapcontainer = document.querySelector('#map')
        let lat = Number(mapcontainer.dataset.lat)
        let long = Number(mapcontainer.dataset.long)
        const map = L.map('map', {
            attributionControl: false
        }).setView([lat, long], 13);
        const attribution = '';
        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const tiles = L.tileLayer(tileUrl, {
            attribution
        });
        tiles.addTo(map);

        var marker = L.marker([lat, long]).bindPopup(`
                    <div>
                        <img width="100%" src="{{$list->img}}">
                         <h3>@if($lang == 'uz')
        {{$list->nameuz}}
        @elseif($lang == 'ru')
        {{$list->nameru}}
        @else
        {{$list->nameen}}
        @endif</h3>
                    </div>
            `).addTo(map);

        var popup = L.popup();
        var lant = marker.getLatLng();
        lant = marker.getLatLng();


    </script>
@endsection
