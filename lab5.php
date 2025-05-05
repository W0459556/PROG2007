<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 5</title>
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
                        <h4 class="page-title">Prog2007 - Lab 5<br>
                        Grades</h4>
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

<h4>Lab 5 - Grades</h4>
<?php $amount = rand(4,6); ?>
<p>
Using the grades arrays examples from the Arrays video as a guide:
</p>

<p>
<strong>Ask the user to enter <span class='stand-out'><?php echo($amount) ?></span> grades for an NSCC term and store them in a one-dimensional array. If they entered <span class='stand-out'><?php echo($amount) ?></span> good grades, output the term average grade value to one decimal place. Then ask the user for a grade number to display and retrieve and print that value from the array. Do NOT refer to the first grade as "Grade 0" as users do not need to know our arrays start at zero.</strong>
</p>

<p>
At any point, if the user enters a grade that is negative or greater than 100, output the correct message and return an error code of 1.
</p>

<p>
<strong>NOTE:</strong> It would be good to use a <strong>preprocessor macro definition</strong> for the size of the array.
</p>

<h5>Sample Outputs</h5>
<div class="row">
<div class="col-lg-5">


Sample of erroneous negative number input:
<div class="bg-dark p-3 text-light"><pre><code class="text-light">
path\to\your\file\EX5.exe
Please enter Grade 1:
99
Please enter Grade 2:
78
Please enter Grade 3:
65
Please enter Grade 4:
-20

You cannot enter negative grades.

Process finished with exit code 1</code></pre>
</div>
<br />


Sample of erroneous "too high" input:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
path\to\your\file\EX5.exe
Please enter Grade 1:
83
Please enter Grade 2:
155

You cannot enter grades above 100.

Process finished with exit code 1</code></pre>
</div>
<br />
<?php
$grades = [];

// Generate between 4-6 random grades (50-100)
for ($i = 0; $i < $amount; $i++) {
    $grades[] = rand(50, 100);
}

// Calculate average
$average = array_sum($grades) / count($grades);
?>

Sample of proper input:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
path\to\your\file\EX5.exe
Please enter Grade 1:
<?php echo ($grades[0]); ?>

Please enter Grade 2:
<?php echo ($grades[1]); ?>

Please enter Grade 3:
<?php echo ($grades[2]); ?>

Please enter Grade 4:
<?php echo ($grades[3]); ?>

<?php
if ($amount >= 5) {
    echo "Please enter Grade 5:\n";
    echo ($grades[4]);
    echo ("\n");
};

if ($amount >= 6) {
    echo "Please enter Grade 6:\n";
    echo ($grades[5]);
    echo ("\n");
};
?>

Your average for the term is: <?php echo (number_format((float)$average, 1, '.', '')); ?>


Which grade do you want to look up?
3

Grade 3: <?php echo ($grades[2]); ?>


Process finished with exit code 0</code></pre>
</div>


</div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should handle both valid grade inputs and error cases appropriately.
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