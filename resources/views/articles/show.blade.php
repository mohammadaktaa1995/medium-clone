@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="entry-header">
            <div class="mb-5">
                <h1 class="font-weight-bold">
                    {{$article->title}}
                </h1>
                <div class="entry-meta align-items-center mt-2">
                    <a class="author-avatar" href="#">
                        <div class="position-relative">
                            <img
                                height="50px"
                                width="50px"
                                data-toggle="tooltip"
                                data-placement="bottom" title="{{$article->author->name}}"
                                src="{{asset('img/avatar.png')}}">
                            <div class="position-absolute"
                                 style="width: calc(100% + 10px); height: calc(100% + 10px); top:-5px; left:-5px">
                                <svg viewBox="0 0 70 70" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.53538374,19.9430227 C11.180401,8.78497536 22.6271155,1.6 35.3571429,1.6 C48.0871702,1.6 59.5338847,8.78497536 65.178902,19.9430227 L66.2496695,19.401306 C60.4023065,7.84329843 48.5440457,0.4 35.3571429,0.4 C22.17024,0.4 10.3119792,7.84329843 4.46461626,19.401306 L5.53538374,19.9430227 Z">
                                    </path>
                                    <path
                                        d="M65.178902,49.9077131 C59.5338847,61.0657604 48.0871702,68.2507358 35.3571429,68.2507358 C22.6271155,68.2507358 11.180401,61.0657604 5.53538374,49.9077131 L4.46461626,50.4494298 C10.3119792,62.0074373 22.17024,69.4507358 35.3571429,69.4507358 C48.5440457,69.4507358 60.4023065,62.0074373 66.2496695,50.4494298 L65.178902,49.9077131 Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="text-capitalize">
                        {{$article->author->name}}
                    </a> in
                    <a href="#" class="text-capitalize">{{$article->author->specification}}</a><br>
                    <span>{{date('F d',strtotime($article->created_at))}}</span>
                    <span class="middotDivider"></span>
                    <span class="readingTime" title="{{$article->reading_time}}">{{$article->reading_time}}</span>
                    <span class="middotDivider"></span>

                    <span>{{$article->views}} Views</span>

                    <span class="middotDivider"></span>

                    <span>
                </div>
            </div>
        </div>
        <!--end single header-->
        <figure class="image zoom mb-5 text-center">
            <img alt="{{$article->title}}"
                 src="{{asset($article->cover_image)}}">
        </figure>
        <!--figure-->
        <article class="entry-wraper mb-5">
            <div class="entry-main-content overflow-hidden">
                <p>
                    {!! $article->body !!}
                </p>
            </div>
            <div class="tags">
                <div class="d-flex">
                    @foreach($article->tags as $tag)
                        <a href="/tag/{{$tag->name}}" class="badge badge-info mx-2">#{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <div class="post-author row-flex">
                            <div class="author-img">
                                <svg width="82" height="92" viewBox="0 0 82 92" class="fo ef mj mk ml mm ej">
                                    <path
                                        d="M1.58 26.29C8.86 11.67 23.78 1.65 41 1.65V.35C23.26.35 7.9 10.67.42 25.71l1.16.58zM41 1.65c17.22 0 32.14 10.02 39.42 24.64l1.16-.58C74.1 10.67 58.74.35 41 .35v1.3zm39.42 64.06C73.14 80.33 58.22 90.35 41 90.35v1.3c17.74 0 33.1-10.32 40.58-25.36l-1.16-.58zM41 90.35c-17.22 0-32.14-10.02-39.42-24.64l-1.16.58C7.9 81.33 23.26 91.65 41 91.65v-1.3z">
                                    </path>
                                </svg>
                                <img alt="{{$article->author->name}}" width="80px" height="80px"
                                     src="{{asset('img/avatar.png')}}">
                            </div>
                            <div class="author-content">
                                <div class="top-author">
                                    <small>
                                        <span>WRITTEN BY</span>
                                    </small>
                                    <h5 class="heading-font">
                                        <a href="#" title="{{$article->author->name}}" rel="author" class="text-capitalize">{{$article->author->name}}</a>
                                    </h5>
                                </div>
                                <span class="d-none d-md-block">{{$article->author->specification}}.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </article>
    </div>
@endsection
