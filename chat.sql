CREATE TABLE chat 
( 
 chat_id int(11) NOT NULL auto_increment, 
 posted_on varchar(20) NOT NULL, 
 user_name varchar(255) NOT NULL, 
 message text NOT NULL,  
 PRIMARY KEY (chat_id) 
); 