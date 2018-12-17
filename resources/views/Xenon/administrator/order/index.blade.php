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
                    <th style="width: 2%;">#</th>
                    <th>Kode</th>
                    <th>Lokasi</th>
                    <th>Tanggal | Jam</th>
                    <th>Status</th>
                    <th>Member</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->code }}</td>
                      <td>{{ $order->seat->slot->lapangan->name }}</td>
                      <td>{{ $order->seat->slot->rent_date }} {{ $order->seat->rent_time }}</td>
                      <td>
                        @if ($order->paid)
                          <button class="btn btn-xs btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Telah Dibayar!" data-original-title="Status Pembayaran."><i class="fa fa-check"></i></button>
                        @else
                          <button class="btn btn-xs btn-red" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Order Belum Dibayar!" data-original-title="Status Pembayaran"><i class="fa fa-ban"></i></button>
                        @endif
                      </td>
                      <td>{{ $order->member->fullName }}</td>
                      <td>
                        @if (!$order->paid)
                          <button class="btn btn-xs btn-blue" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Klik Tombol Untuk Konfirmasi Pembayaran!" data-original-title="Konfirmasi Pembayaran."><i class="fa fa-check"></i></button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
    </div>
    </div>
@endsection