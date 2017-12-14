<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 08.03.2018.
 * Time: 20:27
 */

?>
<?php include("php/first.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("php/head.php"); ?>
    <title>Admin Panel</title>
</head>
<body>
<?php include("php/nav.php"); ?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-md-12 text-left">
            <h1><span class="fa fa-fw fa-cog fa-spin"></span> Admin Panel</h1>
            <hr>
            <h3><span class="fa fa-fw fa-check-square-o"></span> Dodaj zadatke za <?php echo date("W")+1; ?>. sedmicu
                <small><?php echo date("d.m.",strtotime("next monday"));?> <span class="fa fa-arrow-right"></span> <?php echo date("d.m.",strtotime("next sunday +1 week"));?></small>
            </h3>
            <table class="table table-hover table-condensed">
                <thead>
                <th><span class="fa fa-fw fa-hashtag"></span> No</th>
                <th><span class="fa fa-fw fa-user"></span> Ime i Prezime</th>
                <?php
                $qju = mysqli_query($c, "SELECT * FROM disc");
                $numb = 0;
                while ($b = mysqli_fetch_array($qju)) {
                    $var[$b['ID']] = '';
                    $qju2 = mysqli_query($c, "SELECT * FROM podd WHERE disc='" . $b['ID'] . "'");
                    while ($bb = mysqli_fetch_array($qju2)) {
                        $var[$b['ID']] .= '<td class="kilik ptr" data-subdis="' . $bb['ID'] . '" data-clckd="false">' . substr($bb['ime'], 0, 1) . '</td>';
                    }
                    $numb++;
                }
                for ($j = 1; $j < 8; $j++) {
                    echo '
                    <th class="center">' . brudan($j) . '</th>';
                }
                ?>
                </thead>
                <tbody>
                <?php
                echo '<tr>
                        <td><span class="fa fa-fw fa-group"></span></td>
                    <td>Svima</td>';
                for ($j = 1; $j < 8; $j++) {
                    echo '
                    <td>
                        <table class="center ws">
                            <tr>
                                <td class="klikk ptr" data-sta="0" data-dan="' . $j . '"  data-sldd="false"><span class="fa fa-fw fa-circle-o"></span></td>';
                    $qq = mysqli_query($c, "SELECT * FROM disc");
                    while ($b = mysqli_fetch_array($qq)) {
                        echo '<td class="klikk ptr" data-sta="' . $b['ID'] . '" data-dan="' . $j . '" data-ko="0" data-sldd="false"><span class="fl ' . $b['znak'] . '"></span></td>';
                    }
                    echo '</tr>
                        </table>';
                    for ($ij = 1; $ij <= $numb; $ij++) {
                        echo '<table class="center ws hd monos" data-disc="' . $ij . '" data-dann="' . $j . '" data-koba="0">
                            <tr>';
                        echo $var[$ij];
                        echo '</tr>
                         </table>';
                    }
                    echo '<table class="center ws"><tr><td>
                                <div class="slidecontainer">
  <input type="range" min="0" max="20" step="0.1" value="5" class="slider slidqu" data-dansu="' . $j . '">
</div>
                            </td></tr><tr><td class="sliderval" data-dansu="' . $j . '"><b>5</b> km</td></tr></table>';
                    echo '</td>';
                }
                echo '</tr>';
                $jq = mysqli_query($c, "SELECT * FROM users");
                while ($be = mysqli_fetch_array($jq)) {
                    echo '<tr><td>' . $be['ID'] . '</td><td>' . $be['ime'] . ' ' . $be['prezime'] . '</td>';
                    for ($j = 1; $j < 8; $j++) {
                        echo '
                    <td>
                        <table class="center ws">
                            <tr>
                                <td class="klikk ptr" data-sta="0" data-dan="' . $j . '" data-ko="' . $be['ID'] . '" data-sldd="false"><span class="fa fa-fw fa-circle-o"></span></td>';
                        $qq = mysqli_query($c, "SELECT * FROM disc");
                        while ($b = mysqli_fetch_array($qq)) {
                            echo '<td class="klikk ptr" data-sta="' . $b['ID'] . '" data-dan="' . $j . '" data-ko="' . $be['ID'] . '" data-sldd="false"><span class="fl ' . $b['znak'] . '"></span></td>';
                        }
                        echo '</tr>
                        </table>';
                        for ($ij = 1; $ij <= $numb; $ij++) {
                            echo '<table class="center ws hd monos" data-disc="' . $ij . '" data-dann="' . $j . '" data-koba="' . $be['ID'] . '">
                            <tr>';
                            echo $var[$ij];
                            echo '</tr>
                         </table>';
                        }
                        echo '<table class="center ws"><tr><td>
                                <div class="slidecontainer">
  <input type="range" min="0" max="20" step="0.1" value="5" class="slider slidq" data-dans="' . $j . '" data-kos="' . $be['ID'] . '">
</div>
                            </td></tr><tr><td class="sliderval" data-dansu="' . $j . '" data-kosu="' . $be['ID'] . '"><b>5</b> km</td></tr></table>';
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <button id="zadator" class="btn btn-success pull-right btn-block"><span class="fa fa-fw fa-check"></span>
                Zadaj!
            </button>
        </div>
    </div>
</div>

<?php include("php/footer.php"); ?>

</body>
</html>
