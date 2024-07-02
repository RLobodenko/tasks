<?php 
function generateName($region){
    switch($region){
        case 'USA':
            $f = ['John', 'Sara', 'Sam', 'Jessica', 'Donald'];
            $l = ['Johnson', 'Brown', 'Trump', 'Konnor', 'Gates'];
            return $f[array_rand($f)]. ' ' . $l[array_rand($l)];
            break;  
        case 'UA':
            $f = ['Lesia', 'Taras', 'Alex', 'Anrew', 'Lisa'];
            $l = ['Shevchenko', 'Timoshenko', 'Poroshenko', 'Kydelko', 'Sviridenko'];
            return $f[array_rand($f)]. ' ' . $l[array_rand($l)];
            break;  
        case 'BY':
            $f = ['Pavel', 'Igor', 'Alexander', 'Dasha', 'Masha'];
            $l = ['Kylik', 'Ivanov', 'Smirnov', 'Myhina', 'Petrovskaya'];
            return $f[array_rand($f)]. ' ' . $l[array_rand($l)];
            break;  


    }
}

function generateAddress($region){
    switch($region){
        case 'USA':
            return rand(100, 999) . 'Elm St, Anytomn, USA';
            break;  
        case 'UA':
            return 'home #' . rand(100, 999) . ' st. Shevshenko, Ukraine';
            break;  
        case 'BY':
            return 'home #' . rand(100, 999) . ' st. Plehanova, Belarus';

            break;  


    }
}

function generatePhone($region){
    switch($region){
        case 'USA':
            return '+1-555-'.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT).'-'.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            break;  
        case 'UA':
            return '+3-123-'.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT).'-'.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            break;  
        case 'BY':
            return '+375-55-'.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT).'-'.str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            break;  
    }
}

function generateId(){
    return rand(100000, 999999);
}


function addError(&$r,$errorCount){
    for($i=0;$i<$errorCount;$i++){
        $f = array_rand($r);
        switch(rand(0, 1)){
            case 0:
                $r[$f] = substr_replace($r[$f], '', rand(0, strlen($r[$f]) - 1), 1);
                break;
            case 1:
                $r[$f] = substr_replace($r[$f], chr(rand(65, 90)), rand(0, strlen($r[$f])), 0);
                break;       
        }
    }
}

function generateFakeDate($region, $errorCount, $seed){
    srand($seed);
    $data = [];
    $pageNumber = 10;
    $start = $pageNumber * 20;
    for($i = 0;$i < 1000; $i++){
        $r = [
            'Number'=>$i+1,
            'Id'=>generateId($region),
            'Name'=>generateName($region),
            'address'=>generateAddress($region),
            'phone'=>generatePhone($region)
        ];
        addError($r, $errorCount);
        $data[] = $r;
    }
    return $data;
}