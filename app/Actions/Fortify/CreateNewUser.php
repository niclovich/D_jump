<?php

namespace App\Actions\Fortify;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        try {
            $user= User::create([
                'name' => $input['name'],
                //'name'=> 'hola',
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'rol' => 'cliente',
            ])->assignRole('cliente');
            $testMailData = [
                'title' => 'Bienvenido ',
                'body' => 'Gracias por formar parte de Djump, Difruta de nuestro sistema y encuentra el mejor precio $$ ',
                'user'=>$user
            ];
            Mail::to($user->email)->send(new SendMail($testMailData));
            return $user;
            } catch (\Throwable $th) {
            return NULL;
        }



    }
}
