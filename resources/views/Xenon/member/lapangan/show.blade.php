@extends('layouts.Xenon.horizontal_menu')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-color panel-info"><!-- Add class "collapsed" to minimize the panel -->
          <div class="panel-heading">
            <h3 class="panel-title">{{ $lapangan->name }}</h3>
          </div>
          
          <div class="panel-body">
            <p>Alamat {{ $lapangan->address }}</p>
            <blockquote>
              {{ $lapangan->description }}
            </blockquote>
          </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-color panel-success"><!-- Add class "collapsed" to minimize the panel -->
          <div class="panel-heading">
            <h3 class="panel-title">Penyewaan Telah Dibuka Selama {{ $lapangan->slots->count() }} Hari</h3>
          </div>
          
          <div class="panel-body">
            <table class="table">
                <thead>
                  <tr>
                    <th>Tanggal Sewa Dibuka</th>
                    <th>Jumlah Seat</th>
                    <th>Seat Disewa</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lapangan->slots as $slot)
                  <tr>
                      <td>{{ $slot->rent_date }}</td>
                      <td>{{ $slot->seats->count() }}</td>
                      <td>{{ $slot->seats->where('booked', true)->count() }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>

  <h3>Detail Slot Penyewaan {{ $lapangan->name }}</h3>
	<br />
  <div class="row">
			
      <div class="col-md-12">
        
        <ul class="nav nav-tabs nav-tabs-justified">
          @foreach ($lapangan->slots as $slot)
          <li class="{{ $loop->first ? 'active' : ''}}">
              <a href="#{{$slot->rent_date}}" data-toggle="tab">
                <span class="visible-xs"><i class="fa-home"></i></span>
                <span class="hidden-xs">{{ $slot->rent_date }}</span>
              </a>
            </li>
          @endforeach
        </ul>
        
        <div class="tab-content">
          @foreach ($lapangan->slots as $slot)
          <div class="tab-pane {{ $loop->first ? 'active' : ''}}" id="{{ $slot->rent_date}}">
            
              <div>
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Jam Sewa Dibuka</th>
                          <th>Status Booking</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($slot->seats as $seat)
                        <tr>
                            <td>{{ $seat->rent_time }}</td>
                            <td>
                              @if ($seat->booked)
                              <button class="btn btn-red" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="jam ini tidak tersedia, atau sudah terbooking!" data-original-title="Jam Sewa Tidak Tersedia">Tidak Tersedia</button>
                              @else
                              <button class="btn btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Jam ini tersedia untuk disewa!" data-original-title="Jam Sewa Tersedia!">Tersedia</button>
                              @endif
                            </td>
                            <td>
                              @if (!auth()->check())
                              <button class="btn btn-primay btn-icon">
                                <i class="fa-lock"></i>
                                <span>Login Untuk Booking</span>
                              </button>
                              @else
                                @if (!$seat->booked)
                                  <button class="btn btn-secondary btn-icon">
                                    <i class="fa-money"></i>
                                    <span>Booking Sekarang</span>
                                  </button>
                                @endif
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
              

              {{-- @foreach ($slot->seats as $seat)
              <div class="col-sm-3">
				
                  <div class="xe-widget xe-counter-block xe-counter-block-blue"  data-suffix="k" data-count=".num" data-from="0" data-to="310" data-duration="4" data-easing="false">
                    <div class="xe-upper">
                      
                      <div class="xe-icon">
                        <i class="linecons-clock"></i>
                      </div>
                      <div class="xe-label">
                        <strong class="num">{{ $seat->rent_time }}</strong>
                        <span>Daily Visits</span>
                      </div>
                      
                    </div>
                    <div class="xe-lower">
                      <div class="border"></div>
                      
                      <span>Bounce Rate</span>
                      <strong>51.55%</strong>
                    </div>
                  </div>
                  
                </div>
              @endforeach --}}
              
            </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection