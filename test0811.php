<?php
/**
 * Created by PhpStorm.
 * User: zzw
 * Date: 15-8-11
 * Time: 下午2:48
 */
header("content-type:text/html;charset=utf-8");
//header("Content-type: text/html; charset=utf-8");
//验证回调函数call_user_func()
function Mycallfunc() {
    echo  __FUNCTION__."->"."A<br/>";
}
class myclass{
    function Mycallfunc() {
        echo get_class($this)."->". __FUNCTION__."->"."B<br/>";
    }
}
call_user_func("Mycallfunc");
call_user_func(array("myclass","Mycallfunc"));
call_user_func("myclass::Mycallfunc");

class myclass1{
    static function func1() {
        echo get_class()."->". __FUNCTION__."->"."func1";
    }
}
class myclass2 extends myclass1{
    static function func1() {
        echo get_class()."->". __FUNCTION__."->"."fun1";
    }
    function func2() {
        echo get_class()."->". __FUNCTION__."->"."func2";
    }
    private function func3() {
        echo get_class()."->". __FUNCTION__."->"."func3";
    }
}
call_user_func(array("myclass2","parent::func1"));

echo "<hr/>";
$double = function($a) {
    return $a*2;
};
$number = range(1,5);//range() 函数创建并返回一个包含指定范围的元素的数组。
$res = array_map($double,$number);//array_map() 函数返回用户自定义函数作用后的数组。回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致。
                                //$double是方法，$number是传的参数
var_dump($res);
print  implode ( ' ' ,  $res );// 将数组变成字符串。语法: string implode(string glue, array pieces);返回值: 字符串 函数种类: 资料处理
echo "<hr/>";
$callback = 'printf'; $callback('Hello World!');
echo "<hr/>";
$x = '';
if(is_null($x)) {// is_null — 检测变量是否为 NULL 如果 var 是 null 则返回 TRUE ，否则返回 FALSE 。
    echo "false";
} else {
    echo "true";
}
echo "<hr/>";
$a = "3asdf";
$b = 3;
if($a == $b) {//运行发现a与b相等
    echo "a 与b相等";
}
echo "<hr/>";
//curl_init()创建一个会话
// 创建一个新cURL资源
//$ch  =  curl_init ();

// 设置URL和相应的选项
//curl_setopt ( $ch ,  CURLOPT_URL ,  "http://www.baidu.com/" );
//curl_setopt ( $ch ,  CURLOPT_HEADER ,  5 );
//
//// 抓取URL并把它传递给浏览器
//curl_exec ( $ch );
//
//// 关闭cURL资源，并且释放系统资源
//curl_close ( $ch );
echo "成功导入github<br/>";
$count = "2 cats";
echo gettype($count);
echo "<br/>";
$count +=3;
echo $count."<br/>";
echo gettype($count);
echo "<hr/>";
class Myclass5 {
    private $a = "a";
    public $b = "b";
    public $c = "c";
    protected $d = 'd';
}
$test = new Myclass5();
echo "<pre>";
print_r((array)$test);
echo "<hr/>";
foreach ((array) $test as $key => $value) {
    $len = strlen($key);
    echo "{$key} ({$len}) => {$value}<br />";
    for ($i = 0; $i < $len; ++$i) {
        echo ord($key[$i]) . ' ';//ord() 函数返回字符串的首个字符的 ASCII 值。
    }
    echo '<hr />';
}
$str = "Hello World";
//unset($str);
echo $str."<br/>";
echo trim($str,"hd");//trim() 函数移除字符串两侧的空白字符或其他预定义字符。
//ltrim() - 移除字符串左侧的空白字符或其他预定义字符
//rtrim() - 移除字符串右侧的空白字符或其他预定义字符
echo "<hr/>";
$ArrayList = array("_GET", "_POST", "_SESSION", "_COOKIE", "_SERVER");
foreach($ArrayList as $gblArray)
{
    $keys = array_keys($$gblArray);
    foreach($keys as $key)
    {
        echo "$key"."<br/>";
        $$key = trim(${$gblArray}[$key]);
        //echo $$key."<br/>";
    }
}
echo "<hr/>";
function  Test ()
{
    $a  =  0 ;
    echo  $a ;
    $a ++;
}
function  Test_static ()
{
   static $a  =  0 ;
    echo  $a ;
    $a ++;
}
for($i=0;$i<3;$i++){
    Test();//不管循环多少次都是0,因为变量a不会改变
    echo "<br/>";
    Test_static();//变量a会保持赋值的新值，每次循环都会递增1
}
//静态变量与递归函数
function  test3 ()
{
    static  $count  =  0 ;//变量count的值在每次循环都会保存下来的

    $count ++;
    echo  $count."<br/>" ;
    if ( $count  <  10 ) {
        test3 ();//递归函数
    }
    $count --;
}
echo "<hr/>";
test3();
echo "<hr/>";
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


