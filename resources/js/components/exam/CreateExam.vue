<template>
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fas fa-user"></i>Thêm đề thi mới</div>
            <div class="panel-body">
                <div class="row justify-content-center" style="margin-bottom:40px">
                    <div class="col-md-8 col-lg-8 col-lg-offset-2">
                        <div class="form-group">
                            <label>Tên đề thi</label>
                            <input type="text" name="exam_name" placeholder="Tên đề thi" class="form-control" required>
                            <!-- @error('email')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror -->
                        </div>
                        <div class="form-group">
                            <label>Loại đề thi</label>
                            <select value="0" name="exam_type" class="form-control" v-model="exam_type" @change="updateNumberOfQuestions()" required>
                                <option value="0" disabled selected>Chọn dạng đề thi Toeic</option>
                                <option value="1">Đề thi trước tháng 6/2020</option>
                                <option value="2">Đề thi sau tháng 6/2020</option>
                                <option value="3">Đề luyện tập</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-purple">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#part1">Part 1</a></li>
                <li><a data-toggle="tab" href="#part2">Part 2</a></li>
                <li><a data-toggle="tab" href="#part3">Part 3</a></li>
                <li><a data-toggle="tab" href="#part4">Part 4</a></li>
                <li><a data-toggle="tab" href="#part5">Part 5</a></li>
                <li><a data-toggle="tab" href="#part6">Part 6</a></li>
                <li><a data-toggle="tab" href="#part7">Part 7</a></li>
            </ul>
            <div class="clearfix"></div>
            <div class="tab-content">
                <create-part1 :numQuestion="numQuestionPart1" :questionTypes="getQuestionTypes(1)"></create-part1>
                <create-part2 :numQuestion="numQuestionPart2" :questionTypes="getQuestionTypes(2)" :startAt="numQuestionPart1"></create-part2>
                <create-part3 :numQuestion="numQuestionPart3" :questionTypes="getQuestionTypes(3)" :startAt="this.numQuestionPart1 + this.numQuestionPart2"></create-part3>
                <create-part4 :numQuestion="numQuestionPart4" :questionTypes="getQuestionTypes(4)" :startAt="this.numQuestionPart1 + this.numQuestionPart2 + this.numQuestionPart3"></create-part4>
                <create-part5 :numQuestion="numQuestionPart5" :questionTypes="getQuestionTypes(5)" :startAt="this.numQuestionPart1 + this.numQuestionPart2 + this.numQuestionPart3 + this.numQuestionPart4"></create-part5>
                <create-part6 :numParagraph="numParagraphPart6" :questionTypes="getQuestionTypes(6)" :startAt="this.numQuestionPart1 + this.numQuestionPart2 + this.numQuestionPart3 + this.numQuestionPart4 + this.numQuestionPart5"></create-part6>
                <create-part7 :numParagraph="numParagraphPart7" :questionTypes="getQuestionTypes(7)" :startAt="this.numQuestionPart1 + this.numQuestionPart2 + this.numQuestionPart3 + this.numQuestionPart4 + this.numQuestionPart5 + this.numParagraphPart6*3"></create-part7>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {
        'create-part1': require('./createPart1').default,
        'create-part2': require('./createPart2').default,
        'create-part3': require('./createPart3').default,
        'create-part4': require('./createPart4').default,
        'create-part5': require('./createPart5').default,
        'create-part6': require('./createPart6').default,
        'create-part7': require('./createPart7').default,
    },

    props: {
        question_type: {require: true}
    },

    data() {
        return {
            exam_type: 1,
            numQuestionPart1: 1,
            numQuestionPart2: 1,
            numQuestionPart3: 1,
            numQuestionPart4: 1,
            numQuestionPart5: 1,
            numParagraphPart6: 1,
            numParagraphPart7: 1,
        }
    },

    methods: {
        getQuestionTypes(part) {
            return this.question_type.filter(type => type.Part == part);
        },

        updateNumberOfQuestions() {
            if (this.exam_type == 1) {
                this.numQuestionPart1 = 1;
                this.numQuestionPart2 = 1;
                this.numQuestionPart3 = 1;
                this.numQuestionPart4 = 1;
                this.numQuestionPart5 = 1;
                this.numParagraphPart6 = 1;
                this.numParagraphPart7 = 1;
            } else if (this.exam_type == 2) {
                this.numQuestionPart1 = 4;
                this.numQuestionPart2 = 4;
                this.numQuestionPart3 = 4;
                this.numQuestionPart4 = 4;
                this.numQuestionPart5 = 4;
                this.numParagraphPart6 = 4;
                this.numParagraphPart7 = 4;
            }
        }
    },
}
</script>