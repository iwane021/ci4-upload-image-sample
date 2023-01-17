<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Image;

class ImageController extends BaseController
{
    public function _construct()
    {
        helper(['form','url']);
    }

    public function index()
    {
        return view('upload');
    }

    public function uploadImage()
    {
        $validated = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]',
                'errors' => [
                    'uploaded[image]' => 'Please select an image.'
                ]
            ]
        ]);

        if(!$validated)
        {
            return view('upload', [
                'validation' => $this->validator
            ]);
        }

        $files = $this->request->getFileMultiple('image');

        $previewFile = [];

        foreach ($files as $file) {
            if($file->isValid() && !$file->hasMoved()){
                $newFileName = $file->getRandomName();
                $file->move('uploads', $newFileName);

                $image = new Image();
                $image->save([
                    'name' => $newFileName
                ]);

                array_push($previewFile, $newFileName);
            }
        }

        session()->setFlashdata('success', '<strong>Succesfully</strong>, image uploaded!');
        return redirect()->to(site_url('/upload-image'))->withInput()->with('previewImage', $previewFile);

    }
}
