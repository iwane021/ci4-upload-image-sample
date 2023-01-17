<!doctype html>
<html lang="en">
    <head>
        <title>Codeigniter 4 Form Validation Multiple Image</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>
<body>
    <div class="container py-4">
        <?php $validation =  \Config\Services::validation(); ?>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form method="POST" action="<?= base_url('upload-image') ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <!-- display flash data message -->
                    <?php
                        if(session()->getFlashdata('success')):?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <?php echo session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif(session()->getFlashdata('failed')):?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?php echo session()->getFlashdata('failed') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php endif; ?>

                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="card-title">Upload Single / Multiple Image</h5>
                        </div>

                        <div class="card-body p-4">
                            <div class="form-group mb-3 has-validation">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control <?php if($validation->getError('image')): ?>is-invalid<?php endif ?>" name="image[]" multiple="multiple"/>
                                <?php if ($validation->getError('image')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image') ?>
                                    </div>                                
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>

                <?php
                    if(session()->getFlashdata('previewImage')):?>
                        <div class="form-group py-4">
                        <h5 class="py-2">Image Preview</h5>
                            <?php foreach(session()->getFlashdata('previewImage') as $image): ?>
                                <img src="<?php echo base_url('uploads/'.$image);?>" class="img-fluid" height="150px"/>
                                <br/>
                                <br/>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>