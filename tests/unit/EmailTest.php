<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Email;

final class EmailTest extends TestCase
{
    public function testWeCanValidateAnEmailAddress(): void 
    {
        $this->assertFalse(Email::isValidFormat('foobarbaz'));
        $this->assertTrue(Email::isValidFormat('lewis@lcainswebdeveloper.co.uk'));
    }

    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('lewis@lcainswebdeveloper.co.uk')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'lewis@lcainswebdeveloper.co.uk',
            Email::fromString('lewis@lcainswebdeveloper.co.uk', false)
        );
    }
}