<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>Howard Realty</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,500,300">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Slabo+27px">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
	<!-- connect to database -->
	<?php
		$con = mysqli_connect("localhost", "jack", "Taylorerb1", "howard_realty_db");

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$id = $_GET['id'];
			$select = "SELECT * FROM rentals WHERE id='$id'";
			$result = mysqli_query($con, $select);
			$item = mysqli_fetch_array($result);
		}
	?>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.html">Howard Realty</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="index.html">HOME </a></li>
                    <li class="active" role="presentation"><a href="rent.php">RENT </a></li>
                    <li role="presentation"><a href="contact.php">CONTACT </a></li>
                    <li role="presentation"><a href="pay.php">PAY RENT </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbo-mini"></div>

    <div class="container">

		<!-- title -->
		<h1 class="text-center" id="item-title">
			<?php echo $item['address'];?>
		</h1>
		<h3 class="text-center" id="item-title-2">
			<?php
				if ($item['vacancy'] == "yes") {
					echo "$" . $item['price'] . "/month";
				} else {
					echo "NOT AVAILABLE";
				}
			?>
        </h3>

		<!-- images -->
        <div class="row" id="item-img-bg">
            <div class="col-sm-6 col-xs-12">
                <p class="text-center">
					<?php
						$img_path = '/home/kennethjhoward/www/assets/img/' . $item['id'] . '.jpg';

						if (file_exists($img_path) == true) {
							echo "<img src='http://www.jackhowardrealty.com/assets/img/" . $item['id'] . ".jpg' width='100%' id='item-img' class='card'>";
						} else {
							echo "<img src='http://www.jackhowardrealty.com/assets/img/default.jpg' width='100%' id='item-img' class='card'>";
						}
					?>
				</p>
            </div>
			<?php
				$key = "AIzaSyCXpRX_RYyJ4B9mZeFwoB1l0VeR0-9nujA";
				$url_address = urlencode($item['address']) . "high+point+nc";
				$gm_url = "https://www.google.com/maps/embed/v1/place?key=$key&q=$url_address";
			?>
            <div class="col-sm-6 col-xs-12">
                <p class="text-center"><iframe src="<?php echo $gm_url;?>" width="100%" id="item-map" class="card"></iframe> </p>
            </div>
        </div>

		<!-- details -->
        <div class="row">
            <div class="col-md-12">
                <h3>Details </h3></div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Price: $<?php echo $item['price'];?>/month</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Deposit: $<?php echo $item['deposit'];?></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>1 Year Lease</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>No Pets</li>
                </ul>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Cash, Money Order, or Online (Paypal) rent payments</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Beds: <?php echo $item['beds'];?></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>
					Baths:
					<?php echo $item['full'];?> full

					<?php if ($item['half'] > 0)
							echo ',' . $item['half'] . ' half'; ?>

					</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Heating: <?php echo $item['heating'];?></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Cooling: <?php echo $item['cooling'];?></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Washer/Dryer Hookup: <?php echo $item['washer'];?></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Flooring: <?php echo $item['hardwood'];?></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>School District</h3></div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Elementary: <?php echo $item['elem'];?> </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>Middle: <?php echo $item['middle'];?> </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul>
                    <li>High: <?php echo $item['high'];?> </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="item-contact">
                <h3 class="text-center">To View This Property Or For More Information, Call:</h3>
                <h2 class="text-center" id="phone">(336) 883-9602</h2></div>
        </div>
    </div>
    <footer>
        <h4 class="text-center">© 2014 – 2022 Howard Realty&nbsp; </h4></footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
