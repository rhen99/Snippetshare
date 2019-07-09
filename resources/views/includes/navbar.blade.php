<nav class="z-depth-0">
    <div class="nav-wrapper amber lighten-1 ">

      <div class="container">
          <a href="#"  class="brand-logo black-text"><i class="material-icons">developer_mode</i>Snippetshare</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          @guest
              <li><a href="/" class=" black-text">Home</a></li>
              @else
              <li><a href="/feed" class=" black-text">Home</a></li>
              <li><a href="/upload" class=" black-text">Upload</a></li>
              <li><a href="/dashboard" class=" black-text">Dashboard</a></li>
              <li>
              <a class="btn brown darken-1" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
            <form action="{{route('logout')}}" id="logout-form" method="POST" style="display:none;">@csrf</form>
          @endguest
            
        </ul>
      </div>
    </div>
  </nav>