<?php
/**
 * Copy this file to email_config.php (same folder as send_email.php).
 * Set smtp_password to the real password for support@thelegendofbalinesedonmu.com
 * Never commit email_config.php — it is gitignored.
 *
 * GoDaddy settings (your account):
 *   Outgoing: thelegendofbalinesedonmu.com, SMTP 465, authentication required
 *   Username: full address (support@thelegendofbalinesedonmu.com)
 */

return [
    'smtp_host' => 'thelegendofbalinesedonmu.com',
    'smtp_port' => 465,
    /** @var 'tls'|'ssl' — port 465 uses SSL */
    'smtp_secure' => 'ssl',
    'smtp_username' => 'support@thelegendofbalinesedonmu.com',
    'smtp_password' => '0MBLJHI@~4Me',

    'from_email' => 'support@thelegendofbalinesedonmu.com',
    'from_name' => 'The Legend of Balinese — contact form',

    /** Where contact form messages are delivered */
    'to_email' => 'obaidkhanpro@gmail.com',
];
