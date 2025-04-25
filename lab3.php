<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 3</title>
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
                        <h4 class="page-title">Prog2007 - Lab 3<br>
                        OBP Calculator</h4>
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

<h4>Lab 3 - OBP Calculator</h4>
<p>
We can calculate a baseball player's <strong>OBP</strong> (On-base plus Slugging) Percentage<br>
using the following formula given here:<br>
<a href="https://en.wikipedia.org/wiki/On-base_percentage#Overview" target="_blank">https://en.wikipedia.org/wiki/On-base_percentage#Overview</a>
</p>

<p>
We can calculate their <strong>SLG</strong> (Slugging Percentage) by the formula given here:<br>
<a href="https://en.wikipedia.org/wiki/Slugging_percentage" target="_blank">https://en.wikipedia.org/wiki/Slugging_percentage</a>
</p>

<p>
We can calculate their <strong>OPS</strong> (On-base Plus Slugging) by simply adding the OBP and SLG
</p>

<p>
Use these variable values (<strong>Make sure to declare them as INT data types</strong>):
</p>

<?php
    $at_bats = rand(450, 650);
    $hits = rand(120, min($at_bats, 250));
    $homeruns = rand(10, 40);
    $triples = rand(0, 5);
    $doubles = rand(20, 50);
    $total_extras = $homeruns + $triples + $doubles;
    $singles = max(0, $hits - $total_extras);
    $walks = rand(30, 60);
    $hit_by_pitch = rand(1, 10);
    $sacrifice_flies = rand(1, 10);

     $plate_appearances = $at_bats + $walks + $hit_by_pitch + $sacrifice_flies;
    
     $times_on_base = $hits + $walks + $hit_by_pitch;
     $obp = $times_on_base / $plate_appearances;
     
     $total_bases = ($singles * 1) + ($doubles * 2) + ($triples * 3) + ($homeruns * 4);
     
     $slg = $total_bases / $at_bats;
     
     $ops = $obp + $slg;
     
     $obp_formatted = number_format($obp, 3);
     $slg_formatted = number_format($slg, 3);
     $ops_formatted = number_format($ops, 3);
?>

<div class="row">
    <div class="col-lg-5">
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
At-bats: <?php echo($at_bats) ?>

Hits: <?php echo($hits) ?>

Singles: <?php echo($singles) ?>

Doubles: <?php echo($doubles) ?>

Triples: <?php echo($triples) ?>

Homeruns: <?php echo($homeruns) ?>

Walks: <?php echo($walks) ?>

Hit-by-Pitches: <?php echo($hit_by_pitch) ?>

Sacrifice-Flies: <?php echo($sacrifice_flies) ?></code></pre>
        </div>
    </div>
</div>
<br />

<p>
Output all three values OBP, SLG, and OPS on three different lines so all tests pass.<br>
It is okay to have more decimal places than the test is looking for (only 3).
</p>

<p>
<strong>INFO:</strong> Any OPS over .900 is considered great (i.e. Josh Donaldson had .939 the year he won the MVP for the Blue Jays, although Mike Trout had a .991 that year)
</p>

<h5>Sample Output</h5>
<div class="row">
    <div class="col-lg-5">
        <div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\EX3\cmake-build-debug\EX3.exe
The hitter's OBP is: <?php echo($obp_formatted) ?>

The hitter's SLG is: <?php echo($slg_formatted) ?>

The hitter's OPS is: <?php echo($ops_formatted) ?>


Process finished with exit code 0</code></pre>
        </div>
    </div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should output the three calculated statistics with proper formatting.
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