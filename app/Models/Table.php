<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $dates = ['deleted_at'];

    public function System()
    {
        return $this->belongsTo(System::class);
    }
}
