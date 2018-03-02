<?php

function	my_modulo($int, $n)
{
	if ($n == 0 || !is_int($int) || !is_int($n))
		return (-1);
	$inf = $int - (floor($int / $n) * $n);
	if ($inf < abs($n) && $inf >= 0)
		return ($inf);
	return ($int - (ceil($int / $n) * $n));
}