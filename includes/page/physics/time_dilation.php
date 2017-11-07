<!DOCTYPE html>
<html>
    <head>
        <title>时间膨胀 - <?php global $gSitename; echo $gSitename;?></title>
        <?php global $gCommonHead;echo $gCommonHead;?>
    </head>   
    <body>
        <h1>时间膨胀计算</h1>
        <form name="时间膨胀计算" method="post" action="index.php?title=physics/time_dilation&action=result">
            <input type="hidden" name="type" value="time_dilation">
            物体的原时(速度为0的时间):<input name="tdt" type="text">s<br>
            物体的速度:<input name="tdv" type="text">m·s<sup>-1</sup><br>
            <input name="提交" type="submit" value="计算">
        </form>
    </body>
</html>
