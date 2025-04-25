<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 12</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
    .conversion-img {
        width: 100%;
        max-width: 600px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include_once("components/header.php"); ?>
        <?php include_once("components/navmenu.php"); ?>
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Prog2007 - Lab 12<br>
                        Litre to Gallon</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php include_once("components/studentid.php"); ?>
                        </div>
                    </div>
                </div>
                <!-- editor -->
                <div class="row">
                    <div class="col-12">
                        <div id='activity-card' class="card">
                            <div class="card-body">
                            <?php include_once("components/lab_submission_marking.php"); ?>
                            <?php include_once("components/lab_evaluation_instructions.php"); ?>

<h4>Lab 12 - Litre to Gallon</h4>
<p>
We will create an application to convert from litres to gallons using Preprocessor macros.
</p>

<h5>STEPS:</h5>
<p>
You have already been provided with <strong>"src/main.c"</strong> and <strong>"inc/litreGallon.h"</strong> files. The main.c file is fine as-is and you will do all your work in the "litreGallon.h" file.
</p>

<p>
<strong>NOTE</strong>: US and UK Gallons are different. See the following link: <a href="https://tinyurl.com/2p9y8yrw" target="_blank">https://tinyurl.com/2p9y8yrw</a>
</p>

<p>
In the header file, create a #DEFINE constant called <strong>LOCALE</strong> and set it to <strong>1</strong> to start for US gallons.
</p>

<p>
Place conditionally compiled preprocessor macro code to convert litres to gallons via US values if LOCALE is 1.
</p>

<p>
<strong>Take note of the name of the macro as expected in the main.c code.</strong>
</p>

<h5>Sample Outputs</h5>
<div class="row">
    <div class="col-lg-6 px-5">
        <h6>1</h6>
        <p>When done, your code should work as in the following image:</p>
        <img src="img/12-1.png" alt="US Conversion" class="conversion-img">
    </div>
    <div class="col-lg-6 px-5">
        <h6>2</h6>
        <p>Now, place additional conditionally compiled preprocessor macro code to convert litres
        to gallons via UK values if LOCALE is 2. Then set the LOCALE to 2 in the header file to test it.
        When done, your code should work as in the following image:</p>
        <img src="img/12-2.png" alt="UK Conversion" class="conversion-img">
    </div>
    <div class="col-lg-6 px-5">
        <h6>3</h6>
        <p>Now, comment out the LOCALE definition in the header file as we will pass the value in during compilation.
        Go run make test via Git Bash and you should see the following:</p>
        <img src="img/12-3.png" alt="US Test Results" class="conversion-img">
    </div>
    <div class="col-lg-6 px-5">
        <h6>4</h6>
        <p>Now, change the COUNTRY_CODE to 2 at the top of the Makefile.
        Go run make test via Git Bash again and you should see the following:</p>
        <img src="img/12-4.png" alt="UK Test Results" class="conversion-img">
    </div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should correctly perform all specified conversions.
<strong>You should thoroughly test your code before submitting!</strong>
</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include_once("components/bodyscripts.php"); ?>
    <script>
        function generateActivity() {
            let sid = document.getElementById("sid").value;
            if (sid.charAt(0).toLowerCase() != 'w' || sid.length != 8) {
            window.alert('Please enter your proper NSCC student id number including the first letter.');
            return
            }
            $.ajax({
                url: "ajaxservices/wCheck.php?id=" + sid,
                method: "get",
                dataType: "json",
                success: function(res) {
                    console.log(res)

                    let listContent = ""
                    for (let i = 0; i < res.randStr.length; i++) {
                        listContent += `<li style='font-family:monospace'><span class='stand-out'>${res.randStr[i]}</span></li>`
                    }
                    $("#rand-list").html(listContent)
                    $("#activity-card").show();
                }
            })
        }

        function checkEnter(e) {
            if (e.code === "Enter") {
                generateActivity()
            }
        }

        let sidInput = document.getElementById("sid")
        sidInput.addEventListener("keydown", (event) => checkEnter(event))
    </script>
</body>

</html>