<template>

<div id="part2" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Listening part 2: Question & Response
        </h3>
        <input type="number" name="startPart2" :value="Number(startAt)" hidden>
    </div>
    <div class="panel-body">
        <div id="testheader">
            <span id="instructions">
                <p> <b>Directions:</b> Listen to these questions and statements. After each question or statement, you will hear three responses. Select the most appropriate response. Mark your answer by clicking (A), (B), or (C). You will hear each question or statement, and the responses, only once.</p>
                <p><b>Example:</b></p>
                <textarea class="form-control" type="text" name="part2_example" :value="listening.example.example" placeholder="Guide to choose the answer" style="height: 200px;" ></textarea>
                <br><b>Audio: </b><br>
                <input type="file" name="part2_audio"><br>
                <audio :src="baseUrl + '/storage/part2_audios/' + listening.audio_url" controls></audio>
            </span>
        </div>
        <hr>
        <div id="question_part2" v-for='(ques, index) in listening.part2' :key='index'>
            <b>Question {{(index + startAt)}}:</b>
            <div class="form-group">
                <label>Loại câu hỏi</label>
                <select :name="'questionType[' + Number(index + startAt) + ']'" class="form-control" >
                    <option disabled>Chọn dạng câu hỏi</option>
                    <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id" :selected="ques.question_type_id == qtype.id">{{qtype.type}}</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">A</p>
                    <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="A" :checked="ques.answer == 'A'">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">B</p>
                    <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="B" :checked="ques.answer == 'B'">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">C</p>
                    <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="C" :checked="ques.answer == 'C'">
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
            startAt: { type: Number, default: 1 },
            questionTypes: { type: Array, require: true },
            listening: { require: true },
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