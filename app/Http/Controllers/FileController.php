<?php

namespace App\Http\Controllers;
use App\Classes\S3ClientClass;
use App\Services\FileService;

require '..\vendor\autoload.php';


class FileController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
   
    public function fileDowload()
    {
        $asd = $this->fileService->fileDowload('istutestbucket','istutestdoc.docx', 'asd');
        echo '<a href="' . $asd . '">' . $asd . '</a>';

    }

    public function fileUpload(): void
    {
        $asd = $this->fileService->registerFile('istutestbucket', 'C:\Users\cosmosanet\Desktop\123\asdw.docx');
        echo $asd;
    }
}


