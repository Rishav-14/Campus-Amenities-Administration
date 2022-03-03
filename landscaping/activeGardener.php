<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    require_once "db.php";
    session_start();

    $query = "SELECT Gardener.GID, Gardener.Name, Gardener.DoB, Gardener.Address, Gardener.Mobile, Gardener.DoJ  
    FROM Gardener
    INNER JOIN Roster on Gardener.GID = Roster.GID
    WHERE Roster.End_Date >= CURDATE() AND Roster.Start_Date <= CURDATE()" ;
    $res = $db -> query($query);
?>

<div style='padding: 15px'>
<h2>Details</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">GID</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Date of Joining</th>
            <th scope="col">Address</th>
            <th scope="col">Mobile No</th>
        </tr>
        </thead>
        <tbody>
<?php
    while ($row = $res -> fetch_row()) {
?>
        <tr>
            <th scope="row"><?php echo $row[0] ?></th>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>
            <td><?php echo $row[4] ?></td>
            <td><?php echo $row[5] ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
</div>

<div class="form-group">
  <label class="col-md-8 control-label"></label>
  <div class="col-md-8">
        <a href="home_landscaping.php" class="btn btn-primary">Go Back</a>
    </div>
</div>


