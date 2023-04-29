@extends('front.layouts.master')
@section('title','To Do Homework')
@section('content')
    <div class="col-md-9 col-lg-8 col-xl-7">
        @foreach($articles as $article)
            <div class="post-preview">
                <a href="{{route('single', [$article->getCategory->slug,$article->slug])}}"> <h2 class="post-title">{{$article->title}}</h2>

                    <img src="{{$article->image}}">

                    <h4 class="post-subtitle" >{!!str_limit($article->content,75) !!}</h4>

                </a>

                <p class="post-meta"> Kategori:
                    <a href="#">{{$article->getCategory->name}}</a>
                <p> <span class="float-right">{{$article->created_at->diffForHumans()}}</span></p>
                </p>
            </div>
            @if(!$loop->last)
                <hr class="my-4" />
            @endif
        @endforeach


            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
    </div>
@include('front.widgets.categoryWidget')
@endsection


