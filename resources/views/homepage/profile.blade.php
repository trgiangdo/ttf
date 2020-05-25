@extends('components.master_layout')
@section('title', 'Trang cá nhân')
@section('content')

<main>
	@if(session('status'))
        <div class="alert bg-success" role="alert">
            {{session('status')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    @endif

    @if(session('error'))
        <div class="alert bg-danger" role="alert">
            {{session('error')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
	@endif

	<div class="container test">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#home"><b>Thông tin cá nhân</b></a></li>
			<li><a data-toggle="tab" href="#menu1"><b>Lịch sử học</b></a></li>
		</ul>
		<div class="tab-content" style="margin-bottom: 30px;">
			<div id="home" class="tab-pane fade in active" align="center">
				<div style="text-align: center; margin-bottom: 30px;">
					@if(empty(Auth::user()->avatar))
					<img style="width: 300px; height: 300px; border-radius: 50%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI9-QX1Tr4gXxhEeSxIj_aH7xVupa3mIMyrMiAVP1cJ6Sh3qtS&s" alt="">
					@else
					<img src="/{{Auth::user()->avatar}}" alt="">
					@endif
					<p><b>{{Auth::user()->name}}</b></p>
				</div>
				<table style="text-align: center; width: 80%" class="table table-border">
					<tr style="height: 50px;">
						<td width="20%" style="text-align: right;"><i class="far fa-envelope" ></i></td>
						<td width="10%" style="font-size: 18px;text-align: left;">Email:</td>
						<td width="70%"><b>{{Auth::user()->email}}</b></td>
					</tr>
					<tr style="height: 50px;">
						<td width="20%" style="text-align: right;"><i class="fas fa-home"></i></td>
						<td width="10%" style="font-size: 18px;text-align: left;">Address:</td>
						<td width="70%"><b>{{Auth::user()->address}}</b></td>
					</tr>
					<tr style="height: 50px;">
						<td width="20%" style="text-align: right;"><i class="fas fa-phone-volume"></i></td>
						<td width="10%" style="font-size: 18px;text-align: left;">Phonenumber:</td>
						<td width="70%"><b>{{Auth::user()->phone}}</b></td>
					</tr>
					<tr style="height: 50px;">
						<td width="20%" style="text-align: right;"><i class="fas fa-birthday-cake"></i></td>
						<td width="10%" style="font-size: 18px;text-align: left;">Date of birth:</td>
						<td width="70%"><b>{{Auth::user()->date}}</b></td>
					</tr>
					<tr style="height: 50px;">
						<td width="20%" style="text-align: right;"><i class="fas fa-birthday-cake"></i></td>
						<td width="10%" style="font-size: 18px;text-align: left;">Quyền hạn: </td>
						<td width="70%"><b>
							@if (Auth::user()->role == 0)
								Người dùng phổ thông
							@elseif (Auth::user()->role == 1)
								Quản lí nội dung
							@else
								Quản trị viên
							@endif
						</b></td>
					</tr>
				</table>
				<div align="center">
					<a class="fix-a sign in" style="background-color: #ffb366" href="/#" title="">Chỉnh sửa thông tin</a>
					<a  class="fix-a sign in" style="background-color: #ff6666;" href="{{ route('logout') }}"
					onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade" align="center">
				<h2> Lịch sử học</h2>
				<table class="table table-border">
					<tr>
						<td>Test</td>
						<td>Test date</td>
						<td>Listening correct answer</td>
						<td>Reading correct answer</td>
						<td>Final score</td>
					</tr>

					@foreach($exams as $exam)
					<tr>
						<td>{{ $exam->name }}</td>
						<td>{{ $exam->updated_at }}</td>
						<td>{{ $exam->scores->listening_correct_answers }}</td>
						<td>{{ $exam->scores->reading_correct_answers }}</td>
						<td>{{ $exam->scores->final_score }}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</main>

@endsection





