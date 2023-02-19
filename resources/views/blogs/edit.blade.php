@include('includes.adminSidebar1')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
  <div class="container" style="padding-left:190px">
    <div class="row">
      <div class="col-lg-12">
        <div class="pull-left">
          <h2>Edit Blog</h2>
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('blogs.index') }}" enctype="multipart/form-data"> Back</a>
        </div>
      </div>
    </div>

    @if(session('status'))
      <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
      </div>
    @endif
  
    <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Blog Title:</strong>
                <input type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="Blog Title">
          @error('title')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Blog Content:</strong>
              <input type="text" name="content" value="{{ $blog->content }}" class="form-control" placeholder="Blog Content">
          @error('content')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>