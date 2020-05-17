<template>

<div id="part6" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Reading part 6 : Incomplete sentences
        </h3>
        <input type="number" name="startPart6" :value="startAt" hidden>
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
            <div v-for="para in numParagraph" :key='para'>
            <b>Question {{(para-1)*3 + startAt}} - {{((para-1)*3 + startAt) + 2}}: refer to the following text</b><br>
            <textarea :name="'part6_paragraph[' + para + ']'" type="text" class="form-control" value="p6" required></textarea>
            <div>
                <div v-for="ques in 3" :key='ques'>
                    <b>Question {{ques + (para-1)*3 + startAt - 1}}:</b><br>
                    <div class="form-group">
                        <label>Loại câu hỏi</label>
                        <select :name="'questionType[' + (ques + (para-1)*3 + startAt - 1) + ']'" class="form-control">
                            <option value="0" disabled selected>Chọn dạng câu hỏi</option>
                            <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id">{{qtype.type}}</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" :name="'choiceA[' + (ques + (para-1)*3 + startAt - 1) + ']'" placeholder="Answer A" value="Answer" required><br>
                    <input class="form-control" type="text" :name="'choiceB[' + (ques + (para-1)*3 + startAt - 1) + ']'" placeholder="Answer B" value="Answer" required><br>
                    <input class="form-control" type="text" :name="'choiceC[' + (ques + (para-1)*3 + startAt - 1) + ']'" placeholder="Answer C" value="Answer" required><br>
                    <input class="form-control" type="text" :name="'choiceD[' + (ques + (para-1)*3 + startAt - 1) + ']'" placeholder="Answer D" value="Answer" required>
                    <b>Answer choice:</b>
                    <div class="row">
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :name="'answer[' + (ques + (para-1)*3 + startAt - 1) + ']'" value="A" checked>
                        </div>
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :name="'answer[' + (ques + (para-1)*3 + startAt - 1) + ']'" value="B">
                        </div>
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :name="'answer[' + (ques + (para-1)*3 + startAt - 1) + ']'" value="C">
                        </div>
                        <div class="col-md-1">
                            <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :name="'answer[' + (ques + (para-1)*3 + startAt - 1) + ']'" value="D">
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
            numParagraph: { type: Number, require: true },
            startAt: { type: Number, default: 1 },
            questionTypes: { type: Array, require: true }
        }
    }
</script>