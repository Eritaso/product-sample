<?php

namespace Packages\Domain\Models;

use Illuminate\Support\Collection;

class Profile
{
    private function __construct(
        public readonly null|int $id,
        private string $name,
        private SexType $sexType,
        private string $tel,
        private Collection $holidays,
        private null|string $comment,
    ) {
    }

    public static function create(string $name, SexType $sexType, string $tel, Collection $holidays, null|string $comment): Profile
    {
        return new Profile(null, $name, $sexType, $tel, $holidays, $comment);
    }

    public static function recreate(int $id, string $name, SexType $sexType, string $tel, Collection $holidays, null|string $comment): Profile
    {
        return new Profile($id, $name, $sexType, $tel, $holidays, $comment);
    }

    public function update(string $name, SexType $sexType, string $tel, Collection $holidays, null|string $comment)
    {
        $this->name = $name;
        $this->sexType = $sexType;
        $this->tel = $tel;
        $this->holidays = $holidays->map(fn($holiday) => new Holiday(HolidayType::from($holiday)));
        $this->comment = $comment;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSexType()
    {
        return $this->sexType;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getHolidays()
    {
        return $this->holidays;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
