<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    require_once "db.php";
    session_start();

    $query = "SELECT * FROM Request" ;
    $res = $db -> query($query);
?>

<div style='padding: 15px'>
<h2>Details</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">RID</th>
            <th scope="col">Requested By</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">CID</th>
        </tr>
        </thead>
        <tbody>
<?php
    while ($row = $res -> fetch_row()) {
?>
        <tr>
            <th scope="row"><?php echo $row[0] ?></th>
            <td><?php echo $row[1] ?></td>
            <td><?php 
                if($row[2]=='T')
                    echo "Completed";
                else
                    echo "Under Work"; 
            ?></td>
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


