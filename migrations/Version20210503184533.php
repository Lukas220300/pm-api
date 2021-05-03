<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503184533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE device (id INT AUTO_INCREMENT NOT NULL, device_identifier VARCHAR(255) NOT NULL, first_login DATETIME NOT NULL, last_login DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_device (user_id INT NOT NULL, device_id INT NOT NULL, INDEX IDX_6C7DADB3A76ED395 (user_id), INDEX IDX_6C7DADB394A4C7D4 (device_id), PRIMARY KEY(user_id, device_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_device ADD CONSTRAINT FK_6C7DADB3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_device ADD CONSTRAINT FK_6C7DADB394A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_device DROP FOREIGN KEY FK_6C7DADB394A4C7D4');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE user_device');
    }
}
