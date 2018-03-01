<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

	<div class = "container">
		<div class = "row">
			<h1><?php echo "FIND  YOUR  FLAT/ROOM  IN  MAP";?></h1>
			<div class = "col-md-8">
				<hr>
				<head>
					<?php echo $map['js']; ?>
				</head>
				<body>
					<?php echo $map['html']; ?>
					<h3></h3>

					<div id="directionsDiv"></div>
				</body>
	</div>
</html>