<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503182524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE key_pair ADD public_key_id INT DEFAULT NULL, ADD private_key_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE key_pair ADD CONSTRAINT FK_8F5DC5A0DE5FA8C FOREIGN KEY (public_key_id) REFERENCES public_key (id)');
        $this->addSql('ALTER TABLE key_pair ADD CONSTRAINT FK_8F5DC5A0203AF3E2 FOREIGN KEY (private_key_id) REFERENCES private_key (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F5DC5A0DE5FA8C ON key_pair (public_key_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F5DC5A0203AF3E2 ON key_pair (private_key_id)');
        $this->addSql('ALTER TABLE user ADD key_pair_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491C6E969D FOREIGN KEY (key_pair_id) REFERENCES key_pair (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6491C6E969D ON user (key_pair_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE key_pair DROP FOREIGN KEY FK_8F5DC5A0DE5FA8C');
        $this->addSql('ALTER TABLE key_pair DROP FOREIGN KEY FK_8F5DC5A0203AF3E2');
        $this->addSql('DROP INDEX UNIQ_8F5DC5A0DE5FA8C ON key_pair');
        $this->addSql('DROP INDEX UNIQ_8F5DC5A0203AF3E2 ON key_pair');
        $this->addSql('ALTER TABLE key_pair DROP public_key_id, DROP private_key_id');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6491C6E969D');
        $this->addSql('DROP INDEX UNIQ_8D93D6491C6E969D ON `user`');
        $this->addSql('ALTER TABLE `user` DROP key_pair_id');
    }
}
