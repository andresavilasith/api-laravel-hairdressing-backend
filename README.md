<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="500"></a></p>



# API Rest sobre una Peluqueria en Laravel con TDD

## Instalación

1. Clonar el repositorio en el directorio de tu eleccion
```
git clone https://github.com/andresavilasith/api-laravel-hairdressing-backend.git
```
2. Ejecutar composer  
```
composer update
```
3. Cambiar el nombre del archivo **.env.example** _(Si esta como **env.example**)_ a **.env**

4. Generar una nueva llave de laravel con el comando:
```
php artisan key:generate
```

5. Generar la migracion y carga de registros
```
php artisan migrate --seed
``````
6. Ejecutar el proyecto
```
php artisan serve
``````
## Peticiones de Clientes

|  Petición  |      URL      |  Descripción |
|-----------|:-------------:|------:|
|   GET     |  api/client | Listado de clientes |
|   POST    |  api/client | Guardar un nuevo cliente |
|   GET     |  api/client/{client} | Obtener un cliente de acuerdo a su id |
|   PUT     |  api/client/{client} | Actualizar un cliente de acuerdo a su id |
|   GET     |  api/clients/dates | Lista de clientes con sus citas agendadas |
|   GET     |  api/clients/dates/attentions | Lista de citas con atenciones |

## Peticiones de Atenciones

|  Petición  |      URL      |  Descripción |
|----------|:-------------:|------:|
|   GET    |  api/attention | Listado de atenciones |
|   POST   |  api/attention | Guardar una nueva atención |
|   GET    |  api/attention/{attention} | Obtener como resultado un atención de acuerdo a su id  |
|   GET    |  api/attention/{attention}/edit | Obtener como resultado un atención de acuerdo a su id para editar |
|   PUT    |  api/attention/{attention} | Actualizar una atención de acuerdo a su id  |
|   DELETE |  api/attention/{attention} | Eliminar una atención de acuerdo a su id  |

## Peticiones de citas

|  Petición  |      URL      |  Descripción |
|----------|:-------------:|------:|
|   GET    |  api/date | Listado de citas |
|   POST   |  api/date | Guardar una nueva cita |
|   GET    |  api/date/{date} | Obtener como resultado un cita de acuerdo a su id  |
|   GET    |  api/date/{date}/edit | Obtener como resultado un cita de acuerdo a su id para editar |
|   PUT    |  api/date/{date} | Actualizar una cita de acuerdo a su id  |
|   DELETE |  api/date/{date} | Eliminar una cita de acuerdo a su id  |