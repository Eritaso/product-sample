<?php

namespace Packages\Domain\Models;

enum SexType: int
{
    case MAN = 0;
    case WOMAN = 1;

    public function label(): string
    {
        return match($this){
            SexType::MAN => '男',
            SexType::WOMAN => '女',
        };
    }
}
