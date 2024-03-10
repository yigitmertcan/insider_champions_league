<?php

namespace App\Services;

use App\Services\ClubsServices;
use App\Services\DataManageServices;

class CalculateServices
{
    public int $week;
    private array $clubs;
    private $match_week = 3;

    public function __construct() {
        $this->clubs = ClubsServices::getClubs();
    }

    public function nextWeek(int $week)
    {

        return DataManageServices::getData("match_".$week);
    }


    public function generateWeekes()
    {
        // Takımları ve maç sayısını belirle
        $takimlar = ClubsServices::getClubs();
        $mac_sayisi = $this->match_week;

        // Fikstürü oluştur
        $fikstur = array();
        $takim_sayisi = count($takimlar);
        for ($hafta = 1; $hafta <= $mac_sayisi; $hafta++) {
            $fikstur[$hafta] = array();

            for ($i = 0; $i < $takim_sayisi / 2; $i++) {
                $ev_sahibi = $takimlar[$i];
                $misafir = $takimlar[$takim_sayisi - 1 - $i];
                $fikstur[$hafta][] =["ev_sahibi"=>$ev_sahibi ,"misafir"=> $misafir];
                $fikstur[$mac_sayisi*2+1-$hafta][] = ["ev_sahibi"=> $misafir ,"misafir"=> $ev_sahibi];
            }

            // Takımları döndürerek fikstürü güncelle
            $son_takim = array_pop($takimlar);
            array_splice($takimlar, 1, 0, $son_takim);
            DataManageServices::setData("match_".$hafta,$fikstur[$hafta]);
            DataManageServices::setData("match_".($mac_sayisi*2+1-$hafta),$fikstur[$mac_sayisi*2+1-$hafta]);
        }

        return $fikstur;
    }

    public function playAll(int $week)
    {
        $generateMatchScore =(object)[];
        $generateMatchScore->match = $this->calculateMatchs($week);
        $generateMatchScore->fixturePoints =$this->calculateFixturePoints();

        return $generateMatchScore;
    }

    private function calculateFixturePoints(){


        $takimlar = ClubsServices::getClubs();
        $points = array();

        for ($i = 1; $i <=  $this->match_week*2; $i++) {
            $weekMatches = DataManageServices::getData("match_". $i);

            if($i == 1){
                foreach ($weekMatches as $y) {
                    $points[$y["misafir"]]["played"]=1;
                    $points[$y["ev_sahibi"]]["played"]=1;
                    $points[$y["ev_sahibi"]]["pts"]=0;
                    $points[$y["misafir"]]["pts"]=0;
                    $points[$y["ev_sahibi"]]["win"]=0;
                    $points[$y["misafir"]]["win"]=0;
                    $points[$y["ev_sahibi"]]["draw"]=0;
                    $points[$y["misafir"]]["draw"]=0;
                    $points[$y["ev_sahibi"]]["lose"]=0;
                    $points[$y["misafir"]]["lose"]=0;

                    if ($y["ev_sahibi_score"] > $y["misafir_score"]){
                        $points[$y["ev_sahibi"]]["pts"]=3;
                        $points[$y["ev_sahibi"]]["win"]=1;
                        $points[$y["misafir"]]["lose"]=1;
                    }elseif ($y["ev_sahibi_score"] < $y["misafir_score"]){
                        $points[$y["misafir"]]["pts"]=3;
                        $points[$y["misafir"]]["win"]=1;
                        $points[$y["ev_sahibi"]]["lose"]=1;
                    }else{
                        $points[$y["ev_sahibi"]]["draw"]=1;
                        $points[$y["misafir"]]["draw"]=1;
                        $points[$y["ev_sahibi"]]["pts"]=1;
                        $points[$y["misafir"]]["pts"]=1;
                    }

                }
                DataManageServices::setData("fixturePoints",$points);
                continue;
            }

            if (empty($weekMatches[0]["ev_sahibi_score"])){
                break;
            }

            foreach ($weekMatches as $y) {

                $points[$y["misafir"]]["played"]=$i;
                $points[$y["ev_sahibi"]]["played"]=$i;

                if ($y["ev_sahibi_score"] > $y["misafir_score"]){
                    $points[$y["ev_sahibi"]]["pts"]=$points[$y["ev_sahibi"]]["pts"]+3;
                    $points[$y["ev_sahibi"]]["win"]=$points[$y["ev_sahibi"]]["win"]+1;
                    $points[$y["misafir"]]["lose"]=$points[$y["misafir"]]["lose"]+1;
                }elseif ($y["ev_sahibi_score"] < $y["misafir_score"]){
                    $points[$y["misafir"]]["pts"]=$points[$y["ev_sahibi"]]["pts"]+3;
                    $points[$y["misafir"]]["win"]=$points[$y["misafir"]]["win"]+1;
                    $points[$y["ev_sahibi"]]["lose"]=$points[$y["ev_sahibi"]]["draw"]+1;
                }else{
                    $points[$y["ev_sahibi"]]["draw"]=$points[$y["ev_sahibi"]]["draw"]+1;
                    $points[$y["misafir"]]["draw"]=$points[$y["misafir"]]["draw"]+1;
                    $points[$y["ev_sahibi"]]["pts"]=$points[$y["ev_sahibi"]]["pts"]+1;
                    $points[$y["misafir"]]["pts"]=$points[$y["misafir"]]["pts"]+1;
                }
            }


        }


        DataManageServices::setData("fixturePoints",$points);


        return collect($points)->sortByDesc('pts');
    }


    private function calculateMatchs(int $week){
       $weekMatches = DataManageServices::getData("match_". $week);

        foreach ($weekMatches as $i => $a) {
            $weekMatches[$i]["ev_sahibi_score"]=rand(0,5);
            $weekMatches[$i]["misafir_score"]=rand(0,5);
       }
        DataManageServices::setData("match_". $week,$weekMatches);

        return $weekMatches;
    }
}
