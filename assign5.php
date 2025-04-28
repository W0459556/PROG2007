<?php $assignname = "Prog2007 - Assignment 5" ?>
<?php include_once("components/assign-body-above.php"); mt_srand(); ?>
<h5>Input/Output, Files, Command Line Arguments and Dynamic Memory</h5>
<p>PROG 2007: Programming II<br>
<strong>Due as posted in Brightspace</strong></p>

<div class="row">
<div class="col-lg-6">
<h5>Important Notes</h5>
<h6>Note 1:</h6>
<p>Four sample input files have been provided to you in the starting GitHub repository in a subfolder named "test-files". You may wish to COPY these into the "cmake-build-debug" folder to make your lives easier while developing the application. However, make sure NOT TO REMOVE THEM ENTIRELY FROM THE ORIGINAL FOLDER as that is where the tests require them to be.</p>

<h6>Note 2:</h6>
<p>In order to get ANSI colors (mentioned below) showing in the CLion Run Console, we need to do the following routine:</p>
<ol>
    <li>Choose Help -> Edit Custom Properties from CLion menu</li>
    <li>Add the following line to the idea.properties file:<br>
       <code>run.processes.with.pty=false</code></li>
    <li>Restart CLion.</li>
</ol>

<h5>Task</h5>
<p>Write a C program that conforms to the requirements listed below.</p>

<h5>Requirements:</h5>
<ul>
    <li>You are building a terminal-based C version of the classic Wordle: Word of the Day Game</li>
    <li>The game will use the ANSI colour routines to highlight guessed letters in the correct position in GREEN and guessed letters that are in a different position in the target word in YELLOW.</li>
    <li>Our game will be a bit different as we will not be constrained to 6 guesses at a 5-letter word. Our word size and guess limit will be read in from input files and dynamically set.</li>
    <li>You will be provided with 4 input files, each containing different settings for the <strong>word size</strong> and <strong>maximum number of guesses</strong> on the first line with the <strong>solution or target word</strong> on the second line of the file:
        <img src="img/A5-1.png" alt="Assign 5 Word File One" class="lab-image mb-0 pb-0">
    </li>
    <li>Read the first line and dynamically create/allocate a 2-dimensional character array of the appropriate size for the game board based on the word size and number of guesses, then populate the array with <strong>reasonable starting characters</strong>, such as the <strong>underscore</strong> that I have used in the examples below. <strong>You should dynamically allocate the array in main.c and pass it into functions contained in wordle.c for game processing and/or game board display.</strong></li>
    <li>See the <strong>General Game Play</strong> section below for details on how the user actually plays the game</li>
    <li>When the player is done, write the game results (i.e. final game board state) to a new file with a line at the top showing whether they were successful or not. The output file will not contain coloured text:
        <img src="img/A5-2.png" alt="Assign 5 Game Result One" class="lab-image mb-0 pb-0">
        <img src="img/A5-3.png" alt="Assign 5 Game Result Two" class="lab-image mb-0 pb-0">
    </li>
    <li>The file names/paths for both the input and output will be provided to the program via <strong>command line arguments</strong> (see the Examples below)</li>
</ul>

<h5>General Game Play:</h5>
<ol>
    <li>Output the game board to the screen to start with enough spaces to indicate the target word length and enough rows to show the maximum number of guesses</li>
    <li>Prompt the user to enter a guessed word</li>
    <li>Validate the entry for correct length and make sure that it only contains letters (i.e. no digits or special characters). If it fails validation, print the appropriate message (although this does NOT need to go to <strong>stderr</strong> as we will not quit or error out on bad input). If the input was invalid, ask them to enter it again while not "charging" them for a guess nor updating the game board.</li>
    <li>Output the game board again with the new guess added in the first empty row. The guess should show in <strong>uppercase</strong> no matter how it was entered. The game board should highlight in GREEN any guessed letters in the correct position in the target word and should highlight in YELLOW guessed letters that are in a different position in the target word.</li>
    <li>If the guess is the not the same as the target <strong>and</strong> the user has not reached the maximum number of guesses, go back to Step 2. Otherwise, proceed to Step 6.</li>
    <li>Tell the user if they have won the game or not (i.e. ultimately guessed the correct answer).</li>
</ol>

<p><strong>NOTE:</strong> Colour-coding double letters appropriately like actual Wordle does (i.e. if a letter exists twice in the guess but only once in the target, then only one letter would be colour-coded) is a bit beyond our scope but nice to have if you can get it to work.</p>

<p><strong>NOTE:</strong> There is also NO requirement to make sure each "valid" entry is an actual dictionary word in English. As long as the entry is made up of the correct number of letters, then it will be considered valid (e.g. "ABCDE" will be considered a valid entry if trying to guess a 5-letter word).</p>

<h5>General requirements:</h5>
<ul>
    <li>You will need to put your function(s) to process game play (i.e. process guesses, output the colour-coded board results) in their <strong>own source file called wordle.c</strong></li>
    <li>Have all pre-processor definitions, any enumerations or struct definitions, & your function prototype declarations in a <strong>header file called wordle.h</strong></li>
    <li>All your source files (i.e. main.c and wordle.c) should be in a <strong>folder called "src"</strong></li>
    <li>Your header file (i.e. wordle.h) should be in a <strong>folder called "inc"</strong></li>
    <li>Include clear comments</li>
    <li>Make sure your error messages output to <strong>stderr</strong></li>
    <li>Maintain a standard layout/format for the code. Be consistent with spacing or tabbing, use the layout to make nested operation visually clear.</li>
    <li>Provide clear visual feedback to the user</li>
</ul>

<h5>Sample Outputs:</h5>
<p class="mb-0 pb-0">Running Program with no Command Line Arguments:</p>
<img src="img/A5-4.png" alt="Assign 5 No Command Line Arguments" class="lab-image">

<p class="mb-0 pb-0">Running Program with wrong number of Command Line Arguments:</p>
<img src="img/A5-5.png" alt="Assign 5 Bad Number of Command Line Arguments" class="lab-image">

<p class="mb-0 pb-0">Running Program with improper Command Line Arguments:</p>
<img src="img/A5-6.png" alt="Assign 5 Improper Command Line Arguments" class="lab-image">

<p class="mb-0 pb-0">Running Program with bad Input File:</p>
<img src="img/A5-7.png" alt="Assign 5 Bad Input File" class="lab-image">

<p class="mb-0 pb-0">Running Program with bad Output File:</p>
<img src="img/A5-8.png" alt="Assign 5 Bad Output File" class="lab-image">

<p class="mb-0 pb-0">Running Program - Winning - Part One:</p>
<img src="img/A5-9.png" alt="Assign 5 Winning - Part One" class="lab-image">

<p class="mb-0 pb-0">Running Program Winning - Part Two:</p>
<img src="img/A5-10.png" alt="Assign 5 Winning - Part One" class="lab-image">

<p class="mb-0 pb-0">Running Program Losing:</p>
<img src="img/A5-11.png" alt="Assign 5 Losing" class="lab-image">

<p class="mb-0 pb-0">Sample of bad Guess Input:</p>
<img src="img/A5-12.png" alt="Assign 4 Bad Input" class="lab-image">

<p class="mb-0 pb-0">Running Program with Longer Word (6) - More Guesses(10):</p>
<img src="img/A5-13.png" alt="Assign 5 Longer Word - More Guesses" class="lab-image">

</div>
</div>
<?php include_once("components/assign-body-below.php"); mt_srand(); ?>