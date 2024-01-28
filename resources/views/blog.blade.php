@extends('layouts.sitemain')

@section('content')

    <div class="container">
        <div class="blog-page">
            <div class="row">

                @foreach ($newses as $news)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="utf_blog_post">
                            <a href="/news/{{$news->id}}" class="utf_post_img"> 
                                <img src="{{$news->img}}" alt="" style="height: 300px; object-fit: cover"> 
                            </a>
                            <div class="utf_post_content">
                                <h3>
                                    <a href="/news/{{$news->id}}">
                                     @if($l == 'uz')
                                         {{$news->titleuz}}
                                     @elseif($l == 'ru')
                                         {{$news->titleru}}
                                     @else
                                         {{$news->titleen}}
                                     @endif
                                    
                                    </a>
                              </h3>
                                <ul class="utf_post_text_meta">
                                    <li>{{$news->date}}</li>
                                   
                                </ul>
                             
                                <a href="/news/{{$news->id}}" class="read-more">
                                     @if($l == 'uz')
                                         Batafsil
                                     @elseif($l == 'ru')
                                         Подробнее
                                     @else
                                         Read More
                                     @endif
                                    
                                     <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
    @endsection
