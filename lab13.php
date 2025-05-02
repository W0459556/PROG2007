<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 13</title>
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
                        <h4 class="page-title">Prog2007 - Lab 13<br>
                        Leap Year Refactor</h4>
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

<h4>Lab 13 - Leap Year Refactor</h4>
<p>
<strong>NOTE:</strong> One of the typical tasks of a programmer is to go back to old code, which is already "running" and <strong>refactor</strong> it to make the code cleaner, more efficient, etc.
</p>

<p>
<strong>Refactoring</strong> is not always as exciting as building a new application, but it is necessary. It is particularly useful for you as students, once you learn new techniques, to see how we could go back to an old application and make it better.
</p>

<h5>TASK:</h5>
<p>
We are going to refactor our solution to Exercise 6. As a reminder, it calculated how many days were in a specified month for a given year.
</p>

<h5>STEP 1:</h5>
<p>
Take the leap year function that you already have and <strong>reimplement it as a preprocessor macro</strong>. You will probably want to do this in the included <strong>"inc/dates.h"</strong> file.<br>
Try to do it yourself, but if stuck you can refer to the example on page 306 in Chapter 12 of the book.
</p>

<h5>STEP 2:</h5>
<p>
Define an <strong>enumeration for the possible months</strong>. You will probably want to do this in the included <strong>"inc/dates.h"</strong> file.<br>
Try to do it yourself, but if stuck you can refer to the example on page 320 in Chapter 13 of the book.
</p>

<h5>STEP 3:</h5>
<p>
<strong>Use the enumeration in your function</strong> to calculate the days in a month. You will probably want to declare this function in the <strong>"inc/dates.h"</strong> file and define it in <strong>"src/dates.c"</strong>. The function should take in the enumeration data type instead of just an integer month code like before. The switch or if-else if block inside your function should operate on month enumeration values.
</p>

<h5>REMINDERs:</h5>
<ul>
    <li>Return a message of "Bad year" if a year outside of the range you were given in lab 6 is not entered and return 1 error code.</li>
    <li>Return a message of "Bad month" if a month between 1 and 12 is not entered and return 1 error code.</li>
    <li>"30 days has September, April, June, and November".</li>
</ul>

<h5>Sample Outputs (which should be the same as Exercise 6):</h5>
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