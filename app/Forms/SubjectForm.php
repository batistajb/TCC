<?php
/**
 * Created by PhpStorm.
 * User: JOÃO
 * Date: 08/01/2018
 * Time: 23:01
 */

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SubjectForm extends Form
{
	public function buildForm()
	{
		$this
			->add('name', 'text', [
				'label' => 'Nome',
				'rules' => 'required|max:255'
			]);
	}
}