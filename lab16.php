<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 16</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
    </style>
</head>


<?php
$randRecords = rand(3, 6);
$randStudents = rand(2, 4);

require("/home/breanna/public_html/config.php");
mt_srand();
$db = connect_db();

// $operation = $db->query("SELECT op_code, op_name FROM prog2007_lab16 ORDER BY RAND() LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
$operation = [
    [
        "-s",
        "-a",
        "-mx",
        "-mn",
    ],
    [
        "sum",
        "average",
        "maximum",
        "minimum",
    ],
];

$s = rand(0,3);
// $opCode = $operation['op_code'];
// $opName = $operation['op_name'];

$opCode = $operation[0][$s];
$opName = $operation[1][$s];

$arraySize = rand(4,10);
$values = [];
for ($i = 0; $i < $arraySize; $i++) {
    $values[] = rand(-500, 1000);
}

switch ($opCode) {
    case '-s':
        $result = array_sum($values);
        break;
    case '-a':
        $result = array_sum($values) / count($values);
        break;
    case '-mx':
        $result = max($values);
        break;
    case '-mn':
        $result = min($values);
        break;
}

$result = number_format($result, 1);
?>
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
<strong>Operation:</strong><br>
<strong><?php echo ($opCode)?></strong> = <?php echo ($opName)?><br>
</p>

<p>
Example: <code>.\EX16.exe -a 7</code>
</p>

<p>
If proper arguments are used, show the result to one decimal place.
</p>

<h5>Sample Outputs</h5>
<div class="row">
    <div class="col-lg-6">
        <!-- Always show these error examples -->
        <h5>Improper number of arguments</h5>
        <div class="bg-dark p-3 text-light"><pre><code class="text-light">
PS path\to\your\file> .\EX16.exe one
Sorry, bad number of command line arguments.</code></pre></div>
        <br />

        <h5>Improper operator</h5>
        <div class="bg-dark p-3 text-light"><pre><code class="text-light">
PS path\to\your\file> .\EX16.exe -k 5
Sorry, bad operator.</code></pre></div>
        <br />

        <!-- Dynamic examples based on selected operation -->
        <?php if ($opCode == '-s'): ?>
        <h5>Array sum</h5>
        <div class="bg-dark p-3 text-light"><pre><code class="text-light">
PS path\to\your\file> .\EX16.exe -s <?= $arraySize ?>

<?php foreach ($values as $i => $value): ?>
Enter value #<?= $i+1 ?>: <?= $value ?>

<?php endforeach; ?>

The result is <?= $result ?>.</code></pre></div>
        <br />
        <?php endif; ?>

        <?php if ($opCode == '-a'): ?>
        <h5>Array average</h5>
        <div class="bg-dark p-3 text-light"><pre><code class="text-light">
PS path\to\your\file> .\EX16.exe -a <?= $arraySize ?>

<?php foreach ($values as $i => $value): ?>
Enter value #<?= $i+1 ?>: <?= $value ?>

<?php endforeach; ?>

The result is <?= $result ?>.</code></pre></div>
        <br />
        <?php endif; ?>

        <?php if ($opCode == '-mx'): ?>
        <h5>Array maximum</h5>
        <div class="bg-dark p-3 text-light"><pre><code class="text-light">
PS path\to\your\file> .\EX16.exe -mx <?= $arraySize ?>

<?php foreach ($values as $i => $value): ?>
Enter value #<?= $i+1 ?>: <?= $value ?>

<?php endforeach; ?>

The result is <?= $result ?>.</code></pre></div>
        <br />
        <?php endif; ?>

        <?php if ($opCode == '-mn'): ?>
        <h5>Array minimum</h5>
        <div class="bg-dark p-3 text-light"><pre><code class="text-light">
PS path\to\your\file> .\EX16.exe -mn <?= $arraySize ?>

<?php foreach ($values as $i => $value): ?>
Enter value #<?= $i+1 ?>: <?= $value ?>

<?php endforeach; ?>

The result is <?= $result ?>.</code></pre></div>
        <br />
        <?php endif; ?>
    </div>
</div>

<br />
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