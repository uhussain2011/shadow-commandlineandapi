<?php
	class Book{
		private $books_count; 
		private $isbn;
		private $authors;
		private $original_title;
		private $original_publication_year;
		private $language_code;
		private $average_rating;
		

		public function __construct(  $books_count, $isbn, $authors, $original_title, $original_publication_year, $language_code, $average_rating){
			$this->books_count = $books_count;
			$this->isbn = $isbn;
			$this->authors = $authors;
			$this->original_title = $original_title;
			$this->original_publication_year = $original_publication_year;
			$this->language_code = $language_code;
			$this->average_rating = $average_rating;
		}
		 
		public function  getBookCount(){return $this->books_count;}
		public function  getIsbn(){return $this->isbn;}
		public function  getAuthors(){return $this->authors;}
		public function  getOriginalTitle(){return $this->original_title;}
		public function  getOriginalPublicationYear(){return $this->original_publication_year;}
		public function  getLanguageCode(){return $this->language_code;}
		public function  getAverageRating(){return $this->average_rating;}
		

		public function  setBookCount($value){$this->books_count = $value;}
		public function  setIsbn($value){$this->isbn = $value;}
		public function  setAuthors($value){$this->authors = $value;}
		public function  setOriginalTitle($value){$this->original_title = $value;}
		public function  setOriginalPublicationYear($value){$this->original_publication_year = $value;}
		public function  setLanguageCode($value){$this->language_code = $value;}
		public function  setAverageRating($value){$this->average_rating = $value;}



	}
?>