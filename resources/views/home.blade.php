<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <br>
    @if(session('message'))
    <div class="alert alert-success" role="alert">
    {{session('message')}}
    </div>
    @endif
    <div class="container">
    <h2>Upload Image</h2>
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Choose Image:</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            @error('image')
            <div class="alert alert-success" role="alert">
            {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="caption" class="form-label">Caption:</label>
            <input type="text" class="form-control" id="caption" name="caption" required>
            @error('caption')
            <div class="alert alert-success" role="alert">
            {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <br>

    @if(session('image'))
    <img src="{{session('image')}}" alt="" height="100px">
    @endif
    <img src="{{$images}}" alt="" height="100px">
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>