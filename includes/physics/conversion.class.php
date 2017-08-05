<?php
require_once 'checkPhysicsError.subclass.php';

class Conversion {
    const SPEED_OF_LIGHT = 299792458; //声明光速(常量)
    public $type; //计算类型(FtoW,WtoF)
    private $frequency; //频率
    private $wavelength; //波长
    private $unit; //(知波长求频率)波长输入值的单位

    public function __construct($type,$frequency,$wavelength,$unit){ //获取外部数据
        $this -> type = $type;
        $this -> frequency = $frequency;
        $this -> wavelength = $wavelength;
        $this -> unit = $unit;
    }
	
    private function checkType(){ //检查$type成员变量是否被赋值
        $check = checkPhysicsError::checkRadioValue($this -> type);
        return $check;
    }
    
    private function checkImport(){ //检查输入值是否被赋值；如果被赋值,返回false；反之,返回true
        switch ($this -> type) {
            case 'FtoW':
                $check = checkPhysicsError::checkNullValue($this -> frequency);
                return $check;

            case 'WtoF':
                $check = checkPhysicsError::checkNullValue($this -> wavelength);
                return $check;
        }
    }
	
    private function checkValue(){ //检查输入值是否合法(大于0)；如果合法,返回false；如果不合法,返回true
        switch ($this -> type) {
            case 'FtoW':
                $check = checkPhysicsError::checkValue($this -> frequency);
                return $check;

            case 'WtoF':
                $check = checkPhysicsError::checkValue($this -> wavelength);
                return $check;
        }
    }
	
    private function getError(){ //获取错误信息
	if ($this -> checkType()){
            return 11; //如果$type未被赋值，则返回错误码11
	}else if($this -> checkImport() == 1){
            return 10; //如果输入值未被赋值，返回错误码10
	}else if($this -> checkValue()){ //如果输入值小于等于0，返回错误码2
            return 2;
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
		if (NULL !== $this -> getError()){
			$error = false;
		}else{
			$error = true;
		}
		
        echo '<head>';
		if ($error){ //如果有错误码，返回错误信息
			switch ($this -> type) {
				case 'FtoW':
					echo '<title>知频率求波长 - 物理公式计算</title>';
					break;

				case 'WtoF':
					echo '<title>知波长求频率 - 物理公式计算</title>';
					break;
			}
		}else{
			echo '<title>错误 - 物理公式计算</title>'; //如果未选任何单选，则返回输出此值
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
	$error = $this -> getError();
		
	if ($error == 11){
            echo checkPhysicsError::$error11;
	}else if($error == 10){
            echo checkPhysicsError::$error10;
	}else if($error == 2){
            echo checkPhysicsError::$error2;
	}else{
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
            }
	}
    }


    final function finalOutput(){ //最终输出
        $this -> getHead();
        $this -> getHTML();
    }
}