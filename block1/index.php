<?php

// Разобрать заданный массив строк [...String...]. Если элемент содержит заданную подстроку $subString, кладем в массив A, если не содержит - в массив B. 
$arrayA = array();
$arrayB = array();
$arrayC = array(
    'ac','bc','cc','abc','acc'
);
print_r($arrayC);

$subString = 'ac';

foreach ($arrayC as $item) {
    if (strpos($item, $subString) !== false) {
        $arrayA[] = $item; 
    } else {
        $arrayB[] = $item; 
    }
}

echo "Массив A \n";
print_r($arrayA);

echo "\nМассив B \n";
print_r($arrayB);

// Реализовать алгоритм сортировки массива.
// 1. Метод Quick Sort
function quickSort(array $array): array
{
    if (count($array) <= 1) {
        return $array;
    }
    
    $pivot = $array[0]; 
    $left = [];
    $middle = [];
    $right = [];
    
     foreach ($array as $item) {
        if ($item < $pivot) {
            $left[] = $item;
        } elseif ($item == $pivot) {
            $middle[] = $item;  
        } else {
            $right[] = $item;
        }
    }

     return array_merge(quickSort($left), $middle, quickSort($right));
}
// 2. Метод Marge Sort
function mergeSort(array $arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }

    $mid = (int)(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);
    
    $left = mergeSort($left);
    $right = mergeSort($right);
    
    return merge($left, $right);
}

function merge(array $left, array $right)
{
    $result = [];
    $i = 0; 
    $j = 0; 
    
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }
    
    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }
    
    return $result;
}
// 3. Метод Bubble Sort
function bubbleSort(array $array){
   $n = count($array);
    
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    
    return $array;
};

$arrayForSort = [0, 5, 2, 3, 8, 6, 7, 1, 4, 9, 1001];

$sortedByQuickSort = quickSort($arrayForSort);
$sortedByMargeSort = mergeSort($arrayForSort);
$sortedByBubbleSort = bubbleSort($arrayForSort);


echo "quickSort \n";
print_r($sortedByQuickSort);

echo "mergeSort \n";
print_r($sortedByMargeSort);

echo "bubbleSort \n";
print_r($sortedByBubbleSort);

// Программист придумал, как по никнейму определить пол собеседника. Вот его метод: если количество различных символов в имени пользователя нечетное,
// тогда пользователь мужского пола, иначе — женского.
// Вам дана строка, обозначающая имя пользователя, помогите нашему герою определить по ней пол пользователя по описанному методу.
// В переменную запишите строку, состоящую из случайных строчных букв латинского алфавита — имя пользователя, случайной длины от 10 до 100 букв. 
// Напишите алгоритм определения пола по заданному правилу. Если пользователь оказался женского пола по методу нашего героя, выведите “Girl!” (без кавычек), иначе, выведите «Boy!».

$nickname = 'qwertyuiopasdfghjkl';
$lenght = strlen($nickname);
echo $lenght,($lenght % 2 == 0) ? " girl \n" : " boy \n";
?>