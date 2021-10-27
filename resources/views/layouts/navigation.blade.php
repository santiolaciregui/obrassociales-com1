<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
  <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!--https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbyGQsIO9s_qUn08pnW9tAxAQamirK8ibwQw&usqp=CAU -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      @if(auth()->user()==null)
      <li class="nav-item">
        <a class="nav-link" href="/login">Log in</a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{auth()->user()->nombre}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if(Auth::user()->hasRole('cliente') || Auth::user()->hasRole('familiar'))
          <a href="{{route('client.update', ['id' => Auth::user()->id])}}" class="btn btn-light">Modificar mis datos</a>
          @endif
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                {{ __('Log out') }}
              </x-responsive-nav-link>
            </form>
          </a>
        </div>
        @endif
      </li>
    </ul>
  </div>
</nav>