<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vendors extends Migration
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
			'vendor_code'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'vendor_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',

			],
			'vendor_logo'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'default'	 => 'default.svg'

			],
			'vendor_level_id'       => [
				'type' 		 => 'INT',
				'constraint' => 11,
				'unsigned'   => true,

			],
			'vendor_description'       => [
				'type'       => 'TEXT',
				'null' => TRUE
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
		$this->forge->createTable('vendors');
	}

	public function down()
	{
		$this->forge->dropTable('vendors');
	}
}
