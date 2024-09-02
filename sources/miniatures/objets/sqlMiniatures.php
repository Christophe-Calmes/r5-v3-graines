<?php
class sqlMiniatures 
{
    protected $dice ;
    protected $armour;
    protected $healtPoint;
    public function __construct () {
        $this->dice = [['id'=>'0', 'valueDice'=> 6, 'nameDice'=> 'D6'],
        ['id'=>'1', 'valueDice'=> 8, 'nameDice'=> 'D8'],
        ['id'=>'2', 'valueDice'=> 10, 'nameDice'=> 'D10'],
        ['id'=>'3', 'valueDice'=> 12, 'nameDice'=> 'D12']];
        $this->armour = [['id'=>0, 'valueArmour' => 1, 'nameArmour'=> '-'],
        ['id'=>1, 'valueArmour' => 1.16, 'nameArmour'=> '6+'],
        ['id'=>2, 'valueArmour' => 1.34, 'nameArmour'=> '5+'],
        ['id'=>3, 'valueArmour' => 1.5, 'nameArmour'=> '4+'],
        ['id'=>4, 'valueArmour' => 1.68, 'nameArmour'=> '3+']];
        $this->healtPoint = [['id'=>0, 'valueHealtPoint'=>1, 'healtPoint'=> 1],
        ['id'=>1, 'valueHealtPoint'=>2, 'healtPoint'=> 2],
        ['id'=>2, 'valueHealtPoint'=> 4, 'healtPoint'=> 3],
        ['id'=>3, 'valueHealtPoint'=> 8, 'healtPoint'=> 4],
        ['id'=>4, 'valueHealtPoint'=> 16, 'healtPoint'=> 5],
        ['id'=>5, 'valueHealtPoint'=> 32, 'healtPoint'=> 6],];
    }
}
