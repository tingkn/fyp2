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
    <!-- Add search box to the top of the page -->
      <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Search recycling centres...">
    <div class="rectangle-row">
      @foreach (range(1, 12) as $i)
          <div class="rectangle" id="rectangle-{{ $i }}">
              @php
                $rcData = DB::table('recyclingcentre')->where('id', $i)->first();
              @endphp
              @if($rcData)
                  <a href="#" class="rectangle-link" onclick="showModal({{ $rcData->id }})">
                      <h3>{{ $rcData->name }}</h3>
                  </a>
              @endif
          </div>
          @if ($i % 2 == 0)
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
  @php
  $rcData = DB::table('recyclingcentre')->get()->toArray();
  @endphp

  <script>
      var rcData = {!! json_encode($rcData) !!};

      // Get the modal element
      var modal = document.getElementById("modal");

      // Function to open the modal
      function showModal(rcID) {
        var modal = document.getElementById("modal");
        var recyclingcentre = document.getElementById("rectangle-" + rcID);
        // var modalImg = modal.getElementsByTagName("img")[0];
        var caption = modal.getElementsByTagName("h2")[0];
        var content = modal.getElementsByTagName("p")[0];

        // Retrieve the corresponding recyclingcentre object from the rcData array
        var rcObject = rcData.find(function(obj) {
          return obj.id === rcID;
        });

        if (rcObject) {
          modal.style.display = "block";
          // modalImg.src = recyclingcentre.getElementsByTagName("img")[0].src;
          caption.innerHTML = rcObject.name;
          content.innerHTML = rcObject.address;
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
      
      // Search function
      function searchFunction() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toUpperCase();
        var rectangles = document.getElementsByClassName("rectangle");
      
        for (var i = 0; i < rectangles.length; i++) {
          var name = rectangles[i].getElementsByTagName("h3")[0];
          if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
            rectangles[i].style.display = "";
          } else {
            rectangles[i].style.display = "none";
          }
        }
      }
  </script>
</body>
</html>
@include('includes.footer')
@endsection