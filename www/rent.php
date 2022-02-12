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

	<!-- load database -->
	<?php
		$con = mysqli_connect("localhost", "jack", "Taylorerb1", "howard_realty_db");
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
        <h1 id="rent-heading">Rentals </h1></div>
    <div class="container">
        <div class="row">

			<!-- rental box
            <div class="col-md-4 col-sm-6">
                <div class="card rent-card">
                    <div class="row">
                        <div class="col-xs-12"><img src="assets/img/house.jpg" width="100%"></div>
                        <div class="col-xs-12">
                            <h3 class="text-center" id="rent-title">916 Ferndale Blvd</h3>
                            <p class="text-center">$500/mo</p>
                            <p class="text-center rent-bed">2 bed</p>
                            <p class="text-center">1 bath</p>
                            <p class="text-center"><a class="btn btn-default card-btn rent-btn" role="button" href="item.html">VIEW </a></p>
                        </div>
                    </div>
                </div>
            </div>
			-->

			<?php
				$result = mysqli_query($con, "SELECT * FROM rentals");

				while ($row = mysqli_fetch_array($result)) {
					display_item($row);
				}

				function display_item($row) {
					if ($row['vacancy'] == 'no') return;

					echo "<a href='item.php?id=" . $row['id'] . "'>";

					$img_path = '/home/kennethjhoward/www/assets/img/' . $row['id'] . '.jpg';

					echo "<div class='col-md-4 col-sm-6'>
							<div class='card rent-card'>
								<div class='row'>
									<div class='col-xs-12'>
										<a href='item.php?id=" . $row['id'] . "'>";

										if (file_exists($img_path) == true) {
											echo "<img src='http://www.jackhowardrealty.com/assets/img/" . $row['id'] . ".jpg' alt='rental image'  width='100%'/>";
										} else {
											echo "<img src='http://www.jackhowardrealty.com/assets/img/default.jpg' alt='rental image'  width='100%'/>";
										}

										echo "</a>
									</div>
									<div class='col-xs-12'>
										<h3 class='text-center' id='rent-title'>" . $row['address'] . "</h3>
										<p class='text-center'>$" . $row['price'] . "/mo</p>
										<p class='text-center rent-bed'>" . $row['beds'] . " bed</p>
										<p class='text-center'>" . $row['full'] . " full";
											if ($item['half'] > 0)
												echo ',' . $item['half'] . 'half';
										echo " bath</p>
										<p class='text-center'><a class='btn btn-default card-btn rent-btn' role='button' href='item.php?id=" . $row['id'] . "'>VIEW </a></p>
									</div>
								</div>
							</div>
						</div>";
					}
				?>


        </div>
    </div>
    <footer>
        <h4 class="text-center">© 2014 – 2022 Howard Realty&nbsp; </h4></footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
