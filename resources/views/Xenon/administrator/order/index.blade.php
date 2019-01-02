@extends('layouts.Xenon.master')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-color panel-success"><!-- Add class "collapsed" to minimize the panel -->
          <div class="panel-heading">
            <h3 class="panel-title">Data Booking {{ auth()->user()->fullName }}</h3>
          </div>
          
          <div class="panel-body">
            <table class="table">
                <thead>
                  <tr>
                    <th style="width: 5%;">#</th>
                    <th>Kode</th>
                    <th>Lokasi</th>
                    <th>Tanggal | Jam</th>
                    <th>Status</th>
                    <th>Member</th>
                    <th colspan="3"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($orders as $order)
                  <tr>
                      <td>{{ $order->id }}</td>
                      <td>
                        <a href="#" onclick="jQuery('#modalPayment-{{ $order->id }}').modal('show');" class="btn btn-icon btn-blue btn-xs">{{ $order->code }}</a>
                          @include('Xenon.administrator.order.payment_modal')
                      </td>
                      <td>{{ $order->seat->slot->lapangan->name }}</td>
                      <td>{{ $order->seat->slot->rent_date }} {{ $order->seat->rent_time }}</td>
                      <td>
                        @if ($order->paid)
                          <button class="btn btn-xs btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Telah Dibayar!" data-original-title="Status Pembayaran."><i class="fa fa-check"></i></button>
                        @else
                          <button class="btn btn-xs btn-red" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Belum Dibayar!" data-original-title="Status Pembayaran"><i class="fa fa-ban"></i></button>
                        @endif
                        @if ($order->confirmed)
                          <button class="btn btn-xs btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Telah DiKonfirmasi!" data-original-title="Status Konfirmasi."><i class="fa fa-check"></i></button>
                        @else
                          <button class="btn btn-xs btn-red" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Belum DiKonfirmasi!" data-original-title="Status Konfirmasi"><i class="fa fa-ban"></i></button>
                        @endif
                      </td>
                      <td>{{ $order->member->fullName }}</td>
                      <td>
                        @if (!$order->confirmed)
                          <a class="btn btn-xs btn-blue" href="#" onclick="event.preventDefault(); document.getElementById('verify-payment').submit();">
                            <i class="fa fa-check"></i> terima
                          </a>
                        
                          <form id="verify-payment" action="{{ route('admin.verify.payment') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="code" value="{{ $order->code }}">
                          </form>
                        @endif
                        @if ($order->paid && $order->confirmed && !$order->rejected)
                          <a class="btn btn-info btn-xs" href="#"><i class="fa fa-info"> selesai</i></a>
                        @else
                          @if (!$order->rejected)
                          <a class="btn btn-xs btn-red" href="#" onclick="event.preventDefault(); document.getElementById('reject-payment').submit();">
                            <i class="fa fa-remove"></i> tolak
                          </a>
                        
                          <form id="reject-payment" action="{{ route('admin.reject.payment') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="code" value="{{ $order->code }}">
                          </form>
                          @endif
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.order.show', $order->code) }}" class="btn btn-secondary btn-xs"><i class="fa fa-print"></i> Invoice</a>
                      </td>
                    </tr>
                  @empty
                  <tr>
                    <td class="text-center" colspan="8"><h2>Belum Ada Order</h2></td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
          </div>
        </div>
    </div>
    </div>
@endsection