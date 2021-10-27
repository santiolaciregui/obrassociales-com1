<html>
  <head>
    
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </head>
  <body>
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
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{auth()->user()->nombre}}
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="dropdown-item" type="button" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
          {{ __('Log out') }}
        </a>
      </form>
      </div>
    </li>
    @endif

</nav>
</body>
</html>
