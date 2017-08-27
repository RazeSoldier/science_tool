<?php
/*
 * 物理学，抽象类
 */

abstract class physics {
    const SPEED_OF_LIGHT = 299792458; //声明光速(常量)
    const GRAVITATIONAL_CONSTANT = 6.67408E-11; //声明万有引力常数(常量)
    
    /** 计算结果输出模板
     *  $type 计算类型
     *  $in 用户输入量
     *  $value 计算输出值
     */
    protected function getOutput($type, $in, $value){
        switch ($type) {
            case 'schwarzschild':
                $titletype = '史瓦西半径';
                $input = '天体质量:'.$in.' kg';
                $resultunit = 'm';
                break;
            case 'gravity':
                $titletype = '万有引力';
                $input = <<<HTML
一个物体的质量:{$in['m1']} kg</br>
另一个物体的质量:{$in['m2']} kg</br>
两物体之间的距离:{$in['r']} m
HTML;
                $resultunit = 'N';
                break;
        }
        
        /*生成head*/
        $title = "<title>{$titletype}计算结果/学园都市</title>";
        $head = '<head>'
                .'<meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0">'
                .$title
                .'</head>';
        
        /*生成body*/
        $body = '<body>'
                .'<b>条件量</b><br>'
                .$input
                .'</br><hr/>'
                .'<b>计算结果</b>:'
                .$value.' '.$resultunit
                .'</body>';
        
        /*拼接成html*/
        $html = '<!DOCTYPE html><html>'
                .$head
                .$body
                .'</html>';
        
        return $html;
    }
}
