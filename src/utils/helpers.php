<?php
    function writeLog($message, $path ){
        $file_path = $path."/log.txt";
        $fp = fopen($file_path,'a'); //a is append mode
        fwrite($fp, date("c  "));
        fwrite($fp, $message);
        fwrite($fp, PHP_EOL);
        fclose($fp);
    }

    function writeAppLog($message, $path ){
        $file_path = $path."/app_log.txt";
        $fp = fopen($file_path,'a'); //a is append mode
        fwrite($fp, date("c  "));
        fwrite($fp, $message);
        fwrite($fp, PHP_EOL);
        fclose($fp);
    }

    // fwrite($fp, date("Y/m/d  "));
    // fwrite($fp, date("h:i:s a P GMT ")); //P=GMT T=+5.30
?>


