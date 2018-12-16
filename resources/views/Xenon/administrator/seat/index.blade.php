@extends('layouts.Xenon.master')

@section('content')
<div class="col-md-12">
				
  <div class="panel panel-default">
    <d iv class="panel-heading">
      <h3 class="panel-title">{{ config('app.name') }} - Seat Penyewaan</h3>
      
      <div class="panel-options">
        <a href="#">
          <i class="linecons-cog"></i>
        </a>
        
        <a href="#" data-toggle="panel">
          <span class="collapse-icon">&ndash;</span>
          <span class="expand-icon">+</span>
        </a>
        
        <a href="#" data-toggle="reload">
          <i class="fa-rotate-right"></i>
        </a>
        
        <a href="#" data-toggle="remove">
          &times;
        </a>
      </div>
    </d>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Lokasi Lapangan</th>
          <th>Tanggal Penyewaan</th>
          <th>Jam Penyewaan</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        @foreach ($seats as $seat)
            <tr>
              <td>{{ $seat->id }}</td>
              <td><a href="{{ route('admin.lapangan.show', $seat->slot->lapangan->id) }}">{{ $seat->slot->lapangan->name }}</a></td>
              <td>{{ $seat->slot->rent_date }}</td>
              <td>{{ $seat->rent_time }}</td>
              <td>
                <a href="#" onclick="jQuery('#modalEdit-{{ $seat->id }}').modal('show');" class="btn btn-icon btn-blue btn-xs"><i class="fa fa-edit"></i></a>
                {{-- @include('Xenon.administrator.seat.edit_modal') --}}
                <form method="POST" action="{{ route('admin.seat.destroy',$seat->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-icon btn-red btn-xs">
                       <i class="fa fa-remove"></i>
                    </button>
                 </form>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    <div class="vspacer v3"></div>
    <a href="#" onclick="jQuery('#modal-2').modal('show');" class="btn btn-info icon">
      <i class="fa fa-plus"></i><span> Add seat</span>
    </a>
    @include('Xenon.administrator.seat.create_modal')
  </div>
  
</div>
@endsection