<?php

namespace hschulz\StatusCodes\Tests\Unit;

use function chr;
use hschulz\StatusCodes\Http;
use const PHP_INT_MAX;
use const PHP_INT_MIN;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypeError;

final class HttpTest extends TestCase
{
    public function testCanDetermineValid()
    {
        $this->assertFalse(Http::isValid(PHP_INT_MIN));
        $this->assertFalse(Http::isValid(0));
        $this->assertTrue(Http::isValid(Http::OK));
        $this->assertFalse(Http::isValid(0x10));
        $this->assertFalse(Http::isValid(0777));
        $this->assertFalse(Http::isValid(1.11));
        $this->assertFalse(Http::isValid(PHP_INT_MAX));
    }

    public function testValidOnlyAcceptsInteger()
    {
        $this->expectException(TypeError::class);

        $this->assertFalse(Http::isValid(true));
        $this->assertFalse(Http::isValid(false));
        $this->assertFalse(Http::isValid('99'));
        $this->assertFalse(Http::isValid("\n"));
        $this->assertFalse(Http::isValid(chr(1)));
        $this->assertFalse(Http::isValid(new stdClass()));
    }

    public function testCanDetermineInformational()
    {
        $this->assertFalse(Http::isInformational(PHP_INT_MIN));
        $this->assertFalse(Http::isInformational(-1));
        $this->assertFalse(Http::isInformational(0));
        $this->assertTrue(Http::isInformational(Http::CONTINUE));
        $this->assertFalse(Http::isInformational(Http::CONTENT_DIFFERENT));
        $this->assertFalse(Http::isInformational(Http::FOUND));
        $this->assertFalse(Http::isInformational(Http::PAYMENT_REQUIRED));
        $this->assertFalse(Http::isInformational(Http::VERSION_NOT_SUPPORTED));
        $this->assertFalse(Http::isInformational(PHP_INT_MAX));
    }

    public function testInformationalOnlyAcceptsInteger()
    {
        $this->expectException(TypeError::class);

        $this->assertFalse(Http::isInformational(true));
        $this->assertFalse(Http::isInformational(false));
        $this->assertFalse(Http::isInformational('99'));
        $this->assertFalse(Http::isInformational("\n"));
        $this->assertFalse(Http::isInformational(chr(1)));
        $this->assertFalse(Http::isInformational(new stdClass()));
    }

    public function testCanDetermineSuccessful()
    {
        $this->assertFalse(Http::isSuccessful(PHP_INT_MIN));
        $this->assertFalse(Http::isSuccessful(-1));
        $this->assertFalse(Http::isSuccessful(0));
        $this->assertFalse(Http::isSuccessful(Http::CONTINUE));
        $this->assertTrue(Http::isSuccessful(Http::CREATED));
        $this->assertFalse(Http::isSuccessful(Http::FOUND));
        $this->assertFalse(Http::isSuccessful(Http::PAYMENT_REQUIRED));
        $this->assertFalse(Http::isSuccessful(Http::VERSION_NOT_SUPPORTED));
        $this->assertFalse(Http::isSuccessful(PHP_INT_MAX));
    }

    public function testSuccessfulOnlyAcceptsInteger()
    {
        $this->expectException(TypeError::class);

        $this->assertFalse(Http::isSuccessful(true));
        $this->assertFalse(Http::isSuccessful(false));
        $this->assertFalse(Http::isSuccessful('99'));
        $this->assertFalse(Http::isSuccessful("\n"));
        $this->assertFalse(Http::isSuccessful(chr(1)));
        $this->assertFalse(Http::isSuccessful(new stdClass()));
    }

    public function testCanDetermineRedirection()
    {
        $this->assertFalse(Http::isRedirection(PHP_INT_MIN));
        $this->assertFalse(Http::isRedirection(-1));
        $this->assertFalse(Http::isRedirection(0));
        $this->assertFalse(Http::isRedirection(Http::CONTINUE));
        $this->assertFalse(Http::isRedirection(Http::CREATED));
        $this->assertTrue(Http::isRedirection(Http::TEMPORARY_REDIRECT));
        $this->assertFalse(Http::isRedirection(Http::PAYMENT_REQUIRED));
        $this->assertFalse(Http::isRedirection(Http::VERSION_NOT_SUPPORTED));
        $this->assertFalse(Http::isRedirection(PHP_INT_MAX));
    }

    public function testRedirectionOnlyAcceptsInteger()
    {
        $this->expectException(TypeError::class);

        $this->assertFalse(Http::isRedirection(true));
        $this->assertFalse(Http::isRedirection(false));
        $this->assertFalse(Http::isRedirection('99'));
        $this->assertFalse(Http::isRedirection("\n"));
        $this->assertFalse(Http::isRedirection(chr(1)));
        $this->assertFalse(Http::isRedirection(new stdClass()));
    }

    public function testCanDetermineClientError()
    {
        $this->assertFalse(Http::isClientError(PHP_INT_MIN));
        $this->assertFalse(Http::isClientError(-1));
        $this->assertFalse(Http::isClientError(0));
        $this->assertFalse(Http::isClientError(Http::CONTINUE));
        $this->assertFalse(Http::isClientError(Http::CREATED));
        $this->assertFalse(Http::isClientError(Http::TEMPORARY_REDIRECT));
        $this->assertTrue(Http::isClientError(Http::METHOD_NOT_ALLOWED));
        $this->assertFalse(Http::isClientError(Http::VERSION_NOT_SUPPORTED));
        $this->assertFalse(Http::isClientError(PHP_INT_MAX));
    }

    public function testClientErrorOnlyAcceptsInteger()
    {
        $this->expectException(TypeError::class);

        $this->assertFalse(Http::isClientError(true));
        $this->assertFalse(Http::isClientError(false));
        $this->assertFalse(Http::isClientError('99'));
        $this->assertFalse(Http::isClientError("\n"));
        $this->assertFalse(Http::isClientError(chr(1)));
        $this->assertFalse(Http::isClientError(new stdClass()));
    }

    public function testCanDetermineServerError()
    {
        $this->assertFalse(Http::isServerError(PHP_INT_MIN));
        $this->assertFalse(Http::isServerError(-1));
        $this->assertFalse(Http::isServerError(0));
        $this->assertFalse(Http::isServerError(Http::CONTINUE));
        $this->assertFalse(Http::isServerError(Http::CREATED));
        $this->assertFalse(Http::isServerError(Http::TEMPORARY_REDIRECT));
        $this->assertFalse(Http::isServerError(Http::METHOD_NOT_ALLOWED));
        $this->assertTrue(Http::isServerError(Http::INTERNAL_SERVER_ERROR));
        $this->assertFalse(Http::isServerError(PHP_INT_MAX));
    }

    public function testServerErrorOnlyAcceptsInteger()
    {
        $this->expectException(TypeError::class);

        $this->assertFalse(Http::isServerError(true));
        $this->assertFalse(Http::isServerError(false));
        $this->assertFalse(Http::isServerError('99'));
        $this->assertFalse(Http::isServerError("\n"));
        $this->assertFalse(Http::isServerError(chr(1)));
        $this->assertFalse(Http::isServerError(new stdClass()));
    }
}
