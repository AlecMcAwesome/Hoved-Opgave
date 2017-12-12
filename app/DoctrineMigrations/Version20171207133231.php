<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171207133231 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_intro_to_exercise_entity (user_id INT NOT NULL, intro_to_exercise_entity_id INT NOT NULL, INDEX IDX_760A8B4BA76ED395 (user_id), INDEX IDX_760A8B4BADAAFEA7 (intro_to_exercise_entity_id), PRIMARY KEY(user_id, intro_to_exercise_entity_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_intro_to_exercise_entity ADD CONSTRAINT FK_760A8B4BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_intro_to_exercise_entity ADD CONSTRAINT FK_760A8B4BADAAFEA7 FOREIGN KEY (intro_to_exercise_entity_id) REFERENCES Intro_To_Exercise (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user_favorite_exercises');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_favorite_exercises (user_id INT NOT NULL, intro_to_exercise_entity_id INT NOT NULL, INDEX IDX_69F53AF8A76ED395 (user_id), INDEX IDX_69F53AF8ADAAFEA7 (intro_to_exercise_entity_id), PRIMARY KEY(user_id, intro_to_exercise_entity_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_favorite_exercises ADD CONSTRAINT FK_69F53AF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_favorite_exercises ADD CONSTRAINT FK_69F53AF8ADAAFEA7 FOREIGN KEY (intro_to_exercise_entity_id) REFERENCES Intro_To_Exercise (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user_intro_to_exercise_entity');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name');
    }
}
