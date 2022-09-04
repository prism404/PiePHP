<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="webroot/css/login.css">
    <title>Register</title>
</head>

<body>

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <h2 class="text-light">Register</h2>
                <div class="division">
                    <div class="row">
                        <div class="col-3">
                            <div class="line l"></div>
                        </div>
                        <div class="col-3">
                            <div class="line r"></div>
                        </div>
                    </div>
                </div>
                <form class="myform text-light" method="POST" action="registerAdd">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control text-light" placeholder="Your email ...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control text-light" placeholder="Your password ...">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i></small>Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>