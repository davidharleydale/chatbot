<!DOCTYPE HTML>

<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<style type="text/css">

body{
    color: white;
    margin: 0;
    padding: 0;
    background-color: rgba(0, 178, 202, 0.45);
    }
.convo-container{
    width:700px;
    margin: auto;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    background: white;
    color: black;
    padding: 3em;
    }

.convo-container h1{
    margin-top: 0;
}

p{
    padding: 1em;
    margin: 0;
}

.bot1{
    background-color: rgba(0, 178, 202, 0.15);
}

.bot2{
    background-color: rgba(0, 178, 202, 0.25);
    margin: 0;
}
.negative{
    background: red;
    color: white;
    padding: 1em;
    margin-top: 2em;
}

.positive{
    background: limegreen;
    color: white;
    padding: 1em;
    margin-top: 2em;
}
</style>
</head>

<body>
<div class="convo-container" >

    <h1>Watch the conversation unfold:</h1>

<?php
    require './chatterbotapi.php';
    require_once './alchemyApi/alchemyapi.php';


    //require_once './tumblr/client.php';
    //require_once './tumblr/RequestException.php';
    //require_once './tumblr/RequestHandler.php';


    //$client = new Tumblr\API\Client("Ov27tCuaXI1d3vnCDzzTL2Plr0oTTPTlbx9PE7c2gtErGez4Qv", "EnkrOlaIrDl6urxL7eULzPkRsMng5s7Ulwfyt32hC5nO3F64BH");
    //$client->setToken($token, $tokenSecret);


    $alchemyapi = new AlchemyAPI();

    $factory = new ChatterBotFactory();

    $bot1 = $factory->create(ChatterBotType::CLEVERBOT);
    $bot1session = $bot1->createSession();

    $bot2 = $factory->create(ChatterBotType::CLEVERBOT);
    $bot2session = $bot2->createSession();

    // $bot3 = $factory->create(ChatterBotType::PANDORABOTS, 'b0dafd24ee35a477'); //JABBERWACKY
    // $bot3session = $bot3->createSession();


    if(isset($_POST["conversation"])) {
        $start = $_POST["conversation"];
    } else {
        $start = "Tell me a story?";
    }

    $s = $start;
    $conversation = "";//blank string - sets it so it exists (that way you don't have to recreate it every time)

    $i = 1;

    while ( $i < 10 )
    {
        echo "<p class='bot1'><strong>Bot 1:</strong> $s\n</p>";

        $s = $bot2session->think($s);
        echo "<p class='bot2'><strong>Bot 2:</strong> $s\n</p>";

        $conversation .= $s; //this stores the conversion from bot 2

        // $s = $bot3session->think($s);
        // echo "<p>Bruce Wayne> $s\n</p>";

        $s = $bot1session->think($s);

        $conversation .= $s; //stores the replies from bot 1 in the same convo thread

        $i++;
    }

    //$client->createPost('twobots', $conversation);
    ?>

<?php


//echo $conversation;

$response = $alchemyapi->sentiment("text", $conversation, null);




?>
<!-- $response = $alchemyapi->language('text',$conversation, null); -->

<div class="<?php echo $response["docSentiment"]["type"]; ?>">
    <h3><?php echo "The bots attitude towards each other was fairly ", $response["docSentiment"]["type"], PHP_EOL; ?></h3>
    <h3><?php echo "Calculated emotional score is ", $response["docSentiment"]["score"], PHP_EOL; ?></h3>
    <h3><?php echo 'The primary language spoken is ', $response['language'], PHP_EOL; ?></h3>
</div>

</div>
</body>
</html>
