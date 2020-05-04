<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025131050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abstract_media_album (abstract_media_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_44C7067F1A32F957 (abstract_media_id), INDEX IDX_44C7067F1137ABCF (album_id), PRIMARY KEY(abstract_media_id, album_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE abstract_media_track (abstract_media_id INT NOT NULL, track_id INT NOT NULL, INDEX IDX_ABBC909A1A32F957 (abstract_media_id), INDEX IDX_ABBC909A5ED23C43 (track_id), PRIMARY KEY(abstract_media_id, track_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abstract_media_album ADD CONSTRAINT FK_44C7067F1A32F957 FOREIGN KEY (abstract_media_id) REFERENCES abstract_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abstract_media_album ADD CONSTRAINT FK_44C7067F1137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abstract_media_track ADD CONSTRAINT FK_ABBC909A1A32F957 FOREIGN KEY (abstract_media_id) REFERENCES abstract_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abstract_media_track ADD CONSTRAINT FK_ABBC909A5ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE abstract_media_album');
        $this->addSql('DROP TABLE abstract_media_track');
    }
}
