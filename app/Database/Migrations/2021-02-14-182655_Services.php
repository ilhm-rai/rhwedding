<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Services extends Migration
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
			'icon'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' 		 => TRUE
			],
			'description'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' 		 => TRUE
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('services');
	}

	public function down()
	{
		$this->forge->dropTable('services');
	}
}
