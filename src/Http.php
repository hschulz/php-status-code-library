<?php

namespace hschulz\StatusCodes;

use function \array_key_exists;
use function \array_search;

/**
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
 */
class Http
{

    // <editor-fold defaultstate="collapsed" desc="Class constants">

    /**
     * 100: Continue
     * @var int
     */
    const CONTINUE = 100;

    /**
     * 101 Switching Protocols
     * @var int
     */
    const SWITCHING_PROTOCOLS = 101;

    /**
     * 102 Processing
     * @var int
     */
    const PROCESSING = 102;

    /**
     * 103 Early Hints
     * @var int
     */
    const EARLY_HINTS = 103;

    /**
     * 200 Ok
     * @var int
     */
    const OK = 200;

    /**
     * 201 Created
     * @var int
     */
    const CREATED = 201;

    /**
     * 202 Accepted
     * @var int
     */
    const ACCEPTED = 202;

    /**
     * 203 Non Authoritative Information
     * @var int
     */
    const NON_AUTHORITATIVE_INFORMATION = 203;

    /**
     * 204 No Content
     * @var int
     */
    const NO_CONTENT = 204;

    /**
     * 205 Reset Content
     * @var int
     */
    const RESET_CONTENT = 205;

    /**
     * 206 Partial Content
     * @var int
     */
    const PARTIAL_CONTENT = 206;

    /**
     * @var int
     */
    const MULTI_STATUS = 207;

    /**
     * @var int
     */
    const ALREADY_REPORTED = 208;

    /**
     * 210 Content Different
     * @var int
     */
    const CONTENT_DIFFERENT = 210;

    /**
     * @var int
     */
    const IM_USED = 226;

    /**
     * 300 Multiple Choices
     * @var int
     */
    const MULTIPLE_CHOICES = 300;

    /**
     * 301 Moved Permanently
     * @var int
     */
    const MOVED_PERMANENTLY = 301;

    /**
     * 302 Found
     * @var int
     */
    const FOUND = 302;

    /**
     * 303 See Other
     * @var int
     */
    const SEE_OTHER = 303;

    /**
     * 304 Not Modified
     * @var int
     */
    const NOT_MODIFIED = 304;

    /**
     * 305 Use Proxy
     * @var int
     */
    const USE_PROXY = 305;

    /**
     * @var int
     */
    const SWITCH_PROXY = 306;

    /**
     * 307 Temporary Redirect
     * @var int
     */
    const TEMPORARY_REDIRECT = 307;

    /**
     * @var int
     */
    const PERMANENT_REDIRECT = 308;

    /**
     * 400 Bad Request
     * @var int
     */
    const BAD_REQUEST = 400;

    /**
     * 401 Unauthorized
     * @var int
     */
    const UNAUTHORIZED = 401;

    /**
     * 402 Payment Required
     * @var int
     */
    const PAYMENT_REQUIRED = 402;

    /**
     * 403 Forbidden
     * @var int
     */
    const FORBIDDEN = 403;

    /**
     * 404 Not Found
     * @var int
     */
    const NOT_FOUND = 404;

    /**
     * 405 Method Not Allowed
     * @var int
     */
    const METHOD_NOT_ALLOWED = 405;

    /**
     * 406 Not Acceptable
     * @var int
     */
    const NOT_ACCEPTABLE = 406;

    /**
     * 407 Proxy Authentication Required
     * @var int
     */
    const PROXY_AUTHENTICATION_REQUIRED = 407;

    /**
     * 408 Request Timeout
     * @var int
     */
    const REQUEST_TIMEOUT = 408;

    /**
     * 409 Conflict
     * @var int
     */
    const CONFLICT = 409;

    /**
     * 410 Gone
     * @var int
     */
    const GONE = 410;

    /**
     * 411 Length Required
     * @var int
     */
    const LENGTH_REQUIRED = 411;

    /**
     * 412 Precondition Failed
     * @var int
     */
    const PRECONDITION_FAILED = 412;

    /**
     * 413 Request Entity Too Large
     * @var int
     */
    const REQUEST_ENTITY_TOO_LARGE = 413;

    /**
     * 414 Request URI Too Long
     * @var int
     */
    const REQUEST_URI_TOO_LONG = 414;

