<?php

function        menu_chiffrement()
{
	$chiffrement = array();
        system('clear');
        echo "Entrez le message que vous voulez chiffrer ";
        $message = trim(readline("puis, appuyez sur Entrée: "));
        echo "Entrez ensuite, la clé publique que vous avez obtenue par ";
        echo 'la personne à qui vous voulez envoyer ce message (séparation ",").';
        echo "\nExemple: 251,255,312,412,462,492,502,510\n";
        $cleP = trim(readline("Puis, appuyez sur Entrée: "));
        $nbPaquets = count(explode(",", $cleP));
        echo "Entrez ensuite, un nombre compris entre 2 et " . $nbPaquets ;
        $n = trim(readline(" puis, appuyez sur Entrée: "));
	$explode = explode(",",$cleP);
	$chiffrement = get_message_chiffre((int)$n,$explode, get_message_chiffre_binaire($message, (int) $n));
	for ($e = 0; $e < count($chiffrement); $e++)
	{
		echo $chiffrement[$e] . " ";
	}
        echo "\n";
}

function	convert_into_N_bits($string, $counter, $n, $aide)
{
	$zero = "0";
	while ($counter < $n)
	{
		if ($aide)
			$string = $zero . $string;
		else
			$string = $string . $zero;
		$counter = $counter + 1;
	}
	return ($string);
}

function	convert_binaires_into_N_bits($string, $n)
{
	$counter = 0;
	$array = array();
	$binaire = "";
	while ($counter < strlen($string))
	{
		if (my_modulo($counter, $n) != 0 || $counter == 0)
			$binaire = $binaire . $string[$counter];
		else if ($counter != 0 && my_modulo($counter, $n) == 0)
		{
			array_push($array, $binaire);
			$binaire = "" . $string[$counter];
		}
		$counter = $counter + 1;
	}
	array_push($array, $binaire);
	return ($array);
}

function	get_message_chiffre_binaire($string, $n)
{
	$counter = 0;
	$binaires = "";
	while ($counter < strlen($string))
	{
		$binaire = strval(decbin(ord($string[$counter])));
		$binaire_8B = convert_into_N_bits($binaire, strlen($binaire), 8, 1);
		$binaires = $binaires . $binaire_8B;
		$counter = $counter + 1;
	}
	$reste = my_modulo(strlen($binaires), $n);
	$chaine = convert_into_N_bits($binaires, $reste, $n, 0);
	return (convert_binaires_into_N_bits($chaine, $n));
}

function	get_message_chiffre($n, $cleS, $array)
{
	$counter_binaire = 0;
	$message_chiffre = array();
	while ($counter_binaire < count($array))
	{
		$position = 0;
		$addition = 0;
		$bit = strlen($array[$counter_binaire]) - 1;
		while ($bit >= 0)
		{
			if (strcmp($array[$counter_binaire][$bit], '1') == 0)
				$addition = $addition + $cleS[$position];
			$bit = $bit - 1;
			$position = $position + 1;
		}
		array_push($message_chiffre, $addition);
		$counter_binaire = $counter_binaire + 1;
	}
	return ($message_chiffre);
}
