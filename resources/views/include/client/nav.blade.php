  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{ route('home') }}" class="logo">
                          <img src="{{ asset('assets/client/images/logo.png') }}" alt="">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="{{ route('home') }}" class="{{ request()->is('home') ? 'active' : '' }}">Home</a>
                          </li>
                          <li><a href="{{ route('allChaines') }}"
                                  class="{{ request()->is('chaines') ? 'active' : '' }}">Chaines</a>
                          </li>
                          @if (Auth::check())
                              <li><a href="{{ route('favorites') }}"
                                      class="{{ request()->is('favorites') ? 'active' : '' }}">Favories</a></li>
                          @endif

                          @if (Auth::check())
                              <li><a href="{{ route('profil') }}"
                                      class="{{ request()->is('profil') ? 'active' : '' }}">Profil <img
                                          src="{{ asset('assets/client/images/default_pp.jpg') }}"
                                          alt=""></a></li>
                          @else
                              <div class="main-button">
                                  <a href="{{ route('login') }}">Connexion</a>
                              </div>
                          @endif
                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->
