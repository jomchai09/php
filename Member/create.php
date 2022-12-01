<?php 
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add member </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputmember name1">member name</label>
                          <input type="text" class="form-control" id="member name" placeholder="Enter member name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember address1">member address address</label>
                          <input type="member address" class="form-control" id="member address" placeholder="Enter member address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember name1">Phone</label>
                          <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputmember name1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" member name="gender" id="optionsRadios1" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" member name="gender" id="optionsRadios2" value="1">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputmember name1">Specialist</label>
                          <input type="text" class="form-control" id="specialist" placeholder="Enter Specialization">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="Addmember ()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../master.php');
?>
<script>
  function Addmember (){

        $.ajax(
        {
            type: "POST",
            url: '../api/member /create.php',
            dataType: 'json',
            data: {
                membername: $("#member name").val(),
                memberaddress: $("#member address").val(),        
                password: $("#password").val(),
                phone: $("#phone").val(),
                
                
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New member !");
                    window.location.href = '/medibed/member ';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>