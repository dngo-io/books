<?php

namespace Database\Migrations\DefaultEM;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20180228111729 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE authors (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, FULLTEXT INDEX author_fulltext (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP INDEX uniq_users_email ON users');
        $this->addSql('ALTER TABLE users ADD access_token VARCHAR(255) DEFAULT NULL, ADD profile_image VARCHAR(255) DEFAULT NULL, DROP email, CHANGE password account VARCHAR(60) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_users_account ON users (account)');
        $this->addSql('ALTER TABLE books ADD author_id INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92F675F31B FOREIGN KEY (author_id) REFERENCES authors (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F675F31B ON books (author_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92F675F31B');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP INDEX IDX_4A1B2A92F675F31B ON books');
        $this->addSql('ALTER TABLE books DROP author_id');
        $this->addSql('DROP INDEX uniq_users_account ON users');
        $this->addSql('ALTER TABLE users ADD email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP access_token, DROP profile_image, CHANGE account password VARCHAR(60) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX uniq_users_email ON users (email)');
    }
}
