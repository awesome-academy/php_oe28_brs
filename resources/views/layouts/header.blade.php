<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="logo images">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex justify-content-start">
                        @if (Auth::user())
                            <li><a href="{{ route('index') }}">{{ trans('menus.home') }}</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-md-8 col-sm-8 col-5 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    @if (Auth::user())
                        <li><span class="text-light">{{ Auth::user()->full_name }}</span></li>
                        <li class="text-light ml-3">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-link text-light btn-sm">{{ trans('menus.logout') }}</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-light">{{ trans('menus.login') }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
