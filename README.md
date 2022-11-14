method GET
 http://localhost/tp2webapirestfull/api/cars 

method DELETE
 http://localhost/tp2webapirestfull/api/cars/id

 PUT :
 http://localhost/tp2webapirestfull/api/cars/id



 para POST O PUT el body es: 
 
 
    {
        
       "marca": " ",
        "modelo": "",
        "fecha_creacion": "",
        "precio": "",
        "descripcion": " ",
        "id_categoria": " "
        
    }

GET BY ID: 
http://localhost/tp2webapirestfull/api/cars/id


Para todos los ordenamientos se puede usar tanto minusculas como mayusculas, ej: (sort=id o sort=ID y order=ASC o asc, lo mismo con desc y DESC), aca dejo una sola manera para no hacer extenso el README.

ORDER:


http://localhost/tp2webapirestfull/api/cars?sort=campo&order=asc-desc

FILTER POR CATEGORIA:
http://localhost/tp2webapirestfull/api/cars?filter=num (1 - 2 - 3)


