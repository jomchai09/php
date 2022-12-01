<?php
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update member </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputmember id1">member id</label>
                          <input type="text" class="form-control" id="member id" placeholder="Enter member id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember name1">member name address</label>
                          <input type="member name" class="form-control" id="member name" placeholder="Enter member name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember address1">member address</label>
                          <input type="member address" class="form-control" id="member address" placeholder="member address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember id1">Phone</label>
                          <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputmember id1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" member id="gender" id="gender0" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" member id="gender" id="gender1" value="1">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember id1">Specialist</label>
                          <input type="text" class="form-control" id="specialist" placeholder="Enter Specialization">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="Updatemember ()" value="Update"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
              
  include('../master.php');
?>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "../api/member /read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#member id').val(data['member id']);
                $('#member name').val(data['member name']);
                $('#member address').val(data['member address']);
                $('#phone').val(data['phone']);
                
            },
            error: function (result) {
                console.log(result);
            },
        });
    });
    function Updatemember (){
        $.ajax(
        {
            type: "POST",
            url: '../api/member /update.php',
            dataType: 'json',
            data: {
                id: <?php echo $_GET['id']; ?>,
                memberid: $("#member id").val(),
                membername: $("#member name").val(),        
                memberaddress: $("#member address").val(),
                phone: $("#phone").val(),
                
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated member !");
                    window.location.href = '/medibed/member ';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>