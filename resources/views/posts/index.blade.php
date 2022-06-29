<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <style>
    #btn-back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: none;
    }
  </style>
</head>

<body>

  <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    Top
  </button>
  <div class="container">
    <a type="button" href="posts/create">Create Post</a>
  </div>
  <div class="container">
    @if($posts->count())

    @foreach($posts as $post)

    <div class="row row-cols-1">
      <h5>{{ $post->name }}</h5>
      @if($post->images->count())
      @foreach($post->images as $image)
      <a href="/posts/img/{{ $image->id }}">
        <img src="{{ url($image->path.'/'.$image->name) }}" style="height: 100px; width: 150px;">
      </a>
      @endforeach
      @endif
    </div>
    <form action="/posts/edit/{{$post->id}}" method="post">
      @csrf
      <button class="btn btn-secondary">Update</button>
    </form>
    <form action="" method="post">
      @csrf
      <button class="btn btn-danger">Delete</button>
    </form>
    @endforeach
    @endif
  </div>

  <script>
    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (
        document.body.scrollTop > 200 ||
        document.documentElement.scrollTop > 200
      ) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>