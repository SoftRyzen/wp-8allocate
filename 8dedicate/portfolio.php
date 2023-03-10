<!DOCTYPE html>
<html>
	<head>
		<title>8Dedicate - Portfolio</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1.0, min-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="./styles/no-flex-portfolio-style.css">
		<link rel="stylesheet" type="text/css" href="./styles/no-flex-portfolio-mobile-style.css">
		<script type="text/javascript" src="./scripts/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="./scripts/no-flex-portfolio-helpers.js"></script>
	</head>
	<body>
		<div class="overlay"></div>

		<div class="block title">
			<div class="block content">
				
				<div class="top-menu mobile">

					<input type="checkbox" id="hmt" class="hidden-menu-ticker">
					</input>

					<div class="x-container column hidden-menu">
						<a href="index.php#what-is-it" class="x-item li">
							What is it?
						</a>
						<a href="index.php#why-profitably" class="x-item li">
							Why is it profitable?
						</a>
						<a href="index.php#how-it-works" class="x-item li">
							How does it work?
						</a>
						<a href="index.php#advantages" class="x-item li">
							Advantages
						</a>
						<a href="index.php#other-services" class="x-item li">
							Other services
						</a>
						<a href="index.php#contact-us" class="x-item li">
							Contact us
						</a>
					</div>
						
					<div class="x-container row title-container">
						<span id="title">
							<img src="./images/Logo.png"/>
						</span>
						<label class="btn-menu" for="hmt">
							<span class="first"></span>
							<span class="second"></span>
							<span class="third"></span>
						</label>
					</div>
				</div>

				<div class="table title-content read-more">
					<div class="tr cell-height-auto top-menu no-mobile">
						<div class="td top-menu height-auto">
							<div class="x-container row">
								<a href="index.php#what-is-it" class="x-item li">
									What is it?
								</a>
								<a href="index.php#why-profitably" class="x-item li">
									Why is it profitable?
								</a>
								<a href="index.php#how-it-works" class="x-item li">
									How does it work?
								</a>
							</div>
							
							<div class="x-container row">
								<div class="x-container row" style="height: 63.3px;">
									<span id="title">
										<img src="./images/LogoDedicate-white.png"/>
									</span>
								</div>
							</div>	

							<div class="x-container row">
								<a href="index.php#advantages" class="x-item li">
									Advantages
								</a>
								<a href="index.php#other-services" class="x-item li">
									Other services
								</a>
								<a href="index.php#contact-us" class="x-item li">
									Contact us
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="block turnkey-projects mobile-padding ">
			<div class="block content">
				<div class="turnkey-section-title">
					<hr class="ruler margin-bottom-40"/>
					<span class="feat-h1 spacing">Projects, implemented on a turnkey basis</span>
				</div>
				<div class="portfolio-list">

					<?php
						//$servername = "localhost";
						//$username = "valerii";
						//$password = "pass";
						//$dbname = "8dedicate";
						$servername = "zbs00.mysql.ukraine.com.ua";
						$username = "zbs00_8relocate";
						$password = "rndemwks";
						$dbname = "zbs00_8relocate";

						$conn = new mysqli($servername, $username, $password, $dbname);

						if ($conn->connect_error){
							die("Connection failed: " . $conn->connection_error);
						}

						$sql = "SELECT * FROM  `outstaff-portfolio` 
								LIMIT 0,30";

						$result = array();

						$dbresult = $conn->query($sql);

						if ($dbresult->num_rows > 0){
							while($row = $dbresult->fetch_assoc()) {
								$result[$row["Name"]] = $row["Description"];
							}
						}

						$conn->close();

						$portfolio_images = array("portalbounce-v3 fit-width","cushiosxpress fit-width","force-management fit-width","pillowsxpress fit-width","contact-lens fit-width","viseven-clm","ayuroma","etovoditel","hidrive","prettynailshop","runday","sickweather","skychat","smartmoney","pcec-logo fit-width","designer-handbag fit-width","mixed-wedding ","tintelingen fit-width","dynamika fit-width","findgood-company fit-width","coinmedia-logo fit-width","python fit-width","drukwerkservice","hivfriends","saraandodete","yoga","svenskt-tenn-logo","downsideup fit-width","itsquiz","viseven fit-width");

						foreach($portfolio_images as $item){
							$image_props = explode(" ", $item);
							$class = (count($image_props) == 2) ? "{$image_props[1]}" : "";
							echo 
							"<div class='slider-item'>
								<div class='pre-content {$class}'>
									<img class='{$class}' src='./images/portfolio/{$image_props[0]}.png'/>
								</div>
								<div class='content'>
									<p class='portfolio-item-desc'>
										{$result[$image_props[0]]}
									</p>
								</div>
							</div>";
						}
					?>

					<!--<div class="slider-item">
						<div class="pre-content">
							<p class="portfolio-item-title">Dynamika.com.ua</p>
						</div>
						<div class="content">
							<p class="portfolio-item-title">Dynamika.com.ua</p>
							<p class="portfolio-item-desc">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
							</p>
						</div>
					</div>-->

				</div>
			</div>
		</div>

		<div class="block contact-us mobile-padding ">
			<div class="block content">
				<div class="full-width center">
					<div>
						<hr class="ruler equalizer"/>
						<span class="feat-h1 text center">Contact us and we will start working</span>

						<div class="contact-us-items full-width">

							<div class="r-list">

								<div class="contact-item li-3 m-li-1 s-li-1">
									<div class="rounded">
										<div id="img-1"></div>
									</div>
									<span class="feat-text uppercase white center">
										We will discuss all
										<br/>details with you
									</span>
								</div>

								<div class="contact-item li-3 m-li-1 s-li-1">
									<div class="rounded">
										<div id="img-2"></div>
									</div>
									<span class="feat-text uppercase white center">
										Agree 
										<br/>the cooperation 
										<br/>format
									</span>
								</div>
								<div class="contact-item li-3 m-li-1 s-li-1">
									<div class="rounded">
										<div id="img-3"></div>
									</div>
									<span class="feat-text uppercase center white">
										Will start search 
										<br/>of specialists
									</span>
								</div>

							</div>
						</div>

					<input type="button" value="Leave a message" class="feat-button margin-top-46 contact-form"></input>
				</div>				
				</div>
			</div>
		</div>

		<div class="block footer mobile-padding">
			<div class="block content">
				<div class="full-width height-inherit">

					<div class="real-contacts fl-l">
						<div>
							<img src="./images/footer-phone-icon.png" style="margin-right: 10px;"></img>
							<span class="feat-p bold">(+380)68-30-84-784</span>
						</div>
						<div>
							<img src="./images/footer-mail-icon.png" style="margin-right: 10px;"></img>
							<a class="feat-a" href="mailto:odc@8dedicate.com" class="feat-p bold">odc@8relocate.com</a>
						</div>
					</div>

					<div class="social-profiles fl-l">
						<a href="http://fb.com">
							<img src="./images/footer-facebook-icon.png"></img>
						</a>
						<a href="http://linkedin.com">
							<img src="./images/footer-linkedin-icon.png"></img>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="form_window">
			<div class="bw_close"></div>
			<div class="nameForm">
				Send a request
			</div>
			<div>
				<img class="form-loader" src="./images/request-loader.gif"/>
				<p id="form-message"></p>
				<form class="form_just" action="#" method="post">

					<input name="name" type="text" class="input" placeholder="Name" required="">
	        		<input name="comp" type="text" class="input" placeholder="Company name" required="">
	        		<input name="spec" type="text" class="input" placeholder="Specialty" required="">
	        		<input name="email" type="text" class="input" placeholder="E-mail" required="">
	        		<input name="phone" id="phone" type="text" class="input" placeholder="Phone" required="">
	        		<input type="button" value="Send a request" class="feat-button black" onclick="sendRequest()">
				</form>
			</div>
		</div>
	</body>
</html>