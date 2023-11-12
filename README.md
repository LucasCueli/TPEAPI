# TPEAPI
Este es el repositorio del proyecto especial con API RESTful realizado por los alumnos Agustin Lucas Ramirez (DNI: 43909137) y Lucas Cueli Faijoo (DNI: 42818056) el cual consiste de una base de datos que simula una tienda de computación, la cual cuenta con: procesadores, graficas, RAMs y gabinetes.
En esta ocación, el proyecto cuenta con la implementacion de una API RESTful, y mediante los endpoints que debajo se adjuntan, se podrá solicitar los datos de la base de datos implementada.

# ENDPOINTS / EJEMPLOS

1. Obtener todos los procesadores, graficas, rams y gabinetes:

GET api/producto

Ejemplo: GET localhost/WEB_2/TPEAPI/api/procesadores

Resultado:

[
    {
        "ID_procesadores": "9",
        "Marca": "Intel",
        "Modelo": "i7-12700KF",
        "Socket": "LGA 1700",
        "Valor": "720"
    },
    {
        "ID_procesadores": "10",
        "Marca": "Intel",
        "Modelo": "i5-10600",
        "Socket": "LGA 1200",
        "Valor": "500"
    },
    {
        "ID_procesadores": "11",
        "Marca": "Intel",
        "Modelo": "i3-10600",
        "Socket": "LGA 1200",
        "Valor": "350"
    },
    {
        "ID_procesadores": "12",
        "Marca": "AMD",
        "Modelo": "Ryzen 7 5700G",
        "Socket": "AM4",
        "Valor": "500"
    },
    {
        "ID_procesadores": "13",
        "Marca": "AMD",
        "Modelo": "Ryzen 5 5600G",
        "Socket": "AM4",
        "Valor": "400"
    }
]

2. Obtener un producto especifico por su ID:

GET api/producto/:ID

Ejemplo: GET localhost/WEB_2/TPEAPI/api/procesadores/11

Resultado: 

{
    "ID_procesadores": "11",
    "Marca": "Intel",
    "Modelo": "i3-10600",
    "Socket": "LGA 1200",
    "Valor": "350"
}

3. Obtener productos ordenado por campo en orden ascendente o descendente:

GET api/producto?sort=campo&order=orden

Ejemplo: GET localhost/WEB_2/TPEAPI/api/procesadores?sort=ID_procesadores&order=DESC
(trae la lista de procesadores ordenados de manera descendiente por su ID)
(aclaración: puede hacerse con cualquiera de los campos)

Resultado: 

[
    {
        "ID_procesadores": "13",
        "Marca": "AMD",
        "Modelo": "Ryzen 5 5600G",
        "Socket": "AM4",
        "Valor": "400"
    },
    {
        "ID_procesadores": "12",
        "Marca": "AMD",
        "Modelo": "Ryzen 7 5700G",
        "Socket": "AM4",
        "Valor": "500"
    },
    {
        "ID_procesadores": "11",
        "Marca": "Intel",
        "Modelo": "i3-10600",
        "Socket": "LGA 1200",
        "Valor": "350"
    },
    {
        "ID_procesadores": "10",
        "Marca": "Intel",
        "Modelo": "i5-10600",
        "Socket": "LGA 1200",
        "Valor": "500"
    },
    {
        "ID_procesadores": "9",
        "Marca": "Intel",
        "Modelo": "i7-12700KF",
        "Socket": "LGA 1700",
        "Valor": "720"
    }
]

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

El procesador con la id 12 es actualizado con los datos que le colocamos en el body.

# FUNCIONALIDADES VARIAS

* Todos los ejemplos que nombramos pueden hacerse de igual manera con otros productos, lo unico que cambia es el endpoint y el body. En lugar de procesadores, colocar alguno de los otros productos (graficas, rams o gabinetes), la funcionalidad es la misma.

* Estan implementados los siguientes Status Codes: 
200 "OK"
201 "Created"
400 "Bad Request"
404 "Not Found"
500 "Internal Server Error"