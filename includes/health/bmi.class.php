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
            return true; //如果有一个数值小于等于0,返回true
        }
    }
    
    private function getValue(){ //计算
        $h2 = pow($this -> h,2);
        $result = $this -> m / $h2;
        return $result;
    }
    
    private function getHealthStatus(){ //根据BMI数值判断健康状况
        $value = $this -> getValue();
        if ($value < 18.5){
            return '体重过低';
        }elseif ($value >= 18.5 and $value < 24){
            return '体重正常';
        }elseif ($value >= 24 and $value < 28){
            return '超重';
        }elseif ($value >= 28){
            return '肥胖';
        }
    }

    final public function output(){ //最终输出
        if ($this -> checkValue()){
            echo '你的BMI为: '.$this -> getValue();
            echo '<br>健康状况:'.$this ->getHealthStatus();
        }else{
            echo '<b>错误!</b>你输入了小于等于0的数字';
        }
    }
}