print Foo::$my_static . "\n";

$foo = new Foo();
print $foo->staticValue() . "\n";
print $foo->my_static . "\n";      // Undefined "Property" my_static

print $foo::$my_static . "\n";
$classname = 'Foo';
print $classname::$my_static . "\n"; // PHP 5.3.0之后可以动态调用

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";
echo "<hr/>";
abstract class AbstractClass
{
    // 强制要求子类定义这些方法
    //在子类中要实现这些方法
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') ."\n";
/*
 * 使用接口（interface），你可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
 * 我们可以通过interface来定义一个接口，就像定义一个标准的类一样，但其中定义所有的方法都是空的。
 *  接口中定义的所有方法都必须是public，这是接口的特性。
1. 实现
要实现一个接口，可以使用implements操作符。类中必须实现接口中定义的   所有方法，
否则会报一个fatal错误。如果要实现多个接口，可以用逗号来分隔多个接口的名称。
Note: 实现多个接口时，接口中的方法不能有重名。
Note: 接口也可以继承，通过使用extends操作符。
2. 常量
接口中也可以定义常量。接口常量和类常量的使用完全相同。 它们都是定值，不能被子类或子接口修改。
 */
// 声明一个'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


// 实现接口
// 下面的写法是正确的
class Template implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// 下面的写法是错误的，会报错：
//要实现接口中的所有的方法
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (iTemplate::getHtml)
/*class BadTemplate implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}*/
//多个接口之间的继承
interface a
{
    public function foo();
}
interface b
{
    public function bar();
}
interface c extends a, b
{
    public function baz();
}
class d implements c
{
    public function foo()
    {

    }
    public function bar()
    {

    }
    public function baz()
    {

    }
}
echo "<hr/>";

// if you really want to create a variable within its own scope
// that does not have access to variables outside its scope create a function

$var = "hello";

$func = function(){
//    global $var;//可以设置全局变量，读取变量var的值
    // declare variables here that will only last throughout this scope

    if( !isset($var) ) // var will not be set in this scope
    {
        $var = "i was out of scope";
    }

    echo $var;

};

echo "$var<br />";

$func(); // invoke the function  这个方法调用之后  $var变量不会变

echo "<br />".'$var'." never changed from $var";
echo "<hr/>";
function test1 () {
    static $a = 0;
    $a = 4;//如果是   $a +=4    输出的值就变成 4 9
     echo $a ++;
}
test1();
echo "<br/>";
test1();
echo "<hr/>";

class example {
    public static $s = 'unchanged';

    public function set() {
        $this::$s = 'changed';
    }
}

$o = new example;
$p = new example;

$o->set();

print "o static: {$o::$s}\n p static: {$p::$s}";
echo "<hr/>";
class global_reference
{
    public $val;

    public function __construct () {
        global $var;
        $this->val = $var;
    }

    public function dump_it ()
    {
        debug_zval_dump($this->val);
    }

