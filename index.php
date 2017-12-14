<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 06.03.2018.
 * Time: 10:52
 */
?>
<?php include("php/first.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("php/head.php"); ?>
    <title>Naslovna</title>
</head>
<body>
<?php include("php/nav.php"); ?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-lg-2 sidenav hidden-md hidden-sm hidden-xs">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-lg-8 text-left">
            <h1>Dobro došli!</h1>
            <table class="table center week">
                <tr>
                    <?php
                    for($i=1;$i<8;$i++){
                        if($i==date("N"))
                            $idee="id=\"todwk\"";
                        else $idee="";
                        $dan=brudan($i);
                        $ku=mysqli_query($c,"select * from tasks where ko='".$uid."' and sedmica='".date("W")."' and kad='".$i."'");
                        if(mysqli_num_rows($ku)){
                            $uniz=mysqli_fetch_array($ku);
                            $pod=mysqli_fetch_array(mysqli_query($c,"select disc,ime from podd where ID='".$uniz['sta']."'"));
                            $disc=mysqli_fetch_array(mysqli_query($c,"select * from disc where ID='".$pod['disc']."'"));
                            $boja=$disc['boja'];
                            $icona=$disc['znak'];
                            echo
                                '<td class="weekday '.$boja.'"'.$idee.'>
                                    <em class="text-muted">'.substr($dan,0,3).'<span class="hidden-xs">'.substr($dan,3,strlen($dan)-3).'</span></em><br><br>
                                    <p><span class="fl '.$icona.'"></span><span class="hidden-xs"> '.$pod['ime'].'</span></p>
                                </td>';
                        }
                        else{
                            echo'<td class="weekday"'.$idee.'>
                                    <em class="text-muted">'.substr($dan,0,3).'<span class="hidden-xs">'.substr($dan,3,strlen($dan)-3).'</span></em><br><br>
                                    <p></p>
                                </td>';
                        }

                    }
                    ?>
                </tr>
            </table>
            <h2 class="text-secondary"><?php echo brudan(date("N")); ?></h2>
            <?php
            $ku2=mysqli_query($c,"select * from tasks where ko='".$uid."' and sedmica='".date("W")."' and kad='".date("N")."' and uradio=0");
            if(mysqli_num_rows($ku2)){
                $uniz=mysqli_fetch_array($ku2);
                $pod=mysqli_fetch_array(mysqli_query($c,"select disc,ime from podd where ID='".$uniz['sta']."'"));
                $disc=mysqli_fetch_array(mysqli_query($c,"select * from disc where ID='".$pod['disc']."'"));
                $boja=$disc['boja'];
                $icona=$disc['znak'];
                echo'<div class="row today center">
                        <div class="col-sm-3 icoon center-block">
                            <h3 class="i text-muted">'.$pod['ime'].'</h3>
                            <span class="fl '.$icona.' fliconbig" style="font-size: 100pt;"></span>
                        </div>
                        <div class="col-sm-9 otherr">
                            <p class="i text-muted">Današnji zadatak: <span class="kolikokm" id="ukuonokm">'.$uniz['koliko'].'</span> km</p>
                            <div class="row">
                                <div class="col-xs-1">0 km</div>
                                <div class="col-xs-10">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="'.$uniz['koliko'].'" aria-valuemin="0" aria-valuemax="20" style="width: '.(100*$uniz['koliko']/20).'%">'.$uniz['koliko'].' km</div>
                                    </div>
                                </div>
                                <div class="col-xs-1">20 km</div>
                            </div>
                            <h4 class="i text-muted">Umor</h4>
                            <table class="table table-bordered center pointer umor ft">
                                <tr>';
                            for($i=1;$i<11;$i++)
                                echo '<td class="lvl" data-kojilvl="'.$i.'" data-checked="false">'.$i.'</td>';
                          echo '</tr>
                            </table>
                            <div class="row">
                                <div class="col-lg-4 col-xs-6">Vrijeme: <input class="vrim" type="number" id="minu" min="0" max="60" value="0">min <input class="vrim" type="number" id="secc" value="0" min="0" max="59">s</div>
                                <div class="col-lg-4 col-xs-6" style="margin-bottom:10px;">Pace: <span id="pacee">00:00</span> min/km</div>
                                <div class="col-lg-4 col-xs-12">
                                    <div class="btns pull-right">
                                        <button class="btn btn-success" id="usp"><span class="fa fa-check"></span> Završeno</button>
                                        <!--<button class="btn btn-danger" id="nisamusp"><span class="fa fa-times"></span> Nije</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            else{
                echo'<div class="row center"><h3 class="text-muted"><em>Odmor</em></h3></div>';
            }
            ?>
        </div>
        <div class="col-lg-2 sidenav hidden-md hidden-sm hidden-xs">
            <div class="well">
                <p>Nesto</p>
            </div>
            <div class="well">
                <p>Nesto</p>
            </div>
        </div>
    </div>
</div>

<?php include("php/footer.php"); ?>

</body>
</html>
