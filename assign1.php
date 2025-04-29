<?php $assignname = "Prog2007 - Assignment 1" ?>
<?php include_once("components/assign-body-above.php"); mt_srand(); ?>

<?php
    $max = rand(8, 16);
    $multiplicationTables = '';
    $multiplicationTables .= "TABLE OF PRODUCTS\n";
    $multiplicationTables .= generateForLoopTable($max);
    $multiplicationTables .= "\nREVERSED TABLE OF PRODUCTS\n";
    $multiplicationTables .= generateWhileLoopTable($max);
    
    function generateForLoopTable($max) {
        $table = '';
        
        $table .= str_pad('N', 5); 
        for ($i = 1; $i <= $max; $i++) {
            $table .= str_pad($i, 5);
        }
        $table .= "\n";
        
        for ($i = 1; $i <= $max; $i++) {
            $table .= str_pad($i, 5);
            for ($j = 1; $j <= $max; $j++) {
                $table .= str_pad($i * $j, 5);
            }
            $table .= "\n";
        }
        
        return $table;
    }
    
    function generateWhileLoopTable($max) {
        $table = '';
        $i = $max;
        
        $table .= str_pad('N', 5);
        while ($i >= 1) {
            $table .= str_pad($i, 5);
            $i--;
        }
        $table .= "\n";
        
        $i = $max;
        while ($i >= 1) {
            $table .= str_pad($i, 5);
            $j = $max;
            while ($j >= 1) {
                $table .= str_pad($i * $j, 5);
                $j--;
            }
            $table .= "\n";
            $i--;
        }
        
        return $table;
    }
?>

<h4>Assignment 1 - Variables, Operations, and Loops</h4>
<p>
Write a C program that generates multiplication tables using different loop structures.
</p>

<h5>TASK REQUIREMENTS:</h5>
<ul>
    <li>Generate a printed N×N table for values N=1 to <span class='stand-out'><?php echo($max) ?></span> using for loops</li>
    <li>Table should have column headers showing each N value</li>
    <li>Create a reversed version (<span class='stand-out'><?php echo($max) ?></span> at top/left) using while loops</li>
    <li>Include clear code comments and consistent formatting</li>
    <li>Preserve the included sample text files for testing</li>
</ul>

<h5>SAMPLE OUTPUTS</h5>
<div class="row">
<div class="col-lg-6">
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\ASSIGN1\cmake-build-debug\ASSIGN1.exe
<?php echo $multiplicationTables; ?>

Process finished with exit code 0</code></pre>
</div>
</div>
</div>
<?php include_once("components/assign-body-below.php"); mt_srand(); ?>