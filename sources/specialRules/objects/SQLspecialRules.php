<?php
 class SQLspecialRules
{
    protected $specialRulesType;
    protected $priceSpecialRules;
    protected $yes;
    public function __construct () {
        $this->specialRulesType = ['Weapon', 'Miniature', 'Vehicle', 'Army list'];
        $this->priceSpecialRules = [['level'=>'Neutral', 'price'=>1.05],
                                    ['level'=>'Basic', 'price'=>1.1],
                                    ['level'=>'Classic', 'price'=>1.15],
                                    ['level'=>'Advantage', 'price'=>1.2],
                                    ['level'=>'Powerfull', 'price'=>1.5],
                                    ['level'=>'Very powerfull', 'price'=>1.75],
                                    ['level'=>'Magical technology', 'price'=>2],];
        $this->yes = ['No', 'Yes'];

    }
    public function checkTypeRule ($indexTypeRule) {
        return array_key_exists($indexTypeRule, $this->specialRulesType);
    }
    public function checkPriceRule ($indexPriceRule) {
        return isset($this->priceSpecialRules[$indexPriceRule]);
    }
    public function priceTransformation ($indexPrice) {
        return $this->priceSpecialRules[$indexPrice]['price'];
    }
    public function insertNewSP ($param) {
        $insert = "INSERT INTO `specialRules`(`typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`) 
        VALUES (:typeSpecialRules, :nameSpecialRules, :descriptionSpecialRules, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function numberOfRS ($typeRS) {
        $select = "SELECT COUNT(`id`) AS nbrSR 
        FROM `specialRules` 
        WHERE `typeSpecialRules` = :typeSpecialRules AND `valid` = 1;";
        $param = [['prep'=>':typeSpecialRules', 'variable'=>$typeRS]];
        $data = ActionDB::select($select, $param, 1);
        return $data[0]['nbrSR'];
    }
    protected function getRS ($firstPage,  $RSbyPage, $typeRS) {
        $select = "SELECT `id`, `nameSpecialRules`, `price` FROM `specialRules`
        WHERE `typeSpecialRules` = :typeSpecialRules AND `valid` = 1 
        ORDER BY `nameSpecialRules` LIMIT  {$firstPage}, {$RSbyPage}"; 
        $param = [['prep'=>':typeSpecialRules', 'variable'=>$typeRS]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getOneRS ($idRS) {
        $select = "SELECT `id`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid` 
        FROM `specialRules` 
        WHERE `id` = :id;";
        $param = [['prep'=>':id', 'variable'=>$idRS]];
        return ActionDB::select($select, $param, 1);
    }

}
