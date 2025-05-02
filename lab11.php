<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 11</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
    .bit-op-img {
        width: 100%;
        max-width: 600px;
        margin-bottom: 20px;
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
                        <h4 class="page-title">Prog2007 - Lab 11<br>
                        User-Selected Bit Operations</h4>
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

<h4>Lab 11 - User-Selected Bit Operations</h4>
<p>
We will use a version of this week's sample code to perform some user-selected bit operations.
</p>
<a href="https://www.geeksforgeeks.org/bitwise-operators-in-c-cpp/">Bitwise Operators in C by geeksforgeeks.org</a>

<table class="table table-striped">
    <tbody>
      <tr>
        <td>&</td>
        <td>AND</td>
        <td>takes two numbers as operands and does AND on every bit of two numbers. The result of AND is 1 only if both bits are 1.</td>
      </tr>
      <tr>
        <td>|</td>
        <td>OR</td>
        <td>takes two numbers as operands and does OR on every bit of two numbers. The result of OR is 1 if any of the two bits is 1.</td>
      </tr>
      <tr>
        <td>^</td>
        <td>XOR</td>
        <td>akes two numbers as operands and does XOR on every bit of two numbers. The result of XOR is 1 if the two bits are different.</td>
      </tr>
      
      <tr>
        <td><<</td>
        <td>left shift</td>
        <td>takes two numbers, the left shifts the bits of the first operand, and the second operand decides the number of places to shift.</td>
      </tr>
      <tr>
        <td>>></td>
        <td>right shift</td>
        <td>takes two numbers, right shifts the bits of the first operand, and the second operand decides the number of places to shift.</td>
      </tr>
    </tbody>
  </table>
<h5>STEPS:</h5>
<p>
You have already been provided with <strong>"src/main.c"</strong>, <strong>"src/binOps.c"</strong> and <strong>"inc/binOps.h"</strong> files. The binOps.h/binOps.c files already contains a function to output an integer as a binary string. The main.c file is mostly blank at present but does link in the binOps.h header file.
</p>

<p>
<strong>Now, implement the code marked by "TODO's" in main.c to support the following TWO operations:</strong>
</p>

<?php
$randWrong = ["a", "b", "asdghjk", "5", "8675309", "~", "qwerty", "lorem", "ipsum", "+", "++", "--",
"\"", "and", "or", "if", "else", "while", "dowhile", "elif", "elseif", "for", "return"];

$opSymbols = ['&', '|', '^', '<<', '>>'];
$randOpsArr = array_rand($opSymbols, 2);
$op1 = $opSymbols[$randOpsArr[0]];
$op2 = $opSymbols[$randOpsArr[1]];

sort($randOpsArr);
$displayOps = [$opSymbols[$randOpsArr[0]], $opSymbols[$randOpsArr[1]]];

function genEx($opSymbol, $displayOps) {
    $int1 = rand(1, 256);
    $int2 = rand(1, 10);

    switch ($opSymbol) {
        case '&': $result = $int1 & $int2; break;
        case '|': $result = $int1 | $int2; break;
        case '^': $result = $int1 ^ $int2; break;
        case '<<': $result = $int1 << $int2; break;
        case '>>': $result = $int1 >> $int2; break;
    }
    
    $binary = str_pad(decbin($result), 32, '0', STR_PAD_LEFT);
    
    $output = "Please enter a positive integer value:\n$int1\n";
    $output .= "Please enter an operator ($displayOps[0], $displayOps[1]):\n$opSymbol\n";
    
    if ($opSymbol == '<<' || $opSymbol == '>>') {
        $output .= "Please enter the number of spaces to shift the bits:\n$int2\n\n";
    } else {
        $output .= "Please enter another positive integer value:\n$int2\n\n";
    }
    
    $output .= "The result is:          $binary - $result\n";
    return $output;
}

$ex1 = genEx($op1, $displayOps);
$ex2 = genEx($op2, $displayOps);
?>

<ul>
    <li><strong><?= $displayOps[0] ?></strong></li>
    <li><strong><?= $displayOps[1] ?></strong></li>
</ul>

<h5>Sample Outputs</h5>
<div class="row">

<div class="col-lg-6">
<div class="bg-dark p-3 text-light mb-3">
<pre><code class="text-light">
C:\PROG2007\EX11\cmake-build-debug\EX11.exe
<?php echo ($ex1)?>
Process finished with exit code 0</code></pre>
</div>

<div class="bg-dark p-3 text-light mb-3">
<pre><code class="text-light">
C:\PROG2007\EX11\cmake-build-debug\EX11.exe
<?php echo ($ex2)?>
Process finished with exit code 0</code></pre>
</div>

<h6>Bad Operator</h6>
<div class="bg-dark p-3 text-light mb-3">
<pre><code class="text-light">
C:\PROG2007\EX11\cmake-build-debug\EX11.exe
Please enter a positive integer value:
<?php echo (rand(1,256)); ?>

Please enter an operator (<?php echo ($displayOps[0] . ", " . $displayOps[1])?>):
<?php echo ($randWrong[(rand(0,(count($randWrong)-1)))]); ?>


Sorry, bad operator.

Process finished with exit code 1</code></pre>
</div>

<h6>Bad Integer</h6>
<div class="bg-dark p-3 text-light mb-3">
<pre><code class="text-light">
C:\PROG2007\EX11\cmake-build-debug\EX11.exe
Please enter a positive integer value:
<?php echo ((rand(1,256))*-1); ?>

Please enter a positive integer.

Process finished with exit code 1</code></pre>
</div>

</div>
</div>

<h5>Examples and Testing</h5>
<p>The program should correctly perform the specified bit operations.
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