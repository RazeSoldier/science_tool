<!DOCTYPE html>
<html>
    <head>
        <title>BMI计算 - <?php echo $gSitename;?></title>
        <?php global $gCommonHead;echo $gCommonHead;?>
    </head>
    <body>
        <h1>身高体重指数计算</h1>
        <div>
            <form name="BMI计算" method="post" action="index.php?title=health/bmi&action=result">
                <input type="hidden" name="type" value="bmi">
                体重:<input name="weight" type="text">公斤<br>
                身高:<input name="height" type="text">厘米<br>
                <input name="submit" type="submit" value="计算">
            </form>
        </div>
        <div>
            <hr/>
            <b>身高体重指数</b>（又称身体质量指数，英文为<i>Body Mass Index</i>，简称BMI）是一个计算值，主要用于统计用途。
            “身高体重指数”这个概念，是由19世纪中期的比利时统计学家及数学家凯特勒（Lambert Adolphe Jacques Quetelet）最先提出。<br>
            其数值等于体重(单位:千克)除以身高(单位:米)的平方。
        </div>
    </body>
</html>
