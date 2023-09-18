import pygame
import random

# Configuración
pygame.init()
ancho, alto = 640, 480
pantalla = pygame.display.set_mode((ancho, alto))
pygame.display.set_caption("Snake Game")
reloj = pygame.time.Clock()

# Colores
negro = (0, 0, 0)
verde = (0, 255, 0)
rojo = (255, 0, 0)
blanco = (255, 255, 255)

# Inicialización de variables
serpiente = [(100, 50), (90, 50), (80, 50)]
serpiente_dir = (10, 0)
comida = (random.randrange(1, ancho // 10) * 10, random.randrange(1, alto // 10) * 10)
puntuacion = 0
velocidad = 10  # Velocidad inicial de la serpiente
contador_puntuacion = 0

# Fuente de texto
fuente = pygame.font.Font(None, 36)

# Función para dibujar la serpiente y la comida
def dibujar_serpiente(serpiente):
    for segmento in serpiente:
        pygame.draw.rect(pantalla, verde, pygame.Rect(segmento[0], segmento[1], 10, 10))

def dibujar_comida(comida):
    pygame.draw.rect(pantalla, rojo, pygame.Rect(comida[0], comida[1], 10, 10))

def mostrar_puntuacion(puntuacion):
    texto = fuente.render(f"Puntuación: {puntuacion}", True, blanco)
    pantalla.blit(texto, (10, 10))

# Bucle principal del juego
while True:
    for evento in pygame.event.get():
        if evento.type == pygame.QUIT:
            pygame.quit()
            quit()

        # Control de la serpiente
        if evento.type == pygame.KEYDOWN:
            if evento.key == pygame.K_UP and serpiente_dir != (0, 10):
                serpiente_dir = (0, -10)
            if evento.key == pygame.K_DOWN and serpiente_dir != (0, -10):
                serpiente_dir = (0, 10)
            if evento.key == pygame.K_LEFT and serpiente_dir != (10, 0):
                serpiente_dir = (-10, 0)
            if evento.key == pygame.K_RIGHT and serpiente_dir != (-10, 0):
                serpiente_dir = (10, 0)

    # Mover la serpiente
    nueva_cabeza = (serpiente[0][0] + serpiente_dir[0], serpiente[0][1] + serpiente_dir[1])
    serpiente.insert(0, nueva_cabeza)

    # Comprobar si la serpiente ha comido la comida
    if serpiente[0] == comida:
        puntuacion += 1
        contador_puntuacion += 1
        comida = (random.randrange(1, ancho // 10) * 10, random.randrange(1, alto // 10) * 10)

        # Aumentar la velocidad cada 5 puntos
        if contador_puntuacion % 5 == 0:
            velocidad += 1

    else:
        serpiente.pop()

    # Comprobar colisiones
    if (
        serpiente[0][0] < 0
        or serpiente[0][0] >= ancho
        or serpiente[0][1] < 0
        or serpiente[0][1] >= alto
        or serpiente[0] in serpiente[1:]
    ):
        pygame.quit()
        quit()

    # Limpiar pantalla
    pantalla.fill(negro)

    # Dibujar la serpiente y la comida
    dibujar_serpiente(serpiente)
    dibujar_comida(comida)

    # Mostrar la puntuación
    mostrar_puntuacion(puntuacion)

    # Actualizar pantalla
    pygame.display.flip()

    # Controlar la velocidad del juego
    reloj.tick(velocidad)
