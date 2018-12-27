@extends('layouts.Xenon.horizontal_menu')

@section('content')
<h3 id="layout-variants">
  Daftar Lapangan {{ config('app.name') }}
  <br />
  <small>Lapangan Futsal Trimazmur</small>
</h3>

<div class="panel panel-default panel-headerless">
  
  <div class="panel-body layout-variants">

    <div class="row">
      @forelse ($lapangans as $lapangan)
      <div class="col-sm-4">

          <div class="layout-variant">
            <div class="layout-img">
              <a href="{{ route('lapangan.show',$lapangan->slug) }}">
                {{-- <img src="{{ asset('Xenon/assets/images/layouts/layout-sidebar.png') }}" /> --}}
                <img src="{{ asset('images/futsal-reservation.jpeg') }}" />
              </a>
            </div>
            <div class="layout-name">
              <a href="{{ route('lapangan.show',$lapangan->slug) }}">{{ $lapangan->name }}</a>
            </div>
            <ul class="layout-links">
              <li>
                <a class="btn btn-icon btn-primary" href="#" class="">
                  <b style="color: #ffff; font-size: 1.05em">SLOT TERSEDIA : {{ $lapangan->slots->count() }} HARI</b>
                </a>
              </li>
              <li>
                <a href="#" class=""><i class="fa fa-home"></i> {{ $lapangan->address }}</a>
              </li>
            </ul>
          </div>
  
        </div>
      @empty
        <div class="col-md-12">
          <h4 class="text-center">
            Data Tidak Tersedia
          </h4>
        </div>  
      @endforelse
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
          {{ $lapangans->links() }}
      </div>
    </div>

  </div>

</div>
@endsection