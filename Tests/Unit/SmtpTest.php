<?php

namespace hschulz\StatusCodes\Tests\Unit;

use \PHPUnit\Framework\TestCase;
use \hschulz\StatusCodes\Smtp;
use \TypeError;
use \stdClass;
use function \chr;
use const \PHP_INT_MIN;
use const \PHP_INT_MAX;

final class SmtpTest extends TestCase {

    public function testCanDetermineValid() {

        $this->assertFalse(Smtp::isValid(PHP_INT_MIN));
        $this->assertFalse(Smtp::isValid(0));
        $this->assertTrue(Smtp::isValid(Smtp::MACHINE_DOES_NOT_ACCEPT_MAIL));
        $this->assertFalse(Smtp::isValid(0x10));
        $this->assertFalse(Smtp::isValid(0777));
        $this->assertFalse(Smtp::isValid(1.11));
        $this->assertFalse(Smtp::isValid(PHP_INT_MAX));
    }

    public function testValidOnlyAcceptsInteger() {

        $this->expectException(TypeError::class);

        $this->assertFalse(Smtp::isValid(true));
        $this->assertFalse(Smtp::isValid(false));
        $this->assertFalse(Smtp::isValid('99'));
        $this->assertFalse(Smtp::isValid("\n"));
        $this->assertFalse(Smtp::isValid(chr(1)));
        $this->assertFalse(Smtp::isValid(new stdClass()));
    }
}
