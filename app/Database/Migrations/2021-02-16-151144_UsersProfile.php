<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersProfile extends Migration
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
			'full_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '128',
				'null' => TRUE
			],
			'user_image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
				'default'	 => 'default.svg'
			],
			'contact'       => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE
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
		$this->forge->createTable('users_profile');
	}

	public function down()
	{
		$this->forge->dropTable('users_profile');
	}
}
