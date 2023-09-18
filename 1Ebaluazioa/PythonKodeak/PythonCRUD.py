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

    izena = input("Sartu erabiltzailearen izena eta abizena: ")
    dni = input("Sartu erabiltzailearen NAN: ")


    mycursor.execute("INSERT INTO users (DNI, Izena) VALUES ('" + dni + "','"+ izena +"');")
    resultados = mycursor.fetchall()

    for fila in resultados:
        print(fila)

def opcion3():
    dni = input("Sartu erabiltzailearen NAN: ")
    mycursor.execute("DELETE FROM users WHERE DNI='"+ dni +"'")
    print("Erabiltzailea ezabatu da.")
    # Coloca aquí el código para la opción 3

def opcion4():
    # Coloca aquí el código para la opción 4
    dni = input("Sartu aldatu nahi dozun erabiltzailearen NAN-a: ")
    dniNuevo = input("Sartu erabiltzaileari jarri nahi diozun NAN berria: ")
    izena = input("Sartu erabiltzaileari jarri nahi diozun izen berria: ")
    mycursor.execute("UPDATE users SET izena = '" + izena +"', DNI = '" + dniNuevo +"' WHERE DNI ='" + dni +"';")
def salir():
    print("Saliendo del programa")
    exit()

while True:
    print("**** Erabiltzaile menua ****")
    print("1. Ikusi erabiltzaile guztiak")
    print("2. Erabiltzaile berria sartu")
    print("3. Erabiltzailea ezabatu")
    print("4. Erabiltzailea eguneratu")
    print("5. Salir")

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
        salir()

    else:
        print("Opción no válida. Por favor, seleccione una opción válida.")

