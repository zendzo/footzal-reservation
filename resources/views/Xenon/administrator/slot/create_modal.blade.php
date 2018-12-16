<div class="modal fade custom-width" id="modal-2">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create New User</h4>
				</div>
				
				<div class="modal-body">
					<form class="form-horizontal"  action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<label for="username" class="col-sm-2 control-label">Username</label>

							<div class="col-sm-10">
								<input id="name" name="username" type="text" class="form-control" placeholder="username" value="{{ old('email') }}" required>

								@if ($errors->has('username'))
										<span class="help-block">
												<strong>{{ $errors->first('username') }}</strong>
										</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-sm-2 control-label">email</label>

								<div class="col-sm-10">
									<input id="email" name="email" type="text" class="form-control" placeholder="email address" value="{{ old('email') }}" required>

									@if ($errors->has('email'))
											<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
											</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password" class="col-sm-2 control-label">password</label>
	
									<div class="col-sm-10">
										<input id="password" name="password" type="password" class="form-control" placeholder="password" value="{{ old('password') }}" required>
	
										@if ($errors->has('password'))
												<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
												</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<label for="password" class="col-sm-2 control-label">Pass Confirmation</label>
		
										<div class="col-sm-10">
											<input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="password" value="{{ old('password') }}" required>
		
											@if ($errors->has('password'))
													<span class="help-block">
															<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif
										</div>
									</div>

								<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
										<label for="role" class="col-sm-2 control-label">User Role</label>
		
										<div class="col-sm-10">
											<select class="form-control" name="role" id="role">
												@foreach ($roles as $role)
														<option value="{{ $role->id }}">{{ $role->name }}</option>
												@endforeach
											</select>
		
											@if ($errors->has('role'))
													<span class="help-block">
															<strong>{{ $errors->first('role') }}</strong>
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