<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 15</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
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
                        <h4 class="page-title">Prog2007 - Lab 15<br>
                        File Operations</h4>
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

<h4>Lab 15 - File Operations</h4>
<p>
We are going to build a simple program that writes, appends, and reads messages to/from a specified file.
</p>

<h5>TASK:</h5>
<p>
Our program will work on command line arguments with the following format:<br>
<code>EX15.exe &lt;op&gt; &lt;file&gt; [message]</code>
</p>

<p>
<strong>Operations:</strong><br>
<strong>-w</strong> = write<br>
<strong>-a</strong> = append<br>
<strong>-r</strong> = read
</p>

<h5>Usage Examples:</h5>
<div class="row">
    <div class="col-lg-6 image-container">
        <p class="mb-0 pb-0">Sample of improper number of command line arguments:</p>
        <img src="img/15-1.png" alt="Improper Number of Command Line Arguments" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of improper operator:</p>
        <img src="img/15-2.png" alt="Improper Operator" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of invalid output file:</p>
        <img src="img/15-3.png" alt="Invalid Output File" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of invalid input file:</p>
        <img src="img/15-4.png" alt="Invalid Input File" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of successfully writing a line to a file:</p>
        <img src="img/15-5.png" alt="Write Success #1" class="lab-image">

        <p class="mb-0 pb-0">Sample of current output file contents:</p>
        <img src="img/15-6.png" alt="Output #1" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of successfully writing a new line to the file:</p>
        <img src="img/15-7.png" alt="Write Success #2" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of current output file contents:</p>
        <img src="img/15-8.png" alt="Output #2" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of successfully appending a new line to the file:</p>
        <img src="img/15-9.png" alt="Append Success #1" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of current output file contents:</p>
        <img src="img/15-10.png" alt="Output #3" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of successfully appending two new lines to the file:</p>
        <img src="img/15-11.png" alt="Append Success #2" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of current output file contents:</p>
        <img src="img/15-12.png" alt="Output #4" class="lab-image">
        
        <p class="mb-0 pb-0">Sample of successfully reading the file contents:</p>
        <img src="img/15-13.png" alt="Read Success" class="lab-image">
    </div>
</div>

<h5>IMPORTANT NOTES:</h5>
<p>
Make use of the <strong>existing functions provided</strong> in "inc/fileOps.h" in "src/fileOps.c" (i.e. implement the function prototype declarations already included in "inc/fileOps.h"). Also, make sure your error message output to <strong>stderr</strong>.
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