<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220913164943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contentful_entry (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, json LONGTEXT NOT NULL, is_published TINYINT(1) NOT NULL, is_deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contentful_entry_route (contentful_entry_id VARCHAR(255) NOT NULL, route_id INT NOT NULL, INDEX IDX_58B6BC6E877C153C (contentful_entry_id), INDEX IDX_58B6BC6E34ECB4E6 (route_id), PRIMARY KEY(contentful_entry_id, route_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orm_redirects (id INT AUTO_INCREMENT NOT NULL, host VARCHAR(255) NOT NULL, schemes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', methods LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', defaults LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', requirements LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', options LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', condition_expr VARCHAR(255) DEFAULT NULL, variable_pattern VARCHAR(255) DEFAULT NULL, staticPrefix VARCHAR(255) DEFAULT NULL, routeName VARCHAR(255) NOT NULL, uri VARCHAR(255) DEFAULT NULL, permanent TINYINT(1) NOT NULL, routeTargetId INT DEFAULT NULL, UNIQUE INDEX UNIQ_6CA17E0391F30BA8 (routeName), INDEX IDX_6CA17E034C0848C6 (routeTargetId), INDEX IDX_6CA17E03A5B5867E (staticPrefix), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orm_routes (id INT AUTO_INCREMENT NOT NULL, host VARCHAR(255) NOT NULL, schemes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', methods LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', defaults LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', requirements LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', options LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', condition_expr VARCHAR(255) DEFAULT NULL, variable_pattern VARCHAR(255) DEFAULT NULL, staticPrefix VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, position INT NOT NULL, INDEX IDX_5793FCA5B5867E (staticPrefix), UNIQUE INDEX name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contentful_entry_route ADD CONSTRAINT FK_58B6BC6E877C153C FOREIGN KEY (contentful_entry_id) REFERENCES contentful_entry (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contentful_entry_route ADD CONSTRAINT FK_58B6BC6E34ECB4E6 FOREIGN KEY (route_id) REFERENCES orm_routes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orm_redirects ADD CONSTRAINT FK_6CA17E034C0848C6 FOREIGN KEY (routeTargetId) REFERENCES orm_routes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contentful_entry_route DROP FOREIGN KEY FK_58B6BC6E877C153C');
        $this->addSql('ALTER TABLE contentful_entry_route DROP FOREIGN KEY FK_58B6BC6E34ECB4E6');
        $this->addSql('ALTER TABLE orm_redirects DROP FOREIGN KEY FK_6CA17E034C0848C6');
        $this->addSql('DROP TABLE contentful_entry');
        $this->addSql('DROP TABLE contentful_entry_route');
        $this->addSql('DROP TABLE orm_redirects');
        $this->addSql('DROP TABLE orm_routes');
    }
}
