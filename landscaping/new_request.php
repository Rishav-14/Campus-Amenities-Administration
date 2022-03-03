<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    require_once "db.php";
    session_start();
    if (isset($_POST['request_by']) && isset($_POST['request_cid'])) {
        $query_request_by = $db->real_escape_string($_POST['request_by']);
        $query_cid = $db->real_escape_string($_POST['request_cid']);
        $query_date = date('Y-m-d');

        $query = "INSERT INTO REQUEST (Request_by, isFinished, Date, CID) values ('$query_request_by', 'F', '$query_date', 
                 $query_cid)" ;
        if($db -> query($query)){
?>
        <div class="modal-content">
			<div class="modal-header">	
				<h4 class="modal-title w-100">Success!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Your request is registered!!</p>
			</div>
			<div class="modal-footer">
				<a href="home_landscaping.php" class="btn btn-success btn-block" data-dismiss="modal">Home Market Page</a>
			</div>
		</div>
<?php
        }
        else{
            $_SESSION['request_failed'] = 'Grass Cutting Request Failed, Please Retry!!';
            header('Location: new_request.php');
        }
        return;
    }
?>

<div class="signup-form jumbotron vertical-center">
<form method="post">
<center><h2>New Request</h2></center>
<?php
    if (isset($_SESSION['request_failed'])) {
        echo('<center><p style="color:red">'.$_SESSION['request_failed'].'</p></center>'."\n");
        unset($_SESSION['request_failed']);
    }
?>
<p class="hint-text"></p>
<div class="row align-items-center justify-content-center">
    <div class="form-group col-lg-3">
        <input type="text" class="form-control" name="request_by" placeholder="Request By" required="required">
    </div>
</div>
<div class="row align-items-center justify-content-center">
    <div class="form-group col-lg-3">
        <input type="text" class="form-control" name="request_cid" placeholder="Campus Area ID" required="required">
    </div>
</div>
<div class="row align-items-center justify-content-center">
    <div class="form-group col-lg-3">
        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
    </div>
</div>
</form>
    <div class="text-center">Cancel Request? <a href="home_landscaping.php">Go Back</a></div>
</div>