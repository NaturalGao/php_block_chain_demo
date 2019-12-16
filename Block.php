<?php


class Block
{
    public $data;
    public $previousHash;
    public $hash;

    public function __construct($data, $previousHash = null)
    {
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->computeHash();
    }

    public function computeHash()
    {
        return hash('sha256', $this->data . $this->previousHash);
    }
}