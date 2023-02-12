<?php

namespace Tests\Unit\Packages\Domain\Models;

use Packages\Domain\Models\Profile;
use Packages\Domain\Models\SexType;
use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase
{
    public function testCreate()
    {
        $result = Profile::recreate(1, '太郎', SexType::from(0), 00011112222, null);
        self::assertEquals('太郎', $result->getName());
        self::assertEquals(0, $result->sexType->value);
        self::assertEquals(00011112222, $result->getPhone());
        self::assertEquals(null, $result->getComment());

        $result = Profile::recreate(2, 'コメント確認テスト', SexType::from(1), 00011112222, 'コメントあり');
        self::assertEquals('コメント確認テスト', $result->getName());
        self::assertEquals(1, $result->sexType->value);
        self::assertEquals(00011112222, $result->getPhone());
        self::assertEquals('コメントあり', $result->getComment());
    }
}
