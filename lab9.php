<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Prog2007 - Lab 9</title>
    <?php include_once("components/head.php"); mt_srand(); ?>
    <style>
    </style>
</head>
<?php
function generateLetterCountExample() {
    // sample text from section 1.10.32, 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
    $lorem = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.";
    
    $words = preg_split('/\s+/', $lorem);
    $excerpt = ucfirst(implode(' ', array_slice($words, rand(0, count($words)-10), rand(4, 10))));
    
    $letter = chr(rand(65, 90)); // A-Z ASCII
    
    $count = substr_count(strtoupper($excerpt), strtoupper($letter));
    
    $block = 
"path\\to\\your\\file\\EX9.exe
Enter the sentence to search:
$excerpt
Enter the letter to count:\n";

// randomise if inputted letter is upper or lower
$isLower = rand(1,2);
if($isLower == 1){
    $block .= strtolower($letter);
}else{
    $block .= $letter;
}

// logic to handle grammar re: singular, plural
if($count == 1){
    $block .= "\nThere is $count $letter letter in '$excerpt'";
}else{
    $block .= "\nThere are $count $letter letters in '$excerpt'";
}
$block .= "\n\nProcess finished with exit code 0";

return $block;
}
?>

<?php
function generateLetterAndWordCountExample() {
    $lorem = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.";
    
    $words = preg_split('/\s+/', $lorem);
    $excerptWords = array_slice($words, rand(0, count($words)-10), rand(4, 10));
    $excerpt = ucfirst(implode(' ', $excerptWords));
    
    $letter = chr(rand(65, 90)); // A-Z ASCII
    $count = substr_count(strtoupper($excerpt), strtoupper($letter));
    
    $output = "path\\to\\your\\file\\EX9.exe\n";
    $output .= "Enter the sentence to search:\n";
    $output .= $excerpt . "\n";
    $output .= "Enter the letter to count:\n";
    
    $output .= (rand(1,2) == 1 ? strtolower($letter) : $letter);
    $output .= "\nThere " . ($count == 1 ? "is $count $letter letter" : "are $count $letter letters") . " in '$excerpt'\n\n";
    
    $output .= "Enter the word to search for:\n";
    
    $searchWord = rand(0,1) ? $excerptWords[array_rand($excerptWords)] : $words[array_rand($words)];
    
    $searchWord = preg_replace('/[.,?]$/', '', $searchWord);
    
    $case = rand(1,4);
    if ($case == 1) {
        $searchWord = strtoupper($searchWord);
    } elseif ($case == 2) {
        $searchWord = strtolower($searchWord);
    }
    
    $output .= $searchWord . "\n\n";
    
    $wordExists = in_array($searchWord, $excerptWords, true) || 
                 in_array(preg_replace('/[.,?]$/', '', $searchWord), array_map(function($w) { 
                     return preg_replace('/[.,?]$/', '', $w); 
                 }, $excerptWords), true);
    
    $output .= "$searchWord in '$excerpt': " . ($wordExists ? 'true' : 'false') . "\n\n";
    $output .= "Process finished with exit code 0";
    
    return $output;
}
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
<div class="col-lg-6 pb-2">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
<?php echo htmlspecialchars(generateLetterCountExample()); ?></code></pre>
</div>
</div>
<div class="col-lg-6 pb-2">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
<?php echo htmlspecialchars(generateLetterCountExample()); ?></code></pre>
</div>
</div>
</div>

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
<div class="col-lg-6 pb-2">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
<?php echo htmlspecialchars(generateLetterAndWordCountExample()); ?></code></pre>
</div>
</div>
<div class="col-lg-6 pb-2">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
<?php echo htmlspecialchars(generateLetterAndWordCountExample()); ?></code></pre>
</div>
</div>
</div>

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