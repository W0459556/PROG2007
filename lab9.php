<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 9</title>
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
                        <h4 class="page-title">Prog2007 - Lab 9<br>
                        String Operations</h4>
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

<h4>Lab 9 - String Operations</h4>
<p>
We will create a program that performs some "string" operations based on an inputted sentence.
</p>

<h5>STEP 1:</h5>
<p>
You will create a header file called <strong>"inc/stringOperations.h"</strong> that has a single (for now) function declaration:<br>
<code>int charCount(char inputString[], char letterToFind);</code>
</p>

<p>
Then create a new source file called <strong>"src/stringOperations.c"</strong> that implements that function. The function should return a count of how many times the character "letterToFind" appears in the inputString. This count should include the letter in both lower and uppercase no matter how it is passed in to the function.
</p>

<p>
<strong>Now, uncomment the code block marked "BLOCK 1" in main.c.</strong>
</p>

<p>
You should see the following output using these inputs and tests #1 and #3 should pass:
</p>

<div class="row gx-5">  <!-- Added gx-5 for wide gutter -->
    <div class="col-md-6">
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
C:\PROG2007\EX9\cmake-build-debug\EX9.exe
Enter the sentence to search:
I code therefore I am
Enter the letter to count:
E
There are 4 E letters in 'I code therefore I am'

Process finished with exit code 0</code></pre>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
C:\PROG2007\EX9\cmake-build-debug\EX9.exe
Enter the sentence to search:
Imagination is more important than knowledge
Enter the letter to count:
i
There are 5 I letters in 'Imagination is more important than knowledge'

Process finished with exit code 0</code></pre>
        </div>
    </div>
</div>
<br />

<p>
<strong>NOTE:</strong> Try to understand how my "Block 1" code reads in an entire sentence and a character afterwards even if a newline might still be in the input buffer. You may also want to look for the include and the code that always outputs the letter in uppercase.
</p>

<h5>STEP 2:</h5>
<p>
You will add a function declaration to <strong>"inc/stringOperations.h"</strong> as follows:<br>
<code>bool containsWord(char inputString[], char wordToFind[]);</code>
</p>

<p>
Then implement the new function in <strong>"src/stringOperations.c"</strong>. The function should return true if "wordtoFind" appears in the inputString and false otherwise.
</p>

<p>
<strong>NOTE</strong>: Look up the <strong>strtok</strong> function to split the sentence into words on each space. Depending on how you use <strong>strtok</strong>, you might need to copy inputString into another string in the function so as not to modify the original value.
</p>

<p>
<strong>Now, uncomment the code block marked "BLOCK 2" in main.c.</strong>
</p>
<h5>Sample Output</h5>

<p>
You should see the following output using these inputs and all tests should now pass:
</p>

<div class="row gx-5">  <!-- Added gx-5 for wide gutter -->
    <div class="col-md-6">
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
C:\PROG2007\EX9\cmake-build-debug\EX9.exe
Enter the sentence to search:
I code therefore I am
Enter the letter to count:
E
There are 4 E letters in 'I code therefore I am'

Enter the word to search for:
program

program in 'I code therefore I am': false

Process finished with exit code 0</code></pre>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bg-dark p-3 text-light">
            <pre><code class="text-light">
C:\PROG2007\EX9\cmake-build-debug\EX9.exe
Enter the sentence to search:
Imagination is more important than knowledge
Enter the letter to count:
i
There are 5 I letters in 'Imagination is more important than knowledge'

Enter the word to search for:
MORE

MORE in 'Imagination is more important than knowledge': true

Process finished with exit code 0</code></pre>
        </div>
    </div>
</div>
<br />
<br />

<h5>Examples and Testing</h5>
<p>The program should handle string operations correctly.
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
        </div>
    </div>
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