<?php

function convertCurrency($amount)
{

    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(0 => '', 1 => '1', 2 => '2',
        3 => '3', 4 => '4', 5 => '5', 6 => '6',
        7 => '7', 8 => '8', 9 => '9',
        10 => '10', 11 => '11', 12 => '12',
        13 => '13', 14 => '14', 15 => '15',
        16 => '16', 17 => '17', 18 => '18',
         30 => '30',
         19 => '19', 20 => '20', 21 => '21',
22 => '22', 23 => '23', 24 => '24',
25 => '25', 26 => '26', 27 => '27',
28 => '28', 29 => '29', 30 => '30',

31 => '31', 32 => '32', 33 => '33',
34 => '34', 35 => '35', 36 => '36',
37 => '37', 38 => '38', 39 => '39',

41 => '41', 42 => '42', 43 => '43',
44 => '44', 45 => '45', 46 => '46',
47 => '47', 48 => '48', 49 => '49',

51 => '51', 52 => '52', 53 => '53',
54 => '54', 55 => '55', 56 => '56',
57 => '57', 58 => '58', 59 => '59',

61 => '61', 62 => '62', 63 => '63',
64 => '64', 65 => '65', 66 => '66',
67 => '67', 68 => '68', 69 => '69',

71 => '71', 72 => '72', 73 => '73',
74 => '74', 75 => '75', 76 => '76',
77 => '77', 78 => '78', 79 => '79',

81 => '81', 82 => '82', 83 => '83',
84 => '84', 85 => '85', 86 => '86',
87 => '87', 88 => '88', 89 => '89',

91 => '91', 92 => '92', 93 => '93',
94 => '94', 95 => '95', 96 => '96',
97 => '97', 98 => '98', 99 => '99',
        40 => '40', 50 => '50', 60 => '60',
        70 => '70', 80 => '80', 90 => '90');
    $here_digits = array('', 'Hundred', 'Hazar', 'Lakh', 'Crore' , 'Arab');
    while ($x < $count_length) {
        $get_divider = ($x == 2) ? 10 : 100;
        $amount = floor($num % $get_divider);
        $num = floor($num / $get_divider);
        $x += $get_divider == 10 ? 1 : 2;
        if ($amount) {
            $add_plural = (($counter = count($string)) && $amount > 9) ? '' : null;
            $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
            $string[] = ($amount < 100) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . '
     ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . '
     ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
        } else {
            $string[] = null;
        }

    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
" . $change_words[$amount_after_decimal % 10]) . '' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . '' : '') . $get_paise;
//     $Arraycheck = array("4"=>"K","5"=>"K","6"=>"Lakh","7"=>"Lakh","8"=>"Crore","9"=>"Crore");
//     // define decimal values
//     $numberLength = strlen($amount); //count the length of numbers
//     if ($numberLength > 3) {
//        foreach ($Arraycheck as $Lengthnum=>$unitval) {
//            if ($numberLength == $Lengthnum) {
//               if ($Lengthnum % 2 == 0) {
//                  $RanNumber = substr($amount,1,2);
//                  $NmckGtZer = ($RanNumber[0]+$RanNumber[1]);
//                  if ($NmckGtZer < 1) {
//                      $RanNumber = "0";
//                  } else {
//                     if ($RanNumber[1] == 0) {
//                        $RanNumber[1] = "0";
//                  }
//             }
//      $amount = substr($amount,0,$numberLength-$Lengthnum+1) . "." . $RanNumber . " $unitval ";
//    } else {
//         $RanNumber = substr($amount,2,2);
//         $NmckGtZer = ($RanNumber[0]+$RanNumber[1]);
//         if ($NmckGtZer < 1) {
//            $RanNumber  = 0;
//        } else {
//            if ($RanNumber[1] == 0)  {
//                $RanNumber[1] = "0";
//            }
//        }
//         $amount = substr($amount,0,$numberLength-$Lengthnum+2) . ".". $RanNumber . " $unitval";
//       }
//     }
// }
// } else {
//     $amount . "Rs";
// }
// return $amount;

    //return number_format($number);
    // Convert Price to Crores or Lakhs or Thousands
    // $length = strlen($number);
    // $currency = '';

    // if($length == 4 || $length == 5)
    // {
    //     // Thousand
    //     $number = $number / 1000;
    //     $number = round($number,2);
    //     $ext = "Thousand";
    //     $currency = $number." ".$ext;
    // }
    // elseif($length == 6 || $length == 7)
    // {
    //     // Lakhs
    //     $number = $number / 100000;
    //     $number = round($number,2);
    //     $ext = "Lakh";
    //     $currency = $number." ".$ext;

    // }
    // elseif($length == 8 || $length == 9)
    // {
    //     // Crores
    //     $number = $number / 10000000;
    //     $number = round($number,2);
    //     $ext = "Crore";
    //     $currency = $number.' '.$ext;
    // }

    // return $currency;
}