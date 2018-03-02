<?php
include 'src/func_my_modulo.php';
include 'src/func_display_array.php';

function	get_cle_publique($suiteSS, $e, $m)
{
	$clePublique = array();
	$cleInitial= array();
	$clePermutation = array();
	for ($c = 0; $c < count($suiteSS); $c++)
	{
		//$int = $suiteSS[$c] * $e;
		//array_push($clePublique, my_modulo($int, intval($m)));
		array_push($clePublique, my_modulo($suiteSS[$c]*$e, intval($m)));
		array_push($cleInitial, my_modulo($suiteSS[$c]*$e, intval($m)));
	}
	sort($clePublique, SORT_NATURAL); //trier
	//$clePermutation = get_permutation($clePermutation, $clePublique, $cleInitial);
	$clePermutation = get_permutation($clePublique, $cleInitial);
	display_array($clePermutation, "Permutation");
	return ($clePublique);
}

/*function	get_permutation($permutation, $clePublique, $cleInitial)
{
	for ($a=0; $a<count($cleInitial); $a++)
	{   
	    for ($b=0; $b<count($clePublique); $b++)
	    {
		if($cleInitial[$a] == $clePublique[$b])
		{
		 array_push($permutation, $b+1);
		}
	    }
	}	
	return ($permutation);
}*/

function      get_permutation($clePublique, $cleInitial)
{
	$permutation = array();
        for ($a=0; $a<count($cleInitial); $a++)
        {
            for ($b=0; $b<count($clePublique); $b++)
            {
                if($cleInitial[$a] == $clePublique[$b])
                {
                 array_push($permutation, $b+1);
                }
            }
        }
        return ($permutation);
}

function	display_infos_generation($suite, $e, $m)
{
	system('clear');
	$cleSecrete = explode(",", $suite);
	display_array($cleSecrete, "S");
	echo "e = " . $e . "\n";
	echo "m = " . $m . "\n";
	display_array(get_cle_publique($cleSecrete, $e, $m), "S'");
}
