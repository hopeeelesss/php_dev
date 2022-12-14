<?php
if (isset($_GET['num'])) 
{
    if (!is_numeric($_GET['num'])) {
        echo '<b>num</b> must be a number';
    } 
    else 
    {
        require_once 'figure.php';

        $figure = new Figure((int)$_GET['num']);
        $color = match($figure->color){
            0 => 'yellow',
            1 => 'orange',
            2 => 'green',
            default => 'red',
        };

        $x = 50 + 200 * $figure->x;
        $y = 50 + 200 * $figure->y;

        echo "<svg width=$x height=$y>";
        switch ($figure->shape_type)
        {
            case 0:
                echo "<circle cx=", $x / 2, " cy=", $y / 2, " r=", $x / 4, " fill=$color />";
                break;
            default:
                echo "<rect x=0 y=0 width=$x height=$y fill=$color />";
        }
        echo "</svg>";
    }
} 
else {
    echo 'Please specify the <b>num</b> parameter';
}
?>