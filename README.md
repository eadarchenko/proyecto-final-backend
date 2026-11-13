# Hemp House Building · Backend

Backend de mi proyecto final de Desarrollo de Aplicaciones Web: una aplicación sobre construcción de viviendas ecológicas, con catálogo de productos y blog. Este repositorio contiene la API en Laravel; la interfaz está en [proyecto-final-frontend](https://github.com/eadarchenko/proyecto-final-frontend).

> Proyecto académico conservado como parte de mi aprendizaje. La versión actual necesita correcciones de integración y una comprobación local antes de utilizarse como demo. No es una aplicación preparada para producción.

## Stack

- PHP: restricción declarada `^7.3|^8.0` en Composer.
- Laravel 8 (`^8.75`).
- Laravel Passport (`^10.4`) para la implementación de tokens.
- Eloquent, migraciones y factories.
- PHPUnit incluido como dependencia de desarrollo.

## Qué contiene

- Controladores y modelos para productos y artículos.
- Código de registro e inicio de sesión con hash de contraseñas y creación de tokens Passport.
- Migraciones para usuarios, productos, artículos, pedidos y servicios.
- Rutas de consulta de productos y artículos.

La presencia de estos componentes no implica que todos sus flujos estén terminados o probados.

## Preparación local

Estos pasos son una guía de preparación, no una instalación validada de principio a fin. Utiliza una base de datos local de pruebas y revisa la compatibilidad del entorno con `composer.lock`.

```bash
git clone https://github.com/eadarchenko/proyecto-final-backend.git
cd proyecto-final-backend
composer install
cp .env.example .env
php artisan key:generate
```

Configura en tu `.env` la conexión a una base de datos vacía. No publiques ese archivo ni reutilices claves del historial del repositorio.

```bash
php artisan migrate
php artisan passport:install
php artisan serve
```

`passport:install` genera claves y clientes para tu entorno local. Consérvalos fuera de Git. El servidor de desarrollo utiliza por defecto `http://127.0.0.1:8000`.

## Rutas declaradas

| Método | Ruta | Propósito |
| --- | --- | --- |
| GET | `/api/product` | Consultar productos |
| GET | `/api/product/{id}` | Consultar un producto |
| GET | `/api/article` | Consultar artículos |
| GET | `/api/article/{id}` | Consultar un artículo |
| POST | `/api/auth/signup` | Registro |
| POST | `/api/auth/login` | Inicio de sesión |

Son rutas presentes en el código, no una garantía de funcionamiento validado. El resto de operaciones necesita la revisión indicada a continuación.

## Pendientes conocidos

- Unificar los nombres de los métodos de creación y borrado entre rutas y controladores.
- Aplicar y comprobar autenticación y permisos en las operaciones de escritura; el grupo de middleware de administración está vacío.
- Corregir la declaración de la ruta de usuario autenticado y revisar el cierre de sesión.
- Corregir los nombres de campos en las reglas de validación de productos.
- Alinear respuestas, endpoints y operaciones con el frontend. El frontend declara actualizaciones PUT que esta API no expone.
- Añadir pruebas de los flujos reales. Las pruebas de ejemplo no acreditan la API.

## Configuración y archivos generados

La rama actual no incluye `.env`, claves OAuth ni archivos de ejecución de logs, sesiones o caché. Se conserva `.env.example` y los directorios necesarios mediante archivos `.gitignore`.

**El historial puede contener versiones anteriores de esos archivos.** No reutilices sus claves. Antes de cualquier despliegue, genera credenciales nuevas, revisa la configuración y termina las comprobaciones de autenticación y permisos.

## English summary

Academic Laravel backend for Hemp House Building, an eco-home website with a product catalogue and blog. It contains product/article controllers, migrations and a Passport-based authentication implementation. Route/controller mismatches, authorization and frontend integration still need work. Local setup commands above are preparatory and have not been verified end to end. This repository is not production-ready; do not reuse credentials from its history.
