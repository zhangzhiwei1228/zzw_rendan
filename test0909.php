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
echo "<hr/>";
//使用输出缓冲来将 PHP 文件包含入一个字符串
$string  =  get_include_contents ( 'somefile.php' );

function  get_include_contents ( $filename ) {
    if ( is_file ( $filename )) {
        ob_start ();
        include  $filename ;
        $contents  =  ob_get_contents ();
        ob_end_clean ();
        return  $contents ;
    }
    return  false ;
}

echo "<hr/>";
define('__ROOT__', dirname(dirname(__FILE__)));
echo __ROOT__;
echo "<hr/>";
for( $i = 0 , $j = 50 ;  $i < 100 ;  $i ++) {
    while( $j --) {
        if( $j == 17 ) goto  end ;
    }
}
echo  "i =  $i " ;
end :
echo  'j hit 17' ;
echo "<hr/>";
/**
 *  函数无需在调用之前被定义，除非是下面两个例子中函数是有条件被定义时。
 *  当一个函数是有条件被定义时，必须在调用函数之前定义。
 */
$makefoo  =  true ;

/* 不能在此处调用foo()函数，
   因为它还不存在，但可以调用bar()函数。*/

bar ();

if ( $makefoo ) {
    function  foo ()
    {
        echo  "I don't exist until program execution reaches me.\n"."<br/>" ;
    }
}

/* 现在可以安全调用函数 foo()了，
   因为 $makefoo 值为真 */

if ( $makefoo )  foo ();

function  bar ()
{
    echo  "I exist immediately upon program start.\n"."<br/>" ;
}

echo "<br/>";
//函数中的函数
function  foo1 ()
{
    function  bar1 ()
    {
        echo  "I don't exist until foo1() is called.\n" ;
    }
}

/* 现在还不能调用bar()函数，因为它还不存在 */

foo1 ();

/* 现在可以调用bar()函数了，因为foo()函数
   的执行使得bar()函数变为已定义的函数 */

bar1 ();
//函数递归
function  recursion ( $a )
{
    if ( $a  <  20 ) {
        echo  " $a \n" ;
        recursion ( $a  +  1 );
    }
}
recursion(1);//递归函数
echo "<hr/>";
$arr1=array('b','c','a'=>array('e'=>array('f'=>array('g'=>'h', 'n' ))));
$arr2=array('b','c','a'=>array('e'=>array('f'=>array('g'=>array('l'=>array('m'=>'w','q')), 'n' ))));

function Deep($array){
    foreach($array as $key){
        //var_dump($key);
        if(is_array($key)){
            //var_dump("1");
            return Deep($key);//calling the function inside the function
        } else {
            echo $key."<br/>";
        }
    }
}

echo Deep($arr1); //outputs: hn
echo Deep($arr2); //outputs: wq
/**
 *  默认情况下，函数参数通过值传递（因而即使在函数内部改变参数的值，它并不会改变函数外部的值）。
 *  如果希望允许函数修改它的参数值，必须通过引用传递参数。
 *  如果想要函数的一个参数总是通过引用传递，可以在函数定义中该参数的前面加上符号 &：
 */
function  add_some_extra (& $string )
{
    $string  .=  'and something extra.' ;
}
$str  =  'This is a string, ' ;
add_some_extra ( $str );
echo  $str ;     // outputs 'This is a string, and something extra.'
echo "<hr/>";
/**
 * 1,不能随意复制变量
 * 2,字符串用单引号，不需要解析
 * 3,使用 echo 函数来输出字符串
 * 4,不要在 echo 中使用连接符
 * 5,使用 switch/case 代替 if/else
 * 6,尽量不要在for循环中使用函数，比如for ($x=0; $x < count($array); $x)每循环一次都会调用count()函数。
 */
//BAD:
$description = $_POST['description'];
echo $description;

//GOOD:
echo $_POST['description'],"<br/>";

//BAD:
echo 'Hello, my name is' . $firstName . $lastName . ' and I live in ' . $city;

//GOOD:
echo 'Hello, my name is' , $firstName , $lastName , ' and I live in ' , $city;
echo "<hr/>";
echo strrev("string");//字符串反转

echo "<hr/>";
//选择排序(Selection sort)是一种简单直观的排序算法。它的工作原理如下。
//首先在未排序序列中找到最小（大）元素，存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小（大）元素，
//然后放到已排序序列的末尾。以此类推，直到所有元素均排序完毕。

function selectSort(&$arr){
//定义进行交换的变量
    $temp=0;
    for($i=0;$i<count($arr)-1;$i++){
//假设$i就是最小值
        $valmin=$arr[$i];
//记录最小值的下标
        $minkey=$i;
        for($j=$i+1;$j<count($arr);$j++){
//最小值大于后面的数就进行交换
            if($valmin>$arr[$j]){
                $valmin=$arr[$j];
                $minkey=$j;
            }
        }
//进行交换
        $temp=$arr[$i];
        $arr[$i]=$arr[$minkey];
        $arr[$minkey]=$temp;
    }
}

