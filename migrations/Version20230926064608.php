<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926064608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nationality (id INT AUTO_INCREMENT NOT NULL, nationality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actor ADD nationality_id INT NOT NULL');
        $this->addSql('ALTER TABLE actor ADD CONSTRAINT FK_447556F91C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('CREATE INDEX IDX_447556F91C9DA55 ON actor (nationality_id)');
        $this->addSql('ALTER TABLE movie CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE release_date release_date DATETIME DEFAULT NULL, CHANGE duration duration VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor DROP FOREIGN KEY FK_447556F91C9DA55');
        $this->addSql('DROP TABLE nationality');
        $this->addSql('DROP INDEX IDX_447556F91C9DA55 ON actor');
        $this->addSql('ALTER TABLE actor DROP nationality_id');
        $this->addSql('ALTER TABLE movie CHANGE description description VARCHAR(255) NOT NULL, CHANGE release_date release_date DATE NOT NULL, CHANGE duration duration INT NOT NULL');
    }
}
