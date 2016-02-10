<?php
/*
 *	The purpose of the implementing class is to render the HTML select element through PHP API.
 *	Raw HTML <select> tag should not be used anywhere else in the project.    
 */
interface formSelectInterface{
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$name			- The name(machine readable) of the form element. Eg.: "userName", "cnfPassword", etc.
	 * 2.	$class		    - The class name to be provided for form element. Useful if jQuery functions / CSS is to handled for the element
	 * 3.	$label		    -	The label(Human Readable) to be provided for the Form Element. Eg.: "User Name", "Confirm Password", etc.	 *
	 * 4.	$options	    - An array of options that will go under the Select element.  
	 */
	 
	/*
	 *	This function will be used to render option by forming HTML for each of the options in the Instance. 
	 * 	Will be called within a foreach loop in the function render().
	 */
	function renderOption($option); 

	/*
	 *	This function will form the HTML of select element render in the form. 
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

interface userVehicleInterface {
	/*
	 * Variables to be used in the implementing Class
	 * 1.	$uid		- The unique User ID of the user.
	 * 2.	$make		- Corresponds to the column $make in ameex_user_vehicle table 
	 * 3.	$model	- Corresponds to the column $model in ameex_user_vehicle table
	 * 4.	$year		- Corresponds to the column $year in ameex_user_vehicle table
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

