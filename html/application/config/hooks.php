<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'][0] = array(
    'class'    => 'PreSess',
    'function' => 'filter',
    'filename' => 'PreSess.php',
    'filepath' => 'hooks'
);

$hook['post_controller_constructor'][1] = array(
    'class'    => 'PreLoged',
    'function' => 'mainExecute',
    'filename' => 'PreLoged.php',
    'filepath' => 'hooks',
);


?>