<nav class="navbar navbar-default _fixed-header _light-header stricky" id="main-navigation-wrapper">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">
                <img alt="Awesome Image" src="{{asset('assets/img/logo.png')}}" class="default-logo">
                <img src="{{asset('assets/img/logo2.png')}}" alt="Awesome Logo" class="secondary-logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="nav navbar-nav ">
                @foreach($nav['header'] as $path => $values)
                    <li>
                        <a href='{{$values['path']}}' class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">{{$values['name']}}</a>
                        <ul class="dropdown-submenu dropdown-menu">
                            @isset($values['children'])
                                @foreach($values['children'] as $item)
                                    <li><a href="{{$item['path']}}">{{$item['name']}}</a></li>
                                @endforeach
                            @endisset
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
