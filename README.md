# Decameron API

Este proyecto es una aplicación Laravel que muestra un servicio web API para obtener parámetros de tipos de habitación y acomodaciones en hoteles.

## Requisitos previos

Asegúrate de tener los siguientes requisitos previos antes de comenzar:

- PHP >= 7.4
- Composer
- PostgreSQL (instalado y configurado)

## Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. Clona el repositorio en tu máquina local:

```bash
git clone https://github.com/joseiguti/decameron-api.git
```

2. Accede al directorio del proyecto:

```bash
cd decameron-api
```

3. Ejecuta el siguiente comando para instalar las dependencias de Composer:

```bash
composer install
```

4. Crea un archivo de entorno .env a partir del archivo de ejemplo .env.example:

```bash
cp .env.example .env
```

5. Genera una clave de aplicación:
```bash
php artisan key:generate
```

### Configuración de la base de datos

Antes de ejecutar las migraciones, asegúrate de haber creado la base de datos en tu instalación local de PostgreSQL. Puedes utilizar una instalación existente o configurar una nueva base de datos. Asegúrate de tener acceso y los parámetros de conexión correctos para configurar Laravel.

Para configurar Laravel con tu base de datos PostgreSQL, sigue estos pasos:

1. Abre el archivo '.env' en la raíz del proyecto.

2. Busca las siguientes variables y actualízalas con los valores correspondientes de tu instalación de PostgreSQL:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_la_base_de_datos
DB_USERNAME=nombre_de_usuario
DB_PASSWORD=contraseña
```

Asegúrate de proporcionar el nombre de la base de datos, el nombre de usuario y la contraseña correctos para tu instalación de PostgreSQL.

Ten en cuenta que el host (DB_HOST) puede variar según tu configuración. En el ejemplo anterior, se usa 127.0.0.1 para indicar que la base de datos se encuentra en el servidor local. Asegúrate de ajustar esta configuración según corresponda.

3. Guarda los cambios en el archivo '.env'.

Una vez que hayas configurado correctamente los parámetros de conexión, puedes proceder a ejecutar las migraciones de la base de datos.

### Ejecución de las Migraciones

Para crear las tablas y los esquemas necesarios en la base de datos, ejecuta las migraciones de Laravel utilizando el siguiente comando:

```bash
php artisan migrate
```

Esto ejecutará todas las migraciones pendientes y creará las tablas correspondientes en la base de datos configurada.

Después de ejecutar las migraciones, puedes probar el servicio accediendo a la siguiente URL:

URL: http://localhost:8000/api/parameters

Recibirás una respuesta JSON similar a la siguiente:

```json lines
[{"id":1,"nombre":"Estándar","acomodaciones":[{"id":1,"nombre":"Sencilla","pivot":{"tipo_habitacion_id":1,"acomodacion_id":1}},{"id":2,"nombre":"Doble","pivot":{"tipo_habitacion_id":1,"acomodacion_id":2}}]},{"id":2,"nombre":"Junior","acomodaciones":[{"id":3,"nombre":"Triple","pivot":{"tipo_habitacion_id":2,"acomodacion_id":3}},{"id":4,"nombre":"Cuádruple","pivot":{"tipo_habitacion_id":2,"acomodacion_id":4}}]},{"id":3,"nombre":"Suite","acomodaciones":[{"id":1,"nombre":"Sencilla","pivot":{"tipo_habitacion_id":3,"acomodacion_id":1}},{"id":2,"nombre":"Doble","pivot":{"tipo_habitacion_id":3,"acomodacion_id":2}},{"id":3,"nombre":"Triple","pivot":{"tipo_habitacion_id":3,"acomodacion_id":3}}]}]
```

### Ejecutar la Aplicación

Para ejecutar la aplicación Laravel, puedes utilizar el siguiente comando:

```bash
php artisan serve
```

Esto iniciará el servidor de desarrollo de Laravel y podrás acceder a la aplicación en la siguiente URL:

http://localhost:8000

¡Listo! Ahora tienes la aplicación Laravel configurada y funcionando correctamente en tu máquina local.

Por favor ahora inicia el proyecto Front.
https://github.com/joseiguti/decameron-front
