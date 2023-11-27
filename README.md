 

## About 
 
 1)Design your Database<br>
 2)Create the migration<br>
 3)Define eloquent Relationship in Model<br>
 4)Use queue/scheduler/job to solve the issue<br>
 5)Use controller , service and model to solve the problem <br>
 6)While importing check If you don’t have category in DB you have to create it first then
 insert<br>
 Create an api to Store 100k data<br>
 Create an api to Show 100k data<br>
 Create a blade template where you will be showing 100K (feel free to implement
 your idea s that browser should not get hanged and user will be able see the data)<br>
 Tell us in which route and what to do to can see 100k data<br>

**Alhamdulillah**, Hope all requirements are met. If find any kind of problem please contact me I will solve it.

<h2>Api List</h2>
___

[Api list Link.](https://www.getpostman.com/collections/00396a67aaaf07be9b45)
</br>
[json_list](dataset.json)



Base URL(assign).
environment variable
{{assign}} == http://127.0.0.1:8000/api/assignment

<h3>Technology</h3>
___

<h6 >laravel</h6>
<h6>bootstrap5</h6>

<h3>installation</h3>
___

git clone https://github.com/Ariful491/queue_job.git

````
composer install
````
````
cp .env.example .env
````
Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

  ````
   php artisan key:generate
````
 
````
php artisan migrate
````
````
php artisan serve
````
````
php artisan queue:work
````
 

<h3>After seeding :</h3>
___
 From [dataset.json](dataset.json) copy all data <br>

 goto post man End Point set 
 [{{baseURL}}/products]  <br>

 method post and set header Accept application/json <br>

  go to body row and set as json and put all copied data from data set then click to send button.

<h5>InSha Allah All are will be working good.</h5>

**_<spna style="color:yellow">If you find any kind of problem please inform me about it.<span>_**

___
<h4>short demo</h4>
___

![postRequest](https://user-images.githubusercontent.com/52754507/197461083-1f872e98-3b43-4865-bdb2-30ac37d9503c.png)
![jobWorking](https://user-images.githubusercontent.com/52754507/197461097-fb659e5c-804d-4834-8267-f9ca5afbfb52.png)
![getRequest](https://user-images.githubusercontent.com/52754507/197461019-d67ece0f-d1c3-47d1-9809-aa163d224caa.png)
![data](https://user-images.githubusercontent.com/52754507/197461044-2adecccd-7ea7-42f6-92dd-1f3dcad65454.png)
![data1](https://user-images.githubusercontent.com/52754507/197461057-203db10e-f388-4863-9617-5577a36ff82c.png)

___
_<h4 style="color:yellow">if you don't mind please u can check my coding pattern to another repository where using service container + service provider[Repository pattern] </h4>_
[link](https://github.com/Ariful491/assignment)
___
