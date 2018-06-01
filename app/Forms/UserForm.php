<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\User;

class UserForm extends Form
{
	protected function roles(){
		return [
			User::ROLE_ADMIN =>'Administrador',
			User::ROLE_TEACHER =>'Teacher',
			User::ROLE_STUDENT =>'Aluno'
		];
	}

    public function buildForm()
    {
    	$id = $this->getData('id');
        $this
            ->add('name', 'text',[
            	'label' => 'Nome',
	            'rules' => 'required|max:255'
            ])
            ->add('email', 'email',[
	            'label' => 'E-mail',
		        'rules' => "required|max:255|unique:users,email,{$id}"
            ])
	        ->add('type', 'select',[
		        'label'  => 'Tipo de usuário',
		        'choices'=> $this->roles(),
		        'rules' => "required|in:" . implode(',', array_keys($this->roles()))
	        ])
	        ->add('send_mail', 'checkbox',[
		        'label'  => 'Enviar email de boas vindas',
		        'value'  => true,
		        'checked'=> false
        ]);
    }

}
