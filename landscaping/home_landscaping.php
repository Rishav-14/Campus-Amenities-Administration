<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<div style='padding: 17px'>
<h2>Home Landscape Page</h2>
</div>

<?php
    session_start();

    if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']){
?>
        <div class="form-group">
            <div class="col-md">
                <a href="activeGardener.php" class="btn btn-primary">Active Gardener Details</a>
                <a href="allGardener.php" class="btn btn-primary">All Gardener Details</a>
                <a href="attendance.php" class="btn btn-primary">Gardener Attendance</a>
                <a href="roster.php" class="btn btn-primary">Monthly Duty Roster</a>
                <a href="requests.php" class="btn btn-primary">Grass Cutting Requests</a>
                <a href="equipmentRepair.php" class="btn btn-primary">Equipment Repairing Status</a>
                <a href="highReqArea.php" class="btn btn-primary">Campus Area with Most Requests</a><br><br>
                <a href="logout.php" class="btn btn-primary">Log Out</a>
            </div>
        </div>
<?php
        return;
    }
?>

<div class="col-md-8">
    <a href="admin_login.php" class="btn btn-primary">Admin Login</a>
    <a href="new_request.php" class="btn btn-primary">Grass Cutting Requests</a>
    <a href="../index.php" class="btn btn-primary">Go Back</a>
</div>