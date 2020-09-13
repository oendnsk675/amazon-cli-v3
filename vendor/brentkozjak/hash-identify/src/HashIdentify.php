<?php

namespace BrentKozjak\HashIdentify;

use Illuminate\Contracts\Support\Arrayable;

class HashIdentify
{
    /**
     * The hash algorithms and associated regular expressions
     * @var array
     */
    private $hashLibrary;

    public function __construct()
    {
        $this->hashLibrary = HashLibrary::all();
    }

    /**
     * Parse the string
     *
     * @param string $string String to identify
     *
     * @return self
     */
    public function parse($string)
    {
        $hashModes = [];

        foreach($this->hashLibrary as $hash){
            if(preg_match('/'.$hash['regex'].'/i', $string)) {
                foreach($hash['modes'] as $mode) {
                    $hashModes[] = new HashMode([
                        'name' => $mode['name'],
                        'hashcat' => $mode['hashcat'],
                        'john' => $mode['john'],
                        'extended' => $mode['extended'],
                    ]);
                }
            }
        }

        $this->modes = $hashModes;
        return $this;
    }

    /**
     * Get the hash mode(s) as a native array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($value) {
            return $value instanceof Arrayable ? $value->toArray() : $value;
        }, $this->modes);
    }

    /**
     * Get the hash mode(s) as JSON.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
