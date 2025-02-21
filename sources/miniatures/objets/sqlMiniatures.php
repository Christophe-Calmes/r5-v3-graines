<?php
class sqlMiniatures 
{
    protected $dice ;
    protected $armour;
    protected $healtPoint;
    protected $typesTroupe;
    protected $miniatureSize;
    protected $yes;
    public function __construct () {
        $this->dice = [['id'=>1, 'valueDice'=> 2, 'nameDice'=> 'D6', 'faces'=>6],
        ['id'=>2, 'valueDice'=> 4, 'nameDice'=> 'D8', 'faces'=>8],
        ['id'=>3, 'valueDice'=> 6, 'nameDice'=> 'D10', 'faces'=>10],
        ['id'=>4, 'valueDice'=> 8, 'nameDice'=> 'D12', 'faces'=>12]];
        $this->armour = [['id'=>1, 'valueArmour' => 0.8, 'nameArmour'=> 'No armour'],
        ['id'=>2, 'valueArmour' => 1.15, 'nameArmour'=> '6+'],
        ['id'=>3, 'valueArmour' => 1.40, 'nameArmour'=> '5+'],
        ['id'=>4, 'valueArmour' => 1.50, 'nameArmour'=> '4+'],
        ['id'=>5, 'valueArmour' => 1.70, 'nameArmour'=> '3+'],
        ['id'=>6, 'valueArmour' => 2, 'nameArmour'=> '2+'],];
        $this->healtPoint = [['id'=>1, 'valueHealtPoint'=>1, 'healtPoint'=> 1],
        ['id'=>2, 'valueHealtPoint'=>2, 'healtPoint'=> 2],
        ['id'=>3, 'valueHealtPoint'=> 4, 'healtPoint'=> 3],
        ['id'=>4, 'valueHealtPoint'=> 8, 'healtPoint'=> 4],
        ['id'=>5, 'valueHealtPoint'=> 16, 'healtPoint'=> 5],
        ['id'=>6, 'valueHealtPoint'=> 32, 'healtPoint'=> 6],];
        $this->typesTroupe = [['id'=>1, 'valueTypeTroupe'=>1, 'nameTroupe'=>'Civile', 'commandePoint'=>0.10],
        ['id'=>2, 'valueTypeTroupe'=>4, 'nameTroupe'=>'Conscrit', 'commandePoint'=>0.4],
        ['id'=>3, 'valueTypeTroupe'=>6, 'nameTroupe'=>'Régulier', 'commandePoint'=>0.6],
        ['id'=>4, 'valueTypeTroupe'=>12, 'nameTroupe'=>'Elite', 'commandePoint'=>1.2],
        ['id'=>5, 'valueTypeTroupe'=>16, 'nameTroupe'=>'Vétéran', 'commandePoint'=>1.4],
        ['id'=>6, 'valueTypeTroupe'=>14, 'nameTroupe'=>'Officer', 'commandePoint'=>2],
        ['id'=>7, 'valueTypeTroupe'=>18, 'nameTroupe'=>'Officier suppérieur', 'commandePoint'=>2.4],];
        $this->miniatureSize = [['id'=>1, 'valueSize'=> 2, 'NameSize'=>'Petit'],
        ['id'=>2, 'valueSize'=> 2.5, 'NameSize'=>'Standard'],
        ['id'=>3, 'valueSize'=> 4, 'NameSize'=>'Grande'],
        ['id'=>4, 'valueSize'=> 3, 'NameSize'=>'Géant']];
        $this->yes = [['id'=>1, 'name'=> 'Non'], ['id'=>2, 'name'=>'Oui']];
    }

