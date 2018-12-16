<div class="modal fade custom-width" id="modalEdit-{{ $lapangan->id}}">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Data Lapangan : {{ $lapangan->name }}</h4>
				</div>
				
				<div class="modal-body">
				<form class="form-horizontal"  action="{{ route('admin.user.update', $lapangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
  
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-sm-2 control-label">Nama</label>
  
                  <div class="col-sm-10">
                    <input id="name" name="name" type="text" class="form-control" placeholder="name" value="{{ $lapangan->name }}" required>
  
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-sm-2 control-label">Alamat</label>
    
                    <div class="col-sm-10">
                      <input id="address" name="address" type="text" class="form-control" placeholder="address address" value="{{ $lapangan->address  }}" required>
    
                      @if ($errors->has('address'))
                          <span class="help-block">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-sm-2 control-label">Keterangan</label>
    
                    <div class="col-sm-10">
                      <input id="description" name="description" type="text" class="form-control" placeholder="description" value="{{ $lapangan->description  }}" required>
    
                      @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
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