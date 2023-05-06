import mpmath
import sympy as sp  # Importa la biblioteca SymPy
from math import *  # Importa todas las funciones de la biblioteca math

import sys

def NewtonRaphson(x0, tol, n, f):
    x = sp.symbols('x')  # Crea la variable simbólica x utilizando SymPy
    #f = input('Ingresa la función sobre la variable X: ')  # Define la función f(x)
    df = sp.diff(f)  # Calcula la derivada de f(x) utilizando SymPy
    f = sp.lambdify(x, f)  # Convierte la expresión de f(x) en una función lambda
    df = sp.lambdify(x, df)  # Convierte la expresión de df(x) en una función lambda
    
    for k in range(n):  # Inicia el bucle for que realizará el método de Newton-Raphson
        x1 = x0 - f(x0) / df(x0)  # Calcula la siguiente aproximación de la raíz utilizando la fórmula del método de Newton-Raphson
        
        if abs(x1 - x0) < tol:  # Si la diferencia entre la aproximación actual y la anterior es menor que la tolerancia especificada
            print(f'x{k+1} = {x1} es una buena aproximación de la raíz.')  # Imprime el resultado
            return  # Sale de la función
            
        x0 = x1  # Actualiza la aproximación anterior
        print(f'x{k+1} = {x1}'+'</br>')  # Imprime la aproximación actual
        
# Ejemplo de uso de la función con una aproximación inicial de pi, una tolerancia de 10^-7 y un máximo de 10 iteraciones        
#NewtonRaphson(pi, 0.0000001, 10)
NewtonRaphson(float(sys.argv[1]), float(sys.argv[2]), int(sys.argv[3]), str(sys.argv[4]))