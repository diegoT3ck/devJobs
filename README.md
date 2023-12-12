# DevJobs

DevJobs es una plataforma desarrollada en Laravel que permite a las empresas registradas publicar vacantes y a los usuarios postularse a ellas, subir sus currículos y recibir notificaciones cuando un candidato se postula para una vacante.

## Características Principales

- **Publicación de Vacantes:** Las empresas pueden registrarse y publicar nuevas vacantes, proporcionando detalles sobre el puesto y los requisitos.

- **Postulación de Usuarios:** Los usuarios pueden explorar las vacantes y postularse a aquellas que coincidan con sus habilidades y experiencia.

- **Subida de Currículos:** Los usuarios tienen la opción de subir sus currículos para facilitar el proceso de aplicación.

- **Notificaciones:** Las empresas reciben notificaciones cuando un candidato se postula para una de sus vacantes, mejorando la eficiencia en el proceso de contratación.

## Tecnologías Utilizadas

- **Laravel:** El backend del proyecto se desarrolla utilizando el framework Laravel, que proporciona una estructura sólida y potente para aplicaciones web.

- **Tailwind CSS:** Para el diseño y estilos, se utiliza Tailwind CSS, permitiendo un enfoque ágil y fácil personalización.

- **Livewire:** La interactividad del frontend se logra con Livewire, una biblioteca de Laravel que simplifica la creación de componentes dinámicos.

## Instalación

1. **Clonar el Repositorio:**
   ```bash
   git clone https://github.com/diegoT3ck/devJobs.git
```
2. **Instalar Dependencias:**
    
```sh
cd DevJobs composer install npm install
```
    
3. **Configuración del Entorno:**
    
    - Copiar el archivo `.env.example` a `.env` y configurar la conexión a la base de datos y otras variables de entorno.
    - Generar una nueva clave de aplicación: `php artisan key:generate`
4. **Migraciones y Datos Iniciales:**    
```sh
php artisan migrate --seed
```
    
    
    
5. **Compilar Assets:**    
```sh 
npm run dev
```
    
6. **Iniciar el Servidor:**
    
    `php artisan serve`
    

Accede a tu aplicación en [http://localhost:8000](http://localhost:8000/).

## Contribuciones

¡Contribuciones son bienvenidas! Si encuentras errores o mejoras posibles, siéntete libre de abrir un problema o enviar un pull request.
