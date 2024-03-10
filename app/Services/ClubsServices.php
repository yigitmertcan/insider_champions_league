<?php

namespace App\Services;

class ClubsServices
{
    public static function getClubs()
    {
        $clubs = [
            "Real Madrid",
            "Barcelona",
            "Atletico Madrid",
            "Real Sociedad"
        ];
        return $clubs;
    }
}
