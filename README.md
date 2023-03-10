Отчёт по курсовой работе
========================
*по курсу Основы программирования*  

выполнила: Дубровина Д.А. 3132 группа  
преподаватель: Жиданов К.А.

Санкт-Петербург, 2022 г. 

#### Изучение предметной области
------------------------
В сети Интернет существует много сайтов с кулинарными рецептами. Все они предоставляют пользователю доступ не только к неограниченному количеству данных и советам, но и дает возможность делиться собственными рецептами. Но не все площадки предоставляют пользователю коммерциализировать их идеи. 

В моем проекте самые популярные рецепты с сайта, продаются в булочной, что помагает получить пользователю дополнительный дохот от продажи. Популярность рецепта зависит от количества комментариев и просьб пользователей. Администратор имеет возможность делать отметки популярных блюд, так, что пользователи смогут увидеть их на главной странице. 
#### Техническое задание
------------------------
- Проектирование дизайна;
- Верстка сайта;
- Создание клинт-серверной части;
- Подключение Яндекс карты для отображения булочной;
- Публикация проекта благодаря бесплатному хостингу.

#### Выбор технологии
------------------------
*Платформа:* TimeWeb  
*Среда разработки:* Atom, OpenServer (портативная программная среда)  
*Инструменты:* PHP 8.0, MySQL-8.0, Apache 2.4, PhpMyAdmin, JS  
*Фреймворк:* Bootstrap 5  

#### Процесс реализации
------------------------
#### [1. Пользовательский интерфейс](https://www.figma.com/proto/rpi83J1jPVsl7yNRoT6zYu/Untitled?node-id=1%3A2&scaling=min-zoom&page-id=0%3A1&starting-point-node-id=1%3A2)

