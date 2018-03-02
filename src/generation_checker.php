<?php
include 'src/generation_cle_publique.php';
include 'src/generation_display_texts.php';

function	check_premiers_entre_eux($e, $m)
{
    while ($e != $m)
    {
        if($e > $m)
        	$e = $e - $m;
        else
        	$m = $m - $e;
    }
    if ($e)
    	return (1);
    return (0);
}

function	check_params($suite, $e, $m)
{
	$suiteSS = explode(",", $suite);
	if (is_int($e) && is_int($m) && $e > 1 && $e < $m &&
		check_premiers_entre_eux($e, $m) && array_sum($suiteSS) < $m)
		return (1);
	return (0);
}

function	check_suite($suite)
{
	if ($suite == '' || preg_match('/[^,\d]/', $suite)
		|| check_suite_super_croissante($suite))
		return (0);
	return (1);
}

function	check_suite_super_croissante($suite)
{
	$suiteSS = explode(",", $suite);
	$addition = 0;
	$counter = 0;
	while ($counter < count($suiteSS) - 1)
	{
		$addition = $addition + $suiteSS[$counter];
		if ($addition > $suiteSS[$counter + 1])
			return (1);
		$counter = $counter + 1;
	}
	return (0);
}