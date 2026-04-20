<?php
/**
 * Copy to email_config.php on the server. Never commit email_config.php.
 *
 * --- GoDaddy cPanel mail (no Microsoft 365) ---
 * SMTP: smtpout.secureserver.net, port 465, SSL
 * Username: full address. Password: cPanel → Email Accounts for that mailbox.
 *
 * If 465 fails from your network, try Outgoing = your domain + 465 (as in cPanel "Connect Devices").
 *
 * --- DNS (GoDaddy → Domain → DNS) to receive mail on cPanel ---
 * 1) REMOVE the MX that points to: *.mail.protection.outlook.com (Microsoft).
 * 2) ADD  A record:  Host "mail"  →  your cPanel hosting IP (see cPanel sidebar "Server Information"
 *    or GoDaddy help "website IP in Web Hosting" — use the real server IP, not a CDN-only IP).
 * 3) ADD  MX record:  Host "@"  →  mail.thelegendofbalinesedonmu.com  Priority 0
 * 4) KEEP a single SPF TXT on @ for GoDaddy outbound, e.g.:
 *    v=spf1 include:secureserver.net -all
 *    (If you already have this, leave it; delete duplicate SPF TXT records if two exist.)
 * 5) OPTIONAL cleanup if you fully drop Microsoft email: remove CNAME autodiscover → outlook.com,
 *    and other Microsoft-only records (lyncdiscover, sip, msoid, onmicrosoft TXT, SIP SRV) so
 *    nothing still points clients at Exchange. Webmail will use cPanel "Check Email" / IMAP instead.
 *
 * DNS can take up to 48 hours (often much faster). Then test: send from Gmail to support@…
 */

return [
    'smtp_host' => 'smtpout.secureserver.net',
    'smtp_port' => 465,
    'smtp_secure' => 'ssl',

    'smtp_username' => 'support@thelegendofbalinesedonmu.com',
    'smtp_password' => 'PASTE_CPANEL_EMAIL_PASSWORD_HERE',

    'from_email' => 'support@thelegendofbalinesedonmu.com',
    'from_name' => 'The Legend of Balinese — contact form',

    'to_email' => 'obaidkhanpro@gmail.com',

    'bcc_email' => 'support@thelegendofbalinesedonmu.com',
];