    /**
     * 415 Unsupported Media Type
     * @var int
     */
    const UNSUPPORTED_MEDIA_TYPE = 415;

    /**
     * 416 Requested Range Not Satisfiable
     * @var int
     */
    const REQUESTED_RANGE_NOT_SATISFIABLE = 416;

    /**
     * 417 Expectation Failed
     * @var int
     */
    const EXPECTATION_FAILED = 417;

    /**
     * 418 I'm a Teapot
     * @var int
     */
    const IM_A_TEAPOT = 418;

    /**
     * @var int
     */
    const MISDIRECTED_REQUEST = 421;

    /**
     * 422 Unprocessable Entity
     * @var int
     */
    const UNPROCESSABLE_ENTITY = 422;

    /**
     * 423 Locked
     * @var int
     */
    const LOCKED = 423;

    /**
     * 424 Failed Dependency
     * @var int
     */
    const FAILED_DEPENDENCY = 424;

    /**
     * 425 Unordered Collection
     * @var int
     */
    const UNORDERED_COLLECTION = 425;

    /**
     * @var int
     */
    const UPGRADE_REQUIRED = 426;

    /**
     * @var int
     */
    const PRECONDITION_REQUIRED = 428;

    /**
     * @var int
     */
    const TOO_MANY_REQUESTS = 429;

    /**
     * @var int
     */
    const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

    /**
     * @var int
     */
    const UNAVAILABLE_FOR_LEGAL_REASONS = 451;

    /**
     * 475 Invalid Collblob
     * @var int
     */
    const INVALID_COLLBLOB = 475;

    /**
     * 500 Internal Server Error
     * @var int
     */
    const INTERNAL_SERVER_ERROR = 500;

    /**
     * 501 Not Implemented
     * @var int
     */
    const NOT_IMPLEMENTED = 501;

    /**
     * 502 Bad Gateway
     * @var int
     */
    const BAD_GATEWAY = 502;

    /**
     * 503 Service Unavailable
     * @var int
     */
    const SERVICE_UNAVAILABLE = 503;

    /**
     * 504 Gateway Timeout
     * @var int
     */
    const GATEWAY_TIMEOUT = 504;

    /**
     * 505 HTTP Version Not Supported
     * @var int
     */
    const VERSION_NOT_SUPPORTED = 505;

    /**
     * Contains all HTTP/1.1 status codes with a description.
     * @var array
     */
    const CODE_DESCRIPTION = [
        self::CONTINUE => 'Continue',
        self::SWITCHING_PROTOCOLS => 'Switching Protocols',
        self::OK => 'OK',
        self::CREATED => 'Created',
        self::ACCEPTED => 'Accepted',
        self::NON_AUTHORITATIVE_INFORMATION => 'Non-Authoritative Information',
        self::NO_CONTENT => 'No Content',
        self::RESET_CONTENT => 'Reset Content',
        self::PARTIAL_CONTENT => 'Partial Content',
        self::MULTIPLE_CHOICES => 'Multiple Choices',
        self::MOVED_PERMANENTLY => 'Moved Permanently',
        self::FOUND => 'Found',
        self::SEE_OTHER => 'See Other',
        self::NOT_MODIFIED => 'Not Modified',
        self::USE_PROXY => 'Use Proxy',
        self::TEMPORARY_REDIRECT => 'Temporary Redirect',
        self::BAD_REQUEST => 'Bad Request',
        self::UNAUTHORIZED => 'Unauthorized',
        self::PAYMENT_REQUIRED => 'Payment Required',
        self::FORBIDDEN => 'Forbidden',
        self::NOT_FOUND => 'Not Found',
        self::METHOD_NOT_ALLOWED => 'Method Not Allowed',
        self::NOT_ACCEPTABLE => 'Not Acceptable',
        self::PROXY_AUTHENTICATION_REQUIRED => 'Proxy Authentication Required',
        self::REQUEST_TIMEOUT => 'Request Timeout',
        self::CONFLICT => 'Conflict',
        self::GONE => 'Gone',
        self::LENGTH_REQUIRED => 'Length Required',
        self::PRECONDITION_FAILED => 'Precondition Failed',
        self::REQUEST_ENTITY_TOO_LARGE => 'Request Entity Too Large',
        self::REQUEST_URI_TOO_LONG => 'Request-URI Too Long',
        self::UNSUPPORTED_MEDIA_TYPE => 'Unsupported Media Type',
        self::REQUESTED_RANGE_NOT_SATISFIABLE => 'Requested Range Not Satisfiable',
        self::EXPECTATION_FAILED => 'Expectation Failed',
        self::IM_A_TEAPOT => 'I\'m a teapot',
        self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
        self::NOT_IMPLEMENTED => 'Not Implemented',
        self::BAD_GATEWAY => 'Bad Gateway',
        self::SERVICE_UNAVAILABLE => 'Service Unavailable',
        self::GATEWAY_TIMEOUT => 'Gateway Timeout',
        self::VERSION_NOT_SUPPORTED => 'HTTP Version Not Supported'
    ];

