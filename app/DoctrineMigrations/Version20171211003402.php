<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171211003402 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE userFavoriteExercises (user_id INT NOT NULL, intro_to_exercise_entity_id INT NOT NULL, INDEX IDX_F3B09330A76ED395 (user_id), INDEX IDX_F3B09330ADAAFEA7 (intro_to_exercise_entity_id), PRIMARY KEY(user_id, intro_to_exercise_entity_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE userFavoriteExercises ADD CONSTRAINT FK_F3B09330A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE userFavoriteExercises ADD CONSTRAINT FK_F3B09330ADAAFEA7 FOREIGN KEY (intro_to_exercise_entity_id) REFERENCES intro_To_Exercise (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE userFavoriteExercises');
    }
}
