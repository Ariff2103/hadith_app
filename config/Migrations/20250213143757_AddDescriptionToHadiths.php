<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddDescriptionToHadiths extends AbstractMigration
{
    public function up(): void
    {
        $this->table('hadiths')
              ->addColumn('description', ['type' => 'text', 'null' => true]) // Adjust options as needed
              ->update();
    }

    public function down(): void
    {
        $this->table('hadiths')
              ->dropColumn('description')
              ->update();
    }
}