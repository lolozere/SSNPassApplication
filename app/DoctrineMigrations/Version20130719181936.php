<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20130719181936 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE ssn_therapass_event_product (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, INDEX IDX_5202BA8271F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE ssn_therapass_event_product_slot (id INT AUTO_INCREMENT NOT NULL, dateStart DATETIME NOT NULL, dateEnd DATETIME NOT NULL, seatMax INT NOT NULL, eventProduct_id INT DEFAULT NULL, INDEX IDX_C3CBF6C8C1D0FAAA (eventProduct_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE ssn_therapass_event_ticket (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, limitAnimations INT NOT NULL, name VARCHAR(255) NOT NULL, weezeventTicketId VARCHAR(255) NOT NULL, INDEX IDX_61084F7771F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE ssn_therapass_event_product ADD CONSTRAINT FK_5202BA8271F7E88B FOREIGN KEY (event_id) REFERENCES ssn_therapass_event (id)");
        $this->addSql("ALTER TABLE ssn_therapass_event_product_slot ADD CONSTRAINT FK_C3CBF6C8C1D0FAAA FOREIGN KEY (eventProduct_id) REFERENCES ssn_therapass_event_product (id)");
        $this->addSql("ALTER TABLE ssn_therapass_event_ticket ADD CONSTRAINT FK_61084F7771F7E88B FOREIGN KEY (event_id) REFERENCES ssn_therapass_event (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE ssn_therapass_event_product_slot DROP FOREIGN KEY FK_C3CBF6C8C1D0FAAA");
        $this->addSql("DROP TABLE ssn_therapass_event_product");
        $this->addSql("DROP TABLE ssn_therapass_event_product_slot");
        $this->addSql("DROP TABLE ssn_therapass_event_ticket");
    }
}
