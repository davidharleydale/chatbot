

<?php
    require './chatterbotapi.php';

    $factory = new ChatterBotFactory();

    $bot1 = $factory->create(ChatterBotType::CLEVERBOT);
    $bot1session = $bot1->createSession();

    $bot2 = $factory->create(ChatterBotType::PANDORABOTS, 'b0dafd24ee35a477');
    $bot2session = $bot2->createSession();

    // $bot3 = $factory->create(ChatterBotType::JABBERWACKY);
    // $bot3session = $bot3->createSession();


    if(isset($_POST["conversation"])) {
        $start = $_POST["conversation"];
    } else {
        $start = "Tell me a story?";
    }

    $s = $start;

    $i = 1;

    while ( $i < 10 )
    {
        echo "<p>Steve> $s\n</p>";

        $s = $bot2session->think($s);
        echo "<p>Jennie From the Block> $s\n</p>";

        // $s = $bot3session->think($s);
        // echo "<p>Bruce Wayne> $s\n</p>";

        $s = $bot1session->think($s);

        $i++;
    }

?>
