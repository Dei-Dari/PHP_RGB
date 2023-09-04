<?php
//https://www.php.net/manual/ru/function.shuffle.php
//https://www.php.net/manual/ru/function.array-slice.php
//https://ru.wikipedia.org/wiki/HTML-%D1%86%D0%B2%D0%B5%D1%82%D0%B0
//http://azjio.narod.ru/autoit3_docs/regexp2/regexp_exercise.htm
include_once('function.php');

$arrColor = [
    "aliceblue",
    "antiquewhite",
    "aqua",
    "aquamarine",
    "azure",
    "beige",
    "bisque",
    "black",
    "blanchedalmond",
    "blue",
    "blueviolet",
    "brown",
    "burlywood",
    "cadetblue",
    "chocolate",
    "coral",
    "cornflowerblue",
    "cornsilk",
    "crimson",
    "cyan",
    "darkblue",
    "darkcyan",
    "darkgoldenrod",
    "darkgray",
    "darkgreen",
    "darkkhaki",
    "darkmagenta",
    "darkolivegreen",
    "darkorange",
    "darkorchid",
    "darkred",
    "darksalmon",
    "darkseagreen",
    "darkslateblue",
    "darkslategray",
    "darkturquoise",
    "darkviolet",
    "deeppink",
    "deepskyblue",
    "dimgray",
    "dodgerblue",
    "firebrick",
    "floralwhite",
    "forestgreen",
    "fuchsia",
    "gainsboro",
    "ghostwhite",
    "gold",
    "goldenrod",
    "gray",
    "grey",
    "green",
    "greenyellow",
    "honeydew",
    "hotpink",
    "indianred",
    "indigo",
    "ivory",
    "khaki",
    "lavender",
    "lavenderblush",
    "lemonchiffon",
    "lightblue",
    "lightcoral",
    "lightcyan",
    "lightgoldenrodyellow",
    "lightgreen",
    "lightpink",
    "lightsalmon",
    "lightseagreen",
    "lightskyblue",
    "lightslategray",
    "lightsteelblue",
    "lightyellow",
    "lime",
    "limegreen",
    "linen",
    "magenta",
    "maroon",
    "mediumaquamarine",
    "mediumblue",
    "mediumorchid",
    "mediumpurple",
    "mediumseagreen",
    "mediumslateblue",
    "mediumspringgreen",
    "mediumturquoise",
    "mediumvioletred",
    "midnightblue",
    "mintcream",
    "mistyrose",
    "moccasin",
    "navajowhite",
    "navy",
    "oldlace",
    "olive",
    "olivedrab",
    "orange",
    "orangered",
    "orchid",
    "palegoldenrod",
    "palegreen",
    "paleturquoise",
    "palevioletred",
    "papayawhip",
    "peachpuff",
    "peru",
    "pink",
    "plum",
    "powderblue",
    "purple",
    "red",
    "rosybrown",
    "royalblue",
    "salmon",
    "sandybrown",
    "seagreen",
    "seashell",
    "sienna",
    "silver",
    "skyblue",
    "slateblue",
    "slategray",
    "snow",
    "springgreen",
    "steelblue",
    "tan",
    "teal",
    "thistle",
    "tomato",
    "turquoise",
    "violet",
    "wheat",
    "white",
    "whitesmoke",
    "yellow",
    "yellowgreen"
];
shuffle($arrColor);
$arrColorDiv = array_slice($arrColor, 0, 4);

foreach ($arrColorDiv as $arrColor) {
    echo '<div style="height:10%; width:100%; background-color:' . $arrColor . ';">' . $arrColor . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>RGB</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style1.css" rel="stylesheet" />
</head>
<body>
    <div>
        <form action="index.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>R</th>
                        <th>G</th>
                        <th>B</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="R_Color" placeholder="0-255" pattern='(?:(?:2(?:[0-4]\d|5[0-5])|1?\d{1,2}))' />
                                <!--(?:2   (?:   [0-4]\d   |   5[0-5]   )     |     1?\d{1,2}   )
                                Левая часть группы начинающаяся с цифры 2 и заканчивающаяся вложенной группой с выбором либо двузначным числом от 00 до 49,
                                определяемое шаблоном [0-4]\d, либо от 50 до 55, определяемое шаблоном 5[0-5]
                                и правая часть группы 1?\d{1,2}, в которой перед любым числом от 0 до 99, определяемое шаблоном \d{1,2} может находится число 1, определяемое шаблоном 1?. 
                                Левая часть группы разрешает числа от 200 до 255, а правая часть группы разрешает числа от 0 до 199.
                                В итоге данный шаблон разрешает числа только в диапазоне от 0 до 255.-->
                            </td>
                            <td>
                                <input type="text" name="G_Color" placeholder="0-255" pattern='(?:(?:2(?:[0-4]\d|5[0-5])|1?\d{1,2}))' />
                            </td>
                            <td>
                                <input type="text" name="B_Color" placeholder="0-255" pattern='(?:(?:2(?:[0-4]\d|5[0-5])|1?\d{1,2}))' />
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <?php
                                if (isset($_POST['R_Color'], $_POST['G_Color'], $_POST['B_Color'])) {
                                    $selected_color = rgbToHex($_POST['R_Color'], $_POST['G_Color'], $_POST['B_Color']);
                                    $inverse_color = inverseColor($_POST['R_Color'], $_POST['G_Color'], $_POST['B_Color']);
                                    //echo "Color code is:  " . $selected_color;
                                    //echo "Color inverse is:  " . $inverse_color;
                                
                                    ?>
                                    <span style="width:100%; background-color:<?php echo $selected_color ?>; color: <?php echo $inverse_color ?>; display: inline-block;">
                                        <?php echo $selected_color ?>
                                    </span>
                                    <?php
                                } else {
                                    ?>
                                    <span style="width:100%; display: inline-block;">COLOR</span>
                                    <?php
                                }
                                ?>

                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="submit" name="Accept" value="Accept" />
                            </td>
                        </tr>
                    </tbody>
            </table>


        </form>


    </div>
</body>
</html>
