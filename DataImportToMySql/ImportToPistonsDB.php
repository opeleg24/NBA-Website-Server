<?php

include 'simple_html_dom.php';
//1.import team data
function ImportPistonsTeamDataAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('div#info') as $a){
    $teamdata = array();

   $teamdata['LOCATION']= substr(strip_tags($a->find('p')[2]->innertext),15);
   $teamdata['TEAM NAMES']= substr(strip_tags($a->find('p')[3]->innertext),16);
   $teamdata['PLAYOFF APPERANCES']= substr(strip_tags($a->find('p')[6]->innertext),26);
   $teamdata['CHAMPIONSHIPS']=substr(strip_tags($a->find('p')[7]->innertext),20);
//Site where data is scrapped:$html = file_get_html();
   $teamdata['2017-18 RECORD']=substr(strip_tags($htmlTeamDataRecord->find("div ul.team_recorddetail li")[0]->innertext),8);
        

           $Teamdata[]= $teamdata;

}
//
// print_r($Teamdata);
echo json_encode($Teamdata);

$db = new PDO('mysql:host=localhost;dbname=teams' ,'root','R98sc30lb337%');
$stmt = $db->prepare("insert into pistons_team_data values(?,?,?,?,?)");

foreach($Teamdata as $TeamdataRow){
   $stmt->bindParam(1, $TeamdataRow['LOCATION']); 
   $stmt->bindParam(2, $TeamdataRow['TEAM NAMES']); 
   $stmt->bindParam(3, $TeamdataRow['PLAYOFF APPERANCES']); 
   $stmt->bindParam(4, $TeamdataRow['CHAMPIONSHIPS']); 
   $stmt->bindParam(5, $TeamdataRow['2017-18 RECORD']); 
 
   $stmt->execute();

}
    
} catch (Exception $e) {
    echo $e->getMessage();
}
}
//2.import new team roster
function ImportPistonsNewTeamRosterAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#roster') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();
  
//            echo strip_tags($li->find('td')[]->innertext);
         $players['PLAYER']= strip_tags($li->find('td a')[0]->innertext);
         $players['POSITION']= strip_tags($li->find('td')[1]->innertext);
         $players['HEIGHT']= strip_tags($li->find('td')[2]->innertext);
         $players['WEIGHT']= strip_tags($li->find('td')[3]->innertext);
         $players['Birth Date']= strip_tags($li->find('td')[4]->innertext);
         $players['EXPERIENCE']= strip_tags($li->find('td')[6]->innertext);
         $players['COLLEGE']= strip_tags($li->find('td')[7]->innertext);
        

  $arrayroster[]= $players;
  


}
//

 $ArrayNewroster=array_slice($arrayroster,1);
//  print_r($ArrayNewroster);
//echo json_encode($ArrayNewroster);

$db = new PDO('mysql:host=localhost;dbname=teams' ,'root','R98sc30lb337%');
$stmt = $db->prepare("insert into pistons_newteam_roster values(?,?,?,?,?,?,?)");

foreach($ArrayNewroster as $ArrayNewRosterRow){
    $stmt->bindParam(1, $ArrayNewRosterRow['PLAYER']); 
   $stmt->bindParam(2, $ArrayNewRosterRow['POSITION']); 
   $stmt->bindParam(3, $ArrayNewRosterRow['HEIGHT']); 
   $stmt->bindParam(4, $ArrayNewRosterRow['WEIGHT']); 
    $stmt->bindParam(5, $ArrayNewRosterRow['Birth Date']); 
   $stmt->bindParam(6, $ArrayNewRosterRow['EXPERIENCE']); 
   $stmt->bindParam(7, $ArrayNewRosterRow['COLLEGE']); 
   
 
   $stmt->execute();

}
}
} catch (Exception $e) {
    echo $e->getMessage();


}
}

//3.import Team PayRoll
function ImportPistonsTeamPayRollAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#contracts') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();
  
  $players['Player']= strip_tags($li->find('th')[0]->innertext);
  $players['Age']= strip_tags($li->find('td')[0]->innertext);
  if(strip_tags($li->find('td')[1]->innertext)=='&nbsp;'){
       $players['2018-19']='';
  }
  else{
      $players['2018-19']= strip_tags($li->find('td')[1]->innertext);
  }
  
  $players['2019-20']= strip_tags($li->find('td')[2]->innertext);
  $players['2020-21']= strip_tags($li->find('td')[3]->innertext);
  $players['2021-22']= strip_tags($li->find('td')[4]->innertext);
  $players['2022-23']= strip_tags($li->find('td')[5]->innertext);
  $players['2023-24']= strip_tags($li->find('td')[6]->innertext);
  $players['Signed Using']= strip_tags($li->find('td')[7]->innertext);
   if(strip_tags($li->find('td')[8]->innertext)=='&nbsp;'){
       $players['Guaranteed']='';
  }
  else{
       $players['Guaranteed']= strip_tags($li->find('td')[8]->innertext);
  }

  $ArrayPayRoll[]= $players;

}
//

 $ArrayNewPayRoll=array_slice($ArrayPayRoll,2);
  print_r($ArrayNewPayRoll);
//echo json_encode($ArrayNewPayRoll);

