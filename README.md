<h1 align="center">
  <br>
  <a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/CNAM_Logo.svg/1280px-CNAM_Logo.svg.png" alt="logo-site-cnam" alt="re-frame logo" width="500"></a>
  <br>
  Projet Site Formation CNAM
  <br>
</h1>

<h4 align="center">Projet de site web à propos de la formation <a href="" target="_blank">CNAM</a>.</h4>

<p align="center">
  <a href="">
    <img src="https://img.shields.io/badge/Framework-Symfony-green">
  </a>
  <a href="">
    <img src="https://img.shields.io/badge/Rendu-24/05-blue">
  </a>
  <a href="">
      <img src="https://img.shields.io/badge/School-CNAM-red">
  </a>
  <a href="">
    <img src="https://img.shields.io/badge/Student-Baptiste Blanchet-red">
  </a>
  <a href="">
    <img src="https://img.shields.io/badge/Student-Julien Hermange-red">
  </a>
  <a href="">
    <img src="https://img.shields.io/badge/Student-Aloîs Bruccoleri-red">
  </a>
</p>

---

### Organisation et architecture du site
- Nous avons gardé l'architecture proposé par le projet de base Symfony + quelques ajouts. Nous avond donc organisé nos fichiers comme conseillé par Symfony (les controlleurs dans le dossier Controllers, etc ...)
- Ajout d'un dossier Enum dans src permettant de ranger des classes abstraites avec des méthodes statiques pour gérer des Enum dans l'ensemble du code
- Nous avons organisé les vues dans le dossier templates. Ce dossier contient des sous-dossiers permettant d'organiser nos vues en fonction des cas d'utilisations. Cela nous permet de trouver le fichier souhaité plus rapidement avec une telle organisation
- Les routes sont définies dans le code des controllers (au lieu de routes.yaml)
- La base de données est hébergée sur AlwaysData.net (tout est renseigné dans le .env aucune manip à faire)

---

### Choix des bibliothèques / bundles / modules externes

- WebProfiler : Permet d'avoir des statistiques directement sur le site
- Monolog
- Debug : Permets de faire du débogage
- Maker

- SecurityBundle : Permet la gestion des rôles

- Framework
- SensioFrameworkExtra

- Twig : Moteur de templates par défaut de symfony
- TwigExtra

- Doctrine : Permets la manipulation des bases de données
- DoctrineMigrations
- DoctrineFixtures

---

### Fonctionnalités

**Administration**
- [X] Pouvoir gérer les promos, étudiants, intervenants, membres du BDE
- [ ] Pouvoir modifier le contenu (via un wysiwyg) des pages du site présentant la formation

**Accés intervenant**
- [x] Pouvoir gérer des évènements du planning liés à une promo (échéance de documents à rendre, examens, ...) ou non (GGJ, réunion académique, ...)
- [ ] Pouvoir ajouter un projet lié à 1=>n étudiants

**Délégué**
- [x] Pouvoir gérer des évènements du planning liés à une promo (échéance de documents à rendre, examens, ...)
- [x] Rédiger des informations

**Accés membre BDE**
- [X] pouvoir gérer des articles d'informations

**Public et non connecté**
- [ ] Voir la présentation de la formation
- [ ] Voir le CV des élèves (chaque élève peut avoir une option pour dire si son CV est public ou non)
- [ ] Voir les projets

**Public et connecté**
- [x] Gestion de son propre compte (pour les  élèves mini CV)
- [ ] Proposer un projet à faire valider par un administrateur

---

### Base de données

#### Utilisateur
- id : Integer ()
- nom : String (16)
- prenom : String (16)
- login : String (16)
- pwd : String (64)
- role : String (4)
- **cv** : Cv ()

#### Promo

#### Image
- id : Integer ()
- titre : varchar (255)
- lien : varchar (2055)

#### Projet
- id : Integer ()
- titre : varchar (255)
- description : varchar (1028)
- date_debut : Date ()
- date_fin : Date ()
- photo : Image ()

#### Evenement
- id : Integer ()
- Titre : varchar (255)
- debut : datetime
- fin : datetime
- description : longtext
- journee_complete : bool
- couleur_fond : carchar(7)
- couleur_bordure : carchar(7)
- couleur_texte : carchar(7)

#### Information

#### ArticleBDE

#### ArticleFormation

#### CV
- id : Interger ()
- **utilisateur** : Utilisateur ()
- email : varchar (64)
- adresse : varchar (255)
- telephone : varchar (12)
- date_anniversaire : Date ()
- lien_site : varchar (255)
- **competence** : Competence ()
- langue : varchar ()         # TODO
- bio : String (1028)
- experience : Experience     # TODO
- formation : Formation       # TODO
- projet : Projet ()          # TODO

#### Competence
- id : Integer ()
- **cv** : Cv ()
- libelle : String (64)
- niveau_maitrise : Integer ()
- experience : Experience ()         # TODO
- formation : Formation ()           # TODO
- projet : Projet ()                 # TODO

---

### Comment configurer le site

## Créer un CV

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-1.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-1.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Lorsque vous êtes connecté vous pouvez créer un CV
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-2.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-2.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Remplissez les champs obligatoires (email et bio) et appuyez sur le bouton ajouter
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-7.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-7.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    En appuyant sur le bouton Modifier sur la page Mon CV vous pouvez modifier ou supprimer votre CV (l'action supprimer va aussi supprimer vos compétences)
  <br>
</h3>

## Ajouter des compétences à son CV

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-3.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-3.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Depuis la page Mon CV vous pouvez modifier votre CV ou ajouter des compétences. Appuyez sur le bouton Compétences pour accéder à la page des compétences
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-4.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-4.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Sur la page Mes compétences appuyez sur le bouton Ajouter pour ajouter une compétence à votre CV
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-5.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-5.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Remplissez tous les champs et appuyez sur le bouton Ajouter
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-6.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-cv-6.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Depuis la page Mes compétences vous pouvez consulter vos compétences, les modifier ou en supprimer
  <br>
</h3>

## Ajouter un évènement dans le calendrier

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-ajout-event-1.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-ajout-event-1.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Depuis la page calendrier, cliquez sur le bouton pour voir la liste des évènements.
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-ajout-event-2.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-ajout-event-2.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Ensuite, cliquez sur le lien pour créer un évènements.
  <br>
</h3>

<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-ajout-event-3.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-ajout-event-3.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Maintenant il ne reste plus qu'a remplir les champs et à sauvegarder.
  <br>
</h3>

## Création d'un compte et gestion 
<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-compte-1.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-compte-1.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Dans le header cliquez sur s'inscrire,entrez vos identifiants de connexion et appuyez sur inscription 
  <br>
</h3>
<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-compte-2.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-compte-2.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Connectez vous dans l'onglet se connecter du header
  <br>
</h3>
<h3 align="center">
  <br>
  <a href="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-compte-3.png"><img src="https://raw.githubusercontent.com/Baptistee/site_cnam/main/git-res/images/tuto-compte-3.png" alt="offroad" alt="re-frame logo" width="500"></a>
  <br>
    Si vous avez les permissions admin vous pouvez accéder à la gestion des utilisateurs notamment leurs roles : a correspond à admin, b à intervenant, c à BDE et d à étudiant.
  <br>
</h3>
