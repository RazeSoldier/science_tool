<!DOCTYPE html>
<html>
    <head>
        <title>长度收缩 - <?php echo $gSitename;?></title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>长度收缩计算</h1>
        <form name="长度收缩计算" method="post" action="index.php?title=physics/length_contraction&action=result">
            <input type="hidden" name="type" value="length_contraction">
            物体运动方向的长度:<input name="lcs" type="text">m<br>
            物体的速度:<input name="lcv" type="text">m·s<sup>-1</sup><br>
            <input name="提交" type="submit" value="计算">
        </form>
    </body>
</html>