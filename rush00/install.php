#!/usr/bin/php
<?php

	$user_tab = array(array('login' => 'admin', 'passwd' => '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 'grade' => 'admin'), array('login' => 'alagroy-', 'passwd' => 'f58295275f7830dd4efb1d04212124791a03a087fecb1862452b67a7db506e1b473e63bf8a6c26b6a0f7cc2bab440e8a77658a8a08009cde939b8da235c98c7d', 'grade' => 'member'), array('login' => 'afeuerst', 'passwd' => '86ab6e8a1fe16a9a1acea12e3209dfd6276b18706334cc90d1b42fd393ffb2cbd54de8bfe50c37911856e38fdd9e0e6143b625509f7621b759f973be5c02b0b1', 'grade' =>'member'));
	$tab = array();
	$tab[0]['id'] = '0';
	$tab[0]['nom'] = 'apex';
	$tab[0]['img'] = 'img/apex.jpeg';
	$tab[0]['description'] = 'Apex Legends est un jeu vidéo de type battle royale développé par Respawn Entertainment et édité par Electronic Arts. Il est publié en accès gratuit le 4 février 2019 sur Microsoft Windows, PlayStation 4 et Xbox One.

Aussitôt considéré comme un concurrent du très populaire Fortnite Battle Royale, le jeu bat des records de fréquentation dès sa sortie, en réunissant plus de 2,5 millions de joueurs en 24 heures, 10 millions en 3 jours puis 25 millions en une semaine après sa commercialisation. Après un mois de commercialisation, le jeu dépasse la barre des 50 millions de joueurs.';
	$tab[0]['cat'] = 'FPS,jeux';
	$tab[0]['stock'] = '5';
	$tab[0]['prix'] = '25';

	$tab[1]['id'] = '1';
	$tab[1]['nom'] = 'Assassin\'s Creed Odyssey';
	$tab[1]['img'] = 'img/assody.jpg';
	$tab[1]['description'] = 'Assassin\'s Creed Odyssey est un jeu vidéo d\'action-aventure et de rôle, développé par Ubisoft Québec et édité par Ubisoft sur PC, PlayStation 4 et Xbox One. Il appartient à la série Assassin\'s Creed.

Le jeu, dont la sortie a lieu en octobre 2018, est la suite de la trilogie Antique et indirectement du précédent opus Assassin\'s Creed Origins. Le jeu se déroule presque 400 ans plus tôt, à l\'époque de la Grèce antique lors de la guerre du Péloponnèse.';
	$tab[1]['cat'] = 'jeux,RPG';
	$tab[1]['stock'] = '2';
	$tab[1]['prix'] = '70';

	$tab[2]['id'] = '2';
	$tab[2]['nom'] = 'Creed';
	$tab[2]['img'] = 'img/creed.jpeg';
	$tab[2]['description'] = 'Creed: Rise to Glory is a virtual reality boxing video game. It was released in 2018, by Survios. The game is based on the Rocky franchise. The game is compatible with both HTC Vive and Oculus Rift for Windows, the Oculus Quest and with the PSVR for PS4.';
	$tab[2]['cat'] = 'sport,jeux';
	$tab[2]['stock'] = '1';
	$tab[2]['prix'] = '2';

	$tab[3]['id'] = '3';
	$tab[3]['nom'] = 'Modern Warfare 4';
	$tab[3]['img'] = 'img/mw4.jpg';
	$tab[3]['description'] = 'Call of Duty 4: Modern Warfare est un jeu vidéo de tir à la première personne développé par Infinity Ward et édité par Activision sur Windows, Mac OS, PlayStation 3, Xbox 360, ainsi qu\'une version pour console portable Nintendo DS en novembre 2007. Il est porté sur Wii par Treyarch en novembre 2009, sous-titré Édition Réflexes.

Le jeu se déroule à l\'époque contemporaine, à la différence des épisodes précédents qui se déroulaient pendant la Seconde Guerre mondiale.

Le jeu connaît deux suites directes nommées Call of Duty: Modern Warfare 2 et Call of Duty: Modern Warfare 3.';
	$tab[3]['cat'] = 'FPS,jeux';
	$tab[3]['stock'] = '7';
	$tab[3]['prix'] = '45';

	$tab[4]['id'] = '4';
	$tab[4]['nom'] = 'Sekiro';
	$tab[4]['img'] = 'img/sekiro.jpeg';
	$tab[4]['description'] = 'Sekiro: Shadows Die Twice est un jeu vidéo d\'action-aventure développé par FromSoftware et édité par Activision. La sortie sur Windows, PlayStation 4 et Xbox One a eu lieu le 22 mars 20191.

Le jeu se déroule dans un Japon médiéval-fantastique durant l\'époque Sengoku2,3. Il est aussi en quelque sorte le successeur spirituel de la trilogie Dark Souls, Demon\'s Souls ou encore Bloodborne de par le gameplay et les mécaniques de combats, malgré quelques différences.';
	$tab[4]['cat'] = 'jeux,RPG';
	$tab[4]['stock'] = '666';
	$tab[4]['prix'] = '23';

	$tab[5]['id'] = '5';
	$tab[5]['nom'] = 'rainbow 6 siege';
	$tab[5]['img'] = 'img/r6.jpg';
	$tab[5]['description'] = 'Rainbow Six: Siege est un jeu de tir tactique où le joueur incarne différents agents de plusieurs unités de forces spéciales et de groupes d\'interventions qui constituent l’équipe Rainbow. Comme les autres titres de la série, il se concentre fortement sur le jeu en équipe et le "réalisme" des interventions.

	Cependant, il existe de grandes différences par rapport à d\'anciennes versions du jeu, avec un accent multijoueur important et des environnements entièrement destructibles2. En tout, 10 cartes, le SWAT américain, le SAS anglais, le GSG 9 allemand, les Spetsnaz russes et le GIGN français sont disponibles lors de la sortie du jeu. Actuellement, 24 unités d\'interventions et 21 cartes sont disponibles dans Tom Clancy’s Rainbow Six: Siege.';
	$tab[5]['cat'] = 'FPS,jeux';
	$tab[5]['stock'] = '78';
	$tab[5]['prix'] = '56';
	if (!file_exists('./private'))
		mkdir('private');
	file_put_contents('./private/passwd', serialize($user_tab));
	$stock = '';
	foreach($tab as $value)
		{
			$value['description'] = preg_replace('/\n/', '<br/>', $value['description']);
			$stock = $stock.$value['id'].';'.$value['nom'].';'.$value['img'].';'.$value['description'].';'.$value['cat'].';'.$value['stock'].';'.$value['prix']."\n";
		}
	file_put_contents('stock.csv', $stock);
?>
