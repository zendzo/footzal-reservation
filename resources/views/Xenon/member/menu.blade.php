<li class="{{ active(['search.lapangan'],'active','opened') }}">
  <a href="layout-variants.html">
    <i class="linecons-location"></i>
    <span class="title">Lokasi Lapangan</span>
  </a>
  <ul>
    @foreach ($field_locations as $lap)
    <li class="{{ $lap->slug === request()->segment(2) ? 'active' : '' }}">
        <a href="{{ route('search.lapangan', $lap->slug) }}">
          <span class="title">{{ $lap->name }}</span>
        </a>
      </li>
    @endforeach
  </ul>
</li>

@if (auth()->check())
<li class="{{ active(['member.user.order'],'active','opened') }}">
    <a href="#">
      <i class="linecons-wallet"></i>
      <span class="title">My Booking</span>
    </a>
    <ul>
        <li class="{{ active('member.order.list') }}">
            <a href="{{ route('member.order.list') }}">
              <span class="title">Semua Booking</span>
            </a>
          </li>
      <li class="">
        <a href="layout-collapsed-sidebar.html">
          <span class="title">Sudah Verifikasi</span>
        </a>
      </li>
      <li class="">
        <a href="layout-static-sidebar.html">
          <span class="title">Berlum Verifikasi</span>
        </a>
      </li>
    </ul>
  </li>
@endif

@if (auth()->guest())
<li>
    <a href="">
      <i class="linecons-user"></i>
      <span class="title">User Area</span>
    </a>
    <ul>
      <li>
        <a href="{{ route('login') }}">
          <i class="linecons-key"></i>
          <span class="title">Login</span>
        </a>
      </li>
      <li>
          <a href="{{ route('register') }}">
            <i class="linecons-key"></i>
            <span class="title">Register</span>
          </a>
        </li>

    </ul>
  </li>
@endif