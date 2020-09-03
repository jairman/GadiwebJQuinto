
# ---Ing. Jair Quinto C. ---

### Presentación 
El siguiente repositorio es una Prueba de ingreso Ingeniero de Desarrollo  Parqueaderos 4 ruedas necesita construir un sistema que le permita generar insights para empezar a conocer más un poco acerca de sus usuarios recurrentes. construido en Laravel 7.

La aplicación está diseñada para ser bastante intuitiva en su uso por eso no hay una descripción detallada de cómo funciona.

### Uso recomendado
1. git clone  Clonar el repositorio 
2. Ejecutar `composer install`
3. `cp .env.example .env`  configure los datos de BD
4. `php artisan migrate:fresh --seed`
5. `php artisan passport:install` - Para generar Token
6. En el repositorio usar `php artisan serve` Para ejecutar. 
	1.	email =admin@a.com
    2.  password =123456

7. Datos de la API
	1.	Variables
		1.	Content-Type: application/json
		2.	X-Requested-With: XMLHttpRequest
	2.	Url
	<img src="/public/panel/img/login.png" alt="logomarca" class="brand-image img-circle elevation-3" style="opacity: .8">
	<img src="/public/panel/img/usuario.png" alt="logomarca" class="brand-image img-circle elevation-3" style="opacity: .8">
	<img src="/public/panel/img/marcas.png" alt="logomarca" class="brand-image img-circle elevation-3" style="opacity: .8">
	<img src="/public/panel/img/registro_bueno.png" alt="logomarca" class="brand-image img-circle elevation-3" style="opacity: .8">
	<img src="/public/panel/img/registro_validar.png" alt="logomarca" class="brand-image img-circle elevation-3" style="opacity: .8">


8. Comando Pruebas
	1.	vendor/bin/phpunit
   