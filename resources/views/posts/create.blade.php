<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
    <form method="post" action="/posts/store" enctype="multipart/form-data">
        @csrf

        <div class="image">
        <label><h4>Post name</h4></label>
        <input type="text" class="form-control" required name="name" >
        </div>

        <div class="image">
        <label><h4>Add image</h4></label>
        <!-- <input type="file" class="form-control" required name="image" > -->
        <input type="file" name="images[]"  multiple="multiple" required>
        </div>

        <div class="post_button">
        <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>