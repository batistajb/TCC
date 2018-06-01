<?php
/**
 * Created by PhpStorm.
 * User: JOÃO
 * Date: 26/12/2017
 * Time: 10:36
 */


namespace App\Forms;

use Kris\LaravelFormBuilder\Form;


class UserSettingsForm extends Form
{

	public function buildForm()
	{
		$this
			->add('Nova Senha','password',[
				'rules'=>'required|min:6|max:16|confirmed'
			])
			->add('Confirmar Senha','password');
	}
}