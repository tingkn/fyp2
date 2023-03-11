@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<form id="searchForm">
  <input type="text" id="searchInput" placeholder="Search...">
</form>

<div class="box">
  <div class="square-row">
    @foreach (range(1, 12) as $i)
        <div class="square" id="square-{{ $i }}">
            @switch($i)
                @case(1)
                  <img src="{{ asset('images/bottles.jpg') }}" alt="Plastic Image">
                @break
                @case(2)
                  <img src="{{ asset('images/plastics.jpg') }}" alt="Plastic Image">
                @break
                @case(3)
                  <img src="{{ asset('images/foodpackage.jpg') }}" alt="Plastic Image">
                @break
                @case(4)
                  <img src="{{ asset('images/lego.jpg') }}" alt="Plastic Image">
                @break
                @case(5)
                  <img src="{{ asset('images/keyboard.jpg') }}" alt="Plastic Image">
                @break
                @case(6)
                  <img src="{{ asset('images/cardashboard.jpg') }}" alt="Plastic Image">
                @break
                @case(7)
                  <img src="{{ asset('images/syringes.jpg') }}" alt="Plastic Image">
                @break
                @case(8)
                  <img src="{{ asset('images/furniture.jpg') }}" alt="Plastic Image">
                @break
                @case(9)
                  <img src="{{ asset('images/clothing.jpg') }}" alt="Plastic Image">
                @break
                @case(10)
                  <img src="{{ asset('images/sports.jpg') }}" alt="Plastic Image">
                @break
                @case(11)
                  <img src="{{ asset('images/building.jpg') }}" alt="Plastic Image">
                @break
                @case(12)
                  <img src="{{ asset('images/packaging.jpeg') }}" alt="Plastic Image">
                @break
                @default
                    <p>No image found for this index.</p>
            @endswitch
            @php
              $plasticsData = DB::table('plastics')->where('id', $i)->first();
            @endphp
            @if($plasticsData)
                <a href="#" class="square-link" onclick="showModal({{ $plasticsData->id }})">
                    <p>{{ $plasticsData->name }}</p>
                </a>
            @endif
        </div>
        @if ($i % 4 == 0)
            </div><div class="square-row">
        @endif
    @endforeach
  </div>

  <div id="modal" class="modal">
      <div class="modal-content">
          <span class="close" onclick="hideModal()">&times;</span>
          <h2 id="modal-caption"></h2>
          <p id="modal-content"></p>
      </div>
  </div>
</div>
  @php
    $plasticsData = DB::table('plastics')->get()->toArray();
  @endphp

<script>
    var plasticsData = {!! json_encode($plasticsData) !!};

    // Get the modal element
    var modal = document.getElementById("modal");

    // Function to open the modal
    function showModal(plasticsId) {
      var modal = document.getElementById("modal");
      var plastics = document.getElementById("square-" + plasticsId);
      // var modalImg = modal.getElementsByTagName("img")[0];
      var caption = modal.getElementsByTagName("h2")[0];
      var content = modal.getElementsByTagName("p")[0];

      // Retrieve the corresponding plastics object from the plasticsData array
      var plasticsObject = plasticsData.find(function(obj) {
        return obj.id === plasticsId;
      });

      if (plasticsObject) {
        modal.style.display = "block";
        // modalImg.src = plastics.getElementsByTagName("img")[0].src;
        caption.innerHTML = plasticsObject.name;
        content.innerHTML = plasticsObject.content;
      }
    }

    // Function to close the modal
    function hideModal() {
      modal.style.display = "none";
    }

    // Close modal when the user clicks on <span> (x)
    var closeBtn = document.getElementsByClassName("close")[0];
    closeBtn.onclick = function() {
      hideModal();
    }

    // Close modal when the user clicks anywhere outside of the modal
    window.onclick = function(event) {
      if (event.target == modal) {
          hideModal();
      }
    }

    var searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("input", function() {
      searchPlastics();
    });

    function searchPlastics() {
      var input = document.getElementById("searchInput");
      var query = input.value.toLowerCase();
      var squares = document.getElementsByClassName("square");

      for (var i = 0; i < squares.length; i++) {
        var name = squares[i].getElementsByTagName("p")[0].innerHTML.toLowerCase();
        if (name.indexOf(query) > -1) {
          squares[i].style.display = "";
        } 
        else {
          squares[i].style.display = "none";
        }
      }
    }

    var searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("input", function() {
      searchPlastics();
    });

  </script>
</body>
</html>
@include('includes.footer')
@endsection
