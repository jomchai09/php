<?php
  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Dostors List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="medical examination " class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>medical examination  id</th>
                        <th>medical examination  date</th>
                        <th>patient symptoms</th>
                        <th>medical examination result</th>
                        <th>doctor id</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>medical examination  id</th>
                        <th>medical examination  date</th>
                        <th>patient symptoms</th>
                        <th>medical examination result</th>
                        <th>doctor id</th>
                        
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>';
  include('../master.php');
?>
<!-- page script -->
<script>
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../api/medical examination /read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].medical examination id+"</td>"+
                "<td>"+data[user].medical examination date+"</td>"+
                "<td>"+data[user].patient symptoms+"</td>"+
                "<td>"+((data[user].medical examination result == 0)? "Male": "Female")+"</td>"+
                "<td>"+data[user].doctor id+"</td>"+
                "<td><a href='update.php?id="+data[user].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[user].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#medical examination s"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the medical examination  Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/medical examination /delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed medical examination !");
                    window.location.href = '/medibed/medical examination ';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>