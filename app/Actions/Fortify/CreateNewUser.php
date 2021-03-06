<?php

namespace App\Actions\Fortify;

use App\Mail\UserRegistred;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

        // dd($input);

        Validator::make($input, [

            "name" => ['required_if:account_type,laboratory', 'string',],
            "first_name" => ['exclude_if:account_type,laboratory', 'required', 'string',],
            "last_name" => ['exclude_if:account_type,laboratory', 'required', 'string',],
            "birthdate" => ['exclude_if:account_type,laboratory', 'required', 'date',],
            "birth_place" => ['exclude_if:account_type,laboratory', 'required', 'string',],
            "gender" => ['exclude_if:account_type,laboratory', 'required', 'string', "in:male,female"],
            "address" => ['required', 'string',],
            "city" => ['required', 'string',],
            "zip" => ['required', 'string',],
            "account_type" => ['required', 'string', 'in:patient,doctor,laboratory,admin'] ,
            "country" => ['required', 'string',],
            "speciality_id" => ['required_if:account_type,doctor', 'required_if:account_type,laboratory', 'int', ],

            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        /** @var User $user */
        $user = User::create([
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole($input["account_type"]);

        if ($input["account_type"] == "doctor")
        {
            $doctor = $user->doctor()->create([
                "first_name" => $input["first_name"],
                "last_name" => $input["last_name"],
                "birthdate" => $input["birthdate"],
                "birth_place" => $input["birth_place"],
                "gender" => $input["gender"],
                "address" => $input["address"],
                "city" => $input["city"],
                "zip" => $input["zip"],
                "country" => $input["country"],
                "speciality_id" => $input["speciality_id"],
                "state" => "pending",
                "metas" => [],
            ]);
        }
        elseif ($input["account_type"] == "laboratory")
        {
            $user->laboratory()->create([
                "name" => $input["name"],
                "address" => $input["address"],
                "city" => $input["city"],
                "zip" => $input["zip"],
                "country" => $input["country"],
                "speciality_id" => $input["speciality_id"],
                "state" => "pending",
                "metas" => [],
            ]);
        }
        elseif ($input["account_type"] == "patient")
        {
            $user->patient()->create([
                "first_name" => $input["first_name"],
                "last_name" => $input["last_name"],
                "birthdate" => $input["birthdate"],
                "birth_place" => $input["birth_place"],
                "gender" => $input["gender"],
                "address" => $input["address"],
                "city" => $input["city"],
                "zip" => $input["zip"],
                "country" => $input["country"],
                "metas" => [],
            ]);
        }

        Mail::to($user)->send(new UserRegistred($user));

        return $user;
    }
}
