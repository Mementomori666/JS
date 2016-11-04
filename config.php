<?php
$root_dir = 'JS.local';
define('DS', DIRECTORY_SEPARATOR);
define ('ROOT_DIR', explode($root_dir, __DIR__)[0].$root_dir.DS);
define('ADMIN_MALE', 'jsadmin@js.ru');

$site['from_name'] = 'jsinfo'; // from (от) имя
$site['from_email'] = 'info@jscientia.org';
$site['smtp_mode'] = 'disabled';
$site['smtp_host'] = '127.0.0.1';
$site['smtp_port'] = '25';
$site['smtp_username'] = 'Administrator';
$site['smtp_password'] = '2307';