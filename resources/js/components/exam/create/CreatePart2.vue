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
                <textarea class="form-control" type="text" name="part2_example" placeholder="Guide to choose the answer" style="height: 200px;" required></textarea>
                <br><b>Audio: </b><br>
                <input type="file" name="part2_audio" required><br>
            </span>
        </div>
        <div id="question_part2">
            <div v-for='ques in numQuestion' :key='ques'>
                <b>Question {{ques + startAt - 1}}:</b>
                <div class="form-group">
                    <label>Loại câu hỏi</label>
                    <select :name="'questionType[' + Number(ques + startAt - 1) + ']'" class="form-control" required>
                        <option disabled selected>Chọn dạng câu hỏi</option>
                        <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id">{{qtype.type}}</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <p style="float: left; margin-right: 5px;">A</p>
                        <input type="radio" :name="'answer[' + Number(ques + startAt - 1) + ']'" value="A" checked>
                    </div>
                    <div class="col-md-1">
                        <p style="float: left; margin-right: 5px;">B</p>
                        <input type="radio" :name="'answer[' + Number(ques + startAt - 1) + ']'" value="B">
                    </div>
                    <div class="col-md-1">
                        <p style="float: left; margin-right: 5px;">C</p>
                        <input type="radio" :name="'answer[' + Number(ques + startAt - 1) + ']'" value="C">
                    </div>
                </div>
                <hr>
            </div>
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