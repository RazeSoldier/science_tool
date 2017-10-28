<?php
/*
 * 物理学，抽象类
 */

abstract class physics {
    const SPEED_OF_LIGHT = 299792458; //@var 声明光速(常量)
    const GRAVITATIONAL_CONSTANT = 6.67408E-11; //@var 声明万有引力常数(常量)
    
    /** 计算结果输出模板
     *  @param string $type 计算类型
     *  @param numeric/string $in 用户输入量
     *  @param numeric $value 计算输出值
     *  @param array $ps_value 补充输出值(可选)
     * 
     *  @var string $title 网页标题
     *  @var string $input 条件量
     *  @var string $resultunit 结果量的单位
     *  @var mixed $ps 补充
     */
    protected function getOutput($type, $in, $value, $ps_value = NULL){
        switch ($type) {
            case 'schwarzschild':
                $titletype = '史瓦西半径';
                $input = '天体质量:'.$in.' kg';
                $resultunit = 'm';
		$ps = NULL;
                break;
            case 'gravity':
                $titletype = '万有引力';
                $input = <<<HTML
一个物体的质量:{$in['m1']} kg<br>
另一个物体的质量:{$in['m2']} kg<br>
两物体之间的距离:{$in['r']} m
HTML;
		$ps = NULL;
                $resultunit = 'N';
                break;
            case 'relativistic_mass':
                $titletype = '相对论质量';
                $input = <<<HTML
物体的质量:{$in['m']} kg<br>
物体的速度:{$in['v']} m·s<sup>-1</sup>
HTML;
                $resultunit = 'kg';
                $ps = '洛伦兹因子:'.$ps_value['lorentz_factor'];
                break;
            case 'relativistic_momentum':
                $titletype = '相对论动量';
                $input = <<<HTML
物体的质量:{$in['m']} kg<br>
物体的速度:{$in['v']} m·s<sup>-1</sup>
HTML;
                $resultunit = 'kg·m/s';
                $ps = '洛伦兹因子:'.$ps_value['lorentz_factor'];
                break;
            case 'length_contraction':
                $titletype = '长度收缩计算';
                $input = <<<HTML
物体运动方向的长度:{$in['l']} kg<br>
物体的速度:{$in['v']} m·s<sup>-1</sup>
HTML;
                $resultunit = 'm';
                $ps = '洛伦兹因子:'.$ps_value['lorentz_factor'];
                break;
            case 'time_dilation':
                $titletype = '时间膨胀计算';
                $input = <<<HTML
物体的原时:{$in['t']} s<br>
物体的速度:{$in['v']} m·s<sup>-1</sup>
HTML;
                $resultunit = 's';
                $ps = '洛伦兹因子:'.$ps_value['lorentz_factor'];
                break;
        }
        
        /*生成head*/
        global $gSitename;
	global $gCommonHead;
	$title = "<title>{$titletype}计算结果 - $gSitename</title>";
        $head = '<head>'
                .$gCommonHead
                .$title
                .'</head>';
        
        /*生成body*/
        $body = '<body>'
                .'<b>条件量</b><br>'
                .$input
                .'</br><hr/>'
                .'<b>计算结果</b>:'
                .$value.' '.$resultunit.'<br>'
                .$ps
                .'</body>';
        
        /*拼接成html*/
        $html = '<!DOCTYPE html><html>'
                .$head
                .$body
                .'</html>';
        
        return $html;
    }
}
