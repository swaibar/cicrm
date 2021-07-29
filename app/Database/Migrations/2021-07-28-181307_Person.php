<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Person extends Migration {
	public function up() {
		$this->forge->addField([
			'id'            => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'salutation'    => ['type' => 'VARCHAR', 'constraint' => '255'],
			'first_name'    => ['type' => 'VARCHAR', 'constraint' => '255'],
			'middle_name'   => ['type' => 'VARCHAR', 'constraint' => '255'],
			'last_name'     => ['type' => 'VARCHAR', 'constraint' => '255'],
			'date_of_birth' => ['type' => 'DATE', 'null' => true],
			'address'       => ['type' => 'VARCHAR', 'constraint' => '255'],
			'city'          => ['type' => 'VARCHAR', 'constraint' => '255'],
			'postcode'      => ['type' => 'VARCHAR', 'constraint' => '25'],
			'telephone'     => ['type' => 'VARCHAR', 'constraint' => '25'],
			'email'         => ['type' => 'VARCHAR', 'constraint' => '255'],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('persons');
	}

	public function down() {
		$this->forge->dropTable('persons');
	}
}

