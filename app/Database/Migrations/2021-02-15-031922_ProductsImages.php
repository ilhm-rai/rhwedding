<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsImages extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('products_images');
	}

	public function down()
	{
		$this->forge->dropTable('products_images');
	}
}
