<?php
class controller extends user
{
    public function is_empty_inputs($name, $email, $class)
    {
        return empty($name) || empty($email) || empty($class);
    }

    public function is_name_invalid($name)
    {
        return !preg_match("/[a-zA-Z ]+$/", $name);
    }

    public function is_email_invalid($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function is_class_invalid($class)
    {
        return !preg_match("/[a-zA-Z0-9]+$/", $class);
    }
}
?>