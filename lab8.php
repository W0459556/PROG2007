<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 8</title>
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
                        <h4 class="page-title">Prog2007 - Lab 8<br>
                        Term Grades</h4>
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

<h4>Lab 8 - Term Grades</h4>
<p>
You will create a header file called <strong>"inc/termGrades.h"</strong> that has a <strong>struct</strong> and <strong>union</strong> defined in it. The Union will be called <strong>Grade</strong> and will look like my example from today's slides. The Struct will be called <strong>Course</strong> and will also look like the one from my slides with one change: add an integer value called gradeCode that will hold 0 for letter grades, 1 for GPA, & 2 for numeric grades.
</p>

<p>
<strong>Now, uncomment the code block marked "BLOCK 1" in main.c.</strong>
</p>

<p>
You should see following output and the first 7 tests should pass:
</p>

<div class="row">
<div class="col-lg-5">


Sample of full output:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
path\to\your\file\EX8.exe
The final mark for APPD1001 is a A-.
The final mark for COMM2700 is a 3.3.
The final mark for DBAS4002 is a 73.
The final mark for OSYS1000 is a 3.7.
The final mark for PROG1400 is a B.
The final mark for PROG2007 is a 88.
The final mark for SAAD1001 is a C-.

Process finished with exit code 0</code></pre>
</div>
</div>
</div>
<br />
<p>
Then, declare the following function in the <strong>"inc/termGrades.h"</strong> file:<br>
<code>float calculateTermGPA(int numCourses, struct Course courseList[]);</code>
</p>

<p>
Implement that function in a new source file called <strong>"src/termGrades.c"</strong>. The function should calculate the term GPA for a passed in array of courses. You will need to use the saved gradeCode status in each course so you know which format the grade is in.
</p>

<p>
<strong>Uncomment "BLOCK 2" in main.c and the last test should pass.</strong>
</p>

<p>
<strong>NOTE:</strong> Use the <strong>Alberta</strong> section of the following chart for grade conversions:<br>
<a href="https://gpacalculator.net/grade-conversion/canada/" target="_blank">https://gpacalculator.net/grade-conversion/canada/</a>
</p>

<h5>Sample Output</h5>
<div class="row">
<div class="col-lg-5">

Sample of full output:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
path\to\your\file\EX8.exe
The final mark for APPD1001 is a A-.
The final mark for COMM2700 is a 3.3.
The final mark for DBAS4002 is a 73.
The final mark for OSYS1000 is a 3.7.
The final mark for PROG1400 is a B.
The final mark for PROG2007 is a 88.
The final mark for SAAD1001 is a C-.

Your Term GPA is: 3.2.
Process finished with exit code 0</code></pre>



</div>
</div>


</div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should handle different grade formats and calculate GPA correctly.
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