<?php 
 
    class Database {

      private $host = "localhost";
      private $db   = "phpmyadmin";
      private $user = "root";
      private $pass = "";
      private $port = "3310";
      private $charset = "utf8mb4";

    private $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

        public $con;

        public function getConnection(){

        $this->con = null;

            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset;port=$this->port";
                try {
                    $this->con = new \PDO($dsn, $this->user, $this->pass, $this->options);
                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int)$e->getCode());
                }
            return $this->con;
        }

        public function insertBook(Book $book)
        {

           

            $statement = $this->con->prepare("INSERT INTO shadow (isbn, books_count, authors, original_title, original_publication_year, language_code, average_rating) VALUES(?, ?, ?, ?, ?, ?, ?)");
           
            $books_count = $book->getBookCount();
            $isbn = $book->getIsbn();
            $authors = $book->getAuthors();
            $original_title = $book->getOriginalTitle();
            $original_publication_year = $book->getOriginalPublicationYear();
            $language_code = $book->getLanguageCode();
            $average_rating = $book->getAverageRating();
            $data=array( 
             $isbn,      $books_count,        $authors,              $original_title,              $original_publication_year,              $language_code,              $average_rating);
            $result = $statement->execute($data);

            if ($result) {
                echo "Data insert success";
            } else {
                echo "Data already present";
            }

        }
        public function findBook($authors, $original_publication_year, $original_title, $books_count)
        {
            $query = "SELECT * FROM SHADOW WHERE ";
            $prev = FALSE;
            $data = array();
            if($authors != '')
            {
                $query .= "authors LIKE :authors ";
                $data['authors'] = '%'.$authors.'%';
                $prev = TRUE;
                
            }
            if($original_publication_year != '')
            {
                if($prev == TRUE)
                {
                    $query .= 'AND ';
                }
                $query .= "original_publication_year LIKE :original_publication_year ";
                $data['original_publication_year'] = '%'.$original_publication_year.'%';
                $prev = TRUE;
            }

            if($original_title != '')
            {
                if($prev == TRUE)
                {
                    $query .= "AND ";
                }
                $query .= "original_title LIKE :original_title ";
               $data['original_title'] = '%'.$original_title . '%';
                $prev = TRUE;
            }


            if($books_count != '')
            {
                if($prev == TRUE)
                {
                    $query .= "AND ";
                }
                $query .= "books_count LIKE :books_count";
               $data['books_count'] = '%'.$books_count . '%';
                $prev = TRUE;
            }

           # return $data;
            $statement = $this->con->prepare($query);
            $statement->execute($data);
            while($book = $statement->fetch())
            {
                return $book;
            }
            return NULL;

        }

        public function findBooks($authors, $original_publication_year, $original_title, $books_count)
        {
            $query = "SELECT * FROM SHADOW WHERE ";
            $prev = FALSE;
            $data = array();
            if($authors != '')
            {
                $query .= "authors LIKE :authors ";
                $data['authors'] = '%'.$authors.'%';
                $prev = TRUE;
                
            }
            if($original_publication_year != '')
            {
                if($prev == TRUE)
                {
                    $query .= 'AND ';
                }
                $query .= "original_publication_year LIKE :original_publication_year ";
                $data['original_publication_year'] = '%'.$original_publication_year.'%';
                $prev = TRUE;
            }

            if($original_title != '')
            {
                if($prev == TRUE)
                {
                    $query .= "AND ";
                }
                $query .= "original_title LIKE :original_title ";
               $data['original_title'] = '%'.$original_title . '%';
                $prev = TRUE;
            }


            if($books_count != '')
            {
                if($prev == TRUE)
                {
                    $query .= "AND ";
                }
                $query .= "books_count LIKE :books_count";
               $data['books_count'] = '%'.$books_count . '%';
                $prev = TRUE;
            }
                   # return [$query];
           # return $data;
            $statement = $this->con->prepare($query);



            $statement->execute($data);
            $books = [];
            while($book = $statement->fetch())
            {
               array_push($books, $book);
            }
            return $books;

        }
    }   


?>