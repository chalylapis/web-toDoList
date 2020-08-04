<!DOCTYPE HTML>
<html>

<head>
	<title>To Do List</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/inputText.css" />
	<link rel="stylesheet" href="assets/css/checkbox.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	<script type="text/javascript">
		function toggle() {
			var x = document.getElementById("form");
			var y = document.getElementById("btAdd");
			if (x.style.display === "none") {
				x.style.display = "block";
				y.style.display = "none";
			} else {
				x.style.display = "none";
				y.style.display = "flex"
			}
		}

		function stoppedTyping() {
			var bt = document.getElementById('btSubmit');
			var txt = document.getElementById('task');

			if (txt.value != '') {
				bt.disabled = false;
			} else {
				bt.disabled = true;
			}
		}
	</script>


</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="inner">

				<!-- Logo -->
				<a href="index.html" class="logo">
					<span class="fa fa-flag"></span> <span class="title">To Do List</span>
				</a>

				<!-- Nav -->
				<nav>
					<ul>
						<li><a href="#menu">Menu</a></li>

					</ul>
				</nav>

			</div>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				<li><a href="index.php" class="active">Today</a></li>

				<li><a href="upcoming.php">Upcoming</a></li>

				<li><a href="about.php">About</a></li>


			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<p style="text-align:center;">"Today"</p>
			<p style="text-align:center;">
				<script>
					document.write(new Date().toDateString());
				</script>
			</p>

			<div class="center" onclick="toggle();" id="btAdd">
				<button class="primary"><span class="fa fa-plus-circle "></span>Add task</button>
			</div>


			<form action="insert.php" method="POST" class="form1" style="display: none;" id="form">

				<input type="text" name="task" id="task" placeholder="Task" class="input" onkeyup="stoppedTyping()" />

				<button type="submit" class="primary" id="btSubmit" disabled="true" style="margin-left: 25px;">Add task</button>
				<button type="reset" href="index.html" onclick="toggle()">Cancel</button>
			</form>
			<?php
			// Database connection
			include "dbConn.php";
			$records = mysqli_query($db, "select * from task");
			if (!empty(mysqli_fetch_array($records))) {
			?>
				<div class="form1">
					<table>
						<?php

						while ($data = mysqli_fetch_array($records)) {
						?>
							<tr>
								<td style="text-align:right">

									<label class="label" style="padding-left: 20px;">
										<input class="label__checkbox" type="checkbox" id="check<? echo $i ?>" onclick="location.href='move.php? id=<?php echo $data['id']; ?>'" />
										<span class="label__text">
											<span class="label__check">
												<i class="fa fa-check icon"></i>
											</span>
										</span>

									</label>

								</td>
								<td style="padding-right: 250px;"><?php echo $data['task']; ?></td>

								<td><a href="delete.php? db=task&id=<?php echo $data['id']; ?> "><i class="fa fa-trash-o"></i></a></td>
							</tr>
						<?php
						}
						$db->close();
						?>
					</table>

				</div>
			<?php
			}
			include "dbConn.php";
			$records2 = mysqli_query($db, "select * from checked");
			if (!empty(mysqli_fetch_array($records2))) {

			?>
				<div class="form1">

					<table>
						<?php
						while ($data = mysqli_fetch_array($records2)) {
						?>
							<tr>
								<td style="text-align:right">

									<label class="label" style="padding-left: 20px;">
										<input class="label__checkbox" id="check<? echo $i ?>" type="checkbox" checked disabled=true />
										<span class="label__text">
											<span class="label__check">
												<i class="fa fa-check icon"></i>
											</span>
										</span>

									</label>

								</td>
								<td style="padding-right: 250px;"><?php echo $data['task']; ?></td>

								<td><a href="delete.php? db=checked &id=<?php echo $data['id']; ?> "><i class="fa fa-trash-o"></i></a></td>
							</tr>
						<?php
						}
						$db->close();
						?>
					</table>

				</div>
			<?php
			}
			?>


		</div>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<h2>Contact Us</h2>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>

							<div class="field half">
								<input type="text" name="email" id="email" placeholder="Email" />
							</div>

							<div class="field">
								<input type="text" name="subject" id="subject" placeholder="Subject" />
							</div>

							<div class="field">
								<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
							</div>

							<div class="field text-right">
								<label>&nbsp;</label>

								<ul class="actions">
									<li><input type="submit" value="Send Message" class="primary" /></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
				<section>
					<h2>Contact Info</h2>

					<ul class="alt">
						<li><span class="fa fa-envelope-o"></span> <a href="#">chanita.leelspk@gmail.com</a></li>
						<li><span class="fa fa-phone"></span> +669 2250 1300 </li>

					</ul>

					<h2>Follow Us</h2>

					<ul class="icons">
						<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
					</ul>
				</section>

				<ul class="copyright">
					<li>Copyright © 2020</li>

				</ul>
			</div>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>