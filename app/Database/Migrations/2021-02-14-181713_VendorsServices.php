<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VendorsServices extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'vendor_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
			'service_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'       => true,
			],
		]);
		$this->forge->createTable('vendors_services');
	}

	public function down()
	{
		$this->forge->dropTable('vendors_services');
	}
}
