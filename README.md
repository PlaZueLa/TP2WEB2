method GET:
 http://localhost/tp2webapirestfull/api/cars 

 method POST:
 http://localhost/tp2webapirestfull/api/cars

 method PUT :
 http://localhost/tp2webapirestfull/api/cars/id

para  PUT el body es: 
 
  {
        
        "id": ,
        "marca": " ",
        "modelo": " ",
        "fecha_creacion": " b",
        "precio": ,
        "descripcion": " ",
        "id_categoria": 

        }
 para POST el body es:
   {
        
        
        "marca": " ",
        "modelo": " ",
        "fecha_creacion": " ",
        "precio":  ,
        "descripcion": "  ",
        "id_categoria": 

        }
 
method GET BY ID: 
http://localhost/tp2webapirestfull/api/cars/id


Para todos los ordenamientos se puede usar tanto minusculas como mayusculas, ej: (sort=id o sort=ID y order=ASC o asc, lo mismo con desc y DESC), aca dejo una sola manera para no hacer extenso el README.

ORDER:


http://localhost/tp2webapirestfull/api/cars?sort=campo&order=asc-desc

FILTER POR CATEGORIA:

http://localhost/tp2webapirestfull/api/cars?filter=num (1 - 2 - 3)

PAGINACION:

http://localhost/tp2webapirestfull/api/cars?limit=NUM&offset=NUM


