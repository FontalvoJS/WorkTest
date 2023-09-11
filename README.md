## Instrucciones de Instalación y Configuración

### Prerrequisitos

Antes de comenzar, asegúrate de tener lo siguiente instalado:

1. **Servidor Apache**: Un servidor web para ejecutar el código PHP.
2. **PHP**: Necesario para ejecutar el código PHP.
3. **MySQL**: Base de datos donde se almacenarán los datos de los usuarios y las tareas.
4. **Cliente MySQL**: Una herramienta para administrar la base de datos, como phpMyAdmin o cualquier cliente de terminal.

### Pasos de Instalación

1. **Descargar el proyecto**:  
   Si aún no has descargado el proyecto, hazlo y descomprímelo en tu directorio de trabajo preferido.

2. **Mover la carpeta del proyecto a la raíz del servidor web**:  
   Dependiendo de tu configuración, es probable que necesites mover la carpeta del proyecto a la raíz del servidor web (por ejemplo, `htdocs` para XAMPP).

3. **Crear la base de datos**:
   - Abre tu cliente MySQL (como phpMyAdmin).
   - Crea una nueva base de datos llamada `taskmanager` (o el nombre que prefieras).

4. **Importar la estructura de la base de datos**:
   - En tu cliente MySQL, selecciona la base de datos que acabas de crear.
   - Busca la opción para importar y selecciona el archivo `.sql` que se encuentra en la carpeta del proyecto.
   - Ejecuta la importación. Esto creará todas las tablas y estructuras necesarias en la base de datos.

5. **Configurar la conexión a la base de datos**:
   - Busca en el código del proyecto el archivo de configuración de la base de datos (llamado `dbConnection.php` en la carpeta `Controllers`).
   - Modifica las credenciales de la base de datos para que coincidan con tu configuración local (nombre de usuario, contraseña, nombre de la base de datos, etc.).

6. **Iniciar el servidor web y MySQL**:  
   Asegúrate de que tanto el servidor web como el servidor MySQL estén en ejecución.

7. **Acceder a la aplicación**:  
   Abre tu navegador y dirígete a la dirección donde se encuentra tu proyecto, por ejemplo: `http://localhost/WorkTest/`

---

## Uso de la Aplicación

1. **Registrarse/Iniciar Sesión**:
   - Al abrir la aplicación por primera vez, te encontrarás con la página de inicio de sesión.
   - Si es tu primera vez, registra una cuenta proporcionando tu nombre, correo electrónico y contraseña.
   - Si ya tienes una cuenta, simplemente inicia sesión.

2. **CRUD de Tareas**:
   - Una vez que hayas iniciado sesión, serás redirigido a la página principal donde podrás ver todas tus tareas.
   - Aquí puedes:
     - **Crear** una nueva tarea usando el formulario proporcionado.
     - **Leer** y ver todas tus tareas pendientes.
     - **Actualizar** una tarea haciendo clic en el botón de editar correspondiente.
     - **Eliminar** una tarea haciendo clic en el botón de eliminar.

3. **Cerrar sesión**:
   - Una vez que hayas terminado, puedes cerrar sesión usando el botón o enlace correspondiente.
