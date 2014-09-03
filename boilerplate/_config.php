<?php

define('BOILERPLATE_MODULE', 'boilerplate');

if (basename(dirname(__FILE__)) != BOILERPLATE_MODULE) {
    throw new Exception(BOILERPLATE_MODULE . ' module not installed in correct directory');
}