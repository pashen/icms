<?php
/******************************************************************************/
//                                                                            //
//                             InstantCMS v1.9                                //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2011                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

class cmsPlugin {

    var $inDB;
    var $inCore;
    var $inPage;

    public $info;
    public $events;
    public $config;

// ================================================================== //

    public function __construct(){

        $this->inCore   = cmsCore::getInstance();
        $this->inDB     = cmsDatabase::getInstance();
        $this->inPage   = cmsPage::getInstance();
        
    }

    public function __clone() {}

// ================================================================== //

    public function install() {

        return $this->inCore->installPlugin($this->info, $this->events, $this->config);

    }
    
// ================================================================== //

    public function upgrade() {

        return $this->inCore->upgradePlugin($this->info, $this->events, $this->config);

    }
    
// ================================================================== //

    public function execute() {

        $this->config = $this->inCore->loadPluginConfig( $this->info['plugin'] );

    }

// ================================================================== //

    public function saveConfig() {
        
        $this->inCore->savePluginConfig( $this->info['plugin'], $this->config );
        
    }

// ================================================================== //

}

?>