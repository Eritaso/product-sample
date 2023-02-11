<?php

namespace Packages\Domain\Models;

use JetBrains\PhpStorm\Pure;

class Profile
{
    private function __construct(
        public readonly null|int $id,
        private string $name,
        public readonly SexType $sex,
        private string $phone,
        private null|string $comment
    ) {
    }

    #[Pure] public static function create(string $name, SexType $sex, string $phone, null|string $comment): Profile
    {
        return new Profile(null, $name, $sex, $phone, $comment);
    }

    #[Pure] public static function recreate(int $id, string $name, SexType $sex, string $phone, null|string $comment): Profile
    {
        return new Profile($id,$name, $sex, $phone, $comment);
    }

    #[Pure] public function getName()
    {
        return $this->name;
    }

    #[Pure] public function getPhone()
    {
        return $this->phone;
    }

    #[Pure] public function getComment()
    {
        return $this->comment;
    }
}
