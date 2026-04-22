<?php
namespace SeaDrip\Tools;

abstract class ArrayExt
{
    public static function pickKey(array $origin, array $keys): array
    {
        $mask = array_combine($keys, array_pad([], count( $keys ), 0));
        return array_intersect_key($origin, $mask);
    }

    public static function toMap(array $origin, string $key_column): array
    {
        return array_combine(array_column($origin, $key_column), $origin);
    }

    public static function toFile(array $content, Path|string $save_to): bool
    {
        if (!is_writable(dirname($save_to))) {
            return false;
        }
        $str = '<?php'.PHP_EOL.'return '.self::itemToStringRecursive($content).';';
        return file_put_contents($save_to, $str);
    }

    private static function itemToStringRecursive(array $arr, int $tabSpace = 0): string
    {
        $lines = ['['];
        $prefix_space = str_repeat(' ', $tabSpace + 4);
        foreach ($arr as $key => $val) {
            $val_str = match(gettype($val)) {
                'array' => self::itemToStringRecursive($val, $tabSpace + 4),
                'string' => "'{$val}'",
                //  TODO: other types, e.g. object/class
                'object' => throw new \Exception('only simple array supported'),
                default => $val
            };
            $lines[] = "{$prefix_space}'{$key}' => {$val_str},";
        }
        $lines[] = str_repeat(' ', $tabSpace).']';
        return implode(PHP_EOL, $lines);
    }
}

