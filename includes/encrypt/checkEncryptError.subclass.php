<?php

class checkEneryptError extends checkError {
    public function checkRadioValue($value){ //检查用户是否选定单选项(error11)
        if ($value == NULL){ //如果用户为未选择单选，终止脚本
            die (checkError::$error11);
        }
    }
}
