@extends('layouts.sitemain')

@section('content')

    <div class="container">
        <div class="blog-page">
            <div class="row">

                @foreach ($foods as $news)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="utf_blog_post">
                            <a href="/food/{{$news->id}}" class="utf_post_img"> 
                                <img style="height: 300px; object-fit: cover;" src="{{$news->img}}" alt=""> 
                            </a>
                            <div class="utf_post_content" style="display: flex; justify-content: space-between; align-items: center;">
                                <h3>
                                    <a href="/food/{{$news->id}}">
                                                    @if($lang == 'uz')
                                                        {{$news->nameuz}}
                                                    @elseif($lang == 'ru')
                                                        {{$news->nameru}}
                                                    @else
                                                        {{$news->nameen}}
                                                    @endif
                                    </a>
                                </h3>
                                <span style="background-color: #0c1347; color: #fff; padding: 5px 15px; border-radius: 10px; font-weight: 800"> {{$news->price}} $</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection