<?php

// http://localhost/50-dev-lib-cmn/web/src/php_lib_web/DamnSmallEngine/sample/view.php

use WAJ\Lib\Web\DamnSmallEngine\View;
use WAJ\Lib\Web\DamnSmallEngine\ListView;

require '../src/View.php';
require '../src/ListView.php';


// Make a view, add values

$view = new View( 'main.html' );

$view->myVal = 'sample value';    // just add what you need used PHP's magic method __set(), see there
// $view->myVal2 = ...            // Please set all values at least '', if one is missing the class will
                                  // print ## MISSING VALUE ##, so you will see in UI and can't forget anything

// Add a list

$listData = [
  'row 1' => [
    'field 1' => 'entry 1.1',
    'field 2' => 'entry 1.2'
  ],
  'row 2' => [
    'field 1' => 'entry 2.1',
    'field 2' => 'entry 2.2'
  ]
];

$listView1 = new ListView();

// /*
foreach( $listData as $rowValues )
{
  $entryView = new View( 'list1_entry.html' );
  $entryView->setValues( $rowValues );
  
  $listView1->addView( $entryView );
}
// */

// instead you may also use $listView1 = ListView::buildList( 'list1_entry.html', $listData );
// which is just the same code packed in a static method

$view->list1 = $listView1;


// or

$list2 = new View( 'list2_entries.html' );
$list2->setValues( $listData );
$view->list2 = $list2;


// you could also add a list 2 a list

$outerList = new ListView();
$outerList->addView( $listView1 );
$view->listInList = $outerList;


// Build all

echo $view;

?>