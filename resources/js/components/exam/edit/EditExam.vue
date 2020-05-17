<template>

<div class="col-xs-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fas fa-user"></i>Thêm đề thi mới</div>
        <div class="panel-body">
            <div class="row justify-content-center" style="margin-bottom:40px">
                <div class="col-md-8 col-lg-8 col-lg-offset-2">
                    <div class="form-group">
                        <label>Tên đề thi</label>
                        <input type="text" name="exam_name" placeholder="Tên đề thi" class="form-control" :value="exam.name" required>
                        <!-- @error('email')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror -->
                    </div>
                    <h5>Loại đề thi: </h5>
                    <p> {{ examType[exam.type] }} </p>
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
            <edit-part1 :listening="listening_part1" :questionTypes="getQuestionTypes(1)"></edit-part1>
            <edit-part2 :listening="listening_part2" :questionTypes="getQuestionTypes(2)" :startAt="1 + listening_part1.part1.length"></edit-part2>
            <edit-part3 :listening="listening_part3" :questionTypes="getQuestionTypes(3)" :startAt="1 + listening_part1.part1.length + listening_part2.part2.length"></edit-part3>
            <edit-part4 :listening="listening_part4" :questionTypes="getQuestionTypes(4)" :startAt="1 + listening_part1.part1.length + listening_part2.part2.length + listening_part3.part3.length"></edit-part4>
            <edit-part5 :readings="readings_part5" :questionTypes="getQuestionTypes(5)" :startAt="1 + listening_part1.part1.length + listening_part2.part2.length + listening_part3.part3.length + listening_part4.part4.length"></edit-part5>
            <edit-part6 :readings="readings_part6" :questionTypes="getQuestionTypes(6)" :startAt="1 + listening_part1.part1.length + listening_part2.part2.length + listening_part3.part3.length + listening_part4.part4.length + readings_part5.length"></edit-part6>
            <edit-part7 :readings="readings_part7" :questionTypes="getQuestionTypes(7)" :startAt="1 + listening_part1.part1.length + listening_part2.part2.length + listening_part3.part3.length + listening_part4.part4.length + readings_part5.length + 3*readings_part6.length"></edit-part7>
        </div>
    </div>
</div>

</template>


<script>
export default {
    components: {
        'edit-part1': require('./EditPart1').default,
        'edit-part2': require('./EditPart2').default,
        'edit-part3': require('./EditPart3').default,
        'edit-part4': require('./EditPart4').default,
        'edit-part5': require('./EditPart5').default,
        'edit-part6': require('./EditPart6').default,
        'edit-part7': require('./EditPart7').default,
    },

    data() {
        return {
            examType: {
                "old": "Đề thi trước tháng 6/2020",
                "new": "Đề thi sau tháng 6/2020",
                "custom": "Đề luyện tập"
            }
        }
    },

    props: {
        exam: { require: true },
        question_type: { require: true },
        listening_part1: { require: true },
        listening_part2: { require: true },
        listening_part3: { require: true },
        listening_part4: { require: true },
        readings_part5: { require: true },
        readings_part6: { require: true },
        readings_part7: { require: true },
    },

    methods: {
        getQuestionTypes(part) {
            return this.question_type.filter(type => type.Part == part);
        },
    },
}
</script>