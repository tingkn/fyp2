@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<form id="searchForm">
  <input type="text" id="searchInput" class="form-control" name="search" placeholder="Search...">
</form>

<div class="box">
  <div class="square-row">
    @foreach (range(1, 12) as $i)
        <div class="square" id="square-{{ $i }}">
          @php
            $plasticsData = DB::table('plastics')->where('id', $i)->first();
          @endphp

          @if($plasticsData)
          <img src="{{ asset($plasticsData->image_path) }}" style="max-width: 100%; max-height: 100%; border-radius: 10%;">
          @endif

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
          <h1 id="modal-caption"></h1>
          <h4 id="modal-content"></h4>
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
    function showModal(plasticsId, event) {
      var modal = document.getElementById("modal");
      var plastics = document.getElementById("square-" + plasticsId);
      var caption = modal.getElementsByTagName("h1")[0];
      var content = modal.getElementsByTagName("h4")[0];

      // Retrieve the corresponding plastics object from the plasticsData array
      var plasticsObject = plasticsData.find(function(obj) {
        return obj.id === plasticsId;
      });

      if (plasticsObject) {
        modal.style.display = "block";
        caption.innerHTML = plasticsObject.name;
        content.innerHTML = plasticsObject.content;
      }

      event.preventDefault(); //prevent jumping back to the top
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
