<?php
/**
 * Copy to email_config.php on the server. Never commit email_config.php.
 *
 * Your domain uses Microsoft 365 (MX → *.mail.protection.outlook.com).
 * Use Office 365 SMTP — not GoDaddy thelegendofbalinesedonmu.com:465.
 *
 * Password = Microsoft 365 sign-in for this mailbox, or an App password if MFA is enabled.
 */

return [
    'smtp_host' => 'smtp.office365.com',
    'smtp_port' => 587,
    /** @var 'tls'|'ssl' — M365 uses STARTTLS on 587 */
    'smtp_secure' => 'tls',

    'smtp_username' => 'support@thelegendofbalinesedonmu.com',
    'smtp_password' => 'PASTE_MICROSOFT_365_PASSWORD_OR_APP_PASSWORD',

    'from_email' => 'support@thelegendofbalinesedonmu.com',
    'from_name' => 'The Legend of Balinese — contact form',

    'to_email' => 'obaidkhanpro@gmail.com',

    'bcc_email' => 'support@thelegendofbalinesedonmu.com',
];
