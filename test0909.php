<?php
/**
 * Created by PhpStorm.
 * User: zzw
 * Date: 15-9-9
 * Time: 下午1:50
 * content: php练习
 */
echo 12 ^ 9;
var_dump(function_exists('http_redirect'));
// 数组是用标准比较运算符这样比较的
function  standard_array_compare ( $op1 ,  $op2 )
{
    if ( count ( $op1 ) <  count ( $op2 )) {
        return - 1 ;  // $op1 < $op2
    } elseif ( count ( $op1 ) >  count ( $op2 )) {
        return  1 ;  // $op1 > $op2
    }
    foreach ( $op1  as  $key  =>  $val ) {
        if (! array_key_exists ( $key ,  $op2 )) {
            return  null ;  // uncomparable
        } elseif ( $val  <  $op2 [ $key ]) {
            return - 1 ;
        } elseif ( $val  >  $op2 [ $key ]) {
            return  1 ;
        }
    }
    return  0 ;  // $op1 == $op2
}

echo  "<h3>Postincrement</h3>" ;
$a  =  5 ;
echo  "Should be 5: "  .  $a ++ .  "<br />\n" ;
echo  "Should be 6: "  .  $a  .  "<br />\n" ;

echo  "<h3>Preincrement</h3>" ;
$a  =  5 ;
echo  "Should be 6: "  . ++ $a  .  "<br />\n" ;
echo  "Should be 6: "  .  $a  .  "<br />\n" ;

echo  "<h3>Postdecrement</h3>" ;
$a  =  5 ;
echo  "Should be 5: "  .  $a -- .  "<br />\n" ;
echo  "Should be 4: "  .  $a  .  "<br />\n" ;

echo  "<h3>Predecrement</h3>" ;
$a  =  5 ;
echo  "Should be 4: "  . -- $a  .  "<br />\n" ;
echo  "Should be 4: "  .  $a  .  "<br />\n" ;
echo "<hr/>";
class a {
    protected $a1 = 6;
}
class b extends a {
    function output() {
        echo ++$this->a1;
    }
}
$oup = new b();
$oup->output();
echo "<hr/>";
class Point { }
class Dimension { }
class Rectangle { }

$items = array(true, false, null, 23, 0, -26, 4.21, 0.0, -3.76,
    'hello', '', array(1, 2, 3), array('', '', ''), array(),
    new stdClass(), new Point(), new Dimension(), new Rectangle());

echo '<table cellpadding="4" border="1">
  <tr>
    <th>syntax</th>
    <th>value</th>
    <th>type</th>
    <th>empty</th>
    <th>boolean</th>
  </tr>' . "\n";

foreach($items AS $item)
{
    $booleanValue = (boolean)$item;
    $empty = (empty($item) ? 'EMPTY' : '&nbsp;');
    $type = gettype($item);
    $syntax = 'if((boolean)';

    $val;

    if($type == boolean)
    {
        $val = ($booleanValue ? 'true' : 'false');
        $syntax .= ($val . ')');
    }
    else if($type == 'NULL')
    {
        $val = 'null';
        $syntax .= 'null)';
    }
    else if($type == double && !$booleanValue)
    {
        $val = '0.0';
        $syntax .= '0.0)';
    }
    else if($type == string)
    {
        $val = '\'' . $item . '\'';
        $syntax .= ($val . ')');
    }
    else if($type == 'array')
    {
        $val = $item;
        $syntax .= '$array)';
    }
    else if($type == 'object')
    {
        $val = get_class($item);
        $syntax .= ('$' . strtolower($val) . ')');
    }
    else
    {
        $val = $item;
        $syntax .= ($val . ')');
    }

    echo '  <tr style="color: ' . ($booleanValue ? '#006600' : '#880000') . ';">
    <td><code>' . $syntax . '</code></td>
    <td>' . $val . '</td>
    <td>' . $type . '</td>
    <td>' . $empty . '</td>
    <td>' . ($booleanValue ? 'TRUE' : 'FALSE') . '</td>
  </tr>' . "\n";
}

echo '</table>' . "\n";


echo "<hr/>";
// generating an array with random even numbers between 1 and 1000

$numbers = array();
$array_size = 10;

// for loop runs as long as 2nd condition evaluates to true
for ($i=0;$i<$array_size;$i++) {

    // always executes (as long as the for-loop runs)
    do {
        $random = rand(1,1000);

        // if the random number is even (condition below is false), the do-while-loop execution ends
        // if it's uneven (condition below is true), the loop continues by generating a new random number
    } while (($random % 2) == 1);

    // even random number is written to array and for-loop continues iteration until original condition is met
    $numbers[] = $random;
}

// sorting array by alphabet

asort($numbers);

// printing array

echo '<pre>';
print_r($numbers);
echo '</pre>';
echo "<hr/>";
$array = array(
    'pop0',
    'pop1',
    'pop2',
    'pop3',
    'pop4',
    'pop5',
    'pop6',
    'pop7',
    'pop8'
);
echo "Tot Before: ".count($array)."<br><br>";
for ($i=0; $i<count($array); $i++) {
    if ($i === 3) {
        unset($array[$i]);
    }
    echo "Count: ".count($array). " - Position: ".$i."<br>";
}
echo "<br> Tot After: ".count($array)."<br>";
echo "<hr/>";
//array_map(function,array1,array2,array3...)
$a = array_map('doSomething',range(0, 5));
var_dump($a);

echo "<hr/>";
//日期循环
for ($date = strtotime("2014-01-01"); $date < strtotime("2014-02-01"); $date = strtotime("+1 day", $date)) {
    echo date("Y-m-d", $date)."<br />";
}
echo "<hr/>";
$text = "Welcome to PHP";
$searchchar = "e";
$count = "0"; //zero

for($i = "0"; $i < strlen($text); $i=$i+1){
    echo $i;
    echo substr($text,$i,1);
    if(substr($text,$i,1) == $searchchar){
        $count = $count + 1;
    }
    echo $count."<br/>";
}
echo $count;
echo "<hr/>";
$arr  = array( 1 ,  2 ,  3 ,  4 );
foreach ( $arr  as & $value ) {
    $value  =  $value  *  2 ;
}
// $arr is now array(2, 4, 6, 8)
unset( $value );  // 最后取消掉引用

echo "<hr/>";
$array  = [
    [ 1 ,  2 ],
    [ 3 ,  4 ],
];

foreach ( $array  as list( $a ,  $b )) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    echo  "A:  $a ; B:  $b \n" ;
}
echo "<hr/>";
$arr = array(1, 2, 3);
foreach($arr as $number) {
    if($number == 2) {
        continue;
    }
    print $number."<br/>";
}

echo "<hr/>";
echo realpath("../");//输出真是的路径
echo "<hr/>";
$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die("Could not connect");

$memcache->set('key', 'This is a test!', 0, 60);
$val = $memcache->get('key');
echo $val;


$mem = new Memcache; //创建Memcache对象
$mem->connect("127.0.0.1", 11211); //连接Memcache服务器

$val = "这是一个Memcache的测试.";
$key = md5($val);
$mem->set($key, $val, 0, 120); //增加插入一条缓存，缓存时间为120s

if(($k = $mem->get('key'))){ //判断是否获取到指定的key
    echo 'from cache:'.$k;
} else {
    echo 'normal'; //这里我们在实际使用中就需要替换成查询数据库并创建缓存.
}

echo "<hr/>";
session_start();
$_SESSION["UserID"]=123;
echo session_id();//26npo1qjt2a1iksfq2bbubffr6