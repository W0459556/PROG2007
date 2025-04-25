<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 11</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
    .bit-op-img {
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
                        <h4 class="page-title">Prog2007 - Lab 11<br>
                        User-Selected Bit Operations</h4>
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

<h4>Lab 11 - User-Selected Bit Operations</h4>
<p>
We will use a version of this week's sample code to perform some user-selected bit operations.
</p>

<h5>STEPS:</h5>
<p>
You have already been provided with <strong>"src/main.c"</strong>, <strong>"src/binOps.c"</strong> and <strong>"inc/binOps.h"</strong> files. The binOps.h/binOps.c files already contains a function to output an integer as a binary string. The main.c file is mostly blank at present but does link in the binOps.h header file.
</p>

<p>
<strong>Now, implement the code marked by "TODO's" in main.c.</strong>
</p>

<h5>Sample Outputs</h5>
<div class="row">
    <div class="col-lg-6">
        <h6>Bitwise AND</h6>
        <img src="img/11-1.png" alt="Bitwise AND" class="bit-op-img">
    </div>
    <div class="col-lg-6">
        <h6>Bitwise OR</h6>
        <img src="img/11-2.png" alt="Bitwise OR" class="bit-op-img">
    </div>
    <div class="col-lg-6">
        <h6>Bitwise XOR</h6>
        <img src="img/11-3.png" alt="Bitwise XOR" class="bit-op-img">
    </div>
    <div class="col-lg-6">
        <h6>Left Shift</h6>
        <img src="img/11-4.png" alt="Left Shift" class="bit-op-img">
    </div>
    <div class="col-lg-6">
        <h6>Right Shift</h6>
        <img src="img/11-5.png" alt="Right Shift" class="bit-op-img">
    </div>
    <div class="col-lg-6">
        <h6>Bad Operator</h6>
        <img src="img/11-6.png" alt="Bad Operator" class="bit-op-img">
    </div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should correctly perform all specified bit operations.
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