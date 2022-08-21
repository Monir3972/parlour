<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parlour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
    .search[type=text] {
        width: 31%;
        padding: 6px 11px;
        margin: 5px 0;
        box-sizing: border-box;
       }
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap');
    body{
     font-family: 'Roboto', sans-serif;
     font-size: 11px;
      }
    </style>
  </head>
  <body>
  	<div class="container mt-3">
  		<div class="row">
  			<div class="col-md-6 col-sm-6 mx-auto">
  					<div class="card rounded-0">
  						<div class="card-body">
  						 <form method="POST" id="add_parlour" action="">
  							  <div class="row">
                    <div class="col mb-2">
                      <label for="parlour_name" class="form-label">Select Parlour</label>
                        <select class="form-control form-control-sm" required name="parlour_name" id="parlour_name">
                          
                        </select>
                    </div>
                    <div class="col mb-2">
                      <label for="" class="form-label">Date</label>
                      <input type="date" class="form-control form-control-sm" required name="date" id="date">
                    </div>
  							  </div>
                   <div class="row">
                    <div class="col mb-2">
                      <label for="" class="form-label">Net Sales</label>
                      <input type="text" class="form-control form-control-sm" required="" name="net_sales" id="net_sales" oninput="add_number()">
                    </div>
                   <div class="col mb-2">
                      <label for="" class="form-label">Vat</label>
                      <input type="text" class="form-control form-control-sm" required name="vat" id="vat" value="15" oninput="add_number()">
                   </div>
                  </div>
                   <div class="row">
                    <div class="col mb-2">
                      <label for="" class="form-label">Gross Sales</label>
                      <input type="text" class="form-control form-control-sm" readonly name="gross_sales" id="gross_sales">
                    </div>
                    <div class="col mb-2">
                      <label for="" class="form-label">Received Date</label>
                       <input type="date" class="form-control form-control-sm" required name="received_date" id="received_date">
                    </div>
                  </div>
							  <button type="submit" class="btn btn-success float-end btn-sm mt-1">Save</button>
					     </form>
  						</div>
  					</div>
  			</div>
  		</div>
      <div class="row mt-3">
        <div class="col-md-8 mx-auto">
          <input id="myInput" class="search" type="text" placeholder="Search..">
          <br>
          <div class="table-responsive">
          <table class="table table-bordered" id="parlar_edit">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Parlar Name</th>
              <th scope="col">Net Sales</th>
              <th scope="col">Vat</th>
              <th scope="col">Gross Sales</th>
              <th scope="col">Received Date</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="parlour_data">
           
          </tbody>
        </table>
          </div>
        </div>
      </div>
  	</div>
        <!-- Start Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title mb-0" id="exampleModalLabel">Edit Parlour</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <form method="POST" id="form_Edit_data">
              <input type="hidden" id="fetch_edit_id" name="fetch_edit_id">
              <div class="row">
                <div class="col mb-2">
                  <label for="" class="form-label">Parlar Name</label>
                  <select class="form-control form-control-sm" name="edit_parlour_name" id="edit_parlour_name">
                                
                  </select>
                </div>
               <div class="col mb-2">
                  <label for="" class="form-label">Net Sales</label>
                  <input type="text" class="form-control form-control-sm" name="edit_net_sales" id="edit_net_sales" oninput="add_number_2()">
               </div>
              </div>
              <div class="row">
                  <div class="col mb-2">
                    <label for="" class="form-label">Vat</label>
                     <input type="text" class="form-control form-control-sm" name="edit_vat" id="edit_vat" oninput="add_number_2()">
                  </div>
                  <div class="col mb-2">
                     <label for="" class="form-label">Gross Sales</label>
                     <input type="text" class="form-control form-control-sm" readonly name="edit_gross_sales" id="edit_gross_sales">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="" class="form-label">Received Date</label>
                    <input type="date" class="form-control form-control-sm" name="edit_received_date" id="edit_received_date">
                  </div>
                </div>
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              <button type="submit" id="update" class="btn btn-primary btn-sm">Update</button>
            </div>
           </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/parlour.js"></script>
    <script type="text/javascript">
      var text1 = document.getElementById("net_sales");
      var text2 = document.getElementById("vat");
      function add_number() {
         var first_number = parseFloat(text1.value);
         if (isNaN(first_number)) first_number = 0;
         var second_number = parseFloat(text2.value);
         if (isNaN(second_number)) second_number = 0;
         var result = first_number * second_number;
         var fresult = result/100;
         document.getElementById("gross_sales").value = fresult;
      }
    </script>
    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#parlour_data tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
</script>
  </body>
</html>

   <script type="text/javascript">
      var edit_net_sales = document.getElementById("edit_net_sales");
      var edit_vat = document.getElementById("edit_vat");
      function add_number_2() {
         var first_number = parseFloat(edit_net_sales.value);
         if (isNaN(first_number)) first_number = 0;
         var second_number = parseFloat(edit_vat.value);
         if (isNaN(second_number)) second_number = 0;
         var result = first_number * second_number;
         var fresult = result/100;
         document.getElementById("edit_gross_sales").value = fresult;
      }
    </script>