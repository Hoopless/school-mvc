<?php

/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class ValidationLogic
{
    public function validate($data, $expected_values)
    {
        // Check if they have been set
        $results['success'] = true;
        foreach ($expected_values as $value) {
            if (! isset($data[$value])) {
                $results['success']         = false;
                $results['errors'][$value] = "De waarde {$value} is neit gezet, neem contact op met een developer!";
            }
        }

        // If there is an error already you can go back...
        if (! $results['success']) {
            return $results;
        }

        // Check if they are empty
        foreach ($expected_values as $value) {
            if (empty($data[$value])) {
                $results['success']         = false;
                $results['errors'][$value] = "De waarde is leeg";
            }
        }

        // If there is an error already you can go back...
        if (! $results['success']) {
            return $results;
        }

        //Check if they have the correct field
        foreach ($data as $key => $value) {

            if ($key === "email") {
                $result = filter_var($data, FILTER_VALIDATE_EMAIL);
                if (! $result){
                    $results['errors'][$key] = "Voer een geldig e-mail adres in";
                }
            }

        }

        return $results;
    }
}