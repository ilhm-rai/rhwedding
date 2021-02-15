<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Address extends Migration
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
			'address'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			],
			'city'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			],
			'province'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			],
			'postal_code'       => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
				'null' => TRUE
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('address');
	}

	public function down()
	{
		$this->forge->dropTable('address');
	}
}
