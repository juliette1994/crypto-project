<?php

include 'src/generation_checker.php';
include 'src/menus.php';
include 'src/chiffrement.php';
include 'src/dechiffrement.php';

function	redirection_menus($entry)
{
	if ($entry == 1)
	{
		$error = menu_generation(1);
		while (!$error)
			$error = menu_generation($error);
	}
	else if ($entry == 2)
		menu_chiffrement();
	else
		menu_dechiffrement();
}

function	menu_principal()
{
	echo "1 : Génération d'une clé publique\n";
	echo "2 : Chiffrement d'un message\n";
	echo "3 : Déchiffrement d'un message\n";
	echo "4 : Quitter\n";
	$entry = readline("Entrez un chiffre puis appuyez sur Entrée: ");
	return ($entry);
}

function	main()
{
	system('clear');
	$entry = menu_principal();
	while ($entry != 4)
	{
		if ($entry == 1 || $entry == 2 || $entry == 3)
			redirection_menus($entry);
		else
		{
			system('clear');
			echo "\n			ERREUR: veuillez entrer 1, 2, 3 ou 4!\n\n";
		}
		$entry = menu_principal();
	}
}

main();