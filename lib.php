<?php

function report_easygenerator_extend_navigation_course($reportnav, $course, $context) {

    $url = new moodle_url('/report/easygenerator/index.php');

    $easy = $reportnav->add('easygenerator', $url, navigation_node::TYPE_SETTING, null, null, new pix_icon('i/report', ''));
}


