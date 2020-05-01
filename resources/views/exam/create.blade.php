@extends('components.master_layout')
@section('title', 'Tạo đề thi mới')

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
        <form action="{{ route('exam.store') }}" method="post" accept-charset="utf-8">
            @csrf
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i>Thêm đề thi mới</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <div class="form-group">
                                    <label>Tên đề thi</label>
                                    <input value="{{old('name')}}" type="text" name="name" placeholder="Tên đề thi" class="form-control" required>
                                    @error('email')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Loại đề thi</label>
                                    <select name="exam_type" class="form-control">
                                        <option value="0" selected>Đề thi trước tháng 6/2020</option>
                                        <option value="1">Đề thi sau tháng 6/2020</option>
                                        <option value="2">Đề luyện tập</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 block-content">
                <div class="panel panel-purple">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#part1">Part 1</a></li>
                        <li><a data-toggle="tab" href="#part2">Part 2</a></li>
                        <li><a data-toggle="tab" href="#part3">Part 3</a></li>
                        <li><a data-toggle="tab" href="#part4">Part 4</a></li>
                        <li><a data-toggle="tab" href="#part5">Part 5</a></li>
                        <li><a data-toggle="tab" href="#part6">Part 6</a></li>
                        <li><a data-toggle="tab" href="#part7">Part 7</a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="tab-content">
                        <div id="part1" class="tab-pane fade in active">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Listening part 1: Photographs
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div id="test">
                                    <div id="testheader">
                                        <span id="instructions">
                                            <p> <b>Directions:</b> For each question in this part, you will hear four statements about a picture in your test book. When you hear the statements, you must select the one statement that best describes what you see in the picture. Then find the number of the question on your answer sheet and mark your answer. The statements will not be printed in your test book and will be spoken only one time. Look at the example below.</p>
                                            <input id="img_test1" type="file" name="example_img" class="form-control hidden" >
                                            <div class="example">
                                                <label for="img_test1"> <img style="width: 300px; height: 100%; " id="img_example" src="https://tilespace.co.za/wp-content/uploads/2015/07/avatar-1.jpg"></label>
                                            </div>
                                            <textarea class="form-control" type="text" name="example_test1"  placeholder="Guide to choose the answer" style="height: 100px;"></textarea><br>
                                            <b>Audio: </b><br>
                                            <input type="file" name="audio_part1"><br>
                                        </span>
                                    </div>
                                </div>
                                <div id="extracttoeic">
                                </div>
                                <hr>
                                <div id="questions_part1">
                                    @for($i=1; $i<=10; $i++)
                                        <p><b>Question {{$i}}:</b></p>
                                        <div class="row">
                                            <div class=" col-md-8 image">
                                                <input id="img_question_{{$i}}" type="file" name="img_question_{{$i}}" class="form-control hidden" onchange="changeImg(this)">
                                                <div class="example">
                                                    <label for="img_question_{{$i}}"> <img id="img_{{$i}}" src="https://tilespace.co.za/wp-content/uploads/2015/07/avatar-1.jpg"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 answer">
                                                <div class="choices">
                                                    <ul class="list-question">
                                                        <li>
                                                            <span class="lq-number">A</span>
                                                            <span class="my-radio">
                                                                <input type="radio" id="" name="answer_question_{{$i}}" value="A">
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="lq-number">B</span>
                                                            <span class="my-radio">
                                                                <input type="radio" id="" name="answer_question_{{$i}}" value="B">
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="lq-number">C</span>
                                                            <span class="my-radio">
                                                                <input type="radio" id="" name="answer_question_{{$i}}" value="C">
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="lq-number">D</span>
                                                            <span class="my-radio">
                                                                <input type="radio" id="" name="answer_question_{{$i}}" value="D">
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="part2" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Listening part 2: Question & Response
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div id="testheader">
                                    <span id="instructions">
                                        <p> <b>Directions:</b> Listen to these questions and statements. After each question or statement, you will hear three responses. Select the most appropriate response. Mark your answer by clicking (A), (B), or (C). You will hear each question or statement, and the responses, only once.</p>
                                        <p><b>Example:</b></p>
                                        <textarea class="form-control" type="text" name="example_test2"  placeholder="Guide to choose the answer" style="height: 200px;"></textarea>
                                        <br><b>Audio: </b><br>
                                        <input type="file" name="audio_part2"><br>
                                    </span>
                                </div>
                                <hr>
                                <div id="question">
                                    @for($i=11; $i<41; $i++)
                                        <b>Question {{$i}}:</b>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" name="answer_question_{{$i}}" value="A">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" name="answer_question_{{$i}}" value="B">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" name="answer_question_{{$i}}" value="C">
                                            </div>
                                        </div>
                                        <hr>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="part3" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Listening part 3: Conversations
                                </h3>
                            </div>
                            <div class="panel-body">
                                <p>In this part, you will listen to ten short conversations and 30 multiple choice questions.</p>
                                <div id="test">
                                    <div id="testheader">
                                        <span id="instructions">
                                            <p> <b>Directions:</b> You will hear some conversations between two people. You will be asked to answer three questions about what the speakers say in each conversation. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The conversations will not be printed in your test book and will be spoken only one time.</p>

                                            <br><b>Audio: </b><br>
                                            <input type="file" name="audio_part3"><br>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="question">
                                    @for($i=41; $i<71; $i++)
                                        <b>Question {{$i}}:</b>
                                        <br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Question {{$i}}"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer A"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer B"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer C"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer D">
                                        <b>Answer choice:</b>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" name="question_{{$i}}[]" value="A">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" name="question_{{$i}}[]" value="B">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" name="question_{{$i}}[]" value="C">
                                            </div>
                                             <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">D</p> <input type="radio" name="question_{{$i}}[]" value="D">
                                            </div>
                                        </div>
                                        <hr>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="part4" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Listening part 4: Talks
                                </h3>
                            </div>
                            <div class="panel-body">
                                <p>In this part, you will listen to ten short conversations and 30 multiple choice questions.</p>
                                <div id="test">
                                    <div id="testheader">
                                        <span id="instructions">
                                             <p> <b>Directions:</b> You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The talks will not be printed in your test book and will be spoken only one time.</p>
                                             <br><b>Audio: </b><br>
                                             <input type="file" name="audio_part4"><br>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="question">
                                    @for($i=71; $i<101; $i++)
                                        <b>Question {{$i}}:</b>
                                        <br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Question {{$i}}"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer A"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer B"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer C"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer D">
                                        <b>Answer choice:</b>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" name="question_{{$i}}[]" value="A">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" name="question_{{$i}}[]" value="B">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" name="question_{{$i}}[]" value="C">
                                            </div>
                                             <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">D</p> <input type="radio" name="question_{{$i}}[]" value="D">
                                            </div>
                                        </div>
                                        <hr>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="part5" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Reading part 5 : Incomplete sentences
                                </h3>
                            </div>
                            <div class="panel-body">

                                <div id="test">
                                    <div id="testheader">
                                        <span id="instructions">
                                            <p> <b>Directions:</b> A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then mark the letter (A), (B), (C), or (D) on your answer sheet.</p>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="question">
                                    @for($i=101; $i<141; $i++)
                                        <b>Question {{$i}}:</b>
                                        <br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Question {{$i}}"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer A"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer B"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer C"><br>
                                        <input class="form-control" type="text" name="question_{{$i}}[]" placeholder="Answer D">

                                        <b>Answer choice:</b>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" name="question_{{$i}}[]" value="A">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" name="question_{{$i}}[]" value="B">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" name="question_{{$i}}[]" value="C">
                                            </div>
                                             <div class="col-md-1">
                                                <p style="float: left; margin-right: 5px;">D</p> <input type="radio" name="question_{{$i}}[]" value="D">
                                            </div>
                                        </div>
                                        <hr>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="part6" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Reading part 6 : Incomplete sentences
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div id="test">
                                    <div id="testheader">
                                        <span id="instructions">
                                            <p> <b>Directions:</b> Read the texts that follow. A word or phrase is missing in some of the sentences. Four answer choices are given below each of the sentences. Select the best answer to complete the text. Then mark the letter (A), (B), (C) or (D) on the Answer Sheet. </p>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="question">
                                    @for($i=141; $i<153; $i+=3)
                                        <b>Question {{$i}} - {{$i+2}}: refer to the following text</b><br>
                                        <textarea name="paragraph_{{$i}}_{{$i+2}}" ></textarea>
                                        @for($j=0; $j<3; $j++)
                                            <b>Question {{$i+$j}}:</b><br>
                                            <div>
                                                <input class="form-control" type="text" name="question_{{$i+$j}}[]" placeholder="Answer A"><br>
                                                <input class="form-control" type="text" name="question_{{$i+$j}}[]" placeholder="Answer B"><br>
                                                <input class="form-control" type="text" name="question_{{$i+$j}}[]" placeholder="Answer C"><br>
                                                <input class="form-control" type="text" name="question_{{$i+$j}}[]" placeholder="Answer D">
                                                <b>Answer choice:</b>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <p style="float: left; margin-right: 5px;">A</p> <input type="radio" name="question_{{$i+$j}}[]" value="A">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p style="float: left; margin-right: 5px;">B</p> <input type="radio" name="question_{{$i+$j}}[]" value="B">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p style="float: left; margin-right: 5px;">C</p> <input type="radio" name="question_{{$i+$j}}[]" value="C">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p style="float: left; margin-right: 5px;">D</p> <input type="radio" name="question_{{$i+$j}}[]" value="D">
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                        <hr>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="part7" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Reading part 7 : Comprehension
                                </h3>
                            </div>
                            <div class="panel-body">
                            <div id="test">
                                <div id="testheader">
                                    <p style="color:red">Nên xác định số lượng câu hỏi của đoạn trước khi điền câu hỏi.<br>Nếu có sự thay đổi về số lượng câu hỏi mỗi đoạn phải nhập lại toàn bộ câu hỏi của đoạn đó.</p>
                                    <p> <b>Directions:</b> Read the texts. You will notice that each text is followed by several questions. For each question, decide which of the four answer choices: (A), (B), (C), or (D), best answers the question. Then mark your answer on the Answer Sheet. </p>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="questions_part7">
                                    @for ($i = 1; $i <= 15; $i++)
                                        <div>
                                            <b>Paragraph {{$i}}</b>
                                            <textarea name="paragraph_{{$i}}"></textarea><br>
                                            <label>Số câu hỏi</label>
                                            <input type="number" min="0" onchange="showQuestions(event)" require name="numQuestions_{{$i}}" class="form-control numQuestions_{{$i}}">
                                        </div>
                                        <div style="padding-top: 10px" class="paragraph_{{$i}}">
                                        </div>
                                        <div style="clear: both;">
                                        </div>
                                        <hr>
                                    @endfor
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection


@section('scripts')
	<script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
    </script>

    <script type="text/javascript" src="js/exam/exam.js"></script>
@endsection