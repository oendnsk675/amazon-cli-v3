<?php

namespace BrentKozjak\HashIdentify;

use Jenssegers\Model\Model;

class HashMode extends Model
{
    protected $casts = [
        'name' => 'string',
        'hashcat' => 'integer',
        'john' => 'string',
        'extended' => 'boolean',
    ];
}
