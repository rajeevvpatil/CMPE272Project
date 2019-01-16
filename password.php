        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
    <!-- Fig. 26.16: password.php                          -->
    <!-- Searching a database for usernames and passwords. -->
    
    <html xmlns = "http://www.w3.org/1999/xhtml">
          <?php 
		  print "oooooooooooooooooooooo";
			$username = $_POST('USERNAME');
            $password = $_POST('PASSWORD');
			echo "-----------	".$username;
			$file = fopen( "password.txt" );
               // read each line in file and check username
               // and password
               while ( !feof( $file ) && !$userVerified ) {
   
                  // read line from file
                  $line = fgets( $file, 255 );
        
                  // remove newline character from end of line
                  $line = chop( $line );
   
                  // split username and password
                  $field = split( ",", $line, 2 );
      
                  // verify username
                  if ( $username == $field[ 0 ] ) {
                     $userVerified = 1;
      
                     // call function checkPassword to verify
                     // user’s password
                     if ( checkPassword( $password, $field ) 
                        == true )
                        accessGranted( $username );
                     else   
                        wrongPassword();
                  }
               }
      
               // close text file
               fclose( $file );
      
               // call function accessDenied if username has 
               // not been verified
               if ( !$userVerified ){
                  accessDenied();
            }
   
             // verify user password and return a boolean
            function checkPassword( $userpassword, $filedata )
            {
               if ( $userpassword == $filedata[ 1 ] )
                  return true;
               else
                  return false;
            }
   
             // print a message indicating the user has been added
            /*function userAdded( $name ) 
            {
              print( "<title>Thank You</title></head>
                 <body style = \"font-family: arial; 
                 font-size: 1em; color: blue\"> 
                 <strong>You have been added 
                 to the user list, $name.
                 <br />Enjoy the site.</strong>" );
           }*/
  
            // print a message indicating permission 
            // has been granted
           function accessGranted( $name )
           {
              print( "<title>Thank You</title></head>
                 <body style = \"font-family: arial;
                 font-size: 1em; color: blue\">
                 <strong>Permission has been 
                 granted, $name. <br />
                 Enjoy the site.</strong>" );
           }
  
            // print a message indicating password is invalid
           function wrongPassword()
           {
              print( "<title>Access Denied</title></head>
                 <body style = \"font-family: arial; 
                 font-size: 1em; color: red\">
                 <strong>You entered an invalid 
                 password.<br />Access has 
                 been denied.</strong>" );
           }
  
            // print a message indicating access has been denied
           function accessDenied()
           {
              print( "<title>Access Denied</title></head>
                 <body style = \"font-family: arial; 
                 font-size: 1em; color: red\">
                 <strong>
                 You were denied access to this server.
                 <br /></strong>" );
           } 
  
            // print a message indicating that fields 
            // have been left blank
           function fieldsBlank()
           {
              print( "<title>Access Denied</title></head>
                 <body style = \"font-family: arial; 
                 font-size: 1em; color: red\">
                 <strong>
                 Please fill in all form fields.
                 <br /></strong>" );
           } 
        ?>
 </html>




