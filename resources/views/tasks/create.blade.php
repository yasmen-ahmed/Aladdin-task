<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  

    <!-- Your content here -->
    <br>
    <br>
<div class="container ">
    <h1 class="m-5 p-2 text-center text-info border border-info">Create Task</h1>
    <div class="container w-75">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          
    
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
                <br>
                @error('due_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
    
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>