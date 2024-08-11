<?php

echo "<pre>";
echo "




";
echo "</pre>";
 
$apps = [
    ["user_id"=>16,'rating' => 10, 'amount_paid' => 33.000],
    ["user_id"=>1,'rating' => 12, 'amount_paid' => 34.000],
    ["user_id"=>2,'rating' => 5, 'amount_paid' => 3.000],
    ["user_id"=>22,'rating' => 6, 'amount_paid' => 4.000],
    ["user_id"=>24,'rating' => 7, 'amount_paid' => 5.000],
    ["user_id"=>3,'rating' => 8, 'amount_paid' => 15.000],
    ["user_id"=>4,'rating' => 6, 'amount_paid' => 20.000],
   
];
//132
error_reporting(E_ALL && ~E_WARNING);
$x1=array_column($apps,'rating');
$y1=array_column($apps,'amount_paid');
foreach($x1 as $key=>$xx) {
    $x['x'.($key+1)]=$xx;
}

foreach($y1 as $key=>$yy) {
    $y['y'.($key+1)]=$yy;

}

for($i=1;$i<count($x)+1;$i++) {
    if(!isset($points[$i])) {
    $points[$i]=['x'.$i=>$x['x'.$i],'y'.$i=>$y['y'.$i]];
    }
}

//initial Classification
 // the points x-y-axis
 
 //initial Classification
 
 foreach($points as $p) {
    $get1=random_int(0,1);
    $get2=random_int(0,1);
    $get3=random_int(0,1);
  
    $ini1[]=$get1;
    $ini2[]=$get2;
    $ini3[]=$get3;
    
}
    $cc=['c1'=>[$points],'c2'=>[$points],'c3'=>[$points[1],$points[2],$points[3],$points[4],$points[5]]];
$Initial=['c1'=>$ini1,'c2'=>$ini2,'c3'=>$ini3];

// print_r($Initial);
//  print_r($points);

