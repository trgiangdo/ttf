@extends('components.master_layout')
@section('title', 'Đăng nhập')
@section('content')

<main>
    <div class="sign-in">
        <div class="block-sign-in">
            <div class="text-center">
                <h3>Đăng nhập</h3>
                <span>Tham gia TTF để quẩy tiếng anh nhiệt nào!</span>
            </div>
            <form class="form-group form-sign-in" action="{{ route('login') }}" method="post">
                @csrf
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mật khẩu">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Nhớ phiên đăng nhập
                </label>
                <button class="btn btn-warning" type="submit" name="submit"><b>ĐĂNG NHẬP</b></button>
            </form>
            <div class="text-center">
                Bạn chưa phải thành viên?
            </div>
            <a href="{{ route('register') }}" class="fix-a signup">
                ĐĂNG KÝ NGAY
            </a>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</main>

@endsection
