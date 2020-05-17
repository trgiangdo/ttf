<template>

<div id="part5" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Reading part 5 : Incomplete sentences
        </h3>
        <input type="number" name="startPart5" :value="Number(startAt)" hidden>
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
        <div id="question_part5" v-for="(ques, index) in readings" :key='index'>
            <b>Question {{index + startAt}}:</b>
            <br>
            <input class="form-control" type="text" :name="'part5_paragraph[' + Number(index + startAt) + ']'" :value="ques.paragraph" :placeholder="'Question ' + Number(index + startAt)"><br>
            <div class="form-group">
                <label>Loại câu hỏi</label>
                <select :name="'questionType[' + Number(index + startAt) + ']'" class="form-control">
                    <option disabled>Chọn dạng câu hỏi</option>
                    <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id" :selected="ques.part5.question_type_id == qtype.id">{{qtype.type}}</option>
                </select>
            </div>
            <input class="form-control" type="text" :value="ques.part5.choice_A" :name="'choiceA[' + Number(index + startAt) + ']'" placeholder="Answer A"><br>
            <input class="form-control" type="text" :value="ques.part5.choice_B" :name="'choiceB[' + Number(index + startAt) + ']'" placeholder="Answer B"><br>
            <input class="form-control" type="text" :value="ques.part5.choice_C" :name="'choiceC[' + Number(index + startAt) + ']'" placeholder="Answer C"><br>
            <input class="form-control" type="text" :value="ques.part5.choice_D" :name="'choiceD[' + Number(index + startAt) + ']'" placeholder="Answer D">

            <b>Answer choice:</b>
            <div class="row">
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="A" :checked="ques.part5.answer == 'A'">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="B" :checked="ques.part5.answer == 'B'">
                </div>
                <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="C" :checked="ques.part5.answer == 'C'">
                </div>
                    <div class="col-md-1">
                    <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :name="'answer[' + Number(index + startAt) + ']'" value="D" :checked="ques.part5.answer == 'D'">
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
            readings: { require: true },
            startAt: { type: Number, default: 1 },
            questionTypes: { type: Array, require: true }
        },
    }
</script>