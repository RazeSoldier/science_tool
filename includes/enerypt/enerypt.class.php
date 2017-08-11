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

    final public function Output(){
        return $this -> gethash();
    }
}
