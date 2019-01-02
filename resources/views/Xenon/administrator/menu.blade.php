<li class="{{ active(['admin.user.*','admin.role.*'],'opened active') }}">
    <a href="dashboard-1.html">
      <i class="linecons-user"></i>
      <span class="title">User</span>
    </a>
    <ul>
      <li class="{{ active('admin.user.index') }}">
        <a href="{{ route('admin.user.index') }}">
          <span class="title">All User</span>
        </a>
      </li>
      <li class="{{ active('admin.role.index') }}">
        <a href="{{ route('admin.role.index') }}">
          <span class="title">All Role</span>
        </a>
      </li>
    </ul>
</li>
<li class="{{ active(['admin.lapangan.*','admin.slot.*','admin.seat.*'],'opened active') }}">
  <a href="#">
    <i class="linecons-database"></i>
    <span class="title">Master Data</span>
  </a>
  <ul>
    <li class="{{ active('admin.lapangan.index') }}">
      <a href="{{ route('admin.lapangan.index') }}">
        <span class="title">Lapangan</span>
      </a>
    </li>
    <li class="{{ active('admin.slot.index') }}">
      <a href="{{ route('admin.slot.index') }}">
        <span class="title">Slot</span>
      </a>
    </li>
    <li class="{{ active('admin.seat.index') }}">
      <a href="{{ route('admin.seat.index') }}">
        <span class="title">Seat</span>
      </a>
    </li>
  </ul>
</li>
<li class="{{ active(['admin.order.*'],'opened active') }}">
  <a href="#">
    <i class="linecons-wallet"></i>
    <span class="title">Data Penyewaan</span>
  </a>
  <ul>
    <li class="{{ active('admin.order.list') }}">
      <a href="{{ route('admin.order.list') }}">
        <span class="title">Semua</span>
      </a>
    </li>
  </ul>
</li>
<li class="{{ active(['admin.report.*'],'opened active') }}">
    <a href="#">
      <i class="linecons-wallet"></i>
      <span class="title">Laporan</span>
    </a>
    <ul>
      <li class="{{ active('admin.report.index') }}">
        <a href="{{ route('admin.report.index') }}">
          <span class="title">Laporan Penyewaan</span>
        </a>
      </li>
      <li class="{{ active('admin.report.confirmed') }}">
        <a href="{{ route('admin.report.confirmed') }}">
          <span class="title">Sudah Konfirmasi</span>
        </a>
      </li>
      <li class="{{ active('admin.report.notConfirmed') }}">
        <a href="{{ route('admin.report.notConfirmed') }}">
          <span class="title">Belum Konfirmasi</span>
        </a>
      </li>
      <li class="{{ active('admin.report.rejected') }}">
        <a href="{{ route('admin.report.rejected') }}">
          <span class="title">Ditolak / Batal</span>
        </a>
      </li>
    </ul>
  </li>