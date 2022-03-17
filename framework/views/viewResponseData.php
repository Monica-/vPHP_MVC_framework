<?php

namespace framework\views;

class viewResponseData
{
    private static array $data = [];

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function addData(string $key, mixed $value): void
    {
        self::$data[$key] = $value;
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public static function getData(?string $key = null): mixed
    {
        if ($key) {
            if (array_key_exists($key, self::$data)) {
                return self::$data[$key];
            }
            return null;
        }
        return self::$data;
    }
}