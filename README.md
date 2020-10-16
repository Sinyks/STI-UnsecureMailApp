# UnsecureMailApp - Manuel de l'utilisateur

```
Auteurs:
Sacha Perdrizat
Alban Favre
```

## Introduction

Ce guide succint vous guidera dans l'installation et l'utilisation de notre application.

### Installation

1. cloner le repository github (ou décompresser l'archive fourni)

```bash
$ git clone git@github.com:Sinyks/STI-UnsecureMailApp.git
```
2. A la racine du projet lancer le fichier ´´script.sh´´

```
$ cd STI-UnsecureMailApp
$ ./script.sh
```
3. le site est maintenant lancé vous pouvez vous y rendre sur http://localhost:8080

## Se connecter au site

Pour vous connecter au site rendez sur http://localhost:8080, et remplisser le formulaire avec votre identifiant et mots de passe.

![](./img/signin.png)

## Ecrire un message

Une fois connecté vous atterissez sur votre tableaux de bord, d'ici la vous pourrez lire les messages reçu en cliquant dessus.

![](./img/Dashboard.png)



Et écrire des messages à vos contact en faisant ``Nouveau Message``.

![](./img/newmessage.png)

Vous obtiendrez un message vous indiquant que l'envoie c'est correctement effectué.

## Répondre aux message

Depuis le tableau de bord vous avez également la possibilité de répondre aux message que l'on vous a envoyé à l'aide, pour cela faites dérouler le message et faite ``Répondre``, vous allez entrer sur une nouvelle page vous invitant à rédiger votre réponse.

![](./img/answer_show.png)





![](./img/answer.png)

## Supprimer un message

En cliquant sur ``supprimer`` vous allez supprimer le message et il disparaitra de votre tableau de bord.

## Changer son mot de passe

Si d'aventure vous désirez changer votre mot de passe, un formulaire en bas de votre tableau de bord vous permettra de le modifier

![](./img/chpassword.png)

## Console d'administration

La console d'adminitration n'est visible que si vous êtes administrateur.

![](./img/adminshow.png)

En vous y rendant vous aurez la possibilité d'administrer,créer et supprimer des utilisateurs de l'application.

### Création d'utilisateur

![AdminOverview](./img/AdminOverview.jpg)

![](./img/AdminCreate.jpg)

### Suppression

