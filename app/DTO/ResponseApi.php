<?php

namespace App\DTO;

class ResponseApi
{
    public $message;
    public $info;

    public function __construct($response)
    {
        $this->message = $response->message ?? null;
        $this->info = $response->info ?? null;
        $this->data = $response->data ?? null;
        $this->account = $response->account ?? null;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getData() {
        return $this->data;
    }
    public function getAccount() {
        return $this->account;
    }

    public function getDataArray() {
        return json_decode(json_encode($this->data), true);
    }
}
