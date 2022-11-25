<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class energy_weight extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'building_id';
    public $incrementing = false;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function section()
    {
        return $this->belongsTo(section::class, 'section_id');
    }
}