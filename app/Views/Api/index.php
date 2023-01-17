<!doctype html>
<html lang="en">
    <head>
        <title>Codeigniter 4 Form Validation Single Image API</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>
<body>
    <div class="container py-4">
        <div class="row"> 
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <?php $validation = \Config\Services::validation(); ?>
                <form method="post" action="<?=site_url('page/submitform')?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="card-title">Upload Single Image API</h5>
                        </div>

                        <div class="card-body p-4">
                            <div class="form-group mb-3 has-validation">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control <?php if($validation->getError('username')): ?>is-invalid<?php endif ?>" id="username" placeholder="Enter username" name="username" value="<?= old('username') ?>">
                                <?php if ($validation->getError('username')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>                                
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3 has-validation">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control <?php if($validation->getError('image')): ?>is-invalid<?php endif ?>" name="image"/>
                                <?php if ($validation->getError('image')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image') ?>
                                    </div>                                
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

                <?php if(session()->getFlashdata('result')):?>
                    <div class="form-group py-4">
                    <h5 class="py-2">Result : </h5>
                        <pre>
                            <?php print_r(session()->getFlashdata('result')) ?>
                        </pre>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>