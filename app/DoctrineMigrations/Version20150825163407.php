<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150825163407 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("INSERT INTO ssn_therapass_config (id, value) VALUES
        		('jumbotronTitle', 'Réserver vos places aux animations du Salon')
        		ON DUPLICATE KEY UPDATE value='Réserver vos places aux animations du Salon'");
        $this->addSql("INSERT INTO ssn_therapass_config (id, value) VALUES
        		('jumbotronSubTitle', 'Le Salon Santé Nature vous propose des animations chaque jour : rendez-vous avec des intervenants du pôle thérapie bien-être (PTBE), conférences, ateliers adultes, ...\nCette plateforme vous propose de réserver votre place.')
        		ON DUPLICATE KEY UPDATE value='Le Salon Santé Nature vous propose des animations chaque jour : rendez-vous avec des intervenants du pôle thérapie bien-être (PTBE), conférences, ateliers adultes, ...\nCette plateforme vous propose de réserver votre place.'");
        $this->addSql("UPDATE `ssn_therapass_event` SET `type` = 'workshop_adult' WHERE `ssn_therapass_event`.`id` =5;");
        $this->addSql("UPDATE `ssn_therapass_config` SET `value` = 'https://www.weezevent.com/salon-sante-nature-2015' WHERE `ssn_therapass_config`.`id` = 'commandLink';");
    }

    public function down(Schema $schema)
    {

    }
}
