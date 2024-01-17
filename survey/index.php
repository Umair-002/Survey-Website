<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<style>
    /* Css styling codes */
    body{
        margin: 0;
    }
    nav ul{
        list-style: none;
        display: flex;
        justify-content: center;
    }

    nav ul li{
        margin-right: 20px;
    }

    nav li a {
        border: 1px solid #5e9ad0;
        padding: 8px;
        text-decoration: none;
        border-radius: 5px;
    }

    nav li a:hover {
        background: #2b97ba;
        color: white;
    }

    .topbar{
        background-color:#e8e8e8;
        text-align:center;
    }

    .topbar img{
        width: 100%;
        max-height:350px;
    }

    .declaration{
        border: 1px solid;
        margin: 12px;
        padding: 12px;
    }

    .start{
        text-align:center;
    }

    .survey{
        border: 1px solid;
        margin: 12px;
        padding: 12px;
    }

    .msg{
        border: 1px solid;
        background: green;
        color: white;
        text-align: center;
        margin: 12px;
        padding: 30px 10px;
        font-family: cursive;
        font-size: 30px;
    }
</style>

<?php
include "database.php";

$msg = "";
if(isset($_POST['submit_survey'])) // check if Submit button clicked?
{

    $question_ids = $_POST['question_ids']; // get all question ids
    $i=-1;
    foreach($question_ids as $q_id) // loop through all questions
    {
        $i++;
        $ans = sanitizeData($_POST['ans_'.$q_id]); // get answer of each question
        // $ques = sanitizeData($questions[$i]);
        
        ins_upd_del("INSERT INTO `answers`(`question_id`, `ans`) VALUES ('$q_id', '$ans')"); // insert the response in database
    }

    $msg = "Thank you for submitting the survey!";// thank you message
}

?>
<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </nav>

    <?php
     if($msg != "")
     {
         ?>
         <div class="msg">
             <?php echo $msg ?>
         </div>
         <?php
     }
    ?>
    <div class="topbar">
        <img src="banner.png" alt="Banner">
    </div>
    <?php
    if(!isset($_POST['start'])) // check if start buttons clicked?
    {
        ?>
        <form action="" method="POST">
            <div class="declaration">
                <p>
                    This survey is based upon the matters of why do students should choose computer science. The survey data will be gathered and used privately to analyse and discuss the results gathered.
                </p>
                <p>
                    <b>Terms and condition: </b> For your data given to be collected and used privately within a controlled environment.
                </p>

                <br><br>

                <input type="checkbox" name="agree" id="agree" required> I agree &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br>
                <p class="small-text">
                    Please tick the checkbox.
                    By clicking the "I agree" button and filling out this survey, you acknowledge that you will provide truthful and precise answers, and you authorize the collection of your responses. Your involvement in this study is voluntary, and you retain the right to withdraw your participation at any time. Your answers will be kept confidential and will only be used for research purposes. If you have any inquiries regarding the study or would like to know more about the findings, please feel free to contact me.
                </p>
            </div>
            
            <br>

            <div class="start">
                
                    <input type="submit" name="start" value="Survey">
            </div>
        </form>
        <?php
    }
    else
    {
        ?>
        <div class="survey">
            <h3 style="text-align:center">Survey</h3>
            <h5 style="text-align:center">key: 1= Strongly disagree. 5=Strongly agree</h5>
            <hr>

            <style>
                .answer input[type="radio"] {
                    opacity: 0;
                    position: fixed;
                    width: 0;
                }
                .answer label {
                    padding: 2px 7px;
                    border: 1px solid #666;
                    border-radius: 100%;
                    margin-right: 10px;
                }
                .answer label:hover {
                    background-color: cyan;
                }
                .answer input[type="radio"]:checked + label {
                    background-color: cyan;
                    border-color: #666;
                }
                .answer input[type="text"] {
                    width: 80%;
                }
            </style>

            <form action="" method="POST">
                <?php
                $questions = getMultipleRows("SELECT * FROM `questions`"); // get all questions from database
                $sno=0;
                foreach($questions as $quest) // loop through each questions fetched from database
                {
                    $sno++;
                    ?>
                    <div class="question">
                        <input type="hidden" name="question_ids[]" value="<?php echo $quest['question_id'] ?>">
                        <input type="hidden" name="questions[]" value="<?php echo $quest['question'] ?>">
                        <p>
                            <b>Q<?php echo $sno ?>:</b><?php echo $quest['question'] ?> 

                            <?php
                            if($quest['type'] == 'radio') // check if type is radio
                            {
                                echo "How likely do you agree with this question?";
                            }
                            ?>
                        </p>
                        <div class="answer">
                            <?php
                            if($quest['type'] == "text") // check if type of question is text box type.
                            {
                                ?>
                                <input type="text" name="ans_<?php echo $quest['question_id'] ?>" value="" required> 
                                <?php
                            }
                            else // if radio type; means not text type
                            {
                                for($i=5;$i>0;$i--)  /// loop from 5 to 1 and create 5 radio buttons
                                {
                                    ?>
                                    <span>
                                        <input type="radio" id="radio<?php echo $sno . $i ?>" name="ans_<?php echo $quest['question_id'] ?>" value="<?php echo $i ?>" required> 
                                        <label for="radio<?php echo $sno . $i ?>"><?php echo $i ?></label> 
                                    </span>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>

                <input type="submit" name="submit_survey" value="Submit">
            </form>

        </div>
        <?php
    }
    ?>

  

    <br><br>
</body>
</html>