<?php $session = \Config\Services::session();?>

<h1>Trabalho mvc</h1>

<p>projeto Code-4</p>

<p><pre><?=var_dump($session->get('user'))?></pre></p>   