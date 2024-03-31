<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'department', 'reason', 'name',
        'timestamp', 'document_name', 'status'
    ];
}
