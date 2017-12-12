<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171210214522 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_intro_to_exercise_entity (user_id INT NOT NULL, intro_to_exercise_entity_id INT NOT NULL, INDEX IDX_760A8B4BA76ED395 (user_id), INDEX IDX_760A8B4BADAAFEA7 (intro_to_exercise_entity_id), PRIMARY KEY(user_id, intro_to_exercise_entity_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intro_To_Exercise (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_intro_to_exercise_entity ADD CONSTRAINT FK_760A8B4BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_intro_to_exercise_entity ADD CONSTRAINT FK_760A8B4BADAAFEA7 FOREIGN KEY (intro_to_exercise_entity_id) REFERENCES intro_To_Exercise (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_intro_to_exercise_entity DROP FOREIGN KEY FK_760A8B4BADAAFEA7');
        $this->addSql('DROP TABLE user_intro_to_exercise_entity');
        $this->addSql('DROP TABLE intro_To_Exercise');
    }
}
