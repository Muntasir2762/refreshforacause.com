<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HelperTrait
{
    protected function removeSpeicalCharacters(string $text): string
    {
        $cleanedString = preg_replace('/[^A-Za-z0-9]/', '', $text);
        return $cleanedString;
    }

    protected function generateFileName(string $name, string $ext, string $casing = 'lw'): string
    {
        $generatedName = $this->removeSpeicalCharacters($name) . '-' . date('YmdHis') . '-' . mt_rand(100000, 999999);
        if ($casing === 'up') {
            $generatedName = strtoupper($generatedName);
        } else {
            $generatedName = strtolower($generatedName);
        }
        $generatedName = $generatedName . '.' . strtolower($ext);
        return $generatedName;
    }

    protected function generateUniqueCode(): string
    {
        $code = '';
        $uuid = Str::replace('-', '', Str::uuid());
        $base64 =  Str::replace('=', '', base64_encode(mt_rand(10000000, 99999999)));
        $code = mt_rand(100000000, 999999999) . $uuid . date('yBmUdisH') . $base64;

        return $code;
    }
}
