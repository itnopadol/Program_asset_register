<?php 
include("modules/books/book_function.php");
switch($action){
		case "list_book" : list_book(); break;
		case "book_detail" : book_detail(); break;
		case "manage_book" : manage_book(); break;
		case "book_form" : book_form(); break;
		case "insert_book" : insert_book(); break;
		case "delete_book" : delete_book(); break;
		case "edit_from" : edit_from(); break;
		case "update_book" : update_book(); break;
	}
?>