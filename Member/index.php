<?php
  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Dostors List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="member s" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>member id</th>
                        <th>member name</th>
                        <th>Phone</th>
                        <th>member address</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>member id</th>
                        <th>member name</th>
                        <th>Phone</th>
                        <th>member address</th>
                        
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
        url: "../api/member/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].member id+"</td>"+
                "<td>"+data[user].member name+"</td>"+
                "<td>"+data[user].phone+"</td>"+
                "<td>"+data[user].member address+"</td>"+
                
                "<td><a href='update.php?id="+data[user].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[user].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#member"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the member  Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/member /delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed member !");
                    window.location.href = '/medibed/member ';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>