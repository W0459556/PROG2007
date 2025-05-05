<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 4</title>
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
                        <h4 class="page-title">Prog2007 - Lab 4<br>
                        Highest Common Divisor</h4>
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

<h4>Lab 4 - Highest Common Divisor</h4>
<p>
Using the program in example 4.7 (page 58) of the textbook as a guide:
</p>

<p>
<strong>To calculate the Highest Common Divisor of two whole numbers, we must find the highest number which evenly divides both values.</strong>
</p>

<p>
We will want to report appropriate errors and <strong>return an error code</strong> (use <strong>1</strong> to make tests pass) if zeros or negative numbers are entered.
</p>

<p>
If the program runs successfully (i.e. it did not error out as mentioned above), then prompt the user to continue entering new numbers to check.
</p>

<h5>Sample Output</h5>
<div class="row">
    <div class="col-lg-5">

        Sample of erroneous negative number input:
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
path\to\your\file\EX4.exe

Please enter the first number: -8
Please enter the second number: 6
Sorry, you cannot enter a negative number.

Process finished with exit code 1</code></pre>
        </div>
        <br />

        Sample of erroneous zero input:
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
path\to\your\file\EX4.exe

Please enter the first number: 9
Please enter the second number: 0
Sorry, you cannot enter 0

Process finished with exit code 1</code></pre>
        </div>
        <br />

        Sample of proper input:
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
path\to\your\file\EX4.exe

Please enter the first number: 32
Please enter the second number: 40
The HCD of 32 and 40 is: 8

Do you want to continue? (Y/N)?: Y

Please enter the first number: 93
Please enter the second number: 6
The HCD of 93 and 6 is: 3

Do you want to continue? (Y/N)?: N

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
//                    listContent += `<li><code><span class='stand-out'>${res.randStr}</span></code></li>`
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