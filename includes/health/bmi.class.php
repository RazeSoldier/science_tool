<?php
class BMI {
    public $m ; //身高
    public $h ; //体重
    
    public function __construct($weight,$height){ //获取外部数据
        $this -> m = $weight;
        $this -> h = $height / 100;
    }
    
    private function checkValue(){ //检查$m和$h是否大于0
        if ($this -> m <= 0 || $this -> h <=0){
            return false; //如果有一个数值小于等于0,返回false
        }else{
            return true; //如果两个数值都大于0,返回true
        }
    }

    private function getValue(){ //计算
        $h2 = pow($this -> h,2);
        $result = round(($this -> m / $h2),2); //四舍五入后保留2位小数
        return $result;
    }
    
    private function getHealthStatus(){ //根据BMI数值判断健康状况
        $value = $this -> getValue();
        if ($value < 18.5){
            return '体重过低 (<18.5)';
        }elseif ($value >= 18.5 and $value < 24){
            return '体重正常 (18.5-24)';
        }elseif ($value >= 24 and $value < 28){
            return '超重 (24-28)';
        }elseif ($value >= 28){
            return '肥胖 (>28)';
        }
    }
    
    private function getTitle(){ //根据checkValue方法，给出title的值
        if ($this ->checkValue()){
            return '<title>BMI计算结果 - 健康/学园都市</title>';
        }else{
            return '<title>错误 - 健康/学园都市</title>';
        }
    }
    
    private function getHead(){ //获取Head
        $title = $this -> getTitle();
        echo '<head>';
        echo '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo $title;
        echo '</head>';
    }

    final public function output(){ //最终输出
        $this -> getHead();
        if ($this -> checkValue()){
            echo '你的BMI为:'.$this -> getValue().' kg/m<sup>2</sup>';
            echo '<br>健康状况:'.$this ->getHealthStatus();
        }else{
            echo '<b>错误!</b>你输入了小于等于0的数字';
            echo '<br><a href="JavaScript:history.go(-1)">返回</a>';
        }
    }
}