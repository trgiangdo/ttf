<template>

<div id="part6" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Reading part 6 : Incomplete sentences
        </h3>
        <input type="number" name="startPart6" :value="Number(startAt)" hidden>
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
        <div id="question_part6">
            <div v-for="(para, paraIndex) in readings" :key='paraIndex'>
            <b>Question {{paraIndex*3 + startAt}} - {{(paraIndex*3 + startAt) + 2}}: refer to the following text</b><br>
            <textarea :value="para.paragraph" :name="'part6_paragraph[' + paraIndex + ']'" type="text" class="form-control"></textarea>
            <div>
                <div v-for="(ques, quesIndex) in para.part6" :key='quesIndex'>
                    <b>Question {{quesIndex + paraIndex*3 + startAt}}:</b><br>
                    <div class="form-group">
                        <label>Loại câu hỏi</label>
                        <select :name="'questionType[' + (quesIndex + paraIndex*3 + startAt) + ']'" class="form-control">
                            <option disabled>Chọn dạng câu hỏi</option>
                            <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id" :selected="ques.question_type_id == qtype.id">{{qtype.type}}</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" :value="ques.choice_A" :name="'choiceA[' + (quesIndex + paraIndex*3 + startAt) + ']'" placeholder="Answer A"><br>
                    <input class="form-control" type="text" :value="ques.choice_B" :name="'choiceB[' + (quesIndex + paraIndex*3 + startAt) + ']'" placeholder="Answer B"><br>
                    <input class="form-control" type="text" :value="ques.choice_C" :name="'choiceC[' + (quesIndex + paraIndex*3 + startAt) + ']'" placeholder="Answer C"><br>
                    <input class="form-control" type="text" :value="ques.choice_D" :name="'choiceD[' + (quesIndex + paraIndex*3 + startAt) + ']'" placeholder="Answer D">
                    <b>Answer choice:</b>
                    <div class="row">
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :checked="ques.answer == 'A'"  :name="'answer[' + (quesIndex + paraIndex*3 + startAt) + ']'" value="A">
                        </div>
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :checked="ques.answer == 'B'"  :name="'answer[' + (quesIndex + paraIndex*3 + startAt) + ']'" value="B">
                        </div>
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :checked="ques.answer == 'C'"  :name="'answer[' + (quesIndex + paraIndex*3 + startAt) + ']'" value="C">
                        </div>
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :checked="ques.answer == 'D'"  :name="'answer[' + (quesIndex + paraIndex*3 + startAt) + ']'" value="D">
                        </div>
                    </div>
                </div>
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