<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersonSeeder extends Seeder {

	public function run() {
		$model = model('PersonModel');
		for ($i = 0; $i < 100; $i++) {
			$model->insert([
				'salutation'    => static::faker()->title,
				'first_name'    => static::faker()->firstName,
				'middle_name'   => static::faker()->firstName,
				'last_name'     => static::faker()->lastName,
				'date_of_birth' => static::faker()->date,
				'address'       => static::faker()->streetAddress,
				'city'          => static::faker()->city,
				'postcode'      => static::faker()->postcode,
				'telephone'     => static::faker()->phoneNumber,
				'email'         => static::faker()->email,
			]);
		}
	}
}
