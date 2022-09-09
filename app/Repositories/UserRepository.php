<?php

namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    public function __construct(protected User $user, protected Wallet $wallet)
    {
    }

    public function createUser(array $attributes)
    {
        return DB::transaction(function() use($attributes) {
            $user = $this->user->create([
                'name' => data_get($attributes, 'name'),
                'profile' => [
                    'phone' => '',
                    'dob' => '',
                    'address' => '',
                    'address_alt' => '',
                    'city' => '',
                    'state' => '',
                    'zip' => '',
                    'country' => '',
                    'nationality' => '',
                ],
                'kyc' => [
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'phone' => '',
                    'dob' => '',
                    'address' => '',
                    'address_alt' => '',
                    'city' => '',
                    'state' => '',
                    'zip' => '',
                    'nationality' => '',
                    'selfie' => '',
                    'document_type' => '',
                    'document' => '',
                ],
                'kyc_verified' => [
                    'verified_by' => '',
                    'verified_at' => '',
                ],
                'email' => data_get($attributes, 'email'),
                'password' => Hash::make(data_get($attributes, 'password')),
            ]);
    
            $this->wallet->create([
                'user_id' => $user->id
            ]);
            return true;
        });
        return false;
    }

    public function updateUser(array $attributes, User $user)
    {
        $user->name = data_get($attributes, 'name', $user->name);
        $user->kyc->put('phone', data_get($attributes, 'phone', $user->kyc->get('phone')));
        $user->kyc->put('gender', data_get($attributes, 'gender', $user->kyc->get('gender')));
        $user->kyc->put('dob', data_get($attributes, 'dob', $user->kyc->get('dob')));

        return $user->save();
    }

    public function updateKyc(array $attributes, User $user)
    {
        $user->kyc->put('address', data_get($attributes, 'address', $user->kyc->get('address')));
        $user->kyc->put('address_two', data_get($attributes, 'address_two', $user->kyc->get('address_two')));
        $user->kyc->put('city', data_get($attributes, 'city', $user->kyc->get('city')));
        $user->kyc->put('state', data_get($attributes, 'state', $user->kyc->get('state')));
        $user->kyc->put('zip', data_get($attributes, 'zip', $user->kyc->get('zip')));
        $user->kyc->put('country', data_get($attributes, 'country', $user->kyc->get('country')));
        $user->kyc->put('nation', data_get($attributes, 'nation', $user->kyc->get('nation')));

        return $user->save();
    }

    public function setKyc(array $attributes, User $user)
    {
        $user->kyc->put('first_name', data_get($attributes, 'first_name'));
        $user->kyc->put('last_name', data_get($attributes, 'last_name'));
        $user->kyc->put('email', data_get($attributes, 'email'));
        $user->kyc->put('phone', data_get($attributes, 'phone'));
        $user->kyc->put('dob', data_get($attributes, 'dob'));
        $user->kyc->put('address', data_get($attributes, 'address'));
        $user->kyc->put('address_alt', data_get($attributes, 'address_alt'));
        $user->kyc->put('city', data_get($attributes, 'city'));
        $user->kyc->put('state', data_get($attributes, 'state'));
        $user->kyc->put('zip', data_get($attributes, 'zip'));
        $user->kyc->put('nationality', data_get($attributes, 'nationality'));
        $user->kyc->put('selfie', data_get($attributes, 'selfie'));
        $user->kyc->put('document_type', data_get($attributes, 'document_type'));
        $user->kyc->put('document_front', data_get($attributes, 'document_front'));
        $user->kyc->put('document_back', data_get($attributes, 'document_back'));

        return $user->save();
    }
}
