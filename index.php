
<?php

require_once("class/book.php");
require_once('config/database.php');
function convert($file) {

	$csv = array_map('str_getcsv', file("import/$file"));
    	array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });
     	array_shift($csv);

	return $csv;
}


$books = "books.csv";
$books_meta = "book-meta.csv";




$booksAssocArray = convert($books);
$booksObjectsArray  = [];
foreach ($booksAssocArray as $key => $bookArray) {
	$books_count = $bookArray['books_count']; 
	$isbn= $bookArray['isbn']; 
	$authors= $bookArray['authors'];
	$original_title= $bookArray['original_title']; 
	$original_publication_year= ''; 
	$language_code= '';
	$average_rating= '';
	$book = new Book($books_count, $isbn, $authors, $original_title, $original_publication_year, $language_code, $average_rating);
	$booksObjectsArray[$isbn]=$book;
}


$booksMetaAssocArray = convert($books_meta);
foreach($booksMetaAssocArray as $key => $bookMetaArray){
	#isbn,original_publication_year,language_code,average_rating
	$isbn = $bookMetaArray['isbn'];
	$original_publication_year = $bookMetaArray['original_publication_year'];
	$language_code = $bookMetaArray['language_code'];
	$average_rating = $bookMetaArray['average_rating']; 
	$booksObjectsArray[$isbn]->setOriginalPublicationYear($original_publication_year);
	$booksObjectsArray[$isbn]->setLanguageCode($language_code);
	$booksObjectsArray[$isbn]->setAverageRating($average_rating);

}

$db = new Database();
$db->getConnection();
foreach($booksObjectsArray as $isbn => $book)
{
	$db->insertBook($book);
}

