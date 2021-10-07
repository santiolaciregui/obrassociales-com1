<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">
    <img src="/imagenes/logo.png" width="45" height="45" alt="">
  </a>



    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      @if(auth()->user()==null)
      <li class="nav-item">
        <a class="nav-link" href="/login">Log in</a>
      </li>
      @else
      <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                {{ __('Log out') }}
              </x-responsive-nav-link>
            </form>        
        @endif
      </li>
  
</nav>