<?php
class SQLWeapons 
{
    protected $weaponTypes;
    protected $gabaritTypes;
    protected $powerType;
    protected $yes;
    public function __construct () {
        $this->weaponTypes = ['Contact', 'Shoot', 'Explosive'];
        $this->gabaritType = ['small', 'medium', 'big', 'Blast'];
        $this->powerType = ['1D', '2D', '3D', '4D', '5D', '6D'];
    }
}
