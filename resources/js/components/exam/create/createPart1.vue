<template>

<div id="part1" class="tab-pane fade in active">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-question"></i>
            TOEIC® Listening part 1: Photographs
        </h3>
    </div>
    <div class="panel-body">
        <div id="test">
            <div id="testheader">
                <span id="instructions">
                    <p> <b>Directions:</b> For each question in this part, you will hear four statements about a picture in your test book. When you hear the statements, you must select the one statement that best describes what you see in the picture. Then find the number of the question on your answer sheet and mark your answer. The statements will not be printed in your test book and will be spoken only one time. Look at the example below.</p>
                    <input id="img_test1" type="file" name="part1_example_image" class="form-control hidden" @change="changeImg($event, 0)" required>
                    <div class="example">
                        <label for="img_test1"> <img style="max-width: 300px; max-height: 100%;" id="img_example" :src="imageUrl[0]"></label>
                    </div>
                    <textarea class="form-control" type="text" name="part1_example"  placeholder="Guide to choose the answer" style="height: 100px;" required></textarea><br>
                    <b>Audio: </b><br>
                    <input type="file" name="part1_audio" required/><br>
                </span>
            </div>
        </div>
        <div id="extracttoeic">
        </div>
        <hr>
        <div id="questions_part1" v-for='ques in numQuestion' :key='ques'>
            <p><b>Question {{ques}}:</b></p>
            <div class="row">
                <div class="form-group">
                    <label>Loại câu hỏi</label>
                    <select :name="'questionType[' + Number(ques) + ']'" class="form-control" required>
                        <option value="0" disabled selected>Chọn dạng câu hỏi</option>
                        <option v-for="qtype in questionTypes" :key="qtype.id" :value="qtype.id">{{qtype.type}}</option>
                    </select>
                </div>
                <div class=" col-md-8 image">
                    <input :id="'img_question_' + ques" type="file" :name="'image[' + ques + ']'" class="form-control hidden" @change="changeImg($event, ques)" required>
                    <div class="example">
                        <label :for="'img_question_' + ques"> <img style="max-width: 300px; max-height: 100%;" :id="'img_'+ques" :src="imageUrl[ques]"></label>
                    </div>
                </div>
                <div class="col-md-4 answer">
                    <div class="choices">
                        <ul class="list-question">
                            <li>
                                <span class="lq-number">A</span>
                                <span class="my-radio">
                                    <input type="radio" id="" :name="'answer['+ ques + ']'" value="A" checked>
                                </span>
                            </li>
                            <li>
                                <span class="lq-number">B</span>
                                <span class="my-radio">
                                    <input type="radio" id="" :name="'answer['+ ques + ']'" value="B">
                                </span>
                            </li>
                            <li>
                                <span class="lq-number">C</span>
                                <span class="my-radio">
                                    <input type="radio" id="" :name="'answer['+ ques + ']'" value="C">
                                </span>
                            </li>
                            <li>
                                <span class="lq-number">D</span>
                                <span class="my-radio">
                                    <input type="radio" id="" :name="'answer['+ ques + ']'" value="D">
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        props: {
            numQuestion: { type: Number, require: true },
            questionTypes: { type: Array, require: true }
        },

        data() {
            return {
                imageUrl: []
            }
        },

        methods: {
            changeImg(event, num) {
                const file = event.target.files[0];
                Vue.set(this.imageUrl, num, URL.createObjectURL(file));
            }
        },

        created() {
            for (let i = 0; i <= this.numQuestion; i++) {
                this.imageUrl.push('https://picsum.photos/250/188');
            }
        },

        beforeUpdate() {
            for (let i = this.imageUrl.length; i <= this.numQuestion; i++) {
                this.imageUrl.push('https://picsum.photos/250/188');
            }
        }
    }
</script>