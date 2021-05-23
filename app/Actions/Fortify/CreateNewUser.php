<?php

namespace App\Actions\Fortify;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * 
     */
    public function create(array $input)
    {
        if (isset($input['user_type']) && $input['user_type'] === 'Job Seeker') {

            Validator::make($input, [
                'forename' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
                'bio' => ['string', 'max:255'],
                'street_address_1' => ['string'],
                'street_address_2' => ['string', 'nullable'],
                'city' => ['string'],
                'state' => ['string'],
                'zip' => ['string'],
                'country' => ['string'],
                'password' => $this->passwordRules(),
            ])->validate();
    
            $user = User::create([
                'username' => ucfirst(substr($input['forename'], 0, 2)) . ucfirst($input['surname']) . Str::padLeft(rand(1, 99), 2, '0'),
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
                
            $user->seeker()->create([
                'title' => '',
                'forename' => $input['forename'],
                'middle' => '',
                'surname' => $input['surname'],
                'bio' => $input['bio'],
                'avatar' => '',
                'country' => $input['country'],
                'street' => $input['street_address_1'],
                'city' => $input['city'],
                'state' => $input['state'],
                'zip' => $input['zip'],
            ]);
    
            return $user;
        };

        if (isset($input['user_type']) && $input['user_type'] === 'Recruiter') {

            Validator::make($input, [
                'forename' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
                'bio' => ['string', 'max:255'],
                'company_name' => ['string'],
                'company_registered_name' => ['string'],
                'street_address_1' => ['string'],
                'street_address_2' => ['string', 'nullable'],
                'city' => ['string'],
                'state' => ['string'],
                'zip' => ['string'],
                'country' => ['string'],
                'company_email' => ['string', 'email'],
                'company_phone' => ['string'],
                'company_url' => ['string'],
                'password' => $this->passwordRules(),
            ])->validate();
    
            $user = User::create([
                'username' => ucfirst(substr($input['forename'], 0, 2)) . ucfirst($input['surname']) . Str::padLeft(rand(1, 99), 2, '0'),
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            $company = Company::create([
                'name' => $input['company_name'],
                'name_registered' => $input['company_registered_name'],
                'address_1' => $input['street_address_1'],
                'address_2' => $input['street_address_2'],
                'city' => $input['city'],
                'region' => $input['state'],
                'country' => $input['country'],
                'postcode' => $input['zip'],
                'email' => $input['company_email'],
                'phone' => $input['company_phone'],
                'url' => $input['company_url'],
                'logo' => '',
            ]);

            $user->recruiter()->create([
                'title' => '',
                'forename' => $input['forename'],
                'middle' => '',
                'surname' => $input['surname'],
                'bio' => $input['bio'],
                'avatar' => '',
                'company_id' => $company->id,
            ]);

            return $user;
        };
    }
}