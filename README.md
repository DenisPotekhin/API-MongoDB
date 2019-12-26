<p align="center">
    <h1 align="center">RESTful API метод согласно спецификации</h1>
    <a href="https://bit.ly/2McIjwD">https://bit.ly/2McIjwD</a>
    <br>
</p>




ИСПОЛЬЗОВАНИЕ
------------

<ul>
<li>git clone <a href="https://github.com/DenisPotekhin/API-MongoDB.git">https://github.com/DenisPotekhin/API-MongoDB.git</a></li>
<li>composer update</li>
<li>use test dump DB</li>
<li>edit the file `config/db.php` with real data</li>
<li>see examples in 'examples' folder</li>
<li>send requests</li>
</ul>


<pre>
Доступный метод
GET /api/v1/posts - Получить список постов
------------

успешный ответ:
HTTP - код: 200
{
   "status": "Success",
   "message": "Успешно",
   "data": { 
        "posts": [...],
    }
}, пример содержимого posts:
        {
        “id”: “5cf0029caff5056591b0ce7d”,
        “place”: {...},
        “user”: {...},
        “text”: “Уютная и домашняя сеть кафе. В какое из ваших кафе не пришел, всегда чувствую себя как дома”,
        “timePassed”: 11522
        }
        пример содержимого user:
            {
            “id”: “5cf0029caff5056591b0ce7d”,
            “firstName”: “Иммануил”,
            "secondName: "Кант"
            }
        пример содержимого place:
            {
            “id”: “5cf0029caff5056591b0ce7d”,
            “name”: “Burger King”,
            “city”: “Москва”,
            “street”: “Большая Черкизовская”,
            “category”: “Ресторан”
            }


</pre>