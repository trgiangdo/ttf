<template>

<div id="part7" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Reading part 7: Comprehension
        </h3>
        <input type="number" name="startPart7" :value="Number(startAt+1)" hidden>
        <input type="number" name="numParaPart7" :value="numParagraph" hidden>
    </div>
    <div class="panel-body">
        <div id="test">
            <div id="testheader">
                <p> <b>Directions:</b> Read the texts. You will notice that each text is followed by several questions. For each question, decide which of the four answer choices: (A), (B), (C), or (D), best answers the question. Then mark your answer on the Answer Sheet. </p>
            </div>
            <hr>
            <div id="extracttoeic">
            </div>
            <div id="questions_part7">
                <div v-for="para in numParagraph" :key='para'>
                    <b>Paragraph {{para}}</b>
                    <textarea :name="'part7_paragraph[' + para + ']'" type="text" class="form-control"></textarea><br>
                    <label>Số câu hỏi</label>
                    <input type="number" min="1" :name="'part7_numQuestions[' + para + ']'" v-model="numQuestions[para]" require class="form-control">
                    <div style="padding-top: 10px" :class="'paragraph_'+para" v-for="ques in Number(numQuestions[para])" :key='ques'>
                        <b>Question {{(ques + startAt + sumOfPreviousQuestions(para))}}:</b><br>
                        <input class="form-control" type="text" :name="'question[' + (ques + startAt + sumOfPreviousQuestions(para)) + ']'" placeholder="Question"><br>
                        <div class="form-group">
                        <label>Loại câu hỏi</label>
                            <select :name="'questionType[' + (ques + startAt + sumOfPreviousQuestions(para)) + ']'" class="form-control">
                                <option value="0" disabled selected>Chọn dạng câu hỏi</option>
                                <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id">{{qtype.type}}</option>
                            </select>
                        </div>
                        <input class="form-control" type="text" :name="'choiceA[' + (ques + startAt + sumOfPreviousQuestions(para)) +  ']'" placeholder="Answer A"><br>
                        <input class="form-control" type="text" :name="'choiceB[' + (ques + startAt + sumOfPreviousQuestions(para)) +  ']'" placeholder="Answer B"><br>
                        <input class="form-control" type="text" :name="'choiceC[' + (ques + startAt + sumOfPreviousQuestions(para)) +  ']'" placeholder="Answer C"><br>
                        <input class="form-control" type="text" :name="'choiceD[' + (ques + startAt + sumOfPreviousQuestions(para)) +  ']'" placeholder="Answer D">
                        <b>Answer choice:</b>
                        <div class="row">
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :name="'answer[' + (ques + startAt + sumOfPreviousQuestions(para)) + ']'" value="A">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :name="'answer[' + (ques + startAt + sumOfPreviousQuestions(para)) + ']'" value="B">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :name="'answer[' + (ques + startAt + sumOfPreviousQuestions(para)) + ']'" value="C">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :name="'answer[' + (ques + startAt + sumOfPreviousQuestions(para)) + ']'" value="D">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: both;">
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
            numParagraph: { type: Number, require: true },
            startAt: { type: Number, default: 1 },
            questionTypes: { type: Array, require: true }
        },
        data() {
            return {
                numQuestions: []
            }
        },

        methods: {
            sumOfPreviousQuestions(para) {
                let sum = 0;
                for (let i = 1; i < para; i++) {
                    sum += Number(this.numQuestions[i]);
                }
                return sum;
            }
        },

        created() {
            for (let i = 0; i <= this.numParagraph; i++) {
                this.numQuestions.push(1);
            }
        },

        beforeUpdate() {
            for (let i = this.numQuestions.length; i <= this.numParagraph; i++) {
                this.numQuestions.push(1);
            }
        }
    }
</script>