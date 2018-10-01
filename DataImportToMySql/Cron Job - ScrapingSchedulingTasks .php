<?php
require 'ImportToBlazersDB.php';
require 'ImportToBucksDB.php';
require 'ImportToBullsDB.php';
require 'ImportToCavsDB.php';
require 'ImportToCelticsDB.php';
require 'ImportToClippersDB.php';
require 'ImportToGrizzliesDB.php';
require 'ImportToHawksDB.php';
require 'ImportToHeatDB.php';
require 'ImportToHornetsDB.php';
require 'ImportToJazzDB.php';
require 'ImportToKingsDB.php';
require 'ImportToKnicksDB.php';
require 'ImportToLakersDB.php';
require 'ImportToMagicDB.php';
require 'ImportToMavsDB.php';
require 'ImportToNetsDB.php';
require 'ImportToNuggetsDB.php';
require 'ImportToPacersDB.php';
require 'ImportToPelicansDB.php';
require 'ImportToPistonsDB.php';
require 'ImportToRaptorsDB.php';
require 'ImportToRocketsDB.php';
require 'ImportToSixersDB.php';
require 'ImportToSpursDB.php';
require 'ImportToSunsDB.php';
require 'ImportToThunderDB.php';
require 'ImportToTimberwolvesDB.php';
require 'ImportToWarriorsDB.php';
require 'ImportToWizardsDB.php';


//delay time of 7 minutes between each team - usleep(420000000));
//delay time of 15-25 seconds between each function - usleep(mt_rand(15000000,25000000));;
//1.ImportToBlazersDB

//1.Team Data
//
ImportBlazersTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportBlazersNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportBlazersTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportBlazersPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);
     
     //2.ImportToBucksDB

//1.Team Data
//
ImportBucksTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportBucksNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportBucksTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportBucksPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
        
//3.ImportToBullsDB

//1.Team Data
//
ImportBullsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportBullsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportBullsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportBullsPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   

//4.ImportToCavsDB

//1.Team Data
//
ImportCavsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportCavsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportCavsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportCavsPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//5.ImportToCelticsDB

//1.Team Data
//
ImportCelticsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportCelticsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportCelticsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportCelticsPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//6.ImportClippersToDB

//1.Team Data
//
ImportClippersTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportClippersNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportClippersTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportClippersPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//7.ImportGrizzliesToDB

//1.Team Data
//
ImportGrizzliesTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportGrizzliesNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportGrizzliesTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportGrizzliesPlayersSeasonStatsAndInsertIntoMysqlDB();

  

usleep(420000000);   
//8.ImportHawksToDB

//1.Team Data
//
ImportHawksTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportHawksNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportHawksTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportHawksPlayersSeasonStatsAndInsertIntoMysqlDB();

 

usleep(420000000);   
//9.ImportHeatToDB

//1.Team Data
//
ImportHawksTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportHawksNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportHawksTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportHawksPlayersSeasonStatsAndInsertIntoMysqlDB();

 

usleep(420000000);   
//10.ImportHornetsToDB

//1.Team Data
//
ImportHornetsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportHornetsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportHornetsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportHornetsPlayersSeasonStatsAndInsertIntoMysqlDB();

 

usleep(420000000);   
//11.ImportJazzToDB

//1.Team Data
//
ImportJazzTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportJazzNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportJazzTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportJazzPlayersSeasonStatsAndInsertIntoMysqlDB();


 

usleep(420000000);   
//12.ImportKingsToDB

//1.Team Data
//
ImportKingsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportKingsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportKingsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportKingsPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//13.ImportKnicksToDB

//1.Team Data
//
ImportKnicksTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportKnicksNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportKnicksTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportKnicksPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
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



usleep(420000000);   
//15.ImportMagicToDB

//1.Team Data
//
ImportMagicTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportMagicNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportMagicTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportMagicPlayersSeasonStatsAndInsertIntoMysqlDB();




usleep(420000000);   
//16.ImportMavsToDB

//1.Team Data
//
ImportMavsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportMavsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportMavsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportMavsPlayersSeasonStatsAndInsertIntoMysqlDB();






usleep(420000000);   
//17.ImportNetsToDB

//1.Team Data
//
ImportNetsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportNetsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportNetsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame

usleep(mt_rand(15000000,25000000));
ImportNetsPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//18.ImportNuggetsToDB

//1.Team Data
//
ImportNuggetsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportNuggetsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportNuggetsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportNuggetsPlayersSeasonStatsAndInsertIntoMysqlDB();




usleep(420000000);   
//19.ImportPacersToDB

//1.Team Data
//
ImportPacersTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportPacersNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportPacersTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportPacersPlayersSeasonStatsAndInsertIntoMysqlDB();




usleep(420000000);   
//20.ImportPelicansToDB

//1.Team Data
//
ImportPelicansTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportPelicansNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportPelicansTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportPelicansPlayersSeasonStatsAndInsertIntoMysqlDB();

usleep(420000000);   
//21.ImportPistonsToDB

//1.Team Data
//
ImportPistonsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportPistonsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportPistonsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportPistonsPlayersSeasonStatsAndInsertIntoMysqlDB();

usleep(420000000);   
//22.ImportRaptorsToDB

//1.Team Data
//
ImportRaptorsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportRaptorsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportRaptorsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportRaptorsPlayersSeasonStatsAndInsertIntoMysqlDB();

usleep(420000000);   
//23.ImportRocketsToDB

//1.Team Data
//
ImportRocketsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportRocketsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportRocketsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportRocketsPlayersSeasonStatsAndInsertIntoMysqlDB();

usleep(420000000);   
//24.ImportSixersToDB

//1.Team Data
//
ImportSixersTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportSixersNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportSixersTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportSixersPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//25.ImportSpursToDB

//1.Team Data
//
ImportSpursTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportSpursNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportSpursTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportSpursPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//26.ImportSunsToDB

//1.Team Data
//
ImportSunsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportSunsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportSunsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportSunsPlayersSeasonStatsAndInsertIntoMysqlDB();




usleep(420000000);   
//27.ImportThunderToDB

//1.Team Data
//
ImportThunderTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportThunderNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportThunderTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportThunderPlayersSeasonStatsAndInsertIntoMysqlDB();


usleep(420000000);   
//28.ImportTimberwolvesToDB

//1.Team Data
//
ImportTimberwolvesTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportTimberwolvesNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportTimberwolvesTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportTimberwolvesPlayersSeasonStatsAndInsertIntoMysqlDB();


usleep(420000000);   
//29.ImportWarriorsToDB

//1.Team Data
//
ImportWarriorsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportWarriorsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportWarriorsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportWarriorsPlayersSeasonStatsAndInsertIntoMysqlDB();



usleep(420000000);   
//30.ImportWizardsToDB

//1.Team Data
//
ImportWizardsTeamDataAndInsertIntoMysql();
usleep(mt_rand(15000000,25000000));
//
//2.Team New Roster
//
usleep(mt_rand(15000000,25000000));
ImportWizardsNewTeamRosterAndInsertIntoMysql();
//
//3.Team PayRoll
//
usleep(mt_rand(15000000,25000000));
ImportWizardsTeamPayRollAndInsertIntoMysql();

//4.IMPORT PLAYERS TO  players_season_pergame
usleep(mt_rand(15000000,25000000));
ImportWizardsPlayersSeasonStatsAndInsertIntoMysqlDB();




?>
