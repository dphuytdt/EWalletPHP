<?php

    require "../Controller/CheckLogin.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="icon" href="../Resource/image/home.png" type="image/icon type">
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Resource/css/style.css">
    <script src="../Resource/js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <?php
        require 'layout/header.php';
    ?>

    <div>
        <img style="width: 100%; height: 100%; top: 51px" src="../Resource/image/MainP.jpg" alt="Picture for Homepage.">
    </div>

    <!-- information members -->
    <div class="container">
        <div class="main-title font-color-m-light">Our Creative Team</div>
        <p class="main-content">This is our team.</p>


        <div class="col-4 padding-lr team-member">
            <div class="team-image"
                style="position:relative;overflow:hidden;text-align:center;background-image:url(../Resource/image/mem1.jpg);">
                <div class="team-overlay">
                    <span style="width:1px;height:100%;display:inline-block;vertical-align:middle;"></span>
                    <div class="social-link" style="vertical-align: middle;display: inline-block;">
                        <a href="https://facebook.com/hitruong.0504"> <i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/hitrg54/"> <i class="fa-brands fa-instagram-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-name">Truong Anh Hi</div>
            <div class="team-position">520H0356</div>
        </div>
        <div class="col-4 padding-lr team-member">
            <div class="team-image"
                style="position:relative;overflow:hidden;text-align:center;background-image:url(../Resource/image/mem1.jpg);">
                <div class="team-overlay">
                    <span style="width:1px;height:100%;display:inline-block;vertical-align:middle;"></span>
                    <div class="social-link" style="vertical-align: middle;display: inline-block;">
                        <a href="#"> <i class="fa-brands fa-facebook"></i></a>
                        <a href="#"> <i class="fa-brands fa-instagram-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-name" style="">Le Nhat Duy</div>
            <div class="team-position">mssv</div>
        </div>
        <div class="col-4 padding-lr team-member">
            <div class="team-image"
                style="position:relative;overflow:hidden;text-align:center;background-image:url(../Resource/image/mem1.jpg);">
                <div class="team-overlay">
                    <span style="width:1px;height:100%;display:inline-block;vertical-align:middle;"></span>
                    <div class="social-link" style="vertical-align: middle;display: inline-block;">
                        <a href="#"> <i class="fa-brands fa-facebook"></i></a>
                        <a href="#"> <i class="fa-brands fa-instagram-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-name" style="">Nguyen Ngoc Bao Uyen</div>
            <div class="team-position">mssv</div>
        </div>


    </div>

    <br>
    <!-- map -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0167828596095!2d106.69715975091844!3d10.733188762886387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fbd68bcae7d%3A0xc59922383ff04616!2zxJDhuqFpIEjhu41jIFTDtG4gxJDhu6ljIFRo4bqvbmcgTmd1eeG7hW4gSOG7r3UgVGjhu40!5e0!3m2!1svi!2s!4v1653877411125!5m2!1svi!2s"
            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <br>
    <!-- contact -->
    <div class="container" style="background-color: #c8e1ef;">
        <div class="col-12">
            <div class="contact-box col-4">
                <div class="col-12 contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="col-12 contact-title">19 Nguyen Huu Tho, Tan Phong, District 7<br /> Ho Chi Minh</div>

            </div>
            <div class="contact-box col-4">
                <div class="col-12 contact-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="col-12 contact-title">+84 12 345 678</div>

            </div>
            <div class="contact-box col-4">
                <div class="col-12 contact-icon"><i class="fa-brands fa-mailchimp"></i></div>
                <div class="col-12 contact-title">info@fastpay.com</div>
            </div>
        </div>
    </div>
    <br>
    <?php
        require 'layout/footer.php';
    ?>
</body>

</html>