<template>

<div id="part4" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Listening part 4: Talks
        </h3>
        <input type="number" name="startPart4" :value="Number(startAt)" hidden>
    </div>
    <div class="panel-body">
        <p>In this part, you will listen to ten short conversations and 30 multiple choice questions.</p>
        <div id="test">
            <div id="testheader">
                <span id="instructions">
                        <p> <b>Directions:</b> You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D) on your answer sheet. The talks will not be printed in your test book and will be spoken only one time.</p>
                        <br><b>Audio: </b><br>
                        <input type="file" name="part4_audio"><br>
                        <audio :src="baseUrl + '/storage/part4_audios/' + listening.audio_url" controls></audio>
                </span>
            </div>
        </div>
        <hr>
        <div id="extracttoeic">
        </div>
        <div id="question_part4" v-for='(ques, index) in listening.part4' v-bind:key='index'>
            <b>Question {{index + startAt}}:</b>
            <br>
            <input class="form-control" type="text" :name="'question[' + Number(index + startAt) + ']'" :value="ques.question" :placeholder="'Question '+ Number(index + startAt)"><br>
            <div class="form-group">
                <label>Loại câu hỏi</label>
                <select :name="'questionType[' + Number(index + startAt) + ']'" class="form-control">
                    <option disabled selected>Chọn dạng câu hỏi</option>
                    <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id" :selected="ques.question_type_id == qtype.id">{{qtype.type}}</option>
                </select>
            </div>
            <input class="form-control" type="text" :name="'choiceA[' + Number(index + startAt) + ']'"  :value="ques.choice_A" placeholder="Answer A"><br>
            <input class="form-control" type="text" :name="'choiceB[' + Number(index + startAt) + ']'"  :value="ques.choice_B" placeholder="Answer B"><br>
            <input class="form-control" type="text" :name="'choiceC[' + Number(index + startAt) + ']'"  :value="ques.choice_C" placeholder="Answer C"><br>
            <input class="form-control" type="text" :name="'choiceD[' + Number(index + startAt) + ']'"  :value="ques.choice_D" placeholder="Answer D">
            <b>Answer choice:</b>
            <div class="row">
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="A" :checked="ques.answer == 'A'">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="B" :checked="ques.answer == 'B'">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="C" :checked="ques.answer == 'C'">
                </div>
                    <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="D" :checked="ques.answer == 'D'">
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
            listening: { require: true },
            startAt: { type: Number, default: 1 },
            questionTypes: { type: Array, require: true }
        },

        data() {
            return {
                baseUrl: '',
            }
        },

        mounted() {
            this.baseUrl = window.location.origin;
        }
    }
</script>