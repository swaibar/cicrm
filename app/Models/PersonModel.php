<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model {

	protected $table = "persons";

	protected $allowedFields = [
		'salutation',
		'first_name',
		'middle_name',
		'last_name',
		'date_of_birth',
		'address',
		'city',
		'postcode',
		'telephone',
		'email'
	];
}
