<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bebek Slamet</title>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cafe.css">
</head>
<body id="loginpage">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">&nbsp;</div>
            <div class="col-lg-6">
                <div id="loginbox">
                    <div id="loginbanner">
                        BEBEK GORENG HAJI SLAMET
                    </div>

                    <form action="auth.php" method="post" id="loginform">

                        <div class="form-group">
                            <input type="text" name="username" id="username" 
                            placeholder="Username" class="form-control curved"
                            required>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" 
                            placeholder="password" class="form-control curved"
                            required>
                        </div>

                        <div class="form-group submit-button">
                            <input type="submit" value="Login" class="btn btn-dark">
                        </div>

                    </form>

                </div>
            </div>
            <div class="col-lg-3">&nbsp;</div>
        </div>
    </div>
</body>
</html>