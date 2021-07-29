<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;


class Person extends ResourceController {

	protected $modelName = 'App\Models\PersonModel';
	protected $format = 'json';

	static $fields = ['salutation', 'first_name', 'middle_name', 'last_name', 'date_of_birth',
							'address', 'city', 'postcode', 'telephone', 'email'];

	/**
	 * index function
	 * @method : GET
	 */
	public function index() {
		return $this->respond([
			'statusCode' => 200,
			'message'    => 'OK',
			'data'       => $this->model->orderBy('id', 'DESC')->findAll()
		], 200);
	}

	/**
	 * show function
	 * @method : GET with params ID
	 */
	public function show($id = null) {
		if (!$person = $this->model->find($id))
			return $this->failNotFound();

		return $this->respond([
			'statusCode' => 200,
			'message'    => 'OK',
			'data'       => $person
		], 200);
	}

	/**
	 * create function
	 * @method : POST
	 */
	public function create() {
		if ($this->request) {

			$data = [];
			$json = $this->request->getJSON();
			foreach (self::$fields as $field)
				$data[$field] = $json
					? $data[$field] = $json->{$field}
					: $_REQUEST[$field];//TODO not good, but working for now where is not $this->request->getRawInput()

			return $this->model->insert($data)
				? $this->respondCreated($data)
				: $this->failValidationErrors('Bad Data');
		}
	}

	/**
	 * update function
	 * @method : PUT or PATCH
	 */
	public function update($id = null) {
		if (!$this->model->find($id))
			return $this->failNotFound();

		if ($this->request) {
			$data = [];
			$json = $this->request->getJSON();
			foreach (self::$fields as $field)
				$data[$field] = $json
					? $data[$field] = $json->{$field}
					: $_REQUEST[$field];//TODO not good, but working for now where is not $this->request->getRawInput()
		}
		return $this->model->update($id, $data)
			? $this->respondUpdated()
			: $this->failValidationErrors('Bad Data');
	}

	/**
	 * edit function
	 * @method : DELETE with params ID
	 */
	public function delete($id = null) {
		if (!$this->model->find($id))
			return $this->failNotFound();

		return $this->model->delete($id)
			? $this->respondDeleted()
			: $this->failServerError();
	}

}
