@extends('layouts.Xenon.horizontal_menu')

@section('content')
<div class="col-sm-12">
			
    <div class="panel panel-color panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Upload Bukti Pembayaran Booking {{ $order->seat->slot->lapangan->name }}</h3>
            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div class="panel-body">

            <form class="form-horizontal"  action="{{ route('member.payment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="code">Kode Booking:</label>
                    <input type="text" name="code" class="form-control" id="code" value="{{ $order->code }}">
                </div>

                <div class="form-group">
                    <label for="address">Lokasi Lapangan:</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ $order->seat->slot->lapangan->name }}">
                </div>

                <div class="form-group">
                    <label for="rent_date">Tanggal Jam:</label>
                    <input type="text" name="rent_date" class="form-control" id="rent_date" value="{{ $order->seat->slot->rent_date }} {{ $order->seat->rent_time }}">
                </div>

                <div class="form-group">
                    <label for="price">Harga:</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{ $order->seat->price }}">
                </div>

                <div class="form-group">
                    <label for="file">Bukti Pembayaran:</label>
                    <input type="file" name="file" class="form-control" id="file">
                </div>

                <div class="form-group">
                    <a href="{{ route('member.order.list') }}" class="btn btn-gray btn-single">Daftar Order</a>
                    <button type="submit" class="btn btn-info btn-single pull-right"><i class="fa fa-upload"></i> Upload</button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection