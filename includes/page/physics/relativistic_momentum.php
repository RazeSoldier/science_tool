<!DOCTYPE html>
<html>
    <head>
        <title>相对论动量 - <?php echo $gSitename;?></title>
        <?php global $gCommonHead;echo $gCommonHead;?>
    </head>
    <body>
        <h1>相对论动量计算</h1>
        <form name="相对论动量计算" method="post" action="index.php?title=physics/relativistic_momentum&action=result">
            <input type="hidden" name="type" value="relativistic_momentum">
            物体的质量:<input name="rmm1" type="text">kg<br>
            物体的速度:<input name="rmv1" type="text">m·s<sup>-1</sup><br>
            <input name="提交" type="submit" value="计算">
        </form>
    </body>
</html>