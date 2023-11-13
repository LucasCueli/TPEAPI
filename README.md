# TPE API
Este es el repositorio del proyecto especial con API RESTful realizado por los alumnos Agustin Lucas Ramirez (DNI: 43909137) y Lucas Cueli Faijoo (DNI: 42818056) el cual consiste de una base de datos que simula una tienda de computación, la cual cuenta con: procesadores, graficas, RAMs y gabinetes.
En esta ocación, el proyecto cuenta con la implementacion de una API RESTful, y mediante los endpoints que debajo se adjuntan, se podrá solicitar los datos de la base de datos implementada.

# ENDPOINTS / EJEMPLOS

1. Obtener todos los procesadores, graficas, rams y gabinetes:

GET api/producto

Ejemplo: GET localhost/WEB_2/TPEAPI/api/procesadores

Resultado:

![image](https://github.com/LucasCueli/TPEAPI/assets/144820025/b9915812-0592-4eaf-90f3-3d5cbac24928)

2. Obtener un producto especifico por su ID:

GET api/producto/:ID

Ejemplo: GET localhost/WEB_2/TPEAPI/api/procesadores/11

Resultado: 

![image](https://github.com/LucasCueli/TPEAPI/assets/144820025/8c8b945b-8015-4c67-b640-4e4d182a812a)

3. Obtener productos ordenado por campo en orden ascendente o descendente:

GET api/producto?sort=campo&order=orden

Ejemplo: GET localhost/WEB_2/TPEAPI/api/procesadores?sort=ID_procesadores&order=DESC
(trae la lista de procesadores ordenados de manera descendiente por su ID)
(aclaración: puede hacerse con cualquiera de los campos)

Resultado: 

![image](https://github.com/LucasCueli/TPEAPI/assets/144820025/acceba4b-1e38-4fb6-9692-a96a26d37dfb)

4. Crear un nuevo producto:

POST api/producto

Ejemplo: POST localhost/WEB_2/TPEAPI/api/procesadores

Body: 
{
    "Marca": "AMD",
    "Modelo": "Ryzen 5 5600X",
    "Socket": "AM4",
    "Valor": "450"
}

![image](https://github.com/LucasCueli/TPEAPI/assets/144820025/42e0bce3-3cbc-4758-b60b-7c6060948602)

El procesador es guardado y colocado en la base de datos. Cuando se vuelve a solicitar una lista con todos los procesadores (GET), el nuevo procesador se encuentra en ella con una nueva ID.

5. Modificar un producto:

PUT api/producto/:ID

Ejemplo: PUT localhost/WEB_2/TPEAPI/api/procesadores/12

Body: 
{
    "Marca": "AMD",
    "Modelo": "Ryzen 7 5700X",
    "Socket": "AM4",
    "Valor": "550"
}

![image](https://github.com/LucasCueli/TPEAPI/assets/144820025/bb9144e4-9e5b-4511-b846-8f9e3a1df4f8)

El procesador con la id 12 es actualizado con los datos que le colocamos en el body.

# FUNCIONALIDADES VARIAS

* Todos los ejemplos que nombramos pueden hacerse de igual manera con otros productos, lo unico que cambia es el endpoint y el body. En lugar de procesadores, colocar alguno de los otros productos (graficas, rams o gabinetes), la funcionalidad es la misma.

* Estan implementados los siguientes Status Codes: 
200 "OK"
201 "Created"
400 "Bad Request"
401 "Unauthorized"
404 "Not Found"
500 "Internal Server Error"
