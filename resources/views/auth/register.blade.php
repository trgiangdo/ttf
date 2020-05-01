@extends('components.master_layout')
@section('title', 'Đăng Kí')
@section('content')

<main>
    <div class="sign-up">
        <div class="container">
            <div class="row">
                <div class="block-sign-up col-md-4 ">
                    <div class="text-center">
                        <h3>Đăng ký</h3>
                        <span><b>Tham gia TTF để quẩy tiếng anh nhiệt nào!</b></span>
                    </div>
                    <div class="fb-gg">
                        <a class="fix-a fb" href=""><i class="fab fa-facebook-f"></i>&nbsp;Facebook</a>
                        <a class="fix-a gg" href=""><i class="fab fa-google"></i>&nbsp;Google</a>
                    </div>
                    <form action="{{ route('register') }}" method="POST" class="form-group form-sign-up">
                        @csrf
                        <label for="email">Email*</label>
                        <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{old('email')}}" require>
                        @error('email')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <label for="password">Mật khẩu*</label>
                        <input id="password" class="form-control" type="password" placeholder="Mật khẩu" name="password" require>
                        @error('password')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <label for="password-confirm">Xác nhận mật khẩu*</label>
                        <input id="password-confirm" class="form-control" type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation"  require>

                        <label for="name">Họ và tên*</label>
                        <input id="name" class="form-control" type="text" placeholder="Họ và tên" name="name" value="{{old('name')}}" require>
                        @error('name')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <div>
                            <label for="">Giới tính*</label>
                            <br>
                            <input type="radio" name="sex" value="1" checked>Nam
                            <input type="radio" name="sex" value="2">Nữ
                        </div>
                        <label for="date">Ngày sinh*</label>
                        <input id="date"class="form-control" type="date" name="date" require>

                        <label for="address">Địa chỉ</label>
                        <input id="address" class="form-control" type="text" placeholder="Địa chỉ" name="address" value="{{old('address')}}">

                        <label for="phone">Số điện thoại di động*</label>
                        <input id="phone" class="form-control" type="number" placeholder="Số điện thoại di động" name="phone" value="{{old('phone')}}" require>
                        @error('phone')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <br><br>
                        <button class="form-control btn btn-warning" type="submit" name="submit"><b>ĐĂNG KÝ</b></button>
                    </form>
                </div>
                <div class="block-info col-md-8">
                    <div class="member">
                        <h3 class="info-title">Thành viên</h3>
                        <p>Hãy trở thành thành viên của TFF ngay bây giờ để có những trải nghiệm mới mẻ và vui vẻ, cùng nhau tiến bộ và xây dựng một cộng đồng học tiếng Anh lành mạnh.  -From adminH withS2.</p>
                        <div class="dk">
                            <h3 class="info-title">Các bước đăng ký</h3>
                            <div class="dk-cover">
                                <div class="dk1">
                                    <ul>
                                        <li>Bước 1: Chọn Facebook hoặc Google.</li>
                                        <li>Bước 2: Điền đầy đủ thông tin.</li>
                                        <li>Bước 3: Nhấn nút đăng ký.</li>
                                        <li>Bước 4: Hãy đăng nhập.</li>
                                        <li>Bước 5: Trong trường hợp không đăng kí được tài khoản hãy cho chúng tôi biết.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection