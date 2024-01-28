@extends('layouts.sitemain')

@section('content')

    <div class="container">
         <div class="utf_blog_post utf_single_post" style="display: flex; flex-direction: column; align-items: center">
              <img class="utf_post_img" src="{{$food->img}}" style="width: 500px; height: 400px; object-fit: cover;" alt="">
              <div class="utf_post_content">
                  <div style="display: flex; align-items: center; justify-content: space-between;">
                       <h3>
                     @if($lang == 'uz')
                                                        {{$food->nameuz}}
                                                    @elseif($lang == 'ru')
                                                        {{$food->nameru}}
                                                    @else
                                                        {{$food->nameen}}
                                                    @endif
                </h3>
                <span style="background-color: #0c1347; color: #fff; padding: 5px 15px; border-radius: 10px; font-weight: 800"> {{$food->price}} $</span>
                  </div>
               
               
                <p>
                     @if($lang == 'uz')
                                                        {{$food->descriptionuz}}
                                                    @elseif($lang == 'ru')
                                                        {{$food->descriptionru}}
                                                    @else
                                                        {{$food->descriptionen}}
                                                    @endif
                    </p>
               
              </div>
            </div>
    </div>
    @endsection
