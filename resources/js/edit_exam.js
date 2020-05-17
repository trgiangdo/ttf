require('./bootstrap');

window.Vue = require('vue');

let create_exam = new Vue({
    el: '#edit_exam',

    components: {
        'edit-exam-form': require('./components/exam/edit/EditExam').default,
    },
});