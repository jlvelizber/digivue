# Digimundo - Prueba BlueBear

Bienvenidos al directorio de Digimons (de mis series favoritas). En esta prueba se utiliza lo siguiente 

- Laravel como backend y para el 
- Vue con InertiaJS y Typescript.
- TailwindCSS como libreria CSS
- Para el control de usuarios se decidió usar una tabla en la base de datos con conexión a Mysql
- Para el envio de correos se utilizó Mailtrap


## Instalación
1. Clonar repositorio
2. Ubicarse en el root de la carpeta
3. Instalar las dependencias de Laravel 
    ```
        composer install
    ```
3.1 En caso de no autogenerarse el arcihvo ```.env``` renombrar ```.env.example``` por ```.env``` 

3.2 Ejecutar el siguiente comando 

    ```
    php artisan key:generate
    ```

4. Instalar las dependencias NodeJS  

    Npm
    ``` 
        npm install 
    ```
    
    Yarn
    ``` 
        yarn 
    ```
5. Bildear el codigo Javascript
    
    Ambiente de Desarrollo
    
    Npm
    ``` 
        npm run dev 
    ```
    
    Yarn
    ``` 
        yarn dev
    ```

    Ambiente de Producción

    Npm
    ``` 
        npm run build 
    ```
    
    Yarn
    ``` 
        yarn build
    ```



## Configuración

1. Editar archivo ```.env``` 

    ```
        APP_URL=http://localhost => por tu dominio
    ```
    Configurar ambiente
    ```
        APP_ENV=local => production | staging
    ```

    Configurar Conexión a la base de datos

    ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=bluebear
        DB_USERNAME=root
        DB_PASSWORD=
    ```

    Configurar cliente de Correos
    ```
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=37849138a1b9ae
    MAIL_PASSWORD=b3fd04a6710016
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```
2.- Ejecutar las migraciones de Laravel

    ```
        php artisan migrate
    
    ```
# NOTA 
en el archivo ``` .env.example``` se encuentra definida ```DIGIMON_API_URL``` que tiene la url de la API  


