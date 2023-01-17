# Upload Multiple Image with Validation in Codeigniter 4

In this project I made two cases, including uploading images with cURL and uploading multiple images.

## Features

- Using Bootstrap 5
- Including Validation Error Message
- Multiple selected images
- Show Preview image after uploaded
- Show alert message after uploaded
- Please clone RestAPI from : https://github.com/iwane021/api-upload-php

## Screenshoot

### Single Upload with RestAPI
- **Route :** `$routes->get('page', 'Api\PagesController::index');`
- **Validation**
![upload-single-validation](https://github.com/iwane021/ci4-upload-image-sample/blob/main/public/assets/upload-single-validation.png "upload single image validation")
- **Result**
![upload-single-result](https://github.com/iwane021/ci4-upload-image-sample/blob/main/public/assets/upload-single-result.png "upload single image result")

### Multiple Upload
- **Route :** `$routes->get('upload-image', 'ImageController::index');`
- **Validation**
![upload-multiple-validation](https://github.com/iwane021/ci4-upload-image-sample/blob/main/public/assets/upload-multiple-validation.png "upload multiple image validation")
- **Result**
![upload-multiple-result](https://github.com/iwane021/ci4-upload-image-sample/blob/main/public/assets/upload-multiple-result.png "upload multiple image result")



Author : [iwan.webdeveloper@gmail.com](iwan.webdeveloper@gmail.com)
