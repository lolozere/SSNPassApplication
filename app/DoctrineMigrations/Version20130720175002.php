<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20130720175002 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE ssn_therapass_booking_person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE ssn_therapass_booking_slot (id INT AUTO_INCREMENT NOT NULL, createdAt DATETIME NOT NULL, bookingPerson_id INT DEFAULT NULL, eventProductSlot_id INT DEFAULT NULL, INDEX IDX_70AE97AFB67EE209 (bookingPerson_id), INDEX IDX_70AE97AF4B7A067D (eventProductSlot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot ADD CONSTRAINT FK_70AE97AFB67EE209 FOREIGN KEY (bookingPerson_id) REFERENCES ssn_therapass_booking_person (id)");
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot ADD CONSTRAINT FK_70AE97AF4B7A067D FOREIGN KEY (eventProductSlot_id) REFERENCES ssn_therapass_event_product_slot (id)");
        $this->addSql("ALTER TABLE ssn_therapass_event ADD `type` VARCHAR(100) NOT NULL");
        
        $this->addSql("UPDATE ssn_therapass_event SET `type`='care';");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot DROP FOREIGN KEY FK_70AE97AFB67EE209");
        $this->addSql("DROP TABLE ssn_therapass_booking_person");
        $this->addSql("DROP TABLE ssn_therapass_booking_slot");
        $this->addSql("ALTER TABLE ssn_therapass_event DROP type");
    }
}
