@extends('layouts.Xenon.horizontal_menu')

@section('content')
<div class="col-sm-12">
  <div class="panel panel-color panel-success"><!-- Add class "collapsed" to minimize the panel -->
    <div class="panel-heading">
      <h3 class="panel-title">Data Booking {{ auth()->user()->fullName }}</h3>
    </div>
    
    <div class="panel-body">
      <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Booking</th>
              <th>Lokasi</th>
              <th>Untuk Tanggal | Jam</th>
              <th>Harga</th>
              <th>Status Bayar</th>
              <th>Status Konfirmasi</th>
              <th>Upload Pembayaran</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($myOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->code }}</td>
                <td>{{ $order->seat->slot->lapangan->name }}</td>
                <td>{{ $order->seat->slot->rent_date }} {{ $order->seat->rent_time }}</td>
                <td>{{ $order->seat->price }}</td>
                <td>
                  @if ($order->paid)
                  <button class="btn btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Telah Dibayar!" data-original-title="Status Pembayaran."><i class="fa fa-check"></i> Telah Dibayar</button>
                  @else
                  <button class="btn btn-red" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Belum Dibayar!" data-original-title="Status Pembayaran"><i class="fa fa-ban"></i> Belum Dibayar</button>
                  @endif
                </td>
                <td>
                  @if ($order->confirmed)
                  <button class="btn btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Telah Dikonfirmasi!" data-original-title="Status Pembayaran."><i class="fa fa-check"></i> Telah Dikonfirmasi</button>
                  @else
                  <button class="btn btn-red" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Belum Dikonfirmasi!" data-original-title="Status Pembayaran"><i class="fa fa-ban"></i> Belum Dikonfirmasi</button>
                  @endif
                </td>
                <td>
                  @if (!$order->paid)
                  <a href="{{ route('member.payment.create', $order->code) }}" class="btn btn-icon btn-blue btn-xs">
                    <i class="fa fa-upload"></i> Upload Pembayaran
                  </a>
                  @else
                  <a href="#" class="btn btn-info"><i class="fa fa-info"></i> Pembayaran Selesai</a>
                  @endif
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
@endsection