# crud-php-prototipo-refactorizado
Prototipo de CRUD refactorizado
## GUÍA 06
### 📋 Actividades

- [x] Descargar el repositorio refactorizado  
  🔗 [crud-php-prototipo-refactorizado](https://github.com/gabrielinuz/crud-php-prototipo-refactorizado)

- [x] Familiarizarse con el código   
    - [x] Agregar comentarios propios o vistos en clase que no estén en el código  
    - [x] Asegurarse de que cada línea del ejemplo sea comprensible

- [x] Modificar el script `server.php`  
    - [x] Prepararlo para módulos futuros  
    - [x] Analizar la URL  
    - [x] Decidir qué archivo de ruta invocar usando alguna convención

- [x] Agregar un manejador para respuestas 404  
    - [x] Mostrar error si la ruta no es reconocida

- [x] Subir su versión a un repositorio propio en GitHub

### 📝Notas
Se modificó el archivo server.php
- Obtiene los nombres de los archivos de la carpeta 'routes' y genera un array
- Verifica que la ruta solicitada se encuentre en el array
- Si la ruta existe carga el archivo correspondiente. Caso contrario devuelve error 404 y muestra {"error":"Ruta no encontrada"}

