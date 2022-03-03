<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<?php
    session_start();
    session_destroy();
?>

<div style='padding: 17px'>
<h2>Home Page</h2>
    CS355: Database Lab Project<br>
    Rishav Raj 1901CS46<br>
    Sushant Sinha 1901CS62<br>
    Utkarsh Singh 1901CS67<br>
</div>

<div class="form-group">
  <label class="col-md-8 control-label"></label>
  <div class="col-md-8">
        <a href="guest_house/home_guest_house.php" class="btn btn-primary">Guest House</a>
        <a href="landscaping/home_landscaping.php" class="btn btn-primary">Landscaping</a>
        <a href="market/home_market.php" class="btn btn-primary">Market</a>
    </div>
</div>