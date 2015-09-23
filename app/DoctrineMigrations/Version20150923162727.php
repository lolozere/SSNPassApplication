<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150923162727 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE ssn_therapass_event ADD type_id INT DEFAULT NULL");

        $this->addSql("TRUNCATE TABLE `ssn_therapass_event_type`");
        $this->addSql("INSERT INTO `ssn_therapass_event_type` (`name`) VALUES ('Intervention PTBE'), ('Conférence'), ('Atelier Adultes')");

        $this->addSql("UPDATE `ssn_therapass_event` SET type_id=1 WHERE `type`='care'");
        $this->addSql("UPDATE `ssn_therapass_event` SET type_id=3 WHERE `type`='workshop_adult'");

        $this->addSql("ALTER TABLE ssn_therapass_event DROP `type`");
        $this->addSql("ALTER TABLE ssn_therapass_event ADD CONSTRAINT FK_6D05BD30C54C8C93 FOREIGN KEY (type_id) REFERENCES ssn_therapass_event_type (id)");
        $this->addSql("CREATE INDEX IDX_6D05BD30C54C8C93 ON ssn_therapass_event (type_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE ssn_therapass_event DROP FOREIGN KEY FK_6D05BD30C54C8C93");
        $this->addSql("DROP INDEX IDX_6D05BD30C54C8C93 ON ssn_therapass_event");
        $this->addSql("ALTER TABLE ssn_therapass_event ADD type VARCHAR(100) NOT NULL, DROP type_id");
    }
}
