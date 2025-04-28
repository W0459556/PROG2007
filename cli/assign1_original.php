<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog1700 - Assignment 1</title>
    <?php include_once("head.php"); mt_srand(); ?>
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
        <?php include_once("header.php"); ?>
        <?php include_once("navmenu.php"); ?>
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Prog1700 - Assignment 1<br>
			Console Applications, Variables, Input &amp; Output</h4>
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
                            <div class="card-body">
                                <h4>Student ID</h4>
                                <p>
                                You must submit the activity associated with your ID number in order
                                to receive credit for the activity. Make sure to enter your correct ID including the first letter.
                                </p>
                                <div class="form-horizontal">
                                    <div class="form-group row">
                                    <label for="sid" class="col-sm-1 text-right control-label col-form-label">Student ID:</label>
                                    <div class="col-sm-11">
                                     <input type="text" class="form-control" id="sid" placeholder="Student ID">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                     <button class="btn btn-primary" onclick="generateActivity()">Generate Activity</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- editor -->
                <div class="row">
                    <div class="col-12">
                        <div id='activity-card' class="card">
                            <div class="card-body">
<div class="alert alert-danger">
<h4>Submission of Work</h4>
<p>Late submissions will receive the standard late submission penalty as 
stated in the course outline. (10% overall deduction per day late, until 60%, or up to 4 days)</p>
<p>
You will submit your work for this assignment via GitHub. While you will 
have frequent commits/pushes of your assignment code to GitHub as your work 
on it, the instructor needs to know which version to mark and when it was committed.
So, when you have completed all assignment work, put a "Ready for Marking" 
comment on the last code committed into GitHub. Then submit a simple text 
document to the Brightspace Dropbox that contains the git Commit ID string 
(e.g., "b180b37") that identifies that commit. It is this Dropbox submission 
that will be used to determine late penalties, so make sure to do so prior 
to the assignment deadline.
</p>
<p>
Once you have committed the code, make sure to visit the repository page on 
GitHub’s website to verify that the final version has been pushed to GitHub 
as that is where the instructor will go to get your code.
</p>
<p><strong>Also, since each student gets an individualized assignment, you must ensure to upload this instruction page to GitHub as well.
Right-click anywhere on the page and choose Print. From the list of printers, select PDF, save the instructions to PDF and upload to GitHub.</strong></p>
</div>
<h4>Evaluation</h4>
<p>
To ensure the greatest chance of success on this assignment, be sure to check 
the marking rubric contained at the end of this document or in Brightspace. 
The rubric contains the criteria your instructor will be assessing when 
marking your assignment.
</p>
<h4>Assignment Instructions</h4>
<p>
Use any IDE or IDLE to create console applications (.py files) in which 
you will code the answer for each of the following problems.
<strong>You must create a new .py file for each question in this assignment.</strong>
</p>

<?php
$names = ["Dylan", "Kiera", "Laryn", "Safaa", "Aaron", "Sean", "Carson", "Rose", "Hannah", "Marshall", "Shelby"];
$biz  = ["Local Records", "Coffee Shop", "Pizzeria", "Falafel Emporium"];
$btyp = ["vinyl records", "gourmet coffee", "pizza & panzerotti", "falafel & shawarma"];
$xtra = ["federal sales tax", "provincial sales tax", "convenience surcharge", "service charge"];
$dist = ["15", "11", "13", "17", "19"]; // random charge per km
$perc = ["11%", "13%", "15%", "9%"]; // random tax amount

$shop = $biz[mt_rand(0,3)];
$bill = $btyp[mt_rand(0,3)];
$ext1 = $xtra[mt_rand(0,2)];
//  $ext2 = $ext1 == "tip" ? "gratuity" : "tip"; // just in case we need it
$tax = $perc[mt_rand(0,3)];
$ext2= $perc[mt_rand(0,3)];



/*
  $tax = ["27%", "11%", "15%", "18%", "20%", "22%", "8%"];
  $dep = ["5%", "1%", "2%", "3%", "4%", "6%"];

  shuffle($ded);
  $random = array_rand($ded);
  $ded1 = $ded[$random];
  unset($ded[$random]);
  shuffle($ded);
  $random = array_rand($ded);
  $ded2 = $ded[$random];
  $dev = $device[mt_rand(0,3)];
  shuffle($tax);
  $random = array_rand($tax);
  $tax1 = $tax[$random];
  unset($tax[$random]);
  shuffle($tax);
  $random = array_rand($tax);
  $tax2 = $tax[$random];
*/

?>


<?php
//echo " in case we need <span class='stand-out'>" .mt_rand(3, 5). "</span>";
?>



<?php
  shuffle($names);
  $name1  = array_pop($names);
  $random = array_rand($biz);
  $biz1 = $biz[$random];
?>
<h4>Program 1 - <?php echo $name1 ."'s ". $biz1; ?></h4>
<p>
<?php echo $name1 ."'s ". $biz1; ?> sells and delivers 
<?php echo $btyp[$random]; ?> to their customers.
Delivery is charged at a rate of <strong>$<?php
  shuffle($dist);
  $randist = array_rand($dist);
  $distChrg1 = $dist[$randist];
  echo $distChrg1;
