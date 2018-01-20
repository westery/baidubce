<?php namespace Westery\Baidubce\Facades;

use Illuminate\Support\Facades\Facade;

class BceApiFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'BceApi';
    }

}
