<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->user_type === 'candidate') {
            $request->validate([
                'forename' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'bio' => 'string',
                'address_1' => 'required|string|max:255',
                'address_2' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postcode' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            $user = User::create([
                'username' => substr($request->forename, 0, 2) . substr($request->surname, 0, 3),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);            

            DB::table('candidates')->insert([
                'forename' => $request->forename,
                'surname' => $request->surname,
                'bio' => $request->bio,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'country' => $request->country,
                'user_id' => $user->id,
            ]);
        }

        if ($request->user_type === 'recruiter') {
            $request->validate([
                'forename' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'bio' => 'string',
                'company_name' => 'required|string|max:255',
                'company_registered_name' => 'required|string|max:255',
                'company_email' => 'required|string|max:255',
                'company_phone' => 'required|string|max:255',
                'company_url' => 'required|string|max:255',
                'address_1' => 'required|string|max:255',
                'address_2' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postcode' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            $user = User::create([
                'username' => substr($request->forename, 0, 2) . substr($request->surname, 0, 3),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);    
            
            $companyId = DB::table('companies')->insertGetId([
                'name' => $request->company_name,
                'registered_name' => $request->company_registered_name,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'region' => $request->state,
                'country' => $request->country, 
                'postcode' => $request->postcode,
                'phone' => $request->company_phone,
                'url' => $request->company_url,
                'email' => $request->company_email,
            ]);

            DB::table('recruiters')->insert([
                'forename' => $request->forename,
                'surname' => $request->surname,
                'bio' => $request->bio,
                'company_id' => $companyId,
                'user_id' => $user->id,
            ]);
        }
    
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
