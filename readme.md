# Calendar JSON Generator

Deuxième version d'un générateur de calendrier en JSON.

## Amélioration par rapport à la v1

- Génère un JSON plus lisible (propriété 'mois', 'jours', 'année')
- Génère un calendrier sur plusieurs années
- Prend en compte les années bissextile

## Amélioration à venir

- Executer le programme avec des options en ligne de commandes (année de départ, année d'arrivé, définir le premier jour de l'année de départ ...)
- Rendre le code propre (éviter les répétitions, noms de variables plus claire)
- la fonction dateInDays peut être directement éxécuté dans la fonction dataStructure, mais pour un soucis facilité, à été découpé en 2 fonction.

## Comment l'éxécuter ?

> php calendar.php

### Comment ça fonctionne ?

- Veuillez définir l'année de départ de votre calendrier dans la variable $year (ligne 2)
- Définissez le premier jour de l'année séléctionnée dans la varible $startingDayOfTheYear (ligne 5) : 0 = lundi, 1 = mardi ... 6 = dimanche
- La fonction dataStructure (ligne 10) génère le squelette du JSON. C'est une fonction récursive, donc veillez à bien gérer votre condition d'arret. Par défault, la récursive s'arrète au bout de 10 années après votre année de départ. ($countYears ligne 17)
- Une fois que le squelette du calendrier est pret, dateInDays peuple le JSON avec les bonnes dates dans les bons jours.
- Si vous avez décidé de démarrer la génération de calendrier sur un année différente que 2022, veuillez à modifier dans la fonction dateIndays pour que $j (ligne 29) corresponde bien à votre année de départ, et sa limite celle d'arrivé.
- Il ne manque plus qu'à définir le nom de votre fichier (ligne 82). Veillez a garder l'extension .json sur le fichier généré.