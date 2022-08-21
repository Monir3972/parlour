$(document).ready(function() {

     
       $.ajax({
          url: "api/api.php", //the page containing php script
          type: "post", //request type,
          data: {
                'req': '1',
                'param': '1',
              },
        dataType: "json",
        success: function(result) {
        $("#parlour_name").html(result);
        }
        });

        //  $.ajax({
        //   url: "api/api.php", //the page containing php script
        //   type: "post", //request type,
        //   data: {
        //         'req': '1',
        //         'param': '1',
        //       },
        // dataType: "json",
        // success: function(result) {
        // $("#edit_parlour_name").html(result);
        // }
        // });

        $.ajax({
          url:"api/api.php", //the page containing php script
          type: "POST", //request type,
          data: {'req': '2', 'param':'2'},
          dataType:"json",
          success:function(result)
          { 
            $("#parlour_data").html(result);
          }
          });

     $('#add_parlour').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $('form').serialize(),
             url:"controller/insert_parlour.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result) {
                 alert('Success');
                 $.ajax({
                    url:"api/api.php", //the page containing php script
                    type: "POST", //request type,
                    data: {'req': '2', 'param':'2'},
                    dataType:"json",
                    success:function(result)
                    { 
                       $("#parlour_data").html(result);
                    }
                 });
             }
         });
         $("#add_parlour")[0].reset();
        
     });

        // Edit_modal_data

     $("#parlar_edit").on('click', '#edit_id',function(e)
      {
         var eid = $(this).attr('data-id');
         $("#fetch_edit_id").val(eid);
         $("#editModal").modal('show');
      });

    
     $("#editModal").on('show.bs.modal', function(event)
      {  
         var edit = $("#fetch_edit_id").val();
         $.ajax({
            url:"api/api.php",
            type: "POST",
            data: {'req': '2', 'param': '3', 'data': 'id = '+edit},
            dataType:"json",
            success:function(result)
            { 
              var dval = result[0];
              // alert(result['name']);
              $("#fetch_edit_id").val(edit);
              $("#edit_net_sales").val(dval['net_sales']);
              $("#edit_vat").val(dval['vat']);
              $("#edit_gross_sales").val(dval['gross']);
              $("#edit_received_date").val(dval['received_date']);
                var p_id = dval['parlar_id'];
                // alert(p_id);
                $.ajax({
                url: "api/api.php", //the page containing php script
                type: "post", //request type,
                data: {'req': '1', 'param': '4',  'match': p_id,
                    },
              dataType: "json",
              success: function(result) {
              $("#edit_parlour_name").html(result);
              }
              });
            }
         });
      });

       //update data to database

     $('#form_Edit_data').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $('form').serialize(),
             url:"controller/update_parloul.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result) {
                 alert('Success');
                 $.ajax({
                  url:"api/api.php", //the page containing php script
                  type: "POST", //request type,
                  data: {'req': '2', 'param':'2'},
                  dataType:"json",
                  success:function(result)
                  { 
                    $("#parlour_data").html(result);
                    $('#editModal').modal('hide');
                  }
                  });
             }
         });
     });
    });


