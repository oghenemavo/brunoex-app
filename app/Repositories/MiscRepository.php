<?php

namespace App\Repositories;

use App\Models\Investment;
use App\Models\User;
use Carbon\Carbon;

class MiscRepository 
{
    public function __construct(
        protected User $user,
    ) {
    }

    public function fetchUser()
    {
        $userCollection = $this->user->query()->orderBy('id', 'DESC')->get();
        $users = $userCollection->map(function ($item, $key) {
            $data['id'] = $item->id;
            $data['uuid'] = $item->uuid;
            $data['initials'] = strtoupper(substr($item->name, 0,2));
            $data['name'] = $item->name;
            $data['email'] = $item->email;
            $data['balance'] = $item->wallet->balance;
            $data['status'] = $item->status;
            $data['kyc'] = $item->kyc;
            $data['phone'] = $item->kyc->get('phone');
            $data['gender'] = $item->kyc->get('gender');
            $data['dob'] = $item->kyc->get('dob');
            $data['address'] = $item->kyc->get('address');
            $data['address_two'] = $item->kyc->get('address_two');
            $data['city'] = $item->kyc->get('city');
            $data['state'] = $item->kyc->get('state');
            $data['zip'] = $item->kyc->get('zip');
            $data['nation'] = $item->kyc->get('nation');
            $data['country'] = $item->kyc->get('country');
            $data['created_at'] = $item->created_at;
            $data['last_login_at'] = $item->last_login_at;

            return $data;
        });

        return $users;
    }

    public function fetchUserInvestments($userId)
    {
        $investmentCollection = Investment::query()->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $investments = $investmentCollection->map(function($item, $key) {
            $data['id'] = $item->id;
            $data['transaction'] = $item->transaction->uuid;
            $data['amount'] = $item->amount;
            $data['plan'] = $item->plan->get('name');
            $data['profit'] = $item->profit;
            $data['details'] = $item->plan;
            $data['status'] = $item->status;
            $data['created_at'] = $item->created_at;
            $data['due_at'] = $item->due_at;

            return $data;
        });

        return $investments;
    }



}
