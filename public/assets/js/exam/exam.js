var startNumOfPart7 = 152;

function renderQuestions(i, questions, startNumber){
    for (var j=1; j<=i; j++){
        reset = Number(startNumber) + Number(j);
        questions[j] = '<br>'+'<b>Question ' + reset +':' + '</b>' + '<br>'
                + '<div>'
                +    '<input class="form-control" type="text" name="question_'+reset+'[]" placeholder="Question">'+'<br>'
                +    '<input class="form-control" type="text" name="question_'+reset+'[]" placeholder="Answer A">'+'<br>'
                +    '<input class="form-control" type="text" name="question_'+reset+'[]" placeholder="Answer B">'+'<br>'
                +    '<input class="form-control" type="text" name="question_'+reset+'[]" placeholder="Answer C">'+'<br>'
                +    '<input class="form-control" type="text" name="question_'+reset+'[]" placeholder="Answer D">'+'<br>'
                +    '<b>Answer choice:'+'</b>'
                +    '<div class="row">'
                +        '<div class="col-md-1">'
                +            '<p style="float: left; margin-right: 5px;">A'+'</p>' + '<input type="radio" name="question_'+reset+'[]" value="A">'
                +        '</div>'
                +        '<div class="col-md-1">'
                +            '<p style="float: left; margin-right: 5px;">B'+'</p>'+ '<input type="radio" name="question_'+reset+'[]" value="B">'
                +        '</div>'
                +        '<div class="col-md-1">'
                +            '<p style="float: left; margin-right: 5px;">C'+'</p>'+ '<input type="radio" name="question_'+reset+'[]" value="C">'
                +        '</div>'
                +         '<div class="col-md-1">'
                +            '<p style="float: left; margin-right: 5px;">D'+'</p>'+ '<input type="radio" name="question_'+reset+'[]" value="D">'
                +        '</div>'
                +    '</div>'
                +'</div>' +'<br>'
                ;
    }
    return questions;
}

function showQuestions(event) {
    let part7 = document.getElementById('questions_part7');
    let numberOfPreviousQuestions = (paragraph) => {
        let sum = 0;
        for (let i = 1; i < paragraph; i++) {
            sum += Number(part7.querySelector('.numQuestions_' + i).value);
        }
        return sum;
    };

    var paragraph = event.currentTarget.getAttribute('name').substring(13);
    let startQuestionNumber = Number(startNumOfPart7) + Number(numberOfPreviousQuestions(paragraph));

    var numQuestionsOfParagraph = event.currentTarget.value;
    var questions = [];
    render(numQuestionsOfParagraph, questions, startQuestionNumber);
    $('#questions_part7 .paragraph_' + paragraph).html(questions);
}