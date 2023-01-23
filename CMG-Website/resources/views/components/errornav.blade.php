<header>
    <nav id="navbars" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top flex-wrap align-items-center justify-content-center justify-content-md-between shadow-extra-large">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="Logo_CMG.png" width="80" height="40" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse" style="justify-content: space-around;">
          <ul class="nav nav-pills" style="display: inline-flex;">
            <li class="nav-item"><a href="{{ request()->routeIs('index') ? '#' : route('index') }}" class="nav-link {{ request()->routeIs('index') ? 'active' : 'linkmenu' }}">Home</a></li>
            <li class="nav-item"><a href="{{ request()->routeIs('corporate') ? '#' : route('corporate') }}" class="nav-link {{ request()->routeIs('corporate') ? 'active' : 'linkmenu' }}">Corporate</a></li>
            <li class="nav-item"><a href="{{ request()->routeIs('safety') ? '#' : route('safety') }}" class="nav-link {{ request()->routeIs('safety') ? 'active' : 'linkmenu' }}">Safety</a></li>
            <li class="nav-item"><a href="{{ request()->routeIs('portfolio') ? '#' : route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'active' : 'linkmenu' }}">Portfolio</a></li>
            <li class="nav-item"><a href="{{ request()->routeIs('resources') ? '#' : route('resources') }}" class="nav-link {{ request()->routeIs('resources') ? 'active' : 'linkmenu' }}">Resources</a></li>
            <li class="nav-item"><a href="{{ request()->routeIs('documentation') ? '#' : route('documentation') }}" class="nav-link {{ request()->routeIs('documentation') ? 'active' : 'linkmenu' }}">Documentation</a></li>
          </ul>
          </div>
        </div>
      </nav>
</header>
