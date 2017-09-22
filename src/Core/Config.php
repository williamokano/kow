<?php
namespace Katapoka\Kow\Core;

use DirectoryIterator;

class Config
{
    /** @var array */
    private $data = [];

    public function __construct()
    {
        $iterator = new DirectoryIterator(AUTO_CONFIG_PATH);
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isDot() || $fileInfo->isDir()) {
                continue;
            }

            [$pathname, $filename] = $this->getPathAndFileName($fileInfo);

            $this->data[$filename] = require $pathname;
        }
    }

    private function getPathAndFileName(\SplFileInfo $fileInfo)
    {
        return [$fileInfo->getPathname(), trim($fileInfo->getFilename(), '.php')];
    }

    /**
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $parts = explode('.', $key);

        $pointer = &$this->data;
        while($part = array_shift($parts)) {
            if (!array_key_exists($part, $pointer)) {
                return $default;
            }

            $pointer = &$pointer[$part];
        }

        return $pointer;
    }
}
