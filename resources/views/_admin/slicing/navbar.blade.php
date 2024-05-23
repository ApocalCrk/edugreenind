<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" id="timer">
        <!-- Timer -->
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ $identitas->alamat_website }}" target="_blank" role="button">
        <i class="fas fa-desktop"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="$('#logout_form').submit()" role="button">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>