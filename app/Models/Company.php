<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'website', 'logo', 'email'];
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($employee) {
            $employee->services()->delete();
        });
    }

    public function services()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
