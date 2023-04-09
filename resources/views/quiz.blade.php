@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Quiz</title>
</head>
<body>
<div class="quiz-screen">
    <div class="quiz-slider">
        <div class="quiz-slide active" id="question-1">
            <p>What is the capital of France?</p>

            <div class="quiz-options">
                <button type="button" onclick="submitAnswer('London', 'question-1')">London</button>
                <button type="button" onclick="submitAnswer('Paris', 'question-1')">Paris</button>
                <button type="button" onclick="submitAnswer('New York', 'question-1')">New York</button>
            </div>
        </div>

        <div class="quiz-slide" id="question-2">
            <p>What is the largest country in the world by land area?</p>

            <div class="quiz-options">
                <button type="button" onclick="submitAnswer('Russia', 'question-2')">Russia</button>
                <button type="button" onclick="submitAnswer('China', 'question-2')">China</button>
                <button type="button" onclick="submitAnswer('USA', 'question-2')">USA</button>
            </div>
        </div>

        <div class="quiz-slide" id="question-3">
            <p>3?</p>

            <div class="quiz-options">
                <button type="button" onclick="submitAnswer('Russia', 'question-3')">Russia</button>
                <button type="button" onclick="submitAnswer('China', 'question-3')">China</button>
                <button type="button" onclick="submitAnswer('USA', 'question-3')">USA</button>
            </div>
        </div>

    </div>

    <div class="next-button">
        <button onclick="nextSlide()">Next</button>
    </div>
</div>

<script>
function showSlide(n) {
    var slides = document.getElementsByClassName("quiz-slide");
    var slideIndex = n;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    if (slideIndex < 1) {
        slideIndex = slides.length;
    }

    for (var i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }

    slides[slideIndex - 1].classList.add("active");
}

var slideIndex = 1;
showSlide(slideIndex);

function submitAnswer(answer, questionId) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "/quiz";
    var csrf = document.createElement("input");
    csrf.type = "hidden";
    csrf.name = "_token";
    csrf.value = "{{ csrf_token() }}";
    form.appendChild(csrf);
    var answerInput = document.createElement("input");
    answerInput.type = "hidden";
    answerInput.name = "answer";
    answerInput.value = answer;
    form.appendChild(answerInput);
    var questionInput = document.createElement("input");
    questionInput.type = "hidden";
    questionInput.name = "questionId";
    questionInput.value = questionId;
    form.appendChild(questionInput);
    document.body.appendChild(form);

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // prevent form submission
    });

    fetch(form.action, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(result) {
        // Display the result in a pop-up window
        var message = result === 'correct' ? 'Correct!' : 'Incorrect.';
        alert(message);
    });
}

    function nextSlide() {
    var slides = document.getElementsByClassName("quiz-slide");
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    showSlide(slideIndex);
}
</script>
</body>
</html>
@include('includes.footer')
@endsection