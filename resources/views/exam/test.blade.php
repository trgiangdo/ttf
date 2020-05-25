@extends('components.master_layout')
@section('title', 'Thi Toeic')
@section('content')

<main>
    <div class="container test">
    <form action="{{ route('user.saveScore', ['exam' => $id]) }}" method="post" accept-charset="utf-8" id="submit_test">
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
                    <li class="current-song"><a href="{{ asset("storage/part1_audios/$listening_part1->audio_url") }}"></a></li>
                    <li><a href="{{ asset("storage/part2_audios/$listening_part2->audio_url") }}"></a></li>
                    <li><a href="{{ asset("storage/part3_audios/$listening_part3->audio_url") }}"></a></li>
                    <li><a href="{{ asset("storage/part4_audios/$listening_part4->audio_url") }}"></a></li>
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
                                            <img style="width: 250px; height: 100%; float: left;" src="{{asset("storage/images/$listening_part1->example->image_url")}}" alt="Example Image"/>
                                            <p></p>
                                            <p>{!!$listening_part1->example->example!!}</p>
                                        </span>
                                    </div>
                                </div>
                                <div id="extracttoeic">
                                </div>
                                <hr>
                                <div id="question">
                                    @php
                                        $start = 0;
                                    @endphp

                                    @foreach ($listening_part1->part1 as $part1)
                                        <br>
                                        <b> Question {{ $start + $loop->iteration }}:</b>
                                        <div class="clearfix"></div>
                                        <br>
                                        <img style="width: 250px; height: 100%; float: left;" src="{{asset("storage/images/$part1->image_url")}}" alt="">
                                        <div class="choices" style="float: left;">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $start + $loop->iteration }}" type="radio" class="a{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-A" name="part1[{{ $start + $loop->iteration }}]" value="A">
                                                        <label for="choice{{ $start + $loop->iteration }}-A"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $start + $loop->iteration }}" type="radio" class="a{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-B" name="part1[{{ $start + $loop->iteration }}]" value="B">
                                                        <label for="choice{{ $start + $loop->iteration }}-B"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $start + $loop->iteration }}" type="radio" class="a{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-C" name="part1[{{ $start + $loop->iteration }}]" value="C">
                                                        <label for="choice{{ $start + $loop->iteration }}-C"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input class="choice_{{ $start + $loop->iteration }}" type="radio" class="a{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-D" name="part1[{{ $start + $loop->iteration }}]" value="D">
                                                        <label for="choice{{ $start + $loop->iteration }}-D"></label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>

                                        @if ($loop->last)
                                            @php
                                                $start += $loop->count;
                                            @endphp
                                        @endif

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
                                        <p>{!!$listening_part2->example->example!!}</p>
                                    </span>
                                </div>
                                <hr>
                                <div id="question">
                                    @foreach($listening_part2->part2 as $part2)
                                        <b>Question {{ $start + $loop->iteration }}.</b>
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-A" name="part2[{{ $start + $loop->iteration }}]" value="A">
                                                        <label for="choice{{ $start + $loop->iteration }}-A"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-B" name="part2[{{ $start + $loop->iteration }}]" value="B">
                                                        <label for="choice{{ $start + $loop->iteration }}-B"></label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-C" name="part2[{{ $start + $loop->iteration }}]" value="C">
                                                        <label for="choice{{ $start + $loop->iteration }}-C"></label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>

                                        @if ($loop->last)
                                            @php
                                                $start += $loop->count;
                                            @endphp
                                        @endif

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
                                    @foreach($listening_part3->part3 as $part3)
                                        <b>{{ $start + $loop->iteration }}.</b> {{$part3->question}}
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-A" name="part3[{{ $start + $loop->iteration }}]" value="A">
                                                        <label for="choice{{ $start + $loop->iteration }}-A">{{$part3->choice_A}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-B" name="part3[{{ $start + $loop->iteration }}]" value="B">
                                                        <label for="choice{{ $start + $loop->iteration }}-B">{{$part3->choice_B}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-C" name="part3[{{ $start + $loop->iteration }}]" value="C">
                                                        <label for="choice{{ $start + $loop->iteration }}-C">{{$part3->choice_C}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-D" name="part3[{{ $start + $loop->iteration }}]" value="D">
                                                        <label for="choice{{ $start + $loop->iteration }}-D">{{$part3->choice_D}}</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                        @if ($loop->last)
                                            @php
                                                $start += $loop->count;
                                            @endphp
                                        @endif

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
                                    @foreach($listening_part4->part4 as $part4)
                                        <b>{{ $start + $loop->iteration }}.</b> {{$part4->question}}
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-A" name="part4[{{ $start + $loop->iteration }}]" value="A">
                                                        <label for="choice{{ $start + $loop->iteration }}-A">{{$part4->choice_A}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-B" name="part4[{{ $start + $loop->iteration }}]" value="B">
                                                        <label for="choice{{ $start + $loop->iteration }}-B">{{$part4->choice_B}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-C" name="part4[{{ $start + $loop->iteration }}]" value="C">
                                                        <label for="choice{{ $start + $loop->iteration }}-C">{{$part4->choice_C}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-D" name="part4[{{ $start + $loop->iteration }}]" value="D">
                                                        <label for="choice{{ $start + $loop->iteration }}-D">{{$part4->choice_D}}</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                        @if ($loop->last)
                                            @php
                                                $start += $loop->count;
                                            @endphp
                                        @endif

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
                                        <b>{{ $start + $loop->iteration }}.</b> {{$reading_part5->paragraph}}
                                        <div class="choices">
                                            <ul class="list-question">
                                                <li>
                                                    <span class="lq-number">A</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-A" name="part5[{{ $start + $loop->iteration }}]" value="A">
                                                        <label for="choice{{ $start + $loop->iteration }}-A">{{$reading_part5->part5->choice_A}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">B</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-B" name="part5[{{ $start + $loop->iteration }}]" value="B">
                                                        <label for="choice{{ $start + $loop->iteration }}-B">{{$reading_part5->part5->choice_B}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">C</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-C" name="part5[{{ $start + $loop->iteration }}]" value="C">
                                                        <label for="choice{{ $start + $loop->iteration }}-C">{{$reading_part5->part5->choice_C}}</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="lq-number">D</span>
                                                    <span class="my-radio">
                                                        <input type="radio" class="an_{{ $start + $loop->iteration }}" id="choice{{ $start + $loop->iteration }}-D" name="part5[{{ $start + $loop->iteration }}]" value="D">
                                                        <label for="choice{{ $start + $loop->iteration }}-D">{{$reading_part5->part5->choice_D}}</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                        @if ($loop->last)
                                            @php
                                                $start += $loop->count;
                                            @endphp
                                        @endif

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
                                        <b>Question {{ $start + 1 }} - {{ $start + count($reading_part6->part6) }}: Refer to the following text</b><br>
                                        <p>{{ $reading_part6->paragraph }}</p>
                                        @foreach ($reading_part6->part6 as $part6)
                                            <b>{{ $start + $loop->index + 1}}.</b><br>
                                            <div class="choices">
                                                <ul class="list-question">
                                                    <li>
                                                        <span class="lq-number">A</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-A" name="part6[{{ $start + $loop->index + 1}}]" value="A">
                                                            <label for="choice{{ $start + $loop->index + 1}}-A">{{$part6->choice_A}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">B</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-B" name="part6[{{ $start + $loop->index + 1}}]" value="B">
                                                            <label for="choice{{ $start + $loop->index + 1}}-B">{{$part6->choice_B}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">C</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-C" name="part6[{{ $start + $loop->index + 1}}]" value="C">
                                                            <label for="choice{{ $start + $loop->index + 1}}-C">{{$part6->choice_C}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">D</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1 }}" id="choice{{ $start + $loop->iteration + 1}}-D" name="part6[{{ $start + $loop->index + 1}}]" value="D">
                                                            <label for="choice{{ $start + $loop->index + 1 }}-D">{{$part6->choice_D}}</label>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                            @if ($loop->last)
                                                @php
                                                    $start += $loop->count;
                                                @endphp
                                            @endif

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
                                        <b>Question {{ $start + 1 }} - {{ $start + count($reading_part7->part7) }}: Refer to the following text</b><br>
                                        <p>{{ $reading_part7->paragraph }}</p>
                                        @foreach($reading_part7->part7 as $part7)
                                            <b>{{ $start + $loop->index + 1}}. {{ $part7->question}}</b><br>
                                            <div class="choices">
                                                <ul class="list-question">
                                                    <li>
                                                        <span class="lq-number">A</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-A" name="part7[{{ $start + $loop->index + 1}}]" value="A">
                                                            <label for="choice{{ $start + $loop->index + 1}}-A">{{$part7->choice_A}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">B</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-B" name="part7[{{ $start + $loop->index + 1}}]" value="B">
                                                            <label for="choice{{ $start + $loop->index + 1}}-B">{{$part7->choice_B}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">C</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-C" name="part7[{{ $start + $loop->index + 1}}]" value="C">
                                                            <label for="choice{{ $start + $loop->index + 1}}-C">{{$part7->choice_C}}</label>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="lq-number">D</span>
                                                        <span class="my-radio">
                                                            <input type="radio" class="an_{{ $start + $loop->index + 1}}" id="choice{{ $start + $loop->index + 1}}-D" name="part7[{{ $start + $loop->index + 1}}]" value="D">
                                                            <label for="choice{{ $start + $loop->index + 1 }}-D">{{$part7->choice_D}}</label>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                            @if ($loop->last)
                                                @php
                                                    $start += $loop->count;
                                                @endphp
                                            @endif

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





