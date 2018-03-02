<?php

include 'func_inv_modulo.php';

function        menu_dechiffrement()
{
      system('clear');
      echo "Déchiffrement";
      $dech = trim(readline("puis, appuyez sur Entrée:"));
      echo "\n";
}

function	get_cle_d($suited, $e, $m){
        $clePublique = array();
        $cleInitial= array();

 	for ($c = 0; $c < count($suited); $c++)
        {
                array_push($clePublique, inv_modulo($suited[$c]*$e, intval($m)));
                array_push($cleInitial, inv_modulo($suited[$c]*$e, intval($m)));
        }
        sort($clePublique, SORT_NATURAL); //trier
        //display_array($clePublique, "Permutation"); 
       return ($clePublique);
}