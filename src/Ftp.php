<?php

namespace hschulz\StatusCodes;

use function \array_key_exists;

/**
 *
 */
class Ftp
{

    // <editor-fold defaultstate="collapsed" desc="Class constants">

    /**
     * 100
     * @var int
     */
    const REQUESTED_ACTION_BEING_INITIATED = 100;

    /**
     * 110
     * @var int
     */
    const RESTART_MARKER_REPLY = 110;

    /**
     * 120
     * @var int
     */
    const SERVICE_READY_IN_MINUTES = 120;

    /**
     * 125
     * @var int
     */
    const DATA_CONNECTION_ALREADY_OPEN = 125;

    /**
     * 150
     * @var int
     */
    const FILE_STATUS_OK = 150;

    /**
     * 200
     * @var int
     */
    const COMMAND_OK = 200;

    /**
     * 202
     * @var int
     */
    const COMMAND_NOT_IMPLEMENTED_SUPERFLOUS = 202;

    /**
     * 211
     * @var int
     */
    const SYSTEM_STATUS_OR_HELP_REPLY = 211;

    /**
     * 212
     * @var int
     */
    const DIR_STATUS = 212;

    /**
     * 213
     * @var int
     */
    const FILE_STATUS = 213;

    /**
     * 214
     * @var int
     */
    const HELP_MESSAGE = 214;

    /**
     * 215
     * @var int
     */
    const SYSTEM_TYPE = 215;

    /**
     * 220
     * @var int
     */
    const SYSTEM_READY = 220;

    /**
     * 221
     * @var int
     */
    const SERVICE_CLOSING_SYSTEM_CONNECTION = 221;

    /**
     * 225
     * @var int
     */
    const DATA_CONNECTION_OPEN = 225;

    /**
     * 226
     * @var int
     */
    const CLOSING_DATA_CONNECTION = 226;

    /**
     * 227
     * @var int
     */
    const ENTERING_PASSIVE_MODE = 227;

    /**
     * 228
     * @var int
     */
    const ENTERING_LONG_PASSIVE_MODE = 228;

    /**
     * 229
     * @var int
     */
    const ENTERING_EXTENDED_PASSIVE_MODE = 229;

    /**
     * 230
     * @var int
     */
    const USER_LOGGED_IN = 230;

    /**
     * 231
     * @var int
     */
    const USER_LOGGED_OUT = 231;

    /**
     * 232
     * @var int
     */
    const LOGOUT_COMMAND_NOTED = 232;

    /**
     * 250
     * @var int
     */
    const REQUESTED_FILE_ACTION_OK = 250;

    /**
     * 257
     * @var int
     */
    const PATHNAME_CREATED = 257;

    /**
     * 331
     * @var int
     */
    const USERNAME_OK_NEED_PASSWORD = 331;

    /**
     * 332
     * @var int
     */
    const NEED_ACCOUNT_FOR_LOGIN = 332;

    /**
     * 350
     * @var int
     */
    const REQUESTED_FILE_ACTION_PENDING = 350;

    /**
     * 421
     * @var int
     */
    const SERVICE_NOT_AVAILABLE = 421;

    /**
     * 425
     * @var int
     */
    const CANT_OPEN_DATA_CONNECTION = 425;

    /**
     * 426
     * @var int
     */
    const CONNECTION_CLOSED = 426;

    /**
     * 430
     * @var int
     */
    const INVALID_USERNAME_OR_PASSWORD = 430;

    /**
     * 434
     * @var int
     */
    const REQUESTED_HOST_UNAVAILABLE = 434;

    /**
     * 450
     * @var int
     */
    const REQUESTED_FILE_ACTION_NOT_TAKEN = 450;

    /**
     * 451
     * @var int
     */
    const REQUESTED_ACTION_ABORTED_LOCAL_ERROR = 451;

    /**
     * 452
     * @var int
     */
    const REQUESTED_ACTION_NOT_TAKEN_NOT_ENOUGH_SPACE = 452;

    /**
     * 500
     * @var int
     */
    const SYNTAX_ERROR = 500;

    /**
     * 501
     * @var int
     */
    const SYNTAX_ERROR_IN_PARAMETERS = 501;

    /**
     * 502
     * @var int
     */
    const COMMAND_NOT_IMPLEMENTED = 502;

    /**
     * 503
     * @var int
     */
    const BAD_SEQUENCE_OF_COMMANDS = 503;

    /**
     * 504
     * @var int
     */
    const COMMAND_NOT_IMPLEMENTED_FOR_PARAMETER = 504;

    /**
     * 530
     * @var int
     */
    const NOT_LOGGED_IN = 530;

    /**
     * 532
     * @var int
     */
    const NEED_ACCOUNT_FOR_STORING_FILES = 532;

    /**
     * 550
     * @var int
     */
    const REQUESTED_ACTION_NOT_TAKEN_FILE_UNAVAILABLE = 550;

    /**
     * 551
     * @var int
     */
    const REQUESTED_ACTION_ABORTED_PAGE_TYPE_UNKNOWN = 551;

    /**
     * 552
     * @var int
     */
    const REQUESTED_FILE_ACTION_ABORTED = 552;

    /**
     * 553
     * @var int
     */
    const REQUESTED_ACTION_NOT_TAKEN_FILENAME_NOT_ALLOWED = 553;

    /**
     * 631
     * @var int
     */
    const INTEGRITY_PROTECTED_REPLY = 631;

    /**
     * 632
     * @var int
     */
    const CONFIDENTIALITY_AND_INTEGRITY_PROTECTED_REPLY = 632;

