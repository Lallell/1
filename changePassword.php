<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/images/male-clothes.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>quocthai.xyz.vn</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "108926781423496");
        chatbox.setAttribute("attribution", "biz_inbox");
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v11.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Header -->
    <?php
    include_once('./API/header.php');
    ?>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/headingBack.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Welcome everyone with</h4>
                        <h2>Change Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $temp = $_SESSION['Use_Name'];
    require_once('./API/connect.php');
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE Use_Name = '$temp'"));
    if (isset($_POST['bnt_update'])) {
        $PassWord = $_POST['PassWord'];
        $newPassWord = $_POST['newPassWord'];
        $query = "UPDATE user 
                        SET 
                            PassWord='$newPassWord'
                        WHERE 
                            Use_Name = '$temp'";

        if ($PassWord == $row['PassWord']) {
            $result = mysqli_query($conn, $query);
            if ($result == true) {
                echo "<script>window.location.href='#';</script>";
            }
        } else {
        }
    }
    ?>

    <!-- Modal -->
    

    <div class="products">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>change Password</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="Use_Name" type="text" class="form-control" value="<?= $_SESSION['Use_Name'] ?>" readonly>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="PassWord" type="Password" class="form-control" placeholder="Password" value="">
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="newPassWord" type="Password" class="form-control" placeholder="New Password" value="">
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" name="bnt_update" class="filled-button">Change</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if ($row['User_img'] != null) : ?>
                            <div class="imgHover">
                                <img src="assets/images/Avatars/<?= $row['User_img'] ?>" class="avatar">
                            </div>
                        <?php else : ?>
                            <div class="imgHover">
                                <img src="assets/images/default-avatar.jpg" class="avatar">
                            </div>
                        <?php endif; ?>
                        <h5 class="text-center" style="margin-top: 15px;"><?= $_SESSION['Use_Name'] ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('./API/footer.php'); ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


        <!-- Additional Scripts -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/owl.js"></script>


</body>

</html>