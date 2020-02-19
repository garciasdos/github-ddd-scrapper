<?php

declare(strict_types=1);

namespace App\Tests\Domain\ValueObject;

use App\Domain\ValueObject\StringValueObject as AbstractStringValueObject;
use PHPUnit\Framework\TestCase;

class StringValueObject extends AbstractStringValueObject {}

final class StringValueObjectTest extends TestCase
{
    public function testFromStringIsSettingTheRightValue(): void
    {
        $stringVO = StringValueObject::fromString('name');
        $this->assertSame('name', $stringVO->value());
    }
}
