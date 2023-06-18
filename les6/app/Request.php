<?php
namespace App;

class Request
{
    public string $messageText = '';
    public string $messageType = 'success';

    public function get():object
    {
        $result = [];

        foreach ($_POST as $key => $value) {
            $result[$key] = is_numeric($value) ? intval($this->sanitize($value)) : $this->sanitize($value);
        }

        return (object) $result;
    }

    private function sanitize($str): string
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = strip_tags($str);
        $str = htmlspecialchars($str);
        return str_replace(["\r", "\n", chr(0)], '', $str);
    }

    public function getMessageText(): string
    {
        return $this->messageText;
    }

    public function setMessageText($text)
    {
        $this->messageText = $text;
    }

    public function getMessageType(): string
    {
        return $this->messageType;
    }

    public function setMessageType($type)
    {
        $this->messageType = $type;
    }

    public function hasError(): bool
    {
        return $this->messageType === 'error';
    }
}
