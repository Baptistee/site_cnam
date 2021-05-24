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
    <img src="https://img.shields.io/badge/Version-0.1-yellow">
  </a>
</p>

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

#### Information

#### ArticleBDE

#### ArticleFormation

#### CV
- id : Interger ()
- utilisateur : Utilisateur ()
- email : String (64)
- adresse : String (255)
- telephone : String (12)
- date_anniversaire : Date ()
- lien_site : String (255)
- competence : Competence ()
- langue : String ()          # TODO
- bio : String (1028)
- experience : Experience     # TODO
- formation : Formation       # TODO
- projet : Projet ()          # TODO

#### NiveauMaitrise
- id : Integer ()
- niveau_maitrise : String (64)

#### Competence
- id : Integer ()
- cv : Cv ()
- libelle : String (64)
- niveau_maitrise : NiveauMaitrise ()
- experience : Experience ()         # TODO
- formation : Formation ()           # TODO
- projet : Projet ()                 # TODO

