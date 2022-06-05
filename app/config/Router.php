<?php

$this->get('/', function () {
    print 'home1';
});

$this->get('/home', function () {
    print '/home';
});

$this->get('/about/test', function () {
    print 'about/test';
});
