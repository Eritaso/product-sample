<?php

namespace Packages\Domain\Models;

enum HolidayType: int
{
    case MONDAY = 0;
    case TUESDAY = 1;
    case WEDNESDAY = 2;
    case THURSDAY = 3;
    case FRIDAY = 4;
    case SATURDAY = 5;
    case SUNDAY = 6;

    public function label(): string
    {
        return match($this){
            HolidayType::MONDAY => '月',
            HolidayType::TUESDAY => '火',
            HolidayType::WEDNESDAY => '水',
            HolidayType::THURSDAY => '木',
            HolidayType::FRIDAY => '金',
            HolidayType::SATURDAY => '土',
            HolidayType::SUNDAY => '日',
        };
    }
}
