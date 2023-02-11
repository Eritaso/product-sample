<?php

namespace Tests\Unit\Packages\Domain\Models;

use Packages\Domain\Models\SexType;
use PHPUnit\Framework\TestCase;

class SexTypeTest extends TestCase
{
    public function testCreate()
    {
        $this->assertEquals('男', SexType::MAN->label());
        $this->assertEquals('女', SexType::WOMAN->label());
    }
}
