<?php
final class SQLvehicles 
{
    protected $dice ;
    protected $armour;
    protected $structurePoint;
    protected $sizeVehicle;
    protected $typeVehicle;
    protected $yes;
    public function __construct () {
        $this->dice = [['id'=>1, 'valueDice'=> 2, 'nameDice'=> 'D6'],
        ['id'=>2, 'valueDice'=> 4, 'nameDice'=> 'D8'],
        ['id'=>3, 'valueDice'=> 6, 'nameDice'=> 'D10'],
        ['id'=>4, 'valueDice'=> 8, 'nameDice'=> 'D12']];
        $this->armour = [['id'=>1, 'valueArmour' => 0.8, 'nameArmour'=> 'No armour'],
        ['id'=>2, 'valueArmour' => 1.15, 'nameArmour'=> '6+'],
        ['id'=>3, 'valueArmour' => 1.40, 'nameArmour'=> '5+'],
        ['id'=>4, 'valueArmour' => 1.50, 'nameArmour'=> '4+'],
        ['id'=>5, 'valueArmour' => 1.70, 'nameArmour'=> '3+'],
        ['id'=>6, 'valueArmour' => 2, 'nameArmour'=> '2+'],];
        $this->structurePoint = [['id'=>1, 'valueStructurePoint'=>1, 'StructurePoint'=> 1],
        ['id'=>2, 'valueStructurePoint'=>2, 'healtPoint'=> 2],
        ['id'=>3, 'valueStructurePoint'=>4, 'healtPoint'=> 4],
        ['id'=>4, 'valueStructurePoint'=>6, 'healtPoint'=> 6],
        ['id'=>5, 'valueStructurePoint'=>8, 'healtPoint'=> 8],
        ['id'=>6, 'valueStructurePoint'=>10, 'healtPoint'=> 10],
        ['id'=>7, 'valueStructurePoint'=>12, 'healtPoint'=> 12],
        ['id'=>8, 'valueStructurePoint'=>16, 'healtPoint'=> 16],
        ['id'=>9, 'valueStructurePoint'=>18, 'healtPoint'=> 18],
        ['id'=>10, 'valueStructurePoint'=>20, 'healtPoint'=> 20],];
        $this->sizeVehicle = [['id'=>1, 'valueSize'=> 2, 'NameSize'=>'Small vehicle'],
        ['id'=>2, 'valueSize'=> 2.5, 'NameSize'=>'Standard'],
        ['id'=>3, 'valueSize'=> 4, 'NameSize'=>'Large miniature'],
        ['id'=>4, 'valueSize'=> 3, 'NameSize'=>'Giant']];;
    }
}
