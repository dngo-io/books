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

        $this->addSql('ALTER TABLE users ADD access_token VARCHAR(255) DEFAULT NULL, ADD profile_image VARCHAR(255) DEFAULT NULL, DROP email, CHANGE password account VARCHAR(60) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_users_account ON users (account)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX uniq_users_account ON users');
        $this->addSql('ALTER TABLE users ADD email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP access_token, DROP profile_image, CHANGE account password VARCHAR(60) NOT NULL COLLATE utf8_unicode_ci');
    }
}
