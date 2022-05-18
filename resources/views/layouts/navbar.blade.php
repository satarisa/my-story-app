<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3e5fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/msa-logo-1.png') }}" alt="MSA_LOGO" width="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="#">Browse</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Genre</a>
                            <ul class="dropdown-menu">
                                <li><a href="/genre/fantasy" class="dropdown-item">Fantasy</a></li>
                                <li><a href="/genre/comedy" class="dropdown-item">Comedy</a></li>
                                <li><a href="/genre/romance" class="dropdown-item">Romance</a></li>
                                <li><a href="/genre/action" class="dropdown-item">Action</a></li>
                                <li><a href="/genre/horror" class="dropdown-item">Horror</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Country</a>
                            <ul class="dropdown-menu">
                                <li><a href="/country/japan" class="dropdown-item">Japan</a></li>
                                <li><a href="/country/korea" class="dropdown-item">Korea</a></li>
                                <li><a href="/country/china" class="dropdown-item">China</a></li>
                                <li><a href="/country/indonesia" class="dropdown-item">Indonesia</a></li>
                                <li><a href="/country/other" class="dropdown-item">Other</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Author</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="#">About</a>
            </div>
            <div class="d-flex ms-auto">
                @if (!empty(session('user')))
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownProfile" role="button"
                            data-bs-toggle="dropdown">
                            @if (session('profile')->picture != null)
                            <img src="{{ asset('assets/profile_picture/'.session('profile')->picture) }}" alt="profpict"  style="width: 30px; height: 30px;" class="rounded-circle">
                            @else
                            <img src="{{ asset('img/user.png') }}" alt="profpict" width="30px" class="rounded-circle">
                            @endif
                            {{ session('user')->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                            <li><a class="dropdown-item" href="/profile/{{ session('user')->id }}">Profile</a></li>
                            @if (session('user')->role == 'admin')
                            <li><a class="dropdown-item" href="/menuadmin">Menu Admin</a></li>
                            @endif
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <a href="/login" class="nav-link text-muted">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>