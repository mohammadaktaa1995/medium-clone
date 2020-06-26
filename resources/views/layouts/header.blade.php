<header id="header" class="d-lg-block d-none">
    <div class="container">
        <div class="align-items-center w-100">
            <h1 class="logo float-left navbar-brand">
                <a href="/" class="logo">
                    <svg width="35" height="35" viewBox="5 5 35 35">
                        <path
                            d="M5 40V5h35v35H5zm8.56-12.63c0 .56-.03.69-.32 1.03L10.8 31.4v.4h6.97v-.4L15.3 28.4c-.29-.34-.34-.5-.34-1.03v-8.95l6.13 13.36h.71l5.26-13.36v10.64c0 .3 0 .35-.19.53l-1.85 1.8v.4h9.2v-.4l-1.83-1.8c-.18-.18-.2-.24-.2-.53V15.94c0-.3.02-.35.2-.53l1.82-1.8v-.4h-6.47l-4.62 11.55-5.2-11.54h-6.8v.4l2.15 2.63c.24.3.29.37.29.77v10.35z"></path>
                    </svg>
                </a>
            </h1>
            <div class="header-right float-right w-50">
                <div class="d-inline-flex float-right text-right align-items-center">

                    @guest
                        <a href="/register" class="mx-2"><i
                                class="fa fa-user"></i> Sign up</a>
                        <a href="/login" class="mx-2"><i
                                class="fas fa-sign-in-alt"></i> Login</a>

                    @endguest
                    @auth
                        @php($isCreatePage =\Route::currentRouteName()=='articles.create')
                        @if($isCreatePage)
                            <a href="#"
                               onclick="submitForm()"
                               class="mx-2 btn btn-green">Publish</a>
                        @else
                            <a href="/articles/create"
                               class="mx-2 ">Create Story</a>
                        @endif

                        <div class="dropdown">
                            <a class="dropdown-toggle avatar" href="#" id="dropdownMenu2" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <img width="30px" height="30px" src="{{asset('img/avatar.png')}}"
                                     alt="{{\Auth::user()->name}}">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="#" class="dropdown-item">{{\Auth::user()->name}}</a>
                                <a href="/stories" class="dropdown-item">Stories</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endauth

                </div>
                <form action="/rticles/search" method="post"
                      class="search-form d-lg-flex float-right">
                    @csrf
                    <a href="javascript:void(0)" class="searh-toggle">
                        <i class="fa fa-search"></i> Search...
                    </a>
                    <input type="text" class="search_field" name="query">
                    <div class="search-result">
                      <span class="nav-arrow"></span>
                        <ul class="list-unstyled"></ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <nav id="main-menu" class="stick d-lg-block d-none scroll-to-fixed-fixed">
        <div class="container">
            <div class="menu-primary d-flex justify-content-center">
                <ul>
                    <li class=""><a href="/">Home</a></li>
                    @foreach($categories as $category)
                        <li class=""><a href="/category/{{$category->slug}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
