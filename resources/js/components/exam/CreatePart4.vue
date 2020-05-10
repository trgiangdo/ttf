<template>

<div id="part4" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Listening part 4: Talks
        </h3>
        <input type="number" name="startPart4" :value="Number(startAt+1)" hidden>
    </div>
    <div class="panel-body">
        <p>In this part, you will listen to ten short conversations and 30 multiple choice questions.</p>
        <div id="test">
            <div id="testheader">
                <span id="instructions">
                        <p> <b>Directions:</b> You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The talks will not be printed in your test book and will be spoken only one time.</p>
                        <br><b>Audio: </b><br>
                        <input type="file" name="part4_audio"><br>
                </span>
            </div>
        </div>
        <hr>
        <div id="extracttoeic">
        </div>
        <div id="question_part4" v-for='ques in numQuestion' v-bind:key='ques'>
            <b>Question {{ques + startAt}}:</b>
            <br>
            <input class="form-control" type="text" :name="'question[' + Number(ques + startAt) + ']'" :placeholder="'Question '+ Number(ques + startAt)"><br>
            <div class="form-group">
                <label>Loại câu hỏi</label>
                <select :name="'questionType[' + Number(ques + startAt) + ']'" class="form-control">
                    <option disabled selected>Chọn dạng câu hỏi</option>
                    <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id">{{qtype.type}}</option>
                </select>
            </div>
            <input class="form-control" type="text" :name="'choiceA[' + Number(ques + startAt) + ']'" placeholder="Answer A"><br>
            <input class="form-control" type="text" :name="'choiceB[' + Number(ques + startAt) + ']'" placeholder="Answer B"><br>
            <input class="form-control" type="text" :name="'choiceC[' + Number(ques + startAt) + ']'" placeholder="Answer C"><br>
            <input class="form-control" type="text" :name="'choiceD[' + Number(ques + startAt) + ']'" placeholder="Answer D">
            <b>Answer choice:</b>
            <div class="row">
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :name="'answer[' + Number(ques + startAt) + ']'" value="A">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :name="'answer[' + Number(ques + startAt) + ']'" value="B">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :name="'answer[' + Number(ques + startAt) + ']'" value="C">
                </div>
                    <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :name="'answer[' + Number(ques + startAt) + ']'" value="D">
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        props: {
            numQuestion: { type: Number, require: true },
            startAt: { type: Number, default: 1 },
            questionTypes: { type: Array, require: true }
        }
    }
</script>