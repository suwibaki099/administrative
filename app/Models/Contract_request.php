<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'department', 'content', 'name',
        'timestamp', 'contract_name', 'status'
    ];
}
