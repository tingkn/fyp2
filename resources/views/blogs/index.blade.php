@include('includes.adminSidebar1')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container" style="padding-left:190px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <!-- <h2>Laravel 9 CRUD Example Tutorial</h2> -->
                </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create Blog</a>
                    </div>
            </div>
        </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Blog ID</th>
            <th>Blog Title</th>
            <th>Blog Content</th>
            <th width="150px">Action</th>
        </tr>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->content }}</td>
            <p>{{ $blog->title }}</p>
            <td>
                <form action="{{ route('blogs.destroy',$blog->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {!! $blogs->links() !!}
</body>
</html>