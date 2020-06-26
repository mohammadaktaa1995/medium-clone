@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="span-border h4">
                    <span>{{$category->name}}</span>
                </h2>
                <div class="row justify-content-between">

                    @foreach($articles as $article)
                        <article class="col-md-6">
                            <div class="mb-3 d-flex row">
                                <figure class="col-md-5">
                                    <a href="{{route('articles.show',$article->slug)}}">
                                        <img alt="{{$article->title}}"
                                             src="{{asset($article->cover_image)}}"> </a>
                                </figure>
                                <div class="entry-content col-md-7 pl-md-0">
                                    <h5 class="entry-title mb-3">
                                        <a href="{{route('articles.show',$article->slug)}}">
                                            {{$article->title}}
                                        </a>
                                    </h5>
                                    <div class="entry-excerpt">
                                        <p class="over entry-tit">
                                            {{$article->summary}}
                                        </p>
                                    </div>
                                    <div class="entry-meta align-items-center">
                                        <a href="#">{{$article->author->name}}</a>
                                        in
                                        <a href="#"
                                           class="text-capitalize">{{$article->author->specification}}</a><br>
                                        <span>{{date('F d',strtotime($article->created_at))}}</span>
                                        <span class="middotDivider"></span>
                                        <span class="readingTime" title="{{$article->reading_time}}">{{$article->reading_time}}</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
