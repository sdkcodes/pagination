<?php 

class Pagination {

	protected $totalRows;
	protected $rowsPerPage = 20;
	protected $offset;
	protected $baseURL;
	protected $currentPage;
	protected $totalPages;

	public function __construct(){

	}

	public function setBaseURL($baseURL){
		$this->baseURL = $baseURL;
	}

	public function getBaseURL(){
		return $this->baseURL;
	}

	public function getTotalPages(){
		$totalPages = ceil($this->getTotalRows() / $this->getRowsPerPage());
		return $totalPages;
	}

	public function setTotalRows($totalRows){
		$this->totalRows = $totalRows;
	}

	public function getTotalRows(){
		return $this->totalRows;
	}

	public function setRowsPerPage($rowsPerPage){
		$this->rowsPerPage = $rowsPerPage;
	}

	public function getRowsPerPage(){
		return $this->rowsPerPage;
	}

	public function setCurrentPage($currentPage){
		$this->currentPage = $currentPage;
	}

	public function getCurrentPage(){
		return $this->currentPage;
	}
	public function getOffset(){
		$offset = ($this->getCurrentPage() - 1) * $this->getRowsPerPage();
		return $offset;
	}

	public function generateLinks(){
		$links = "<ul class=pagination>";
		
		for ($i=1; $i <= $this->getTotalPages(); $i++){

			if ($i === intval($this->getCurrentPage())){
				$links .=  "<li class='active'>" . "<a href=" . $this->getBaseURL() . "?current_page=$i>" . $i . "</a></li>";
			}
			else{
				$links .= "<li>" . "<a href=" . $this->getBaseURL() . "?current_page=$i>" . $i . "</a></li>";
			}
		}
		$links .= "</ul>";
		
		return $links;
	}

	// public function generateLinks(){
	// 	echo '<ul class="pagination">';
	// 		for ($i=1; $i <= $this->totalPages; $i++){
	// 			if ($i == $this->CurrentPage){
	// 				echo "<li class='active'>" . "<a href=" . $this->getBaseURL() . "?current_page=$i>" . $i . "</a></li>";
	// 			}
	// 			else{
	// 				echo "<li>" . "<a href=" . $this->getBaseURL() . "?current_page=$i>" . $i . "</a></li>";
	// 			}
	// 		 }
	// 	echo '</ul>';
	// }
}