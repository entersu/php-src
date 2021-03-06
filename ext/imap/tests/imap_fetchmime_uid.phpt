--TEST--
imap_fetchmime() passing a unique ID
--SKIPIF--
<?php
require_once(__DIR__.'/setup/skipif.inc');
?>
--FILE--
<?php

require_once(__DIR__.'/setup/imap_include.inc');

$imap_mail_box = setup_test_mailbox_for_uid_tests("imapfetchmimeuid", $msg_no, $uid);

$section = '2';
var_dump(imap_fetchbody($imap_mail_box, $uid, $section, FT_UID) === imap_fetchbody($imap_mail_box, $msg_no, $section));

imap_close($imap_mail_box);

?>
--CLEAN--
<?php
$mailbox_suffix = 'imapfetchmimeuid';
require_once(__DIR__ . '/setup/clean.inc');
?>
--EXPECT--
Create a temporary mailbox and add 10 msgs
New mailbox created
Delete 4 messages for Unique ID generation
bool(true)
