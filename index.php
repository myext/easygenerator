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

$data = json_decode($report, true)["data"];

$res = "<tr><td>name</td><td>email</td><td>type</td><td>score</td><td>definition</td></tr>";

foreach ($data as $statment){

    $email = $statment['actor']['mbox'];// email ученика
    $name_client = $statment['actor']['name'] ?? ''; // имя ученика
    $display = $statment['verb']['display']; // действие (прошёл, ответил и т.д.)
    $result = $statment['result']['score']; // результат
    $definition = $statment['object']['definition'];// название раздела (объекта)
    $type = '';
    $score = '';
    $name_object = '';

    foreach ($display as $key => $item) {
        $type.= ' # '.$key.' : '.$item.' # ';
    }

    foreach ($result as $key => $item) {
        $score.= ' # '.$key.' : '.$item.' # ';
    }

    foreach ($definition['name'] as $key => $item) {
        $name_object.= ' # '.$key.' : '.$item.' # ';
    }

    $res .= '<tr>';
    $res .= "<td>{$name_client}</td>";
    $res .= "<td>{$email}</td>";
    $res .= "<td>{$type}</td>";
    $res .= "<td>{$score}</td>";
    $res .= "<td>{$name_object}</td>";
    $res .= '</tr>';

}

echo "<table border='1' cellpadding='8'>{$res}</table>";

echo $output->footer();
