@extends('components.master_layout')
@section('title', 'Liên hệ')
@section('content')

<main>
    <div class="container contact-cont">
        <div class="row">
            <div class="col-md-6 contact-form">
                <form action="" method="post" accept-charset="utf-8">
                @csrf
                    <table class="contact-tab">
                        <thead>
                            <tr>
                                <th><h2>Liên hệ</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tab-tr">
                                <td colspan="2">Vui lòng gửi thông tin theo form dưới đây</td>
                            </tr>
                            <tr  class="form-group tab-tr">
                                <td class="td"><input class="form-control" type="text" name="name" placeholder="Họ và tên"></td>
                                <td><input  class="form-control" type="email" name="email" placeholder="Email"></td>
                            </tr>
                            <tr  class="form-group tab-tr">
                                <td colspan="2"><input  class="form-control" type="text" name="object" placeholder="Tiêu đề"></td>
                            </tr>
                            <tr  class="form-group tab-tr">
                                <td colspan="2"><textarea  class="form-control" rows="6" name="content" placeholder="Nội dung"></textarea></td>
                            </tr>
                            <tr class="tab-tr">
                                <td colspan="2"><button type="submit" class="btn btn-warning send">Gửi đi</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 contact-addr">
                <div class="address">
                    <h2>ĐỊA CHỈ LIÊN LẠC TTF</h2>
                    <h3>FROM BK WITH LOVE</h3>
                    <p><i class="fas fa-map-marker-alt"></i>Số xxx Đường xxx, Quận xxx, Thành phố xxx</p>
                    <p><i class="fas fa-phone-volume"></i>0395673xxx / 0334721xxx</p>
                    <p><i class="far fa-envelope"></i>testtoiecfreexxx@gmail.com</p>
                    <!-- <p><i class="fab fa-internet-explorer"></i>http://videvxinhxan.vn</p> -->
                    <h3>Theo dõi chúng tôi</h3>
                    <div class="share">
                        <div class="fb-gg text-center">
                            <a href="" title=""><i class="fab fa-facebook-square"></i></a>
                        </div>
                        <div class="fb-gg text-center">
                            <a href="" title=""><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="fb-gg text-center">
                            <a href="" title=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.688968692138!2d105.84344031479385!3d21.005101386011134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad5569f4fbf1%3A0x5bf30cadcd91e2c3!2zxJDhuqBJIEjhu4xDIELDgUNIIEtIT0EgQ-G7lE5HIFRS4bqmTiDEkOG6oEkgTkdIxKhB!5e0!3m2!1svi!2s!4v1571135787849!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</main>
@endsection