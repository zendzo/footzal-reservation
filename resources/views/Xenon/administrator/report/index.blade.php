@extends('layouts.Xenon.master')

@section('script')
<script type="text/javascript">
  jQuery(document).ready(function($)
  {
    $('#report-datatable').DataTable({
      searching: false,
      responsive: true,
      "aaSorting" : [[0,"desc"]],
      dom: 'Bfrtip',
        buttons: [
            { 
              extend:'copy', 
              attr: { id: 'allan' },
              text:      '<i class="fa fa-files-o"></i> Copy',
              titleAttr: 'Copy rows to clipboard',
              exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
              },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'Data Order Report',
                title: 'Data Order ' + '{{ config('app.name') }}',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'Export rows to PDF format',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                },
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i> CSV',
                titleAttr: 'Export rows to CSV format',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                },
                title: 'Data Order ' + '{{ config('app.name') }}'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Export rows to Excel format',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                },
                title: 'Data Order ' + '{{ config('app.name') }}'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> Print',
                titleAttr: 'Print rows',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                },
                title: 'Data Order ' + '{{ config('app.name') }}'
            },
        ]
    });
  });
  </script>
  <script src="{{ asset('Xenon/assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{ asset('Xenon/assets/js/datatables/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('Xenon/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
  <script src="{{ asset('Xenon/assets/js/datatables/tabletools/dataTables.tableTools.min.js') }}"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>
@endsection

@section('css')
  <!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
    <!-- Basic Setup -->
			<div class="panel panel-color panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Data Konfrimasi Order</h3>
          </div>
          <div class="panel-body">
            
            <table id="report-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th style="width: 5%;">#</th>
                      <th>Kode</th>
                      <th>Lokasi</th>
                      <th>Tanggal | Jam</th>
                      <th>Status Bayar</th>
                      <th>Status Konfrimasi</th>
                      <th>Member</th>
                    </tr>
              </tr>
              </thead>
            
              <tfoot>
                <tr>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Kode</th>
                        <th>Lokasi</th>
                        <th>Tanggal | Jam</th>
                        <th>Status Bayar</th>
                        <th>Status Konfrimasi</th>
                        <th>Member</th>
                      </tr>
                </tr>
              </tfoot>
            
              <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th>{{ $order->id }}</th>
                    <th>{{ $order->code }}</th>
                    <td>{{ $order->seat->slot->lapangan->name }}</td>
                    <td>{{ $order->seat->slot->rent_date }} {{ $order->seat->rent_time }}</td>
                    <td>{{ $order->paid ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                    <td>{{ $order->confirmed ? 'Sudah Konfirmasi' : 'Belum Konfirmasi' }}</td>
                    <td>{{ $order->member->fullName }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            
          </div>
        </div>
@endsection