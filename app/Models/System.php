<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $dates = ['deleted_at'];

    public function Tables()
    {
        return $this->hasMany(Table::class);
    }
}
