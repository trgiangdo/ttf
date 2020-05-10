require('./bootstrap');

window.Vue = require('vue');

let create_exam = new Vue({
    el: '#create_exam',

    components: {
        'create-exam-form': require('./components/exam/createExam').default,
    },
});
