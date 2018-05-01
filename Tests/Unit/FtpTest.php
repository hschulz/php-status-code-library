<?php

namespace hschulz\StatusCodes\Tests\Unit;

use \PHPUnit\Framework\TestCase;
use \hschulz\StatusCodes\Ftp;
use \TypeError;
use \stdClass;
use function \chr;
use const \PHP_INT_MIN;
use const \PHP_INT_MAX;

final class FtpTest extends TestCase {

    public function testCanDetermineValid() {

        $this->assertFalse(Ftp::isValid(PHP_INT_MIN));
        $this->assertFalse(Ftp::isValid(0));
        $this->assertTrue(Ftp::isValid(Ftp::BAD_SEQUENCE_OF_COMMANDS));
        $this->assertFalse(Ftp::isValid(0x10));
        $this->assertFalse(Ftp::isValid(0777));
        $this->assertFalse(Ftp::isValid(1.11));
        $this->assertFalse(Ftp::isValid(PHP_INT_MAX));
    }

    public function testValidOnlyAcceptsInteger() {

        $this->expectException(TypeError::class);

        $this->assertFalse(Ftp::isValid(true));
        $this->assertFalse(Ftp::isValid(false));
        $this->assertFalse(Ftp::isValid('99'));
        $this->assertFalse(Ftp::isValid("\n"));
        $this->assertFalse(Ftp::isValid(chr(1)));
        $this->assertFalse(Ftp::isValid(new stdClass()));
    }
}
