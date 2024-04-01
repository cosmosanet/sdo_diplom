<?php

namespace App\Http\Controllers;
require '..\vendor\autoload.php';
use Aws\S3\S3Client;
use App\Classes\HashControllClass;
use App\Classes\S3ClientClass;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
    
        return view('welcome');

    }
}
