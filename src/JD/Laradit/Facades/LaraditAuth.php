<?php namespace JD\Laradit\Facades;

use Illuminate\Support\Facades\Facade;

class LaraditAuth extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'jd.laradit.auth'; }
}
