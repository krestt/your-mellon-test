<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleTextMail;

class TasksController extends Controller
{
    // 1
    function one(){
        $lines=[];
        for($i=1; $i<900900; $i++){
            if( $i > (900900 / $i) ){
                continue;
            }
            array_push($lines,'<br>'. (900900/$i)*$i .' = '. $i .' * '. 900900/$i );
        }
        return view('task1_1',compact('lines'));
    }


    // 1.2
    function one_two(){
        return view('task1_2');
    }
    function one_two_submit(Request $request){
        $number   = $request->number;
        $result   = "Enter any number";
        $devisors = [];
        $sum=0;

        // deficient,perfect or abundunt check
        for($i=1; $i < $number; $i++) { 
            // get devisors
            $remaining = $number % $i;
            if($remaining==0){
                array_push($devisors,$i);
                $sum+=$i;
            }
        }

        if($sum < $number){
            $result = "Number ".$number." is deficient.";
        }
        if($sum == $number){
            $result = "Number ".$number." is perfect.";
        }
        if($sum > $number){
            $result = "Number ".$number." is abundunt.";
        }

        return view('task1_2',compact(['result','devisors','sum']));
    }


    // 1.3
    function one_three(){
        return view('task1_3');
    }
    function one_three_submit(Request $request){
        $number   = $request->number;
        $result   = "Enter any number";
        $devisors = [];
        $sum=0;
        $division=0;

        $numberString = (string)$number;
        $digits       = str_split($numberString);

        // Harshad base-10 Check
        foreach ($digits as $key => $value) {
            $sum+=$value;
        }

        if( ($number % $sum) == 0  ){
            $result = "Number ".$number." is Harshad base-10.";
        }else{
            $result = "Number ".$number." is NOT Harshad base-10.";
        }

        $division=$number.' / '.$sum.' = '.($number/$sum);
        return view('task1_3',compact(['result','digits','sum','division']));
    }
}
