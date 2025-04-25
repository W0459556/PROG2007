<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 6</title>
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
                        <h4 class="page-title">Prog2007 - Lab 6<br>
                        Leap Year</h4>
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

<h4>Lab 6 - Leap Year</h4>
<p>
First take the code from our <strong>leap.c</strong> sample file in the <strong>Resources for the Making Decisions lecture</strong> and <strong>refactor it into a function</strong> that returns true or false if a passed in year is a leap year or not.
</p>

<p>
Call it from the main function to make sure it works.
</p>

<p>
Then create a <strong>new function</strong> that takes in the year and a numeric code for a month, i.e. 1 = January, 2 = February, and so forth. Have it return the number of days in that month. <strong>Make sure to make use of your new leap year function so you can correctly tell if February has 28 or 29 days that year</strong>.
</p>

<p>
Also, return a message of "Bad year" if a year between 1 and 9999 not entered and return 1 error code.
</p>

<p>
Return a message of "Bad month" if a month between 1 and 12 not entered and return 1 error code.
</p>

<p>
<strong>NOTE:</strong> This would be a great job for a <strong>switch-case</strong> statement!!
</p>

<p>
<strong>REMINDER:</strong> "30 days has September, April, June, and November".
</p>

<h5>Sample Output</h5>
<div class="row">
<div class="col-lg-5">


Sample of bad year input:
<div class="bg-dark p-3 text-light"><pre><code class="text-light">
C:\PROG2007\EX6\cmake-build-debug\EX6.exe
Please enter the year: 
-3
Bad year

Process finished with exit code 1</code></pre>
</div>
<br />


Sample of bad month input:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\EX6\cmake-build-debug\EX6.exe
Please enter the year: 
2021
Please enter the month:
13
Bad month

Process finished with exit code 1</code></pre>
</div>
<br />


Sample of proper input:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\EX6\cmake-build-debug\EX6.exe
Please enter the year: 
2021
Please enter the month:
7
That month has/had 31 days.

Process finished with exit code 0</code></pre>
</div>


</div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should handle both valid inputs and error cases appropriately.
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