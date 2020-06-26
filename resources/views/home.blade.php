@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="span-border h4">
                    <span>Top Stories</span>
                </h2>
                <div class="row">

                    <div class="col-sm-12 col-md-3">
                        <article class="first mb-3">
                            <figure>
                                <a href="{{route('articles.show',$topStories[0]->slug)}}">
                                    <img class="img-fluid"
                                         alt="{{$topStories[0]->title}}"
                                         src="{{$topStories[0]->cover_image}}">
                                </a>
                            </figure>
                            <h3 class="entry-title mb-3">
                                <a href="{{route('articles.show',$topStories[0]->slug)}}">{{$topStories[0]->title}}</a>
                            </h3>
                            <div class="entry-excerpt">
                                <p class="entry-tit">
                                    {{$topStories[0]->summary}}
                                </p>
                            </div>
                            <div class="entry-meta align-items-center">
                                <a href="javascript:void(0)" class="text-capitalize">
                                    {{$topStories[0]->author->name}}
                                </a>
                                in
                                <a href="javascript:void(0)" class="text-capitalize">
                                    {{$topStories[0]->author->specification}}
                                </a>
                                <br>
                                <span>{{date('F d',strtotime($topStories[0]->created_at))}}</span>
                                <span class="middotDivider"> </span>
                                <span class="readingTime" title="{{$topStories[0]->reading_time}}">
                                    {{$topStories[0]->reading_time}}
                                </span>
                            </div>
                        </article>
                    </div>

                    @php
                        $top3Stories= $topStories->toArray();
                        array_shift($top3Stories);
                        array_pop($top3Stories);
                    @endphp
                    <div class="col-sm-12 col-md-6">
                        @foreach($top3Stories as $story)
                            <article>
                                <div class="mb-3 d-flex row">
                                    <figure class="col-4 col-md-4">
                                        <a href="{{route('articles.show',$story['slug'])}}">
                                            <img alt="{{$story['title']}}"
                                                 src="{{$story['cover_image']}}">
                                        </a>
                                    </figure>
                                    <div class="entry-content col-8 col-md-8 pl-md-0">
                                        <h5 class="entry-title mb-3">
                                            <a href="{{route('articles.show',$story['slug'])}}">{{$story['title']}}</a>
                                        </h5>
                                        <div class="entry-meta align-items-center">
                                            <a href="javascript:void(0)" class="text-capitalize">
                                                {{$story['author']['name']}}
                                            </a>
                                            in
                                            <a href="javascript:void(0)" class="text-capitalize">
                                                {{$story['author']['specification']}}
                                            </a>
                                            <br>
                                            <span>{{date('F d',strtotime($story['created_at']))}}</span>
                                            <span class="middotDivider"></span>
                                            <span class="readingTime"
                                                  title="{{$story['reading_time']}}">{{$story['reading_time']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <article class="first mb-3">
                            <figure>
                                <a href="{{route('articles.show',$topStories[0]->slug)}}">
                                    <img class="img-fluid"
                                         alt="{{$topStories[0]->title}}"
                                         src="{{$topStories[0]->cover_image}}">
                                </a>
                            </figure>
                            <h3 class="entry-title mb-3">
                                <a href="{{route('articles.show',$topStories[0]->slug)}}">{{$topStories[0]->title}}</a>
                            </h3>
                            <div class="entry-excerpt">
                                <p class="entry-tit">
                                    {{$topStories[0]->summary}}
                                </p>
                            </div>
                            <div class="entry-meta align-items-center">
                                <a href="javascript:void(0)" class="text-capitalize">
                                    {{$topStories[0]->author->name}}
                                </a>
                                in
                                <a href="javascript:void(0)" class="text-capitalize">
                                    {{$topStories[0]->author->specification}}
                                </a>
                                <br>
                                <span>{{date('F d',strtotime($topStories[0]->created_at))}}</span>
                                <span class="middotDivider"> </span>
                                <span class="readingTime" title="{{$topStories[0]->reading_time}}">{{$topStories[0]->reading_time}}</span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </div>
        <div class="divider"></div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="span-border h4">
                        <span>Most Viewed</span>
                    </h2>
                    <div class="row justify-content-between">

                      @foreach($mostViewedArticles as $mostViewedArticle)
                            <article class="col-md-6">
                                <div class="mb-3 d-flex row">
                                    <figure class="col-md-5">
                                        <a href="{{route('articles.show',$mostViewedArticle->slug)}}">
                                            <img alt="{{$mostViewedArticle->title}}"
                                                src="{{$mostViewedArticle->cover_image}}">
                                        </a>
                                    </figure>
                                    <div class="entry-content col-md-7 pl-md-0">
                                        <h5 class="entry-title mb-3">
                                            <a href="{{route('articles.show',$mostViewedArticle->slug)}}">
                                                {{$mostViewedArticle->title}}
                                            </a>
                                        </h5>
                                        <div class="entry-excerpt">
                                            <p class="over entry-tit">
                                                {{$mostViewedArticle->summary}}
                                            </p>
                                        </div>
                                        <div class="entry-meta align-items-center">
                                            <a href="#">{{$mostViewedArticle->author->name}}</a>
                                            in
                                            <a href="#"
                                               class="text-capitalize">{{$mostViewedArticle->author->specification}}</a><br>
                                            <span>{{date('F d',strtotime($mostViewedArticle->created_at))}}</span>
                                            <span class="middotDivider"></span>
                                            <span class="readingTime" title="{{$mostViewedArticle->reading_time}}">{{$mostViewedArticle->reading_time}}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>

            </div>
            <div class="divider-2"></div>
        </div>
@endsection
