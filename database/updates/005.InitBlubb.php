<?php
class Update_InitBlubb extends Indechse_Maintain_Update_Abstract
{
    
    public function update()
    {
        $this->_getDbCOnn()->exec("INSERT INTO blubb (fiep) VALUES ('mamemimu')");
    }
}