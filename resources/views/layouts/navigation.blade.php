<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <a class="btn" type="button" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
          {{ __('Log out') }}
        </a>
      </form>
      @endif
    </li>

</nav>