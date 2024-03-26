<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files_request extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('department', 'like', '%' . request('search') . '%')
                ->orWhere('name', 'like', '%' . request('search') . '%')
                ->orWhere('extension', 'like', '%' . request('search') . '%');
        }
    }
}
