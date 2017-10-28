<!DOCTYPE html>
<html>
    <head>
        <title>史瓦西半径 - <?php echo $gSitename;?></title>
        <?php global $gCommonHead;echo $gCommonHead;?>
    </head>
    <body>
        <h1>史瓦西半径计算</h1>
        <form name="史瓦西半径计算" method="post" action="index.php?title=physics/schwarzschild&action=result">
            <input type="hidden" name="type" value="schwarzschild">
            天体质量:<input name="sm" type="text">kg<br>
            <input name="提交" type="submit" value="计算">
            <div>
                万有引力常数(G):6.67408(31)×10<sup>−11</sup> m<sup>3</sup>·kg<sup>−1</sup>·s<sup>−2</sup>
            </div>
        </form>
    </body>
</html>