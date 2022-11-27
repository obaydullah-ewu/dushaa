<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        DUSHAA:: Dr. Muhammad Shahidullah Hall Alumni Association :: Reunion 2022
    </title>
    <link rel="icon" type="icon" href="{{ asset('/') }}assets/frontend/images/favicon.png" />

    <!-- Links Of CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/lightbox.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/countdown.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/style.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/responsive.css" />
</head>

<body id="login-body">
<!-- Login Form Area Start -->
<div class="login-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="from-body">
                    <!-- <img class="bg-img" src="assets/images/large-logo.png" alt="image" /> -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                SignIn
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                SignUp
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="tabs-content">
                                <form>
                                    <div class="inputGroups mt-0">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                                    </div>
                                    <div class="inputGroups">
                                        <label for="email">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                                    </div>
                                    <div class="keeplogin">
                                        <input type="checkbox" id="keepLogin" />
                                        <label for="keepLogin">Keep Me Login</label>
                                    </div>
                                    <button class="default-button" type="submit">
                                        <span>Submit</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="tabs-content">
                                <form>
                                    <div class="inputGroups mt-0">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required />
                                    </div>
                                    <div class="inputGroups">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                                    </div>
                                    <div class="inputGroups">
                                        <label for="email">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                                    </div>
                                    <div class="inputGroups">
                                        <label for="email">Confirm Password</label>
                                        <input type="password" name="confrim_password" class="form-control" placeholder="Confirm Password"
                                               required />
                                    </div>
                                    <button class="default-button" type="submit">
                                        <span>Submit</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form area End -->

<!-- Link Os JS -->
<script src="{{ asset('/') }}assets/frontend/js/jquery.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/countdown.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/iconify.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/lightbox.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/custom.js"></script>
</body>
</html>
