<?php
/*
 *	The purpose of the implementing class is to contain the user table related information within a single object.
 * 	All SQL queries to the table ameex_user should be contained within the implementing class.
 */ 
interface userInterface {
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$uid			- The unique User ID of the user.
	 * 2.	$name			- The unique User Name of the user. User login will be based on this field.
	 * 3.	$password	- The password of the user. To be saved in DB and validated during each login attempt.  
	 */
	
	
	/*
	 * The purpose of this function is the save the user information in the database
	 */
	public function save();
	
	/*
	 * The purpose of this function is the load the user information from database and store in an object.
	 * The SQL query should contain $this->uid in WHERE clause.
	 */
	public function load($uid = 0);
}


/*
 *	The purpose of the implementing class is to contain the user profile table related information & actions within a single object.
 * 	All SQL queries to the table ameex_user_profile should be contained within the implementing class.
 */ 
interface userProfileInterface {
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$uid				- The unique User ID of the user.
	 * 2.	$firstName	- Corresponds to the column first_name in ameex_user_profile table 
	 * 3.	$lastName		- Corresponds to the column last_name in ameex_user_profile table
	 * 4.	$phone			- Corresponds to the column phone in ameex_user_profile table
	 * 5.	$mail				- Corresponds to the column mail in ameex_user_profile table  
	 */
	
	
	/*
	 * The purpose of this function is the save the user profile information in the database
	 */
	public function save();
	
	/*
	 * The purpose of this function is the load the user profile information from database and store in an object.
	 * The SQL query should contain $this->uid in WHERE clause.
	 */
	public function load($uid = 0);
}
?>