# Application de réservation d'animations


Application Symfony2 pour gérer des réservations à des animations.

Les animations sont organisées dans des évènements. Pour chaque animation des créneaux horaires sont proposées.

L'internaute réserve uniquement en se connectant avec un n° de billet Weezevent obtenu au préalable.

## Structuration du code source

L'application dépend d'autres dépôts, rattachés sous forme de sous-modules Git :

* Bundle SSN/TherapassBundle : https://github.com/lolozere/SSNTherapassBundle. Il relie l'ensemble des bundles Oxygen pour créer un fonctionnement propre au salon santé nature.
* Bundles Oxygen créée par l'association [Soletic](https://github.com/Soletic)
	* [DataGridBundle](https://github.com/Soletic/OxygenDatagridBundle) : facilite la création de datagrid via une surcouche sur [APyDataGridBundle](https://github.com/Abhoryo/APYDataGridBundle)
	* [FrameworkBundle](https://github.com/Soletic/OxygenFrameworkBundle) : uniformise la création de gestionnaire d'entités, de formulaires et de controllers.
	* [PassbookBundle](https://github.com/Soletic/OxygenPassbookBundle) : bundle avec model et backoffice pour la réservation d'animations (utilisant Weezevent pour les billets).
	* [WeezeventBundle](https://github.com/Soletic/OxygenWeezeventBundle) : bundle ajoutant des forms types et services utilisant l'API de Weezevent.

A l'origine les bundles **Oxygen** ont été créés dans le cadre d'un projet au sein de Soletic pour proposer un ensemble de bundle accélérant et unifiant les pratiques de codage dans des projets Symfony2 / Doctrine/ Bootstrap. Cependant ce projet n'a pas abouti. Cependant la plupart de ces bundles ont tous un dossier *Resources/doc* pour en expliquer l'utilisation.

## Configuration de l'application

### Fichier parameters-application.yml

Il est inclut par le fichier config.yml de l'application. Présentation détaillée de certaines variables :

* **open_mode** : admin|full|null / Est utilisé dans les templates twig pour désactiver l'accès aux réservations si ce n'est pas égal à *full*. Si égal à *admin* alors seul le lien d'accès à l'administration est affiché en pied de page.


## Tests automatisés

Aucun test automatisé n'a été implémenté sur cette application.

## Documentation utilisateur

Une documentation utilisateur est disponible ici : [doc PDF](./src/SSN/TherapassBundle/Resources/public/SSN-DocumentationPlateforme.pdf)




