import mpmath
import sympy as sp  # Importa la biblioteca SymPy
from math import *  # Importa todas las funciones de la biblioteca math

import sys

def Biseccion(a, b, tol, n, f):
    
    x = sp.symbols('x')  # Crea la variable simbólica x utilizando SymPy
    #f = input('Ingresa la función sobre la variable X: ')  # Solicita al usuario ingresar la función f(x)
    f = sp.lambdify(x, sp.parse_expr(f), "math")  # Convierte la expresión de f(x) en una función lambda
    
    m1 = a  # Define el valor de m1 inicial como a
    m = b  # Define el valor de m inicial como b
    k = 0  # Inicializa el contador k en cero
    
    if(f(a) * f(b) > 0):  # Verifica si f(a) y f(b) tienen el mismo signo
        print('No cambia de signo')
        return None
        
    while(k < n):  # Repite el proceso hasta que se alcance el número máximo de iteraciones
        m1 = m  # Actualiza el valor de m1 con el valor anterior de m
        m = (a + b) / 2  # Calcula el nuevo valor de m como el punto medio del intervalo [a,b]
        if(f(a) * f(m) < 0):  # Verifica si f(a) y f(m) tienen distinto signo
            b = m  # Si es así, actualiza el valor de b con el valor de m
        
        if((m) * f(b) < 0):  # Verifica si f(m) y f(b) tienen distinto signo
            a = m  # Si es así, actualiza el valor de a con el valor de m
            
        print(f'Iteración {k+1}: El intervalo es [{a}, {b}] y el punto medio es {m}')  # Imprime el intervalo actual y el punto medio
        k += 1  # Incrementa el contador k en uno
        
        if abs(m1 - m) <= tol:  # Verifica si se alcanza la tolerancia deseada
            print(f'Solución encontrada en {k} iteraciones: {m:.8f}')
            return m
        
    print(f'El método falló después de {n} iteraciones.')
    return None

    
#Biseccion(0, 2, 10**(-6))  # Llama a la función Biseccion con los valores de a, b y tol dados como argumentos
Biseccion(float(sys.argv[1]), float(sys.argv[2]), float(sys.argv[3]), int(sys.argv[4]), str(sys.argv[5]))