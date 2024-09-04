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
        $this->dice = [['id'=>1, 'valueDice'=> 2, 'nameDice'=> 'D6'],
        ['id'=>2, 'valueDice'=> 4, 'nameDice'=> 'D8'],
        ['id'=>3, 'valueDice'=> 6, 'nameDice'=> 'D10'],
        ['id'=>4, 'valueDice'=> 8, 'nameDice'=> 'D12']];
        $this->armour = [['id'=>1, 'valueArmour' => 0.5, 'nameArmour'=> '-'],
        ['id'=>2, 'valueArmour' => 1, 'nameArmour'=> '9+'],
        ['id'=>3, 'valueArmour' => 1.30, 'nameArmour'=> '8+'],
        ['id'=>4, 'valueArmour' => 1.40, 'nameArmour'=> '7+'],
        ['id'=>5, 'valueArmour' => 1.50, 'nameArmour'=> '6+'],
        ['id'=>6, 'valueArmour' => 1.60, 'nameArmour'=> '5+'],
        ['id'=>7, 'valueArmour' => 1.70, 'nameArmour'=> '4+'],
        ['id'=>8, 'valueArmour' => 1.80, 'nameArmour'=> '3+'],];
        $this->healtPoint = [['id'=>1, 'valueHealtPoint'=>1, 'healtPoint'=> 1],
        ['id'=>2, 'valueHealtPoint'=>2, 'healtPoint'=> 2],
        ['id'=>3, 'valueHealtPoint'=> 4, 'healtPoint'=> 3],
        ['id'=>4, 'valueHealtPoint'=> 8, 'healtPoint'=> 4],
        ['id'=>5, 'valueHealtPoint'=> 16, 'healtPoint'=> 5],
        ['id'=>6, 'valueHealtPoint'=> 32, 'healtPoint'=> 6],];
        $this->typesTroupe = [['id'=>1, 'valueTypeTroupe'=>1, 'nameTroupe'=>'Civilian', 'commandePoint'=>0.10],
        ['id'=>2, 'valueTypeTroupe'=>4, 'nameTroupe'=>'Conscript soldier', 'commandePoint'=>0.4],
        ['id'=>3, 'valueTypeTroupe'=>6, 'nameTroupe'=>'Regular soldier', 'commandePoint'=>0.6],
        ['id'=>4, 'valueTypeTroupe'=>12, 'nameTroupe'=>'Elite soldier', 'commandePoint'=>1.2],
        ['id'=>5, 'valueTypeTroupe'=>14, 'nameTroupe'=>'Veteran soldier', 'commandePoint'=>1.4],
        ['id'=>6, 'valueTypeTroupe'=>10, 'nameTroupe'=>'Officer', 'commandePoint'=>2],
        ['id'=>7, 'valueTypeTroupe'=>12, 'nameTroupe'=>'Executive officer', 'commandePoint'=>2.4],];
        $this->miniatureSize = [['id'=>1, 'valueSize'=> 2, 'NameSize'=>'Small miniatures'],
        ['id'=>2, 'valueSize'=> 2.5, 'NameSize'=>'Standard'],
        ['id'=>3, 'valueSize'=> 4, 'NameSize'=>'Large miniature'],
        ['id'=>4, 'valueSize'=> 3, 'NameSize'=>'Giant']];
        $this->yes = [['id'=>1, 'name'=> 'No'], ['id'=>2, 'name'=>'Yes']];
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
    public function solveMiniaturePrice ($data) {
    $result = 0;
    /* Solve move */
    $valueMove = 0;
    if($data['move'] > 0 ) {
        $valueMove = log($data['move']);
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
}
