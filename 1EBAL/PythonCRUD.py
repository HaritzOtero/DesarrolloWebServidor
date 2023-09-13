import mysql.connector

def añadirNombre():
    
    mycursor.execute("insert into users")
    resultados = mycursor.fetchall()

    for fila in resultados:
        print(fila)

mydb = mysql.connector.connect(
    host="localhost",      # Cambia esto al nombre del host de tu base de datos
    user="root",     # Cambia esto a tu nombre de usuario de MySQL
    password="", # Cambia esto a tu contraseña de MySQL
    database="ariketa1" # Cambia esto al nombre de tu base de datos
)

mycursor = mydb.cursor()

def opcion1():
    print("Opción 1 seleccionada")
    mycursor.execute("SELECT * FROM users")
    resultados = mycursor.fetchall()

    for fila in resultados:
        print(fila)

def opcion2():
    print("Opción 2 seleccionada")

    izena = input("Sartu erabiltzailearen izena eta abizena: ")
    dni = input("Sartu erabiltzailearen NAN: ")


    mycursor.execute("INSERT INTO users (DNI, Izena) VALUES ('" + dni + "','"+ izena +"');")
    resultados = mycursor.fetchall()

    for fila in resultados:
        print(fila)

def opcion3():
    print("Opción 3 seleccionada")
    # Coloca aquí el código para la opción 3

def opcion4():
    print("Opción 4 seleccionada")
    # Coloca aquí el código para la opción 4

def opcion5():
    print("Opción 4 seleccionada")
    # Coloca aquí el código para la opción 4

def salir():
    print("Saliendo del programa")
    exit()

while True:
    print("**** Erabiltzaile menua ****")
    print("1. Ikusi erabiltzaile guztiak")
    print("2. Erabiltzaile berria sartu")
    print("3. Erabiltzailea eguneratu")
    print("4. Erabiltzailea ezabatu")
    print("5. Salir")
    print("6. Salir")

    opcion = input("Seleccione una opción: ")

    if opcion == "1":
        opcion1()
    elif opcion == "2":
        opcion2()
    elif opcion == "3":
        opcion3()
    elif opcion == "4":
        opcion4()
    elif opcion == "5":
        opcion5()
    elif opcion == "6":
        salir()
    else:
        print("Opción no válida. Por favor, seleccione una opción válida.")

