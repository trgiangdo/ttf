@extends('components.master_layout')
@section('title', 'Thi Toeic')
@section('content')

<main>
    <div class="container test">
        <form action="" method="post" accept-charset="utf-8" id="submit_test"  name="checkbtn">
            @csrf
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="clock" style="margin-top: 50px"></div>
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-8 block-content">
                <audio autoplay="autoplay" src="" id="audioPlayer" style="margin-top: 10px; margin-left: 10px">
                    Sorry, your browser doesn't support HTML 5
                </audio>
                <ul id="playlist" class="hidden">
                    <li class="current-song"><a href="/upload_audio/part1/{{ asset("storage/part1_audio/$listenings_part1->audio_url") }}"></a></li>
                    <li><a href="/upload_audio/part2/{{ asset("storage/part2_audio/$listenings_part2->audio_url") }}"></a></li>
                    <li><a href="/upload_audio/part3/{{ asset("storage/part3_audio/$listenings_part3->audio_url") }}"></a></li>
                    <li><a href="/upload_audio/part4/{{ asset("storage/part4_audio/$listenings_part4->audio_url") }}"></a></li>
                </ul>
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
                                            <img style="width: 250px; height: 100%; float: left;" src="{{asset("storage/images/$listenings_part1->example()->image_url")}}" alt="Example Image"/>
                                            <p></p>
                                            <p>{!!$listenings_part1->example->example!!}</p>
                                        </span>
                                    </div>
                                </div>
                                <div id="extracttoeic">
                                </div>
                                <hr>
                                <div id="question">
                                    @foreach($listenings_part1->part1 as $part1)
                                        <br>
                                        <b> Question {{ $loop->iteration }}:</b>
                                        <div class="clearfix"></div>
                                        <br>
                                        <img style="width: 250px; height: 100%; float: left;" src="{{asset("storage/images/$part1->image_url")}}" alt="">
                                        <div class="choices" style="float: left;">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $loop->iteration }}" type="radio" class="a{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-A" name="nghe_{{ $loop->iteration }}" value="A">
                                                        <label for="choice{{ $loop->iteration }}-A"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $loop->iteration }}" type="radio" class="a{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-B" name="nghe_{{ $loop->iteration }}" value="B">
                                                        <label for="choice{{ $loop->iteration }}-B"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $loop->iteration }}" type="radio" class="a{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-C" name="nghe_{{ $loop->iteration }}" value="C">
                                                        <label for="choice{{ $loop->iteration }}-C"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $loop->iteration }}" type="radio" class="a{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-D" name="nghe_{{ $loop->iteration }}" value="D">
                                                        <label for="choice{{ $loop->iteration }}-D"></label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                    @endforeach
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
                                        <p>{{$listenings_part2->example()->example}}</p>
                                    </span>
                                </div>
                                <hr>
                                <div id="question">
                                    @foreach($listenings_part2->part2 as $part2)
                                        <b>Question {{ $loop->iteration }}.</b>
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-A" name="nghe_{{ $loop->iteration }}" value="A">
                                                        <label for="choice{{ $loop->iteration }}-A"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-B" name="nghe_{{ $loop->iteration }}" value="B">
                                                        <label for="choice{{ $loop->iteration }}-B"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-C" name="nghe_{{ $loop->iteration }}" value="C">
                                                        <label for="choice{{ $loop->iteration }}-C"></label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>
                                    @endforeach
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
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="question">
                                    @foreach($listenings_part3->part3 as $part3)
                                        <b>{{ $loop->iteration }}.</b> {{$part3->question}}
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-A" name="nghe_{{ $loop->iteration }}" value="A">
                                                        <label for="choice{{ $loop->iteration }}-A">{{$part3->choice_A}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-B" name="nghe_{{ $loop->iteration }}" value="B">
                                                        <label for="choice{{ $loop->iteration }}-B">{{$part3->choice_B}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-C" name="nghe_{{ $loop->iteration }}" value="C">
                                                        <label for="choice{{ $loop->iteration }}-C">{{$part3->choice_C}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-D" name="nghe_{{ $loop->iteration }}" value="D">
                                                        <label for="choice{{ $loop->iteration }}-D">{{$part3->choice_D}}</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
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
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div id="extracttoeic">
                                </div>
                                <div id="question">
                                    @foreach($listenings_part4->part4 as $part4)
                                        <b>{{ $loop->iteration }}.</b> {{$part4->question}}
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-A" name="nghe_{{ $loop->iteration }}" value="A">
                                                        <label for="choice{{ $loop->iteration }}-A">{{$part4->choice_A}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-B" name="nghe_{{ $loop->iteration }}" value="B">
                                                        <label for="choice{{ $loop->iteration }}-B">{{$part4->choice_B}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-C" name="nghe_{{ $loop->iteration }}" value="C">
                                                        <label for="choice{{ $loop->iteration }}-C">{{$part4->choice_C}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-D" name="nghe_{{ $loop->iteration }}" value="D">
                                                        <label for="choice{{ $loop->iteration }}-D">{{$part4->choice_D}}</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="part5" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Reading part 5: Incomplete sentences
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
                                     @foreach($readings_part5 as $reading_part5)
                                        <b>{{ $loop->iteration }}.</b> {{$reading_part5->paragraph}}
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-A" name="doc_{{ $loop->iteration }}" value="A">
                                                        <label for="choice{{ $loop->iteration }}-A">{{$reading_part5->part5->choice_A}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-B" name="doc_{{ $loop->iteration }}" value="B">
                                                        <label for="choice{{ $loop->iteration }}-B">{{$reading_part5->part5->choice_B}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-C" name="doc_{{ $loop->iteration }}" value="C">
                                                        <label for="choice{{ $loop->iteration }}-C">{{$reading_part5->part5->choice_C}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $loop->iteration }}" id="choice{{ $loop->iteration }}-D" name="doc_{{ $loop->iteration }}" value="D">
                                                        <label for="choice{{ $loop->iteration }}-D">{{$reading_part5->part5->choice_D}}</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="part6" class="tab-pane fade">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-question"></i>
                                    TOEIC® Reading part 6: Incomplete sentences
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
                                    @foreach($readings_part6 as $reading_part6)
                                        <b>Question {{ $loop->iteration }} - {{$loop->iteration + 2}}: Refer to the following text</b><br>
                                        <p>{{ $reading_part6->paragraph }}</p>
                                        @foreach($reading_part6->part6 as $part6)
                                            <b>{{ $loop->iteration + $loop->parent->iteration}}.</b><br>
                                            <div class="choices">
                                                <ul class="list-question">
                                                    <li>
                                                        <span class="lq-number">A</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-A" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="A">
                                                            <label for="choice{{ $loop->iteration + $loop->parent->iteration}}-A">{{$part6->choice_A}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">B</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-B" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="B">
                                                            <label for="choice{{ $loop->iteration + $loop->parent->iteration}}-B">{{$part6->choice_B}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">C</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-C" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="C">
                                                            <label for="choice{{ $loop->iteration + $loop->parent->iteration}}-C">{{$part6->choice_C}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">D</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-D" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="D">
                                                            <label for="choice{{ $loop->iteration }}-D">{{$part6->choice_D}}</label>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="part7" class="tab-pane fade">
                            <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-question"></i>
                                TOEIC® Reading part 7: Comprehension
                            </h3>
                            </div>
                            <div class="panel-body">
                            <div id="test">
                                <div id="testheader">
                                    <p> <b>Directions:</b> Read the texts. You will notice that each text is followed by several questions. For each question, decide which of the four answer choices: (A), (B), (C), or (D), best answers the question. Then mark your answer on the Answer Sheet. </p>
                                </div>
                                <hr>
                                <div id="extracttoeic">

                                </div>

                                <div id="questions">
                                    @foreach($readings_part7 as $reading_part7)
                                        <b>Question {{ $loop->iteration }} - {{$loop->iteration + 2}}: Refer to the following text</b><br>
                                        <p>{{ $reading_part7->paragraph }}</p>
                                        @foreach($reading_part7->part7 as $part7)
                                            <b>{{ $loop->iteration + $loop->parent->iteration}}. {{ $part7->question}}</b><br>
                                            <div class="choices">
                                                <ul class="list-question">
                                                    <li>
                                                        <span class="lq-number">A</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-A" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="A">
                                                            <label for="choice{{ $loop->iteration + $loop->parent->iteration}}-A">{{$part7->choice_A}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">B</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-B" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="B">
                                                            <label for="choice{{ $loop->iteration + $loop->parent->iteration}}-B">{{$part7->choice_B}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">C</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-C" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="C">
                                                            <label for="choice{{ $loop->iteration + $loop->parent->iteration}}-C">{{$part7->choice_C}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">D</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $loop->iteration + $loop->parent->iteration}}" id="choice{{ $loop->iteration + $loop->parent->iteration}}-D" name="doc_{{ $loop->iteration + $loop->parent->iteration}}" value="D">
                                                            <label for="choice{{ $loop->iteration }}-D">{{$part7->choice_D}}</label>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 block-content">
                <div class="question-pallete panel">
                    <div class="qp-caption">
                        <img src="" alt="">
                        <p style="font-size: 30px; padding-bottom: 20px;">Question Pallete</p>
                    </div>
                    <div class="question-panel">
                        <div class="qp-item" style="overflow:hidden; outline:none">
                            @for($i = 1; $i<201; $i++)
                                <a class="qp-item qs_{{ $i }} qp-item-unanswered" href="#question{{ $i }}">
                                {{ $i }}
                                </a>
                            @endfor
                        </div>
                        <div class="qp-note question-bt" style="margin-top: 30px">
                            <span class="answered">Answered</span>
                            <span class="unanswered">Unanswered</span>
                        </div>
                        <div class="qp-bottom clearfix">
                            <button type="submit" class="btn btn-outline-secondary btn-lg" style="margin: 50px; color: black; width: 100px">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection


@section('scripts')
{{-- xác nhận đã làm --}}
<script>
   var btn = $('input');
   for (var i = 0, len = btn.length; i<len ; i++){
       btn[i].onclick = function(){
           var ten =this.className;
           var mang = ten.split("_");
           mang[1] = Number(mang[1]);
           var an = "qs_"+mang[1];
           $('.'+an).css('background-color','#97720e');
       };
   }
</script>

<script src="clock/compiled/flipclock.js"></script>

<script type="text/javascript">
    var clock;
    $(document).ready(function() {
        clock = $('.clock').FlipClock({
            clockFace: 'HourlyCounter',
        });
    });
</script>

{{-- audio --}}
<script src="js/audioPlayer.js"></script>
<script>
    audioPlayer();
</script>

@endsection





