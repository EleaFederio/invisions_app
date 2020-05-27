<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected  $fillable = [
        'first_name', 'last_name', 'middle_name', 'fb_name', 'phone_number', 'company_name',
        'province', 'town', 'barangay', 'location_details'
    ];
}
