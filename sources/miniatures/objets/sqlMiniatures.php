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
        $this->dice = [['id'=>'0', 'valueDice'=> 6, 'nameDice'=> 'D6'],
        ['id'=>'1', 'valueDice'=> 8, 'nameDice'=> 'D8'],
        ['id'=>'2', 'valueDice'=> 10, 'nameDice'=> 'D10'],
        ['id'=>'3', 'valueDice'=> 12, 'nameDice'=> 'D12']];
        $this->armour = [['id'=>0, 'valueArmour' => 0.5, 'nameArmour'=> '-'],
        ['id'=>1, 'valueArmour' => 1, 'nameArmour'=> '9+'],
        ['id'=>2, 'valueArmour' => 1.30, 'nameArmour'=> '8+'],
        ['id'=>3, 'valueArmour' => 1.40, 'nameArmour'=> '7+'],
        ['id'=>4, 'valueArmour' => 1.50, 'nameArmour'=> '6+'],
        ['id'=>5, 'valueArmour' => 1.60, 'nameArmour'=> '5+'],
        ['id'=>6, 'valueArmour' => 1.70, 'nameArmour'=> '4+'],
        ['id'=>7, 'valueArmour' => 1.80, 'nameArmour'=> '3+'],];
        $this->healtPoint = [['id'=>0, 'valueHealtPoint'=>1, 'healtPoint'=> 1],
        ['id'=>1, 'valueHealtPoint'=>2, 'healtPoint'=> 2],
        ['id'=>2, 'valueHealtPoint'=> 4, 'healtPoint'=> 3],
        ['id'=>3, 'valueHealtPoint'=> 8, 'healtPoint'=> 4],
        ['id'=>4, 'valueHealtPoint'=> 16, 'healtPoint'=> 5],
        ['id'=>5, 'valueHealtPoint'=> 32, 'healtPoint'=> 6],];
        $this->typesTroupe = [['id'=>0, 'valueTypeTroupe'=>0.5, 'nameTroupe'=>'Civilian', 'commandePoint'=>0.25],
        ['id'=>1, 'valueTypeTroupe'=>1, 'nameTroupe'=>'Conscript soldier', 'commandePoint'=>0.5],
        ['id'=>2, 'valueTypeTroupe'=>2, 'nameTroupe'=>'Regular soldier', 'commandePoint'=>0.75],
        ['id'=>3, 'valueTypeTroupe'=>4, 'nameTroupe'=>'Elite soldier', 'commandePoint'=>1],
        ['id'=>4, 'valueTypeTroupe'=>4.25, 'nameTroupe'=>'Veteran soldier', 'commandePoint'=>1.25],
        ['id'=>5, 'valueTypeTroupe'=>6, 'nameTroupe'=>'Officer', 'commandePoint'=>2],
        ['id'=>6, 'valueTypeTroupe'=>10, 'nameTroupe'=>'Executive officer', 'commandePoint'=>4],];
        $this->miniatureSize = [['id'=>0, 'valueSize'=> 2, 'NameSize'=>'Small miniatures'],
        ['id'=>1, 'valueSize'=> 2.5, 'NameSize'=>'Standard'],
        ['id'=>2, 'valueSize'=> 4, 'NameSize'=>'Large miniature'],
        ['id'=>3, 'valueSize'=> 3, 'NameSize'=>'Giant']];
        $this->yes = [['id'=>0, 'name'=> 'No'], ['id'=>1, 'name'=>'Yes']];
    }
    public function solveMiniaturePrice () {
        
    }
}
