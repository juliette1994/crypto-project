<?php

function	calcul_modulo($int, $n)
{
	$modulo = $int - (floor($int / $n) * $n);
	if ($modulo > abs($n) || $modulo < 0)
	   $modulo = $int - (ceil($int / $n) * $n);
	   if ($modulo == 1)
	      return (1);
	      return (0);
}

function	calcul_inv_modulo($a, $n)
{
	$start = 0;
	$end = $n - 1;
	$result = 0;
	while ($start <= $end)
	{
		$result = $a * $start;
		if (calcul_modulo($result, $n) == 1)
		return ($start);
		$start = $start + 1;
	}
		 echo "va t'acheter des doigts !\n";
	 return (0);
}

function	inv_modulo($a, $n)
{
	if ($a == 0 || $n <= 0 || !is_int($a) || !is_int($n))
	{
		echo "va t'acheter des doigts !\n";
		     return (0);
		     }
		     return (calcul_inv_modulo($a, abs($n)));
}

echo inv_modulo(255, 512)."\n";