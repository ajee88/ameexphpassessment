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

interface userLocationInterface {
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$uid				- The unique User ID of the user. Corresponds to uid in ameex_user_location table 
	 * 2.	$addr1			- Corresponds to the column street in ameex_user_location table 
	 * 3.	$addr2			- Corresponds to the column additional in ameex_user_location table
	 * 4.	$city				- Corresponds to the column city in ameex_user_location table
	 * 5.	$province		- Corresponds to the column province in ameex_user_location table  
	 * 6.	$zipcode		- Corresponds to the column postal_code in ameex_user_location table
	 * 7.	$country		- Corresponds to the column country in ameex_user_location table
	 * 8.	$latitude		- Corresponds to the column latitude in ameex_user_location table
	 * 9.	$longitude	- Corresponds to the column longitude in ameex_user_location table
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