    /**
     * 633
     * @var int
     */
    const CONFIDENTIALITY_PROTECTED_REPLY = 633;

    /**
     *
     * @var array
     */
    const CODE_DESCRIPTION = [
        self::REQUESTED_ACTION_BEING_INITIATED => 'Series: The requested action is being initiated, expect another reply before proceeding with a new command.',
        self::RESTART_MARKER_REPLY => 'Restart marker replay . In this case, the text is exact and not left to the particular implementation; it must read: MARK yyyy = mmmm where yyyy is User-process data stream marker, and mmmm server\'s equivalent marker (note the spaces between markers and "=").',
        self::SERVICE_READY_IN_MINUTES => 'Service ready in nnn minutes.',
        self::DATA_CONNECTION_ALREADY_OPEN => 'Data connection already open; transfer starting.',
        self::FILE_STATUS_OK => 'File status okay; about to open data connection.',
        self::COMMAND_OK => 'Command okay.',
        self::COMMAND_NOT_IMPLEMENTED_SUPERFLOUS => 'Command not implemented, superfluous at this site.',
        self::SYSTEM_STATUS_OR_HELP_REPLY => 'System status, or system help reply.',
        self::DIR_STATUS => 'Directory status.',
        self::FILE_STATUS => 'File status.',
        self::HELP_MESSAGE => 'Help message.On how to use the server or the meaning of a particular non-standard command. This reply is useful only to the human user.',
        self::SYSTEM_TYPE => 'NAME system type. Where NAME is an official system name from the registry kept by IANA.',
        self::SYSTEM_READY => 'Service ready for new user.',
        self::SERVICE_CLOSING_SYSTEM_CONNECTION => 'Service closing control connection.',
        self::DATA_CONNECTION_OPEN => 'Data connection open; no transfer in progress.',
        self::CLOSING_DATA_CONNECTION => 'Closing data connection. Requested file action successful (for example, file transfer or file abort).',
        self::ENTERING_PASSIVE_MODE => 'Entering Passive Mode (h1,h2,h3,h4,p1,p2).',
        self::ENTERING_LONG_PASSIVE_MODE => 'Entering Long Passive Mode (long address, port).',
        self::ENTERING_EXTENDED_PASSIVE_MODE => 'Entering Extended Passive Mode (|||port|).',
        self::USER_LOGGED_IN => 'User logged in, proceed. Logged out if appropriate.',
        self::USER_LOGGED_OUT => 'User logged out; service terminated.',
        self::LOGOUT_COMMAND_NOTED => 'Logout command noted, will complete when transfer done.',
        self::REQUESTED_FILE_ACTION_OK => 'Requested file action okay, completed.',
        self::PATHNAME_CREATED => '"PATHNAME" created.',
        self::USERNAME_OK_NEED_PASSWORD => 'User name okay, need password.',
        self::NEED_ACCOUNT_FOR_LOGIN => 'Need account for login.',
        self::REQUESTED_FILE_ACTION_PENDING => 'Requested file action pending further information',
        self::SERVICE_NOT_AVAILABLE => 'Service not available, closing control connection. This may be a reply to any command if the service knows it must shut down.',
        self::CANT_OPEN_DATA_CONNECTION => 'Can\'t open data connection.',
        self::CONNECTION_CLOSED => 'Connection closed; transfer aborted.',
        self::INVALID_USERNAME_OR_PASSWORD => 'Invalid username or password',
        self::REQUESTED_HOST_UNAVAILABLE => 'Requested host unavailable.',
        self::REQUESTED_FILE_ACTION_NOT_TAKEN => 'Requested file action not taken.',
        self::REQUESTED_ACTION_ABORTED_LOCAL_ERROR => 'Requested action aborted. Local error in processing.',
        self::REQUESTED_ACTION_NOT_TAKEN_NOT_ENOUGH_SPACE => 'Requested action not taken. Insufficient storage space in system.File unavailable (e.g., file busy).',
        self::SYNTAX_ERROR => 'Syntax error, command unrecognized. This may include errors such as command line too long.',
        self::SYNTAX_ERROR_IN_PARAMETERS => 'Syntax error in parameters or arguments.',
        self::COMMAND_NOT_IMPLEMENTED => 'Command not implemented.',
        self::BAD_SEQUENCE_OF_COMMANDS => 'Bad sequence of commands.',
        self::COMMAND_NOT_IMPLEMENTED_FOR_PARAMETER => 'Command not implemented for that parameter.',
        self::NOT_LOGGED_IN => 'Not logged in.',
        self::NEED_ACCOUNT_FOR_STORING_FILES => 'Need account for storing files.',
        self::REQUESTED_ACTION_NOT_TAKEN_FILE_UNAVAILABLE => 'Requested action not taken. File unavailable (e.g., file not found, no access).',
        self::REQUESTED_ACTION_ABORTED_PAGE_TYPE_UNKNOWN => 'Requested action aborted. Page type unknown.',
        self::REQUESTED_FILE_ACTION_ABORTED => 'Requested file action aborted. Exceeded storage allocation (for current directory or dataset).',
        self::REQUESTED_ACTION_NOT_TAKEN_FILENAME_NOT_ALLOWED => 'Requested action not taken. File name not allowed.',
        self::INTEGRITY_PROTECTED_REPLY => 'Integrity protected reply.',
        self::CONFIDENTIALITY_AND_INTEGRITY_PROTECTED_REPLY => 'Confidentiality and integrity protected reply.',
        self::CONFIDENTIALITY_PROTECTED_REPLY => 'Confidentiality protected reply.'
    ];

    // </editor-fold>

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
