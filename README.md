## Como ejecuto esto?

### Prepativos

Debes tener docker instalado en tu equipo y si tienes algun contenedor corriendo mejor detenerlo, para evitar bloqueo de puertos.
Si prefieres usar Homestead o Valet haz caso omiso de los pasos siguientes, el codebase esta dentro del folder srcc recuerda cambiar los valores para la DB en el archivo .env


Clonar este repositorio

```
git clone https://github.com/jfreites/movie-theater.git
```

En el archivo docker-compose.yml, buscar la linea 43 y replazar el nombre jonathan por el usuario de tu equipo (importante si usas Linux).

Luego dentro del folder clonado ejecutar:

```
docker-compose up -d
```

### Puesta a punto de Laravel

Ahora se instalan las dependencias del proyecto

```
docker-compose exec php composer install
```

Ejecutar las migraciones

```
docker-compose exec php php artisan migrate
```

### Usar el API

Si todo va bien deberías ver el sitio funcionando en la url: http://localhost:8080

Para conocer los requests que puedes hacer al API consulta la collection de [POSTMAN](https://www.getpostman.com/collections/2b3039b0e2b0c13d455d)



### Posibles problemas

- Si al tratar de ejecutar las migraciones se obtiene un error "MYSQL [2002] Connection refused": detener los containers con docker-compose stop y volverlos a ejecutar sin el flag -d. De esta manera se pueden ver los logs, a veces ese error ocurre pues MySQL no ha terminado de levantar los servicios.

- Error de permisos en Laravel cuando se navega en la dirección http://localhost:8080: si estas usando Linux, asegurarse de cambiar el usuario en el docker-compose.yml. Si se esta usando Windows o Mac no debería pasar. Verificar con que usuario se esta ejecutando docker en ese caso.

