<?php
class Conversion {
    const SPEED_OF_LIGHT = 299792458; //声明光速(常量)
    public $type; //计算类型(FtoW,WtoF)
    private $frequency; //频率
    private $wavelength; //波长
    private $errorhtml =<<<ErrorHTML
<h1>错误！</h1>
你输入的数值小于等于0！<br>
<a href="JavaScript:history.go(-1)">返回</a>
ErrorHTML;

    public function __construct($type,$frequency,$wavelength){ //获取外部数据
        $this -> type = $type;
        $this -> frequency = $frequency;
        $this -> wavelength = $wavelength;
    }
    
    private function checkValue(){ //检查输入值是否合法(大于0)；如果合法,返回true；如果不合法,返回false
        switch ($this -> type) {
                case 'FtoW':
                    if ($this -> frequency > 0){
                        return true;
                    } else {
                        return false;
                    }
                    break;

                case 'WtoF':
                    if ($this -> wavelength > 0){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                    
                default :  //保留默认值,旨在当用户未选任何选项就提交的时候,在getHTML()的if语句里跳到switch的default选项
                    return true;
            }
    }

    private function getWavelength(){ //知频率求波长
        $fre = $this -> frequency;
        $wavelength = self::SPEED_OF_LIGHT / $fre;
        return $wavelength;
    }
    
    private function getFrequency(){ //知波长求频率
        $wave = $this -> wavelength;
        $frequency = self::SPEED_OF_LIGHT / $wave;
        return $frequency;
    }

    private function getTitle(){ //根据type成员变量获取标题
        switch ($this -> type) {
            case 'FtoW':
                echo '<title>知频率求波长 - 物理公式计算</title>';
                break;

            case 'WtoF':
                echo '<title>知波长求频率 - 物理公式计算</title>';
                break;
            default :
                echo '<title>错误 - 物理公式计算</title>';
        }
    }
    
    private function getHTML(){ //得出输出html的主体
        if ($this -> checkValue()){ //检查:输入值是否合法
            switch ($this -> type) { //如果$this->type为NULL或者输入值大于0，执行以下语句
                case 'FtoW':
                    echo '<h1>知频率求波长</h1>';
                    echo "<b>条件量</b><br>频率:{$this -> frequency} HZ";
                    echo '<hr/><b>计算结果</b><br>';
                    echo "波长:{$this -> getWavelength()} m";
                    break;

                case 'WtoF':
                    echo '<h1>知波长求频率</h1>';
                    echo "<b>条件量</b><br>波长:{$this -> wavelength} HZ";
                    echo '<hr/><b>计算结果</b><br>';
                    echo "频率:{$this -> getFrequency()} m";
                    break;
            
                default :
                    echo '<h1>错误！</h1>';
                    echo '你未选择任意选项！<br>';
                    echo '<a href="JavaScript:history.go(-1)">返回</a>';
            }
        } else { //如果输入值小于等于0，执行以下语句
            echo $this -> errorhtml;
        }
    }


    final function finalOutput(){ //最终输出
        $this -> getTitle();
        $this -> getHTML();
    }
}