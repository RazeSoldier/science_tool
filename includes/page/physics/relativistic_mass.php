<!DOCTYPE html>
<html>
    <head>
        <title>相对论质量 - <?php echo $gSitename;?></title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>相对论质量计算</h1>
        <form name="相对论质量计算" method="post" action="index.php?title=physics/relativistic_mass&action=result">
            <input type="hidden" name="type" value="relativistic_mass">
            物体的质量:<input name="rmm0" type="text">kg<br>
            物体的速度:<input name="rmv" type="text">m·s<sup>-1</sup><br>
            <input name="提交" type="submit" value="计算">
        </form>
    </body>
</html>