?>
</strong> per kilometer.
</p>

<p>All purchases are subject to a <strong><?php
  shuffle($perc); shuffle($xtra);
  $randperc = array_rand($perc); $randxtra = array_rand($xtra);
  $perc1 = $perc[$randperc]; $chrg1 = $xtra[$randxtra];
  echo $perc1 ." ". $chrg1;
?>
</strong>.</p>

<p>
Because this store loves technology, you have been asked to develop a console 
application solution that will enable the company’s retail staff to calculate 
receipts. Begin by designing your solution to this problem in <strong>pseudocode</strong>, which 
will be submitted along with the program. The program user must be able to 
input the customer's name, the number of kilometers distance, and the cost of 
any product purchased. Once the input is provided, the program will display the 
customer's name and three calculated costs:
<ul>
<li>delivery cost,</li>
<li><?php echo $btyp[$random]; ?> cost (plus any additional cost), and</li>
<li>total cost</li>
</ul>
as shown below.</p>

<h5>Examples and Testing</h5>

<p>
In the section below you will be presented with at least one screenshot of a 
successful execution of a <strong>sample</strong> solution to a similar program, 
which should help demonstrate how your input/output on the program should work.
In addition to the sample values used in the screenshot(s), additional testing 
values are given in a chart along with the output values that they should produce.
You can expect your instructor to grade your assignment by using all of these 
listed input values at the very least, but keep in mind that additional 
values may also be used as well.<br>

<strong>In other words, you should thoroughly test your code before submitting!</strong>
</p>

<p><strong>Sample Output</strong> - Make sure your program can output data as shown below (but with your own parameters).</p>

<img src="img/asn1_1.png" width="50%"><br clear="all">

<p><strong>Some other sample testing values:</strong></p>
<table style="width:75%; border:1px solid black;">
<tr><th style="border:1px solid black;">Distance (km)</th><th style="border:1px solid black;">Records Cost</th><th style="border:1px solid black;">Delivery Cost</th><th style="border:1px solid black;">Purchase Cost</th><th style="border:1px solid black;">Total Cost</th></tr>
<tr><td style="border:1px solid black;">12</td><td style="border:1px solid black;">$259.99</td><td style="border:1px solid black;">$180.00</td><td style="border:1px solid black;">$296.39</td><td style="border:1px solid black;">$476.39</td></tr>
<tr><td style="border:1px solid black;">7.5</td><td style="border:1px solid black;">$129.95</td><td style="border:1px solid black;">$112.50</td><td style="border:1px solid black;">$148.14</td><td style="border:1px solid black;">$260.64</td></tr>
</table>

<p></p>

<?php
  $tools   = ["Weekly Loan", "Monthly Mortgage"];
  $devices = ["Calculator", "Assessor", "Estimator"];
  shuffle($tools);
  $tool  = array_pop($tools);
  $random = array_rand($devices);
  $device = $devices[$random];
  $len = $tool[0] == 'W' ? "weekly" : "monthly";
?>
<h4>Program 2 - <?php echo $tool ." ". $device; ?></h4>
<p>
Develop a short-term loan calculator program as a console application with the
following specifications. Begin by designing your solution to this problem in
<strong>pseudocode</strong>, which will be submitted along with the program.

If <strong><em>A</em></strong> dollars are borrowed at <strong>r%</strong> interest, compounded 
<?php echo $len; ?>, to purchase something with <?php echo $len; ?> payments for
<strong>n</strong> years, then the <?php echo $len; ?> payment is given by the formula:<br>

<?php
if ($tool[0] == 'W') {
	echo "<blockquote><strong>i = r / 5200</strong></blockquote>";
} else {
	echo "<blockquote><strong>i = r / 1200</strong></blockquote>";
}
?>
</p>

<p>Then, calculate the <?php echo $len; ?> payment as:<br>
<?php
if ($tool[0] == 'W') {
	echo "<blockquote><strong>$len payment = ( i / (1 – (1 + i)-52n) ) * A</strong></blockquote>";
} else {
	echo "<blockquote><strong>$len payment = ( i / (1 – (1 + i)-12n) ) * A</strong></blockquote>";
}
?>
</p>

<p>
Write a console application that calculates the <?php echo $len; ?> payment
after the user gives the amount of the loan, interest rate, and number of years.
</p>

<h5>Examples and Testing</h5>

<p>In the section below you will be presented with at least one screenshot of
a successful execution of a sample solution to the program, which should help
demonstrate how your input/output on the program should work. In addition to
the sample values used in the screenshot(s), additional testing values are
given in a chart along with the output values that they should produce.<br>
You can expect your instructor to grade your assignment by using all of these
listed input values at the very least, but keep in mind that additional values
may also be used as well.<br>
<strong>In other words, you should thoroughly test your code before submitting!</strong>
</p>

<p><strong>Sample Output</strong> - Make sure your program can output data as shown below (but with your own parameters).</p>

