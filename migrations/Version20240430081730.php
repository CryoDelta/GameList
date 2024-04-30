<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430081730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE developper (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE developper_game (developper_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_BC960A27DA42B93 (developper_id), INDEX IDX_BC960A27E48FD905 (game_id), PRIMARY KEY(developper_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor_game (editor_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_C9EAA1456995AC4C (editor_id), INDEX IDX_C9EAA145E48FD905 (game_id), PRIMARY KEY(editor_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, hours_played DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform_game (platform_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_A72356A0FFE6496F (platform_id), INDEX IDX_A72356A0E48FD905 (game_id), PRIMARY KEY(platform_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, overall DOUBLE PRECISION NOT NULL, gameplay INT NOT NULL, soundtrack INT NOT NULL, visuals INT NOT NULL, story INT NOT NULL, price INT NOT NULL, comment LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_794381C6E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_game (tag_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_CD248E3ABAD26311 (tag_id), INDEX IDX_CD248E3AE48FD905 (game_id), PRIMARY KEY(tag_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE developper_game ADD CONSTRAINT FK_BC960A27DA42B93 FOREIGN KEY (developper_id) REFERENCES developper (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE developper_game ADD CONSTRAINT FK_BC960A27E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE editor_game ADD CONSTRAINT FK_C9EAA1456995AC4C FOREIGN KEY (editor_id) REFERENCES editor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE editor_game ADD CONSTRAINT FK_C9EAA145E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE platform_game ADD CONSTRAINT FK_A72356A0FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE platform_game ADD CONSTRAINT FK_A72356A0E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE tag_game ADD CONSTRAINT FK_CD248E3ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_game ADD CONSTRAINT FK_CD248E3AE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developper_game DROP FOREIGN KEY FK_BC960A27DA42B93');
        $this->addSql('ALTER TABLE developper_game DROP FOREIGN KEY FK_BC960A27E48FD905');
        $this->addSql('ALTER TABLE editor_game DROP FOREIGN KEY FK_C9EAA1456995AC4C');
        $this->addSql('ALTER TABLE editor_game DROP FOREIGN KEY FK_C9EAA145E48FD905');
        $this->addSql('ALTER TABLE platform_game DROP FOREIGN KEY FK_A72356A0FFE6496F');
        $this->addSql('ALTER TABLE platform_game DROP FOREIGN KEY FK_A72356A0E48FD905');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6E48FD905');
        $this->addSql('ALTER TABLE tag_game DROP FOREIGN KEY FK_CD248E3ABAD26311');
        $this->addSql('ALTER TABLE tag_game DROP FOREIGN KEY FK_CD248E3AE48FD905');
        $this->addSql('DROP TABLE developper');
        $this->addSql('DROP TABLE developper_game');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE editor_game');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE platform_game');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_game');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
