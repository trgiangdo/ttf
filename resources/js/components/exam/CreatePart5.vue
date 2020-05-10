<template>

<div id="part5" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Reading part 5 : Incomplete sentences
        </h3>
        <input type="number" name="startPart5" :value="Number(startAt+1)" hidden>
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
        <div id="question_part5" v-for="ques in numQuestion" :key='ques'>
            <b>Question {{ques + startAt}}:</b>
            <br>
            <input class="form-control" type="text" :name="'part5_paragraph[' + Number(ques + startAt) + ']'" :placeholder="'Question  ' + Number(ques + startAt)"><br>
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