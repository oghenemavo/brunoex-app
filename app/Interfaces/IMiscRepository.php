<?php

namespace App\Interfaces;

interface IMiscRepository
{
    public function fetchCountries();
    public function fetchUser();
    public function fetchUserInvestments($userId);
}
