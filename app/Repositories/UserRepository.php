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
        try {
            DB::beginTransaction();

            $user = $this->user->create([
                'name' => data_get($attributes, 'name'),
                'kyc' => [
                    'phone' => '',
                    'gender' => '',
                    'dob' => '',
                    'address' => '',
                    'address_two' => '',
                    'city' => '',
                    'state' => '',
                    'zip' => '',
                    'country' => '',
                    'nation' => '',
                ],
                'email' => data_get($attributes, 'email'),
                'password' => Hash::make(data_get($attributes, 'password')),
            ]);

            $this->wallet->create([
                'user_id' => $user->id
            ]);

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollBack();
            echo $ex->getMessage();
        }
        return false;
    }

    public function updateUser(array $attributes, User $user)
    {
        return $user->update([
            'first_name' => data_get($attributes, 'first_name', $user->first_name),
            'last_name' => data_get($attributes, 'last_name', $user->last_name),
            'phone_number' => data_get($attributes, 'phone_number', $user->phone_number),
            'address' => data_get($attributes, 'address', $user->address),
            'email' => data_get($user->email, 'email', $user->email),
        ]);
    }
}
