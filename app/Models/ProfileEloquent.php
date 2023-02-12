<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;
use Packages\Domain\Models\Profile;
use Packages\Domain\Models\SexType;

class ProfileEloquent extends Model
{
    use HasFactory;

    protected $table = 'profile';

    #[Pure] public function toDomain(): Profile
    {
        return Profile::recreate($this->id, $this->name, SexType::from($this->sexType), $this->tel, $this->comment);
    }
}
