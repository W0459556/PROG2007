<?php $assignname = "Prog2007 - Assignment 4" ?>
<?php include_once("components/assign-body-above.php"); mt_srand(); ?>
<h5>Operating with Bits, the PreProcessor and Enumerated Types</h5>
<p>PROG 2007: Programming II<br>
<strong>Due as posted in Brightspace</strong></p>

<h5>Task</h5>
<p>Write a C program that conforms to the requirements listed below.</p>
<div class="row">
<div class="col-lg-6">
<h5>Requirements:</h5>
<ul>
    <li>You are building a magic decoder ring; a program capable of reading in lines of text and encrypting it; or reversing the process by reading an encrypted code string and decrypting it</li>
    <li>Encryption and decryption require you to follow a specific set of steps to encrypt, or a reverse set of steps to decrypt</li>
    <li>For this program we will combine the use of <strong>bit masks</strong> and <strong>bitwise Exclusive Or</strong> operations to produce the results.</li>
    <li><strong>User Interface:</strong> Prompt the user for an operation - either Encrypt or Decrypt, and then for a text string, capture the input, and then do the requested action. See encryption, below.</li>
    <li>Set up an array of printable characters to use in a substitution cipher as one step of the encryption:
        <img src="img/A4-1.png" alt="Assign 4 Substitution Cypher" class="lab-image mb-0 pb-0">
        <ul>
            <li>Note the table uses capitals. Perform a <strong>toupper</strong> function for each element of the input character array.</li>
        </ul>
    </li>
    <li>Set up an <strong>enumerated type</strong> with values of ENCRYPTING and DECRYPTING to control the direction of the process based on the user's choice.</li>
    <li>Set up an <strong>encryption bitmask</strong>, called mask with this value: <code>unsigned int mask = 0xa5;</code></li>
    <li>Set up <strong>two unsigned int arrays and a character array</strong>, each of size 256. <strong>HINT:</strong> It would be awfully nice if 256 was not used as a "magic number". These arrays will hold the character or numeric sequences</li>
    <li>Set up <strong>two pre-processor macros</strong>, ENCRYPT and DECRYPT to perform the bitwise Exclusive Or. Each should <strong>take two parameters</strong>, the input character sequence of each line converted to an integer and the aforementioned mask. You would then use the macro with something similar to (Where x[] is an array holding the result):
        <ul>
            <li><strong>x[idx] = ENCRYPT(numeric_text[idx], mask);</strong> for each character in the encrypted text.</li>
        </ul>
    </li>
</ul>

<h5>Encryption:</h5>
<ul>
    <li>Perform the letter offset substitution cipher from the table on all characters (non-blank entries) in the input text</li>
    <li>Convert each character in the substituted text to type integer. The easiest way to do this is to create a corresponding integer array and use a cast to perform the conversion of type and copy and convert each character to an entry in this integer array, including spaces</li>
    <li>Encrypt the integer representation of the characters in the integer array using the ENCRYPT macro. This includes all of the space characters as well</li>
    <li><strong>Print out the encrypted result using decimal format so you can see the numeric value of each encoded character. Cypher groups will look something like:</strong>
        <ul>
            <li>334 312 545 345 323 147 312 and so on</li>
            <li>Each space delimits a new character (because space characters are now encrypted as their own number sequence)</li>
        </ul>
    </li>
</ul>

<h5>Decryption:</h5>
<ul>
    <li>Reverse the encryption sequence on the encrypted text to decrypt it. Remember to capture the decrypted entries in decimal (using the space delimiters for each "character") and store them in an integer array to convert back to text</li>
    <li><strong>NOTE:</strong> It will be important to make sure that you do not have newlines in the middle of your coded messages when copying them in as you may stop processing at the first newline, so make sure to copy cipher strings in as just one line.</li>
    <li>Print out the decrypted text to the console. Confirm it matches the original text from the first (plaintext) input file - it is acceptable if the decrypted message is capitalized even if the original was not (see the examples below).</li>
</ul>

<h5>General Procedure:</h5>
<ul>
    <li>Run a message through the encryption and copy the encrypted output.</li>
    <li>Run the encrypted output (AS ONE LINE) through decryption to ensure it works.</li>
    <li>Trade messages with your friends as a further test. Although keep the messages PG-13 as we would not want to offend anyone, even in code.</li>
</ul>

<h5>General requirements:</h5>
<ul>
    <li>You will need to put your functions perform encryption and decryption routines in their <strong>own source file called crypt.c</strong></li>
    <li>Have your pre-processor macro functions, enumeration, & function prototype declarations in a <strong>header file called crypt.h</strong></li>
    <li>Your header file (i.e. crypt.h) should be in a <strong>folder called "inc"</strong></li>
    <li>All your source files (i.e. main.c and crypt.c) should be in a <strong>folder called "src"</strong></li>
    <li>Include clear comments</li>
    <li>Maintain a standard layout/format for the code. Be consistent with spacing or tabbing, use the layout to make nested operation visually clear</li>
    <li>Provide clear visual <strong>feedback</strong> to the user</li>
</ul>

<h5>Sample Outputs:</h5>
<p class="mb-0 pb-0">Encrypting a message:</p>
<img src="img/A4-2.png" alt="Assign 4 Encryption" class="lab-image">
<p class="mb-0 pb-0">Decrypting the previously encrypted message:</p>
<img src="img/A4-3.png" alt="Assign 4 Decryption" class="lab-image">
<p><strong>NOTE:</strong> In the above example the output numeric code from the previous encryption example was entered in its entirety <strong>on one line without newlines</strong>, but was cut off in the screenshot.</p>
<p class="mb-0 pb-0">Sample of bad input:</p>
<img src="img/A4-4.png" alt="Assign 4 Bad Input" class="lab-image">

</div>
</div>
<?php include_once("components/assign-body-below.php"); mt_srand(); ?>
