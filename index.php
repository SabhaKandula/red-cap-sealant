<html>
  <head>
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script
      src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <div class="container">
  <div class='row'>
  <form>
      <div class="form-group">
        <label for="fileName">File Name</label>
        <input type="text" class="form-control" id="fileName" aria-describedby="fileName" placeholder="Enter file Name">       
      </div>
      <button type="button" class="btn btn-primary retrieve">Submit</button>
    </form>
    <table id="example" class="table table-bordered table-striped table-condensed" cellspacing="0" width="100%"></table>
  </div>   
  </div>
</html>
<script>
$(document).ready(function() {
    $('.retrieve').click(function() {
        var fileName = $('#fileName').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: fileName, 
            success: function(data) {
                console.log(data);
                dataSet = data;
                var my_columns = [];
                $.each(dataSet[0], function(key, value) {
                    var my_item = {};
                    my_item.data = key;
                    my_item.title = key;
                    my_columns.push(my_item);
                });
                if ($.fn.dataTable.isDataTable('#example')) {
                    $('#example').DataTable().destroy();
                    $('#example').empty();
                    $('#example').DataTable({
                        data: dataSet,
                        "columns": my_columns
                    });
                } else {
                    $('#example').DataTable({
                        data: dataSet,
                        "responsive"; true,
                        "columns": my_columns
                    });
                }
            }
        });
    })
})
  
  
</script>