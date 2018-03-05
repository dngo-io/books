<?php

namespace Database\Migrations\DefaultEM;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20180305132707 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE book_audio_tags (book_audio_id INT UNSIGNED NOT NULL, audio_tags_id INT UNSIGNED NOT NULL, INDEX IDX_BFA0C2C923CE359E (book_audio_id), INDEX IDX_BFA0C2C9B2CC4668 (audio_tags_id), PRIMARY KEY(book_audio_id, audio_tags_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(50) NOT NULL, INDEX tag_slug (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book_audio_tags ADD CONSTRAINT FK_BFA0C2C923CE359E FOREIGN KEY (book_audio_id) REFERENCES book_audio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_audio_tags ADD CONSTRAINT FK_BFA0C2C9B2CC4668 FOREIGN KEY (audio_tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_audio ADD is_active TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE books ADD language VARCHAR(255) NOT NULL');
        $this->addSql('CREATE INDEX book_language ON books (language)');
        $this->addSql('CREATE INDEX year ON books (year)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book_audio_tags DROP FOREIGN KEY FK_BFA0C2C9B2CC4668');
        $this->addSql('DROP TABLE book_audio_tags');
        $this->addSql('DROP TABLE tags');
        $this->addSql('ALTER TABLE book_audio DROP is_active');
        $this->addSql('DROP INDEX book_language ON books');
        $this->addSql('DROP INDEX year ON books');
        $this->addSql('ALTER TABLE books DROP language');
    }
}
