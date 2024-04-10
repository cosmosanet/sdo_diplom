<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FileService;

require '..\vendor\autoload.php';

class MainController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $listOfFile = $this->fileService->getListOfFile(null);
        return view('welcome', ['list' => $listOfFile]);
    }
}
