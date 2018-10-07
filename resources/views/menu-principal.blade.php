<nav id="menu-principal" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="borda-menu-principal escondida" src="/borda-menu-principal.png" alt="Logo Boitatá">
                <div class="esconde-borda"></div>
                <img class="logo-menu-principal escondida" src="/logo-menu-principal.png" alt="Logo Boitatá">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="{{ Request::is('quem-somos') ? 'active' : '' }}" href="/quem-somos">QUEM SOMOS</a></li>
                <li><a class="{{ Request::is('portfolio') ? 'active' : '' }}" href="/portfolio">PORTFOLIO</a></li>
                <li><a class="{{ Request::is('contato') ? 'active' : '' }}" href="/contato">CONTATO</a></li>
                <li class="wrapper-social-media-menu">
                    @include ('partials.social-media-links')
                </li>
            </ul>
        </div>
    </div>
</nav>
