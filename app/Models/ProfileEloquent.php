<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Domain\Models\Holiday;
use Packages\Domain\Models\HolidayType;
use Packages\Domain\Models\Profile;
use Packages\Domain\Models\SexType;

class ProfileEloquent extends Model
{
    use HasFactory;

    protected $table = 'profile';

    public function Holidays()
    {
        return $this->hasMany(HolidayEloquent::class, 'profile_id', 'id');
    }

    public function toDomain(): Profile
    {
        return Profile::recreate($this->id, $this->name, SexType::from($this->sexType), $this->tel, $this->holidays->map(fn($holiday)=>new Holiday(HolidayType::from($holiday->holiday_type))), $this->comment);
    }
}
