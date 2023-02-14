<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayEloquent extends Model
{
    use HasFactory;

    protected $table = 'holidays';

    protected $fillable = ['profile_id', 'holiday_type'];
}
