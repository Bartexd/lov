<?php

namespace Controllers;


interface Controller
{

    public function delete($args = []);

    public function index($args = []);

    public function get($args = []);

    public function post($args = []);

    public function patch($args = []);

    public function update($args = []);

}