<?php
/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genTransform($position, $conf, $degree)
	{
		$rotation = genRotation($conf, $degree);
		$transform = "<Transform translation=\"" . $position . "\" rotation=\"" . $rotation . "\">";
		return $transform;
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genRotation($conf, $degree)
	{
		switch($conf) {
			case "z": $rot = "0 0 1"; break;
			case "y": $rot = "0 1 0"; break;
			case "yz": $rot = "0 1 1"; break;
			case "x": $rot = "1 0 0"; break;
			case "xz": $rot = "1 0 1"; break;
			case "xy": $rot = "1 1 0"; break;
			case "xyz": $rot = "1 1 1"; break;
		}
		$rot .= " " . number_format($degree * ( pi() / 180 ), 6, '.', '');
		return $rot;
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */	
	function genAppearance($diffuseColor, $specularColor, $transparency)
	{
		$diffuseColor = genColor($diffuseColor);
		$specularColor = genColor($specularColor);
		$material = "
		<Appearance>
		<Material diffuseColor=\"".$diffuseColor."\" specularColor=\"".$specularColor."\" transparency=\"".$transparency."\" />
		</Appearance>";
		return $material;
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genColor($colorHex)
	{
		$r = substr($colorHex, 1, 2);
		$g = substr($colorHex, 3, 2);
		$b = substr($colorHex, 5, 2);
		$r = base_convert($r, 16, 10) / 255;
		$g = base_convert($g, 16, 10) / 255;
		$b = base_convert($b, 16, 10) / 255;
		$colorDec = $r . " " . $g . " " . $b;
		return $colorDec;
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genOctagonPillar($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $width, $height, $creaseAngle)
	{
		echo genTransform($position, $conf, $degree);
		echo "<Shape>";
		echo genAppearance($diffuseColor, $specularColor, $transparency);
		
		$solid = "false";
		$startX = 11;
		$startY = 2;
		$startZ = 1;
		$endLine = -1;
		echo "<IndexedFaceSet solid=\"" . $solid . "\" creaseAngle=\"" . $creaseAngle . "\" coordIndex=\"";
		for($coordIndex = 0; $coordIndex < 8; $coordIndex++) {
			if($coordIndex > 6) {
				$FirstX = $startX - 2;
				$FirstY = 0;
				$FirstZ = $startZ++;
				$SecX++;
				$SecY = $FirstX;
				$SecZ = $FirstZ;
			} else {
				$FirstX = $startX + $coordIndex;
				$FirstY = $startY;
				$FirstZ = $startZ;
				$SecX = $startX + ($coordIndex - 1);
				$SecY = $FirstX;
				$SecZ = $startZ;
				$startY++;
				$startZ++;
			}

			echo $FirstX." ".$FirstY." ".$FirstZ." ".$endLine.",".$SecX." ".$SecY." ".$SecZ." ".$endLine;

			if ($coordIndex < 7) {
				echo ",";
			}
			
		}
		echo "\">";
		
		$ground = 0;
		if(($height <= $width) && ($height > 0)) {
			$minus = ($height * 20) / 100;
		} else if($height <= 0) {
			$height = 1;
			$minus = abs($height * 20) / ($height * 100);
		} else {
			$minus = ($height * 20) / ($height * 100);
		}
		echo "<Coordinate point=\"";
		for($pointloop = 0; $pointloop < 2; $pointloop++) {
			if($pointloop > 0) $ground = $height / 2;
			else $ground = $ground - ($height / 2);
			echo 
			($width - $minus)	." ".	$ground	." ".	$width				.",".
			($width - $minus)	." ".	$ground	." ".	$width				.",".
			$width				." ".	$ground	." ".	($width - $minus)	.",".
			$width				." ".	$ground	." ".	-($width - $minus)	.",".
			($width - $minus)	." ".	$ground	." ".	-($width)			.",".
			-($width - $minus)	." ".	$ground	." ".	-($width)			.",".
			-($width)			." ".	$ground	." ".	-($width - $minus)	.",".
			-($width)			." ".	$ground	." ".	($width - $minus)	.",".
			-($width - $minus)	." ".	$ground	." ".	$width;

			if ($pointloop < 1) {
				echo ',';
			}
		}
		echo "\" />";
		echo "</IndexedFaceSet>";
		echo "</Shape>";
		echo "</Transform>";
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genCube($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $x, $y, $z, $creaseAngle)
	{
		echo genTransform($position, $conf, $degree);
		echo "<Shape>";
		echo genAppearance($diffuseColor, $specularColor, $transparency);
		
		$solid = "false";
		$x /= 2;
		$y /= 2;
		$z /= 2;
		
		echo "<IndexedFaceSet solid=\"" . $solid . "\" creaseAngle=\"" . $creaseAngle . "\" coordIndex=\"
		0 1 2 3 -1, 4 7 6 5 -1, 0 4 5 1 -1, 1 5 6 2 -1, 2 6 7 3 -1, 4 0 3 7 -1\">";		
		echo "<Coordinate point=\"";
		echo
		$x		." ".	$y		." ".	-($z)	.",".
		$x		." ".	-($y)	." ".	-($z)	.",".
		-($x)	." ".	-($y)	." ".	-($z)	.",".
		-($x)	." ".	$y		." ".	-($z)	.",".
		$x		." ".	$y		." ".	$z		.",".
		$x		." ".	-($y)	." ".	$z		.",".
		-($x)	." ".	-($y)	." ".	$z		.",".
		-($x)	." ".	$y		." ".	$z		.",";
		echo "\" />";
		echo "</IndexedFaceSet>";
		echo "</Shape>";
		echo "</Transform>";
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */


/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genTrapezoid($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $direction, $x, $y, $z, $creaseAngle)
	{
		echo genTransform($position, $conf, $degree);
		echo "<Shape>";
		echo genAppearance($diffuseColor, $specularColor, $transparency);
		
		$solid = "false";
		if($direction > 0) {
			$x_di_right = ($x / 2) + $direction;
			$x_di_left = -($x / 2) + $direction;
		} else {
			$x_di_right = ($x / 2) - abs($direction);
			$x_di_left = -($x / 2) - abs($direction);
		}
		
		$x /= 2;
		$y /= 2;
		$z /= 2;
		
		echo "<IndexedFaceSet solid=\"" . $solid . "\" creaseAngle=\"" . $creaseAngle . "\" coordIndex=\"
		0 1 2 3 -1, 4 7 6 5 -1, 0 4 5 1 -1, 1 5 6 2 -1, 2 6 7 3 -1, 4 0 3 7 -1\">";
		echo "<Coordinate point=\"";
		if($direction > 0) {
			echo
			$x_di_right	." ".	$y		." ".	-($z)	.",".
			$x			." ".	-($y)	." ".	-($z)	.",".
			-($x)		." ".	-($y)	." ".	-($z)	.",".
			$x_di_left	." ".	$y		." ".	-($z)	.",".
			$x_di_right	." ".	$y		." ".	$z		.",".
			$x			." ".	-($y)	." ".	$z		.",".
			-($x)		." ".	-($y)	." ".	$z		.",".
			$x_di_left	." ".	$y		." ".	$z		.",";
		} else {
			echo
			$x_di_right	." ".	$y		." ".	-($z)	.",".
			$x			." ".	-($y)	." ".	-($z)	.",".
			-($x)		." ".	-($y)	." ".	-($z)	.",".
			$x_di_left	." ".	$y		." ".	-($z)	.",".
			$x_di_right	." ".	$y		." ".	$z		.",".
			$x			." ".	-($y)	." ".	$z		.",".
			-($x)		." ".	-($y)	." ".	$z		.",".
			$x_di_left	." ".	$y		." ".	$z		.",";			
		}
		echo "\" />";
		echo "</IndexedFaceSet>";
		echo "</Shape>";
		echo "</Transform>";
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */
	function genTrapezoid2($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $direction, $x, $y, $z, $creaseAngle)
	{
		echo genTransform($position, $conf, $degree);
		echo "<Shape>";
		echo genAppearance($diffuseColor, $specularColor, $transparency);
		
		$solid = "false";
		if($direction > 0) {
			$x_di_right = ($x / 2) + $direction;
			$x_di_left = -($x / 2) - $direction;
		} else {
			$x_di_right = ($x / 2) + abs($direction);
			$x_di_left = -($x / 2) - abs($direction);
		}
		
		$x /= 2;
		$y /= 2;
		$z /= 2;
		
		echo "<IndexedFaceSet solid=\"" . $solid . "\" creaseAngle=\"" . $creaseAngle . "\" coordIndex=\"
		0 1 2 3 -1, 4 7 6 5 -1, 0 4 5 1 -1, 1 5 6 2 -1, 2 6 7 3 -1, 4 0 3 7 -1\">";
		echo "<Coordinate point=\"";
		if($direction > 0) {
			echo
			$x_di_right	." ".	$y		." ".	-($z)	.",".
			$x			." ".	-($y)	." ".	-($z)	.",".
			-($x)		." ".	-($y)	." ".	-($z)	.",".
			$x_di_left	." ".	$y		." ".	-($z)	.",".
			$x_di_right	." ".	$y		." ".	$z		.",".
			$x			." ".	-($y)	." ".	$z		.",".
			-($x)		." ".	-($y)	." ".	$z		.",".
			$x_di_left	." ".	$y		." ".	$z		.",";
		} else {
			echo
			$x			." ".	$y		." ".	-($z)	.",".
			$x_di_right	." ".	-($y)	." ".	-($z)	.",".
			$x_di_left	." ".	-($y)	." ".	-($z)	.",".
			-($x)		." ".	$y		." ".	-($z)	.",".
			$x			." ".	$y		." ".	$z		.",".
			$x_di_right	." ".	-($y)	." ".	$z		.",".
			$x_di_left	." ".	-($y)	." ".	$z		.",".
			-($x)		." ".	$y		." ".	$z		.",";			
		}
		echo "\" />";
		echo "</IndexedFaceSet>";
		echo "</Shape>";
		echo "</Transform>";
	}
/* ------------------------------------------------------------------------------------------------------------------------------- */
?>