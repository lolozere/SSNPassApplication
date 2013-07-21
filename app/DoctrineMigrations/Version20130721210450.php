<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20130721210450 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE UNIQUE INDEX unique_email ON ssn_therapass_booking_person (email)");
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot ADD weezeventTicketNumber VARCHAR(100) DEFAULT NULL, ADD eventTicket_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot ADD CONSTRAINT FK_70AE97AF9ADD69C1 FOREIGN KEY (eventTicket_id) REFERENCES ssn_therapass_event_ticket (id)");
        $this->addSql("CREATE INDEX IDX_70AE97AF9ADD69C1 ON ssn_therapass_booking_slot (eventTicket_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP INDEX unique_email ON ssn_therapass_booking_person");
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot DROP FOREIGN KEY FK_70AE97AF9ADD69C1");
        $this->addSql("DROP INDEX IDX_70AE97AF9ADD69C1 ON ssn_therapass_booking_slot");
        $this->addSql("ALTER TABLE ssn_therapass_booking_slot DROP weezeventTicketNumber, DROP eventTicket_id");
    }
}
