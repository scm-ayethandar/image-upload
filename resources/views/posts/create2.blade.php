<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    input[type="file"] {
        display: none;
    }

    .imageThumb {
        max-height: 80px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }

    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .remove:hover {
        background: white;
        color: black;
    }
</style>

<body>

    <div class="container">
        <form method="post" action="/posts/store" enctype="multipart/form-data">
            @csrf

            <div class="image">
                <label>
                    <h4>Post name</h4>
                </label>
                <input type="text" class="form-control" required name="name">
            </div>

            <div class="image field">
                <div>
                    <label  id="image">
                        <!-- <div class="d-flex"> -->
                            <div class="img-file">
                                <input type="file" name="files[]" id="files" multiple="multiple" required>
                            </div>
                            <img src="\add_image.png" id="add" style="width: 100px; height: 100px;" alt="">
                        <!-- </div> -->
                    </label>
                </div>
                <div class="post_button">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<div class=\"pip position-relative me-3\">" +
                                "<img class=\"imageThumb \" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove position-absolute top-0 start-100 translate-middle badge bg-danger\">X</span>" +
                                "</div>").insertBefore("#image");
                            $(".remove").click(function() {
                                //files.splice(i,1);
                                $(this).parent(".pip").remove();
                            });

                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                    console.log(typeof(files));
                });
            } else {
                alert("Your browser doesn't support to File API")
            }

            // $("#add").click(function() {
            //     $("").insertBefore("#image");
            //     });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>