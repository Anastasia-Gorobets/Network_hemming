<?php

function checkU($U)
{
    if ($U < 0) return 0;
    else return $U;

}

function printArray($arr)
{
    foreach ($arr as $key => $a) {
        echo "$key=>$a  ";
    }
    echo "<br>";

}

$v1 = $_POST['x1'];
$v2 = $_POST['x2'];
$v3 = $_POST['x3'];
$v4 = $_POST['x4'];
$v5 = $_POST['x5'];
$m = count($v1);

printArray($v1);
printArray($v2);
printArray($v3);
printArray($v4);
printArray($v5);
echo "Count of elements:$m<br>";
$v1Z1 = [];
$v2Z2 = [];
$v3Z3 = [];
$v4Z4 = [];
$v5Z5 = [];
for ($i = 0; $i < $m; $i++) {
    $v1Z1[] = $v1[$i] / 2;
    $v2Z2[] = $v2[$i] / 2;
    $v3Z3[] = $v3[$i] / 2;
    $v4Z4[] = $v4[$i] / 2;
    $v5Z5[] = $v5[$i] / 2;
}
$w = [$v1Z1, $v2Z2, $v3Z3, $v4Z4, $v5Z5];
$b = $m / 2; //смещение
$k = 0.1;
$Un = 10;
$E = 1 / 5;
echo "<br>b=$b<br>";
echo "k=$k<br>";
if ($_POST['ident'] == true) {
    $s1 = $_POST['xi'];
    $UinZ1 = $b;
    $UinZ = [];
    $UinZTemp = $b;
    for ($j = 0; $j < count($w); $j++) {
        for ($i = 0; $i < $m; $i++) {
            $UinZTemp += $w[$j][$i] * $s1[$i];
        }
        $UinZ[] = $UinZTemp;
        $UinZTemp = $b;
    }
    $UoutZ = [];
    for ($i = 0; $i < count($UinZ); $i++) {
        $UoutZ[] = $UinZ[$i] * $k;
    }
    $Uout1 = $UoutZ[0];
    $Uout2 = $UoutZ[1];
    $Uout3 = $UoutZ[2];
    $Uout4 = $UoutZ[3];
    $Uout5 = $UoutZ[4];
    $sum1 = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($i != 0) {
            $sum1 += $UoutZ[$i];
        }
    }
    $sum2 = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($i != 1) {
            $sum2 += $UoutZ[$i];
        }
    }
    $sum3 = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($i != 2) {
            $sum3 += $UoutZ[$i];
        }
    }
    $sum4 = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($i != 3) {
            $sum4 += $UoutZ[$i];
        }
    }
    $sum5 = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($i != 4) {
            $sum5 += $UoutZ[$i];
        }
    }
    $k = 0;
    $flag = false; //stop flag
    while (true) {
        $num = 0;
        $res = 0;
        foreach ($UoutZ as $key => $u) {
            if ($u != 0) {
                $num++;
                $res = $key;
            }
        }
        if ($num == 1) {
            echo "<h3>Result is image  № " . ($res + 1)."</h3>";
            break;
        }
        $Uout1 = $Uout1 - $E * $sum1;
        $Uout2 = $Uout2 - $E * $sum2;
        $Uout3 = $Uout3 - $E * $sum3;
        $Uout4 = $Uout4 - $E * $sum4;
        $Uout5 = $Uout5 - $E * $sum5;
        $Uout1 = checkU($Uout1);
        $Uout2 = checkU($Uout2);
        $Uout3 = checkU($Uout3);
        $Uout4 = checkU($Uout4);
        $Uout5 = checkU($Uout5);

        $UoutZ = [$Uout1, $Uout2, $Uout3, $Uout4, $Uout5];

        $sum1 = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($i != 0) {
                $sum1 += $UoutZ[$i];
            }
        }
        $sum2 = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($i != 1) {
                $sum2 += $UoutZ[$i];
            }
        }
        $sum3 = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($i != 2) {
                $sum3 += $UoutZ[$i];
            }
        }
        $sum4 = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($i != 3) {
                $sum4 += $UoutZ[$i];
            }
        }
        $sum5 = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($i != 4) {
                $sum5 += $UoutZ[$i];
            }
        }
        $k++;
    }
    echo "<br>Result vector:";
    echo "<br>1=$Uout1<br>";
    echo "<br>2=$Uout2<br>";
    echo "<br>3=$Uout3<br>";
    echo "<br>4=$Uout4<br>";
    echo "<br>5=$Uout5<br>";
}










