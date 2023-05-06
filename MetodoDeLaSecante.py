import mpmath
import sympy as sp  # Importa la biblioteca SymPy
from math import *  # Importa todas las funciones de la biblioteca math


import sys

def Secante(x0, x1, tol, n, f):
    x = sp.symbols('x')  # Crea la variable simbólica x utilizando SymPy
    #f = input('Ingresa la función sobre la variable X: ')  # Solicita al usuario ingresar la función f(x)
    f = sp.lambdify(x, sp.parse_expr(f), "math")  # Convierte la expresión de f(x) en una función lambda
    
    # Inicialización de las variables
    fx0 = f(x0)
    fx1 = f(x1)
    iter = 0
    
    # Ciclo de iteraciones
    while abs(fx1) > tol and iter <= n:
        # Calculo del nuevo valor de x
        x_new = x1 - fx1 * (x1 - x0) / (fx1 - fx0)
        
        # Actualización de los valores de x
        x0 = x1
        x1 = x_new
        
        # Actualización de los valores de f(x)
        fx0 = fx1
        fx1 = f(x1)
        
        # Incremento del número de iteraciones
        iter += 1
    
    if abs(fx1) <= tol:
        # Se ha encontrado una aproximación de la raíz con la tolerancia deseada
        return x1
    elif iter == n:
        # Se ha alcanzado el número máximo de iteraciones sin encontrar la raíz con la tolerancia deseada
        print("El método de la secante no converge después de %d iteraciones" % n)
    else:
        # Error desconocido
        print("Error desconocido en el método de la secante")
    
# Ejemplo de uso de la función con una aproximación inicial de pi, una tolerancia de 10^-7 y un máximo de 10 iteraciones        
#Secante(pi, pi/2, 0.0000001, 10)
Secante(float(sys.argv[1]), float(sys.argv[2]), float(sys.argv[3]), int(sys.argv[4]), str(sys.argv[5]))