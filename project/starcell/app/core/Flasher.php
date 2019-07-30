<?php

class Flasher
{
    public static function setFlash($message, $action)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<script type= "text/javascript">alert("Message: ' . $_SESSION['flash']['message'] . '\nAction: ' . $_SESSION['flash']['action'] . '")</script>';
            unset($_SESSION['flash']);
        }
    }
}