$arr=array(7,5,0,4,-1,5,5,8);
selectSort($arr);
foreach($arr as $value) {
    echo $value."   ";
}
echo "<hr/>";
header( "Content-type: image/jpeg");
$PSize = filesize('logo.gif');
$picturedata = fread(fopen('logo.gif', "r"), $PSize);
echo $picturedata;
//查看某段代码运行时间
$t1 = microtime(true);
// ... 执行代码 ...
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,3).'秒';


/*
 * php各种排序方法
 * 1,插入排序法 insert
 * 2,冒泡排序法 bubble
 * 3,选择排序法 select
 * 4,快速排序法 quick
 */
/*
 * 1,插入排序算法：
分析：既定前面数字已经排好顺序，
现在要把第n个数字插入到前面有序的数组中，使得这n个数字也是有序的放入其中，如此反复循环直至全部排好顺序。
*/
function php_sort($arr,$type) {
    $count = count($arr);
    switch($type){
        case "insert":
            for($i = 1;$i < $count;$i++) {
                $tmp = $arr[$i];
                for($j = $i-1;$j >= 0;$j--) {
                    if($tmp < $arr[$j]) {
                        $arr[$j+1] = $arr[$j];
                        $arr[$j] = $tmp;
                    } else {
                        break;
                    }
                }
            }
            return $arr;
        case "bubble":
            $flag = false;
            for($i = 1;$i<$count;$i++) {
                for($j = 0;$j<$count-$i;$j++) {
                    if($arr[$j]>$arr[$j+1]) {
                        $tmp = $arr[$j+1];
                        $arr[$j+1] = $arr[$j];
                        $arr[$j] = $tmp;
                        $flag = true;
                    }
                }
                if(!$flag) {
                    break;
                }
                $flag = false;
            }
            return $arr;
        case "select":
            for($i = 0;$i<$count-1;$i++) {
                $p = $i;
                for($j = $i+1;$j<$count;$j++) {
                    if($arr[$p] > $arr[$j]) {
                        $p = $j;
                    }
                }
                if($p != $i) {
                    $tmp = $arr[$p];
                    $arr[$p] = $arr[$i];
                    $arr[$i] = $tmp;
                }
            }
            return $arr;
        case "quick":
            if($count <= 1) {
                return $arr;
            }
            $base_num = $arr[0];
            $left_array = array();
            $right_array = array();
            for($i = 1;$i<$count;$i++) {
                if($base_num > $arr[$i]) {
                    $left_array[] = $arr[$i];
                } else {
                    $right_array[] = $arr[$i];
                }
            }
            $left_array = php_sort($left_array,"quick");
            $right_array = php_sort($right_array,"quick");
            return array_merge($left_array, array($base_num), $right_array);

    }
}
$arr = array(12,43,57,32,51,76,36,91,28,46,40);
$arr = php_sort($arr,"quick");
foreach($arr as $value) {
    echo $value."   ";
}
echo "<hr/>";
echo mb_strlen("你好");

$idArr = array(
    '000000000000001',
    '000000000000002',
    '000000000000003',
    '000000000000004',
    '000000000000005',
);
var_dump($idArr);

echo "<hr/>";
$a = time() - false < ONLINE_TIME * 60 ? true : false;
var_dump($a);
echo "<hr/>";

/**
 * PHP amqp(RabbitMQ) Demo-1
 * @author  yuansir <yuansir@live.cn/yuansir-web.com>
 */
$exchangeName = 'demo';
$queueName = 'hello';
$routeKey = 'hello';
$message = 'Hello World!';

$connection = new AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
$connection->connect() or die("Cannot connect to the broker!\n");

try {
    $channel = new AMQPChannel($connection);
    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $queue = new AMQPQueue($channel);
    $queue->setName($queueName);
    $exchange->publish($message, $routeKey);
    var_dump("[x] Sent 'Hello World!'");
} catch (AMQPConnectionException $e) {
    var_dump($e);
    exit();
}
$connection->disconnect();
echo "<hr/>";
function a() {
    return array(1,2,3);
}
list($a,$b,$c) = a();
var_dump($b);
echo "<hr/>";
class  Foo
{
    static  $val= "this is a static val";
    function  Variable ()
    {
        $name  =  'Bar' ;
        $this -> $name ();  // This calls the Bar() method
    }

    function  Bar ()
    {
        echo  "This is Bar" ;
    }
    //静态方法
    static  function  static_fun() {
        echo "Methon static called";
    }
}