// center each c1,c2
function CircleCenter($Initial,$Cpoints) {
    foreach($Initial as $key=>$val) {
            
        if($key=='c1') {
            
            $sumMew1=(number_format(array_reduce($val,fn($acc,$curr)=>$acc+pow($curr,2)),3))!=0?number_format(array_reduce($val,fn($acc,$curr)=>$acc+pow($curr,2)),3):1;
            
            $centerC1["xc1"]=number_format(array_reduce($val,function($acc,$curr) use($Cpoints) {
               static $k=1;
                $result=$acc+pow($curr,2)*$Cpoints[$k]["x".$k];
                $k++;
                return $result;})/$sumMew1,3);
                $centerC1["yc1"]=number_format(array_reduce($val,function($acc,$curr) use($Cpoints) {
                    static $k=1;
                     $result=$acc+pow($curr,2)*$Cpoints[$k]["y".$k];
                     $k++;
                     return $result;})/$sumMew1,3);
                
            
        }   
        if($key=="c2") {
            $sumMew2=(number_format(array_reduce($val,fn($acc,$curr)=>$acc+pow($curr,2)),3))!=0?number_format(array_reduce($val,fn($acc,$curr)=>$acc+pow($curr,2)),3):1;
            
            $centerC2["xc2"]=number_format(array_reduce($val,function($acc,$curr) use($Cpoints) {
                static $k=1;
                 $result=$acc+pow($curr,2)*$Cpoints[$k]["x".$k];
                 $k++;
                 return $result;})/$sumMew2,3);
                 $centerC2["yc2"]=number_format(array_reduce($val,function($acc,$curr) use($Cpoints) {
                     static $k=1;
                      $result=$acc+pow($curr,2)*$Cpoints[$k]["y".$k];
                      $k++;
                      return $result;})/$sumMew2,3);
             
        }
        if($key=="c3") {
           $sumMew3=(number_format(array_reduce($val,fn($acc,$curr)=>$acc+pow($curr,2)),3))!=0?number_format(array_reduce($val,fn($acc,$curr)=>$acc+pow($curr,2)),3):1;
        //    echo $sumMew2;
           $centerC3["xc3"]=number_format(array_reduce($val,function($acc,$curr) use($Cpoints) {
            static $k=1;
             $result=$acc+pow($curr,2)*$Cpoints[$k]["x".$k];
             $k++;
             return $result;})/$sumMew3,3);
             $centerC3["yc3"]=number_format(array_reduce($val,function($acc,$curr) use($Cpoints) {
                 static $k=1;
                  $result=$acc+pow($curr,2)*$Cpoints[$k]["y".$k];
                  $k++;
                  return $result;})/$sumMew3,3);
         
        }
    }
    return [
        'Ccenter1'=>$centerC1,
        'Ccenter2'=>$centerC2,
        'Ccenter3'=>$centerC3
   
       ];

}
function getFinal($Initial,$cc,$points,$previous) { 
$circles=CircleCenter($Initial,$points);
// print_r($circles);
foreach($circles as $key=>$circle) {
    foreach($points as $k=>$point) {
        if($key=="Ccenter1") {
          $distant['d'.explode('r',$key)[1].$k]=number_format(sqrt(pow(number_format($point['x'.$k]-$circle['xc1'],3),2)+pow(number_format($point['y'.$k]-$circle['yc1'],3),2)),2);         
        }
        }
    foreach($points as $k=>$point) {
        if($key="Ccenter2") {
            $distant['d'.explode('r',$key)[1].$k]=number_format(sqrt(pow(number_format($point['x'.$k]-$circle['xc2'],3),2)+pow(number_format($point['y'.$k]-$circle['yc2'],3),2)),2); 
        }
    }
    foreach($points as $k=>$point) {
        if($key="Ccenter3") {
            $distant['d'.explode('r',$key)[1].$k]=number_format(sqrt(pow(number_format($point['x'.$k]-$circle['xc3'],3),2)+pow(number_format($point['y'.$k]-$circle['yc3'],3),2)),2); 
        }
    }
} 


// echo "The distant between the points and the centers: ".PHP_EOL;
// echo count($points);
for($i=1;$i<count($points)+1;$i++) {
    for($j=1;$j<count($points)+1;$j++) {
        $m['m'.$i.$j]=0;
    }
} 


foreach($m as $key1=>$mi) {
      
    foreach($circles as $key=>$circle) {
         if($key=="Ccenter1") {
    $pk=explode('m',$key1)[1];
    $theTwo=explode('m1',$key1)[1];
     
        

       try {
        $mew[$key1]=number_format(pow(pow(($distant['d'.$pk]/$distant['d'.$pk]),2)+pow(($distant['d'.$pk]/$distant['d2'.$theTwo]),2)+pow(($distant['d'.$pk]/$distant['d3'.$theTwo]),2),-1),3);
       }catch(DivisionByZeroError $e) {
        
            $mew[$key1]=0;
         
        $pk=explode('m',$key1)[1];
        $theTwo=explode('m2',$key1)[1];
         
            
           try {

            $mew[$key1]=number_format(pow(pow(($distant['d'.$pk]/$distant['d'.$pk]),2)+pow(($distant['d'.$pk]/$distant['d1'.$theTwo]),2)+pow(($distant['d'.$pk]/$distant['d3'.$theTwo]),2),-1),3);
            
           }
           catch(DivisionByZeroError $e) {
             
            $mew[$key1]=0;
         
        $pk=explode('m',$key1)[1];
        $theTwo=explode('m3',$key1)[1];
         
            
           try {

            $mew[$key1]=number_format(pow(pow(($distant['d'.$pk]/$distant['d'.$pk]),2)+pow(($distant['d'.$pk]/$distant['d1'.$theTwo]),2)+pow(($distant['d'.$pk]/$distant['d2'.$theTwo]),2),-1),3);
            
           }
           catch(DivisionByZeroError $e) {
                 foreach ($mew as $k=>$m) { 
            if($m==0) {
               
               $others[]=$k;
           }
                 }
                 if($key1==$others[2]) {
                 $mew[$key1]=1;
                 }

           }
            
            foreach ($mew as $k=>$m) { 
            if($m==0) {
               
               $others[]=$k;
           }
                 }
                 if($key1==$others[2]) {
                 $mew[$key1]=1;
                 }

           }
       }
        
    }
    
    }
    
}

// Initialize two arrays for 'c1' and 'c2' and 'c3'
$c1 = array();
$c2 = array();
$c3 = array();

// Iterate through the original array
foreach ($mew as $key => $value) {
    // Check if the key starts with 'm1' or 'm2'
    if (strpos($key, 'm1') === 0) {
        // If the key starts with 'm1', add the value to 'c1'
        $c1[] = $value;
    } elseif (strpos($key, 'm2') === 0) {
        // If the key starts with 'm2', add the value to 'c2'
        $c2[] = $value;
    }elseif (strpos($key, 'm3') === 0) {
        // If the key starts with 'm2', add the value to 'c2'
        $c3[] = $value;
    } 
}

// Combine 'c1' and 'c2' arrays into one array
$result = array('c1' => $c1, 'c2' => $c2,'c3'=>$c3);
//just switch the m11 m12...to the numbers to get the same index of the initial

// Print the result
// echo "/////////////////".PHP_EOL;
// print_r($result);
// echo "/////////////////".PHP_EOL;
static $counter=0;
if(array_values($result)==array_values($previous)) {
    return $result;
}
else {
    $counter++;
    // echo $counter;
    if($counter>100) {
        return $result;
    }
    return getFinal($result,$GLOBALS['cc'],$points,$result);
}
// return (array_values($result)==array_values($previous))?$result:getFinal($result,$GLOBALS['cc'],$points,$result);
}

$x=getFinal($Initial,$cc,$points,$Initial);
// echo "Done Successfully match: ".PHP_EOL;
// print_r($x);
foreach($x as $badgeName=>$badgeVal) {
if($badgeName=='c3') {
    foreach($badgeVal as $badge=>$val) {
       if($val>max($x['c2'][$badge],$x['c1'][$badge])) {
            $badges['Gold'][$badge]=$val;
       }
    }
}
if($badgeName=='c1') {
    foreach($badgeVal as $badge=>$val) {
       if($val>max($x['c2'][$badge],$x['c3'][$badge])) {
        //the belong value is $val remember
            $badges['Silver'][$badge]=$val;
       }
    }
}
if($badgeName=='c2') {
    foreach($badgeVal as $badge=>$val) {
       if($val>max($x['c1'][$badge],$x['c3'][$badge])) {
            $badges['Bronze'][$badge]=$val;
       }
    }
}
}
// print_r($badges);
// $ID=$SQL->show(1,["user_id"],["userClassify"]);
 foreach($apps as $id) {
    $IDs[]=$id["user_id"];
 }
//  print_r($IDs);
 $id2=array_combine($IDs,$IDs);
 foreach($id2 as $i) {
 $IDfinal[]=$i;
 }
//  print_r($IDfinal);
 $finalKey=array_keys($IDfinal);
//  echo "<pre>";
// print_r($finalKey);
foreach($badges as $key=>$badge) {
  foreach($badge as $key1=>$b) {
      if($finalKey[$key1]==$key1) {
            $newB[$key][$IDfinal[$key1]]=$b;
      }
  }
 }


?>
