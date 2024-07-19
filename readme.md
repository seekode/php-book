# TP - php

Ce TP est une application web qui permet de créer un compte utilisateur, de se connecter, de créer un livre, de le modifier, de le supprimer, de voir, et de liker celui des autres utilisateurs.

L'architecture complete de l'application à déjà été crée en suivant la convention MVC.

---
Voici quelques regles à respecter :
- Il faut extraire le fichier database.zip pour obtenir une base de données déjà pré-remplie.
- Il ne faut pas crée ou modifier de fichier dans le dossier **models**, vous ne pouvez que utiliser les fonctions de ce dossier et utiliser ce qu'elle vous retournes

- Ne passez pas trop de temps à essayer de comprendre le code présent dans le dossier **models**, il aborde des notions que vous n'avez pas encore vu, pour utilisez correctement les différentes fonctions, il faut donc vous référer à la documentation présente au dessus de chaque fonction.

- Toutes les vues et controllers nécessaire sont déjà crées, à vous de les compléter, vous n'avez pas la nécessité de créer de nouveaux fichiers mais ce n'est cependant pas interdit.

- Quasiment aucun HTML/css n'est implémenter, libre a vous de styliser le site, mais php doit rester la priorité.
---

Ci-dessous, les différentes pages du site, et leur fonctionnement que vous devez mettre en place


## Index.php

Cette page est la page de creation de compte et de connexion.

- Lors de la creation de compte, l'utilisateur doit automatiquement etre connecté.

- Après avoir été connecté, l'utilisateur doit etre redirigé vers la page de **bookList.php**

- Un utilisateur connecté ne doit pas pouvoir accéder à la page **index.php**

## bookList.php

Cette page affiche la liste de tous les livres du site.

- Cliquer sur un livre redirige vers la page **book.php**
- Cette page doit être innaccessible pour un utilisateur non connecté

## book.php

Cette page affiche le livre d'un utilisateur.

- Cliquer sur le bouton **like** permet de liker le livre
- Le nom prénom du propriétaire du livre doit apparaître
- Cliquer sur le nom prénom du propriétaire du livre redirige vers la page **profile.php**
- Cliquer sur le bouton **delete** permet de supprimer le livre à condition d'etre le propriétaire du livre
- Cette page doit être innaccessible pour un utilisateur non connecté

## profile.php

Cette page affiche le profile d'un utilisateur avec tous les livres qu'il a crée, et tous les livre qu'il a liker.

- La suppression du compte doit etre disponible si le profile affiché correspond à celui de l'utilisateur connecté
- Les livres affiché doivent etre supprimable si le profile affiché correspond à celui de l'utilisateur connecté
- Cette page doit être innaccessible pour un utilisateur non connecté