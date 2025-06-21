<?php
session_start();

$arra = [
    "php toliq nomi nima" => "Hypertext Preprocessor",
    "phpda file kengaytmasi nima" => ".php",
    "ekranga chiqarish eng oson usul" => "echo",
    "MIN() vazifasi nima" => "eng past qiymatni olib beradi",
    "sqrt vazifasi nima" => "ildiz ostini oladi",
    "!== nima vazifani bajaradi" => "teng emas",
    "=== nima vazifani bajaradi" => "qiymatini ham teng bolsa",
    "phpda takrorolash operatorlari nechta" => "3",
    "Boolean nechta qiymat qabul qiladi" => "2",
    "if vazifasi nima" => "shart operatori"
];

if (!isset($_SESSION['savol'])) {
    $_SESSION['savol'] = array_rand($arra);
}

$a = $_SESSION['savol'];

function javobniTekshir($javob, $arra, $a) {
    if (strtolower(trim($javob)) === strtolower($arra[$a])) {
        unset($_SESSION['savol']);
        return "To‘g‘ri ✅";
    } else {
        $togrisi = $arra[$a];
        unset($_SESSION['savol']);
        return "Noto‘g‘ri ❌. To‘g‘ri javob: $togrisi";
    }
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savol-Javob</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container1">
        <h1>Savol:</h1>
        <h2><?= htmlspecialchars($a) ?></h2>
    </div>

    <div class="container">
        <form method="get">
            <label for="javob">Javobingizni kiriting:</label><br>
            <input type="text" name="javob" id="javob" placeholder="Javob..." >
            <br><br>
            <input type="submit" value="Yuborish">
        </form>
    </div>

    <div class="container2">
        <h1>Natija:</h1>
        <h2>
            <?php
            if (!empty($_GET['javob'])) {
                echo javobniTekshir($_GET['javob'], $arra, $a);
            } else {
                echo 'Javob kiritilmadi.';
            }
            ?>
        </h2>
    </div>
</body>
</html>
