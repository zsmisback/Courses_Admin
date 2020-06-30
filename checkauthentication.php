<?php

function checkauthentication($form)
{
	//Users----------------------------------------------------------
		if(isset($form['user_name']))
		{
			 if(empty($form['user_name']))
			 {
				 return "Please fill in your username";
			 }
		}
		if(isset($form['user_contact']))
		{
			if(empty($form['user_contact']))
			{
				return "Please fill in the contact";
			}
			elseif(!preg_match('/^[0-9]{10}+$/', $form['user_contact']))
			{
				return "Please check your contact number";
			}
		}
		if(isset($form['user_email_address']))
		{
			if(empty($form['user_email_address']))
			{
				return "Please fill in your email address";
			}
			elseif(!filter_var($form['user_email_address'], FILTER_VALIDATE_EMAIL))
			{
				return "Please check your Email Format";
			}
				
		}
		if(isset($form['user_password']))
		{
			if(empty($form['user_password']))
			{
				return "Please enter your password";
			}
			
				
		}
		if(isset($form['re_pass']))
		{
			if(empty($form['re_pass']))
			{
				return "Please re-enter your password";
			}
			elseif($form['re_pass'] !== $form['user_password'])
			{
				return "The password does not match";
			}
		}
	//Courses--------------------------------------------------------

	     if(isset($form['course_name']))
		{
			if(empty($form['course_name']))
			{
				return "Please enter the course name";
			}
			
		}
		if(isset($form['course_code']))
		{
			if(empty($form['course_code']))
			{
				return "Please enter the course code";
			}
			
		}
		if(isset($form['course_summary']))
		{
			if(empty($form['course_summary']))
			{
				return "Please enter the course summary";
			}
			
		}
		if(isset($form['course_tags']))
		{
			if(empty($form['course_tags']))
			{
				return "Please enter the course tags";
			}
			
		}
		if(isset($form['course_by']))
		{
			if(empty($form['course_by']))
			{
				return "Please enter the course by";
			}
			
		}
		if(isset($form['course_total_time']))
		{
			
			if(empty($form['course_total_time']))
			{
				return "Please fill in the total time";
			}
			
		}
		if(isset($form['course_reading']))
		{
			
			if(empty($form['course_reading']))
			{
				return "Please fill in the completion time for the course";
			}
			
		}
		if(isset($form['course_award']))
		{
			
			if(empty($form['course_award']))
			{
				return "Please fill in the course awards";
			}
			
		}
		if(isset($form['course_material']))
		{
			
			if(empty($form['course_material']))
			{
				return "Please fill in the course materials";
			}
			
		}
		if(isset($form['course_pre_requisite']))
		{
			
			if(empty($form['course_pre_requisite']))
			{
				return "Please fill in the course pre-requisites";
			}
			
		}
		if(!empty($form['course_price']))
		{
			
			if(!filter_var($form['course_price'], FILTER_VALIDATE_INT))
			{
				return "Please only input numbers";
			}
			
		}
		
		
	
		return "cool";
	
}

?>