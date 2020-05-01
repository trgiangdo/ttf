@extends('components.master_layout')
@section('title', 'About')
@section('content')

<main>
    <div class="container test">

        @include('components.nav_bar_about_us')

        <div class="col-md-8 block-content">
            <div>
                <h2>GIỚI THIỆU BKFET Lab</h2>
                <div class="introduction">
                    <img src="images/introduction-history-timeline.png" alt="">
                    <p>
                        BkFet Lab khởi đầu với ý tưởng giúp đỡ các bạn sinh viên gặp khó khăn trong việc đạt được mục tiêu trong kì thi TOIEC. Dưới sự hướng dẫn của thầy cô và sự đóng góp của nhóm phát triển web BKFET Lab đã thiết kế  và đưa vào ứng dụng một trang web với mục đích dành cho các bạn sinh viên Bách Khoa nói riêng và toàn thể học sinh sinh viên nói chung có một môi trường thi thử toeic miễn phí.
                        <br><br>
                        Toàn bộ đề thi của trang web được tổng hợp từ các sách luyện thi toeic hàng đầu và từ nguồn gửi về của các bạn sinh viên, rất mong nhận được sự đánh giá và ý kiến đóng góp từ các bạn.
                        <br><br>
                        Trong thời gian tới nhóm phát triển BKFet Lab sẽ có những cải tiến và những dịch vụ tốt hơn đến các bạn.
                    </p>
                </div>
            </div>
            <div class="padding-top" id="div_2">
                <h2>GIỚI THIỆU KÌ THI TOIEC</h2>
                <img src="images/introduction-mucdich.png" alt="">
                <div class="introduction">
                    TOEIC (viết tắt của Test of English for International Communication – Bài kiểm tra tiếng Anh giao tiếp quốc tế) là một bài thi nhằm đánh giá trình độ sử dụng tiếng Anh dành cho những người sử dụng tiếng Anh như một ngoại ngữ (không phải tiếng mẹ đẻ), đặc biệt là những đối tượng muốn sử dụng tiếng Anh trong môi trường giao tiếp và làm việc quốc tế. Kết quả của bài thi TOEIC phản ánh mức độ thành thạo khi giao tiếp bằng tiếng Anh trong các hoạt động như kinh doanh, thương mại, du lịch… Kết quả này có hiệu lực trong vòng 02 năm và được công nhận tại nhiều quốc gia trong đó có Việt Nam.
                </div>
            </div>
            <div class="padding-top" id="div_3">
                <h2>ĐỐI TƯỢNG DỰ THI</h2>
                <div class="introduction">
                    <img src="images/introduction-doituong.png" alt="">
                    <p>
                        Chứng chỉ TOEIC nổi lên như một tiêu chuẩn phổ biến hơn để đánh giá trình độ thông thạo tiếng Anh của người lao động. Nhiều trường Đại học, Cao đẳng đã đưa TOEIC vào chương trình giảng dạy và lựa chọn bài thi TOEIC để theo dõi sự tiến bộ trong việc học tiếng Anh đối với sinh viên theo từng học kỳ, năm học hoặc sử dụng làm chuẩn đầu ra tiếng Anh cho sinh viên tốt nghiệp. Chính vì những lý do đó nên việc học TOEIC, luyện thi TOEIC và tham dự kỳ thi TOEIC đóng vai trò quan trọng trong việc chuẩn bị hành trang kiến thức với nhiều sinh viên và người đi làm.
                    </p>
                </div>
            </div>
            <div class="padding-top" id="div_4">
                <h2>THỜI GIAN THI TOIEC</h2>
                <div class="introduction">
                    <p>Bài thi TOEIC truyền thống là một bài kiểm tra trắc nghiệm bao gồm 02 phần:</p>
                    <ul>
                        <li><p>Phần thi Nghe hiểu – Listening Comprehension: 100 câu / 45 phút</p></li>
                        <li><p>Phần thi Đọc hiểu– Reading Comprehension: 100 câu / 75 phút</p></li>
                    </ul>
                    <p>Tổng thời gian làm bài là 120 phút (2 tiếng).</p>
                </div>
            </div>
            <div class="padding-top" id="div_5">
                <h2 id="lii1">NỘI DUNG BÀI THI</h2>
                <div class="introduction">
                    <p>Bài thi TOEIC truyền thống là một bài kiểm tra trắc nghiệm bao gồm 02 phần: phần thi Listening (nghe hiểu) gồm 100 câu, thực hiện trong 45 phút và phần thi Reading (đọc hiểu) cũng gồm 100 câu nhưng thực hiện trong 75 phút. Tổng thời gian làm bài là 120 phút (2 tiếng).</p>
                    <ul>
                        <li><p>Phần thi Nghe hiểu (100 câu / 45 phút): Gồm 4 phần nhỏ được đánh số từ Part 1 đến Part 4. Thí sinh phải lần lượt lắng nghe các đoạn hội thoại ngắn, các đoạn thông tin, các câu hỏi với các ngữ âm khác nhau như: Anh – Mỹ, Anh – Anh, Anh – Canada & Anh – Úc để trả lời.</p></li>
                        <li><p>Phần thi Đọc hiểu (100 câu / 75 phút): Gồm 3 phần nhỏ được đánh số từ Part 5 đến Part 7 tương ứng với 3 loại là câu chưa hoàn chỉnh, nhận ra lỗi sai và đọc hiểu các đoạn thông tin. Thí sinh không nhất thiết phải làm tuần tự mà có thể chọn câu bất kỳ để làm trước.</p></li>
                    </ul>
                    <p>Mỗi câu hỏi đều cung cấp 4 phương án trả lời A-B-C-D (trừ các câu từ 11-40 của part 2 chỉ có 3 phương án trả lời A-B-C). Nhiệm vụ của thí sinh là phải chọn ra phương án trả lời đúng nhất và dùng bút chì để tô đậm ô đáp án của mình. Bài thi TOEIC không đòi hỏi kiến thức và vốn từ vựng chuyên ngành mà chỉ tập trung với các ngôn từ sử dụng trong công việc và giao tiếp hàng ngày.</p>
                </div>
            </div>
            <div class="padding-top" id="div_6">
                <h2>TÍNH ĐIỂM BÀI THI TOIEC</h2>
                <div class="introduction">
                    <p>Mỗi câu hỏi trong bài thi TOEIC sẽ đưa ra 4 đáp án A-B-C-D (trừ các câu từ 11-40 sẽ chỉ có 3 đáp án A-B-C). Thí sinh cần khoanh vào phương án đúng duy nhất A,B,C hoặc D. Khi chấm điểm thay vì cộng một cách cơ học, chúng ta cần đối chiếu số câu trả lời đúng với thang điểm dưới đây để quy đổi ra điểm số các phần thi của mình.</p>
                    <img src="images/introduction-bangdiem.jpg" alt="">
                    <p>Như vậy điểm TOEIC là một con số chẵn, giống như hồi trẻ con chúng ta hay chơi trò chơi “bịt mắt bắt dê” và được tính từ 5 điểm, 10 điểm, 15 điểm… cho tới 450 điểm và cuối cùng là 990 điểm. Những câu trả lời đúng đầu tiên có giá trị điểm rất thấp, càng trả lời được nhiều câu chúng ta càng có cơ hội đạt tới những điểm số cao hơn rất nhiều.</p>
                    <p>VD1: Thí sinh Mai Phương T tham dự kỳ thi kiểm tra đầu vào và đạt kết quả như sau:</p>
                    <ul>
                        <li><p>Phần thi nghe: đúng 30 câu / 100 được quy đổi thành 125 điểm</p></li>
                        <li><p>Phần thi đọc: đúng 40 câu / 100 được quy đổi thành 175 điểm</p></li>
                    </ul>
                    <p>Vậy thí sinh này được tất cả là 125+175 = 300 điểm TOEIC. Thí sinh T sẽ phải nỗ lực rất nhiều và nên tham gia các khóa học tiếng Anh cơ bản GE2 và GE3 để bổ sung kiến thức nền trước khi bước vào luyện thi TOEIC</p>
                </div>
            </div>
            <div class="padding-top" id="div_7">
                <h2>CHUẨN ĐẦU RA TOIEC</h2>
                <div class="introduction">
                    <p>Cũng giống như bài thi IELTS, kết quả của bài thi TOEIC không có mức điểm để quy định đỗ hay trượt mà chỉ phản ánh trình độ sử dụng tiếng Anh của người tham dự. Tuy nhiên tại nhiều trường Đại học tại Việt Nam, đều có quy định chuẩn đầu ra tiếng Anh. Theo đó, sinh viên khi tốt nghiệp phải đạt chuẩn tiếng Anh tương đương với TOEIC 450 hoặc cao hơn tùy theo chuyên ngành. Khi tham dự thi TOEIC bạn cũng cần lưu ý: Nếu muốn cung cấp thêm phiếu điểm để nộp Hồ sơ tuyển dụng cho các đơn vị tuyển dụng, thí sinh phải đạt điểm TOEIC từ 200 trở lên. Nếu muốn cung cấp thêm phiếu điểm để nộp Hồ sơ du học, thí sinh phải đạt điểm TOEIC từ 500 trở lên.</p>
                </div>
            <div class="padding-top" id="div_8">
                <h2>CÁC MỨC ĐIỂM TOIEC</h2>
                <div class="introduction">
                    <ul>
                        <li><p>TOEIC 100 – 300 điểm: Trình độ cơ bản. Khả năng giao tiếp tiếng Anh kém.</p></li>
                        <li><p>TOEIC 300 – 450 điểm: Có khả năng hiểu & giao tiếp tiếng Anh mức độ trung bình. Là yêu cầu đối với học viên tốt nghiệp các trường nghề, cử nhân các trường Cao đẳng (hệ đào tạo 3 năm).</p></li>
                        <li><p>TOEIC 450 – 650 điểm: Có khả năng giao tiếp tiếng Anh khá. Là yêu cầu chung đối với SV tốt nghiệp Đại học hệ đào tạo 4-5 năm; nhân viên, trưởng nhóm tại các doanh nghiệp có yếu tố nước ngoài.</p></li>
                        <li><p>TOEIC 650 – 850 điểm: Có khả năng giao tiếp tiếng Anh tốt. Là yêu cầu đối với cấp trưởng phòng, quản lý điều hành cao cấp, giám đốc trong môi trường làm việc quốc tế.</p></li>
                        <li><p>TOEIC 850 – 990 điểm: Có khả năng giao tiếp tiếng Anh rất tốt. Sử dụng gần như người bản ngữ dù tiếng Anh không phải tiếng mẹ đẻ.</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection





