<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
     <form>
          <div class="mb-3">
            <label for="" class="form-label">Net Sales</label>
            <input type="text" class="form-control" id="Text1" oninput="add_number()" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Vat</label>
            <input type="text" class="form-control" id="Text2" oninput="add_number()">
          </div>
          <input type="text" id="txtresult" name="TextBox3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var text1 = document.getElementById("Text1");
      var text2 = document.getElementById("Text2");

      function add_number() {
         var first_number = parseFloat(text1.value);
         if (isNaN(first_number)) first_number = 0;
         var second_number = parseFloat(text2.value);
         if (isNaN(second_number)) second_number = 0;
         var result = first_number + second_number;
         document.getElementById("txtresult").value = result;
      }
    </script>
  </body>
</html>