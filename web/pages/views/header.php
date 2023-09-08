<header>
    <div id="header-banner">
        <p class="d-none d-md-block">Dag Blog - we love
            <span class="dag-typer" id="dag-typer-banner" data-words="code.,servers.,linux." data-delay="125" data-colors="#a7535b,#bfd724,#ffc107"></span>
            <span style="font-size:1.2em;vertical-align:middle;" class="dag-cursor" data-cursorDisplay="|" data-owner="dag-typer-banner"></span>
        </p>
        <div id="social">
            <!-- <a href="#" target="_blank"><i class="fa-brands mx-3 fa-youtube"></i></a> -->
            <a href="#" target="_blank"><i class="fa-brands mx-3 fa-twitter"></i></a>
            <a href="https://github.com/ilDug" target="_blank"><i class="fa-brands mx-3 fa-github"></i></a>
            <a href="https://www.buymeacoffee.com/ilDug" target="_blank"><i class="fa-regular mx-3 fa-cup-togo"></i></a>
        </div>
    </div>
    <div id="header-wrap">

        <div id="header-logo">
            <a href="/blog/"><img src="/blog/assets/images/dag-tech-logo-sq.png" alt="" class="img-fluid">

                <span class="underlined">Dag Blog</span>
            </a>
        </div>
        <nav class="" id="nav">
            <a href id="menu-o-close"><i class="fal fa-times fa-2x"></i></a>
            <ul>
                <a href="/blog/">
                    <li class="" id="nav-about">
                        <i class="fa-duotone fa-square-terminal mr-1"></i>
                        blog
                    </li>
                </a>
                <a href="/blog/search">
                    <li class="" id="nav-about">
                        <i class="fa-duotone fa-magnifying-glass mr-1"></i>
                        search
                    </li>
                </a>
            </ul>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->


        </nav>
        <div id="header-actions">
            <a href="#" id="header-menu-btn" class="header-action-btn">
                <i class="fal fa-bars"></i>
            </a>
            <a id="header-main-btn" class="header-action-btn" data-bs-toggle="offcanvas" href="#offcanvasDag" role="button" aria-controls="offcanvasDag">
                <i class="fa-brands fa-rebel text-white"></i>
            </a>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDag" aria-labelledby="offcanvasDagLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDagLabel">Dag Blog</h5>
            <button type="button" class="btn-close text-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-4 pt-0">
            <hr class="text-white-50">

            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item col-6">
                    <a class="nav-link py-2 px-0" href="#" target="_blank">
                        <i class="fa-brands fa-twitter"></i>
                        <small class="ms-2">Twitter @ilDug</small>
                    </a>
                </li>
                <!-- <li class="nav-item col-6">
                    <a class="nav-link py-2 px-0" href="#" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                        <small class="ms-2">YouTube</small>
                    </a>
                </li> -->
                <li class="nav-item col-6">
                    <a class="nav-link py-2 px-0" href="https://github.com/ilDug" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        <small class="ms-2">GitHub @ilDug</small>
                    </a>
                </li>
            </ul>


            <hr class="text-white-50">

            <p data-toggle="tooltip" title="Buy me a coffee" class="text-center mb-4 text-muted">
                <a href="https://www.buymeacoffee.com/ilDug" target="_blank">
                    <span style="width:3rem; display:inline-block;">
                        <img src="/blog/assets/images/bmc-logo.svg" alt="buy me a coffee" class="img-fluid">
                    </span>
                    <br>
                    <em class="text-muted">buy me a coffee!</em>
                </a>
            </p>


            <hr class="text-white-50">

            <form class="d-flex" role="search" method="get" action="/blog/search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>

        </div>

    </div>
</header>