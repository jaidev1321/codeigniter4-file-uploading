<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
class Home extends BaseController
{
    protected $helpers = ['form'];
    public function index(): string
    {
        return view('welcome_message');
    }
    public function fileUploadForm(): string
    {

        return view('file-upload-form' , ['errors' => []]);
    }

    public function fileUploadHandler()
    {
        // print_r($_FILES); die;
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[userfile,100]',
                    // 'max_dims[userfile,1024,768]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            print_r($data); die;
            // return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            // if file will moved then you can find the file in below path
            // {PROJECT_DIRECTORY}/writable/uploads/20240229
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $uploadedFileInfo = ['uploaded_fileinfo' => new File($filepath)];

            // if you want to save the uploaded file info into db then you can get all the relative data from $uploadedFileInfo Variable. 
            /** Response of file uploading  
             * 
             * 
             * Array
                (
                    [uploaded_fileinfo] => CodeIgniter\Files\File Object
                        (
                            [size:protected] => 
                            [originalMimeType:protected] => 
                            [pathName:SplFileInfo:private] => /Users/jaidev/Desktop/Development/learning/ci4-file-uploading/writable/uploads/20240229/1709178210_e3f46a425059c7990066.jpg
                            [fileName:SplFileInfo:private] => 1709178210_e3f46a425059c7990066.jpg
                        )

                )
            */
            echo "<pre>";
            print_r($uploadedFileInfo); die('hasMoved');
            // return view('upload_success', $data);
        }

        $data = ['errors' => ['The file has already been moved.']];

        return view('file-upload-form', $data);
    }
}
