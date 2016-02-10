<?php
/*
 *	The purpose of the implementing class is to render the Form Elements through PHP API.
 *	Raw HTML <input> tags should not be used anywhere else in the project.    
 */
interface formItemInterface {
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$type		- The type of the form element. Eg.: "text", "password", etc.
	 * 2.	$name		- The name(machine readable) of the form element. Eg.: "userName", "cnfPassword", etc.
	 * 3.	$class	- The class name to be provided for form element. Useful if jQuery functions / CSS is to handled for the element
	 * 4.	$label	-	The label(Human Readable) to be provided for the Form Element. Eg.: "User Name", "Confirm Password", etc.	 *  
	 */
	
	
	/*
	 *	This function will be used to render Label for the form element's.
	 * 	Will be called within the render function.
	 */ 
	function renderLabel();	

	/*
	 *	This function will render the form element. 
	 * 	Will be called directly by the Object/Instance created for the implementing Class.
	 */ 
	public function render();
}


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
 *	The purpose of the implementing class is to contain the user avatar table related information & actions within a single object.
 * 	All SQL queries to the table ameex_user_avatar should be contained within the implementing class.
 */ 
interface userAvatarInterface {
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$uid			- The unique User ID of the user.
	 * 2.	$filename	- Corresponds to the column filename in ameex_user_avatar table 
	 * 3.	$uri			- Corresponds to the column uri in ameex_user_avatar table
	 * 4.	$filesize	- Corresponds to the column filesize in ameex_user_avatar table
	 * 5.	$filetype	- Corresponds to the column filetype in ameex_user_avatar table  
	 */
	
	
	/*
	 * The purpose of this function is the save the user avatar information in the database
	 */
	public function save();
	
	/*
	 * The purpose of this function is the load the user avatar information from database and store in an object.
	 * The SQL query should contain $this->uid in WHERE clause.
	 */
	public function load($uid = 0);
}
?>