<?php
// controllers/BaseController.php

class BaseController
{
    protected function view($view, $data = [])
    {
        require_once "../views/" . $view . ".php";
    }
}