![Главная](https://github.com/totomiPo/Cooking-web/blob/main/Интерфейс%20главной%20страницы.png)

#### 2. Пользовательский сценарий работы
Пользователь попадает на главную страницу **index.php**. 
Если пользователь не зарегестрирован, то он иеет статус гостя, что дает ему право только на просмотр уже имеющихся рецептов. Если пользователь зарегестрирован, то в дополнение к основным функциям имеет возможность создавать записи в своем кабинете, редактировать, публиковать/не публиковать записи, удалять, а также комментировать записи других пользователем. Если пользователь имеет статус администратор, то также доступен функционал создания категорий, новых пользователей, и модерировать все комментарии к записям через админ-панель.  

Пользователь может просматривать одну запись, переходя на **singl.php**, на этой странице доступно комментирование и просмотр уже имеющихся комментариев, полное содержание статьи, изображение и заголовок.  

Пользователь может производить поиск по ключевым словам, как заголовков, так и содержания, попадая на странцу **search.php**, где отображаются (или нет) все статьи, которые удовлетворили поисковой запрос.
Доступен просмотр по категория на странице **category.php**,оступно общее описание категории и статьи, соответствующие данной выбранной категории.

Есть возможность пройти регистрацию пользователя **reg.php** или авторизацию **log.php**, при корректном вводе данных доступна панель управления, в зависимости от статуса пользователя (администратор/обычный пользователь), где возможно создание и модерирование записей и др.


#### 3. API сервера и хореография

![Хореография](https://github.com/totomiPo/Cooking-web/blob/main/Хореография.png)

#### 4. Структура базы данных

 Таблица *posts*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT  |  | NO | Автоматический идентификатор поста |
| **iduser** | INT | 11 | NO | ID пользователя |
| **title** | VARCHAR | 255 | NO | Название поста |
| **img** | VARCHAR | 255 | NO | Картинка поста |
| **content** | TEXT |  | NO | Содержание поста |
| **status** | TINYINT |  | NO | Опубликовано/не опубликовано |
| **idtopic** | INT | 11 | YES | ID категории |
| **crdate** | DATETIME |  | CURRENT_TIMESTAMP | Дата создания |

Таблица *users*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT  |  | NO | Автоматический идентификатор пользователя |
| **admin** | TINYINT |  | NO | Администратор/не администратор |
| **username** | VARCHAR | 255 | NO | Логин пользователя |
| **email** | VARCHAR | 150 | NO | Почта пользователя |
| **password** | VARCHAR | 255 | NO | Хэшированный пароль |
| **created** | DATETIME |  | CURRENT_TIMESTAMP | Дата создания |

Таблица *comments*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT  |  | NO | Автоматический идентификатор комментария |
| **status** | TINYINT |  | NO | Опубликован/не опубликован |
| **page** | INT | 11 | YES | ID поста |
| **email** | VARCHAR | 150 | NO | Почта пользователя |
| **comment** | TEXT |  | NO | Содержание комментария |
| **crdate** | DATETIME |  | CURRENT_TIMESTAMP | Дата создания |

Таблица *topics*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT  |  | NO | Автоматический идентификатор категории |
| **name** | VARCHAR | 255 | NO | Название категории |
| **discr** | TEXT |  | NO | Описание категории |

#### 5. Алгоритм
**Добавление поста**  
![Добавление](https://github.com/totomiPo/Cooking-web/blob/main/Добавление.jpg)  

**Изменение поста**  
![Изменение](https://github.com/totomiPo/Cooking-web/blob/main/Изменение.jpg)  

**Комментирование**   
![Комментирование](https://github.com/totomiPo/Cooking-web/blob/main/Комментирование.jpg)   

**Регистрация**  
![Регистрация](https://github.com/totomiPo/Cooking-web/blob/main/Регистрация.jpg)  

**Вход**  
![Вход](https://github.com/totomiPo/Cooking-web/blob/main/Вход.jpg)  


#### 6. Значимые фрагменты кода

**Обработка карты**
```js
function init() {
	let map = new ymaps.Map('map', {
		center: [59.8649374712713,30.318793033581017],
		zoom: 17
	});

	let placemark = new ymaps.Placemark([59.8649374712713,30.318793033581017], {
		balloonContent: `
			<div class="balloon">
				<div class="balloon_name">Булочная №14</div>
				<div class="balloon_content">Только тут вы сможете попробовать
				 все рецепты с нашего сайта!</div>
				<div class="balloon__contacts">
					<a href="tel:+71234567890">+71234567890</a>
				</div>
			</div>
		`
	}, {
		iconLayout: 'default#image',
		iconImageSize: [40, 40],
		iconImageOffset: [17, 17]
	});

  map.controls.remove('geolocationControl'); // удаляем геолокацию
  map.controls.remove('searchControl'); // удаляем поиск
  map.controls.remove('trafficControl'); // удаляем контроль трафика
  map.behaviors.disable(['scrollZoom']); // отключаем скролл карты

  map.geoObjects.add(placemark);
}

ymaps.ready(init);
```

**Создание поста**
```php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addpost'])){
    // Добавление картинки
    if (!empty($_FILES['img']['name'])){
        // уникальная картинка для каждой записи
        $imgname = time() . $_FILES['img']['name'];
        $imgtype = $_FILES['img']['type'];
        $tmpf = $_FILES['img']['tmp_name'];
        $destin = ROOT_PATH . "\sets\img\post\\" . $imgname;
        // $destin = SITE_ROOT . "/sets/img/post//" . $imgname;
        if (strpos($imgtype, 'image') === false){
            array_push($err, "Файл не является изображением");
        } else {
            // Перемещение загруженного файла в указанное место
            $res = move_uploaded_file($tmpf, $destin);
            if($res){
                $_POST['img'] = $imgname;
            } else {
                array_push($err,"Ошибка загрузки изображения");
            }
        }
    } else {
        array_push($err,"Ошибка получения картинки!");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    // Проверка на чекбоксе
    $publish = trim($_POST['status']) !== null ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($err,"Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($title, 'UTF8') < 8){
        array_push($err,"Приожок, название статьи должено быть более 8-и символов!!!");
    }else{
        $post = [
            'iduser' => $_SESSION['id'],
            'title' => $title,
            'img' => $_POST['img'],
            'content' => $content,
            'status' => $publish,
            'idtopic' => $topic
        ];
        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . BASE_URL . 'admin/posts/adindex.php');
    }
}else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}

```

**Удаление поста**
```php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delid'])){
    $id = $_GET['delid'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/adindex.php');
}
```
**Изменение поста**
```php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edpost'])){
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    // Проверка на чекбоксе
    $publish = trim($_POST['status']) !== null ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($err,"Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($title, 'UTF8') < 8){
        array_push($err,"Приожок, название статьи должено быть более 8-и символов!!!");
    }else{
        $post = [
            'iduser' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'status' => $publish,
            'idtopic' => $topic
        ];
        $post = update('posts', $id, $post);
        header('location: ' . BASE_URL . 'admin/posts/adindex.php');
    }
}
```
#### Тестирование
-------------------
После реализации проекта было выполнено smoke-тестирование (проверка ключевых функций проекта). Результаты показали ожидаеммые ответы, как на ошибочные данные, так и на корректные.

#### Внедрение
------------------
Проект был опубликован в Интрнете через хостинг TimeWeb. Файловая организация анологична, как и в локальном. Структура баззы данных была импортированна и имеет идентичный вид.  
**Доступ к проекту:** https://ci24184.tw1.ru/