    public function checkYes ($id) {
        $index = array_search($id, array_column($this->yes, 'id'));
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
    public function checkHealPoint ($id) {
        $index = array_search($id, array_column($this->healtPoint, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    public function checkArmor ($id) {
        $index = array_search($id, array_column($this->armour, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    public function checkTypeTroop ($id) {
        $index = array_search($id, array_column($this->typesTroupe, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    public function checkMiniatureSize ($id) {
        $index = array_search($id, array_column($this->miniatureSize, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    private function getDiceValue ($id) {
        $index = array_search($id, array_column($this->dice, 'id'));
        return $this->dice[$index]['valueDice'];
    }
    private function getHealtPointValue ($id) {
        $index = array_search($id, array_column($this->healtPoint, 'id'));
        return $this->healtPoint[$index]['valueHealtPoint'];
    }
    private function getArmour ($id) {
        $index = array_search($id, array_column($this->armour, 'id'));
        return $this->armour[$index]['valueArmour'];
    }
    private function getTypesTroupe ($id) {
        $index = array_search($id, array_column($this->typesTroupe, 'id'));
        return $this->typesTroupe[$index]['valueTypeTroupe'];
    }
    private function getMiniatureSize ($id) {
        $index = array_search($id, array_column($this->miniatureSize, 'id'));
        return $this->miniatureSize[$index]['valueSize'];
    }
    private function boolYes ($id) {
        if($id == 1) {
            return 1;
        }
        return 3;
    }
    private function getIdUser () {
        $checkIdUser = new Controles ();
        return $checkIdUser->idUser($_SESSION);
    }
    public function getFactionForOneMiniature ($idMiniature) {
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
        $select = "SELECT `idFaction` FROM `miniatures` WHERE `id` = :idMiniature;";
        $faction = ActionDB::select($select, $param, 1);
        return $faction[0]['idFaction'];
    }
    protected function getMiniatureOfOneFaction ($idFaction, $valid) {
        $select  = "SELECT `id`, `idAuthor`, `idFaction`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, 
        `miniatureSize`, `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `valid`, `stick` 
        FROM `miniatures` 
        WHERE `idFaction`= :idFaction AND `valid` = :valid AND `idAuthor` = :idUser AND `stick` < 2
        ORDER BY `nameMiniature`, `price`;";
      
        $param = [['prep'=>':idFaction', 'variable'=>$idFaction], 
        ['prep'=>':valid', 'variable'=>$valid], 
        ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getMiniatureOfOneFactionInService ($idFaction, $valid) {
        $select  = "SELECT `id`, `idAuthor`, `idFaction`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, 
        `miniatureSize`, `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `valid`, `stick` 
        FROM `miniatures` 
        WHERE `idFaction`= :idFaction AND `valid` = :valid AND `idAuthor` = :idUser AND `stick` = 2
        ORDER BY `nameMiniature`, `price`;";
      
        $param = [['prep'=>':idFaction', 'variable'=>$idFaction], 
        ['prep'=>':valid', 'variable'=>$valid], 
        ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        return ActionDB::select($select, $param, 1);
    }
    public function solveMiniaturePrice ($data) {
    $result = 0;
    /* Solve move */
    $valueMove = 0;
    if($data['moving'] > 0 ) {
        $valueMove = log($data['moving']);
        $fligth = $this->boolYes ($data['fligt']);
        $stationnaryFligth = $this->boolYes ($data['stationnaryFligt']);
        $valueMove = $valueMove * $fligth * $stationnaryFligth;
    } else {
        $valueMove = 1;
    }

    /* Solve move */
    $valueDQM = $this->getDiceValue ($data['dqm']);
    $valueDC = $this->getDiceValue ($data['dc']);
    $valueHealtPoint = $this->getHealtPointValue ($data['healtPoint']);
    $valueTypeTroupe = $this->getTypesTroupe ($data['typeTroop']);
    $valueMiniatureSize = $this->getMiniatureSize ($data['typeTroop']);
    $coefArmor = $this->getArmour ($data['armor']);
    $result = ($valueMove * ($valueDQM  + ($valueDC * 2.2) + $valueHealtPoint + $valueTypeTroupe + $valueMiniatureSize)) * $coefArmor;
     return $result;   
    }
    public function creatMiniaturesByUser($param) {
       $sqlMiniatures = "INSERT INTO `miniatures`( idFaction, nameMiniature, moving, dqm, dc, healtPoint, armor, typeTroop, miniatureSize, fligt, stationnaryFligt, price, namePicture, idAuthor) 
        VALUES (:idFaction, :nameMiniature, :moving, :dqm, :dc, :healtPoint, :armor, :typeTroop, :miniatureSize, :fligt, :stationnaryFligt, :price, :pictureName, :idUser);";
        ActionDB::access($sqlMiniatures, $param, 1);
    }
    public function checkOwnerMiniature($idMiniature) {
        $param = [['prep'=>':id', 'variable'=>$idMiniature], 
                    ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        $select = "SELECT COUNT(`id`) AS `nbrMiniature` FROM `miniatures` WHERE `idAuthor` = :idUser AND `id` = :id;";
        $result = ActionDB::select($select, $param, 1);
        if($result[0]['nbrMiniature'] == 1) {
            return true;
        }
        return false;
    }
    private function deleteMiniature($param) {
        $delete = "DELETE FROM `miniatures` WHERE `idAuthor` = :idUser AND `id` = :id;";
        ActionDB::access($delete, $param, 1);
        return true;
    }
    public function getNamePictureForDelete ($idMiniature) {
        $param = [['prep'=>':id', 'variable'=>$idMiniature], 
        ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        $select = "SELECT `namePicture` FROM `miniatures` WHERE `idAuthor` = :idUser AND `id` = :id;";
        $result = ActionDB::select($select, $param, 1);
        $idFaction = $this->getFactionForOneMiniature ($idMiniature);
        $this->deleteMiniature($param);
        return [$result[0]['namePicture'], $idFaction];
    }
    protected function getOneMiniature ($idMiniature, $valid, $stick) {
        $select = "SELECT `miniatures`.`id` AS `idMiniature`,`idFaction`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `miniatureSize`, `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `nomFaction`, `nameUnivers`
                    FROM `miniatures`
                    INNER JOIN `factions` ON `idFaction` = `factions`.`id`
                    INNER JOIN `univers` ON `idUnivers` = `univers`.`id`
                    WHERE  `miniatures`.`id` = :id AND  `miniatures`.`idAuthor` = :idUser AND  `miniatures`.`valid` = :valid AND `stick`=:stick;";
              $param = [['prep'=>':id', 'variable'=>$idMiniature], 
                        ['prep'=>':idUser', 'variable'=> $this->getIdUser ()],
                        ['prep'=>':valid', 'variable'=>$valid],
                        ['prep'=>':stick', 'variable'=>$stick],];   
        return ActionDB::select($select, $param, 1);
    }
    public function getOneMiniatureRow($idMiniature, $stick) {
        $select = "SELECT `idAuthor`, `idFaction`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `miniatureSize`, 
        `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `valid` 
        FROM `miniatures` WHERE `id` = :id AND `idAuthor` = :idUser  AND `stick`=:stick;";
                $param = [['prep'=>':id', 'variable'=>$idMiniature], 
                          ['prep'=>':idUser', 'variable'=> $this->getIdUser ()],
                          ['prep'=>':stick', 'variable'=>$stick],];
        return ActionDB::select($select, $param, 1);
    }
    public function updateMiniatureStatByOwner ($param) {
        $update ="UPDATE `miniatures` SET 
        `idFaction`=:idFaction,
        `nameMiniature`=:nameMiniature,
        `dc`=:dc,
        `dqm`=:dqm,
        `moving`=:moving,
        `fligt`=:fligt,
        `stationnaryFligt`=:stationnaryFligt,
        `miniatureSize`=:miniatureSize,
        `typeTroop`=:typeTroop,
        `armor`=:armor,
        `healtPoint`=:healtPoint,
        `price`=:price 
        WHERE `id`= :idMiniature AND `idAuthor` = :idUser;";
        ActionDB::access($update, $param, 1);
        return true;
    }
    public function checkMiniatureOwner($idMiniature) {
        $select = "SELECT COUNT(`id`) AS `nbrMiniature` 
        FROM `miniatures` 
        WHERE `id` = :idMiniature AND `idAuthor`=:idUser;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature], 
                ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        $nbrMiniature = ActionDB::select($select, $param, 1);
        return $nbrMiniature[0]['nbrMiniature'];

    }
    public function miniatureFix ($idMiniature) {
        $select ="SELECT `stick` FROM `miniatures` WHERE `id` = :idMiniature;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
        $stick = actionDB::select($select, $param, 1);
        return $stick[0]['stick'];
    }
    private function eraseAllStuffOfMiniature ($idMiniature) {
        $deleteStuffMinitature = "DELETE FROM `miniatureLinkWeapons` WHERE `idminiature` = :idminiature;";
        $param = [['prep'=>':idminiature', 'variable'=>$idMiniature]];
        return ActionDB::access($deleteStuffMinitature, $param, 1);
    }
    private function solveRawMiniaturePrice ($idMiniature) {
        $select = "SELECT  `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `miniatureSize`, `typeTroop`, `armor`, `healtPoint` 
                FROM `miniatures` 
                WHERE `id` = :idMiniature;";
         $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
         $rawMiniature = ActionDB::select($select, $param, 1);
         $data = $rawMiniature[0];
         return $this->solveMiniaturePrice ($data);

    }
    private function setNewPriceFixingMiniature ($idMiniature) {
            $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
            $update ="UPDATE `miniatures` SET`price`= :price WHERE `id` = :idMiniature;";
            array_push($param, ['prep'=>':price', 'variable'=>$this->solveRawMiniaturePrice ($idMiniature)]);
            ActionDB::access($update, $param, 1);
          
    }

    public function changeFixMiniature ($idMiniature) {
        $update = "UPDATE `miniatures` SET  `stick`= `stick` ^1 WHERE `id` = :idMiniature AND `idAuthor` = :idUser;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature], 
                    ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        ActionDB::access($update, $param, 1);
        $this->eraseAllStuffOfMiniature ($idMiniature);
        $this->setNewPriceFixingMiniature ($idMiniature) ;
        $this->updateMiniaturePrice ($idMiniature);
        return $this->getFactionForOneMiniature ($idMiniature);
    }
    public function outOfServicingMiniature ($idMiniature) {
        $update = "UPDATE `miniatures` SET  `stick`= 1 WHERE `id` = :idMiniature AND `idAuthor` = :idUser;
        DELETE FROM `armyListLinkMiniature` WHERE `idminiature` = :idMiniature;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature], 
                    ['prep'=>':idUser', 'variable'=> $this->getIdUser ()]];
        ActionDB::access($update, $param, 1);
        $this->eraseAllStuffOfMiniature ($idMiniature);
        $this->setNewPriceFixingMiniature ($idMiniature) ;
        $this->updateMiniaturePrice ($idMiniature);
        return $this->getFactionForOneMiniature ($idMiniature);
    }
    private function getRawPrice ($idMiniature) {
        $select= "SELECT `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `miniatureSize`, `typeTroop`, `armor`, `healtPoint` 
        FROM `miniatures` 
        WHERE `id` = :idMiniature;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
        $rawMiniature = ActionDB::select($select, $param, 1);
        return  $this->solveMiniaturePrice ($rawMiniature[0]);
    }
    private function getSpecialRulesPrice ($idMiniature) {
        $rawPrice = $this-> getRawPrice ($idMiniature);
        $select = "SELECT SUM(`price`) AS `modMiniaturePrice`
                    FROM `miniatureLinkSpecialRules`
                    INNER JOIN `specialRules` ON `idSpecialRules` = `id`
                    WHERE `idMiniature` = :idMiniature;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
        $dataModPrice = ActionDB::select($select, $param, 1);
        return round((1+ $dataModPrice[0]['modMiniaturePrice']) * $rawPrice, 3);
    }
    public function updateMiniaturePrice ($idMiniature) {
        $update = "UPDATE `miniatures` SET `price` = :NewPrice WHERE `id` = :idMiniature;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature],
                ['prep'=>':NewPrice', 'variable'=> $this->getSpecialRulesPrice($idMiniature)]];
        ActionDB::access($update, $param, 1);
    }
    private function priceMiniature ($param) {
        $selectMiniaturePrice = "SELECT `price` 
        FROM `miniatures` 
        WHERE `id` = :idMiniature AND `valid` = 1 AND `stick` = 1;";
        $price = ActionDB::select($selectMiniaturePrice , $param , 1);
        return $price[0]['price'];
    }
    private function priceWeapon ($param) {
        $selectWeaponPrice = "SELECT  `price` 
        FROM `weapons` 
        WHERE `id` = :idWeapon AND `valid` = 1 AND `fixe` = 1;";
        $price = ActionDB::select($selectWeaponPrice, $param, 1 );
        return $price[0]['price'];
    }
    private function addNewPrice ($param, $priceWeapon, $priceMiniature) {
        $newPrice = $priceWeapon * $priceMiniature;
        array_push($param, ['prep'=>':price', 'variable'=> $newPrice]);
        $updatePrice = "UPDATE `miniatures` 
        SET `price` = :price 
        WHERE `id` = :idMiniature AND `valid` = 1 AND `stick` = 1;";
        ActionDB::Access($updatePrice, $param, 1);
    }
    private function deleteNewPrice ($param, $priceWeapon, $priceMiniature) {
        $newPrice = $priceMiniature / $priceWeapon ;
        array_push($param, ['prep'=>':price', 'variable'=> $newPrice]);
        $updatePrice = "UPDATE `miniatures` 
        SET `price` = :price 
        WHERE `id` = :idMiniature AND `valid` = 1 AND `stick` = 1;";
        ActionDB::Access($updatePrice, $param, 1);
    }
    private function checkAffectedWeaponOnMiniature ($param) {
        $select = "SELECT COUNT(`idWeapon`) AS `affected` 
                    FROM `miniatureLinkWeapons` 
                    WHERE `idWeapon` = :idWeapon AND `idminiature` = :idMiniature;";
        $check = ActionDB::select($select, $param, 1);
        if($check[0]['affected'] != 0) {
            return false;
        }
        return true;
   }
    public function addWeaponOnMiniature ($param) {
        if($this->checkAffectedWeaponOnMiniature ($param)) {
            $paramMiniature =  [$param[1]];
            $paramWeapon = [$param[0]];
            $priceWeapon = $this->priceWeapon ($paramWeapon);
            $priceMiniature = $this->priceMiniature ($paramMiniature);
            $this->addNewPrice ($paramMiniature, $priceWeapon, $priceMiniature);
            $insert = "INSERT INTO `miniatureLinkWeapons`(`idWeapon`, `idminiature`) 
            VALUES (:idWeapon, :idMiniature)";
            ActionDB::Access($insert, $param, 1);
            return true;
        }
        return false;
    }
    public function substractWeaponOnMiniature ($param) {
        $paramMiniature =  [$param[1]];
        $paramWeapon = [$param[0]];
        $priceWeapon = $this->priceWeapon ($paramWeapon);
        $priceMiniature = $this->priceMiniature ($paramMiniature);
        $this->deleteNewPrice ($paramMiniature, $priceWeapon, $priceMiniature);
        $delete = "DELETE FROM `miniatureLinkWeapons` WHERE `idWeapon` = :idWeapon AND `idminiature` = :idMiniature;";
        return ActionDB::Access($delete, $param, 1);
    }
    public function goodForServiceMiniature ($param) {
        $update = "UPDATE `miniatures` SET `stick`= 2 WHERE `id` = :idMiniature ;";
        return ActionDB::Access($update, $param, 1);
    }
    public function controleMovingMiniature ($moving) {
        if(($moving >=0)&&($moving <=12)) {
            return true;
        }
        return false;
    }
    protected function getAllIdMiniatureOfFactionForArmyList ($idFaction) {
        $select = "SELECT `id`,`valid`, `stick`, `nameMiniature` 
                    FROM `miniatures` 
                    WHERE `idFaction` = :idFaction 
                    AND `valid` = 1 
                    AND `stick` = 2;";
            $param =[['prep'=>':idFaction', 'variable'=>$idFaction]];
            return ActionDB::select($select, $param, 1);
    }
    protected function getAllMiniatureOfOneList ($idList) {
        $select = "SELECT  `miniatures`.`id` AS `idMiniature`, `armyListLinkMiniature`.`id` AS `idJoinMinitureArmyList`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `armor`, `healtPoint`, `price`, `namePicture`, `nbr`, `typeTroop` 
                    FROM `armyListLinkMiniature`
                    INNER JOIN `miniatures` ON `miniatures`.`id` = `idminiature`
                    WHERE `idArmyList`= :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        return ActionDB::select($select, $param, 1);
    }
    public function numbreMiniatureCommandPoint ($idList) {
        $select = "SELECT `typeTroop` 
                    FROM `armyListLinkMiniature`
                    INNER JOIN `miniatures`ON `miniatures`.`id` = `idminiature`
                    WHERE `idArmyList` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        $dataType = ActionDB::select($select, $param, 1);
        $result = 0;
        foreach ($dataType as $value) {
           $result += $this->typesTroupe[$value['typeTroop']]['commandePoint'];
        }
        $message = ' point';
        if($result > 1) {
            $message = ' points';
        }
        return round($result, 0).$message;
    }
    public function numberOfNotAffectedMiniatureInFaction () {
        $select = "SELECT COUNT(`id`) AS `nbrMiniatures` 
        FROM `miniatures` WHERE `idFaction` NOT IN 
        ( SELECT `id` FROM `factions`) AND `idAuthor` = :idUser;";
        $checkId = new Controles ();
        $param = [['prep'=>':idUser', 'variable'=> $checkId->idUser($_SESSION)]];
 
        return ActionDB::select($select, $param, 1)[0]['nbrMiniatures'];
    }
    protected function miniatureNoFactionOnePage ($firstPage, $MiniatureByPage) {
        $select = "SELECT `id` AS `idMiniature`, `idAuthor`, `idFaction`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `miniatureSize`, `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `valid`, `stick` 
        FROM `miniatures` WHERE `idFaction` NOT IN ( SELECT `id` FROM `factions`) AND `idAuthor` = :idUser
        ORDER BY `nameMiniature`
        LIMIT {$firstPage}, {$MiniatureByPage}";
                $checkId = new Controles ();
                $param = [['prep'=>':idUser', 'variable'=> $checkId->idUser($_SESSION)]];
        return ActionDB::select ($select, $param, 1)[0];
    }
}