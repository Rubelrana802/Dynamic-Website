<?php

namespace App\Helpers;

use App\Models\Settings\Unit;

class Converter
{
    public static function separator ($data) {
        return explode('/', $data);
    }

    public static function convert($input, $standard, $format = 'u') {
        // output
        $output = [
            'input' => $input,
        ];

        // get unit details
        $unit = Unit::where('id', $standard)->first();
        $relations = self::separator($unit->relations);
        $labels = self::separator($unit->labels);
        $last = count($labels) - 1;

        $output['unit'] = $unit->name;
        $output['labels'] = $labels;
        $output['labelsInLine'] = $unit->labels;
        $output['relations'] = $unit->relations;

        // for single unit case
        if($format == 'u') {
            // get quantity details
            $quantities = self::separator($input);
            $record = [];

            foreach ($quantities as $key => $amount) {
                $total = intval($amount);

                for($index = $key + 1; $index <= $last; $index++) {
                    $total *= $relations[$index];
                }

                $record[] = $total;
            }

            $output['result'] = array_sum($record);
            $output['resultWithUnit'] = array_sum($record) . ' ' . $labels[$last];
            $output['display'] = array_sum($record) . ' ' . $labels[$last];
        }

        // for display case
        if($format == 'd') {
            $record = [];

            for($index = $last; $index >= 0; $index--) {
                $divisor  = intval($relations[$index]);

                $remainder = $input % $divisor; // dividend is equal to input
                $input = ($input - $remainder) / $divisor; // quotient is equal to input

                if($index == 0) {
                    $record[] = $input;
                    $recordWithUnit[] = $input . ' ' . $labels[$index];
                } else {
                    $record[] = $remainder;
                    $recordWithUnit[] = $remainder . ' ' . $labels[$index];
                }
            }

            $output['result'] = array_reverse($record);
            $output['resultWithUnit'] = array_reverse($recordWithUnit);
            $output['display'] = join(' ', array_reverse($recordWithUnit));
        }

        return $output;
    }
}
