<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200622140628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5703214C308C507E');
        $this->addSql('DROP INDEX IDX_5703214C7E294923');
        $this->addSql('CREATE TEMPORARY TABLE __temp__babies AS SELECT id, feeds_id, sleeps_id, firstname, birthDate FROM babies');
        $this->addSql('DROP TABLE babies');
        $this->addSql('CREATE TABLE babies (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, feeds_id INTEGER DEFAULT NULL, sleeps_id INTEGER DEFAULT NULL, firstname VARCHAR(255) NOT NULL COLLATE BINARY, birthDate DATE DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_5703214C7E294923 FOREIGN KEY (feeds_id) REFERENCES feeds (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5703214C308C507E FOREIGN KEY (sleeps_id) REFERENCES sleeps (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO babies (id, feeds_id, sleeps_id, firstname, birthDate) SELECT id, feeds_id, sleeps_id, firstname, birthDate FROM __temp__babies');
        $this->addSql('DROP TABLE __temp__babies');
        $this->addSql('CREATE INDEX IDX_5703214C308C507E ON babies (sleeps_id)');
        $this->addSql('CREATE INDEX IDX_5703214C7E294923 ON babies (feeds_id)');
        $this->addSql('DROP INDEX IDX_5A29F52F2E288954');
        $this->addSql('CREATE TEMPORARY TABLE __temp__feeds AS SELECT id, baby_id, start, finish, quantity, comments FROM feeds');
        $this->addSql('DROP TABLE feeds');
        $this->addSql('CREATE TABLE feeds (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, baby_id INTEGER DEFAULT NULL, start DATETIME NOT NULL, finish DATETIME NOT NULL, quantity INTEGER NOT NULL, comments CLOB DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_5A29F52F2E288954 FOREIGN KEY (baby_id) REFERENCES babies (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO feeds (id, baby_id, start, finish, quantity, comments) SELECT id, baby_id, start, finish, quantity, comments FROM __temp__feeds');
        $this->addSql('DROP TABLE __temp__feeds');
        $this->addSql('CREATE INDEX IDX_5A29F52F2E288954 ON feeds (baby_id)');
        $this->addSql('DROP INDEX IDX_FDEDCDF72E288954');
        $this->addSql('DROP INDEX IDX_FDEDCDF7A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_baby AS SELECT user_id, baby_id FROM user_baby');
        $this->addSql('DROP TABLE user_baby');
        $this->addSql('CREATE TABLE user_baby (user_id INTEGER NOT NULL, baby_id INTEGER NOT NULL, PRIMARY KEY(user_id, baby_id), CONSTRAINT FK_FDEDCDF7A76ED395 FOREIGN KEY (user_id) REFERENCES fos_users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_FDEDCDF72E288954 FOREIGN KEY (baby_id) REFERENCES babies (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user_baby (user_id, baby_id) SELECT user_id, baby_id FROM __temp__user_baby');
        $this->addSql('DROP TABLE __temp__user_baby');
        $this->addSql('CREATE INDEX IDX_FDEDCDF72E288954 ON user_baby (baby_id)');
        $this->addSql('CREATE INDEX IDX_FDEDCDF7A76ED395 ON user_baby (user_id)');
        $this->addSql('DROP INDEX IDX_B3C77447FE54D947');
        $this->addSql('DROP INDEX IDX_B3C77447A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user_user_group AS SELECT user_id, group_id FROM fos_user_user_group');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INTEGER NOT NULL, group_id INTEGER NOT NULL, PRIMARY KEY(user_id, group_id), CONSTRAINT FK_B3C77447A76ED395 FOREIGN KEY (user_id) REFERENCES fos_users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B3C77447FE54D947 FOREIGN KEY (group_id) REFERENCES fos_groups (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO fos_user_user_group (user_id, group_id) SELECT user_id, group_id FROM __temp__fos_user_user_group');
        $this->addSql('DROP TABLE __temp__fos_user_user_group');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON fos_user_user_group (group_id)');
        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON fos_user_user_group (user_id)');
        $this->addSql('DROP INDEX IDX_C461130A2E288954');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sleeps AS SELECT id, baby_id, start, finish, comments FROM sleeps');
        $this->addSql('DROP TABLE sleeps');
        $this->addSql('CREATE TABLE sleeps (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, baby_id INTEGER DEFAULT NULL, start DATETIME NOT NULL, finish DATETIME NOT NULL, comments CLOB DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_C461130A2E288954 FOREIGN KEY (baby_id) REFERENCES babies (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sleeps (id, baby_id, start, finish, comments) SELECT id, baby_id, start, finish, comments FROM __temp__sleeps');
        $this->addSql('DROP TABLE __temp__sleeps');
        $this->addSql('CREATE INDEX IDX_C461130A2E288954 ON sleeps (baby_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5703214C7E294923');
        $this->addSql('DROP INDEX IDX_5703214C308C507E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__babies AS SELECT id, feeds_id, sleeps_id, firstname, birthDate FROM babies');
        $this->addSql('DROP TABLE babies');
        $this->addSql('CREATE TABLE babies (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, feeds_id INTEGER DEFAULT NULL, sleeps_id INTEGER DEFAULT NULL, firstname VARCHAR(255) NOT NULL, birthDate DATE DEFAULT NULL)');
        $this->addSql('INSERT INTO babies (id, feeds_id, sleeps_id, firstname, birthDate) SELECT id, feeds_id, sleeps_id, firstname, birthDate FROM __temp__babies');
        $this->addSql('DROP TABLE __temp__babies');
        $this->addSql('CREATE INDEX IDX_5703214C7E294923 ON babies (feeds_id)');
        $this->addSql('CREATE INDEX IDX_5703214C308C507E ON babies (sleeps_id)');
        $this->addSql('DROP INDEX IDX_5A29F52F2E288954');
        $this->addSql('CREATE TEMPORARY TABLE __temp__feeds AS SELECT id, baby_id, start, finish, quantity, comments FROM feeds');
        $this->addSql('DROP TABLE feeds');
        $this->addSql('CREATE TABLE feeds (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, baby_id INTEGER DEFAULT NULL, start DATETIME NOT NULL, finish DATETIME NOT NULL, quantity INTEGER NOT NULL, comments CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO feeds (id, baby_id, start, finish, quantity, comments) SELECT id, baby_id, start, finish, quantity, comments FROM __temp__feeds');
        $this->addSql('DROP TABLE __temp__feeds');
        $this->addSql('CREATE INDEX IDX_5A29F52F2E288954 ON feeds (baby_id)');
        $this->addSql('DROP INDEX IDX_B3C77447A76ED395');
        $this->addSql('DROP INDEX IDX_B3C77447FE54D947');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user_user_group AS SELECT user_id, group_id FROM fos_user_user_group');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INTEGER NOT NULL, group_id INTEGER NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('INSERT INTO fos_user_user_group (user_id, group_id) SELECT user_id, group_id FROM __temp__fos_user_user_group');
        $this->addSql('DROP TABLE __temp__fos_user_user_group');
        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON fos_user_user_group (user_id)');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON fos_user_user_group (group_id)');
        $this->addSql('DROP INDEX IDX_C461130A2E288954');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sleeps AS SELECT id, baby_id, start, finish, comments FROM sleeps');
        $this->addSql('DROP TABLE sleeps');
        $this->addSql('CREATE TABLE sleeps (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, baby_id INTEGER DEFAULT NULL, start DATETIME NOT NULL, finish DATETIME NOT NULL, comments CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO sleeps (id, baby_id, start, finish, comments) SELECT id, baby_id, start, finish, comments FROM __temp__sleeps');
        $this->addSql('DROP TABLE __temp__sleeps');
        $this->addSql('CREATE INDEX IDX_C461130A2E288954 ON sleeps (baby_id)');
        $this->addSql('DROP INDEX IDX_FDEDCDF7A76ED395');
        $this->addSql('DROP INDEX IDX_FDEDCDF72E288954');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_baby AS SELECT user_id, baby_id FROM user_baby');
        $this->addSql('DROP TABLE user_baby');
        $this->addSql('CREATE TABLE user_baby (user_id INTEGER NOT NULL, baby_id INTEGER NOT NULL, PRIMARY KEY(user_id, baby_id))');
        $this->addSql('INSERT INTO user_baby (user_id, baby_id) SELECT user_id, baby_id FROM __temp__user_baby');
        $this->addSql('DROP TABLE __temp__user_baby');
        $this->addSql('CREATE INDEX IDX_FDEDCDF7A76ED395 ON user_baby (user_id)');
        $this->addSql('CREATE INDEX IDX_FDEDCDF72E288954 ON user_baby (baby_id)');
    }
}
