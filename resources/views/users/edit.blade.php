@extends('components.master_layout')
@section('title', 'Chỉnh sửa quyền thành viên')

@section('content')

<main>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Chỉnh sửa quyền thành viên</h1>
		</div>
	</div>
	@if(session('status'))
		<div class="alert bg-success" role="alert">
			{{session('status')}}<a href="" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
	@endif
	<form action="{{route('user.updateRole', ['user'=>$user->id])}}" method="post" accept-charset="utf-8">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><i class="fas fa-user"></i> Sửa quyền thành viên - {{$user->email}}</div>
					<div class="panel-body">
						<div class="row justify-content-center" style="margin-bottom:40px">
							<div class="col-md-8 col-lg-8 col-lg-offset-2">
								<div class="form-group">
									<label>Quyền truy cập</label>
									<select name="role" class="form-control">
										<option value="0" @if($user->role==0) selected @endif>User</option>
										<option value="1" @if($user->role==1) selected @endif>Editor</option>
										<option value="2" @if($user->role==2) selected @endif>Admin</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
									<button class="btn btn-success"  type="submit">Sửa thành viên</button>
									<button class="btn btn-warning" type="reset">Đặt lại</button>
									<a href="{{route('user.index')}}" class="btn btn-danger">
										Quay lại
									</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</form>
</main>

@endsection
