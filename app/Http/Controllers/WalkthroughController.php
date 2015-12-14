<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WalkthroughController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('Walkthrough/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $htmlString = $request->htmlCode;
        $cssString  = $request->cssCode;
        $jsString   = $request->jsCode;



        $walkthrough = new Walkthrough($htmlString, $cssString, $jsString);
        $service = new WalkthroughService;

        $service->useInputFile($walkthrough, $htmlString, "html");
        $service->useInputFile($walkthrough, $cssString, "css");
        $service->useInputFile($walkthrough, $jsString, "js");

        $total_life = 200; // set randomly for now
        $wttech = 3; 

        return response()->json($walkthrough);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}



class Walkthrough {
    
    protected $html;
    protected $css;
    protected $js; 
    
    public $added;
    public $removed;
    public $ocp;
    public $ncp;
    public $editor;
    public $slide_wait_time;
    public $scroll_left;
    public $scroll_top;
    public $selected;
    public $me_top;
    public $me_left;
    public $outputh;
    public $outputw;
    
    function __construct($html, $css, $js) {
        
        $this->added           = array();
        $this->removed         = array();
        $this->ocp             = array();
        $this->ncp             = array();
        $this->editor          = array();
        $this->slide_wait_time = array();
        $this->scroll_left     = array();
        $this->scroll_top      = array();
        $this->selected        = array();
        $this->me_top          = array();
        $this->me_left         = array();
        $this->outputh         = array();
        $this->outputw         = array();
        
    }
}

class WalkthroughService{
    
    function useInputFile($walkthrough, $file, $myEditor) {
        
            
        
        for($i = 0; $i < strlen($file); $i++) {
            
            $char = $file[$i];
            $this->addChar($walkthrough, $char, $i, $myEditor);
            
        }
        
    }
    
    
    
    /***********************************
    * Walkthrough construction methods * 
    ***********************************/
    
    /*
    *  $walkthrough = Walkthrough object
    *  $charPos     = Position of the character we are adding/removing
    *  $deleted     = Whether we remove/add the character
    */
    function charPos($walkthrough, $charPos, $deleted) {
        
        $walkthrough->ocp[] = $charPos;
        
        if ($deleted) {
            $walkthrough->ncp[] = $charPos;   
        } else {
            $walkthrough->ncp[] = $charPos + 1;
        }
          
    }
    
    
    /*
    *  $walkthrough = Walkthrough object
    *  $myChar      = The char that is to be added
    *  $myEditor    = Either html / css / js
    */
    function addChar($walkthrough, $myChar, $charPos, $myEditor) {
        
        $this->setSlideTime($walkthrough);
        $this->defaulterFunction($walkthrough);
        $walkthrough->editor[] = $myEditor;
        
        $this->charPos($walkthrough, $charPos, false);
        
        $walkthrough->added[]  = $myChar;
        $walkthrough->removed[] = "";
    }
    
    
    /*
    *  $walkthrough = Walkthrough object
    *  $charPos     = Position of character we want to remove
    *  $myEditor    = Either html / css / js
    *  $myString    = The string we will remove the character from
    */
    function removeChar($walkthrough, $charPos, $myEditor, $myString) {
     
        $this->setSlideTime($walkthrough);
        $this->defaulterFunction($walkthrough);
        $removedChar = $myString[$charPos];
        $myString = substr($myString, 0, $charPos) . subStr($myString, $charPos + 1);
        
        print($myString);
        $walkthrough->editor[] = $myEditor;
        $walkthrough->added[] = "";
        $walkthrough->removed[] = $removedChar;
        
        $this->charPos($walkthrough, $charPos, true);
     
        return $myString;
    }
    
    /*
    *  $walkthrough = Walkthrough object
    */
    function setSlideTime($walkthrough) {
        
        if (!count($walkthrough->slide_wait_time)) {
            $walkthrough->slide_wait_time[] = 0;   
        } else {
            $walkthrough->slide_wait_time[] = 50;   
        }
    }
    
    // Here to hard set the other arrays that arnt being used
    function defaulterFunction($walkthrough) {
        $this->setSelected($walkthrough);
        $this->setOutputh($walkthrough);
        $this->setOutputw($walkthrough);
    }
    
    function setSelected($walkthrough) {  
        $walkthrough->selected[] = 0;
    }
    
    function setOutputh($walkthrough) {
        $walkthrough->outputh[] = 0;   
    }
    
    function setOutputw($walkthrough) {
        $walkthrough->outputw[] = 0;
    }
}
