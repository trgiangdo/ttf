<template>

<div id="part7" class="tab-pane fade">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Reading part 7: Comprehension
        </h3>
        <input type="number" name="startPart7" :value="Number(startAt)" hidden>
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
                <div v-for="(para, paraIndex) in readings" :key='paraIndex'>
                    <b>Paragraph {{(paraIndex + 1)}}</b>
                    <textarea :value="para.paragraph" :name="'part7_paragraph[' + paraIndex + ']'" type="text" class="form-control"></textarea><br>
                    <label>Số câu hỏi</label>
                    <input type="number" min="1" :name="'part7_numQuestions[' + paraIndex + ']'" v-model="numQuestions[paraIndex]" require class="form-control">
                    <div style="padding-top: 10px" :class="'paragraph_'+para" v-for="quesIndex in Number(numQuestions[paraIndex])" :key='quesIndex'>
                        <b>Question {{(quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex))}}:</b><br>
                        <input class="form-control" type="text" v-if="typeof para.part7[quesIndex-1] !== 'undefined'" :value="para.part7[quesIndex-1].question" :name="'question[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" placeholder="Question">
                        <input class="form-control" type="text" v-else :name="'question[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" placeholder="Question"><br>
                        <div class="form-group">
                        <label>Loại câu hỏi</label>
                            <select v-if="typeof para.part7[quesIndex-1] !== 'undefined'" :name="'questionType[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" class="form-control">
                                <option disabled>Chọn dạng câu hỏi</option>
                                <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id" :selected="para.part7[quesIndex-1].question_type_id == qtype.id">{{qtype.type}}</option>
                            </select>
                            <select v-else :name="'questionType[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" class="form-control">
                                <option disabled value="0" selected>Chọn dạng câu hỏi</option>
                                <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id">{{qtype.type}}</option>
                            </select>
                        </div>
                        <input class="form-control" type="text" v-if="typeof para.part7[quesIndex-1] !== 'undefined'" :value="para.part7[quesIndex-1].choice_A" :name="'choiceA[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer A">
                        <input class="form-control" type="text" v-else :name="'choiceA[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer A">
                        <br>
                        <input class="form-control" type="text" v-if="typeof para.part7[quesIndex-1] !== 'undefined'" :value="para.part7[quesIndex-1].choice_B" :name="'choiceB[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer B">
                        <input class="form-control" type="text" v-else :name="'choiceB[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer B">
                        <br>
                        <input class="form-control" type="text" v-if="typeof para.part7[quesIndex-1] !== 'undefined'" :value="para.part7[quesIndex-1].choice_C" :name="'choiceC[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer C">
                        <input class="form-control" type="text" v-else :name="'choiceC[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer C">
                        <br>
                        <input class="form-control" type="text" v-if="typeof para.part7[quesIndex-1] !== 'undefined'" :value="para.part7[quesIndex-1].choice_D" :name="'choiceD[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer D">
                        <input class="form-control" type="text" v-else :name="'choiceD[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) +  ']'" placeholder="Answer D">
                        <b>Answer choice:</b>
                        <div class="row" v-if="typeof para.part7[quesIndex-1] !== 'undefined'">
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :checked="para.part7[quesIndex-1].answer == 'A'" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="A">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :checked="para.part7[quesIndex-1].answer == 'B'" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="B">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :checked="para.part7[quesIndex-1].answer == 'C'" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="C">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :checked="para.part7[quesIndex-1].answer == 'D'" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="D">
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">A</p> <input type="radio" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="A">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">B</p> <input type="radio" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="B">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">C</p> <input type="radio" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="C">
                            </div>
                            <div class="col-md-1">
                                <p style="float: left; margin-right: 5px;">D</p> <input type="radio" :name="'answer[' + (quesIndex-1 + startAt + sumOfPreviousQuestions(paraIndex)) + ']'" value="D">
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
            readings: { require: true },
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
                for (let i = 0; i < para; i++) {
                    sum += Number(this.numQuestions[i]);
                }
                return sum;
            }
        },

        created() {
            this.readings.forEach(reading => {
                this.numQuestions.push(reading.part7.length)
            });
        },
    }
</script>