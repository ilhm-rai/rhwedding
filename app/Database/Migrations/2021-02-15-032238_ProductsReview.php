<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsReview extends Migration
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
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'transaction_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'rating' => [
				'type' => 'INT',
				'constraint' => 1,
				'null' => TRUE
			],
			'review'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			],

			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('products_review');
	}

	public function down()
	{
		$this->forge->dropTable('products_review');
	}
}
