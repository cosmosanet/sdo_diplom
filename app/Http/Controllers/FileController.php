<?php

namespace App\Http\Controllers;
use App\Classes\S3ClientClass;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function fileUpload(Request $request)
    {
        $fileContent = file_get_contents($request->file('file'));
        $inputFileName = $request->file('file')->getClientOriginalName();
        $asd = $this->fileService->registerFile($inputFileName, $fileContent);
      
        return (isset($asd['errors'])) ? redirect('/')->with('errors', $asd['errors']) :  redirect('/')->with('success', $asd['success']);
    }
}


