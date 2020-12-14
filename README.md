# Rest-API
A restful service to create, update and delete student records using Postman
REST (Representational State Transfer) used to take advantage of existing protocols espce=cially http protocols for web APIs.

The project was done using:
- mysql database
- html5 and php
- Postman : colaboration platform for API development

[initialise.php](https://github.com/AmaniUsagi/Rest-API/blob/main/core/initialise.php) defines directories, paths for resources and loads configurations.
[post.php](https://github.com/AmaniUsagi/Rest-API/blob/main/core/post.php) contains all the functions for manupulating records

User can create, retrieve, update and delete records as shown below
- Specifying the data type to be pushed to db
![](Screenshots/Inkedcreate_param_LI.JPG)
- Creating record in db
![](Screenshots/Inkedcreate_LI.JPG)
- Note that the process of creating and updating records are similar. The only difference is that creation uses a POST method while update uses a PUT method.
- The different functions are separated in indivitual files
- Retrival uses GET method. To read multiple records use [read.php](https://github.com/AmaniUsagi/Rest-API/blob/main/api/read.php).
![](Screenshots/read_multi.PNG)
- To read a single record use [sread.php](https://github.com/AmaniUsagi/Rest-API/blob/main/api/sread.php). In this case specify the id to retrive.
![](Screenshots/read_single.PNG)
- DELETE
![](Screenshots/Inkeddelete_LI.JPG)


How to use?
- Download and run boy! Its that simple.
