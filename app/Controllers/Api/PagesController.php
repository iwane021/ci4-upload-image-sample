<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class PagesController extends BaseController
{
    public function _construct()
    {
        helper(['form','url']);
    }

    public function index()
    {
        return view('Api/index');
    }

    public function submitForm()
    {
        $request = service('request');
        // $validation = \Config\Services::validation();
        
        $validated = $this->validate([
            'username' => 'required',
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]',
                'errors' => [
                    'uploaded[image]' => 'Please select an image.'
                ]
            ]
        ]);

        // if($validation->withRequest($this->request)->run())
        if($validated)
        {
            $apiURL = 'http://localhost:8080/api-upload-php/api.php';
            $client = \Config\Services::curlrequest();
            
            if($file = $this->request->getFile('image')) {
                
                $tempfile = $file->getTempName();
                $filename = $file->getName();
                $type = $file->getClientMimeType();

                $postData = array(
                    'image' => curl_file_create($tempfile,$type,$filename),
                    'username' => $request->getPost()['username']
                );

                // Send request
                $response = $client->request('POST', $apiURL,[
                    'debug' => true, 
                    'multipart' => $postData
                ]);
                
                // Read response
                $code   = $response->getStatusCode(); // 200
                $reason = $response->getReason(); // OK

                if($code == 200)
                {
                    // Read data 
                    $body = json_decode($response->getBody());
                    
                    // echo "<pre>";
                    // print_r($body);
                    // echo "</pre>";
                    // die;
                    
                    return redirect()->to(site_url('/page'))->withInput()->with('result', $body);
                }
                else
                {
                    // echo "failed";
                    // die;

                    return redirect()->to(site_url('/page'))->withInput()->with('result', 'FAILED!');
                }
            }
        }
        else 
        {
            return view('Api/index', [ 'validation' => $this->validator ]);
        }

    }
}
