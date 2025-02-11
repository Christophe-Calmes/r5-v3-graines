<?php

class SQLvehicles 
{
    protected $dice ;
    protected  $armour;
    protected  $structurePoint;
    protected $sizeVehicle;
    protected  $typeVehicle;
    protected $yes;
    public function __construct () {
        $this->yes = [['id'=>1, 'name'=> 'No'], ['id'=>2, 'name'=>'Yes']];
        $this->dice = [['id'=>1, 'valueDice'=> 2, 'nameDice'=> 'D6', 'faces'=>6],
        ['id'=>2, 'valueDice'=> 4, 'nameDice'=> 'D8', 'faces'=>8],
        ['id'=>3, 'valueDice'=> 6, 'nameDice'=> 'D10', 'faces'=>10],
        ['id'=>4, 'valueDice'=> 8, 'nameDice'=> 'D12', 'faces'=>12]];
        $this->armour = [['id'=>1, 'valueArmour' => 1.15, 'nameArmour'=> 'No armour'],
        ['id'=>2, 'valueArmour' => 1.30, 'nameArmour'=> '6+'],
        ['id'=>3, 'valueArmour' => 1.45, 'nameArmour'=> '5+'],
        ['id'=>4, 'valueArmour' => 1.90, 'nameArmour'=> '4+'],
        ['id'=>5, 'valueArmour' => 4, 'nameArmour'=> '3+'],
        ['id'=>6, 'valueArmour' => 8, 'nameArmour'=> '2+'],];
        $this->structurePoint = [['id'=>1, 'valueStructurePoint'=>1, 'Structure'=> 1],
        ['id'=>2, 'valueStructurePoint'=>2, 'Structure'=> 2],
        ['id'=>3, 'valueStructurePoint'=>4, 'Structure'=> 4],
        ['id'=>4, 'valueStructurePoint'=>6, 'Structure'=> 6],
        ['id'=>5, 'valueStructurePoint'=>8, 'Structure'=> 8],
        ['id'=>6, 'valueStructurePoint'=>10, 'Structure'=> 10],
        ['id'=>7, 'valueStructurePoint'=>12, 'Structure'=> 12],
        ['id'=>8, 'valueStructurePoint'=>16, 'Structure'=> 16],
        ['id'=>9, 'valueStructurePoint'=>18, 'Structure'=> 18],
        ['id'=>10, 'valueStructurePoint'=>20, 'Structure'=> 20],];
        $this->sizeVehicle = [['id'=>1, 'valueSize'=> 4, 'NameSize'=>'Small'],
        ['id'=>2, 'valueSize'=> 8, 'NameSize'=>'Standard'],
        ['id'=>3, 'valueSize'=> 16, 'NameSize'=>'Large'],
        ['id'=>4, 'valueSize'=> 32, 'NameSize'=>'Giant']];
        $this->typeVehicle = [['id'=>1, 'valueType'=>1, 'NameType'=>'Civilian'],
                ['id'=>2, 'valueType'=>2, 'NameType'=>'Military']];
    }
    public function checkYes ($id) {
        $index = array_search($id, array_column($this->dice, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    public function checkDice ($id) {
        $index = array_search($id, array_column($this->dice, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    private function arrayChoice ($adressArray) {
        switch ($adressArray) {
            case 0:
                return [$this->armour, 'valueArmour'];
                break;
                case 1:
                    return [$this->structurePoint, 'valueStructurePoint'];
                    break;
                    case 2:
                        return [$this->sizeVehicle, 'valueSize'];
                        break;
                        case 3:
                            return [$this->typeVehicle, 'valueType'];
                            break;
                                    
            default:
                return false;
                break;
        }
    }
    public function checkArray ($id, $array) {
        $specificArray = $this->arrayChoice ($array);
        if($specificArray == false) {
            return false;
        }
        $index = array_search($id, array_column($specificArray[0], 'id'));
        if($index !== false) {
            return true;
        }
        return false;
    }
    private function boolYes ($id) {
        if($id == 1) {
            return 1;
        }
        return 3;
    }
    private function getDiceValue ($id) {
        $index = array_search($id, array_column($this->dice, 'id'));
        return $this->dice[$index]['valueDice'];
    }
    private function getArrayValue($adressArray, $id) {
        $getData = $this->arrayChoice ($adressArray);
        $array  = $getData[0];
        $key = $getData[1];
        $index = array_search($id, array_column($array , 'id'));
        return $array[$index][$key];
    }
    public function solveVehiclePrice($data) {
        $result = 0;
        $valueMove = 0;
        if($data['moving'] > 0 ) {
            $valueMove = log($data['moving']);
            $fligth = $this->boolYes ($data['fligt']);
            $stationnaryFligth = $this->boolYes ($data['stationnaryFligt']);
            $valueMove = $valueMove * $fligth * $stationnaryFligth;
        } else {
            $valueMove = 1;
        }
        $valueDQM = $this->getDiceValue($data['dqm']);
        $valueDQM = $this->getDiceValue ($data['dqm']);
        $valueDC = $this->getDiceValue ($data['dc']);
        $coefArmor = $this->getArrayValue(0, $data['armor']) ;
        $valueStruture = $this->getArrayValue(1, $data['structurePoint']) ;
        $valueSize = $this->getArrayValue(2, $data['sizeVehicle']);
        $valueType = $this->getArrayValue(3, $data['typeVehicle']);
        $result = ($valueMove * ($valueDQM + ($valueDC * 2.2) + $valueType + $valueSize)) * ($coefArmor + $valueStruture); 
        if($data['typeVehicle'] == 1) {
           $result = $result / 2.5;
        } 
        return round($result, 0);
    }
    public function creatVehiclesByUser ($param) {
     
        $insert = "INSERT 
        INTO `vehicle`( 
            `idFaction`, 
            `nameVehicle`, 
            `dqm`, 
            `dc`, 
            `armor`, 
            `structurePoint`, 
            `moving`, 
            `fligt`, 
            `stationnaryFligt`, 
            `sizeVehicle`, 
            `typeVehicle`, 
            `price`, 
            `namePicture`, 
            `idAuthor`) 
        VALUES ( 
            :idFaction, 
            :nameVehicle, 
            :dqm,
            :dc, 
            :armor, 
            :structurePoint, 
            :moving, 
            :fligt, 
            :stationnaryFligt,  
            :sizeVehicle, 
            :typeVehicle,
            :price, 
            :namePicture, 
            :idUser );";
        ActionDB::access($insert, $param, 1);
           
    }
    public function updateVehicle ($param, $picture) {
        // $picture = bool
        if($picture) {
            $update = "UPDATE `vehicle` SET 
            `nameVehicle`=:nameVehicle,
            `idFaction`=:idFaction,
            `sizeVehicle`=:sizeVehicle,
            `typeVehicle`=:typeVehicle,
            `dqm`=:dqm,
            `dc`=:dc,
            `moving`=:moving,
            `fligt`=:fligt,
            `stationnaryFligt`=:stationnaryFligt,
            `structurePoint`=:structurePoint,
            `armor`=:armor,
            `price`=:price,
            `namePicture`=:namePicture,
            `fix`=0 
            WHERE `id` = :idVehicle AND `idAuthor` = :idUser;";
        } else {
            $update = "UPDATE `vehicle` SET 
            `nameVehicle`=:nameVehicle,
            `idFaction`=:idFaction,
            `sizeVehicle`=:sizeVehicle,
            `typeVehicle`=:typeVehicle,
            `dqm`=:dqm,
            `dc`=:dc,
            `moving`=:moving,
            `fligt`=:fligt,
            `stationnaryFligt`=:stationnaryFligt,
            `structurePoint`=:structurePoint,
            `armor`=:armor,
            `price`=:price,
            `fix`=0 
            WHERE `id` = :idVehicle AND `idAuthor` = :idUser;";
        }
        ActionDB::access($update, $param, 1);
    }
    public function checkVehicleOwner ($idVehicle) {
        $idUser = new Controles ();
        $idUser =  $idUser->idUser($_SESSION);
        $select = "SELECT COUNT(`idAuthor`) AS `nbr` FROM `vehicle` WHERE `id`=:idVehicle AND `idAuthor` = :idUser;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle], ['prep'=>':idUser', 'variable'=>$idUser],];
        $owner = ActionDB::select($select, $param, 1);
        if($owner[0]['nbr'] == 1) {
            return true;
        }
        return false;
    }
    public function getPictureVehicleName ($idVehicle) {
        $select = "SELECT `namePicture` FROM `vehicle` WHERE `id` = :idVehicle;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        $dataNamePictureVehicle = ActionDB::select($select, $param, 1);
        return $dataNamePictureVehicle[0]['namePicture'];
    }
    protected function getVehicle ($data) {
        $idUser = new Controles ();
        $idUser =  $idUser->idUser($_SESSION);
        $select = "SELECT `id`, `idAuthor`, `nameVehicle`, `idFaction`, `sizeVehicle`, `typeVehicle`, `dqm`, `dc`, `moving`, `fligt`, `stationnaryFligt`, `structurePoint`, `armor`, `price`, `namePicture`, `valid`, `fix` 
        FROM `vehicle` 
        WHERE `idFaction` = :idFaction AND `valid`= :valid AND  `idAuthor` = :idUser;";
        $param = [['prep'=>':idFaction', 'variable'=>$data[0]], 
        ['prep'=>':valid', 'variable'=>$data[1]], 
        ['prep'=>':idUser', 'variable'=>$idUser]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getOneVehicle ($idVehicle) {
        $select = "SELECT `id`, `nameVehicle`, `idFaction`, `sizeVehicle`, `typeVehicle`, `dqm`, `dc`, `moving`, `fligt`, `stationnaryFligt`, `structurePoint`, `armor`, `price`, `namePicture`, `fix` 
        FROM `vehicle` 
        WHERE `id` = :idVehicle AND `valid` = 1;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        return ActionDB::select($select, $param, 1);
    }
    private function getVehicleSolvePrice ($param) {
        $select = "SELECT `sizeVehicle`, `typeVehicle`, `dqm`, `dc`, `moving`, `fligt`, `stationnaryFligt`, `structurePoint`, `armor`  
        FROM `vehicle` 
        WHERE `id` = :idVehicle;";
       
        return ActionDB::select($select, $param, 1);
    }
    private function fixUnFixVehicle ($param) {
        $update = "UPDATE `vehicle` SET `fix`=`fix`^1 WHERE `id` = :idVehicle;";
        ActionDB::access($update, $param, 1);
        return true;
    }
    public function InServiceVehicleByOwner ($param) {
        $update = "UPDATE `vehicle` SET `fix`=3 WHERE `id` = :idVehicle;";
        ActionDB::access($update, $param, 1);
        return $this->factionVehicle ($param);
    }
    public function NotInServiceVehicleByOwner($param) {
        $update = "UPDATE `vehicle` SET `fix`=1 WHERE `id` = :idVehicle;";
        ActionDB::access($update, $param, 1);
        return $this->factionVehicle ($param);
    }

    private function factionVehicle ($param) {
        $select = "SELECT `idFaction` FROM `vehicle` WHERE `id` = :idVehicle;";
        $idFaction =  ActionDB::select($select, $param, 1);
        return $idFaction[0]['idFaction'];
    }
    private function resetAllSRVehicle ($param) {
        $delete = "DELETE FROM `vehicleLinkSpecialRules` WHERE `idVehicle` = :idVehicle;";
        ActionDB::access($delete, $param, 1);
    }

    public function fixVehicleByOwner ($idVehicle) {
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        $dataVehicle = $this->getVehicleSolvePrice ($param);
        $priceVehicle = $this->solveVehiclePrice( $dataVehicle[0]);
        $this->fixUnFixVehicle ($param);
        $this->resetAllSRVehicle ($param);
        return $this->factionVehicle ($param);
    }
    public function equipVehicle ($idVehicle) {
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        $update = "UPDATE `vehicle` SET `fix`= 2 WHERE `id` = :idVehicle;";
        ActionDB::access($update, $param, 1);
    }
    public function controleMovingVehicle ($moving) {
        if(($moving >= 0)&&($moving <=18)) {
            return true;
        }
        return false;
    }
    private function getVehicleDirectPrice ($idVehicle) {
        $select = "SELECT `price` FROM `vehicle` WHERE `id` = :idVehicle;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        $dataPrice = ActionDB::select($select, $param, 1);
        return $dataPrice[0]['price'];
    }
    private function getSRVehiclePrice ($idSR) {
        $select = "SELECT  `price` FROM `specialRules` WHERE `id` = :idSpecialRule;";
        $param = [['prep'=>':idSpecialRule', 'variable'=>$idSR]];
        $dataPriceSR = ActionDB::select($select, $param, 1);
        return $dataPriceSR[0]['price'];
    }
    private function recordNewPrice ($idVehicle, $price) {
        $update = "UPDATE `vehicle` SET `price`= :price WHERE `id`=:idVehicle;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle], 
        ['prep'=>':price', 'variable'=>$price]];
        ActionDB::access($update, $param, 1);
    }
    public function updateVehiclePrice ($param, $type) {
        // $type = true => add, false => substract
        $newPrice = 0;
        $vehiclePrice = $this->getVehicleDirectPrice($param[0]['variable']);
        $priceSR = $this->getSRVehiclePrice ($param[1]['variable']);
        if($type) {
            $newPrice = (1+$priceSR) * $vehiclePrice;
        } else {
            $newPrice = $vehiclePrice/(1+$priceSR);
        }
        $this->recordNewPrice ($param[0]['variable'], round($newPrice, 0));
    }
    public function deleteVehicleByOwner($idVehicle) {
        $delete="DELETE FROM `vehicle` WHERE `id` = :idVehicle;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        ActionDB::access($delete, $param, 1);
    }
    private function updateVehiclePriceAddWeapon ($idVehicle, $weaponPrice) {
        $price = $this->getVehicleDirectPrice ($idVehicle);
        $newPrice = $price * $weaponPrice;
        $update = "UPDATE `vehicle` SET `price` = :price WHERE `id` = :idVehicle;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle], 
        ['prep'=>':price', 'variable'=>round($newPrice, 0)]];
        ActionDB::access($update, $param, 1);
    }
    public function addWeaponOnVehicle ($param, $weaponPrice) {
        $insert = "INSERT INTO `vehicleLinkWeapon`(`idVehicle`, `idWeapon`) VALUES (:idVehicle, :idWeapon);";
        ActionDB::access($insert, $param, 1);
        $this->updateVehiclePriceAddWeapon ($param[1]['variable'], $weaponPrice);
    }
    private function unequipWeaponVehicle ($param) {
        array_pop($param);
        $delete = "DELETE FROM `vehicleLinkWeapon` 
        WHERE `idVehicle` = :idVehicle AND `idWeapon`=:idWeapon;";
        ActionDB::access($delete, $param, 1);
        return true;
    }

    public function substractWeaponVehicle ($param) {
        $vhehiclePrice =  $this->getVehicleDirectPrice($param[1]['variable']);
        $newPrice =   $vhehiclePrice / $param[2]['variable'];
        $this->recordNewPrice ($param[1]['variable'], round($newPrice, 0));
        $this->unequipWeaponVehicle ($param);
        return true;
    }
}
