<?php
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update prescription number</h3>
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
                          <label for="exampleInputprescription detail1">prescription detail</label>
                          <input type="prescription detail" class="form-control" id="prescription detail" placeholder="prescription detail">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputprescription number1">Phone</label>
                          <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputprescription number1">id</label>
                            <div class="radio">
                                <label>
                                <input type="radio" prescription number="id" id="id0" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" prescription number="id" id="id1" value="1">
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
                        <input type="button" class="btn btn-primary" onClick="Updateprescription number()" value="Update"></input>
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
            url: "../api/prescription number/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#prescription number').val(data['prescription number']);
                $('#prescription date').val(data['prescription date']);
                $('#prescription detail').val(data['prescription detail']);
                
                
            },
            error: function (result) {
                console.log(result);
            },
        });
    });
    function Updateprescription number(){
        $.ajax(
        {
            type: "POST",
            url: '../api/prescription number/update.php',
            dataType: 'json',
            data: {
                id: <?php echo $_GET['id']; ?>,
                prescriptionnumber: $("#prescription number").val(),
                prescriptiondate: $("#prescription date").val(),        
                prescriptiondetail: $("#prescription detail").val(),
                
                id: $("input[prescription number='id']:checked").val(),
                
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated prescription number!");
                    window.location.href = '/medibed/prescription number';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>