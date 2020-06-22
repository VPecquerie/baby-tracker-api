<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200622115428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Baby (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, birthDate DATE DEFAULT NULL)');
        $this->addSql('DROP INDEX IDX_B3C77447A76ED395');
        $this->addSql('DROP INDEX IDX_B3C77447FE54D947');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user_user_group AS SELECT user_id, group_id FROM fos_user_user_group');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INTEGER NOT NULL, group_id INTEGER NOT NULL, PRIMARY KEY(user_id, group_id), CONSTRAINT FK_B3C77447A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B3C77447FE54D947 FOREIGN KEY (group_id) REFERENCES fos_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO fos_user_user_group (user_id, group_id) SELECT user_id, group_id FROM __temp__fos_user_user_group');
        $this->addSql('DROP TABLE __temp__fos_user_user_group');
        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON fos_user_user_group (user_id)');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON fos_user_user_group (group_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Baby');
        $this->addSql('DROP INDEX IDX_B3C77447A76ED395');
        $this->addSql('DROP INDEX IDX_B3C77447FE54D947');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user_user_group AS SELECT user_id, group_id FROM fos_user_user_group');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INTEGER NOT NULL, group_id INTEGER NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('INSERT INTO fos_user_user_group (user_id, group_id) SELECT user_id, group_id FROM __temp__fos_user_user_group');
        $this->addSql('DROP TABLE __temp__fos_user_user_group');
        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON fos_user_user_group (user_id)');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON fos_user_user_group (group_id)');
    }
}
