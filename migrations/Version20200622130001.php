<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200622130001 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE babies (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, feeds_id INTEGER DEFAULT NULL, sleeps_id INTEGER DEFAULT NULL, firstname VARCHAR(255) NOT NULL, birthDate DATE DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_5703214C7E294923 ON babies (feeds_id)');
        $this->addSql('CREATE INDEX IDX_5703214C308C507E ON babies (sleeps_id)');
        $this->addSql('CREATE TABLE feeds (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, baby_id INTEGER DEFAULT NULL, start DATETIME NOT NULL, finish DATETIME NOT NULL, quantity INTEGER NOT NULL, comments CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_5A29F52F2E288954 ON feeds (baby_id)');
        $this->addSql('CREATE TABLE fos_groups (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:array)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A44C5CA5E237E06 ON fos_groups (name)');
        $this->addSql('CREATE TABLE fos_users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles CLOB NOT NULL --(DC2Type:array)
        , created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_of_birth DATETIME DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, website VARCHAR(64) DEFAULT NULL, biography VARCHAR(1000) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, locale VARCHAR(8) DEFAULT NULL, timezone VARCHAR(64) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, facebook_uid VARCHAR(255) DEFAULT NULL, facebook_name VARCHAR(255) DEFAULT NULL, facebook_data CLOB DEFAULT NULL --(DC2Type:json)
        , twitter_uid VARCHAR(255) DEFAULT NULL, twitter_name VARCHAR(255) DEFAULT NULL, twitter_data CLOB DEFAULT NULL --(DC2Type:json)
        , gplus_uid VARCHAR(255) DEFAULT NULL, gplus_name VARCHAR(255) DEFAULT NULL, gplus_data CLOB DEFAULT NULL --(DC2Type:json)
        , token VARCHAR(255) DEFAULT NULL, two_step_code VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32427CF792FC23A8 ON fos_users (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32427CF7A0D96FBF ON fos_users (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32427CF7C05FB297 ON fos_users (confirmation_token)');
        $this->addSql('CREATE TABLE user_baby (user_id INTEGER NOT NULL, baby_id INTEGER NOT NULL, PRIMARY KEY(user_id, baby_id))');
        $this->addSql('CREATE INDEX IDX_FDEDCDF7A76ED395 ON user_baby (user_id)');
        $this->addSql('CREATE INDEX IDX_FDEDCDF72E288954 ON user_baby (baby_id)');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INTEGER NOT NULL, group_id INTEGER NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON fos_user_user_group (user_id)');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON fos_user_user_group (group_id)');
        $this->addSql('CREATE TABLE sleeps (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, baby_id INTEGER DEFAULT NULL, start DATETIME NOT NULL, finish DATETIME NOT NULL, comments CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_C461130A2E288954 ON sleeps (baby_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE babies');
        $this->addSql('DROP TABLE feeds');
        $this->addSql('DROP TABLE fos_groups');
        $this->addSql('DROP TABLE fos_users');
        $this->addSql('DROP TABLE user_baby');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('DROP TABLE sleeps');
    }
}
