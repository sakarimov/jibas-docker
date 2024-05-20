<?
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 30.0 (Jan 24, 2024)
 * @notes: 
 *  
 * Copyright (C) 2024 JIBAS (http://www.jibas.net)
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *  
 * You should have received a copy of the GNU General Public License
 **[N]**/ ?>
<?
set_error_handler('errorHandler');

function errorHandler ($errno, $errstr, $errfile, $errline, $errcontext) 
{
   switch ($errno) 
   {
      case E_USER_WARNING:
      case E_USER_NOTICE:
      case E_WARNING:
      case E_NOTICE:
      case E_CORE_WARNING:
      case E_COMPILE_WARNING:
         break;
      case E_USER_ERROR:
      case E_ERROR:
      case E_PARSE:
      case E_CORE_ERROR:
      case E_COMPILE_ERROR:

		 $r = rand(1, 30000);
		 if (file_exists("displayerror.php"))
		 {
			 echo  "<script language='javascript'>";
			 echo  "if (self == top || parent == top)";
			 echo  "    document.location.href = 'displayerror.php?$r';";
			 echo  "else if (parent.parent != top)";
			 echo  "    parent.parent.location.href = 'displayerror.php?$r';";
			 echo  "else";
			 echo  "    parent.location.href = 'displayerror.php?$r';";
			 echo  "</script>";
		 }
		 elseif (file_exists("include/displayerror.php"))
   		 {
			 echo  "<script language='javascript'>";
			 echo  "if (self == top || parent == top)";
			 echo  "    document.location.href = 'include/displayerror.php?$r';";
			 echo  "else if (parent.parent != top)";
			 echo  "    parent.parent.location.href = 'include/displayerror.php?$r';";
			 echo  "else ";
			 echo  "    parent.location.href = 'include/displayerror.php?$r';";
			 echo  "</script>";
		 }
		 elseif (file_exists("../include/displayerror.php"))
		 {
			 echo  "<script language='javascript'>";
			 echo  "if (self == top || parent == top)";
			 echo  "    document.location.href = '../include/displayerror.php?$r';";
			 echo  "else if (parent.parent != top)";
			 echo  "    parent.parent.location.href = '../include/displayerror.php?$r';";
			 echo  "else ";
			 echo  "    parent.location.href = '../include/displayerror.php?$r';";
			 echo  "</script>";
		 }
		 elseif (file_exists("../../include/displayerror.php"))
		 {
			 echo  "<script language='javascript'>";
			 echo  "if (self == top || parent == top)";
			 echo  "    document.location.href = '../../include/displayerror.php?$r';";
			 echo  "else if (parent.parent != top)";
			 echo  "    parent.parent.location.href = '../../include/displayerror.php?$r';";
			 echo  "else ";
			 echo  "    parent.location.href = '../../include/displayerror.php?$r';";
			 echo  "</script>";
		 }
			
      default:
         break;
   } // switch
} // errorHandler
?>