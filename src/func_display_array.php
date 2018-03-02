<?php

function	display_array($array, $nom)
{
	$counter = 0;
	echo "\n" . $nom . " = (";
	while ($counter < count($array))
	{
		echo $array[$counter];
		if ($counter < count($array) - 1)
			echo ", ";
		$counter = $counter + 1;
	}
	echo ")\n\n";
}