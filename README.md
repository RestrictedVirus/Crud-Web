<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.2-dist/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('bootstrap-5.0.2-dist/js/bootstrap.min.js') ?>"></script>
    <title>Login</title>
</head>

<body
    style="background-image: url('https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/277677469_489614716152933_7415662158584620214_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=dd5e9f&_nc_eui2=AeHgQazI2x1Q_4dZFIBCspjPVq5hNw1CvA1WrmE3DUK8DdK6wmIIN_VQmPO5tjrqPySBBymeYdYSo2zrBwa75qTk&_nc_ohc=JYtqAZGvhQ8AX-0wdCx&_nc_zt=23&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfDL7-x3MsBKrtGK3A3KPZB5jOr4aroY7PiL2g6WsFT6bQ&oe=6585C342'); background-size: cover;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card mt-5 bg-secondary" style="border: 5px solid #fff;">
                    <div class="card-body text-light">
                        <div class="logo text-center p-3">
                            <img src="https://scontent.fmnl9-1.fna.fbcdn.net/v/t39.30808-6/360092165_659861412835412_7475256407092024168_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=efb6e6&_nc_eui2=AeEjQJp9kqc2yqMOzcM7G6dtZWrF_sAi2kFlasX-wCLaQd435L69An2BU8TEbOQJP-2gkY_mpMj3S7MnSrUatvlZ&_nc_ohc=hQ8jlwNjn4MAX_uXmeU&_nc_zt=23&_nc_ht=scontent.fmnl9-1.fna&oh=00_AfAJwrJycTG5WRE7B5yCb5qEv7pBdPh7E4O-uq0MV4JBow&oe=65859861"
                                alt="" srcset="" height="150px" width="150px" class="rounded-circle">
                        </div>
                        <form class="form" action="<?= base_url('main/auth') ?>" method="post">
                            <!-- <h1 class="text-center mb-4" style="font-family: -apple-system, BlinkMacSystemFont;">Login
                            </h1> -->
                            <?php if (!empty(session()->getFlashdata('fail'))): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('fail'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="username" class="visually-hidden">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>
                                    </span>
                                    <input autocomplete="off" type="text" class="form-control" id="username"
                                        placeholder="Username" name="username">
                                </div>
                                <span class="text text-danger">
                                    <?= isset($validation) ? display_error($validation, 'username') : '' ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="visually-hidden">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                        </svg>
                                    </span>
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password">
                                </div>
                                <span class="text text-danger">
                                    <?= isset($validation) ? display_error($validation, 'password') : '' ?>
                                </span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-dark bg-light">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
