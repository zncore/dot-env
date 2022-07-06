<?php

namespace ZnCore\DotEnv\Domain\Libs;

use Symfony\Component\Dotenv\Dotenv;
use ZnCore\Base\Arr\Helpers\ArrayHelper;

class DotEnvLoader
{

    public function loadFromFile(string $path, string $key = null, $default = null): array
    {
        $dotEnv = new Dotenv();
        $content = file_get_contents($path);
        $parsedEnv = $dotEnv->parse($content, $path);
        if ($key) {
            return ArrayHelper::get($parsedEnv, $key, $default);
        }
        return $parsedEnv;
    }
}
