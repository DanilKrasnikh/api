## API description:
API allows you to work with files, upload, download from remote host, get a list of files and metadata for any file. This API uses UTF-8 encoding and supports two request methods – GET & POST. 
## Errors
The errors are returned in plain text format. Looks like standard HTTP error code syntax.  

Standard API response codes:  

Code | Description
:-----:|:----------
201  | File created
400  | Bad input parameter or invalid function
403  | Overwrite not allowed
404  | File not found
405  | Invalid request method



## Methods description

##### GET

GET have the following functions:  
1.	__getbyname__ – The method requests file from the server by name from server. Query looks like: __SERVER__/api/?getbyname=test.txt  
2.	__getmetabyname__ – The method requests file metadata from the server. Query looks like: __SERVER__/api/?getmetabyname=test.txt  
3.	__getlistfiles__ – The method returns a list of files in the directory. Query looks like:
__SERVER__/api/?getlistfiles  
4. __exist__ - The method check file exists in a directory. Query looks like: __SERVER__/api/?exist=test.txt  
	
##### POST  
	
POST allows upload and overwrite files. For upload file you need send POST request to __SERVER__/api/ (for overwrite need append ?rewrite to request). The name of the variable to send the file should be - *userfile*.
		
## Tests
For unit testing I used the following frameworks - PHPUnit and GuzzleHttp. test are located in /test/ directory.  
I have two test for check our methods:  
1. __sendFile.php__ - Check file uploads and overwrite. (Check __POST__ method)  
2. __answerTest.php__ - Check file existing in directory. (Check __GET__ method)