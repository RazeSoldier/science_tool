<?php
/**
 * Description of enerypt
 * 哈希函数类
 * 
 */
class enerypt {
    private $type; //计算类型
    private $value; //用户输入的数值

    public function __construct($type, $value) {
        $this -> type = $type;
        $this -> value = $value;
    }
    
    private function gethash(){ //根据$type来计算$value
        $hash = hash($this -> type, $this -> value);
        return $hash;
    }
    
    final public function Output(){
        return $this -> gethash();
    }
    
    public function getTitle(){ //根据$type来获取标题
        switch ($this -> type) {
            case 'md2':
                return 'MD2';
            case 'md4':
                return 'MD4';
            case 'md5':
                return 'MD5';
            case 'sha1':
                return 'SHA-1';
            case 'sha224':
                return 'SHA-224';
            case 'sha256':
                return 'SHA-256';
            case 'sha384':
                return 'SHA-384';
            case 'sha512':
                return 'SHA-512';
        }
    }

    /* 检查用户是否输入了文本或是否输入了空格
     * 如果用户未输入文本，返回'<i>(空文本)</i>'
     * 如果用户输入了全为空格的文本。返回"<i>({$matchnumber}个空格)</i>"
     * 除此之外，不执行任何操作
     */
    public function checkSpace($value){
        $str = preg_replace('/\s/', null, $value); //替换$value里的空格为null
        if ($str == ''){
            /*用户未输入文本*/
            if ($value == ''){
                $space = '<i>(空文本)</i>';
            }else{ //用户输入了全为空格的文本
                $spacenumber = preg_match_all('/\s/', $value);
                $space = "<i>({$spacenumber}个空格)</i>";
            }
        }
        return $space;
    }
}
