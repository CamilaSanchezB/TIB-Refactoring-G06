# crud-php-prototipo-refactorizado-3.0
Prototipo de CRUD refactorizado versión 3.0
![Diagrama de secuencia de de la obtención de estudiantes](/uml/diagrama_de_secuencia_refactoring-3.0.png?raw=true "Diagrama de secuencia de de la obtención de estudiantes")


## GUÍA 07
Desde commit [Clono refactoring 3.0](https://github.com/CamilaSanchezB/TIB-Refactoring-G06/commit/82ce3db582e0f97dc17641018a51d839736ae423)

### 📋 Actividades

- [x] Descargar el repositorio refactorizado  
  🔗 [crud-php-prototipo-refactorizado-3.0](https://github.com/gabrielinuz/crud-php-prototipo-refactorizado-3.0)

- [ ] Agregar las siguientes validaciones al código  
    - [ ] Sí el usuario intenta agregar dos materias de igual nombre debe mostrar un mensaje por pantalla indicando que esto no es posible
    - [ ] Cuando se intente guardar una relación materia y estudiante repetida, también debe validarse y dar un alerta por pantalla de que esa relación ya existe  
    - [ ] Actualmente el código de la base de datos tiene habilitada la opción de borrado en cascada en la tabla students_subjects (ON DELETE CASCADE): debería deshabilitar esta opción y crear una validación que muestre por pantalla que no se puede borrar una materia o un estudiante si este está involucrado en una relación en la tabla/módulo intermedio students_subjects.

¿Se le ocurre otra validación necesaria o filtro? Pueden agregarla.

- [ ] Actualizar en su repositorio de GitHub entregado con esta nueva versión con validaciones.


## GUÍA 06
Desde commit [Copia repo](https://github.com/CamilaSanchezB/TIB-Refactoring-G06/commit/bbbc241a1b4cb68c3601b7b9d246d4a44c22230d)
Hasta commit [Update README.md](https://github.com/CamilaSanchezB/TIB-Refactoring-G06/commit/88cb7c5de8450a9d57550b02dd13458f97db5f6f)

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