$foo  = new  Foo ();
$funcname  =  "Variable" ;
$foo -> $funcname ();    // This calls $foo->Variable()
//echo  Foo :: $variable ;  // This prints 'static property'. It does need a $variable in this scope.
$variable  =  "Variable" ;
//Foo :: $variable ();   // This calls $foo->Variable() reading $variable in this scope.

//当调用静态方法时，函数调用要比静态属性优先：
$data = array ( 'user' 		=> 88,
    'content' 	=> "123123",
    'chat' 		=> time()  );
echo json_encode($data);

echo "<hr/>";
class  classname1
{
    function  __construct ()
    {
        echo  __METHOD__ , "\n" ;
    }
}
function  funcname1 ()
{
    echo  __FUNCTION__ , "\n" ;
}
const  constname  =  "global" ;

$a  =  'classname1' ;
$obj  = new  $a ;  // prints classname::__construct
$b  =  'funcname1' ;
$b ();  // prints funcname
echo  constant ( 'constname' ),  "\n" ;  // prints global
echo "<hr/>";
//php求素数
for($i = 2; $i < 10; $i++) {
    $primes = 0;
    for($k = 1; $k <= $i; $k++)
        if($i%$k === 0) $primes++;
    if($primes <= 2) // 能除以1和自身的整数(不包括0)
        echo "<strong>{$i}</strong><br />";
}
echo "<hr/>";
//将txt文件导入数据库

/*$conn=mysql_connect('localhost','root','123456'); //连接数据库
mysql_select_db('mcc_cluster',$conn);
mysql_query("SET NAMES utf8");

$fp_in = fopen('sql.txt', "r");
while (!feof($fp_in)) {
    $line = fgets($fp_in);
    $u=explode(',', $line);//如果有分割
    mysql_query("INSERT INTO `mcc_group_user_rings` (ring_id,weeks,rank,user_id,symbol1,reason1,latest_price1,highest_gain1,have_gained1,symbol2,reason2,latest_price2,highest_gain2,have_gained2,week_point,total_point,updated_at,created_at)VALUES('',$u[0],$u[1],88,$u[3],$u[4],$u[5],$u[6],$u[7],$u[8],$u[9],$u[10],$u[11],$u[12],$u[13],$u[14],'','')",$conn);
}
echo 'OK';*/
$name = null;
if(isset($name) && $name !='') {
    echo "1";
} else {
    echo "2";
}
$base64="/9j/4AAQSkZJRgABAQEAkACQAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAACQAAAAAQAAAJAAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAHKgAwAEAAAAAQAAAHIAAAAA/9sAQwAfFRcbFxMfGxkbIyEfJS9OMi8rKy9fREg4TnBjdnRuY21rfIyyl3yEqYZrbZvTnam4vsjKyHiV2+rZwumyxMjA/9sAQwEhIyMvKS9bMjJbwIBtgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA/8AAEQgAcgByAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A6GiiigAooqF5scL+dAEpIHU4phmQepquSWOSc0UwJvPH939aPP8A9n9ahooAsCZT1yKeCG6HNVKASDkHFAFyioEm7N+dTAgjIpALRRRQAUUUUAFFFQzv/CPxoAbLJuOB0/nUdFFMAoopyIXPH50ANoqTES9SWPtR+6b1WgCOinPGU56j1ptABTo5Ch9vSm0UAWwQRkdKWq8L4O09DVikAUUUUAIx2qT6VUJycmp5zhQPWoKYBRRRQAdalkOxQi/jUaffX606b/WGgBlFFFAEkTZ+RuhpjDaxHpQn31+tOm/1hoAZRRRQAVajbcgPeqtS255I/GgCeiiikBBcfeA9qiqS4++PpUdMAooooAKlceYoZeo6ioqkjRh82do96AI6KmZoieRk+1N3xr91Mn3oAI12je3QdKjJyST3pXcueaSgAooooAKfD/rBTKfD/rBQBZooopAQ3A6GoasyruQiq1MAoopVG5gPWgB6KFXe34CmO5c5NOmPzbR0FMoAKKKKACpNoePKjkdRUdOiba49+KAG0U6RdrkU2gAqSAfOT6Co6sQLhM+tAElFFFIAqtKm1vY1ZprqHXBoAq06MhXBPSkZSpwaSmArHLE+ppKKKACiiigAooooAfKwZsj0plFABJwOtADkXe2KtdKZGmxffvT6QBRRRQAUUUUANdA4waruhQ89PWrVFAFOip2hU9OKYYXHTBpgR0U7Y/8AdNJsb+6fyoASiniFz2xUiwAfeOaAIVUscAVYjjCD1PrTgABgDFLSAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAP/2Q==";
$img = base64_decode($base64);
var_dump($img);
$a = file_put_contents('test12.jpg', $img);//返回的是字节数
//printr(a);
echo "<img src='test12.jpg'>";


echo "<hr/>";
//ceshigit
?>