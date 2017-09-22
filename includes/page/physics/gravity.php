<!DOCTYPE html>
<html>
    <head>
    <title>万有引力 - <?php echo $gSitename;?></title>
    <?php global $gCommonHead;echo $gCommonHead;?>
    </head>
    <body>
        <h1>万有引力计算</h1>
        <form name="万有引力计算" method="post" action="index.php?title=physics/gravity&action=result">
            <input type="hidden" name="type" value="gravity">
            一个物体的质量:<input name="gm1" type="text">kg<br>
            另一个物体的质量:<input name="gm2" type="text">kg<br>
            两个物体之间的距离:<input name="gr" type="text">m<br>
            <input name="提交" type="submit" value="计算">
            <div>万有引力常数(G):6.67408(31)×10<sup>−11</sup> m<sup>3</sup>·kg<sup>−1</sup>·s<sup>−2</sup>
            </div>
        </form>
    </body>
</html>