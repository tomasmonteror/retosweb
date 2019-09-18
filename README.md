# Instalación

Para instalar los retos hay que clonar el repositorio y construir todos los contenedores.

```bash
git clone
cd retosweb
bash buildall.sh
```

# Scripts

- buildall.sh: Crea todos los contenedores (docker build)
- runall.sh: Ejecuta todos los contenedores (docker run)
- stopall.sh: Para todos los contenedores (docker stop)

# Pruebas

Para arrancar cada una de las pruebas se debe generar primero el contenedor con el comando docker build dentro de su correspondiente directorio.

`docker build -t  ejercicioX .`

Y posteriormente arrancarlo con docker run:

`docker run -d --rm --publish=84:80 --name ejercicio4 ejercicio4`




