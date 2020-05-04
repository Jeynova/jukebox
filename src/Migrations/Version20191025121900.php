<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025121900 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, artiste_id INT DEFAULT NULL, album_name VARCHAR(255) NOT NULL, duration INT NOT NULL, INDEX IDX_39986E4321D25844 (artiste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, artist_name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, style VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, playlist_name VARCHAR(255) NOT NULL, duration INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track (id INT AUTO_INCREMENT NOT NULL, artists_id INT NOT NULL, track_length INT NOT NULL, track_name VARCHAR(255) NOT NULL, INDEX IDX_D6E3F8A654A05007 (artists_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track_playlist (track_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_B45DE36C5ED23C43 (track_id), INDEX IDX_B45DE36C6BBD148 (playlist_id), PRIMARY KEY(track_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track_album (track_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_496FCCE45ED23C43 (track_id), INDEX IDX_496FCCE41137ABCF (album_id), PRIMARY KEY(track_id, album_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E4321D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A654A05007 FOREIGN KEY (artists_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE track_playlist ADD CONSTRAINT FK_B45DE36C5ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE track_playlist ADD CONSTRAINT FK_B45DE36C6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE track_album ADD CONSTRAINT FK_496FCCE45ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE track_album ADD CONSTRAINT FK_496FCCE41137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE track_album DROP FOREIGN KEY FK_496FCCE41137ABCF');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E4321D25844');
        $this->addSql('ALTER TABLE track DROP FOREIGN KEY FK_D6E3F8A654A05007');
        $this->addSql('ALTER TABLE track_playlist DROP FOREIGN KEY FK_B45DE36C6BBD148');
        $this->addSql('ALTER TABLE track_playlist DROP FOREIGN KEY FK_B45DE36C5ED23C43');
        $this->addSql('ALTER TABLE track_album DROP FOREIGN KEY FK_496FCCE45ED23C43');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE track_playlist');
        $this->addSql('DROP TABLE track_album');
    }
}
