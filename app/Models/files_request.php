<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'department', 'extension', 'name', 'size',
        'relative_time'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('department', 'like', '%' . request('search') . '%')
                ->orWhere('name', 'like', '%' . request('search') . '%')
                ->orWhere('extension', 'like', '%' . request('search') . '%');
                
        } else if ($filters['search2'] ?? false) {
            dd($filters[1]);

        } else if ($filters[0] ?? false) {
            $query->where('department', 'like', '%' . $filters[0] . '%')
                ->orWhere('name', 'like', '%' . $filters[0] . '%');

        }
    }
}