    public function type_cast ()
    {
        $this->val = (int) $this->val;
    }
}
$var = "x";
$obj = new global_reference();
$obj->dump_it();

$obj->type_cast();

echo "after change ";
echo "<br/>";
$obj->dump_it();
echo "<br/>";
echo "original $var\n";
echo "<hr/>";
function cycle($a, $b, $i=0) {
    static $switches = array();
    if (isset($switches[$i])) $switches[$i] = !$switches[$i]; else !$switches[$i] = true;
    echo $switches[$i];//echo true; 结果是  1
    return ($switches[$i])?$a:$b;
}
for ($i = 1; $i<3; $i++) {
    echo cycle('a', 'b').PHP_EOL;
    for ($j = 1; $j<5; $j++) {
        echo ' '.cycle('a', 'b', 1).PHP_EOL;
        for ($k = 1; $k<3; $k++) {
            echo '  '.cycle('c', 'd', 2).PHP_EOL;
        }
    }
}
echo "<hr/>";
class test1{}
class test2{}
class test3{}

function cache( $class )
{
    static $loaders = array();

    $loaders[ $class ] = new $class();

    var_dump( $loaders );
}
print '<pre>';
cache( 'test1' );//输出一个
cache( 'test2' );//输出两个
cache( 'test3' );//输出三个
echo "<hr/>";
//输出数组形式
class  foo1  {
    var  $bar  =  'I am bar.' ;
    var  $arr  = array( 'I am A.' ,  'I am B.' ,  'I am C.' );
    var  $r    =  'I am r.' ;
}
$a = new foo1;

$arr = "arr";
echo $a->$arr[1]."<br/>";//输出第一个 r 对应 $r
$arr1 = array("1","2","3","4");
echo $a->{$arr}[1]."<br/>";//对应$arr数组中的第二个元素

echo "<hr/>";
//常量设置
class const_shezhi {
    const Max_number = 1;
//    public const Mix_number = 2;//类常量在本质上是默认情况下公众的但是他们不能指定可见性因素,反过来又使语法错误
}
$cons = new const_shezhi();
echo $cons::Max_number."<br/>";
define("bian","bianliang");
echo constant("bian")."<br/>";
echo bian;//如果没有使用constant，就不能用 echo直接输出变量名
echo "<hr/>";
echo __LINE__."<br/>";//所在的行号
echo __FILE__."<br/>";//文件的完整路径和文件名。
echo __CLASS__."<br/>";//类的名称
echo __COMPILER_HALT_OFFSET__."<br/>";
echo __DIR__."<br/>";//文件所在的目录。
echo __METHOD__."<br/>";//类的方法名
echo __FUNCTION__."<br/>";//函数名称
echo "<hr/>";
for ($a = 2, $b = 4; $a < 3; $a++)
{//只循环一次
    echo $a."\n";
    echo $b."\n";
}
echo "<hr/>";
//位运算 逻辑运算
$a = true;$b = false;
if($a^$b) {
    echo "True";
}else {
    echo "False";
}
var_dump(date('G'));
/*
 *
1、++i 的用法（以 a=++i ，i=2 为例）

先将 i 值加 1 （也就是 i=i+1 ），然后赋给变量 a （也就是 a=i ），

则最终 a 值等于 3 , i 值等于 3 。

所以 a=++i 相当于 i=i+1 ，a=i

2、i++ 的用法（以 a=i++ ，i=2 为例）

先将 i 值赋给变量 a （也就是 a=i ）,然后 i 值加 1 （也就是 i=i+1 ），

则最终 a 值等于 2 ，i 值等于 3 。

所以 a=i++ 相当于 a=i , i=i+1

3、++i 与 i++

a=++i 相当于 i++ , a=i

a=i++ 相当于 a=i , i++

4、++i 与 i++ 单独使用时，相当于 i=i+1

如果赋给一个新变量，则 ++i 先将 i 值加 1 ，而 i++ 先将 i 赋给新变量。
 */
echo "<hr/>";
$a  =  3  *  3  %  5 ;  // (3 * 3) % 5 = 4
$a  =  true  ?  0  :  true  ?  1  :  2 ;  // (true ? 0 : true) ? 1 : 2 = 2

$a  =  1 ;
$b  =  2 ;
$a  =  $b  +=  3 ;  // $a = ($b += 3) -> $a = 5, $b = 5

// mixing ++ and + produces undefined behavior
$a  =  1 ;
//echo ++$a;//输出2  相当与 $i = $i+1 $a = $i
//echo $a++;//输出1 相当于 $a =$i $i=$i+1
echo ++ $a  +  $a ++;  // may print 4 or 5
echo "<hr/>";
$output  = ` ls -al `;//执行运算符
echo  "<pre> $output </pre>" ;
echo "<hr/>";
$output  =  shell_exec ( 'ls -lart' );
echo  "<pre> $output </pre>" ;
echo "<hr/>";
$start = '01';
++$start;
print $start; //Outputs '2' not '02'
echo "<hr/>";
echo json_encode("中文", JSON_UNESCAPED_UNICODE);
echo "<hr/>";
$x = true and false;   //$x will be true
$y = (true and false); //$y will be false
echo $x."<br/>".$y;
echo "<hr/>";
//生成二维码
include "phpqrcode/phpqrcode.php";
QRcode::png('http://www.7878.com/1000/',"qrcode/test.png","L",2,2);
echo '<img src="qrcode/test.png">';

$value = 'http://www.phpfensi.com'; //二维码内容
$qr_eclevel = 'H';//容错级别
$picsize = 3;//生成图片大小
QRcode::png($value, 'qrcode.png', $qr_eclevel, $picsize);//生成二维码图片
$logo = 'logo.gif';//准备好的logo图片
$QR = 'qrcode.png';//已经生成的原始二维码图


$QR = imagecreatefromstring(file_get_contents($QR));
$logo = imagecreatefromstring(file_get_contents($logo));
$QR_width = imagesx($QR);//二维码图片宽度
$QR_height = imagesy($QR);//二维码图片高度
$logo_width = imagesx($logo);//logo图片宽度
$logo_height = imagesy($logo);//logo图片高度
$logo_qr_width = $QR_width / 5;
$scale = $logo_width/$logo_qr_width;
$logo_qr_height = $logo_height/$scale;
$from_width = ($QR_width - $logo_qr_width) / 2;
//重新组合图片并调整大小
imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
    $logo_qr_height, $logo_width, $logo_height);

