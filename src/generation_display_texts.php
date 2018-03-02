<?php
function	display_menu_generation($error)
{
	if (!$error)
	{
		echo "\n			ERREUR: veuillez vérifier les paramètres";
		echo " que vous avez rentrés (suite, e et m)!\n\n";
	}
	echo 'Entrez une suite super-croissante qui respecte les prérequis ';
	echo 'suivants (séparation ","):'."\n";
	echo "- tous les éléments de la suite doivent être inférieurs à la ";
	echo "somme de l'ensemble des précédents éléments;\n";
	echo "- 1 < e < m;\n";
	echo "- m > somme de tous les éléments de la suite super-croissante;\n";
	echo "- e et m doivent être premieux entre eux.\n";
	echo "Exemple: 1,2,5,10,20,50,100,200\n";
}