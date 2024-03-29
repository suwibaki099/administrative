<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'address',
        'phone_number', 'email_address', 'birth_date', 'company',
        'header', 'witness', 'content'
    ];
}
