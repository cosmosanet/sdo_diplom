<?php
namespace App\Classes;

use App\Interfaces\HashInterfaces;

class HashClass
{
    protected string $md5;

    protected string $sha1;

    protected string $sha512;

    public function getMD5()
    {
        return $this->md5;
    }
    public function getSHA1()
    {
        return $this->sha512;
    }
    public function getSHA512()
    {
        return $this->sha512;
    }


}