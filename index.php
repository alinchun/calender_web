<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <title>萬年曆作業</title>
    <style>
        * {
            box-sizing: border-box;
            margin: auto;
            font-weight: bold;
            font-size: 40px;
            text-align: center;
            text-decoration: none;
        }
        .title{
            padding-top:10px ;
            background-color: linen;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            background-color: linen;
            text-align: center;
        }

        .content>.bg_img {
            display: flex;
            flex-wrap: wrap;
            flex-basis: 30%;
            height: 30vh;
            background-repeat: no-repeat;

        }

        .calendar {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            margin-left: 1px;
            margin-top: 1px;
            padding-top:10px ;
        }

        .calendar>div {
            border-radius: 30px;

            border: 1px solid #ccc;
            width: calc(100% / 7);
            height: 100px;
            margin-left: -1px;
            margin-top: -1px;
        }

        .today {
            background: lightskyblue;
        }

        .weekend {
            color: red;
        }

        .aside_input {
            width: 500px;
            height: 700px;
            background: none;
            border-radius: 30px;
            border: 1px solid #ccc;

        }

        .btn {
            background: none;
            border-radius: 30px;
            border: 1px solid #ccc;

        }

        .now {
            display: flex;
            text-align: center;
            background-color: linen;
            padding-top:10px ;


        }

        .option {
            background: none;
            border-radius: 30px;
            border: 1px solid #ccc;
        }

        .btn2 {
            background: none;
            border-radius: 30px;
            border: 1px solid #ccc;

        }
    </style>
</head>

<body>


<div class="title">

    <h1>Calendar</h1>
</div>    
    <div class=container>
        <?php
        $month = $_GET['month'] ?? date("n");
        $year = $_GET['year'] ?? date("Y");
        $firstDateTime = strtotime("$year-$month-1");
        $days = date("t", $firstDateTime);
        $finalDateTime = strtotime("$year-$month-$days");
        $firstDateWeek = date("w", $firstDateTime);
        $finalDateWeek = date("w", $finalDateTime);
        $weeks = ceil(($days + $firstDateWeek) / 7);
        $firstWeekSpace = $firstDateWeek - 1;
        $days = [];
        for ($i = 0; $i < $weeks; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if (($i == 0 && $j < $firstDateWeek) || (($i == $weeks - 1) && $j > $finalDateWeek)) {
                    $days[] = '&nbsp;';
                } else {
                    $days[] = $year . "-" . $month . "-" . ($j + 7 * $i - $firstWeekSpace);
                }
            }
        }


        $holiday = [
            $year . '-1-1' => "元旦",
            $year . '-2-14' => "西洋情人節",
            $year . '-2-28' => "228紀念日",
            $year . '-4-4' => "兒童節",
            $year . '-5-1' => "勞動節",
            $year . '-8-8' => "父親節",
            $year . '-10-10' => "國慶日",
            $year . '-12-25' => "聖誕節",
        ];


        if ($month == 1) {
            $prevYear = $year - 1;
            $prevMonth = 12;
        } else {
            $prevYear = $year;
            $prevMonth = $month - 1;
        }

        if ($month == 12) {
            $nextYear = $year + 1;
            $nextMonth = 1;
        } else {
            $nextYear = $year;
            $nextMonth = $month + 1;
        }
        ?>
        <div class="content">

            <div class="select">
                <form action="index.php" method="GET">
                    <label for="year">西元</label>
                    <select name="year" id="year" class="option">
                        <?php
                        for ($i = 1901; $i <= 2050; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>

                    <label for="month">月份</label>
                    <select name="month" id="month" class="option">
                        <?php
                        for ($j = 1; $j <= 12; $j++) {
                            echo "<option value='$j'>$j</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="GO" class="btn2">
            </div>
            <div class="bg_img">
                <?php
                switch ($month) {
                    case '1':
                        echo '<img src="./image/b01.png" width="300px">';
                        break;
                    case '2':
                        echo '<img src="./image/b02.png" width="300px">';
                        break;
                    case '3':
                        echo '<img src="./image/b03.png" width="30px">';
                        break;
                    case '4':
                        echo '<img src="./image/b04.png" width="300px">';
                        break;
                    case '5':
                        echo '<img src="./image/b05.png" width="300px">';
                        break;
                    case '6':
                        echo '<img src="./image/b06.png" width="300px">';
                        break;
                    case '7':
                        echo '<img src="./image/b07.png" width="300px">';
                        break;
                    case '8':
                        echo '<img src="./image/b08.png" width="300px">';
                        break;
                    case '9':
                        echo '<img src="./image/b09.png" width="300px">';
                        break;
                    case '10':
                        echo '<img src="./image/b10.png" width="300px">';
                        break;
                    case '11':
                        echo '<img src="./image/b11.png" width="300px">';
                        break;
                    case '12':
                        echo '<img src="./image/b11.png" width="300px">';
                        break;
                    default:
                        break;
                }
                ?>
            </div>


            <div class='pre'>
                <span><?= $year; ?>年</span>

                <a href="index.php?year=<?= $prevYear; ?>&month=<?= $prevMonth; ?>"><?= $prevMonth; ?>月</a>

                <span><?= $month; ?>月</span>

                <a href="index.php?year=<?= $nextYear; ?>&month=<?= $nextMonth; ?>"><?= $nextMonth; ?>月</a>

            </div>
            
            <div class='calendar'>
                <div>日</div>
                <div>一</div>
                <div>二</div>
                <div>三</div>
                <div>四</div>
                <div>五</div>
                <div>六</div>
                <?php
                for ($i = 0; $i < count($days); $i++) {

                    $today = date("Y-n-j");
                    $d = ($days[$i] != '&nbsp;') ? explode('-', $days[$i])[2] : '&nbsp;';
                    if ($today == $days[$i]) {
                        if (isset($holiday[$days[$i]])) {
                            echo "<div class='today'> {$d}";
                            echo "  <div>";
                            echo $holiday[$days[$i]];
                            echo "  </div>";
                            echo "</div>";
                        } else {
                            echo "<div class='today'> {$d} </div>";
                        }
                    } else if (date("w", strtotime($days[$i])) == 0 || date("w", strtotime($days[$i])) == 6) {

                        if (isset($holiday[$days[$i]])) {
                            echo "<div class='weekend'> {$d}";
                            echo "  <div>";
                            echo $holiday[$days[$i]];
                            echo "  </div>";
                            echo "</div>";
                        } else {
                            echo "<div class='weekend'> {$d} </div>";
                        }
                    } else {
                        if (isset($holiday[$days[$i]])) {
                            echo "<div> {$d}";
                            echo "  <div>";
                            echo $holiday[$days[$i]];
                            echo "  </div>";
                            echo "</div>";
                        } else {
                            echo "<div> {$d} </div>";
                        }
                    }
                }

                ?>
            </div>
        </div>
    </div>
    <footer class="now">
        <div>
            <a href="?year=<?= date("Y"); ?>&month=<?= date("n"); ?>">Now</a>
        </div>
    </footer>

</body>

</html>




</body>

</html>