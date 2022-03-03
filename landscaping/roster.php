<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    require_once "db.php";
    session_start();

    $query = "SELECT Gardener.GID, Campus_Area.CID, Gardener.Name, Campus_Area.Location, CONCAT(EXTRACT(YEAR FROM Roster.Start_Date),'-',EXTRACT(MONTH FROM Roster.Start_Date)) as Roster_Month, Roster.Start_Date, Roster.End_Date
    FROM Gardener
    INNER JOIN Roster ON Gardener.GID = Roster.GID
    INNER JOIN Campus_Area ON Campus_Area.CID = Roster.CID
    ORDER BY Roster_Month DESC" ;
    $res = $db -> query($query);
?>

<div style='padding: 15px'>
<h2>Details</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">GID</th>
            <th scope="col">CID</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Roster Month</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
        </tr>
        </thead>
        <tbody>
<?php
    while ($row = $res -> fetch_row()) {
?>
        <tr>
            <th scope="row"><?php echo $row[0] ?></th>
            <th scope="row"><?php echo $row[1] ?></th>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>
            <td><?php echo $row[4] ?></td>
            <td><?php echo $row[5] ?></td>
            <td><?php echo $row[6] ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
</div>

<div class="col-md-8">
    <a href="home_landscaping.php" class="btn btn-primary">Go Back</a>
</div>


