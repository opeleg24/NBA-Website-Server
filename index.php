<?php
// Using Slim framework for API requests
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './vendor/autoload.php';
require './DataBase/DatabaseTeams.php';
$app = new Slim\App();



    // TeamsApi
// ------------------------------------------------------------------------------------------------------------------------------------------------------------
//POR
//1.BlazersTeamApi
// TeamData
$app->get('/rest/BlazersTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from blazers_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/BlazersTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from blazers_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/BlazersTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from blazers_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// ------------------------------------------------------------------------------------------------------------------------------------------------------------
//MIL
//2.BucksTeamApi
// TeamData
$app->get('/rest/BucksTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from bucks_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/BucksTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from bucks_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/BucksTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from bucks_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//3.BullsTeamApi
// TeamData
$app->get('/rest/BullsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from bulls_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/BullsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from bulls_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/BullsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from bulls_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//4.CavsTeamApi
// TeamData
$app->get('/rest/CavsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from cavs_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/CavsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from cavs_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/CavsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from cavs_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//5.CelticsTeamApi
// TeamData
$app->get('/rest/CelticsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from celtics_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/CelticsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from celtics_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/CelticsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from celtics_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});


// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//6.ClippersTeamApi
// TeamData
$app->get('/rest/ClippersTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from clippers_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/ClippersTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from clippers_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/ClippersTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from clippers_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});


// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//7.GrizzliesTeamApi
// TeamData
$app->get('/rest/GrizzliesTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from grizzlies_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/GrizzliesTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from grizzlies_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/GrizzliesTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from grizzlies_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});

// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//8.HawksTeamApi
// TeamData
$app->get('/rest/HawksTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from hawks_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/HawksTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from hawks_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/HawksTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from hawks_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//9.HeatTeamApi
// TeamData
$app->get('/rest/HeatTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from heat_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/HeatTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from heat_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/HeatTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from heat_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//10.HornetsTeamApi
// TeamData
$app->get('/rest/HornetsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from hornets_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/HornetsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from hornets_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/HornetsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from hornets_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//11.JazzTeamApi
// TeamData
$app->get('/rest/JazzTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from jazz_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/JazzTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from jazz_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/JazzTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from jazz_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//12.KingsTeamApi
// TeamData
$app->get('/rest/KingsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from kings_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/KingsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from kings_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/KingsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from kings_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//13.KnicksTeamApi
// TeamData
$app->get('/rest/KnicksTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from knicks_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/KnicksTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from knicks_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/KnicksTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from knicks_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
//14.LakersTeamApi
// TeamData
$app->get('/rest/LakersTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from lakers_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});



//Team New Roster
$app->get('/rest/LakersTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from lakers_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/LakersTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from lakers_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//15.MagicTeamApi
// TeamData
$app->get('/rest/MagicTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from magic_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/MagicTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from magic_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/MagicTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from magic_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//16.MavsTeamApi
// TeamData
$app->get('/rest/MavsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from mavs_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/MavsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from mavs_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/MavsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from mavs_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//17.NetsTeamApi
// TeamData
$app->get('/rest/NetsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from nets_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/NetsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from nets_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/NetsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from nets_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//18.NuggetsTeamApi
// TeamData
$app->get('/rest/NuggetsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from nuggets_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/NuggetsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from nuggets_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/NuggetsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from nuggets_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});

// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//19.PacersTeamApi
// TeamData
$app->get('/rest/PacersTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from pacers_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/PacersTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from pacers_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/PacersTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from pacers_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//20.PelicansTeamApi
// TeamData
$app->get('/rest/PelicansTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from pelicans_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/PelicansTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from pelicans_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/PelicansTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from pelicans_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//21.PistonsTeamApi
// TeamData
$app->get('/rest/PistonsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from pistons_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/PistonsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from pistons_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/PistonsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from pistons_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// PlayersApi
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$app->get('/rest/player/{name}', function (Request $request, Response $response, array $args) {
   
//   $pdo = DatabasePlayers::getInstance()->getConnection();
    $db=new PDO('mysql:host=localhost;dbname=mpelegco_players_season_pergame','mpelegco_joom865','5;xsry#eCi4W');  

$name=$request->getAttribute("name");
$nameWithLowerCase=strtolower($name);
$stmt=$db->prepare("SELECT * from ".$nameWithLowerCase."");  
 
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Season']=$rec['Season'];  
    $json_array['Team']=$rec['Team'];  
    $json_array['G']=intval($rec['G']);  
    $json_array['GS']=intval($rec['GS']); 
    $json_array['MP']=floatval($rec['MP']); 
    $json_array['FieldGoalsPercentage']=floatval($rec['FG%']); 
    $json_array['ThreePointPercantage']=floatval($rec['3P%']); 
    $json_array['FreeThrowPercantage']=floatval($rec['FT%']); 
    $json_array['RB']=floatval($rec['RB']); 
    $json_array['AST']=floatval($rec['AST']); 
    $json_array['STL']=floatval($rec['STL']); 
    $json_array['BLK']=floatval($rec['BLK']); 
    $json_array['TOV']=floatval($rec['TOV']); 
    $json_array['PTS']= floatval($rec['PTS']); 
    $json_array['DOUBLEDOUBLES']=intval($rec['DOUBLE-DOUBLES']); 
    $json_array['TRIPLEDOUBLES']=intval($rec['TRIPLE-DOUBLES']); 
      
    array_push($json_data,$json_array);  
  
}  

      
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$db=null;

 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//22.RaptorsTeamApi
// TeamData
$app->get('/rest/RaptorsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from raptors_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/RaptorsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from raptors_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/RaptorsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from raptors_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//23.RocketsTeamApi
// TeamData
$app->get('/rest/RocketsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from rockets_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/RocketsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from rockets_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/RocketsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from rockets_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//24.SixersTeamApi
// TeamData
$app->get('/rest/SixersTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from sixers_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/SixersTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from sixers_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/SixersTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from sixers_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//25.SpursTeamApi
// TeamData
$app->get('/rest/SpursTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from spurs_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/SpursTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from spurs_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/SpursTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from spurs_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//26.SunsTeamApi
// TeamData
$app->get('/rest/SunsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from suns_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/SunsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from suns_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/SunsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from suns_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//27.ThunderTeamApi
// TeamData
$app->get('/rest/ThunderTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from thunder_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/ThunderTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from thunder_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/ThunderTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from thunder_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//28.TimberWolvesTeamApi
// TeamData
$app->get('/rest/TimberwolvesTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from timberwolves_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/TimberwolvesTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from timberwolves_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/TimberwolvesTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from timberwolves_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//29.WarriorsTeamApi
// TeamData
$app->get('/rest/WarriorsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from warriors_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/WarriorsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from warriors_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/WarriorsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from warriors_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//30.WizardsTeamApi
// TeamData
$app->get('/rest/WizardsTeamData', function () {
   $pdo = DatabaseTeams::getInstance()->getConnection();
  $stmt=$pdo->prepare('select * from wizards_team_data'); 
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['LOCATION']=$rec['LOCATION'];  
    $json_array['TEAMNAMES']=$rec['TEAM NAMES'];  
    $json_array['PLAYOFFAPPERANCES']=$rec['PLAYOFF APPERANCES'];  
    $json_array['CHAMPIONSHIPS']=$rec['CHAMPIONSHIPS']; 
    $json_array['RECORD']=$rec['2017-18 RECORD']; 

 

    array_push($json_data,$json_array);  
  
}  

// 	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    

});

//Team Roster
$app->get('/rest/WizardsTeamNewRoster', function (Request $request, Response $response, array $args) {
   $pdo = DatabaseTeams::getInstance()->getConnection();


$stmt=$pdo->prepare('select * from wizards_newteam_roster');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['PLAYER']=$rec['PLAYER'];  
    $json_array['POSITION']=$rec['POSITION'];  
    $json_array['HEIGHT']=$rec['HEIGHT']; 
    $json_array['WEIGHT']=$rec['WEIGHT']; 
    $json_array['BirthDate']=$rec['Birth Date']; 
    $json_array['EXPERIENCE']=intval($rec['EXPERIENCE']); 
    $json_array['COLLEGE']=$rec['COLLEGE']; 
  
 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;

    
    
 
});

//Team Pay Roll
$app->get('/rest/WizardsTeamPayRoll', function () {
 $pdo = DatabaseTeams::getInstance()->getConnection();

$stmt=$pdo->prepare('select * from wizards_team_payroll');  
  
$stmt->execute();  
$json_data=array();//create the array  
foreach($stmt as $rec)//foreach loop  
{  
    $json_array['Player']=$rec['Player'];  
    $json_array['Age']=$rec['Age']; 
    $json_array['EightNine']=$rec['2018-19']; 
    $json_array['NineTwenty']=$rec['2019-20']; 
    $json_array['TwentyTwentyOne']=$rec['2020-21']; 
    $json_array['TwentyOneTwentyTwo']=$rec['2021-22']; 
    $json_array['TwentyTwoTwentyThree']=$rec['2022-23']; 
    $json_array['TwentyThreeTwentyFour']=$rec['2023-24']; 
    $json_array['SignedUsing']=$rec['Signed Using']; 
    $json_array['Guaranteed']=$rec['Guaranteed']; 

    array_push($json_data,$json_array);  
  
}  
header("Content-Type: application/json");
//	echo json_encode($json_data);
return json_encode($json_data); 
$pdo=null;
    
    
 
});
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$app->run();



