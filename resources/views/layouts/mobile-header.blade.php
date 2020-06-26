<div class="sticky-header fixed d-lg-none d-md-block">
    <div class="text-right">
        <div class="container mobile-menu-fixed pr-5">

            <h1 class="logo-small navbar-brand">
                <a href="/" class="logo text-capitalize">
                    <svg width="35" height="35" viewBox="5 5 35 35">
                        <path
                            d="M5 40V5h35v35H5zm8.56-12.63c0 .56-.03.69-.32 1.03L10.8 31.4v.4h6.97v-.4L15.3 28.4c-.29-.34-.34-.5-.34-1.03v-8.95l6.13 13.36h.71l5.26-13.36v10.64c0 .3 0 .35-.19.53l-1.85 1.8v.4h9.2v-.4l-1.83-1.8c-.18-.18-.2-.24-.2-.53V15.94c0-.3.02-.35.2-.53l1.82-1.8v-.4h-6.47l-4.62 11.55-5.2-11.54h-6.8v.4l2.15 2.63c.24.3.29.37.29.77v10.35z"></path>
                    </svg>
                </a>
            </h1>


            <a href="javascript:void(0)" class="menu-toggle-icon">
                <span class="lines"></span>
            </a>
        </div>
    </div>

    <div class="mobi-menu">
        <div class="mobi-menu__logo">
            <h1 class="logo navbar-brand">
                <a href="/" class="logo text-capitalize">
                    <svg width="35" height="35" viewBox="5 5 35 35">
                        <path
                            d="M5 40V5h35v35H5zm8.56-12.63c0 .56-.03.69-.32 1.03L10.8 31.4v.4h6.97v-.4L15.3 28.4c-.29-.34-.34-.5-.34-1.03v-8.95l6.13 13.36h.71l5.26-13.36v10.64c0 .3 0 .35-.19.53l-1.85 1.8v.4h9.2v-.4l-1.83-1.8c-.18-.18-.2-.24-.2-.53V15.94c0-.3.02-.35.2-.53l1.82-1.8v-.4h-6.47l-4.62 11.55-5.2-11.54h-6.8v.4l2.15 2.63c.24.3.29.37.29.77v10.35z"></path>
                    </svg>
                </a>
            </h1>
        </div>
        <form action="/search" method="get"
              class="menu-search-form d-lg-flex">
            <input type="text" class="search_field" placeholder="Search..." name="query">
        </form>
        <nav>
            <ul>
                <li class=""><a href="/">Home</a></li>
                @foreach($categories as $category)
                    <li class=""><a href="/category/top-stories">{{$category->name}}</a></li>
                @endforeach
                @guest
                    <li class=""><a href="/register">Sign up</a></li>
                    <li class=""><a href="/login">Login</a></li>
                @endguest
                @auth
                    @php($isCreatePage =\Route::currentRouteName()=='articles.create')
                    @if($isCreatePage)
                        <li>
                            <a href="#"
                               onclick="submitForm()"
                               class="mx-2 btn btn-green">Publish</a>
                        </li>
                    @else
                        <li>
                            <a href="/articles/create"
                               class="mx-2 ">Create Story</a>
                        </li>
                    @endif

                    <li>
                        <a class="" href="#">
                            {{\Auth::user()->name}}
                        </a>
                    </li>
                    <li>
                        <a href="/stories">Stories</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</div>
