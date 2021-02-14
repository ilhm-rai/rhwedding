<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VendorsLevel extends Migration
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
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'description'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('vendors_level');
	}

	public function down()
	{
		$this->forge->dropTable('vendors_level');
	}
}
