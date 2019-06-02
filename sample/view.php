<?php

// http://localhost/50-dev-lib-cmn/web/src/php_lib_web/damn-small-engine/sample/view.php

use WAJ\Lib\Web\DamnSmallEngine\View;
use WAJ\Lib\Web\DamnSmallEngine\ListView;

require '../src/ViewBase.php';
require '../src/View.php';
require '../src/ListView.php';


// Make a view, add values

$view = new View( 'main.html' );

$view->myVal = 'sample value';    // Just add what you need used PHP's magic method __set(), see there
// $view->myVal2 = ...            // Please set all values, use at least ''. If one is missing the class will
                                  // print ## MISSING VALUE ##, so you will see in UI that something is missing.

// Add a list

$listData = [                     // Demo data or load from db
  'row 1' => [
    'field 1' => 'entry 1.1',
    'field 2' => 'entry 1.2'
  ],
  'row 2' => [
    'field 1' => 'entry 2.1',
    'field 2' => 'entry 2.2'
  ]
];

$listView = new ListView();         // Instead you may also use:
                                    // $listView = ListView::buildList( 'list1_entry.html', $listData );
// /*                               // which is just the same code packed in a static method
foreach( $listData as $rowValues )
{
  $entryView = new View( 'list1_entry.html' );  // You could add View::ESCAPE_ALL_VALUES here which is
  $entryView->setValues( $rowValues );          // htmlspecialchars() for all added values, or do it
                                                // yourself
  $listView->addView( $entryView );
}
// */

$view->list1 = $listView;


// Add a list alternative version

$list2 = new View( 'list2_entries.html' );
$list2->setValues( $listData );
$view->list2 = $list2;


// You could also add: views - in a list - in a view - in a list

$outerList = new ListView();

for( $i=0; $i < 2; $i++ )
{
  $entryView = new View( 'table.html' );
  $innerList = ListView::buildList( 'list1_entry.html', $listData );
  $entryView->list = $innerList;
  
  $outerList->addView( $entryView );
}

$view->listInList = $outerList;


// Build all

echo $view;

?>