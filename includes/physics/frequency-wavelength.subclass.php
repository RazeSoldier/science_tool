<?php
/**
* 电磁波频率和波长互换
*/

class frequency_wavelength extends physics {
    private $in_type; //声明计算类型
    private $in_f; //声明频率(用户输入值)
    private $in_w; //声明波长(用户输入值)
    private $in_unit; //声明波长的单位(用户输入值)

    public function __construct($in_type, $in_f, $in_w, $in_unit){
	$this -> in_type = $in_type;
	$this -> in_f = $in_f;
	$this -> in_w = $in_w;
	$this -> in_unit = $in_unit;
    }
    
    /** 通过checkPhysicsError子类检查
     * 检查用户输入值是否符合程序
     */
    private function checkError(){ //检查用户输入量
        $check = new checkPhysicsError();
        /*检查type变量是否被赋值*/
        if ($this -> checkType() == false){
            die ($check->return11());
        }
        if ($this -> checkNullValue() == false){
            die ($check->return10());
        }
        if ($this -> checkIsNumber() == false){
            die ($check->return3());
        }
        if ($this -> checkValue() == false){
            die ($check->return2());
        }
    }
    private function checkType(){ //检查$type是否被赋值
        global $gCheckError;
        return $gCheckError -> checkRadioValue($this -> in_type);
    }
    private function checkNullValue(){ //检查输入值是否为空
        global $gCheckError;
        switch ($this -> in_type) {
            case 'FtoW':
                return $gCheckError -> checkNullValue($this -> in_f);
            case 'WtoF':
                return $gCheckError -> checkNullValue($this -> in_w);
        }
    }
    private function checkIsNumber(){ //检查用户输入值是否为数字
        global $gCheckError;
        switch ($this -> in_type) {
            case 'FtoW':
                return $gCheckError -> checkIsNumber(array($this -> in_f));
            case 'WtoF':
                return $gCheckError -> checkIsNumber(array($this -> in_w));
        }
    }
    private function checkValue(){ //检查用户输入值是否大于0
        $check = new checkPhysicsError(); //调用checkPhysicsError子类的方法：如果返回的结果为false，则终止脚本
        switch ($this -> in_type) {
            case 'FtoW':
                return $check -> checkValue($this -> in_f);
            case 'WtoF':
                return $check -> checkValue($this -> in_w);
        }
    }
    
    private function getValue(){ //计算
        switch ($this -> in_type) {
            case 'FtoW':
                $fre = $this -> in_f;
                $wavelength = parent::SPEED_OF_LIGHT / $fre;
                return $wavelength;
            case 'WtoF':
                $wave = $this -> unitConversion()['value']; //获取被unitConversion()处理过的数值
                $frequency = parent::SPEED_OF_LIGHT / $wave;
                return $frequency;
        }
    }
    private function unitConversion(){ //单位换算(仅知波长求频率)
        switch ($this -> in_unit) {
            case 'm': //如果单位为米,则不用换算
                return array(
                    'value' => $this -> in_w,
                    'unit' => '米(m)'
                );

            case 'km': //如果单位为千米,则输出原始值的1000倍
                $km = $this -> in_w * 1000;
                return array(
                    'value' => $km,
                    'unit' => '千米(km)'
                );

            case 'cm': //如果单位为厘米,则输出原始值的100倍
                $cm = $this -> in_w / 100;
                return array(
                    'value' => $cm,
                    'unit' => '厘米(cm)'
                );
                
            case 'mm': //如果单位为毫米,则输出原始值的1/1000倍
                $mm = $this -> in_w / 1000;
                return array(
                    'value' => $mm,
                    'unit' => '毫米(mm)'
                );
            
            default: //如果没有命中,则返回原始值
                return array(
                    'value' => $this -> in_w,
                    'unit' => '米(m)'
                );
        }
    }
    
    private function getHTML() { //获取html
        switch ($this -> in_type) {
            case 'FtoW':
                $title = '知频率求波长';
                $type = '频率';
                $rel_type = '波长';
                $in_value = $this -> in_f;
                $value = $this -> getValue();
                $unit = '赫兹(HZ)';
                $rel_unit = '米(m)';
                break;
            case 'WtoF':
                $title = '知波长求频率';
                $type = '波长';
                $rel_type = '频率';
                $in_value = $this -> in_w;
                $value = $this -> getValue();
                $unit = $this -> unitConversion()['unit'];
                $rel_unit = '赫兹(HZ)';
                break;
        }
        $html = array(
            'title' => $title,
            'type' => $type,
            'reltype' => $rel_type,
            'in_value' => $in_value,
            'value' => $value,
            'unit' => $unit,
            'relunit' => $rel_unit
        );
        return $html;
    }

    final public function finalOutput(){
        $this -> checkError();
        $html = $this -> getHTML();
	$output = <<<HTML
<!DOCTYPE html>
<html>
    <head>
        <title>{$html['title']} - 计算结果学园都市</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>{$html['title']}</h1>
        <b>条件量</b><br>
        {$html['type']}:{$html['in_value']} {$html['unit']}
        <hr/><b>计算结果</b><br>
        {$html['reltype']}:{$html['value']} {$html['relunit']}
    </body>
HTML;
	echo gfFilterHTML($output);
    }
}