<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 16</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
    .lab-image {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }
    .image-container {
        padding: 15px;
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
                        <h4 class="page-title">Prog2007 - Lab 16<br>
                        Array Calculations</h4>
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

<h4>Lab 16 - Array Calculations</h4>
<p>
We are going to build a simple program to perform some basic array calculations.
</p>

<h5>TASK:</h5>
<p>
Our program will work based on command line arguments with the following format:<br>
<code>EX16.exe [op] [arraySize]</code>
</p>

<p>
<strong>Operations:</strong><br>
<strong>-s</strong> = sum<br>
<strong>-a</strong> = average<br>
<strong>-mx</strong> = maximum<br>
<strong>-mn</strong> = minimum
</p>

<p>
Example: <code>.\EX16.exe -a 7</code>
</p>

<p>
If proper arguments are used, show the result to one decimal place.
</p>

<h5>Sample Outputs</h5>
<div class="row">
    <div class="col-lg-6 image-container">
        <p class="mb-0 pb-0">Sample of improper number of command line arguments:</p>
        <img src="img/16-1.png" alt="Improper Number of Command Line Arguments" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of improper operator:</p>
        <img src="img/16-2.png" alt="Improper Operator" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of finding array sum:</p>
        <img src="img/16-3.png" alt="Array Sum" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of finding array average:</p>
        <img src="img/16-4.png" alt="Array Average" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of finding array maximum value:</p>
        <img src="img/16-5.png" alt="Array Maximum" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of finding array minimum value:</p>
        <img src="img/16-6.png" alt="Array Minimum" class="lab-image">
    </div>
</div>

<h5>IMPORTANT NOTES:</h5>
<p>
Make use of <strong>all included code</strong> provided in "inc/arrayOps.h" and "src/arrayOps.c" (i.e. implement and use the functions, enums, and variables already provided). Read all of the code comments in UPPERCASE for some help. <strong>Do not forget to properly release the dynamic memory for the array when done with it.</strong>
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