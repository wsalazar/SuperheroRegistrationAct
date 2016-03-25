<?php

namespace Application\Request;

class FormRequest
{
    /**
     * @param $index
     * @return string
     */
    public function post($index)
    {
        return trim($_POST[$index]);
    }

    /**
     * @param $index
     * @return string
     */
    public function get($index)
    {
        return trim($_GET[$index]);
    }
}