<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 7</title>
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
                        <h4 class="page-title">Prog2007 - Lab 7<br>
                        High Scores</h4>
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

<h4>Lab 7 - High Scores</h4>
<p>
You will create a header file called <strong>"inc/highScores.h"</strong> that has two structs defined in it. The first struct will look like the <strong>Date</strong> one from the textbook examples from Chapter 8. The second struct will be called <strong>Player</strong> and will contain a string for the <strong>userName</strong> and <strong>score</strong>. It will also contain a <strong>date</strong> (i.e. using the first struct) of the date the high score was recorded.
</p>

<p>
In <strong>main.c</strong> (which you must move into a <strong>"src"</strong> subfolder), ask the user to enter the relevant details for each user, score, and date in a loop until they enter a "Q" for the user name. Store each entry within an <strong>array of Player structs</strong>. The array can have a max size of 5 but may store less scores depending on when the user enters a "Q". In the example shown below, there are only two entries and in the tests there will be three.
</p>

<p>
Then, in <strong>"inc/highScores.h"</strong> declare a void returning function called:<br>
<code>printHighScores(int bestPlayerCount, struct Player *bestPlayers)</code>
</p>

<p>
Implement that function in a new source file called <strong>"src/highScores.c"</strong>. Have the function nicely print out all the entered high scores as shown in the example below after "Q" has been entered.
</p>

<h5>Sample Output</h5>
<div class="row">
<div class="col-lg-5">


Sample of proper input of 2 scores:
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\EX7\cmake-build-debug\EX7.exe

Enter the player name (Q to quit):Mario
Enter the score: 78500
Enter the month: 3
Enter the day: 18
Enter the year: 2019

Enter the player name (Q to quit):Luigi
Enter the score: 50000
Enter the month: 12
Enter the day: 25
Enter the year: 2018

Enter the player name (Q to quit):Q
Quitting...

High Scores

Mario   78500   4/18/2019
Luigi   50000   12/25/2018

Process finished with exit code 0</code></pre>
</div>


</div>
</div>
<br />

<h5>Examples and Testing</h5>
<p>The program should handle multiple score entries and display them correctly when quitting.
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