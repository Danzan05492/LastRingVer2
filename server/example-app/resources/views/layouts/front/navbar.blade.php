<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}"><img src="/assets/front/images/version/market-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marketing-category.html">Marketing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marketing-category.html">Make Money</a>
                    </li>                   
                </ul>
                <style>
                    .market-header .form-inline .form-control.is-invalid{
                        border:2px solid red;
                    }
                </style>
                <form class="form-inline" method="GET" action="{{ route('search') }}">
                    <input name="s" class="form-control mr-sm-2 @error('s')is-invalid @enderror" type="text" placeholder="Введите поисковый запрос" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
                </form>
               
            </div>
        </nav>
    </div>
</header>