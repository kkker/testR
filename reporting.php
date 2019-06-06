<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// 有多少紀錄？ 時間@IP
// cat 20180222.phplog |awk '{ print $1}'|grep \@ |uniq|sort|wc -l

// 將錯誤列表出來：將關鍵字「onErrorArgs」的上一行取出，用空白字元取代換行符號，將「--」變成換行
// cat 20180222.phplog |grep "onErrorArgs" -B1|sed ':a;N;$!ba;s/\n/ /g'| sed 's/--/\n/g'|sort|uniq

// 將錯誤列表出來有多少種？
// cat .phplog |grep "onErrorArgs" -B1|sed ':a;N;$!ba;s/\n/ /g'| sed 's/--/\n/g'|sort|uniq|wc -l



/**
 * 使用方法：
 * 1. 將 http://foru.ping.acsite.org/onError/log/* 的檔案取回
 * 2. 存放在此目錄下的 logs 目錄
 * 3. 檢視此檔案：http://foru.localhost:8080/phpUtils/onErrors/reporting.php
 * 4. 即可得到 將錯誤列表出來（不同種）
 *
 * P.S. http://foru.ping.acsite.org/onError/log/201802/20180221.phplog
 */

// 將錯誤列表出來（不同種）
// cat ./*/*.phplog |grep "onErrorArgs" -B1|sed ':a;N;$!ba;s/\n/ /g'| sed 's/--/\n/g'|sort|uniq
$cmd = 'cat ./logs/*/*.phplog |grep "onErrorArgs" -B0|sed \':a;N;$!ba;s/\n/ /g\'| sed \'s/--/\n/g\'|sort|uniq';
// $cmd = 'ls -l';
// $cmd = 'find ./logs -type f -exec cat {} ';
// $cmd = 'find ./logs -type f -exec cat {} +|grep "onErrorArgs" -B1|sed \':a;N;$!ba;s/\n/ /g\'| sed \'s/--/\n/g\'|sort|uniq';


$out = shell_exec($cmd);
echo '<pre>';
print_r($out);

// $return = exec($cmd, $out, $return_var);
// print_r($return_var);
// print_r($return);
// print_r($out);

// $return = system($cmd, $return_var);
// print_r($return_var);
// print_r($return);