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
			elseif(strlen($form['course_name']) > 50)
			{
				return "The course name is too long";
			}
			
		}
		if(isset($form['course_code']))
		{
			if(empty($form['course_code']))
			{
				return "Please enter the course short name";
			}
			elseif(strlen($form['course_code']) > 15)
			{
				return "The course short name is too long";
			}
			
		}
		if(isset($form['course_summary']))
		{
			if(empty($form['course_summary']))
			{
				return "Please enter the course summary";
			}
			elseif(strlen($form['course_summary']) < 100)
			{
				return "The course summary is too short";
			}
			elseif(strlen($form['course_summary']) > 200)
			{
				return "The course summary is too long";
			}
			
		}
		if(isset($form['course_tags']))
		{
			if(empty($form['course_tags']))
			{
				return "Please enter the course tags";
			}
			elseif(strlen($form['course_tags']) > 200)
			{
				return "The course tags are too long";
			}
			
		}
		if(isset($form['course_by']))
		{
			if(empty($form['course_by']))
			{
				return "Please enter the course by";
			}
			elseif(strlen($form['course_by']) > 200)
			{
				return "The course by is too long";
			}
			
		}
		if(isset($form['course_total_time']))
		{
			
			if(empty($form['course_total_time']))
			{
				return "Please fill in the total time";
			}
			elseif(strlen($form['course_total_time']) > 200)
			{
				return "The course total time is too long";
			}
			
		}
		if(isset($form['course_reading']))
		{
			
			if(empty($form['course_reading']))
			{
				return "Please fill in the completion time for the course";
			}
			elseif(strlen($form['course_reading']) > 200)
			{
				return "The course completion time is too long";
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
			elseif(strlen($form['course_price']) > 15)
			{
				return "The course price is too long";
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
			//$url = filter_var($form['lesson_vid_url'], FILTER_SANITIZE_URL);

           if(empty($form['lesson_vid_url']))
			{
				return "Please enter the main content";
			}
		  /* elseif(!filter_var($url, FILTER_VALIDATE_URL))
		   {
			   return "This url is not valid";
		   }*/
  
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

//Blogs------------------------------------------------------------------------

		if(isset($form['title']))
		{
			if(empty($form['title']))
			{
				return "Please enter the title";
			}
		}
		if(isset($form['author']))
		{
			if(empty($form['author']))
			{
				return "Please enter the authors name";
			}
		}
		if(isset($form['tags']))
		{
			if(empty($form['tags']))
			{
				return "Please enter the tags";
			}
		}
		if(isset($form['content']))
		{
			if(empty($form['content']))
			{
				return "Please enter the content";
			}
		}
		if(isset($form['blog_del_vpcode']))
		{
			if(empty($form['blog_del_vpcode']))
			{
				return "Please enter the vpcode";
			}
			elseif($form['blog_del_vpcode'] !== DELETE_BLOG)
			{
				return "Invalid vpcode";
			}
		}
		
//Support----------------------------------------------------------------------

		if(isset($form['support_name']))
		{
			 if(empty($form['support_name']))
			 {
				 return "Please fill in your username";
			 }
			 elseif(strlen($form['support_name']) > 200)
			 {
				 return "The username is too long";
			 }
		}
		if(isset($form['support_email']))
		{
			if(empty($form['support_email']))
			{
				return "Please fill in your email address";
			}
			elseif(!filter_var($form['support_email'], FILTER_VALIDATE_EMAIL))
			{
				return "Please check your Email Format";
			}
				
		}
		if(isset($form['support_query']))
		{
			 if(empty($form['support_query']))
			 {
				 return "Please fill in the query that you have";
			 }
			 elseif(strlen($form['support_name']) > 200)
			 {
				 return "The query is too long";
			 }
		}
		
		
		
	
		return "cool";
	
}

?>