//输出图片
imagepng($QR, 'myxzy.png');
echo '<img src="myxzy.png">';

/*
 * phpqrcode
 * $content:生成二维码的内容，可是text格式，也可是url格式
 * $filename:命名生成的二维码，
 * $errorCorrectionLevel：容错率也就是有被覆盖的区域还能识别,分别是 L（QR_ECLEVEL_L，7%）,M（QR_ECLEVEL_M，15%）,Q（QR_ECLEVEL_Q，25%）,H（QR_ECLEVEL_H，30%）
 * $matrixPointSize:生成图片的大小,大小范围是  1--50 为33px的倍数
 * $margin表示二维码周围边框空白区域间距值
 * $saveandprint表示是否保存二维码并显示。
 * $logo是否加logo
 */
function qrecode($content,$filename,$saveandprint=false,$logo=false,$errorCorrectionLevel="L",$matrixPointSize=3,$margin=4) {
    if($logo == false) {
        QRcode::png($content,$filename,$errorCorrectionLevel,$matrixPointSize,$margin,$saveandprint);
        return $filename;
    } else {
        $errorCorrectionLevel = 'H';//容错级别
        $matrixPointSize = 6;//生成图片大小
        QRcode::png($content, $filename, $errorCorrectionLevel, $matrixPointSize);//生成二维码图片
        $QR = $filename;//已经生成的原始二维码图
        $QR = imagecreatefromstring(file_get_contents($QR));
        $logo = imagecreatefromstring(file_get_contents($logo));
        $QR_width = imagesx($QR);//二维码图片宽度
        $QR_height = imagesy($QR);//二维码图片高度
        $logo_width = imagesx($logo);//logo图片宽度
        $logo_height = imagesy($logo);//logo图片高度
        $logo_qr_width = $QR_width / 5;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;
        $from_width = ($QR_width - $logo_qr_width) / 2;
        //重新组合图片并调整大小
        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
            $logo_qr_height, $logo_width, $logo_height);
        //输出图片
        imagepng($QR, 'myxzy.png');
        echo '<img src="myxzy.png">';
    }
}

echo "<hr/>";
$start = new DateTime('2014-05-05');
$end = new DateTime('2014-05-18');
$current = new DateTime(date('Y-m-d'));
if($end < $current) $current = $end;
$interval = $start->diff($end);
$days = intval($interval->format('%R%a'));
$players += 6000;
$players += $days*300;
for ($i=0;$i<$days;$i++) {
    $players += $i*100;
}
var_dump($interval);
var_dump($days);
echo $players;
echo "<hr/>";
echo "123";
$mem = new Memcache; //创建Memcache对象
$mem->connect("127.0.0.1", 11211); //连接Memcache服务器
var_dump("1111");
var_dump($mem->get('26npo1qjt2a1iksfq2bbubffr6'));   // f4oi3gkal46t1vbb8kd98srff3 必须换成你上面取得的session_id
