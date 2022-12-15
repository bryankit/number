<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <h3 class="text-center">Word to Number Conversion</h3>
            <h1 class="text-center card-title mb-3" id="answer"></h1>
            <div class="input-group">
            <span class="input-group-text">₱</span><input type="text" class="form-control" placeholder="Enter a number in words" id="wordValue">
                <button class="btn btn-outline-secondary" type="button" onclick="getConversion()">Convert to number</button>
            </div>
        </div>
    </div>
    
    <script>
         function getConversion() {
            $.ajax({
              type:'POST',
              url:'/api/convert',
              data: { words : $('#wordValue').val() },
              success:function(data) {
                console.log(data);
                  $("#answer").html(data);
              }
            });
         }
      </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>