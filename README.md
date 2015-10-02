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

## Charger les données de base

```
$ php app/console doctrine:fixtures:load --fixtures=./src/SSN/TherapassBundle/Fixtures/ --append
```


## Tests automatisés

Les tests implémentés sont dans SSNTherapassBundle et sont des tests fonctionnels. Les fonctionnalités testées sont :

* Authentification Weezevent avec un ticket (en cours)

Pour jouer les tests :

* Créer une base de données ssn_resaapp_test sur votre serveur MySQL
* Modifier les variables de configuration dans parameters.yml

```
parameters:
    ...
    test_database_name:     ssn_resaapp_test
    test_database_user:     root
    test_database_password: root
    ...
```


## Documentation utilisateur

Une documentation utilisateur est disponible ici : [doc PDF](./src/SSN/TherapassBundle/Resources/public/SSN-DocumentationPlateforme.pdf)

# Développer l'application

## Entités (Model)

Le bundle OxygenFrameworkBundle offre des fonctionnalités pour développer un bundle avec un modèle de données hautement paramétrable. Voici quelques explications et tutoriels pour manipuler les entités.

### Déclarer une entité

**Ceci s'applique uniquement si vous créez une entité dans un bundle Oxygen.** Autrement vous faites comme vous voulez.

Pour ajouter une entité, vous devez :

* Créer la classe abstraite dans le dossier Model du bundle et l'implémenter en créant la classe entité dans le dossier Entity
* Déclarer la confguration de base dans la classe de configuration du bundle

	```	
	<?php
	// Oxygen\PassbookBundle\DependencyInjection
	
	$this->addEntityConfiguration($rootNode, 'Oxygen\PassbookBundle\Entity\EventType', 'Oxygen\PassbookBundle\Entity\Repository\EventTypeRepository');
	
	```

* Créer un fichier XML décrivant l'entité dans le dossier Resources/entities du bundle et qui sera copié/coller dans le bundle l'implémentant.

### Implémenter / étendre l'entité

Une entité d'un bundle Oxygen s'implémente dans un autre bundle (ici SSNTherapassBundle).

* Copier / coller dans le dossier Resources/config/doctrine le fichier exemple XML de l'entité et l'éditer pour fixer le nom de la table.
* Créer la classe héritant de celle se trouvant le bundle Oxygen correspondant
* Fixer dans la configuration de l'application les classes liées à l'entité

	```yaml
	oxygen_passbook:
    	# default types created with the app installation
    	event_types: [care, conference, workshop_adult]
   		entities:
        	event:
            	class: SSN\TherapassBundle\Entity\Event
            	repository: SSN\TherapassBundle\Entity\Repository\EventRepository
	```

