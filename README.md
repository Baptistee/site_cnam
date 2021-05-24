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

### Fonctionnalités

**Administration**
- [ ] Pouvoir gérer les promos, étudiants, intervenants, membres du BDE
- [ ] Pouvoir modifier le contenu (via un wysiwyg) des pages du site présentant la formation

**Accés intervenant**
- [ ] Pouvoir gérer des évènements du planning liés à une promo (échéance de documents à rendre, examens, ...) ou non (GGJ, réunion académique, ...)
- [ ] Pouvoir ajouter un projet lié à 1=>n étudiants

**Délégué**
- [ ] Pouvoir gérer des évènements du planning liés à une promo (échéance de documents à rendre, examens, ...)
- [ ] Rédiger des informations

**Accés membre BDE**
- [ ] pouvoir gérer des articles d'informations

**Public et non connecté**
- [ ] Voir la présentation de la formation
- [ ] Voir le CV des élèves (chaque élève peut avoir une option pour dire si son CV est public ou non)
- [ ] Voir les projets

**Public et connecté**
- [ ] Gestion de son propre compte (pour les  élèves mini CV)
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
- cv : Cv ()

#### Promo

#### Projet

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
- email : String (64)
- adresse : String (255)
- telephone : String (12)
- date_anniversaire : Date ()
- lien_site : String (255)
- **competence** : Competence ()
- langue : String ()          # TODO
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

