<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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
			'vendor_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'product_service_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'product_code'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'product_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'product_main_image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'product_video'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			],
			'product_description'       => [
				'type'       => 'TEXT',
				'null' => TRUE
			],
			'product_sold' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'price' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE
			],
			'total_review' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'active' => [
				'type' => 'INT',
				'constraint' => 1,
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
		$this->forge->createTable('products');
	}

	public function down()
	{
		$this->forge->dropTable('products');
	}
}
