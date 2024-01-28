@extends('layouts.listingmain')

@section('content')
    <div class="fs-container">
        <div class="fs-inner-container content">
            <div class="fs-content">

                <!--<form action="/searchListing">-->
                <!--    <div class="search">-->
                <!--        <div class="row">-->
                <!--            <div class="col-md-12">-->
                <!--                <div class="row with-forms">-->

                <!--                    <div class="col-md-12 col-xs-12">-->
                <!--                        <div class="listing_filter_block">-->
                <!--                            <div class="col-fs-6">-->
                <!--                                <div class="input-with-icon"><i class="sl sl-icon-magnifier"></i>-->
                <!--                                    <input name="nomi" type="text" placeholder="{{getNT('site.searchtext')}}" value="">-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="col-fs-6">-->
                <!--                                <div class="intro-search-field utf-chosen-cat-single">-->
                <!--                                    <select name="region" class="selectpicker default" title="{{getNT('site.searchtext2')}}">-->
                <!--                                        @foreach($regions as $region)-->
                <!--                                            @if($lang == 'uz')-->
                <!--                                                <option value="{{$region->id}}">{{$region->nameuz}}</option>-->
                <!--                                            @elseif($lang == 'ru')-->
                <!--                                                <option value="{{$region->id}}">{{$region->nameru}}</option>-->
                <!--                                            @else-->
                <!--                                                <option value="{{$region->id}}">{{$region->nameen}}</option>-->
                <!--                                            @endif-->
                <!--                                        @endforeach-->
                <!--                                    </select>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="col-fs-5">-->
                <!--                                <div class="intro-search-field utf-chosen-cat-single">-->
                <!--                                        <select name="listType" class="selectpicker default">-->
                <!--                                            @foreach($listingTypes as $ListType)-->
                <!--                                                @if($lang == 'uz')-->
                <!--                                                    <option-->
                <!--                                                        value="{{$ListType->id}}">{{$ListType->nameuz}}</option>-->
                <!--                                                @elseif($lang == 'ru')-->
                <!--                                                    <option-->
                <!--                                                        value="{{$ListType->id}}">{{$ListType->nameru}}</option>-->
                <!--                                                @else-->
                <!--                                                    <option-->
                <!--                                                        value="{{$ListType->id}}">{{$ListType->nameen}}</option>-->
                <!--                                                @endif-->
                <!--                                            @endforeach-->
                <!--                                        </select>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="col-fs-5">-->
                <!--                                    <div class="intro-search-field utf-chosen-cat-single">-->
                <!--                                        <select name="category" class="selectpicker default">-->
                <!--                                            @foreach($cats as $cat)-->
                <!--                                                @if($lang == 'uz')-->
                <!--                                                    <option-->
                <!--                                                        value="{{$cat->id}}">{{$cat->nameuz}}</option>-->
                <!--                                                @elseif($lang == 'ru')-->
                <!--                                                    <option-->
                <!--                                                        value="{{$cat->id}}">{{$cat->nameru}}</option>-->
                <!--                                                @else-->
                <!--                                                    <option-->
                <!--                                                        value="{{$cat->id}}">{{$cat->nameen}}</option>-->
                <!--                                                @endif-->
                <!--                                            @endforeach-->
                <!--                                        </select>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="col-fs-2">-->
                <!--                                    <button class="button"><i class="fa fa-search"></i></button>-->
                <!--                                </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->

                <form action="/search" method="HEAD">
                    <div class="main_input_search_part" style="margin-top: 0">

                        <div class="main_input_search_part_item">
                            <select required name="region" class="selectpicker default" title="{{getNT('site.searchtext')}}">
                                @foreach($regions as $region)
                                    @if($lang == 'uz')
                                        <option value="{{$region->id}}">{{$region->nameuz}}</option>
                                    @elseif($lang == 'ru')
                                        <option value="{{$region->id}}">{{$region->nameru}}</option>
                                    @else
                                        <option value="{{$region->id}}">{{$region->nameen}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="main_input_search_part_item location">
                            <input required name="data" type="datetime-local" placeholder="{{getNT('site.searchtext2')}}" value="">
                            {{--                    <a href="#"><i class="sl sl-icon-location"></i></a>--}}
                        </div>

                        <div class="main_input_search_part_item">
                            <input required name="count" type="number" min="1" placeholder="{{getNT('site.searchtext4')}}" value="">
                        </div>
                        <!--<div class="main_input_search_part_item intro-search-field">-->
                        <!--    <select name="category" data-placeholder="{{getNT('site.searchtext3')}}"-->
                        <!--            class="selectpicker default"-->
                        <!--            title="{{getNT('site.searchtext3')}}"-->
                        <!--            data-selected-text-format="count" data-size="4">-->
                        <!--        @foreach($cats as  $ListType)-->
                        <!--            @if($lang == 'uz')-->
                        <!--                <option value="{{$ListType->id}}">{{$ListType->nameuz}}</option>-->
                        <!--            @elseif($lang == 'ru')-->
                        <!--                <option value="{{$ListType->id}}">{{$ListType->nameru}}</option>-->
                        <!--            @else-->
                        <!--                <option value="{{$ListType->id}}">{{$ListType->nameen}}</option>-->
                        <!--            @endif-->
                        <!--        @endforeach-->
                        <!--    </select>-->
                        <!--</div>-->
                        <button class="button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <section class="listings-container margin-top-30">
                    <div class="row fs-switcher">
                        <div class="col-md-12">
                            <p class="showing-results">{{count($listings)}} Results Found</p>
                        </div>
                    </div>
                    <div class="row fs-listings">
                        @foreach($listings as $listing)
                            <div class="col-lg-6 col-md-12 forGettting{{$listing->id}}">
                                <a href="/listing/{{$listing->id}}" class="utf_listing_item-container compact">
                                    <div class="utf_listing_item">
                                        <img src="{{$listing->img}}" alt="">
                                        <span class="tag" style="width: 150px; height: 80px; overflow: auto; top: 5px; right: 5px">
                                                <i class="im im-icon-Chef-Hat"></i>MENU<br>
                                                @foreach($listing->foods as $food)
                                                {{$food->name}} - {{$food->price}}$<br>
                                            @endforeach
                                            </span>
                                        <span class="utf_open_now">{{$listing->StatusName}}</span>
                                        <div class="utf_listing_item_content">
                                            <div class="utf_listing_prige_block">
                                                <span class="utf_meta_listing_price">
                                                    <i class="fa fa-tag"></i>
                                                    {{$listing->expry_date}}
                                                </span>
                                                <span class="utp_approve_item">
                                                    <i class="utf_approve_listing"></i>
                                                </span>
                                            </div>
                                            <h4 style="color:#fff">
                                                @if($lang == 'uz')
                                                    {{$listing->nameuz}}
                                                @elseif($lang == 'ru')
                                                    {{$listing->nameru}}
                                                @else
                                                    {{$listing->nameen}}
                                                @endif
                                            </h4>
                                            <span><i
                                                    class="fa fa-map-marker"></i>
                                                @if($lang == 'uz')
                                                    {{$listing->regionName}}. {{$listing->addressuz}}

                                                @elseif($lang == 'ru')
                                                    {{$listing->regionName}}. {{$listing->addressru}}
                                                @else
                                                    {{$listing->regionName}}. {{$listing->addressen}}
                                                @endif</span>
                                            <span><i class="fa fa-phone"></i> {{$listing->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="utf_star_rating_section" data-rating="{{$listing->rating}}">
                                        <div class="utf_counter_star_rating">({{$listing->rating}})</div>
                                        <span class="like-icon"></span>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="utf_pagination_container_part margin-top-20 margin-bottom-0">
                                        <!--<nav class="pagination">-->
                                        <!--    <ul>-->
                                        <!--        <li><a href="#"><i class="sl sl-icon-arrow-left"></i></a></li>-->
                                        <!--        <li><a href="#" class="current-page">1</a></li>-->
                                        <!--        <li><a href="#">2</a></li>-->
                                        <!--        <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>-->
                                        <!--    </ul>-->
                                        <!--</nav>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <div class="fs-inner-container map-fixed">
            <div id="utf_map_container">
                <div id="map" data-map-zoom="9" data-map-scroll="true"></div>
            </div>
        </div>
    </div>
    {{--@dd($locations)--}}

    <script src="/scripts/leaflet.js"></script>
    <script>
        let adresses = @json($locations);
        // console.log(adresses)
        const map = L.map('map', {
            attributionControl: false
        }).setView([39.655000, 66.977136], 13);
        const attribution = '';
        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const tiles = L.tileLayer(tileUrl, {
            attribution
        });
        tiles.addTo(map);
        adresses.forEach(item => {
            let lat = Number(item.lat)
            let lng = Number(item.lang)

            var marker = L.marker([lat, lng]).bindPopup(`
                    <div>
                        <img width="100%" src="${item.img}">
                         <h3>${item.title??'Title'}</h3>
                    </div>
            `).addTo(map);

            var popup = L.popup();
            var lant = marker.getLatLng();
            lant = marker.getLatLng();
            document.querySelector(".forGettting"+item.id).addEventListener('mouseenter', (e) => {
                marker.openPopup()
            })
        })
        if(localStorage.hasOwnProperty('latitude') & localStorage.hasOwnProperty('longitude')){
            map.flyTo([localStorage.getItem('latitude'), localStorage.getItem('longitude')],13,{ animation: true })
            localStorage.clear();
            // console.log(localStorage.getItem('latitude'), localStorage.getItem('longitude'),13)
        }


    </script>
@endsection
