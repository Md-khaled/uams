<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'active'];

    public function users()
    {
//        return $this->belongsToMany(User::class, 'service_users');
        return $this->belongsToMany(User::class)
            ->using(ServiceUser::class);
    }
}
