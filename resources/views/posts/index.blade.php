<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a type="button" href="posts/create">Create Post</a>
    </div>

    <div class="container">
    @if($posts->count())

        @foreach($posts as $post)

        <div class="row">
            <h5>{{ $post->name }}</h5>
            @if($post->images->count())
                @foreach($post->images as $image)
                    <img src="{{ url($image->path.'/'.$image->name) }}"
                    style="height: 100px; width: 150px;">
                @endforeach
            @endif
        </div>

        @endforeach
    @endif
    </div>
</body>
</html>