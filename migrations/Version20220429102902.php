<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429102902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE benevole_action (benevole_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_4645746AE77B7C09 (benevole_id), INDEX IDX_4645746A9D32F035 (action_id), PRIMARY KEY(benevole_id, action_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE benevole_association (benevole_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_31EC1556E77B7C09 (benevole_id), INDEX IDX_31EC1556EFB9C8A5 (association_id), PRIMARY KEY(benevole_id, association_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE benevole_action ADD CONSTRAINT FK_4645746AE77B7C09 FOREIGN KEY (benevole_id) REFERENCES benevole (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE benevole_action ADD CONSTRAINT FK_4645746A9D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE benevole_association ADD CONSTRAINT FK_31EC1556E77B7C09 FOREIGN KEY (benevole_id) REFERENCES benevole (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE benevole_association ADD CONSTRAINT FK_31EC1556EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action ADD personne_id INT NOT NULL');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE INDEX IDX_47CC8C92A21BD112 ON action (personne_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE benevole_action');
        $this->addSql('DROP TABLE benevole_association');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92A21BD112');
        $this->addSql('DROP INDEX IDX_47CC8C92A21BD112 ON action');
        $this->addSql('ALTER TABLE action DROP personne_id');
    }
}
