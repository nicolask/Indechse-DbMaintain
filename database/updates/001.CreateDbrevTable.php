<?php

class Update_CreateDbrevTable extends Indechse_Maintain_Update_Abstract
{

    public function update()
    {
        if ($this->isPgSQL()) {
            $sql = '
                CREATE TABLE "dbrev" (
                    "id" serial NOT NULL,
                    "revision" varchar(32) NOT NULL,
                    "updated" timestamp NOT NULL DEFAULT NOW(),
                    "updatename" VARCHAR(100) NOT NULL,
                    PRIMARY KEY ("id"),
                    UNIQUE ("revision", "updatename")
                );
            ';
        } else if ($this->isMySQL()) {
            $sql = '
                CREATE TABLE `dbrev` (
                    `id` int(11) NOT NULL auto_increment,
                    `revision` varchar(32) NOT NULL,
                    `updated` datetime NOT NULL DEFAULT NOW(),
                    `updatename` VARCHAR(100) NOT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE (`revision`, `updatename`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
                ';
        }
        return $this->_getDbCOnn()->exec($sql);
    }

}
