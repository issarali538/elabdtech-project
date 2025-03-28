<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_id'];
    protected $hidden = ['password'];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
