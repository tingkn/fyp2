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
<form action="{{ route('WTRecycle.index') }}" method="GET">
  <div class="form-group">
    <input type="text" id="searchInput" class="form-control" name="search" placeholder="Search...">
  </div>
</form>
<div class="rectangle-row">
@foreach ($recyclingcentre as $rc)
    <div class="rectangle" id="rectangle-{{ $rc->id }}">
        <a href="#" class="rectangle-link" onclick="showModal({{ $rc->id }})">
            <div class="rectangle-image">
                <img src="{{ $rc->image }}" alt="{{ $rc->name }}" />
            </div>
            <h3>{{ $rc->name }}</h3>
            <p>{{ $rc->address }}</p>
        </a>
    </div>
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

            <div class="col-md-12 mt-5 mb-5">
                <div class="d-flex justify-content-center">
                    {{ $recyclingcentre->links() }}
                </div>
            </div>
  <script>
      var rcData = {!! json_encode($rcData) !!};

      // Get the modal element
      var modal = document.getElementById("modal");

      // Function to open the modal
      function showModal(rcID) {
        var modal = document.getElementById("modal");
        var recyclingcentre = document.getElementById("rectangle-" + rcID);
        var caption = modal.getElementsByTagName("h2")[0];
        var content = modal.getElementsByTagName("p")[0];

        // Retrieve the corresponding recyclingcentre object from the rcData array
        var rcObject = rcData.find(function(obj) {
          return obj.id === rcID;
        });

        if (rcObject) {
          modal.style.display = "block";
          caption.innerHTML = rcObject.name;
          content.innerHTML = rcObject.link + '" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>';
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
  </script>
</body>
</html>
@include('includes.footer')
@endsection