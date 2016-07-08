<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [
        'main' => [
            'salt' => 'b82e5f962c6f39b2',
            'length' => 8,
            'alphabet' => 'jTDXk9AOq35fWCIRH0ErMdopzaYPwK2xSu8ULBytbl1VJZg76mveFi4nGscQhN',
        ],
        'user' => [
            'salt' => 'c79ff6375451f78f',
            'length' => 6,
            'alphabet' => 'lD3MCqcZeknYjaUmAvyi9QXIx2G4E70Js5Nrh6SpoLPwOVdzgbH8F1KTRBtuWf',
        ],
        'information' => [
            'salt' => 'a8d6d5384f5ec622',
            'length' => 8,
            'alphabet' => '9BT7Hve1yYgSiwnasPqWhuAoZlR2mCrdbFfV3OkJ5GQzMIjXKUx0DcLp6Et4N8',
        ]
    ],





];
