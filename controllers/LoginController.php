<?php

class LoginController extends BaseController {

	public function check(){

        $usuario = ['user'    => Input::get('user'), 
                    'password' => Input::get('password')];

        if (Auth::attempt($usuario))
        {
            return Redirect::intended('inicio');
        }else        
            Session::flash('message', 'El usuario o la contraseña son incorrectos!!');
            Session::flash('class', 'danger');
            return Redirect::to('/');
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }

}
