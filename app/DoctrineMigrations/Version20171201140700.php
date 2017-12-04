<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171201140700 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ICOE CHANGE contact_person contact_person VARCHAR(255) DEFAULT NULL, CHANGE cp_telefon cp_telefon INT DEFAULT NULL, CHANGE cp_email cp_email VARCHAR(255) DEFAULT NULL, CHANGE hospital_address hospital_address VARCHAR(255) DEFAULT NULL, CHANGE hospital_tlf hospital_tlf INT DEFAULT NULL, CHANGE hospital_name hospital_name VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ICOE CHANGE contact_person contact_person VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE cp_telefon cp_telefon INT NOT NULL, CHANGE cp_email cp_email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE hospital_name hospital_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE hospital_address hospital_address VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE hospital_tlf hospital_tlf INT NOT NULL');
    }
}
