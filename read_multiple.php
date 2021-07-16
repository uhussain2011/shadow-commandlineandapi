<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    include_once 'class/book.php';
    include_once 'config/database.php';
  

    $database = new Database();
     $database->getConnection();

 
    $authors = isset($_GET['authors']) ? $_GET['authors'] : '';
    $original_publication_year = isset($_GET['original_publication_year']) ? $_GET['original_publication_year'] : '';
    $original_title = isset($_GET['original_title']) ? $_GET['original_title'] : '';
       $books_count = isset($_GET['books_count']) ? $_GET['books_count'] : '';
    if($authors == '' && $original_publication_year =='' && $original_title=='' && $books_count=='')
    {
        http_response_code(400);
        echo json_encode(['error'=>true,'message'=>'At least 1 of following parameters is required (authors, original_publication_year, original_title, books_count), none provided']);
        die();
    }
    $data=$database->findBooks($authors, $original_publication_year, $original_title, $books_count);
    echo json_encode(['count'=>count($data), 'books'=>$data]);
?>