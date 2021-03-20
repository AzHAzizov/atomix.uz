<?php 

// echo (function ($x) {
//     return $x **2;
// })(15);



// echo "<br>";


// $func = function ($y) {
//     return $y /2;
// };
// echo $func(28);


// __________________________________________________________

// function calc($x, $y, callable $operator) 
// {
//     return $operator($x, $y);
    
// }

// echo calc(2, 3, function($x, $y) {return $x + $y;});

// ________________________________________________________________

// function getFilter() 
// {
//     return function(string $str)
//     {
//         return str_replace(' ', '__', $str);
//     };
// }


// echo getFilter()('Hello world');


// ---------------- замыкание (это вот тогда когда мы отправляем ему данные через use )

// $lang = 'Привет ';

// $hello = function ($name) use ($lang) 
// {
//     return $lang . $name;
// };


// $lang = 'Hello';


// echo $hello('Aziz'); // Привет Aziz


// -------------------- стрелочная функция


// $a = [1, 2, 3, 4, 5];

// $res = array_map(function($x){return $x **2;}, $a);

// $res = array_map(fn($x) => $x ** 3, $a);
// var_dump($res);


// ------------ генераторы 

// function arr()
// {
//     $i = 1;
//     // $ret = [];


//     while($i <= 10600) 
//     {
//         // $ret[] = $i;
//         yield $i;
//         $i++;
//     }

//     // return $ret;
// }

// foreach(arr() as $elem) 
// {
//     echo '=>' . $elem;
//     echo '<br/>';
// }


// ------ n количество аргументов 

// function add(... $args)
// {
//     // print_r( func_get_args() );

//     print_r($args);
// }


// echo add(1, 2, 3, 5 ,50);


// ---- тернарный опрератор

// тернарный опрератор это НЕ замена if 
    // if дает возмодность выбрить какое либо действоие в зависимости от условие 
    // тернаный оператор выбирает значение в зависимости от условие 

// $age = 17;

// $access = $age >= 18 ? true : false;

// var_dump($access);

//-------

// $arr = [1,2,3,4];

// // $res = $arr ?: false; // if($arr != false) это означает вот это

// $res = $arr ?? false; // if(!is_null($arr)) это означает вот это
// var_dump($res);


// -- корабль spaceShip

// $persions = [
//     ['name' => 'Vasya', 'age' => 42],
//     ['name' => 'Katya', 'age' => 150],
//     ['name' => 'Vitya', 'age' => 45],
//     ['name' => 'Hatiko', 'age' => 41],
// ];

// usort($persions, function($a, $b) {
//     // if($a['age'] < $b['age']) {
//     //     return -1;
//     // }

//     // if($a['age'] > $b['age']) {
//     //     return 1;
//     // }

//     // return 0;


//     return $a['age'] <=> $b['age']; // будет тоже самое с верхним


// });

// print_r($persions);


// ------ анонимные классы 

// interface Logger 
// {
//     public function messageLog($message);
// }

// class Application 
// {
//     protected Logger $logger;

//     public function setLogger(Logger $logger)
//     {
//         $this->logger = $logger;
//     }


//     public function getMessage()
//     {
//         $this->logger->messageLog('New message to log');
//     }
// }

// $app = new Application();

// $app->setLogger(new class implements Logger {
//     public function messageLog($message)
//     {
//         echo $message;
//     }
// });


// $app->getMessage();