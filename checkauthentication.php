<?php

function checkauthentication($form)
{
	//Users/Admins----------------------------------------------------------
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
		if(isset($form['admin_add_vpcode']))
		{
			if(empty($form['admin_add_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['admin_add_vpcode'] !== ADD_ADMIN)
			{
				return "Invalid vpcode";
			}
		}
		if(isset($form['admin_edit_vpcode']))
		{
			if(empty($form['admin_edit_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['admin_edit_vpcode'] !== EDIT_USER)
			{
				return "Invalid vpcode";
			}
		}
		if(isset($form['admin_ban_vpcode']))
		{
			if(empty($form['admin_ban_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['admin_ban_vpcode'] !== BAN_USER)
			{
				return "Invalid vpcode";
			}
		}
		if(isset($form['admin_del_vpcode']))
		{
			if(empty($form['admin_del_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['admin_del_vpcode'] !== DELETE_USER)
			{
				return "Invalid vpcode";
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
		if(isset($form['course_del_vpcode']))
		{
			if(empty($form['course_del_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['course_del_vpcode'] !== DELETE_COURSE)
			{
				return "Invalid vpcode";
			}
		}
		
   //Lessons------------------------------------------------------------------

        if(isset($form['lesson_name']))
		{
			if(empty($form['lesson_name']))
			{
				return "Please enter the lesson name";
			}
		}
		if(isset($form['lesson_no']))
		{
			if(empty($form['lesson_no']))
			{
				return "Please enter the lesson no";
			}
			elseif(!filter_var($form['lesson_no'],FILTER_VALIDATE_INT))
			{
				return "Please only input numbers";
			}
		}
		if(isset($form['lesson_content']))
		{
			if(empty($form['lesson_content']))
			{
				return "Please enter the lesson content";
			}
		}
		if(isset($form['lesson_by']))
		{
			if(empty($form['lesson_by']))
			{
				return "Please enter the lesson instructors name";
			}
		}
		if(isset($form['lesson_vid_url']))
		{
			$url = filter_var($form['lesson_vid_url'], FILTER_SANITIZE_URL);

           if(empty($form['lesson_vid_url']))
			{
				return "Please place in an embedded url";
			}
		   elseif(!filter_var($url, FILTER_VALIDATE_URL))
		   {
			   return "This url is not valid";
		   }
  
		}
		if(isset($form['lesson_del_vpcode']))
		{
			if(empty($form['lesson_del_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['lesson_del_vpcode'] !== DELETE_LESSON)
			{
				return "Invalid vpcode";
			}
		}
		
	//Comments------------------------------------------------------------

         if(isset($form['comment_summary']))
		 {
			 if(empty($form['comment_summary']))
			 {
				 return "Please enter your comment";
			 }
			 elseif(strlen($form['comment_summary']) > 300)
			 {
				 return "The comment that you've entered is too long";
			 }
		 }

    //Orders---------------------------------------------------------------------

          if(isset($form['user_id']))
		  {
			  if(empty($form['user_id']))
			  {
				  return "Please enter the user id";
			  }
			  elseif(!filter_var($form['user_id'], FILTER_VALIDATE_INT))
			{
				return "Please only input numbers";
			}
			  
		  }		  
		  if(isset($form['purchase_for']))
		  {
			  if(empty($form['purchase_for']))
			  {
				  return "Please enter the user id";
			  }
			  elseif(!filter_var($form['purchase_for'], FILTER_VALIDATE_INT))
			{
				return "Please only input numbers";
			}
			  
		  }
          if(!empty($form['purchase_amount']))
		{
			
			if(!filter_var($form['purchase_amount'], FILTER_VALIDATE_INT))
			{
				return "Please only input numbers";
			}
			
		}	
          if(isset($form['order_add_vpcode']))
		{
			if(empty($form['order_add_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['order_add_vpcode'] !== ADD_ORDER)
			{
				return "Invalid vpcode";
			}
		}
        if(isset($form['order_edit_vpcode']))
		{
			if(empty($form['order_edit_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['order_edit_vpcode'] !== EDIT_ORDER)
			{
				return "Invalid vpcode";
			}
		}
        if(isset($form['order_del_vpcode']))
		{
			if(empty($form['order_del_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['order_del_vpcode'] !== DELETE_ORDER)
			{
				return "Invalid vpcode";
			}
		}		
		
		
		
	
		return "cool";
	
}

?>