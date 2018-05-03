<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;



class PDFController extends Controller
{

    public function comments(){
        return view('results.commentsPDF');
    }

    public  function commentsPDF(){
        $pdf = PDF::loadView('results.commentsPDF');
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('comments.pdf');
    }

    public function awards(){
        $pageArray = app('App\Http\Controllers\AdminResultsController')->getResults();
        return view('admin.awards_listPDF', $pageArray);
    }

    public  function awardsPDF(){
        $pageArray = app('App\Http\Controllers\AdminResultsController')->getResults();
        $pdf = PDF::loadView('admin.awards_listPDF', $pageArray );
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('awards.pdf');
    }
}
