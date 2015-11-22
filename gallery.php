<html>
	<head>
		<title>Gallery</title>
		<?php
			$files = scandir("./Pictures");
			$arrlength = count($files);
			for ($i = 0; $i < ($arrlength-2); $i++)
				$picture[$i] = "./Pictures/" . $files[$i+2];
			$arrlength = count($picture);
			$angle = 360 / ($arrlength + 1);
			$size = 1;
			$radius = 2 * $size / ( 2 * tan( M_PI / ($arrlength + 1)) );
		?>
	</head>
	<body>
		<FireBoxRoom>
		<Assets>
			<AssetImage id="sky_left" src="./Skybox/Skybox-Left.jpg" />
			<AssetImage id="sky_right" src="./Skybox/Skybox-Right.jpg" />
			<AssetImage id="sky_front" src="./Skybox/Skybox-Front.jpg" />
			<AssetImage id="sky_back" src="./Skybox/Skybox-Back.jpg" />
			<AssetImage id="sky_up" src="./Skybox/Skybox-Top.jpg" />
			<AssetImage id="sky_down" src="./Skybox/Skybox-Bottom.jpg" />
			<?php
				echo "\n";
				for ($i = 0; $i < $arrlength; $i++)
					echo "\t\t\t<AssetImage id=\"image" . $i . "\" src=\"" . $picture[$i] . "\" />\n";
				echo "\n";
			?>
		</Assets>
		<Room
			use_local_asset="room_plane"
		  	pos="<?php echo $radius; ?> 0.000 0.000"
			xdir="0.000 0.000 1.000"
			ydir="0.000 1.000 0.000"
			zdir="-1.000 0.000 0.000"
			col="0.70196078431373 0.70196078431373 0.70196078431373"
			skybox_left_id="sky_left"
			skybox_right_id="sky_right"
			skybox_front_id="sky_front"
			skybox_back_id="sky_back"
			skybox_up_id="sky_up"
			skybox_down_id="sky_down"
		>
			<?php
				echo "\n";
				for ($i = 0; $i < $arrlength; $i++)
				{
					$xpos = $radius * cos( ($i+1) * deg2rad($angle) );
					$ypos = $radius * sin( ($i+1) * deg2rad($angle) );
					echo "<Image
						id=\"image" . $i . "\"
						pos=\"" . $xpos . " " . (1.500 * $size) . " " . $ypos . "\"
						xdir=\"" . (-1 * sin(deg2rad(($i+1) * $angle))) . " 0.000 " . (cos(deg2rad(($i+1) * $angle))) . "\"
						ydir=\"0.000 1.000 0.000\"
						zdir=\"" . (-1 * cos(deg2rad(($i+1) * $angle))) . " 0.000 " . (-1 * sin(deg2rad(($i+1) * $angle))) . "\"
						scale=\"" . $size . " " . $size . " " . "0.1" . "\"
						/>\n";
				}
				echo "\n";
			?>
		</Room>
		</FireBoxRoom>
			<?php
				echo "\n";
				for ($i = 0; $i < $arrlength; $i++)
					echo "\t\t<img src=\"" . $picture[$i] . "\">\n" ;
				echo "\n";
			?>
	</body>
</html>