$db = new PDO('mysql:host=localhost;dbname=teams' ,'root','R98sc30lb337%');
$stmt = $db->prepare("insert into pistons_team_payroll values(?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewPayRoll as $ArrayNewPayRollRow){

//The 2018-19 for order of payroll(don't move age or player).
   $stmt->bindParam(1, $ArrayNewPayRollRow['2018-19']); 
   $stmt->bindParam(2, $ArrayNewPayRollRow['Player']); 
   $stmt->bindParam(3, $ArrayNewPayRollRow['Age']); 
   $stmt->bindParam(4, $ArrayNewPayRollRow['2019-20']); 
   $stmt->bindParam(5, $ArrayNewPayRollRow['2020-21']); 
   $stmt->bindParam(6, $ArrayNewPayRollRow['2021-22']); 
   $stmt->bindParam(7, $ArrayNewPayRollRow['2022-23']); 
   $stmt->bindParam(8, $ArrayNewPayRollRow['2023-24']); 
   $stmt->bindParam(9, $ArrayNewPayRollRow['Signed Using']); 
   $stmt->bindParam(10, $ArrayNewPayRollRow['Guaranteed']); 
 
   $stmt->execute();

}
//This deletes the empty row just before the total team and another contract player.
   $stmt = $db->prepare("DELETE FROM `pistons_team_payroll` WHERE `Player`='';");
   $stmt->execute();
} 
} catch (Exception $e) {
    echo $e->getMessage();
}
}
//4.Import PLAYERS to a ALL NBA Players table.

function ImportAndreDrummondSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Andre_Drummond values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportAnthonyTolliverSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Anthony_Tolliver values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportBlakeGriffinSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Blake_Griffin values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportHenryEllensonSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Henry_Ellenson values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function ImportIshSmithSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Ish_Smith values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function ImportJameerNelsonSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Jameer_Nelson values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportJamesEnnisIIISeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into James_Ennis values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}


function ImportJonLeuerStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Jon_Leuer  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function ImportKayFelderSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Kay_Felder values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function ImportLukeKennardSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Luke_Kennard values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function ImportReggieBullockSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Reggie_Bullock values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function ImportReggieJacksonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Reggie_Jackson values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}


function ImportStanleyJohnsonSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Stanley_Johnson values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportWillieReedSeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Willie_Reed values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportLangstonGallowaySeasonStatsAndInsertIntoMysql(){

try {
//Site where data is scrapped:$html = file_get_html();
foreach($html->find('table#table3') as $ul){
    
    foreach($ul->find('tr') as $li){
  $players = array();


            $players['Season'] = strip_tags($li->find('td')[0]->innertext);
            $players['Team'] =strip_tags($li->find('td')[1]->innertext);
            $players['G'] = strip_tags($li->find('td')[27]->innertext);
            $players['GS'] = strip_tags($li->find('td')[28]->innertext);
            $players['MP'] = strip_tags($li->find('td')[5]->innertext);
            $players['FG%'] = strip_tags($li->find('td')[11]->innertext);
            $players['3P%'] = strip_tags($li->find('td')[9]->innertext);
            $players['FT%'] = strip_tags($li->find('td')[10]->innertext);
            $players['RB'] = strip_tags($li->find('td')[3]->innertext);
            $players['AST'] = strip_tags($li->find('td')[4]->innertext);
            $players['STL'] = strip_tags($li->find('td')[7]->innertext);
            $players['BLK'] = strip_tags($li->find('td')[8]->innertext);
            $players['TOV'] = strip_tags($li->find('td')[6]->innertext);
            $players['PTS'] = strip_tags($li->find('td')[2]->innertext);
            $players['DOUBLE-DOUBLES'] = strip_tags($li->find('td')[31]->innertext);
            $players['TRIPLE-DOUBLES'] = strip_tags($li->find('td')[32]->innertext);
            
//            16 TOT
                         
           $arraybeforeslice[]= $players;
    }
}

$ArrayNewRoster=array_slice($arraybeforeslice,1);
// print_r($ArrayNewRoster);

//echo json_encode($data);

$db = new PDO('mysql:host=localhost;dbname=players_season_pergame','root','R98sc30lb337%');
$stmt = $db->prepare("insert into Langston_Galloway values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

foreach($ArrayNewRoster as $row){
   $stmt->bindParam(1, $row['Season']); 
   $stmt->bindParam(2, $row['Team']); 
   $stmt->bindParam(3, $row['G']); 
   $stmt->bindParam(4, $row['GS']); 
   $stmt->bindParam(5, $row['MP']); 
   $stmt->bindParam(6, $row['FG%']); 
   $stmt->bindParam(7, $row['3P%']); 
   $stmt->bindParam(8, $row['FT%']); 
   $stmt->bindParam(9, $row['RB']); 
   $stmt->bindParam(10, $row['AST']); 
   $stmt->bindParam(11, $row['STL']); 
   $stmt->bindParam(12, $row['BLK']); 
   $stmt->bindParam(13, $row['TOV']); 
   $stmt->bindParam(14, $row['PTS']); 
   $stmt->bindParam(15, $row['DOUBLE-DOUBLES']); 
   $stmt->bindParam(16, $row['TRIPLE-DOUBLES']); 
   $stmt->execute();
    

}
} catch (Exception $e) {
    echo $e->getMessage();
}
}
function ImportPistonsPlayersSeasonStatsAndInsertIntoMysqlDB(){
	

	try {

ImportAndreDrummondSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportAnthonyTolliverSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportBlakeGriffinSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportHenryEllensonSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportIshSmithSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportJameerNelsonSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportJamesEnnisIIISeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportJonLeuerStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportKayFelderSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportLukeKennardSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportReggieBullockSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportReggieJacksonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportStanleyJohnsonSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportWillieReedSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportLangstonGallowaySeasonStatsAndInsertIntoMysql();
 
}


catch(Exception $e) {
  echo $e->getMessage();
}
	
}

//21.ImportPistonsToDB

//1.Team Data
//
ImportPistonsTeamDataAndInsertIntoMysql();

//
//2.Team New Roster

ImportPistonsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//

ImportPistonsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame

ImportPistonsPlayersSeasonStatsAndInsertIntoMysqlDB();


?>
