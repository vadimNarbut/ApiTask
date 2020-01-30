<?


$connection = new PDO('mysql:host=localhost;port=3308;dbname=api_task;charset=utf8', 'root', '');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.min.js"></script>
    <script type="text/javascript">
        var uri = 'http://www.nbrb.by/API/ExRates';
    </script>
</head>

<body>
    <p>
        <b>
            API Национального банка для курса.
        </b>
    </p>


    <?
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Currencies');

    $arr = json_decode($json, true); //преобразуем в массив

    echo "<hr>";

    echo "ID валюты: " . $curr['Cur_ID'] . " дата: " . $curr['Date']
        . " Имя валюты: " . $curr['Cur_Name'] . " курс: " .  $curr['Cur_OfficialRate'] . "<br>";



    echo "<hr>";

    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -7 days")) . '&Periodicity=0');
    $currentsSevenDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -6 days")) . '&Periodicity=0');
    $currentsSixDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -5 days")) . '&Periodicity=0');
    $currentsFiveDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -4 days")) . '&Periodicity=0');
    $currentsFourDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -3 days")) . '&Periodicity=0');
    $currentsThreеDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -2 days")) . '&Periodicity=0');
    $currentsTwoDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -1 days")) . '&Periodicity=0');
    $currentsOneDay = json_decode($json, true);
    $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d') . '&Periodicity=0');
    $currentsToDate = json_decode($json, true);


    ?>

    <div style="display: flex">
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th style="padding: 15px">Название валюты</th>
            </tr>
            <?
            foreach ($currentsToDate as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_ID'] ?></th>
                    <th style="width: 440px"><?= $curr['Cur_Name'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d') ?></th>
            </tr>
            <?
            foreach ($currentsToDate as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -1 days")) ?></th>
            </tr>
            <?
            foreach ($currentsOneDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -2 days")) ?></th>
            </tr>
            <?
            foreach ($currentsTwoDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -3 days")) ?></th>
            </tr>
            <?
            foreach ($currentsThreеDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -4 days")) ?></th>
            </tr>
            <?
            foreach ($currentsFourDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -5 days")) ?></th>
            </tr>
            <?
            foreach ($currentsFiveDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -6 days")) ?></th>
            </tr>
            <?
            foreach ($currentsSixDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
        <table border="1" cellpadding="5">
            <tr>
                <th>Курс на <?= date('Y-m-d', strtotime(" -7 days")) ?></th>
            </tr>
            <?
            foreach ($currentsSevenDay as $curr) { ?>
                <tr>
                    <th><?= $curr['Cur_OfficialRate'] ?></th>
                </tr>
            <? } ?>
        </table>
    </div>

    <?


    for ($i = 7; $i >= 0; $i--) {
        $query = $connection->query("SHOW TABLES FROM 'api_task' LIKE " . "currency" . date('Ymd', strtotime(" -" . $i . " days")));
        if (!($query == true)) {
            $sql = "CREATE TABLE " . "currency" . date('Ymd', strtotime(" -" . $i . " days")) . " (
        id INT(6) PRIMARY KEY,
        currencyName VARCHAR(30) NOT NULL,
        value FLOAT NOT NULL
        )";

            if ($connection->query($sql)) {
                echo "Table MyGuests created successfully";
            }
        }

        $json =  file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=' . date('Y-m-d', strtotime(" -" . $i .  " days")) . '&Periodicity=0');
        $qwe = json_decode($json, true);

        foreach ($qwe as $currency) {

            $connection->query("INSERT INTO " . "currency" . date('Ymd', strtotime(" -" . $i . " days")) . " (`id`, `currencyName`, `value`)
        VALUES ( " . $currency['Cur_ID'] . " , "  . "'" . $currency['Cur_Name'] . "'" . " , "  . $currency['Cur_OfficialRate'] . " )");
        }
    }

    ?>


</body>

</html>