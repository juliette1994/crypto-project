<?php
// menus.php for menus.php in /Users/juliettequ/Desktop/MATHS/qu_j/src
//
// Made by QU Juliette
// Login   <qu_j@etna-alternance.net>
//
// Started on  Mon May 15 10:15:35 2017 QU Juliette
// Last update Mon May 15 10:15:45 2017 QU Juliette
//
function	menu_generation($error)
{
	system('clear');
	display_menu_generation($error);
	$suite = trim(readline("Puis, appuyez sur Entrée: "));
	$e = trim(readline("Entrez une valeur pour e, puis appuyez sur Entrée: "));
	$m = trim(readline("Entrez une valeur pour m, puis appuyez sur Entrée: "));
	echo "CHECK PARAMS -> ".check_params($suite, $e, $m)."\n";
	if (!check_suite($suite) || !check_params($suite, intval($e), intval($m)))
		return (0);
	display_infos_generation($suite, $e, $m);
	return (1);
}