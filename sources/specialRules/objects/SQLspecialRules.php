<?php
 class SQLspecialRules
{
    protected $specialRulesType;
    protected $priceSpecialRules;
    public function __construct () {
        $this->specialRulesType = ['Weapon', 'Miniature', 'Vehicle', 'Army list'];
        $this->priceSpecialRules = [['level'=>'Neutral', 'price'=>1.05],
                                    ['level'=>'Basic', 'price'=>1.1],
                                    ['level'=>'Classic', 'price'=>1.15],
                                    ['level'=>'Advantage', 'price'=>1.2],
                                    ['level'=>'Powerfull', 'price'=>1.5],
                                    ['level'=>'Very powerfull', 'price'=>1.75],
                                    ['level'=>'Magical technology', 'price'=>2],];

    }
    
}
