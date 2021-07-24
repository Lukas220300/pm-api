<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210724103240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE entry');
        $this->addSql('ALTER TABLE user ADD asymmetric_key_pair_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495BC82CA2 FOREIGN KEY (asymmetric_key_pair_id) REFERENCES asymmetric_key_pair (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495BC82CA2 ON user (asymmetric_key_pair_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entry (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6495BC82CA2');
        $this->addSql('DROP INDEX UNIQ_8D93D6495BC82CA2 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP asymmetric_key_pair_id');
    }
}
