<?php

include 'simple_html_dom.php';
//1.import team data
function ImportTeamDataAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into lakers_team_data values(?,?,?,?,?)");

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
function ImportNewTeamRosterAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into lakers_newteam_roster values(?,?,?,?,?,?,?)");

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
function ImportTeamPayRollAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into lakers_team_payroll values(?,?,?,?,?,?,?,?,?,?)");

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
   $stmt = $db->prepare("DELETE FROM `lakers_team_payroll` WHERE `Player`='';");
   $stmt->execute();
} 
} catch (Exception $e) {
    echo $e->getMessage();
}
}
//4.IMPORT  TEAM PLAYERS!

function ImportAlexCarusoSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Alex_Caruso values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportAndrewBogutSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Andrew_Bogut values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportBrandonIngramSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Brandon_Ingram values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportBrookLopezSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Brook_Lopez values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportChanningFryeSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Channing_Frye values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportGaryPaytonIISeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Gary_Payton_II values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportIsaiahThomasSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Isaiah_Thomas values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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


function ImportIvicaZubacStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Ivica_Zubac values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportJoshHartSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Josh_Hart values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportJuliusRandleSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Julius_Randle values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportKentaviousCaldwellPopeSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Kentavious_Caldwell_Pope values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportKyleKuzmaSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Kyle_Kuzma values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

function ImportLonzoBallSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Lonzo_Ball values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportLuolDengSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Luol_Deng values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportThomasBryantSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Thomas_Bryant values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportTravisWearSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Travis_Wear values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportTylerEnnisSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Tyler_Ennis values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportVanderBlueSeasonStatsAndInsertIntoMysql(){

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
$stmt = $db->prepare("insert into Vander_Blue values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
function ImportLakersPlayersSeasonStatsAndInsertIntoMysqlDB(){
	
	ImportAlexCarusoSeasonStatsAndInsertIntoMysql();
	usleep(mt_rand(15000000,25000000));
ImportAndrewBogutSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportBrandonIngramSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportBrookLopezSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportChanningFryeSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportGaryPaytonIISeasonStatsAndInsertIntoMysql();
\usleep(mt_rand(15000000,25000000));
ImportIsaiahThomasSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportIvicaZubacStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportJoshHartSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportJuliusRandleSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportKentaviousCaldwellPopeSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportKyleKuzmaSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportLonzoBallSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportLuolDengSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportThomasBryantSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportTravisWearSeasonStatsAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
ImportVanderBlueSeasonStatsAndInsertIntoMysql();
	}
//14.ImportLakersToDB

//1.Team Data
//
ImportLakersTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportLakersNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportLakersTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportLakersPlayersSeasonStatsAndInsertIntoMysqlDB();

?>
