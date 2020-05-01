@extends('components.master_layout')
@section('title', 'Quản lý thành viên')

@section('content')

<main>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách thành viên</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							@if(session('status'))
								<div class="alert bg-success" role="alert">
									{{session('status')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
							@endif
							<table class="table table-bordered" style="margin-top:20px;">
								<thead>
									<tr class="bg-primary">
										<th width='18%'>Email</th>
										<th width='15%'>Tên đăng nhập</th>
										<th>Quyền truy cập</th>
										<th width='18%'>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>{{$user->email}}</td>
										<td>{{$user->name}}</td>
										<td>
											@if($user->role == 2)
												Admin
											@elseif($user->role == 1)
												Editor
											@else
												User
											@endif
										</td>
										<td>
											<a href="{{route('user.editRole', ['user' => $user->id])}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_{{$user->id}}"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											<div class="modal fade" id="exampleModal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_{{$user->id}}" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel_{{$user->id}}">Xóa thành viên</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form id="user_{{$user->id}}" action="{{route('user.destroy', ['user' => $user->id])}}" method="POST" accept-charset="utf-8">
															@csrf
															@method('delete')
															<div class="modal-body">
																<h4>Bạn có chắc chắn muốn xóa người dùng này</h4>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
																<button type="submit" class="btn btn-danger">Xóa</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div align='right'>
								<ul class="pagination">
									{{$users->links()}}
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection