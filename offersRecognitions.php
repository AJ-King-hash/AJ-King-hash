<?php
include(__DIR__."/../SQLProcess/ADU.php");
include(__DIR__."/../charts/chart.php");
include(__DIR__."/../charts/BelongChart.php");
include(__DIR__."/../charts/makeChart.php");
include(__DIR__."/executePattern.php");
include(__DIR__."/FuzzySimiFuzzy.php");
include(__DIR__."/../Classification/BadgeClassifycopy.php");

$char=new Chart();
$pattern=new ExecutePattern();
print_r($newB);
// if( isset($newB) && $newB!=null) {
  foreach($newB as $key=>$new) {
    
 
  foreach($new as $k=>$n) {
    echo $key.PHP_EOL;
   
    $belongs[$key][$k]=$pattern->recognizeTheFunction($n,$k);
     
  }
}
  print_R($belongs);

  foreach($belongs as $k=>$belong) {
    // echo $k;
    if($k=="Bronze") {
      $outputBronzeControl=[
       ["low_1"=>0.012,"low_2"=>0.012,"low_3"=>0.025],
       ["Medium_1"=>0.025,"Medium_2"=>0.025,"Medium_3"=>0.037],
       ["Medium_4"=>0.050,"High_1"=>0.062,"High_2"=>0.075]
      ];
   foreach( $belong as $id=>$belongType) {
         $Belong=new makeChart();
         if(key_exists("low",$belongType??[]) && is_array($belongType) ) {

       $partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["low"]-$belongType["low"]*0.3,$belongType["low"],$belongType["low"]+$belongType["low"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["low"]+$belongType["low"]*0.3,2],[0,1,5]),"range"=>[$belongType["low"]-$belongType["low"]*0.3,$belongType["low"],$belongType["low"]+$belongType["low"]*0.3]];
         $simiBronze=new FuzzySimiFuzzy($partChartBelong,$bronzeOffer,$belongChart);
         $simi=$simiBronze->getSimi($id,$outputBronzeControl,"bronze");    
         $getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::bronze); 
         
     } 
     elseif(key_exists("Medium",$belongType??[]) && is_array($belongType)) {
       $partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["Medium"]-$belongType["Medium"]*0.3,$belongType["Medium"],$belongType["Medium"]+$belongType["Medium"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["Medium"]+$belongType["Medium"]*0.3,2],[0,1,5]),"range"=>[$belongType["Medium"]-$belongType["Medium"]*0.3,$belongType["Medium"],$belongType["Medium"]+$belongType["Medium"]*0.3]];

       $simiBronze=new FuzzySimiFuzzy($partChartBelong,$bronzeOffer,$belongChart);
       

      $simi= $simiBronze->getSimi($id,$outputBronzeControl,"bronze");
       $getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::bronze);
       
   }
   elseif(key_exists("High",$belongType??[]) && is_array($belongType)) {
     $partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["High"]-$belongType["High"]*0.3,$belongType["High"],$belongType["High"]+$belongType["High"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["High"]+$belongType["High"]*0.3,2],[0,1,5]),"range"=>[$belongType["High"]-$belongType["High"]*0.3,$belongType["High"],$belongType["High"]+$belongType["High"]*0.3]];

     $simiBronze=new FuzzySimiFuzzy($partChartBelong,$bronzeOffer,$belongChart);
     $simi= $simiBronze->getSimi($id,$outputBronzeControl,"bronze");
       $getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::bronze);     
   }
   echo "the Final Offer: if the user of the id=".$id." is: ".$getOffer.PHP_EOL;
   
  //  $SQL->Update(1,["offers"],"users",["user_id"],[$getOffer,$id]);
}

} elseif($k=="Silver"){
$outputSilverControl=[
 [0.050,0.050,0.062],
 [0.075,0.075,0.087],
 [0.087,0.087,0.100]
];
foreach( $belong as $id=>$belongType) {
 $Belong=new makeChart();
 if(key_exists("low",$belongType??[]) && is_array($belongType)) {

$partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["low"]-$belongType["low"]*0.3,$belongType["low"],$belongType["low"]+$belongType["low"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["low"]+$belongType["low"]*0.3,2],[0,1,5]),"range"=>[$belongType["low"]-$belongType["low"]*0.3,$belongType["low"],$belongType["low"]+$belongType["low"]*0.3]];

 $simiSilver=new FuzzySimiFuzzy($partChartBelong,$silverOffer,$belongChart);
$simi= $simiSilver->getSimi($id,$outputSilverControl,"silver");     
$getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::silver);
} 
elseif(key_exists("Medium",$belongType??[]) && is_array($belongType)) {
$partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["Medium"]-$belongType["Medium"]*0.3,$belongType["Medium"],$belongType["Medium"]+$belongType["Medium"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["Medium"]+$belongType["Medium"]*0.3,2],[0,1,5]),"range"=>[$belongType["Medium"]-$belongType["Medium"]*0.3,$belongType["Medium"],$belongType["Medium"]+$belongType["Medium"]*0.3]];

$simiSilver=new FuzzySimiFuzzy($partChartBelong,$silverOffer,$belongChart);

$simi=$simiSilver->getSimi($id,$outputSilverControl,"silver");
$getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::silver);

}
elseif(key_exists("High",$belongType??[]) && is_array($belongType)) {
$partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["High"]-$belongType["High"]*0.3,$belongType["High"],$belongType["High"]+$belongType["High"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["High"]+$belongType["High"]*0.3,2],[0,1,5]),"range"=>[$belongType["High"]-$belongType["High"]*0.3,$belongType["High"],$belongType["High"]+$belongType["High"]*0.3]];

$simiSilver=new FuzzySimiFuzzy($partChartBelong,$silverOffer,$belongChart);
$simi= $simiSilver->getSimi($id,$outputSilverControl,"silver");
$getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::silver);     
}
echo "the Final Offer: if the user of the id=".$id." is: ".$getOffer.PHP_EOL;

// $SQL->Update(1,["offers"],"users",["user_id"],[$getOffer,$id]);
}

} elseif($k=="Gold") { 

$outputGoldControl=[
 [0.075,0.075,0.087],
 [0.087,0.100,0.100],
 [0.125,0.150,0.150]
];

foreach( $belong as $id=>$belongType) {
 $Belong=new makeChart();
 if(key_exists("low",$belongType??[]) && is_array($belongType)) {

$partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["low"]-$belongType["low"]*0.3,$belongType["low"],$belongType["low"]+$belongType["low"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["low"]+$belongType["low"]*0.3,2],[0,1,5]),"range"=>[$belongType["low"]-$belongType["low"]*0.3,$belongType["low"],$belongType["low"]+$belongType["low"]*0.3]];

 $simiGold=new FuzzySimiFuzzy($partChartBelong,$goldOffer,$belongChart);
$simi=   $simiGold->getSimi($id,$outputGoldControl,"gold");     
$getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::gold);
} 
elseif(key_exists("Medium",$belongType??[]) && is_array($belongType)) {
$partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["Medium"]-$belongType["Medium"]*0.3,$belongType["Medium"],$belongType["Medium"]+$belongType["Medium"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["Medium"]+$belongType["Medium"]*0.3,2],[0,1,5]),"range"=>[$belongType["Medium"]-$belongType["Medium"]*0.3,$belongType["Medium"],$belongType["Medium"]+$belongType["Medium"]*0.3]];

$simiGold=new FuzzySimiFuzzy($partChartBelong,$goldOffer,$belongChart);

$simi=  $simiGold->getSimi($id,$outputGoldControl,"gold");
$getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::gold);

}
elseif(key_exists("High",$belongType??[]) && is_array($belongType)) {
$partChartBelong=["chart"=>$Belong->makeChart(1,[3],[[$belongType["High"]-$belongType["High"]*0.3,$belongType["High"],$belongType["High"]+$belongType["High"]*0.3]],[[0,1,0]],[[0,1,0]],[600,400,5],[0,$belongType["High"]+$belongType["High"]*0.3,2],[0,1,5]),"range"=>[$belongType["High"]-$belongType["High"]*0.3,$belongType["High"],$belongType["High"]+$belongType["High"]*0.3]];

$simiGold=new FuzzySimiFuzzy($partChartBelong,$goldOffer,$belongChart);
$simi= $simiGold->getSimi($id,$outputGoldControl,"gold");
$getOffer=(new ExecutePattern())->executeOffer($simi,maxOffers::gold);     

}
echo "the Final Offer: if the user of the id=".$id." is: ".$getOffer.PHP_EOL;

// $SQL->Update(1,["offers"],"users",["user_id"],[$getOffer,$id]);

}

}
  }

// }
?>