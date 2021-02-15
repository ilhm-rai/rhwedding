<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsCategory extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'product_category_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
		]);
		$this->forge->createTable('products_category');
	}

	public function down()
	{
		$this->forge->dropTable('products_category');
	}
}
