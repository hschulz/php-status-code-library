<?php

namespace hschulz\StatusCodes;

use function array_key_exists;

/**
 *
 */
class Smtp
{
    // <editor-fold defaultstate="collapsed" desc="Class constants">

    /**
     * 211
     * @var int
     */
    public const SYSTEM_STATUS_OR_HELP_REPLY = 211;

    /**
     * 214
     * @var int
     */
    public const HELP_MESSAGE = 214;

    /**
     * 220
     * @var int
     */
    public const DOMAIN_SERVICE_READY = 220;

    /**
     * 221
     * @var int
     */
    public const DOMAIN_SERVICE_CLOSING = 221;

    /**
     * 250
     * @var int
     */
    public const OK_QUEUING_FOR_NODE = 250;

    /**
     * 251
     * @var int
     */
    public const OK_NO_MESSAGES_WAITING = 251;

    /**
     * 252
     * @var int
     */
    public const OK_PENDING_MESSAGES_FOR_NODE = 252;

    /**
     * 253
     * @var int
     */
    public const OK_MESSAGES_PENDING = 253;

    /**
     * 354
     * @var int
     */
    public const START_MAIL_INPUT = 354;

    /**
     * 355
     * @var int
     */
    public const OCTET_OFFSET_IS_TRANSACTION_OFFSET = 355;

    /**
     * 421
     * @var int
     */
    public const DOMAIN_SERVICE_NOT_AVAILABLE = 421;

    /**
     * 432
     * @var int
     */
    public const PASSWORD_TRANSITION_NEEDED = 432;

    /**
     * 452
     * @var int
     */
    public const REQUESTED_MAIL_ACTION_NOT_TAKEN = 452;

    /**
     * 453
     * @var int
     */
    public const YOU_HAVE_NO_MAIL = 453;

    /**
     * 454
     * @var int
     */
    public const TLS_NOT_AVAILABLE = 454;

    /**
     * 458
     * @var int
     */
    public const UNABLE_TO_QUEUE_MESSAGES = 458;

    /**
     * 459
     * @var int
     */
    public const NODE_NOT_ALLOWED = 459;

    /**
     * 500
     * @var int
     */
    public const COMMAND_NOT_RECOGNIZED = 500;

    /**
     * 501
     * @var int
     */
    public const SYNTAX_ERROR = 501;

    /**
     * 502
     * @var int
     */
    public const COMMAND_NOT_IMPLEMENTED = 502;

    /**
     * 503
     * @var int
     */
    public const BAD_SEQUENCE_OF_COMMANDS = 503;

    /**
     * 504
     * @var int
     */
    public const COMMAND_PARAMETER_NOT_IMPLEMENTED = 504;

    /**
     * 521
     * @var int
     */
    public const MACHINE_DOES_NOT_ACCEPT_MAIL = 521;

    /**
     * 530
     * @var int
     */
    public const MUST_ISSUE_STARTTLS_FIRST = 530;

    /**
     * 534
     * @var int
     */
    public const AUTHENTICATION_TOO_WEAK = 534;

    /**
     * 538
     * @var int
     */
    public const ENCRYPTION_REQUIRED = 538;

    /**
     * 550
     * @var int
     */
    public const MAILBOX_UNAVAILABLE = 550;

    /**
     * 551
     * @var int
     */
    public const USER_NOT_LOCAL = 551;

    /**
     * 552
     * @var int
     */
    public const REQUESTED_MAIL_ACTION_ABORTED = 552;

    /**
     * 553
     * @var int
     */
    public const MAILBOX_NAME_NOT_ALLOWED = 553;

    /**
     * 554
     * @var int
     */
    public const TRANSACTION_FAILED = 554;

    /**
     *
     * @var array
     */
    public const CODE_DESCRIPTION = [
        self::SYSTEM_STATUS_OR_HELP_REPLY => 'System status, or system help reply.',
        self::HELP_MESSAGE => 'Help message.',
        self::DOMAIN_SERVICE_READY => 'Domain service ready. Ready to start TLS.',
        self::DOMAIN_SERVICE_CLOSING => 'Domain service closing transmission channel.',
        self::OK_QUEUING_FOR_NODE => 'OK, queuing for node node started. Requested mail action okay, completed.',
        self::OK_NO_MESSAGES_WAITING => 'OK, no messages waiting for node node. User not local, will forward to forwardpath.',
        self::OK_PENDING_MESSAGES_FOR_NODE => 'OK, pending messages for node node started. Cannot VRFY user (e.g., info is not local), but will take message for this user and attempt delivery.',
        self::OK_MESSAGES_PENDING => 'OK, messages pending messages for node node started.',
        self::START_MAIL_INPUT => 'Start mail input; end with <CRLF>.<CRLF>.',
        self::OCTET_OFFSET_IS_TRANSACTION_OFFSET => 'Octet-offset is the transaction offset.',
        self::DOMAIN_SERVICE_NOT_AVAILABLE => 'Domain service not available, closing transmission channel.',
        self::PASSWORD_TRANSITION_NEEDED => 'A password transition is needed.',
        450 => 'Requested mail action not taken: mailbox unavailable. ATRN request refused.',
        451 => 'Requested action aborted: local error in processing. Unable to process ATRN request now.',
        self::REQUESTED_MAIL_ACTION_NOT_TAKEN => 'Requested action not taken: insufficient system storage.',
        self::YOU_HAVE_NO_MAIL => 'You have no mail.',
        self::TLS_NOT_AVAILABLE => 'TLS not available due to temporary reason. Encryption required for requested authentication mechanism.',
        self::UNABLE_TO_QUEUE_MESSAGES => 'Unable to queue messages for node node.',
        self::NODE_NOT_ALLOWED => 'Node node not allowed: reason.',
        self::COMMAND_NOT_RECOGNIZED => 'Command not recognized: command. Syntax error.',
        self::SYNTAX_ERROR => 'Syntax error, no parameters allowed.',
        self::COMMAND_NOT_IMPLEMENTED => 'Command not implemented.',
        self::BAD_SEQUENCE_OF_COMMANDS => 'Bad sequence of commands.',
        self::COMMAND_PARAMETER_NOT_IMPLEMENTED => 'Command parameter not implemented.',
        self::MACHINE_DOES_NOT_ACCEPT_MAIL => 'Machine does not accept mail.',
        self::MUST_ISSUE_STARTTLS_FIRST => 'Must issue a STARTTLS command first. Encryption required for requested authentication mechanism.',
        534 => 'Authentication mechanism is too weak.',
        self::ENCRYPTION_REQUIRED => 'Encryption required for requested authentication mechanism.',
        self::MAILBOX_UNAVAILABLE => 'Requested action not taken: mailbox unavailable.',
        self::USER_NOT_LOCAL => 'User not local; please try forwardpath.',
        self::REQUESTED_MAIL_ACTION_ABORTED => 'Requested mail action aborted: exceeded storage allocation.',
        self::MAILBOX_NAME_NOT_ALLOWED => 'Requested action not taken: mailbox name not allowed.',
        self::TRANSACTION_FAILED => 'Transaction failed.'
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
