<?php

$ADMIN->add('reports', new admin_externalpage('easygenerator', 'easygenerator',
    $CFG->wwwroot . "/report/easygenerator/index.php", 'report/log:view'));

$settings = null;
