<header class="header" id="header">
    <div class="header_toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <div class="header_img">
        <img src="{{ asset('img/pp.jpg') }}" alt="profpict" width="30px" class="rounded-circle">
    </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <img src="{{ asset('img/msa-logo-w.png') }}" alt="MSA_LOGO" width="35px">
                <span class="nav_logo-name">My Story App</span>
            </a>
            <div class="nav_list">
                <a href="/menuadmin" class="nav_link active">
                    <i class='bx bx-home nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="/book" class="nav_link">
                    <i class='bx bx-book-bookmark nav_icon'></i>
                    <span class="nav_name">All Story</span> 
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-ghost nav_icon'></i>
                    <span class="nav_name">Genre</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-world nav_icon'></i>
                    <span class="nav_name">Country</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Users</span>
                </a>
                <a href="/" class="nav_link">
                    <i class='bx bx-face nav_icon'></i>
                    <span class="nav_name">Guest View</span>
                </a>
            </div>
        </div>
        <a href="#" class="nav_link">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
    </nav>
</div>