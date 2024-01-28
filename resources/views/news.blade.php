@extends('layouts.sitemain')

@section('content')

    <div class="container">
        <div class="blog-page">
            <div class="row">

              <h1>
                   @if($l == 'uz')
                                         {{$news->titleuz}}
                                     @elseif($l == 'ru')
                                         {{$news->titleru}}
                                     @else
                                         {{$news->titleen}}
                                     @endif
              </h1>
            <p>{{$news->date}}</p>
            <img src="{{$news->img}}">
            <hr>
            <div>
                @if($l == 'uz')
                                         {!! $news->descuz !!}
                                     @elseif($l == 'ru')
                                         {!! $news->descru !!}
                                     @else
                                         {!! $news->descen !!}
                                     @endif
            </div>
            </div>
        </div>
    </div>
    @endsection
