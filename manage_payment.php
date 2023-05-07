<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        /* Style for the form container */
     
.container {
  width: 50%;
  margin: auto;
  padding: 50px;
  border-radius: 10px;
  background-color: #f2f2f2;
}

/* Style for the form fields */
.form-group {
  margin-bottom: 20px;
}

.control-label {
  display: inline-block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-control {
  display: block;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: none;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.select2-container--default .select2-selection--single {
  height: 40px;
}

/* Style for the form buttons */
.btn-primary {
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  background-color: #4CAF50;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

.btn-secondary {
  padding: 10px 20px;
  margin-left: 10px;
  border-radius: 5px;
  border: none;
  background-color: #f44336;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

.btn-primary:hover,
.btn-secondary:hover {
  opacity: 0.8;
}


    </style>
   
</head>
<body>
<?php 
include 'connection.php'; 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM payments where id= ".$_GET['id']);
  
    $qry = $conn->query("SELECT * FROM payments where id= ".$_GET['id']);
    $result = $qry->fetch_assoc();
    foreach($result as $k => $val){
        $$k=$val;
    }
}
?>


</select>
</div>
<div class="form-group" id="details"></div>
<div class="form-group">
<label for="invoice" class="control-label">Invoice</label>
<input type="text" class="form-control" name="invoice" placeholder="Enter invoice number" <?php echo isset($invoice) ? "value='$invoice'" : '' ?> required>
</div>
<div class="form-group">
<label for="amount" class="control-label">Amount</label>
<input type="number" class="form-control" name="amount" placeholder="Enter payment amount" <?php echo isset($amount) ? "value='$amount'" : '' ?> required>
</div>
<div class="form-group">
<label for="payment_date" class="control-label">Payment Date</label>
<input type="date" class="form-control" name="payment_date" <?php echo isset($payment_date) ? "value='$payment_date'" : '' ?> required>
</div>
<div class="form-group">
<label for="payment_mode" class="control-label">Payment Mode</label>
<select name="payment_mode" id="payment_mode" class="custom-select">
<option value="Cash" <?php echo isset($payment_mode) && $payment_mode == "Cash" ? 'selected' : '' ?>>Cash</option>
<option value="Cheque" <?php echo isset($payment_mode) && $payment_mode == "Cheque" ? 'selected' : '' ?>>Cheque</option>
<option value="Bank Transfer" <?php echo isset($payment_mode) && $payment_mode == "Bank Transfer" ? 'selected' : '' ?>>Bank Transfer</option>
</select>
</div>
<div class="form-group">
<label for="remarks" class="control-label">Remarks</label>
<textarea name="remarks" id="remarks" class="form-control"><?php echo isset($remarks) ? $remarks : '' ?></textarea>
</div>
<div class="form-group">
<button class="btn btn-primary">Save</button>
<button class="btn btn-secondary" type="button" onclick="location.href='payments.php'">Cancel</button>
</div>
</form>

</div>
<script>
    $(document).ready(function(){
        $('.select2').select2({
            placeholder:"Please Select Here",
            width: "100%"
        })
        $('#tenant_id').change(function(){
            var tenant_id = $(this).val()
            if(tenant_id > 0){
                $.ajax({
                    url:'get_tenant_details.php',
                    method:'POST',
                    data:{tenant_id:tenant_id},
                    success:function(resp){
                        $('#details').html(resp)
                    }
                })
            }else{
                $('#details').html('')
            }
        })
        $('#manage-payment').submit(function(e){
            e.preventDefault()
            start_loader()
            $('#msg').html('')
            $.ajax({
                url:'save_payment.php',
                method:'POST',
                data:$(this).serialize(),
                error:err=>{
                    console.log(err)
                    alert("An error occured")
                    end_loader()
                },
                success:function(resp){
                    if(resp == 1){
                        location.href = 'payments.php';
                    }else{
                        $('#msg').html('<div class="alert alert-danger">Failed to save payment.</div>')
                        end_loader()
                    }
                }
            })
        })
    })
</script>
</body>
</html>
