<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 2</title>
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
                        <h4 class="page-title">Prog2007 - Lab 2<br>
                        Calculator</h4>
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

                            <?php
                                $int1 = rand(min: 10, max: 100);
                                $int2 = rand(min: 10, max: 100);

                                if($int1 >= $int2){
                                    $val1 = $int1;
                                    $val2 = $int2;
                                }else{
                                    $val1 = $int2;
                                    $val2 = $int1;
                                }
                            ?>

                            <?php include_once("components/lab_evaluation_instructions.php"); ?>

<h4>Lab 2 - Calculator</h4>
<p>
Using the program in example 2.6 (page 18) of the textbook as a guide<br>
create a program that <strong>stores the values <?php echo($val1) ?> and <?php echo($val2) ?> in two variables</strong><br>
and outputs the result of <strong>adding</strong>, <strong>subtracting</strong>, <strong>multiplying</strong>, and <strong>dividing</strong> them.
</p>



<h5>Desired Output</h5>
<div class="row">
<div class="col-lg-6">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
The sum of <?php echo($val1) ?> and <?php echo($val2) ?> is <?php echo(round(($val2 + $val1), 2)); ?>

The difference of <?php echo($val1) ?> and <?php echo($val2) ?> is <?php echo(round(($val1 - $val2), 2)); ?>

The product of <?php echo($val1) ?> and <?php echo($val2) ?> is <?php echo (round(($val1 * $val2), 2)); ?>

The result of dividing <?php echo($val1) ?> by <?php echo($val2) ?> is <?php echo (round(($val1 / $val2), 2)) ?>

</code></pre>
</div>
</div>
</div>
<br />
<br />


<p>Then, uncomment and fix the indicated block of code. It should now include:</p>
<div class="row">
    <div class="col-lg-6">
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
The answer is 43</code></pre>
        </div>
    </div>
</div>

<br />
<h5>Sample Output</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="bg-dark p-3 text-light">
                                            <pre><code class="text-light">
path\to\your\file\EX2.exe
The sum of <?php echo($val1) ?> and <?php echo($val2) ?> is <?php echo(round(($val2 + $val1), 2)); ?>

The difference of <?php echo($val1) ?> and <?php echo($val2) ?> is <?php echo(round(($val1 - $val2), 2)); ?>

The product of <?php echo($val1) ?> and <?php echo($val2) ?> is <?php echo (round(($val1 * $val2), 2)); ?>

The result of dividing <?php echo($val1) ?> by <?php echo($val2) ?> is <?php echo (round(($val1 / $val2), 2)) ?>

The answer is 43

Process finished with exit code 0</code></pre>
                                        </div>
                                    </div>
                                </div>

                                <br />
<h5>Examples and Testing</h5>
<p>The image above shows the expected output from a successful execution of the program.
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