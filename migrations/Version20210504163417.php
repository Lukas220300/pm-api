<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504163417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE device (id INT AUTO_INCREMENT NOT NULL, device_identifier VARCHAR(255) NOT NULL, first_login DATETIME NOT NULL, last_login DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry (id INT AUTO_INCREMENT NOT NULL, symmetric_key_id INT DEFAULT NULL, type_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content VARCHAR(10000) NOT NULL, created DATETIME NOT NULL, last_modify DATETIME NOT NULL, UNIQUE INDEX UNIQ_2B219D70D39A568A (symmetric_key_id), INDEX IDX_2B219D70C54C8C93 (type_id), INDEX IDX_2B219D70A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry_tag (entry_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_F035C9E5BA364942 (entry_id), INDEX IDX_F035C9E5BAD26311 (tag_id), PRIMARY KEY(entry_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry_share_overlay (id INT AUTO_INCREMENT NOT NULL, symmetric_key_id INT DEFAULT NULL, entry_id INT DEFAULT NULL, user_shared_with_id INT DEFAULT NULL, created DATETIME NOT NULL, expire DATETIME NOT NULL, UNIQUE INDEX UNIQ_CBC419FED39A568A (symmetric_key_id), INDEX IDX_CBC419FEBA364942 (entry_id), INDEX IDX_CBC419FEBACA3966 (user_shared_with_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE key_pair (id INT AUTO_INCREMENT NOT NULL, public_key_id INT DEFAULT NULL, private_key_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8F5DC5A0DE5FA8C (public_key_id), UNIQUE INDEX UNIQ_8F5DC5A0203AF3E2 (private_key_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_key (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(10000) NOT NULL, created DATETIME NOT NULL, salt VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE public_key (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(1000) NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symmetric_key (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(10000) NOT NULL, created DATETIME NOT NULL, salt VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_389B783A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, key_pair_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6491C6E969D (key_pair_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_device (user_id INT NOT NULL, device_id INT NOT NULL, INDEX IDX_6C7DADB3A76ED395 (user_id), INDEX IDX_6C7DADB394A4C7D4 (device_id), PRIMARY KEY(user_id, device_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70D39A568A FOREIGN KEY (symmetric_key_id) REFERENCES symmetric_key (id)');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70C54C8C93 FOREIGN KEY (type_id) REFERENCES entry_type (id)');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE entry_tag ADD CONSTRAINT FK_F035C9E5BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entry_tag ADD CONSTRAINT FK_F035C9E5BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entry_share_overlay ADD CONSTRAINT FK_CBC419FED39A568A FOREIGN KEY (symmetric_key_id) REFERENCES symmetric_key (id)');
        $this->addSql('ALTER TABLE entry_share_overlay ADD CONSTRAINT FK_CBC419FEBA364942 FOREIGN KEY (entry_id) REFERENCES entry (id)');
        $this->addSql('ALTER TABLE entry_share_overlay ADD CONSTRAINT FK_CBC419FEBACA3966 FOREIGN KEY (user_shared_with_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE key_pair ADD CONSTRAINT FK_8F5DC5A0DE5FA8C FOREIGN KEY (public_key_id) REFERENCES public_key (id)');
        $this->addSql('ALTER TABLE key_pair ADD CONSTRAINT FK_8F5DC5A0203AF3E2 FOREIGN KEY (private_key_id) REFERENCES private_key (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6491C6E969D FOREIGN KEY (key_pair_id) REFERENCES key_pair (id)');
        $this->addSql('ALTER TABLE user_device ADD CONSTRAINT FK_6C7DADB3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_device ADD CONSTRAINT FK_6C7DADB394A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_device DROP FOREIGN KEY FK_6C7DADB394A4C7D4');
        $this->addSql('ALTER TABLE entry_tag DROP FOREIGN KEY FK_F035C9E5BA364942');
        $this->addSql('ALTER TABLE entry_share_overlay DROP FOREIGN KEY FK_CBC419FEBA364942');
        $this->addSql('ALTER TABLE entry DROP FOREIGN KEY FK_2B219D70C54C8C93');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6491C6E969D');
        $this->addSql('ALTER TABLE key_pair DROP FOREIGN KEY FK_8F5DC5A0203AF3E2');
        $this->addSql('ALTER TABLE key_pair DROP FOREIGN KEY FK_8F5DC5A0DE5FA8C');
        $this->addSql('ALTER TABLE entry DROP FOREIGN KEY FK_2B219D70D39A568A');
        $this->addSql('ALTER TABLE entry_share_overlay DROP FOREIGN KEY FK_CBC419FED39A568A');
        $this->addSql('ALTER TABLE entry_tag DROP FOREIGN KEY FK_F035C9E5BAD26311');
        $this->addSql('ALTER TABLE entry DROP FOREIGN KEY FK_2B219D70A76ED395');
        $this->addSql('ALTER TABLE entry_share_overlay DROP FOREIGN KEY FK_CBC419FEBACA3966');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783A76ED395');
        $this->addSql('ALTER TABLE user_device DROP FOREIGN KEY FK_6C7DADB3A76ED395');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE entry');
        $this->addSql('DROP TABLE entry_tag');
        $this->addSql('DROP TABLE entry_share_overlay');
        $this->addSql('DROP TABLE entry_type');
        $this->addSql('DROP TABLE key_pair');
        $this->addSql('DROP TABLE private_key');
        $this->addSql('DROP TABLE public_key');
        $this->addSql('DROP TABLE symmetric_key');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_device');
    }
}
