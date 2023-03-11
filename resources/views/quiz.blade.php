@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <style>
        .quiz-screen {
          background-color: #f7f7f7;
          border: 2px solid #555;
          padding: 30px;
          width: 80%;
          max-width: 800px;
          margin: 0 auto;
          text-align: center;
          margin-bottom: 80px;
        }

        .quiz-slider {
          display: flex;
          flex-direction: column;
          align-items: center;
        }

        .quiz-slide {
          display: none;
        }

        .quiz-slide.active {
          display: block;
        }

        .quiz-options {
          display: flex;
          flex-direction: column;
          margin-top: 30px;
        }

        .quiz-options button {
          margin-top: 10px;
          padding: 10px 20px;
          border: 1px solid #555;
          background-color: #fff;
          color: #555;
          font-size: 1.2rem;
          cursor: pointer;
          transition: all 0.3s ease-in-out;
        }

        .quiz-options button:hover {
          background-color: #555;
          color: #fff;
        }

        .next-button {
          margin-top: 30px;
        }

        .result-message {
          margin-top: 30px;
          font-size: 1.2rem;
          font-weight: bold;
          text-transform: uppercase;
        }

        .result-message.correct {
          color: green;
        }

        .result-message.incorrect {
          color: red;
        }
    </style>
    <script>
        function showSlide(n) {
            var slides = document.getElementsByClassName("quiz-slide");

            if (n > slides.length) {
                slideIndex = 1;
            }

            if (n < 1) {
                slideIndex = slides.length;
            }

            for (var i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }

            slides[slideIndex - 1].classList.add("active");
        }

        var slideIndex = 1;
        showSlide(slideIndex);

        function nextSlide(n) {
            showSlide(slideIndex += n);
        }
    </script>
</head>
<body>
    <div class="quiz-screen">
        <h1>Quiz</h1>

        <div class="quiz-slider">
            <div class="quiz-slide active">
                <p>What is the capital of France?</p>

                <form method="POST" action="/quiz">
                    @csrf

                    <div class="quiz-options">
                        <button type="submit" name="answer" value="London">London</button>
                        <button type="submit" name="answer" value="Paris">Paris</button>
                        <button type="submit" name="answer" value="New York">New York</button>
                    </div>
                </form>

                @if(session('answer') === 'correct')
                    <p class="result-message correct">Correct!</p>
                @elseif(session('answer') === 'incorrect')
                    <p class="result-message incorrect">Incorrect.</p>
                @endif
            </div>

            <div class="quiz-slide">
                <p>What is the largest country in the world by land area?</p>

                <form method="POST" action="/quiz">
                    @csrf

                    <div class="quiz-options">
                        <button type="submit" name="answer" value="Russia">Russia</button>
                        <button type="submit" name="answer" value="China">China</button>
                        <button type="submit" name="answer" value="USA">USA</button>
                    </div>
                </form>

                @if(session('answer') === 'correct')
                    <p class="result-message correct">Correct!</p>
                @elseif(session('answer') === 'incorrect')
                    <p class="result-message incorrect">Incorrect.</p>
                @endif
                </div>
            </div>

        <div class="next-button">
            <button onclick="nextSlide(-1)">Previous</button>
            <button onclick="nextSlide(1)">Next</button>
        </div>
    </div>
</body>
</html>


@include('includes.footer')
@endsection