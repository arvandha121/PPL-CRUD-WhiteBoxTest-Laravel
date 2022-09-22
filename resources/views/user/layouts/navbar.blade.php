<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand px-3" href="/user/home">
            {{-- <img src="{{asset('assets/img/logo.png')}}" width="60" height="60" class="d-inline-block align-top" alt=""> --}}
            <span class="brand-text font-weight-light">TokoSepatu.Com</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="home">Produk</span></a>
                <a class="nav-item nav-link active" href="cart">Cart</span></a>
                <!-- <a class="nav-item nav-link" href="/logout">Logout</a> -->
                <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>