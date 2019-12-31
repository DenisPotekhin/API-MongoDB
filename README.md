<p align="center">
    <h1 align="center">REST API according to specification</h1>
    <a href="https://bit.ly/2McIjwD" align="center" >https://bit.ly/2McIjwD</a>
    <br>
</p>




USAGE
------------

<ul>
<li>git clone <a href="https://github.com/DenisPotekhin/API-MongoDB.git">https://github.com/DenisPotekhin/API-MongoDB.git</a></li>
<li>composer update</li>
<li>use test dump DB</li>
<li>edit the file 'config/db.php' with real data</li>
<li>see examples in 'examples' folder</li>
<li>send requests</li>
</ul>


<h3>API supports the following request</h3>
<h4>GET /api/v1/posts - Index posts</h4>

<pre>
Example request:
https://api/v1/posts?limit=3&userId=5cf0029caff5056591b0ce7d

Success response:
HTTP - code: 200
{
   "status": "Success",
   "message": "Успешно",
   "data": { 
        "posts": [...],
    }
}, example posts:
        {
        “id”: “5cf0029caff5056591b0ce7d”,
        “place”: {...},
        “user”: {...},
        “text”: “Уютная и домашняя сеть кафе. В какое из ваших кафе не пришел, всегда чувствую себя как дома”,
        “timePassed”: 11522
        }
        example user:
            {
            “id”: “5cf0029caff5056591b0ce7d”,
            “firstName”: “Иммануил”,
            "secondName: "Кант"
            }
        example place:
            {
            “id”: “5cf0029caff5056591b0ce7d”,
            “name”: “Burger King”,
            “city”: “Москва”,
            “street”: “Большая Черкизовская”,
            “category”: “Ресторан”
            }

Error responses:
HTTP - code: 400 (Bad request)
    {
	    “status”: “FieldRequired”,
	    “message”: “Поле не может быть пустым”,
	    “data”: {
		    “fields”: [“field_name”]
        }
    }
HTTP - code: 400 (Bad request)
    {
    	“status”: “FieldInvalid”,
    	“message”: “Поле содержит недопустимое значение”,
    	“data”: {
    		“fields”: [“field_name”, “another_field”]
    	}
    }
HTTP - code: 404 (Not Found)
    {
    	“status”: “RecordNotFound”,
    	“message”: “Запись не найдена”,
    	“data”: {}
    }
HTTP - code: 404 (Not Found)
    {
    	“status”: “UrlNotFound”,
        “message”: “URL не найден”,
        “data”: {}
    }
HTTP - code: 500 (Internal Server Error)
    {
    	 “status”: “GeneralInternalError”,
         “message”: “Произошла ошибка”,
         “data”: {}

    }
</pre>