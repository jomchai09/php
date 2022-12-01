<?php 
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add prescription</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputprescription number1">prescription number</label>
                          <input type="text" class="form-control" id="prescription number" placeholder="Enter prescription number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputprescription date1">prescription date address</label>
                          <input type="prescription date" class="form-control" id="prescription date" placeholder="Enter prescription date">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputprescription details1">prescription details</label>
                          <input type="prescription details" class="form-control" id="prescription details" placeholder="prescription details">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputprescription number1">id</label>
                          <input type="text" class="form-control" id="id" placeholder="Enter id">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputprescription number1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" prescription number="gender" id="optionsRadios1" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" prescription number="gender" id="optionsRadios2" value="1">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputprescription number1">Specialist</label>
                          <input type="text" class="form-control" id="specialist" placeholder="Enter Specialization">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="Addprescription()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../master.php');
?>
<script>
  function Addprescription(){

        $.ajax(
        {
            type: "POST",
            url: '../api/prescription/create.php',
            dataType: 'json',
            data: {
                prescriptionnumber: $("#prescription number").val(),
                prescriptiondate: $("#prescription date").val(),        
                prescriptiondetails: $("#prescription details").val(),
                id: $("#id").val(),
                
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New prescription!");
                    window.location.href = '/medibed/prescription';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>