<div class="modal fade custom-width" id="modal-2">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Buka Hari & Jam Sewa</h4>
				</div>
				
				<div class="modal-body">
					<form class="form-horizontal"  action="{{ route('admin.slot.store') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('lapangan_id') ? ' has-error' : '' }}">
							<label for="lapangan_id" class="col-sm-2 control-label">Lapangan</label>

							<div class="col-sm-10">
								<select class="form-control" name="lapangan_id" id="lapangan_id">
									@foreach ($field_locations as $lapangan)
											<option value="{{ $lapangan->id }}">{{ $lapangan->name }}</option>
									@endforeach
								</select>

								@if ($errors->has('lapangan_id'))
										<span class="help-block">
												<strong>{{ $errors->first('lapangan_id') }}</strong>
										</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('rent_date') ? ' has-error' : '' }}">
								<label for="rent_date" class="col-sm-2 control-label">Tanggal Slot</label>

								<div class="col-sm-10">
								<input id="rent_date" name="rent_date" type="text" class="form-control" placeholder="Tanggal Slot Dibuka ex. {{ date('d-m-Y') }}" value="{{ old('rent_date') }}" required>

									@if ($errors->has('rent_date'))
											<span class="help-block">
													<strong>{{ $errors->first('rent_date') }}</strong>
											</span>
									@endif
								</div>
							</div>
						
							<div class="form-group{{ $errors->has('total_seat') ? ' has-error' : '' }}">
								<label for="total_seat" class="col-sm-2 control-label">Total Jam Sewa</label>

								<div class="col-sm-10">
									<input id="total_seat" name="total_seat" type="text" class="form-control" placeholder="Total Jam Penyewaan Dalam Sehari" value="{{ old('total_seat') }}" required>

									@if ($errors->has('total_seat'))
											<span class="help-block">
													<strong>{{ $errors->first('total_seat') }}</strong>
											</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
								<label for="start_time" class="col-sm-2 control-label">Jam Mulai Sewa</label>

								<div class="col-sm-10">
									<input id="start_time" name="start_time" type="text" class="form-control" placeholder="Jam Seat Penyewaan Mulai Tersedia" value="{{ old('start_time') }}" required>

									@if ($errors->has('start_time'))
											<span class="help-block">
													<strong>{{ $errors->first('start_time') }}</strong>
											</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
								<label for="price" class="col-sm-2 control-label">Harga Sewa</label>

								<div class="col-sm-10">
									<input id="price" name="price" type="text" class="form-control" placeholder="Jam Seat Penyewaan Mulai Tersedia" value="{{ old('price') }}" required>

									@if ($errors->has('price'))
											<span class="help-block">
													<strong>{{ $errors->first('price') }}</strong>
											</span>
									@endif
								</div>
							</div>
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	</form>