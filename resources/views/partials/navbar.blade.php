<nav id="nav"
    class="navbar  navbar-expand-lg navbar-light bg-white {{ request()->is('/') ? 'position-sticky top-0' : '' }} "
    style="z-index: 5">
    <div class="container">
        <a class="navbar-brand text-danger fw-bold" href="/">LaraPost</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }} " aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('category*') ? 'active' : '' }}" aria-current="page"
                        href="/category">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('author*') ? 'active' : '' }}" aria-current="page"
                        href="/author">Author</a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown ml-auto">
                        <a class="text-dark text-decoration-none dropdown-toggle  fw-bolder" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome Aqshola
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>

                        </ul>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login*') ? 'active' : '' }}" aria-current="page"
                            href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="container {{ request()->is('login*') || request()->is('register*') ? 'd-none' : '' }}">
    <form class="d-flex col-md-5" action="/">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-danger" type="submit">Search</button>
    </form>

</div>



<script>
    window.onscroll = function() {
        scrollCheck()
    }

    function scrollCheck(params) {
        if (
            document.body.scrollTop > 10 ||
            document.documentElement.scrollTop > 10
        ) {
            document.getElementById('nav').classList.add("shadow-sm");
        } else {
            document.getElementById('nav').classList.remove("shadow-sm");
        }

    }
</script>
