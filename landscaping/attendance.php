<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    require_once "db.php";
    session_start();
?>
<form method = post>
    <br><br>
    <div class="row align-items-center justify-content-center">
        <div class="form-group col-lg-3">
            <input type="text" class="form-control" name="sa_gid" placeholder="Gardener ID"><br>
            <button type="submit" class="btn btn-success btn-lg btn-block">Show Attendance</button>
        </div>
    </div>
</form>

<div style='padding: 15px'>
<h2>Attendance Details</h2>
<?php
    if(isset($_POST['sa_gid'])){
        $query_sagid = $db->real_escape_string($_POST['sa_gid']);
        
        $query = "CALL attendance_log('$query_sagid')" ;
        
        $res = $db -> query($query);
        if(empty($res->num_rows)){
            $_SESSION['no_data'] = 'No Data';
            header('Location: attendance.php');
            return;
        }
?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">GID</th>
                    <th scope="col">AID</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
<?php
        while ($row = $res->fetch_assoc()) {
?>
            <tr>
                <th scope="row"><?php echo $row['GID'] ?></th>
                <td><?php echo $row['AID'] ?></td>
                <td><?php echo $row['Date'] ?></td>
            </tr>
<?php
        }
?>
            </tbody>
        </table>
<?php
    }
    if (isset($_SESSION['no_data'])) {
        echo('<p style="color:red">'.$_SESSION['no_data'].'</p>'."\n");
        unset($_SESSION['no_data']);
    }
?>
</div>

<div class="col-md-8">
    <a href="home_landscaping.php" class="btn btn-primary">Go Back</a>
</div>