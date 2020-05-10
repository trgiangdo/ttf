@extends('components.master_layout')
@section('title', 'Chào mừng đến với TTF')
@section('content')
<!-- main -->
<main>
    <!-- ----------  slide  ---------- -->
    <div class="home-slide">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/welcome-slide1.jpg" alt="banner 1" style="width: 100%; height: 600px;">
                </div>
                <div class="item">
                    <img src="images/welcome-slide2.jpg" alt="banner 2" style="width: 100%; height: 600px;">
                </div>
                <div class="item">
                    <img src="images/welcome-slide3.jpg" alt="banner 3" style="width: 100%; height: 600px;">
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- ----------  slide  ---------- -->

    <!-- ----------  intro  ---------- -->
    <div class="home-intro">
        <div class="container">
            <div class="col-md-4">
                <img src="images/welcome-intro.png" alt="">
            </div>
            <div class="col-md-8">
                <p>
                    Vấn đề về Tiếng Anh nói chung và Toeic nói riêng đã và đang là một vấn đề ảnh hưởng trực tiếp tới các sinh viên Bách Khoa hiện tại. Có rất nhiều trang web cho phép các bạn sinh viên thi thử toeic nhưng chỉ giới hạn một số lượng đề rất ít và chưa thực sự sát với đề thi thực tế.
                </p>
                <p>
                    Với mong muốn tạo và giúp đỡ các bạn có được một môi trường luyện tập phong phú và tốt nhất, nhóm phát triển BKFET đã phát triển một trang web tổng hợp các đề thi toeic từ các nguồn tài liệu khác nhau, trong đó có rất nhiều đề có kiến thức, nội dung thi sát với đề thi nội bộ và một lượng lớn các đề thi trích từ các sách uy tín. Nhóm phát triển hy vọng đây sẽ là phần mềm hữu ích đối với các bạn sinh viên.

                </p>
                <p>
                    Mong rằng có thể nhận được nhiều ý kiến đóng góp để nhóm có thể có nhiều ý tưởng hơn trong tương lai, thiết thực hơn với các bạn sinh viên. Hi vọng mọi người có thể giành chút thời gian đánh giá để sản phẩm ngày càng hoàn thiện và tiện ích hơn.
                </p>
                <br>
                <a class="fix-a more" href="/about">Xem thêm</a>
            </div>
        </div>
    </div>
    <!-- ----------  intro  ---------- -->

    <!-- ----------  coures  ---------- -->
    <div class="home-coures">
        <a href="">
            <!-- <img src="images/banner-4.jpg" alt="banner 4"> -->
        </a>
    </div>
    <!-- ----------  coures  ---------- -->

    <!-- ----------  photos  ---------- -->
    <div class="container home-photos">
        <div class="photos-title text-center">
            Những hình ảnh đáng nhớ
        </div>
        <div class="photos-cover">
            <div class="photo">
                <a href=""><img src="images/welcome-img1.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img2.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img3.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img4.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img5.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img6.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img7.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
            <div class="photo">
                <a href=""><img src="images/welcome-img8.jpg" alt="" style="width: 270px; height: 170px;"></a>
            </div>
        </div>
    </div>
    <!-- ----------  photos  ---------- -->

    <!-- ----------  schools  ---------- -->
    <div class="container home-schools hidden">
        <div class="school-title text-center">
            CÁC TỔ CHỨC ĐỒNG HÀNH
        </div>
        <div class="schools">
            <div><img src="images/welcome-taitro.png" alt=""></div>
            <div><img src="images/welcome-taitro.png" alt=""></div>
            <div><img src="images/welcome-taitro.png" alt=""></div>
            <div><img src="images/welcome-taitro.png" alt=""></div>
            <div><img src="images/welcome-taitro.png" alt=""></div>
            <div><img src="images/welcome-taitro.png" alt=""></div>
        </div>
    </div>
    <!-- ----------  schools  ---------- -->
</main>
@endsection


@section('scripts')

<script src="js/slick/slick.js"></script>
<script src="js/style.js"></script>

@endsection