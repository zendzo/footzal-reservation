<header class="logo-env">

  <!-- logo -->
  <div class="logo">
    <a href="{{ route('home') }}" class="logo-expanded">
      <img src="{{ asset('Xenon/assets/images/logo-3-mazmur.png') }}" width="80" alt="" />
    </a>

    <a href="{{ route('home') }}" class="logo-collapsed">
      <img src="{{ asset('Xenon/assets/images/logo-3-mazmur.png') }}" width="80" alt="" />
    </a>
  </div>

  <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
  <div class="mobile-menu-toggle visible-xs">
    <a href="#" data-toggle="user-info-menu">
      <i class="fa-bell-o"></i>
      <span class="badge badge-success">7</span>
    </a>

    <a href="#" data-toggle="mobile-menu">
      <i class="fa-bars"></i>
    </a>
  </div>

  <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
  <div class="settings-icon">
    <a href="#" data-toggle="settings-pane" data-animate="true">
      <i class="linecons-cog"></i>
    </a>
  </div>

  
</header>