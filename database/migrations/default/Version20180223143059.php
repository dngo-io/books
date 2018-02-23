<?php

namespace Database\Migrations\DefaultEM;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20180223143059 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stats (id INT UNSIGNED AUTO_INCREMENT NOT NULL, audio_id INT UNSIGNED DEFAULT NULL, book_id INT UNSIGNED DEFAULT NULL, post_id INT UNSIGNED DEFAULT NULL, user_id INT UNSIGNED DEFAULT NULL, upvote INT NOT NULL, comment INT NOT NULL, day DATE NOT NULL, INDEX IDX_574767AA4B89032C (post_id), INDEX IDX_574767AAA76ED395 (user_id), INDEX idx_audio (audio_id), INDEX idx_book (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA3A3123C7 FOREIGN KEY (audio_id) REFERENCES book_audio (id)');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA16A2B381 FOREIGN KEY (book_id) REFERENCES books (id)');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA4B89032C FOREIGN KEY (post_id) REFERENCES posts (id)');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AAA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stats');
    }
}
