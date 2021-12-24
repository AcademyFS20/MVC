<?php

namespace Provider;

class Validator
{

    public function isRequired($field_array)
    {
        foreach ($field_array as $field) {
            if ($_POST[$field] == '') {
                return false;
            }
        }
        return true;
    }

    public function isValidEmail($email)
    {

        if ($this->validateInputs($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function passwordsMatch($pw1, $pw2)
    {
        if ($pw1 === $pw2) {
            return true;
        } else {
            return false;
        }
    }

    public function validateInputs($inputText, $option)
    {

        $inputText = filter_var(trim(strip_tags($inputText)), $option);
        return $inputText;
    }

    public function santizeStr($input)
    {
        return trim(strip_tags($input));
    }
}