    /**
     * Contains all 1xx status codes.
     * @var array
     */
    const INFORMATIONAL = [self::CONTINUE, self::SWITCHING_PROTOCOLS];

    /**
     * Contains all 2xx status codes.
     * @var array
     */
    const SUCCESSFUL = [
        self::OK, self::CREATED, self::ACCEPTED,
        self::NON_AUTHORITATIVE_INFORMATION, self::NO_CONTENT,
        self::RESET_CONTENT, self::PARTIAL_CONTENT
    ];

    /**
     * Contains all 3xx status codes.
     * @var array
     */
    const REDIRECTION = [
        self::MULTIPLE_CHOICES, self::MOVED_PERMANENTLY,
        self::FOUND, self::SEE_OTHER, self::NOT_MODIFIED,
        self::USE_PROXY, self::TEMPORARY_REDIRECT
    ];

    /**
     * Contains all 4xx status codes.
     * @var array
     */
    const CLIENT_ERROR = [
        self::BAD_REQUEST, self::UNAUTHORIZED,
        self::PAYMENT_REQUIRED, self::FORBIDDEN, self::NOT_FOUND,
        self::METHOD_NOT_ALLOWED, self::NOT_ACCEPTABLE,
        self::PROXY_AUTHENTICATION_REQUIRED, self::REQUEST_TIMEOUT,
        self::CONFLICT, self::GONE, self::LENGTH_REQUIRED,
        self::PRECONDITION_FAILED, self::REQUEST_ENTITY_TOO_LARGE,
        self::REQUEST_URI_TOO_LONG, self::UNSUPPORTED_MEDIA_TYPE,
        self::REQUESTED_RANGE_NOT_SATISFIABLE, self::EXPECTATION_FAILED,
        self::IM_A_TEAPOT
    ];

    /**
     * Contains all 5xx status codes.
     * @var array
     */
    const SERVER_ERROR = [
        self::INTERNAL_SERVER_ERROR, self::NOT_IMPLEMENTED,
        self::BAD_GATEWAY, self::SERVICE_UNAVAILABLE,
        self::GATEWAY_TIMEOUT, self::VERSION_NOT_SUPPORTED
    ];

    // </editor-fold>

    /**
     * Checks if the given code is an informational (1xx) code.
     *
     * @param int $code
     * @return bool
     */
    public static function isInformational(int $code): bool
    {
        return array_search($code, self::INFORMATIONAL, true) !== false;
    }

    /**
     * Checks if the given code is a success (2xx) code.
     *
     * @param int $code
     * @return bool
     */
    public static function isSuccessful(int $code): bool
    {
        return array_search($code, self::SUCCESSFUL, true) !== false;
    }

    /**
     * Checks if the given code is a redirection (3xx) code.
     *
     * @param int $code
     * @return bool
     */
    public static function isRedirection(int $code): bool
    {
        return array_search($code, self::REDIRECTION, true) !== false;
    }

    /**
     * Checks if the given code is a user error (4xx) code.
     *
     * @param int $code
     * @return bool
     */
    public static function isClientError(int $code)
    {
        return array_search($code, self::CLIENT_ERROR, true) !== false;
    }

    /**
     * Checks if the given code is an server error (5xx) code.
     *
     * @param int $code
     * @return bool
     */
    public static function isServerError(int $code): bool
    {
        return array_search($code, self::SERVER_ERROR, true) !== false;
    }

    /**
     *
     * @param int $code
     * @return bool
     */
    public static function isValid(int $code): bool
    {
        return array_key_exists($code, self::CODE_DESCRIPTION);
    }
}
