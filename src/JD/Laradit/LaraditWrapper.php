<?php namespace JD\Laradit;

use Illuminate\Config\Repository;

class LaraditWrapper {
    /**
     * Create a new Laradit Wrapper instance
     *
     * @param  \Illuminate\Config\Repository $config
     * @return void
     */
    public function __construct(Repository $config)
    {
       dd('lol');
    }
}
