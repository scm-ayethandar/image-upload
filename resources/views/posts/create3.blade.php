<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Multiple Image Upload with Preview and Delete jQuery Plugin</title>
    <link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">
  </head>
  <body>
        <form method="post" action="/posts/store" enctype="multipart/form-data">
            @csrf

            <div class="image">
                <label>
                    <h4>Post name</h4>
                </label>
                <input type="text" class="form-control" required name="name">
            </div>
            <div name="files[]" id="drag-drop-area"></div>

        </form>
 
    <script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>
    <script>
      var uppy = Uppy.Core()
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area'
        })
        .use(Uppy.Tus, {endpoint: 'https://master.tus.io/files/'}) //you can put upload URL here, where you want to upload images
 
      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
        console.log(result);
      })
    </script>
  </body>
</html>