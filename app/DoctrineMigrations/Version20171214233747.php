<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171214233747 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_Favorites (user_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_66786FB2A76ED395 (user_id), INDEX IDX_66786FB2E934951A (exercise_id), PRIMARY KEY(user_id, exercise_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_Favorites ADD CONSTRAINT FK_66786FB2A76ED395 FOREIGN KEY (user_id) REFERENCES intro_To_Exercise (id)');
        $this->addSql('ALTER TABLE user_Favorites ADD CONSTRAINT FK_66786FB2E934951A FOREIGN KEY (exercise_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_Favorites');
    }
}
