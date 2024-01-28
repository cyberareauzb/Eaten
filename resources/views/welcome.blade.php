@extends('layouts.sitemain')
@section('content')
    <div class="intro">
        <div class="container">
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
            <div class="main_popular_categories">
                 <h3> {{getNT('site.catname')}}

                <ul class="main_popular_categories_list">
                     @foreach($cats as $cat)
                        <li> <a href="/search/{{$cat->id}}">
                      <div class="utf_box" style="padding-top: 0px;"> <img width="60px"
                                                                                      style="line-height: 0px"
                                                                                      src="{{$cat->img}}"
                                                                                      alt="category">
                        <p>
                               @if($lang == 'uz')
                                {{$cat->nameuz}}
                            @elseif($lang == 'ru')
                                {{$cat->nameru}}
                            @else
                                {{$cat->nameen}}
                            @endif
                            </p>
                      </div>
                    </a>
                  </li>
                    @endforeach


                </ul>
              </div>
        </div>
    </div>


    <section class="fullwidth_block padding-top-75 padding-bottom-70" data-background-color="#f9f9f9" >
        <div class="container">
            <div class="row slick_carousel_slider">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-bottom-45"> {{getNT('site.mostvisitplase')}}
                        <span>{{getNT('site.submostvisitplase')}}</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="simple_slick_carousel_block utf_dots_nav">
                            @foreach($listings as $listing)
                                <div class="utf_carousel_item">
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
                                                <h3 style="color: #fff">
                                                    @if($lang == 'uz')
                                                        {{$listing->nameuz}}
                                                    @elseif($lang == 'ru')
                                                        {{$listing->nameru}}
                                                    @else
                                                        {{$listing->nameen}}
                                                    @endif
                                                </h3>
                                                <span><i
                                                        class="fa fa-map-marker"></i>
                                                    {{$listing->regionName}}
                                                </span>
                                                <h5 style="color: #fff">
                                                    @if($lang == 'uz')
                                                        {{$listing->addressuz}}
                                                    @elseif($lang == 'ru')
                                                        {{$listing->addressru}}
                                                    @else
                                                        {{$listing->addressen}}
                                                    @endif
                                                </h5>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fullwidth_block margin-top-65 margin-bottom-75">
        <!--<div style="pos" id="particles-js"></div>-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-bottom-45">EATEN.UZ
                        <span>{{getNT('site.abouttextmain')}}</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <p>{{getNT('site.abouttext')}}</p>

                </div>
                <div class="col-md-6">
                    <img src="/images/uzbekguest.png" style="border-radius: 20px" alt="">
                </div>

            </div>
        </div>
    </section>
    <section class="utf_testimonial_part fullwidth_block padding-top-75 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="headline_part centered">{{getNT('site.wsoc')}} </h3>
                </div>
            </div>
        </div>
        <div class="fullwidth_carousel_container_block margin-top-20">
            <div class="utf_testimonial_carousel testimonials">
                @foreach($comments as $comment)
                    <div class="utf_carousel_review_part">
                        <div class="utf_testimonial_box">
                            <div class="testimonial">{{$comment->comment}}</div>
                        </div>
                        <div class="utf_testimonial_author"><img src="/images/userlogo.png" alt="">
                            <h4>{{$comment->name}} <span>{{$comment->subject}}</span></h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <script>
        var tpj = jQuery;
        var revapi4;
        tpj(document).ready(function () {
            if (tpj("#utf_rev_slider_block").revolution == undefined) {
                revslider_showDoubleJqueryError("#utf_rev_slider_block");
            } else {
                revapi4 = tpj("#utf_rev_slider_block").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "scripts/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 6000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "zeus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap"></div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 40,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 40,
                                v_offset: 0
                            }
                        },
                        bullets: {
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            style: "hermes",
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 6,
                            tmp: ''
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%"
                    },
                    responsiveLevels: [1200, 992, 768, 480],
                    visibilityLevels: [1200, 992, 768, 480],
                    gridwidth: [1180, 1024, 778, 480],
                    gridheight: [565, 900, 800, 800],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2200,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 25, 47, 48, 49, 50, 51, 55],
                        type: "mouse",
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });
        
        
//         particlesJS('particles-js',

//   {
//     "particles": {
//       "number": {
//         "value": 80,
//         "density": {
//           "enable": true,
//           "value_area": 800
//         }
//       },
//       "color": {
//         "value": "#0000ff"
//       },
//       "shape": {
//         "type": "circle",
//         "stroke": {
//           "width": 0,
//           "color": "#0000ff"
//         },
//         "polygon": {
//           "nb_sides": 5
//         },
//         "image": {
//           "src": "img/github.svg",
//           "width": 100,
//           "height": 100
//         }
//       },
//       "opacity": {
//         "value": 0.5,
//         "random": false,
//         "anim": {
//           "enable": false,
//           "speed": 1,
//           "opacity_min": 0.1,
//           "sync": false
//         }
//       },
//       "size": {
//         "value": 5,
//         "random": true,
//         "anim": {
//           "enable": false,
//           "speed": 40,
//           "size_min": 0.1,
//           "sync": false
//         }
//       },
//       "line_linked": {
//         "enable": true,
//         "distance": 150,
//         "color": "#0000ff",
//         "opacity": 0.4,
//         "width": 1
//       },
//       "move": {
//         "enable": true,
//         "speed": 6,
//         "direction": "none",
//         "random": false,
//         "straight": false,
//         "out_mode": "out",
//         "attract": {
//           "enable": false,
//           "rotateX": 600,
//           "rotateY": 1200
//         }
//       }
//     },
//     "interactivity": {
//       "detect_on": "canvas",
//       "events": {
//         "onhover": {
//           "enable": true,
//           "mode": "repulse"
//         },
//         "onclick": {
//           "enable": true,
//           "mode": "push"
//         },
//         "resize": true
//       },
//       "modes": {
//         "grab": {
//           "distance": 400,
//           "line_linked": {
//             "opacity": 1
//           }
//         },
//         "bubble": {
//           "distance": 400,
//           "size": 40,
//           "duration": 2,
//           "opacity": 8,
//           "speed": 3
//         },
//         "repulse": {
//           "distance": 200
//         },
//         "push": {
//           "particles_nb": 4
//         },
//         "remove": {
//           "particles_nb": 2
//         }
//       }
//     },
//     "retina_detect": true,
//     "config_demo": {
//       "hide_card": false,
//       "background_color": "#ffffff",
//       "background_image": "",
//       "background_position": "50% 50%",
//       "background_repeat": "no-repeat",
//       "background_size": "cover"
//     }
//   }

// );

    </script>
@endsection
