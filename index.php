<?php

require_once('../../config.php');

if(!is_siteadmin()) {
    $homeurl = new moodle_url('/');
    redirect($homeurl);
}

$PAGE->set_url('/report/easygenerator/index.php');
$PAGE->set_title('Easygenerator');
$PAGE->set_heading('Easygenerator');

$PAGE->set_pagelayout('report');

$output = $PAGE->get_renderer('');

echo $output->header();

$report = file_get_contents('https://avsandbox.tk/api/test');

echo $report;

echo $output->footer();
