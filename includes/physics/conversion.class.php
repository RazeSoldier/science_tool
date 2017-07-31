<?php
class Conversion {
    const SPEED_OF_LIGHT = 299792458; //声明光速(常量)
    public $type; //计算类型(FtoW,WtoF)
    private $frequency; //频率
    private $wavelength; //波长
    private $unit; //(知波长求频率)波长输入值的单位
    private $errorhtml =<<<ErrorHTML
<h1>错误！</h1>
你输入的数值小于等于0！<br>
<a href="JavaScript:history.go(-1)">返回</a>
ErrorHTML;

    public function __construct($type,$frequency,$wavelength,$unit){ //获取外部数据
        $this -> type = $type;
        $this -> frequency = $frequency;
        $this -> wavelength = $wavelength;
        $this -> unit = $unit;
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
    
    private function unitConversion(){ //单位换算(仅知波长求频率)
        switch ($this -> unit) {
            case 'm': //如果单位为米,则不用换算
                return $this -> wavelength;

            case 'km': //如果单位为千米,则输出原始值的1000倍
                $m = $this -> wavelength * 1000;
                return $m;

            case 'cm': //如果单位为厘米,则输出原始值的100倍
                $cm = $this -> wavelength / 100;
                return $cm;
                
            case 'mm': //如果单位为毫米,则输出原始值的1/1000倍
                $mm = $this -> wavelength / 1000;
                return $mm;
            
            default: //如果没有命中,则返回原始值
                return $this -> wavelength;
        }
    }

    private function getFrequency(){ //知波长求频率
        $wave = $this ->unitConversion(); //获取被unitConversion()处理过的数值
        $frequency = self::SPEED_OF_LIGHT / $wave;
        return $frequency;
    }

    private function getHead(){ //根据type成员变量获取Head
        echo '<head>';
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
        echo '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '</head>';
    }
    
    private function getUnitHTML(){
        switch ($this -> unit) {
            case 'm':
                return '米(m)';
            
            case 'km':
                return '千米(km)';
                
            case 'cm':
                return '厘米(cm)';
            
            case 'mm':
                return '毫米(mm)';
        }
    }

    private function getHTML(){ //得出输出html的主体
        if ($this -> checkValue()){ //检查:输入值是否合法
            switch ($this -> type) { //如果$this->type为NULL或者输入值大于0，执行以下语句
                case 'FtoW':
                    echo '<h1>知频率求波长</h1>';
                    echo "<b>条件量</b><br>频率:{$this -> frequency} 赫兹(HZ)";
                    echo '<hr/><b>计算结果</b><br>';
                    echo "波长:{$this -> getWavelength()} 米(m)";
                    break;

                case 'WtoF':
                    echo '<h1>知波长求频率</h1>';
                    echo "<b>条件量</b><br>波长:{$this -> wavelength} {$this -> getUnitHTML()}";
                    echo '<hr/><b>计算结果</b><br>';
                    echo "频率:{$this -> getFrequency()} 赫兹(HZ)";
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
        $this -> getHead();
        $this -> getHTML();
    }
}