<img src="img/asn1_2.png" width="50%"><br clear="all">

<p><strong>Some other sample testing values:</strong></p>
<table style="width:75%; border:1px solid black;">
<tr><th style="border:1px solid black;">Loan Amount</th><th style="border:1px solid black;">Interest Rate</th><th style="border:1px solid black;">Number of Years</th><th style="border:1px solid black;">Periodic Payment</th></tr>
<tr><td style="border:1px solid black;">36000</td><td style="border:1px solid black;">3.4</td><td style="border:1px solid black;">6</td><td style="border:1px solid black;">$127.59</td></tr>
<tr><td style="border:1px solid black;">23500</td><td style="border:1px solid black;">2.8</td><td style="border:1px solid black;">4</td><td style="border:1px solid black;">$119.46</td></tr>
</table>

<p></p>
<?php
  $convert   = ["Weight", "Volume", "Area", "Length"];
  $units = ["tons, pounds, ounces", "gallons, quarts, pints", "acres, square feet, square inches", "miles, feet, inches"];
  $convRate   = ["35.274", "2.1134", "1550.003", "39.37"];
  $formula   = ["total ounces = (35840 * tons) + (224 * stone) + (16 * pounds) + ounces<br>\ntotal kilos = total ounces / 35.274<br>\nmetric tons = INT(kilos/1000)", "total pints = (8.00002 * gallons) + (2 * quarts) + pints<br>\ntotal liters = total pints / 2.1134", "total sq inches = (6272637.138 * acres) + (143.999 * sqfeet) + square inches<br>\ntotal sq meters= total sq inches / 1550.003", "total inches = (63360 * miles) + (12 * feet) + inches<br>\ntotal meters= total inches / 39.37"];

  $random = array_rand($convert);
  $choice1  = $convert[$random];
  $choice2 = $units[$random];
  $choice3 = $convRate[$random];
//  $len = $tool[0] == 'W' ? "weekly" : "monthly";
?>
<h4>Program 3 - Imperial to Metric <?php echo $choice1; ?> Conversion</h4>

<p>
Write a console program that converts a(n) <?php echo lcfirst($choice1); ?> given
in <?php echo $choice2; ?> to the metric equivalent in metric units.<br>
Begin by designing your solution to this problem in <strong>pseudocode</strong>,
which will be submitted along with the program.
</p>
<p>
After the numbers of <?php echo $choice2; ?> are input by the user, the 
<?php echo lcfirst($choice1); ?> should be converted entirely into the lowest
common denominator, or the smallest unit of Imperial (e.g. ounces, or inches)
and then divided by <?php echo $choice3; ?> to obtain the value in metric 
(e.g. liters, or meters).<br>
The Python int function should be used to break the total numbers from, for example,
kilos into a whole number of metric tons and kilos. The smallest metric unit, 
for example, number of grams, should be displayed to one decimal place.
</p>

<p><strong>Required formulas:</strong></p>
<blockquote>
<?php echo $formula[$random] ?>
</blockquote>

<h5>Examples and Testing</h5>
<p>In the section below you will be presented with at least one screenshot of a
successful execution of a sample solution to the program, which should help
demonstrate how your input/output on the program should work. In addition to
the sample values used in the screenshot(s), additional testing values are given
in a chart along with the output values that they should produce. You can expect
your instructor to grade your assignment by using all of these listed input values
at the very least, but keep in mind that additional values may also be used as well.<br>
<strong>In other words, you should thoroughly test your code before submitting!</strong>
</p>

<p><strong>Sample Output</strong> - Make sure your program can output data as shown below (but with your own parameters).</p>

<img src="img/asn1_3.png" width="50%"><br clear="all">

<p><strong>Some other sample testing values:</strong></p>
<table style="width:75%; border:1px solid black;">
<tr><th style="border:1px solid black;">Tons</th><th style="border:1px solid black;">Stones</th><th style="border:1px solid black;">Pounds</th><th style="border:1px solid black;">Ounces</th><th style="border:1px solid black;">Output</th></tr>
<tr><td style="border:1px solid black;">8</td><td style="border:1px solid black;">340</td><td style="border:1px solid black;">1</td><td style="border:1px solid black;">4</td><td style="border:1px solid black;">The metric weight is 10 metric tons, 288 kilos, and 30.8 grams.</td></tr>
<tr><td style="border:1px solid black;">24</td><td style="border:1px solid black;">78</td><td style="border:1px solid black;">0</td><td style="border:1px solid black;">10</td><td style="border:1px solid black;">The metric weight is 24 metric tons, 880 kilos, and 705.3 grams.</td></tr>
</table>

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
    <?php include_once("bodyscripts.php"); ?>
    <script>
        function generateActivity() {
            let sid = document.getElementById("sid").value;
            if (sid.charAt(0).toLowerCase() != 'w' || sid.length != 8) {
            window.alert('Please enter your proper NSCC student id number including the first letter.');
            return
            }
            $.ajax({
                url: "ajaxservices/asn1.php?id=" + sid,
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
