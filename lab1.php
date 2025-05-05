<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 1</title>
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
                        <h4 class="page-title">Prog2007 - Lab 1<br>
                        Basic Output</h4>
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
                            <?php
                                require("/home/breanna/public_html/config.php");
                                mt_srand();
                                $db = connect_db();

                                $result = $db->query("SELECT id, question FROM prog2007_lab1 ORDER BY RAND() LIMIT 1")->fetch(PDO::FETCH_ASSOC);
                                $answerIndex = ($result['id']-1);
                                $questionText = $result['question'];
                                $answerArray = ["*\n**\n***\n****\n*****",
                                                "5050",
                                                "First Name: John\nLast Name: Doe\n\nJohn Doe",
                                                "78.54", "065, 066, 067, 068, 069, 070, 071, 072, 073, 074, 075, 076, 077, 078, 079, 080, 081, 082, 083, 084, 085, 086, 087, 088, 089, 090",
                                                "1\n2\n3\n4\n5",
                                                "Temperature in Celsius: 5\n\n5 degrees Celsius is 41 degrees Fahrenheit",
                                                "   1   2   3   4   5   6   7   8   9  10\n7  7  14  21  28  35  42  49  56  63  70",
                                                "Hello World\n\"Welcome to C Programming\"",
                                                "3.142"
                                            ];
                                $answer = $answerArray[$answerIndex];
                            ?>


<h4>Lab 1 - Basic Output</h4>
<p>
<pre>
<?php echo htmlspecialchars($questionText); ?>
</pre>
</p>

<h5>Sample Output</h5>
<div class="row">
<div class="col-lg-5">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
path\to\your\file\EX1.exe
<?php echo($answer); ?>


Process finished with exit code 0
</code></pre>
</div>
</div>
</div>
<br />
<h5>Examples and Testing</h5>
<p>In the section above you can see a screenshot of
a successful execution of a sample solution to the program, which demonstrates
how your input/output on the program should work.
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