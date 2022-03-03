<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    require_once "db.php";
    session_start();

    $query = "SELECT Campus_Area.CID, Campus_Area.Field_Area, Campus_Area.Location, Campus_Area.Flora_Type,
    (SELECT MAX(tempTable.tempcount) FROM (SELECT COUNT(*) AS tempcount FROM Request GROUP BY CID) tempTable) AS Req_Amt
    FROM Campus_Area 
    WHERE Campus_Area.CID IN(
    SELECT Request.CID FROM Request 
    GROUP BY Request.CID 
    HAVING COUNT(*) = (SELECT MAX(sumTable.tempcount) FROM 
    (SELECT COUNT(*) AS tempcount FROM Request
    GROUP BY CID) sumTable))" ;
    $res = $db -> query($query);
    
?>

<div style='padding: 15px'>
<h2>Details</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">CID</th>
            <th scope="col">Field Area</th>
            <th scope="col">Location</th>
            <th scope="col">Flora Type</th>
            <th scope="col">Total Requests</th>
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


