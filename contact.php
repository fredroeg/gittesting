<?php
    //TEMPLATE
    include_once "templates/header.php";
    include_once "templates/footer.php";
    include_once "templates/navigation.php";
    
    
    print $header;
    if (isset($_POST['savePost']))
    {
        $to = "frederick.roegiers@gmail.com";
        $subject = "Roger That mailform: " . $_POST['Subject'];
        $message = "Naam: \n" . $_POST['Naam'] . "\n \n" . "Bericht: \n" . $_POST['Subject'];
        $from = $_POST['Email'];
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        echo "Mail Sent.";
    }
?>
        <title>Roger That - Contact</title>
</head>
<body>
    <?php print $navigation; ?>
    <div id="container">
        <div id="blueBalk"></div>
        <div id="columnContent">
            <div id="left">
                <h1>Contact</h1>
                <img src="images/site/contact.png" alt="Contact" class="homeImage" />
                <div class="contact">
                    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                            <label for='Naam'>Naam <span class="asterisk">*</span></label> <br />
                            <input type="text" value="" name="Naam" />
                            <?php
                                if(isset($errorNaam) && $errorNaam != "")
                                {
                                   echo "<br /> " . $errorNaam;
                                }
                            ?>  
                            <br />
                            <label for='Email'>E-Mail <span class="asterisk">*</span></label> <br />
                            <input type="text" value="" name="Email" />
                            <?php
                                if(isset($errorEmail) && $errorEmail != "")
                                {
                                   echo "<br /> " . $errorEmail;
                                }
                            ?>
                            <br />
                            <label for='Subject'>Onderwerp <span class="asterisk">*</span></label> <br />
                            <input type="text" value="" name="Subject" />
                            <?php
                                if(isset($errorSubject) && $errorSubject != "")
                                {
                                   echo "<br /> " . $errorSubject;
                                }
                            ?>
                            <br />
                            <label for='Message'>Bericht <span class="asterisk">*</span></label><br />
                            <textarea name="Message" wrap ="physical"></textarea>
                            <?php
                                if(isset($errorMessage) && $errorMessage != "")
                                {
                                   echo "<br /> " . $errorMessage;
                                }
                            ?>
                            <br />
                        <input type="submit" name="savePost" id="savePost" value="Contacteer mij">
                        
                    </div>
                    </form>
            </div>
            <div id="right">
            </div>
        </div>
    </div>
<?php
    print $footer;
?>