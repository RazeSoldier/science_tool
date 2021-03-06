<!DOCTYPE html>
<html>
    <head>
        <title>频率和波长互换 - <?php global $gSitename; echo $gSitename;?></title>
        <?php global $gCommonHead;echo $gCommonHead;?>
        <script type="text/javascript">
            function FtoW() {
                var FtoW = document.getElementById("FtoW");
                var WtoF = document.getElementById("WtoF");
                FtoW.style.display = "block";
                if (WtoF.style.display === "block"){
                    WtoF.style.display = "none";
                }
            }
            function WtoF(){
                var FtoW = document.getElementById("FtoW");
                var WtoF = document.getElementById("WtoF");
                WtoF.style.display = "block";
                if (FtoW.style.display === "block"){
                    FtoW.style.display = "none";
                }
            }
        </script>
        <style>
            #FtoW{display: none;}
            #WtoF{display: none;}
        </style>
    </head>
    <body>
        <h1>电磁波频率和波长互换</h1>
        <form name="frequency-wavelength" method="post" action="index.php?title=physics/frequency_wavelength&action=result">
            <input type="hidden" name="type" value="F-W">
            <input name="in_type" type="radio" value="FtoW" onclick="FtoW()">知频率求波长
            <input name="in_type" type="radio" value="WtoF" onclick="WtoF()">知波长求频率<br>
            <div id="FtoW"><!--知道频率，求波长-->
		频率:<input name="frequency" type="text"> 赫兹(HZ)
            </div>
            <div id="WtoF"><!--知道波长，求频率-->
                波长:<input name="wavelength" type="text"> 
                <select name="unit">
                    <option value="m" selected>米(m)</option>
                    <option value="km">千米(km)</option>
                    <option value="cm">厘米(cm)</option>
                    <option value="mm">毫米(mm)</option>
                </select>
            </div>
            <input name="submit" type="submit" value="计算">
        </form>
    </body>
</html>
