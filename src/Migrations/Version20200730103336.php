<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200730103336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("INSERT INTO article (title) value ('Awesome Ways to Photograph Elephants')");
        $this->addSql("INSERT INTO article (title) value ('Pictures of Julio Iglesias That Rather Forget')");
        $this->addSql("INSERT INTO article (title) value ('How to Increase Your Income Using Just Your Insides.')");
        $this->addSql("INSERT INTO article (title) value ('Myths About Elephants Debunked')");
        $this->addSql("INSERT INTO article (title) value ('Who Am I And Why Should You Follow Me')");
        $this->addSql("INSERT INTO article (title) value ('Yeti : Fact versus Fiction')");
        $this->addSql("INSERT INTO article (title) value ('An exploration of Memes')");
        $this->addSql("INSERT INTO article (title) value ('Elephants Are the New Black')");
        $this->addSql("INSERT INTO article (title) value ('From Zero to Yeti - Makeover Tips')");
        $this->addSql("INSERT INTO article (title) value ('How to Make Your Own Greasy Kilt for less than £5')");
        $this->addSql("INSERT INTO article (title) value ('A Day in the Life of Anonymous')");
        $this->addSql("INSERT INTO article (title) value ('Mistakes That Elephants Make and How to Avoid Them')");
        $this->addSql("INSERT INTO article (title) value ('Mind Over Pants')");
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("DELETE FROM article");
    }
}
